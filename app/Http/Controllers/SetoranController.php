<?php

namespace App\Http\Controllers;

use App\Models\Mahasantri;
use App\Models\User;
use App\Models\Setoran;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SetoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $mentor;
    public $mahasantri;
    public $setoran;
    public function __construct()
    {
        $this->mentor = new User();
        $this->mahasantri = new Mahasantri();
        $this->setoran = new Setoran();
    }

    public function index()
    {
        //
        $setoran = Setoran::Paginate(10);
        $no = 10 * ($setoran->currentPage() - 1);
        return view("setoran.index", compact('setoran', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $mahasantri = Mahasantri::all();
        return view("setoran.create", compact('mahasantri'));
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
        $setoran->nilai = $request->nilai;
        $setoran->halaman = $request->halaman;
        $setoran->keterangan = $request->keterangan;
        $setoran->mahasantri_id = $request->mahasantri;
        $setoran->save();
        Alert::success('Alhamdulillah', 'Data Berhasil di tambahkan');

        return redirect()->route("setoran.index");
    }

    /**
     * Display the specified resource.
     */
    public function show($setoran)
    {
        $setoran = Setoran::find($setoran);
        return view('setoran.show', compact('setoran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setoran $setoran)
    {
        $mahasantri = Mahasantri::all();
        return view('setoran.edit', compact("mahasantri", "setoran"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setoran $setoran)
    {
        $rules = [
            'mahasantri' => 'required',
            'juz' => 'required|max:30',
            'halaman' => 'required',
            'tanggal' => 'required',
            'nilai' => 'required',
            'keterangan' => 'required',
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus berupa angka',
            'max' => 'Ukuran :attribute tidak boleh melebihi :max KB',
        ];

        $request->validate($rules, $messages);
        $setoran = Setoran::findOrFail($setoran->id);
        $setoran->tanggal = $request->tanggal;
        $setoran->juz = $request->juz;
        $setoran->nilai = $request->nilai;
        $setoran->halaman = $request->halaman;
        $setoran->mahasantri_id = $request->mahasantri;
        $setoran->save();
        Alert::success('Alhamdulillah', 'Data Berhasil di Edit');

        return redirect()->route("setoran.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setoran $setoran)
    {
        $setoran->delete();
        Alert::success('Alhamdulillah', 'Data Berhasil di Hapus');
        return redirect()->route('setoran.index');
    }
}
