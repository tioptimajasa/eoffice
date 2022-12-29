<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Routes\web;


use App\Http\Controllers\Controller;

// use Illuminate\Support\Facades\Hash;



class StrukturController extends Controller
{


    protected $forms = [
        [
            "name" => "nama_organisasi",
            "type" => "text",
            "required" => false,
            "title" => "Nama Organisasi",
            "id" => "name",
            "placeholder" => "Enter organisasi",
            "value" => "",
            "readonly" => false,
        ],
        [

            "name" => "jabatan",
            "type" => "text",
            "required" => false,
            "title" => "Nama Jabatan",
            "id" => "name",
            "placeholder" => "Enter jabatan",
            "value" => "",
            "readonly" => false,         
        ],
                 
    ];

    protected $primaryKey = 'id';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $strukturs = Struktur::get();
        // dd($strukturs);
        // echo $strukturs->parent;
        // dd($strukturs->parent);
        return view('pages.strukturs.index', [
            'strukturs' => $strukturs
        ]);



    }

    public function diagram()
    {
        $strukturs = Struktur::get()->toArray();
        
        $data_diagram ="";
        $posisi ="";
        $data_id = "";
        $parent="";
        $config_id="";
        
        foreach ($strukturs as $key => $val) {
            $turun="";
            $tambahan="";
            $flag_spi="";
            $flag_rm="";
            foreach ($val as $keyy => $value) {
        
                if($keyy=="id"){
                    $data_id = "POJ".$value."POJ";
                    $nama_pegawai = User::where('struktur_id', $value)->value('name');
                    $foto_pegawai = User::where('struktur_id', $value)->value('upload_data');
                    if($foto_pegawai!=""){
                        $_foto_pegawai= "image: '/".$foto_pegawai."',";
                        $vacant = "";
                    }else{
                        $_foto_pegawai= "image: '/storage/profile/no_photo.jpeg',";
                        $vacant ='desc: "Vacant",';
                    }
                    
                    $config_id .= "
                    POJ".$value."POJ,";
                }
                if($keyy=="kategori"){
                    if($value!=1){
                        $nama_pegawai ="";
                        $_foto_pegawai = "";
                    }
                }
               
                if($keyy=="nama_organisasi"){
                    $posisi = $value;
                }
                if($keyy=="jabatan"){
                    $posisi = $value." ".$posisi;
                }
                if($keyy=="jabatan" && $value=="Kepala"){
                    $flag_spi = 1;
                    $tambahan = 'KSPI = {
                        parent:POJ1POJ,
                        text:{ 
                            name: "test", 
                            title:"'.$posisi.'",
                            
                        },
                        image: "../headshots/5.jpg",
                        pseudo:true,
                    },';
                }
                if($keyy=="jabatan" && $value=="Regional Manager"){
                    $flag_rm = 1;
                    $tambahan = 'RM = {
                        parent:POJ2POJ,
                        text:{ 
                            name: "test", 
                            title:"'.$posisi.'",
                        },
                        image: "../headshots/5.jpg",
                        pseudo:true,
                    },';
                }
                
                if($keyy=="parent_id"){
                    if(!empty($value)){
                        $parent = 'parent :POJ'.$value.'POJ,
                        stackChildren: true,';
                    }
                    
                }
            }
            if($flag_spi==1){
                $parent = "parent:KSPI,
                stackChildren: true,";
            }
            if($flag_rm==1){
                $parent = "parent:RM,
                stackChildren: true,";
            }
            
            $data_diagram .='
            '.$tambahan.'
            '.$data_id.' = {
                '.$parent.' 
                text:{ 
                    name: "'.$nama_pegawai.'", 
                    title:"'.$posisi.'",
                    '.$vacant.'
                    
                },
                '.$_foto_pegawai.'
                
                
            },
            ';
        }
        $config_id = substr($config_id,0,(strlen($config_id)-1));
        // $data_diagram =' 
        // var config = {
        //     container: "#basic-example",
            
        //     connectors: {
        //         type: \'step\'
        //     },
        //     node: {
        //         HTMLclass: "nodeExample1"
        //     }
        // },'.$data_diagram.'
        // chart_config = [
        //     config,'.$config_id.'];';
        $data_diagram = 'var config = {
            container: "#basic-example",
            
            connectors: {
                type: \'step\'
            },
            node: {
                HTMLclass: \'nodeExample1\'
            }
        },
        '.$data_diagram.'
    
        chart_config = [
            config,
            '.$config_id.',
            KSPI,
            RM
        ];';
        
        return view('pages.strukturs.diagram', [
            'strukturs' => $strukturs,
            'data_diagram'=>$data_diagram,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $action = 'create';
        $strukturs = Struktur::get();
        return view('pages.strukturs.form', [
            'action' => $action,
            'strukturs'=>$strukturs,
            'data_struktur'=>"",
            // 'forms' => $this->forms

        ]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */


    public function store(Request $request)
    {   
        Struktur::create([
            'nama_organisasi' => $request->nama_organisasi,
            'jabatan' => $request->jabatan,
            'parent_id' => $request->parent_id,
            'kategori' => $request->kategori,
            'patern_memo' => $request->patern_memo,
            'patern_nota' => $request->patern_nota,
            'patern_surat' => $request->patern_surat,
           

        ]);
        return redirect()->route('struktur.index');
      
    }



    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Struktur 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $data_struktur = Struktur::find($id);
        $strukturs = Struktur::get();  
        // $this->forms[0]["value"] = $data_struktur->nama_organisasi;
        // $this->forms[1]["value"] = $data_struktur->jabatan;

        return view('pages.strukturs.form', [
            'action' => $action,
            'strukturs' => $strukturs,
            'forms' => $this->forms,
            'data_struktur' => $data_struktur,
        ]);
    }




     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $struktur = Struktur::find($id);
        $struktur->nama_organisasi = $request->nama_organisasi;
        $struktur->jabatan = $request->jabatan;
        $struktur->parent_id = $request->parent_id;
        $struktur->kategori = $request->kategori;
        $struktur->patern_memo = $request->patern_memo;
        $struktur->patern_nota = $request->patern_nota;
        $struktur->patern_surat = $request->patern_surat;
       
        $struktur->save();
        return redirect()->route('struktur.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struktur  $user
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $struktur = Struktur::find($id);
        $struktur->delete();
        return redirect()->route('struktur.index');
    }


    
}
