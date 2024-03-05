<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public $mentor;

     public function __construct()
     {
         $this->mentor = new User();
     }
    public function index()
    {
        $mentor=Mentor::where('role', '=', 'm')->Paginate(5);
        $no = 5 * ($mentor->currentPage() - 1);
        return view("user.index",compact('mentor', 'no'));
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
            'nama_kategori' => 'required|min:3|max:20|unique:kategori,kategori',
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
        $this->kategori->kategori = $request->nama_kategori;

        //lalu simpan ke database
        $this->kategori->save();

        Alert::success('Success Title', 'Success Message');


        //redirect
        return redirect()->route('kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mentor = Kategori::findOrFail($id);

        // buat ngecek data terkirim atau nggak
        // dd($mentor);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mentor = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Kategori::findOrFail($id);
        //cel ada perubahan atau nggak
        //isDirty() buat ngecek field tabel ada perubahan atau nggak
        //dengan kiriman data dari from
        $update->kategori = $request->nama_kategori;
        if ($update->isDirty()) {
            echo "ada perubahan";
        } else {
            echo "tidak ada perubahan";
        }

        $rules = [
            'kategori' => 'required|min:3|max:20|unique:kategori,kategori',
        ];

        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => "attribut sudah ada, gunakan yang lain"
        ];

        $this->validate($request, $rules, $messages);

        // Update data berdasarkan ID
        $mentor = Kategori::findOrFail($id);
        $mentor->kategori = $request->kategori;
        $mentor->save();

        Alert::success('Success Title', 'Success Message');

        return redirect()->route('kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //ngaaaaapus data
        //ambil data sesuai IDnya
        $mentor = Kategori::findOrFail($id);
        //buat fungsi ngapus data
        $mentor->delete();

        Alert::success('Successpull', 'Data berhasil di hapus');
        //redirect halaman
        return redirect()->route('kategori');
    }
}
