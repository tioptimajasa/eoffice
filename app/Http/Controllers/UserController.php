<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Struktur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected $forms = [
        [
            "name" => "name",
            "type" => "text",
            "required" => false,
            "title" => "Name",
            "id" => "name",
            "placeholder" => "Enter name",
            "value" => "",
            "readonly" => false,
        ],
        [
            "name" => "email",
            "type" => "text",
            "required" => false,
            "title" => "Email",
            "id" => "email",
            "placeholder" => "Enter Email",
            "value" => "",
            "readonly" => false,
        ],


        [
            "name" => "struktur_id",
            "type" => "text",
            "required" => false,
            "title" => "Struktur",
            "id" => "struktur_id",
            "placeholder" => "Enter Struktur",
            "value" => "",
            "readonly" => false,
        ],

        [
            "name" => "role",
            "type" => "text",
            "required" => false,
            "title" => "Role",
            "id" => "role",
            "placeholder" => "Enter Role",
            "value" => "",
            "readonly" => false,
        ],


        [
            "name" => "password",
            "type" => "password",
            "required" => false,
            "title" => "Password",
            "id" => "password",
            "placeholder" => "Enter password",
            "value" => "",
            "readonly" => false,
        ],

        [
            "name" => "upload_data",
            "type" => "file",
            "required" => false,
            "title" => "Upload Data",
            "id" => "upload_data",
            "placeholder" => "Enter Upload Data",
            "value" => "",
            "readonly" => false,
        ],

        
    ];

    public function index()
    {
        $users = User::get();
        return view('pages.users.index', ['users' => $users]);
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
        return view('pages.users.form', [
            'action' => $action,
            'forms' => $this->forms,
            'strukturs'=>$strukturs,
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
        $file = $request->file('upload_data');
        $folder_destinations = 'storage/uploads';
        $file->move($folder_destinations,$file->getClientOriginalName());

       
            User::create([
            'id' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'departemen' => $request->departemen,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'upload_data' => $folder_destinations . '/' . $file->getClientOriginalName(),
            
        ]);
        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = 'view';
        $user = User::find($id);

        $this->forms[0]["readonly"] = true;
        $this->forms[0]["value"] = $user->name;
        $this->forms[1]["readonly"] = true;
        $this->forms[1]["value"] = $user->email;
        $this->forms[2]["readonly"] = true;
        $this->forms[2]["value"] = $user->departemen;
        $this->forms[3]["readonly"] = true;
        $this->forms[3]["value"] = $user->role;
        $this->forms[4]["readonly"] = true;
        $this->forms[4]["value"] = $user->password;
        $this->forms[5]["readonly"] = true;
        $this->forms[5]["value"] = $user->upload_data;
        // dd($this->forms);
        return view('pages.users.form', [
            'action' => $action,
            'user' => $user,
            'forms' => $this->forms
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $user = User::find($id);
        $strukturs = Struktur::get();
    //    dd($strukturs);
        // $this->forms[0]["value"] = $user->name;
        // $this->forms[1]["value"] = $user->email;
        // $this->forms[2]["value"] = $user->departemen;
        // $this->forms[3]["value"] = $user->role;
        // $this->forms[4]["value"] = $user->password;
        // $this->forms[5]["value"] = $user->upload_data;
      
        return view('pages.users.form', [
            'action' => $action,
            'user' => $user,
            'strukturs'=> $strukturs,
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->struktur_id = $request->struktur_id;
        $user->upload_data = $request->upload_data;


        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
