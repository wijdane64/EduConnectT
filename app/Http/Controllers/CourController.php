<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Http\Requests\StorecourRequest;
use App\Http\Requests\UpdatecourRequest;
use Illuminate\Http\Request;

class CourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return cour::all();

    }

    /**
     * Show the form for creating a new resource.
     */
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $infos = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'duree' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        $cour = cour::create($infos);
        return "kolchi mzyan";
    }

    /**
     * Display the specified resource.
     */
    public function show(cour $cour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cour $cour)
    {
        $infos = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'duree' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        
        $cour = $cour->update($infos);
        return "kolchi howa hadak";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cour $cour)
    {
        $cour->delete();
        return "mss7tih";
    }
}
