<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolesAkses;
use App\Models\Struktur;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_roles = RolesAkses::get();
        $strukturs = Struktur::get();
        return view('pages.roles.index', ['data_roles' => $data_roles, 'strukturs'=>$strukturs]);
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
        $array_role = array('superuser'=>'SuperUser','admin'=>'admin','direktur'=>'Direktur','generalmanager'=>'General Manager','manager'=>'Manager','staff'=>'Staff');
        return view('pages.roles.form', [
            'action' => $action,
            'array_role' => $array_role,
            'strukturs'=> $strukturs,
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
        RolesAkses::create(['id'=>Str::uuid(),'struktur_id' => $request->struktur_id,
                        'role'=>$request->role,
        ]);
        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = 'edit';
        $listrole = RolesAkses::find($id);
        $strukturs = Struktur::get();
        $array_role = array('superuser'=>'SuperUser','admin'=>'admin','direktur'=>'Direktur','generalmanager'=>'General Manager','manager'=>'Manager','staff'=>'Staff');
        return view('pages.roles.form', [
            'action' => $action,
            'listrole' => $listrole,
            'array_role'=>$array_role,
            'strukturs'=> $strukturs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = RolesAkses::find($id);
        $role->role = $request->role;
        $role->struktur_id = $request->struktur_id;
        $role->save();
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = RolesAkses::find($id);
        $role->delete();
        return redirect()->route('role.index');
    }
}
