<?php

namespace App\Http\Controllers;

use App\Models\Mahasantri;
use App\Models\Setoran;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $setoran = Setoran::all();
        return view("setoran.index", compact('setoran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $mahasantri = Mahasantri::all();
        return view("setoran.create",compact( 'mahasantri'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'mahasantri' => 'required|',
            'juz' => 'required|max:30',
            'halaman' => 'required|',
            'status' => 'required|',
            'tanggal' => 'required|',
            'nilai' => 'required'
        ];

        $messages = [
                'required' => ':attribute tidak boleh kosong',
                'numeric' => ':attribute harus berupa angka',
                'unique' => ':attribute sudah digunakan',
                'exists' => ':attribute tidak valid',
                'image' => ':attribute harus berupa file gambar',
                'mimes' => 'Ekstensi :values tidak didukung, gunakan yang lain',
                'max' => 'Ukuran :attribute tidak boleh melebihi :max KB',
            ];

        $request->validate($rules, $messages);
        $setoran = new Setoran;
        $setoran->tanggal = $request->tanggal;
        $setoran->juz = $request->juz;
        $setoran->status = $request->status;
        $setoran->nilai= $request->nilai;
        $setoran->halaman = $request->halaman;
        $setoran->mahasantri_id = $request->mahasantri;
        $setoran->save();

        return redirect()->route("setoran.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Setoran $setoran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setoran $setoran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setoran $setoran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setoran $setoran)
    {
        //
    }
}
