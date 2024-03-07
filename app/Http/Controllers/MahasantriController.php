<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Setoran;
use App\Models\User;
use App\Models\Mahasantri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class MahasantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //
        $mahasantri = Mahasantri::paginate(10);
        $no = 10 * ($mahasantri->currentPage() - 1);
        return view("mahasantri.index", compact('mahasantri','no'));
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
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

        return redirect()->route("mahasantri.index");
    }


    /**
     * Display the specified resource.
     */
    public function show(Mahasantri $mahasantri)
    {
        $setoran = Setoran::all()->where("mahasantri_id","=",$mahasantri->id);
        return view("mahasantri.show", compact('mahasantri','setoran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasantri $mahasantri)
    {
        //
        $mentor = User::all()->where("role","=","m");
        return view("mahasantri.edit",compact('mahasantri','mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasantri $mahasantri)
    {
        $rules = [
            'nim' => 'required|numeric|',
            'nama_mhs' => 'required',
            'mentor_id' => 'required|exists:user,id',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus berupa angka',
            'exists' => ':attribute tidak valid',
            'image' => ':attribute harus berupa file gambar',
            'mimes' => 'Ekstensi :values tidak didukung, gunakan yang lain',
            'max' => 'Ukuran :attribute tidak boleh melebihi :max KB',
        ];
        $mahasantri = Mahasantri::findOrFail($mahasantri->id);
        $val = $request->validate($rules, $messages);
        if ($request->file('gambar')){
            File::delete($mahasantri->gambar);
            $filename = time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('upload'),$filename);    
            $val['gambar']= $filename;    
        }
        $mahasantri->nim = $val['nim'];
        $mahasantri->nama_mhs = $val['nama_mhs'];
        $mahasantri->mentor_id = $val['mentor_id'];
        $mahasantri->save();

        return redirect()->route("mahasantri.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasantri $mahasantri)
    {
        //
        $path = public_path("upload/") . $mahasantri->gambar;
        if (File::exists($path)) {
            File::delete($path);
        }
        $mahasantri->delete();
        return redirect()->route('mahasantri.index');
    }
}
