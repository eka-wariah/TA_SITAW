<?php

namespace App\Http\Controllers;

use App\Models\payment_categories;
use Illuminate\Http\Request;
Use Alert;

class PaymentCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_categories = payment_categories::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.payment_category.index', compact(['payment_categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createPaymentCategories = payment_categories::create([
            'pyc_name' => $request->pyc_name,
            'pyc_price' => $request->pyc_price,
        ]);
        Alert::success('Berhasil Menambah', 'Berhasil menambahkan kategori lingkup wilayah');

        return redirect('/admin/payment_category');
    }

    /**
     * Display the specified resource.
     */
    public function show(payment_categories $payment_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(payment_categories $payment_categories, $id)
    {
        $editPaymentCategories = payment_categories::findOrFail($id);        
        return view('admin.payment_category.edit',compact(['editPaymentCategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, payment_categories $payment_categories, $id)
    {
        $updatePaymentCategories = payment_categories::findOrFail($id); 
        $updatePaymentCategories->pyc_name = $request->pyc_name;
        $updatePaymentCategories->pyc_price = $request->pyc_price;
        $updatePaymentCategories->save();
        return redirect('/admin/payment_category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(payment_categories $payment_categories, $id)
    {
        $destroyPaymentCategories = payment_categories::findOrFail($id);
        //dd ($destroyScopeCategories);
        $destroyPaymentCategories->delete();
        return redirect('/admin/payment_category');
    }
}
