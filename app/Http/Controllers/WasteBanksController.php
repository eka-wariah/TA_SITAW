<?php

namespace App\Http\Controllers;
use App\Models\waste_banks;
use App\Models\trash_categories;
use App\Models\User;
use Illuminate\Http\Request;
Use Alert;

class WasteBanksController extends Controller
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
        $trash_categories = trash_categories::all();
        $users = User::all();
        return view('admin.waste_bank.create', compact('trash_categories', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'usr_id' => 'required|exists:users,usr_id',
            'trc_id' => 'required|exists:trash_categories,trc_id',
            'wtb_total_wate' => 'required|numeric',
            'wtb_total_money' => 'nullable|numeric',
        ]);
    

        $waste_banks = waste_banks::create([
            'wtb_name_id'     => $request->usr_id,
            'wtb_category_trash_id'  => $request->trc_id,
            'wtb_total_wate'    => $request->wtb_total_wate,
            //'wtb_total_money'    => $request->wtb_total_money,

            
        ]);
        $waste_banks->refresh();  // Refresh model untuk mendapatkan nilai wtb_total_money setelah perhitungan
    $user = $waste_banks->user;
    if ($user) {
        $user->total_money += $waste_banks->wtb_total_money;
        $user->save();
    }


            Alert::success('Berhasil Menambah', 'Jurusan Berhasil Ditambah');
            return redirect('/admin/waste_bank');
    }

    /**
     * Display the specified resource.
     */
    public function show(waste_banks $waste_banks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(waste_banks $waste_banks, $id)
    {
        $editWasteBanks = waste_banks::findOrFail($id); 
        $trash_categories = trash_categories::all();
        $users = User::all();       
        return view('admin.waste_bank.edit',compact(['editWasteBanks', 'trash_categories', 'users']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, waste_banks $waste_banks, $id)
    {
        $updateWasteBanks = waste_banks::findOrFail($id); 
        $updateWasteBanks->wtb_name_id = $request->usr_id;
        $updateWasteBanks->wtb_category_trash_id = $request->trc_id;
        $updateWasteBanks->wtb_total_wate=$request->wtb_total_wate;
        $updateWasteBanks->save();
        return redirect('/admin/waste_bank');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(waste_banks $waste_banks, $id)
    {
        $destroyWasteBanks = waste_banks::findOrFail($id);
        //dd ($destroyScopeCategories);
        $destroyWasteBanks->delete();
        return redirect('/admin/waste_bank');
    }
}
