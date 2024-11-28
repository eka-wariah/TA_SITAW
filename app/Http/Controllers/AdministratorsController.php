<?php

namespace App\Http\Controllers;

use App\Models\administrators;
use Illuminate\Http\Request;

class AdministratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.administrator.index');
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
    public function show(administrators $administrators)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(administrators $administrators)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, administrators $administrators)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(administrators $administrators)
    {
        //
    }
}
