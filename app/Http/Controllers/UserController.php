<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasantri;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $mentor;
    public $mahasantri;

    public function __construct()
    {
        $this->mentor = new User();
        $this->mahasantri = new Mahasantri();
    }
    public function index()
    {
        $mentor = User::where('role', '=', 'm')->Paginate(5);
        $no = 5 * ($mentor->currentPage() - 1);
        return view("user.index", compact('mentor', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            //format penulisan untuk field yang unik = unique:nama_tabel,field_tabel
            'nama_mentor' => 'required|min:3|max:20|unique:mentor,mentor',
            // 'jenis' => 'required|max:20|unique'
        ];
        //bikin pesan error
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => "attribut sudah ada, gunakan yang lain"
        ];

        //eksekusi fungsinya
        $this->validate($request, $rules, $messages);
        //pasangkan ke field tabelnya dengan kiriman user
        $this->mentor->mentor = $request->nama_mentor;

        //lalu simpan ke database
        $this->mentor->save();

        Alert::success('Success Title', 'Success Message');


        //redirect
        return redirect()->route('mentor');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor = User::findOrFail($id);

        // buat ngecek data terkirim atau nggak
        // dd($mentor);
        return view('mentor.show', compact('mentor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = User::findOrFail($id);

        return view('mentor.edit', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = User::findOrFail($id);
        //cel ada perubahan atau nggak
        //isDirty() buat ngecek field tabel ada perubahan atau nggak
        //dengan kiriman data dari from
        $update->mentor = $request->nama_mentor;
        if ($update->isDirty()) {
            echo "ada perubahan";
        } else {
            echo "tidak ada perubahan";
        }

        $rules = [
            'mentor' => 'required|min:3|max:20|unique:mentor,mentor',
        ];

        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => "attribut sudah ada, gunakan yang lain"
        ];

        $this->validate($request, $rules, $messages);

        // Update data berdasarkan ID
        $mentor = User::findOrFail($id);
        $mentor->mentor = $request->mentor;
        $mentor->save();

        Alert::success('Success Title', 'Success Message');

        return redirect()->route('mentor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //ngaaaaapus data
        //ambil data sesuai IDnya
        $mentor = User::findOrFail($id);
        //buat fungsi ngapus data
        $mentor->delete();

        Alert::success('Successpull', 'Data berhasil di hapus');
        //redirect halaman
        return redirect()->route('mentor');
    }
}
