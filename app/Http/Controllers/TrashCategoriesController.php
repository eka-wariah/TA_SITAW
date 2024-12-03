<?php

namespace App\Http\Controllers;

use App\Models\trash_categories;
use Illuminate\Http\Request;
Use Alert;

class TrashCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trash_categories = trash_categories::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.trash_category.index', compact(['trash_categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.trash_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $createTrashCategories = trash_categories::create([
            'trc_name' => $request->trc_name,
            'trc_price' => $request->trc_price,
        ]);
        Alert::success('Berhasil Menambah', 'Berhasil menambahkan kategori lingkup wilayah');

        return redirect('/admin/trash_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(trash_categories $trash_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trash_categories $trash_categories ,$id)
    {
        $editTrashCategories = trash_categories::findOrFail($id);        
        return view('admin.trash_category.edit',compact(['editTrashCategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trash_categories $trash_categories ,$id)
    {
        $updateTrashCategories = trash_categories::findOrFail($id); 
        $updateTrashCategories->trc_name = $request->trc_name;
        $updateTrashCategories->trc_price = $request->trc_price;
        $updateTrashCategories->save();
        return redirect('/admin/trash_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trash_categories $trash_categories, $id)
    {
        $destroyTrashCategories = trash_categories::findOrFail($id);
        //dd ($destroyScopeCategories);
        $destroyTrashCategories->delete();
        return redirect('/admin/trash_category');
    }
}
