<?php

namespace App\Http\Controllers;

use App\Models\complaints;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $waste_banks = waste_banks::all();
        $users = User::all();
        $trash_categories = trash_categories::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('admin.waste_bank.index', compact(['waste_banks', 'users', 'trash_categories']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(complaints $complaints)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(complaints $complaints)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, complaints $complaints)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(complaints $complaints)
    {
        //
    }
}
