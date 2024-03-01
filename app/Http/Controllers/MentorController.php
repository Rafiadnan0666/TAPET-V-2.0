<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasantri;
use App\Models\Setoran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MentorController extends Controller
{
    public $mentor;
    public function __construct()
    {
        $this->mentor = new User();
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
        $setoran = Setoran::where('mahasantri_id', '=', $id)->Paginate(5);
        $no = 5 * ($setoran->currentPage() - 1);
        return view('mentor/setoran', compact('setoran', 'no'));
    }

    public function createmhs()
    {
        return view('mentor/createmhs');
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
        //
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
    public function destroy(user $user)
    {
        //
    }
}
