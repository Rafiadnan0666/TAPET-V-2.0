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

    public function index(Request $request)
    {
        $id = Auth::user()->id;
        $mahasantri = DB::table('mahasantri')->where('mentor_id', '=', $id)->Paginate(5);
        $no = 5 * ($mahasantri->currentPage() - 1);
        return view("mentor.index", compact('mahasantri', 'no'));
    }

    public function setoran(string $id)
    {
        $mahasantri = Mahasantri::findOrFail($id);
        $setoran = Setoran::where('mahasantri_id', '=', $id)->Paginate(5);
        $no = 5 * ($setoran->currentPage() - 1);
        return view('mentor/setoran', compact('setoran', 'no', 'mahasantri'));
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

    public function storemhs(Request $request)
    {
        $rules = [
            'nim' => 'required|min:3|max:20|unique:mahasantri,nim',
            'nama' => 'required|min:3|max:20',
        ];

        $messages = [
            'required' => ':attribute gak boleh kosong akhi',
            'min' => ':attribute minimal harus 3 huruf akhi',
            'max' => ':attribute maximal 20 huruf akhi',
            'unique' => ':attribute sudah ada akhi, silahkan gunakan yang lain'
        ];

        $this->validate($request, $rules, $messages);
        $this->mahasantri->nama_mhs = $request->nama;
        $this->mahasantri->nim = $request->nim;
        $this->mahasantri->mentor_id = $request->mid;
        $this->mahasantri->save();
        Alert::success('Alhamdulillah', 'Data Berhasil di Tambahkan');

        return redirect()->route('mentor.index');
    }

    public function storestr(Request $request)
    {
        $rules = [
            'juz' => 'required',
            'nilai' => 'required',
            'hal' => 'required',
            'ket' => 'required',
            'tanggal' => 'required',
        ];

        $messages = [
            'required' => ':attribute gak boleh kosong akhi',
            'min' => ':attribute minimal harus 3 huruf akhi',
            'max' => ':attribute maximal 20 huruf akhi',
            'unique' => ':attribute sudah ada akhi, silahkan gunakan yang lain'
        ];

        $this->validate($request, $rules, $messages);
        $this->setoran->juz = $request->juz;
        $this->setoran->nilai = $request->nilai;
        $this->setoran->tanggal = $request->tanggal;
        $this->setoran->keterangan = $request->ket;
        $this->setoran->halaman = $request->hal;
        $this->setoran->mahasantri_id = $request->mid;
        $this->setoran->save();

        Alert::success('Alhamdulillah', 'Data Berhasil di Tambahkan');
        return redirect()->route('mentor.setoran', $request->mid);
    }

    public function showstr($id)
    {
        $data = Setoran::find($id);
        return view('mentor.showstr', compact('data'));
    }

    public function editmhs($id)
    {
        $data = Mahasantri::find($id);
        return view('mentor.editmhs', compact('data'));
    }

    public function updatemhs(Request $request, $id)
    {
        $update = Mahasantri::find($id);

        if ($update->nim == $request->nim) {
            $rules = [
                'nim' => 'required|min:3|max:20',
                'nama' => 'required|min:3|max:20',
            ];
        } else {
            $rules = [
                'nim' => 'required|min:3|max:20|unique:mahasantri,nim',
                'nama' => 'required|min:3|max:20',
            ];
        }

        $update->nim = $request->nim;
        $update->nama_mhs = $request->nama;

        if ($update->isDirty()) {
            $messages = [
                'required' => ':attribute gak boleh kosong akhi',
                'min' => ':attribute minimal harus 3 huruf akhi',
                'max' => ':attribute maximal 20 huruf akhi',
                'unique' => ':attribute sudah ada akhi, silahkan gunakan yang lain'
            ];

            $this->validate($request, $rules, $messages);
            $update->nim = $request->nim;
            $update->nama_mhs = $request->nama;
            $update->save();
            Alert::success('Alhamdulillah', 'Data Berhasil di Update');
            return redirect()->route('mentor.index');
        } else {
            Alert::warning('Kenapa Akhi??', 'Data tidak di Ubah');
            return redirect()->route('mentor.index');
        }
    }

    public function destroymhs(string $id)
    {
        $setoran = Setoran::where('mahasantri_id', '=', $id)->count();
        $mahasantri = Mahasantri::find($id);

        if ($setoran == 0) {
            $mahasantri->delete();
            Alert::success('Alhamdulillah', 'Data Berhasil di Hapus');
        } else {
            Alert::warning('Afwan Akhi', 'Hapus data setoran yang dimiliki mahasantri ini dahulu');
        }

        return redirect()->route('mentor.index');
    }

    public function editstr($id)
    {
        $data = Setoran::find($id);
        return view('mentor.editstr', compact('data'));
    }

    public function updatestr(Request $request, $id)
    {
        $update = Setoran::find($id);

        $rules = [
            'juz' => 'required',
            'nilai' => 'required',
            'hal' => 'required',
            'ket' => 'required',
            'tanggal' => 'required',
        ];

        $messages = [
            'required' => ':attribute gak boleh kosong akhi',
            'min' => ':attribute minimal harus 3 huruf akhi',
            'max' => ':attribute maximal 20 huruf akhi',
            'unique' => ':attribute sudah ada akhi, silahkan gunakan yang lain'
        ];

        $update->juz = $request->juz;
        $update->nilai = $request->nilai;
        $update->tanggal = $request->tanggal;
        $update->keterangan = $request->ket;
        $update->halaman = $request->hal;

        if ($update->isDirty()) {
            $this->validate($request, $rules, $messages);
            $update->save();
            Alert::success('Alhamdulillah', 'Data Berhasil di Update');
        } else {
            Alert::warning('Kenapa Akhi??', 'Data tidak diubah');
        }

        return redirect()->route('mentor.setoran', $update->mahasantri->id);
    }

    public function destroystr(string $id)
    {
        $setoran = Setoran::find($id);

        $setoran->delete();
        Alert::success('Alhamdulillah', 'Data Berhasil di Hapus');

        return redirect()->route('mentor.setoran', $setoran->mahasantri_id);
    }
}
