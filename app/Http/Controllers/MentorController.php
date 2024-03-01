<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Mahasantri;
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
    public function setoran()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
