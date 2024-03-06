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


    public function create()
    {
        return view('user.create');
    }


    public function store(Request $request)
    {
        $rules = [
            'nama_mentor' => 'required|min:3|max:20|unique:mentor,mentor',
        ];
   
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'min' => ':attribute minimal harus 3 huruf',
            'max' => ':attribute maximal 20 huruf',
            'unique' => "attribut sudah ada, gunakan yang lain"
        ];

   
        $this->validate($request, $rules, $messages);
        $this->mentor->mentor = $request->nama_mentor;

  
        $this->mentor->save();

        Alert::success('Success Title', 'Success Message');


        return redirect()->route('mentor');
    }


    public function show(string $id)
    {
        $mentor = User::findOrFail($id);

        return view('mentor.show', compact('mentor'));
    }


    public function edit(string $id)
    {
        $mentor = User::findOrFail($id);

        return view('mentor.edit', compact('mentor'));
    }


    public function update(Request $request, string $id)
    {
        $update = User::findOrFail($id);
    
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

        $mentor = User::findOrFail($id);
        $mentor->mentor = $request->mentor;
        $mentor->save();

        Alert::success('Success Title', 'Success Message');

        return redirect()->route('mentor');
    }


    public function destroy(string $id)
    {

        $mentor = User::findOrFail($id);
        $mentor->delete();

        Alert::success('Successpull', 'Data berhasil di hapus');
     
        return redirect()->route('mentor');
    }
}
