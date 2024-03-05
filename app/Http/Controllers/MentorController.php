<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasantri;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public $mentor;
    public $mahasantri;
    public $setoran;
    public function __construct()
    {
        $this->mentor = new User();
        $this->mahasantri = new Mahasantri();
        $this->setoran = new Setoran();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = Auth::user()->id; 
        $mahasantri = DB::table('mahasantri')->where('mentor_id', '=', $id)->Paginate(5);
        $no = 5 * ($mahasantri->currentPage() - 1);
        return view("mentor.index",compact('mahasantri', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function setoran(string $id)
    {
        $mahasantri = Mahasantri::findOrFail($id);
        $setoran = Setoran::where('mahasantri_id', '=', $id)->Paginate(5);
        $no = 5 * ($setoran->currentPage() - 1);
        return view('mentor/setoran', compact('setoran', 'no','mahasantri'));
    }

    public function createmhs()
    {
        return view('mentor/createmhs');
    }

    public function createstr(string $id)
    {
        $mahasantri = Mahasantri::findOrFail($id);
        return view('mentor/createstr', compact('mahasantri'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storemhs(Request $request)
    {
        $rules = [
            // format penulisan untuk field yang unil = unique:nama_tabel,field_tabel
            'nim' => 'required|min:3|max:20|unique:mahasantri,nim',
            'nama' => 'required|min:3|max:20|unique:mahasantri,nama_mhs',
        ];

        // bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain'
        ];

        $this->validate($request, $rules, $messages);
        $this->mahasantri->nama_mhs = $request->nama;
        $this->mahasantri->nim = $request->nim;
        $this->mahasantri->mentor_id = $request->mid;
        $this->mahasantri->save(); 

        return redirect()->route('mentor.index');
    }

    public function storestr(Request $request)
    {
        $rules = [
            // format penulisan untuk field yang unil = unique:nama_tabel,field_tabel
            'juz' => 'required',
            'nilai' => 'required',
            'hal' => 'required',
            'ket' => 'required',
            'tanggal' => 'required',
        ];

        // bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => ':attribute sudah ada, silahkan gunakan yang lain'
        ];

        $this->validate($request, $rules, $messages);
        $this->setoran->juz = $request->juz;
        $this->setoran->nilai = $request->nilai;
        $this->setoran->tanggal = $request->tanggal;
        $this->setoran->keterangan = $request->ket;
        $this->setoran->halaman = $request->hal;
        $this->setoran->mahasantri_id = $request->mid;
        $this->setoran->save(); 

        return redirect()->route('mentor.setoran', $request->mid);
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroymhs(string $id)
    {
        $setoran = Setoran::where('mahasantri_id', '=', $id)->count();
        $mahasantri = Mahasantri::find($id);

        if ($setoran == 0) {
            $mahasantri->delete();
            Alert::success('Sukses', 'Data Berhasil di Hapus');
        } else {
            Alert::warning('Maaf', 'Hapus data setoran yang dimiliki mahasantri ini dahulu');
        }

        return redirect()->route('mentor.index');
    }
}
