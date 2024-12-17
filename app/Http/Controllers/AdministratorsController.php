<?php

namespace App\Http\Controllers;

use App\Models\administrators;
use App\Models\User;
use App\Models\scope_categories;
use Illuminate\Http\Request;
use Alert;

class AdministratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrators = administrators::all();
        $scope_categories = scope_categories::all();
        $users = User::all();
        return view('admin.administrator.index', compact(['administrators', 'scope_categories', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $administrators = administrators::all();
        $scope_categories = scope_categories::all();
        // dd($scope_categories);
        $users = User::all();
        return view('admin.administrator.create', compact('administrators', 'users', 'scope_categories' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request);
        $createadministrators = administrators::create([
        'adm_name_id' => $request->usr_id,
        'adm_scope_management_id' => $request->scs_id,
        ]);
        Alert::success('Berhasil Menambah', 'Berhasil menambahkan kategori lingkup wilayah');

        return redirect('/admin/administrator');
    }

    /**
     * Display the specified resource.
     */
    public function show(administrators $administrators)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(administrators $administrators, $id)
    {
        $editadministrators = administrators::findOrFail($id); 
        $scope_categories = scope_categories::all();
        $users = User::all();       
        // dd($editadministrators);
       return view('admin.administrator.edit',compact(['editadministrators', 'scope_categories', 'users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, administrators $administrators, $id)
    {
        $updateadministrator = administrators::findOrFail($id); 
        $updateadministrator->adm_name_id = $request->usr_id;
        $updateadministrator->adm_scope_management_id = $request->scope_id;
        $updateadministrator->save();
        return redirect('/admin/administrator');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrators $administrators)
    {
        //
    }
}
