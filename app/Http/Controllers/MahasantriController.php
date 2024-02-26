<?php

namespace App\Http\Controllers;

use App\Models\Mahasantri;
use Illuminate\Http\Request;

class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        //
        $mahasantri = Mahasantri::all();
        return view("mahasantri.index" ,compact("mahasantri"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasantri.create');
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
    public function show(Mahasantri $mahasantri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasantri $mahasantri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasantri $mahasantri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasantri $mahasantri)
    {
        //
    }
}
