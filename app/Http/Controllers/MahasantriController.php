<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view("mahasantri.index", compact("mahasantri"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        //
        $user = User::all()->where("role", '=', "m");
        return view('mahasantri.create', compact("user"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nim' => 'required|numeric|unique:mahasantri',
            'nama_mhs' => 'required',
            'mentor_id' => 'required|exists:user,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation for the image upload
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

        $val = $request->validate($rules, $messages);
        $filename = time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
        $request->file('gambar')->move(public_path('upload'), $filename);
        $mahasantri = new Mahasantri;
        $mahasantri->nim = $val['nim'];
        $mahasantri->nama_mhs = $val['nama_mhs'];
        $mahasantri->mentor_id = $val['mentor_id'];
        $mahasantri->gambar = $filename;
        $mahasantri->save();

        return redirect()->route("mahasantri.index")->with('success', 'Data mahasantri berhasil disimpan');
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
