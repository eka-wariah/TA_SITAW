<?php

namespace App\Http\Controllers;

use App\Models\members;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
Use Alert;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::all(); 
        $user = Auth::user(); // Get the currently authenticated user
        $userId = $user ? $user->usr_id : null; // Safely get the user's ID
        $user_name = Auth::user()->name;
        $user_email = Auth::user()->email;

        
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        
        return view('admin.member.index', compact('userId', 'user_name', 'user_email'));
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
    public function show(members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(members $members)
    {
        //
    }
}
