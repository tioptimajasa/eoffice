<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         
            [ 
                'id'=>Str::uuid(),    
                'name'=>'A Sigit Agung Wibowo',
                'email'=>'sigitwibowo@optimajasa.co.id',
                'struktur_id'=>'7',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/sigit.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Aci Yuliani',
                'email'=>'aci.yuliani@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P942100080.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Agus Priyabodo',
                'email'=>'aguspriyabodo@optimajasa.co.id',
                'struktur_id'=>'1',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P80021.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Agus Wawan Kurniawan',
                'email'=>'wawan.kurniawani@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K862107962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Agus Satriawan Nugraha',
                'email'=>'akbar.satriawan@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/K962108999.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Andri Prayogo',
                'email'=>'andriprayogo@optimajasa.co.id',
                'struktur_id'=>'14',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P821900034.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Andri Surya Atmaja',
                'email'=>'andrisurya@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/P842200098.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Andy Wiyaja',
                'email'=>'andy.wijaya@optimajasa.co.id',
                'struktur_id'=>'8',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K772107962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Anis Putri Kusuma',
                'email'=>'anis@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/P911900009.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Antonius Eka Wibowo',
                'email'=>'anton.eka@optimajasa.co.id',
                'struktur_id'=>'16',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P791900025.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Ari Wiguna',
                'email'=>'ari.wiguna@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K902107963.jpg'  

            ],
           
            [
                'id'=>Str::uuid(),
                'name'=>'Budi Windyaguna',
                'email'=>'budhi@optimajasa.co.id',
                'struktur_id'=>'39',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/P821900003.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dalia Trihandayani',
                'email'=>'dalia@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P852200097.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Damar Wicaksono',
                'email'=>'damar@optimajasa.co.id',
                'struktur_id'=>'10',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/P841900002.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dandi Prastomo',
                'email'=>'dandiprasmoni@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K982107965.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Desy Sarah Tarigan',
                'email'=>'desy@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P942000071.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dewi Damayanti',
                'email'=>'dewi@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P842000055.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dinanti Hayyina Putri',
                'email'=>'dinan@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P962200095.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Doddy Kurnia Putra',
                'email'=>'doddy@optimajasa.co.id',
                'struktur_id'=>'39',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/P881900005.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dodik Sugeng Hariadi',
                'email'=>'dodik@optimajasa.co.id',
                'struktur_id'=>'4',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/dodik.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Dony Ardiansyah',
                'email'=>'dony@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/P922200094.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Edo Widodo',
                'email'=>'edo.widodo@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K812107962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Eka Prasetya Husen',
                'email'=>'eka.prasetya@optimajasa.co.id',
                'struktur_id'=>'26',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K952207964.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Eviyani Maretha Purba',
                'email'=>'maretha@optimajasa.co.id',
                'struktur_id'=>'39',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K952107962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Ferri Fahd',
                'email'=>'ferifahd@optimajasa.co.id',
                'struktur_id'=>36,
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P962200100.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Fuad Riyadi',
                'email'=>'fuad.riyadi@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'),
                'upload_data' => 'storage/uploads/K962107967.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Hana Ragil Ayu Asmara',
                'email'=>'hannaragilayu@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K932207962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'I Wayan Sukerata',
                'email'=>'iwayansukerata@optimajasa.co.id',
                'struktur_id'=>'3',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K721900010.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Ida Bagus Ardita Keniten',
                'email'=>'idabagusardita@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K972207977.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Jojor Lima Nursari',
                'email'=>'jojor@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/P881900007.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Juniarto Parlindungan',
                'email'=>'juniarto@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),
                'upload_data' => 'storage/uploads/P932000054.jpg'  

            ],

            [
                'id'=>Str::uuid(),
                'name'=>'Lucia Retna Widarti',
                'email'=>'lucia.retna@optimajasa.co.id',
                'struktur_id'=>'6',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P77267.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'M Bachtiar Ardhiyanto',
                'email'=>'tiar@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K902207978.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Mike Ariga Elsayrafl',
                'email'=>'mike@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K952009119.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Miyarna',
                'email'=>'miyarna@optimajasa.co.id',
                'struktur_id'=>'31',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P841900042.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Mochamad Nurhadi',
                'email'=>'nurhadi@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P892100078.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Mohammad Ruli Kusumaputra',
                'email'=>'mohammad.ruli@optimajasa.co.id',
                'struktur_id'=>'17',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K862207962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Nadia Fadila',
                'email'=>'nadia@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),
                'upload_data' => 'storage/uploads/K942009118.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Nadia Pramesti',
                'email'=>'nadia.pramesti@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K972107965.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Norita Valentini',
                'email'=>'norita@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/P881900006.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Novian Indra Jaya Pane',
                'email'=>'novianjaya@optimajasa.co.id',
                'struktur_id'=>'5',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P721900032.jpg'  

            ],
           
            [
                'id'=>Str::uuid(),
                'name'=>'Rama Fikli',
                'email'=>'rama.fikli@optimajasa.co.id',
                'struktur_id'=>'39',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/K802208019.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Rando Winanto',
                'email'=>'rando.winanto@optimajasa.co.id',
                'struktur_id'=>'29',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K932107967.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Resha Rosita Ashari',
                'email'=>'resha@optimajasa.co.id',
                'struktur_id'=>'null',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K972000047.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Ricki Mardianto',
                'email'=>'ricki.mardianto@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K932006348.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Rizki Dian Saputro',
                'email'=>'rizkidian@optimajasa.co.id',
                'struktur_id'=>'37',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K902207962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Rizki Yulistyawan',
                'email'=>'rizki@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P871900004.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Rohmat Romadon',
                'email'=>'rohmat.romadon@optimajasa.co.id',
                'struktur_id'=>'30',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/K922107964.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Sariffudin',
                'email'=>'sariffudin@optimajasa.co.id',
                'struktur_id'=>'12',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P861900044.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Shadiya Freya Rosaline',
                'email'=>'shadiyafreya@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),   
                'upload_data' => 'storage/uploads/K982207962.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Siti Murti',
                'email'=>'murti@optimajasa.co.id',
                'struktur_id'=>'39',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P831900047.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Sofi arinda',
                'email'=>'sofi@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K962010000.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Suprapto',
                'email'=>'suprapto@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K241900010.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Suratno',
                'email'=>'nano@optimajasa.co.id',
                'struktur_id'=>'37',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P862100076.jpg'  
            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Surya Mahardika Aprilianto',
                'email'=>'surya@optimajasa.co.id',
                'struktur_id'=>null,
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/P911900036.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Syaiful Azhari',
                'email'=>'syaifulazhari@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K952009131.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Syamsul Jauhari',
                'email'=>'syamsul@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P922100077.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Uus Yuswandhika',
                'email'=>'uusyuswandhika@optimajasa.co.id',
                'struktur_id'=>'15',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/P741900033.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Widia Yuli Sevtiani',
                'email'=>'yuli@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'),  
                'upload_data' => 'storage/uploads/K942010000.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Yudha Gunawan',
                'email'=>'yuda@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K932000046.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'yul Afian',
                'email'=>'yulafian@optimajasa.co.id',
                'struktur_id'=>'2',
                'password' => Hash::make('admin123'), 
                'upload_data' => 'storage/uploads/K681900010.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Yunan Rizki',
                'email'=>'yunan@optimajasa.co.id',
                'struktur_id'=>'35',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/P941900043.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Yusuf Frengki',
                'email'=>'frengkysihotang@optimajasa.co.id',
                'struktur_id'=>'40',
                'password' => Hash::make('admin123'),    
                'upload_data' => 'storage/uploads/K892207976.jpg'  

            ],
            [
                'id'=>Str::uuid(),
                'name'=>'Zulfikar Rizki',
                'email'=>'zulfikar@optimajasa.co.id',
                'struktur_id'=>'36',
                'password' => Hash::make('admin123'),
                'upload_data' => 'storage/uploads/P891900050.jpg'  

            ],

            
            
           

           
        ]);
    }
}
