<?php

namespace App\Http\Controllers;

use App\Models\scope_categories;
use Illuminate\Http\Request;
Use Alert;


class ScopeCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scope_categories = scope_categories::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.scope.index', compact(['scope_categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.scope.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $createScopeCategories = scope_categories::create([
            'scs_level' => $request->scs_level,
            'scs_number' => $request->scs_number
        ]);
        Alert::success('Berhasil Menambah', 'Berhasil menambahkan kategori lingkup wilayah');

        return redirect('/admin/scope_category');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(scope_categories $scope_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(scope_categories $scope_categories, $id)
    {
        $editScopeCategories = scope_categories::findOrFail($id);        
        return view('admin.scope.edit',compact(['editScopeCategories']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, scope_categories $scope_categories, $id)
    {
        $updateScopeCategories = scope_categories::findOrFail($id); 
        $updateScopeCategories->scs_level = $request->scs_level;
        $updateScopeCategories->scs_number = $request->scs_number;
        $updateScopeCategories->save();
        return redirect('/admin/scope_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(scope_categories $scope_categories, $id)
    {
        $destroyScopeCategories = scope_categories::findOrFail($id);
        //dd ($destroyScopeCategories);
        $destroyScopeCategories->delete();
        return redirect('/admin/scope_category');
    }
}
