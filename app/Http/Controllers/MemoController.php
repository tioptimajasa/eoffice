<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\Struktur;
use App\Models\User;
use App\Models\PemeriksaMemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Routes\web;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PDF;
use DOMDocument;





class MemoController extends Controller
{


    public function index()
    {
        $memos = Memo::orderBy('created_at', 'DESC')->get();
        return view('pages.memos.index', [
            'memos' => $memos
        ]);
    }


    static function  getParentsNames($id,$data_struktur_array=[]) {

        $_struktur= Struktur::where('id',$id)->select('id','nama_organisasi','jabatan','parent_id')->first();
        // return $_struktur;
        if (isset($_struktur)) {
            if ($_struktur->parent_id == null) {
                $user_check = User::where('struktur_id',$_struktur->id)->pluck('name');
                if(count($user_check)>0 ){
                    array_push($data_struktur_array,$_struktur);
                }
                return $data_struktur_array;
            } else {
                $user_check = User::where('struktur_id',$_struktur->id)->pluck('name');
                if(count($user_check)>0 ){
                    array_push($data_struktur_array,$_struktur);
                }
                return self::getParentsNames($_struktur->parent_id,$data_struktur_array);
            }
        }else{
            return $data_struktur_array;
        }
 
     }

     public function inputsummernote($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function create()
    {
        $action = 'create';
        $data_struktur_array = [];
        
        $struktur_user = User::where('id',Auth::user()->id)->pluck('struktur_id');
        $struktur_parent = Struktur::where('id',$struktur_user)->pluck('parent_id');
        $parent_user = User::where('struktur_id',$struktur_parent)->pluck('name');
        if(count($parent_user)>0 ){
            $memo_kepada = self::getParentsNames($struktur_parent,$data_struktur_array);
        }else{
            $struktur_parent_parent = Struktur::where('id',$struktur_parent)->pluck('parent_id');
            $memo_kepada = self::getParentsNames($struktur_parent_parent,$data_struktur_array);
        }
        $_memo_dari = self::getParentsNames($struktur_user,$data_struktur_array);
       
        $strukturs = Struktur::get();  
        return view('pages.memos.form', [
            'action' => $action,
            'strukturs'=>$strukturs,
            'memo_dari'=>$_memo_dari,
            'memo_kepada'=>$memo_kepada,
            'memo_pemeriksa'=>$_memo_dari,
        ]);
    }





    public function getRomawi($bln){

        switch ($bln){

                  case 1:

                      return "I";

                      break;

                  case 2:

                      return "II";

                      break;

                  case 3:

                      return "III";

                      break;

                  case 4:

                      return "IV";

                      break;

                  case 5:

                      return "V";

                      break;

                  case 6:

                      return "VI";

                      break;

                  case 7:

                      return "VII";

                      break;

                  case 8:

                      return "VIII";

                      break;

                  case 9:

                      return "IX";

                      break;

                  case 10:

                      return "X";

                      break;

                  case 11:

                      return "XI";

                      break;

                  case 12:

                      return "XII";

                      break;

            }

     }

     public function store(Request $request)
     {
         if(!empty($request->file('lampiran_memo'))){
             $file = $request->file('lampiran_memo');
             $folder_destinations = 'storage/lampiran_memo';
             $file->move($folder_destinations,$file->getClientOriginalName());
         }
         $struktur = User::where('id', Auth::user()->id)->first('struktur_id');
         
         $memo = Struktur::where('id', $struktur->struktur_id)->first('patern_nota');
         $patern_notadinas = $memo->patern_nota;
 
         $max_id = Memo::max('nomor');
         $nomor = (empty($max_id)?1:$max_id+1);
         $nomor_generate = "e-".str_replace("{no}",$nomor,str_replace("{year}",date('Y'),str_replace("{month}",$this->getRomawi(date('m')),$patern_notadinas)));
         $id_generate = Str::uuid();
         $isi = $request->isi;
         $dom = new \domdocument();
         $isi_detail = @$dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
         $isi_detail = $dom->saveHTML();
         
         Memo::create([
             'id'=>$id_generate,
             'dari_id' => $request->dari_id,
             'dari_user_id' => User::where('struktur_id',$request->dari_id)->pluck('id'),
             'kepada_id' => $request->kepada_id,
             'kepada_user_id' => User::where('struktur_id',$request->kepada_id)->pluck('id'),
             'sifat' => $request->sifat,
             'urgensi' => $request->urgensi,
             'perihal' => $request->perihal,
             'isi' => $isi_detail,
             'tanggal' => now(),
             'nomor' => $nomor,
             'nomor_surat' => $nomor_generate,
             'lampiran_memo' =>  $folder_destinations . '/' . $file->getClientOriginalName(),
             'status' => $request->status,
             'reff' => $request->reff,
             // 'tembusan' => $request->tembusan,
 
         ]);
         $urutan = 1;
         foreach ($request->pemeriksa as $_pemeriksa) {
            
             $user_pemeriksa = User::where('struktur_id',$_pemeriksa)->pluck('id');
             PemeriksaMemo::create([
                 'memo_id'=> $id_generate,
                 'user_id' => $user_pemeriksa,
                 'struktur_id'=> $_pemeriksa,
                 'urutan'=>$urutan,
             ]);
             $urutan++;
         }
         return redirect()->route('memo.index');
     }
     

     public function edit($id)
     {
         $action = 'edit';
         $data_struktur_array = [];
         
         $struktur_user = User::where('id',Auth::user()->id)->pluck('struktur_id');
         $struktur_parent = Struktur::where('id',$struktur_user)->pluck('parent_id');
         $parent_user = User::where('struktur_id',$struktur_parent)->pluck('name');
         if(count($parent_user)>0 ){
             $memo_kepada = self::getParentsNames($struktur_parent,$data_struktur_array);
         }else{
             $struktur_parent_parent = Struktur::where('id',$struktur_parent)->pluck('parent_id');
             $memo_kepada = self::getParentsNames($struktur_parent_parent,$data_struktur_array);
         }
         $_memo_dari = self::getParentsNames($struktur_user,$data_struktur_array);
        
         $data_memo = Memo::find($id);
         $strukturs = Struktur::get();
         // print_r($data_nodin);
         // die();
         return view('pages.memos.form', [
             'action' => $action,
             'data_memo' => $data_nodin,
             'strukturs' => $strukturs,
             'memo_kepada'=>$memo_kepada,
             'memo_dari'=>$_memo_dari,
             'memo_pemeriksa'=>$_memo_dari,
         ]);
     }


    
    public function update(Request $request, $id)
    {
        // get memo
        $memo = Memo::find($id);
        $memo->dari = $request->dari;
        $memo->kepada = $request->kepada;
        $memo->pemeriksa = $request->pemeriksa;
        $memo->sifat = $request->sifat;
        $memo->urgensi = $request->urgensi;
        $memo->perihal = $request->perihal;
        $memo->isi = $request->isi;
        $memo->lampiran_memo = $request->lampiran_memo;
        $memo->status = $request->status;
        $memo->tembusan = $request->tembusan;
        $memo->reff = $request->reff;

        $memo->save();
        return redirect()->route('memo.index');
    }  


    public function destroy($id)
    {
        $memo = Memo::find($id);
        $memo->delete();
        return redirect()->route('memo.index');
    }



    
    //Report
    public function memoreport($id)
    {
        $action = 'action';
        $data_memos = Memo::find($id);
        
        return view('pages.memos.memoreport',[
           'action' => $action,
           'memos' => $data_memos,
           ]);
    }
   



   //Exsport to PDF

   public function cetakmemo()
    {

       $memos = Memo::all()->toArray();
       $pdf = PDF::loadView('pages.memos.cetakmemo', ['memos' => $memos])->setOptions(['defaultFont' => 'sans-serif']);

       $pdf->setPaper('A4', 'potrait');
       return $pdf->stream('memo.pdf');

   }




//    public function cetaknodin()
//    {
//       $nodins = Nodin::all()->toArray();
//       //dd($nodins);
//       $pdf = PDF::loadView('pages.nodins.cetaknodin', ['nodins' => $nodins])->setOptions(['defaultFont' => 'sans-serif']);

//       $pdf->setPaper('A4', 'potrait');

//       return $pdf->stream('nodin.pdf');

//   }


}





