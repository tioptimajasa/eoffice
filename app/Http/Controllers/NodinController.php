<?php

namespace App\Http\Controllers;

use App\Models\Nodin;
use App\Models\Struktur;
use App\Models\User;
use App\Models\PemeriksaNodin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Routes\web;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use PDF;
use DOMDocument;



class NodinController extends Controller
{
    
  

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nodins = Nodin::orderBy('created_at', 'DESC')->get();
        return view('pages.nodins.index', [
            'nodins' => $nodins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
            $nodin_kepada = self::getParentsNames($struktur_parent,$data_struktur_array);
        }else{
            $struktur_parent_parent = Struktur::where('id',$struktur_parent)->pluck('parent_id');
            $nodin_kepada = self::getParentsNames($struktur_parent_parent,$data_struktur_array);
        }
        $_nodin_dari = self::getParentsNames($struktur_user,$data_struktur_array);
       
        $strukturs = Struktur::get();  
        return view('pages.nodins.form', [
            'action' => $action,
            'strukturs'=>$strukturs,
            'nodin_dari'=>$_nodin_dari,
            'nodin_kepada'=>$nodin_kepada,
            'nodin_pemeriksa'=>$_nodin_dari,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        if(!empty($request->file('lampiran_nodin'))){
            $file = $request->file('lampiran_nodin');
            $folder_destinations = 'storage/lampiran_nodin';
            $file->move($folder_destinations,$file->getClientOriginalName());
        }
        $struktur = User::where('id', Auth::user()->id)->first('struktur_id');
        
        $notadinas = Struktur::where('id', $struktur->struktur_id)->first('patern_nota');
        $patern_notadinas = $notadinas->patern_nota;

        $max_id = Nodin::max('nomor');
        $nomor = (empty($max_id)?1:$max_id+1);
        $nomor_generate = "e-".str_replace("{no}",$nomor,str_replace("{year}",date('Y'),str_replace("{month}",$this->getRomawi(date('m')),$patern_notadinas)));
        $id_generate = Str::uuid();
        $isi = $request->isi;
        $dom = new \domdocument();
        $isi_detail = @$dom->loadHtml($isi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $isi_detail = $dom->saveHTML();
        
        Nodin::create([
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
            'lampiran_nodin' =>  $folder_destinations . '/' . $file->getClientOriginalName(),
            'status' => $request->status,
            'reff' => $request->reff,
            // 'tembusan' => $request->tembusan,

        ]);
        $urutan = 1;
        foreach ($request->pemeriksa as $_pemeriksa) {
           
            $user_pemeriksa = User::where('struktur_id',$_pemeriksa)->pluck('id');
            PemeriksaNodin::create([
                'nodin_id'=> $id_generate,
                'user_id' => $user_pemeriksa,
                'struktur_id'=> $_pemeriksa,
                'urutan'=>$urutan,
            ]);
            $urutan++;
        }
        return redirect()->route('nodin.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nodin  $nodin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $data_struktur_array = [];
        
        $struktur_user = User::where('id',Auth::user()->id)->pluck('struktur_id');
        $struktur_parent = Struktur::where('id',$struktur_user)->pluck('parent_id');
        $parent_user = User::where('struktur_id',$struktur_parent)->pluck('name');
        if(count($parent_user)>0 ){
            $nodin_kepada = self::getParentsNames($struktur_parent,$data_struktur_array);
        }else{
            $struktur_parent_parent = Struktur::where('id',$struktur_parent)->pluck('parent_id');
            $nodin_kepada = self::getParentsNames($struktur_parent_parent,$data_struktur_array);
        }
        $_nodin_dari = self::getParentsNames($struktur_user,$data_struktur_array);
       
        $data_nodin = Nodin::find($id);
        $strukturs = Struktur::get();
        // print_r($data_nodin);
        // die();
        return view('pages.nodins.form', [
            'action' => $action,
            'data_nodin' => $data_nodin,
            'strukturs' => $strukturs,
            'nodin_kepada'=>$nodin_kepada,
            'nodin_dari'=>$_nodin_dari,
            'nodin_pemeriksa'=>$_nodin_dari,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nodin  $nodin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get nodin
        $nodin = Nodin::find($id);
        $nodin->dari = $request->dari;
        $nodin->kepada = $request->kepada;
        $nodin->pemeriksa = $request->pemeriksa;
        $nodin->sifat = $request->sifat;
        $nodin->urgensi = $request->urgensi;
        $nodin->perihal = $request->perihal;
        $nodin->isi = $request->isi;
        $nodin->lampiran_nodin = $request->lampiran_nodin;
        $nodin->status = $request->status;
        $nodin->tembusan = $request->tembusan;
        $nodin->reff = $request->reff;

        $nodin->save();
        return redirect()->route('nodin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nodin  $nodin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nodin = Nodin::find($id);
        $nodin->delete();
        return redirect()->route('nodin.index');
    }

    //Report


    //Report



        
    public function nodinreport($id)
    {
       $action = 'action';
       $data_nodins = Nodin::find($id);
    //   print_r($data_nodins);
    //   die();
       return view('pages.nodins.nodinreport',[
           'action' => $action,
           'nodins' => $data_nodins,
           ]);
    }


    
   public function cetaknodin()
   {
      $nodins = Nodin::all()->toArray();
      //dd($nodins);
      $pdf = PDF::loadView('pages.nodins.cetaknodin', ['nodins' => $nodins])->setOptions(['defaultFont' => 'sans-serif']);

      $pdf->setPaper('A4', 'potrait');

      return $pdf->stream('laporan.pdf');

  }
   


    
   //Exsport to PDF

//    public function cetaknodin($id)
//     {
//        $nodins = Nodin::where('id',$id)->pluck('id');
//        die();
//        $pdf = PDF::loadView('pages.nodins.cetaknodin', ['nodins' => $nodins])->setOptions(['defaultFont' => 'sans-serif']);

//        $pdf->setPaper('A4', 'potrait');

//        return $pdf->stream('nodin.pdf');

//    }



}
