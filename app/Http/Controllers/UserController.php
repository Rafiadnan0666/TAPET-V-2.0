<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $mentor = User::where('role', 'm')->paginate(5);
        return view('user.index', compact('mentor'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6',
            'gambar' => 'nullable|image|mimes:jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        // Handle file upload for 'gambar'
        if ($request->file('gambar')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('upload'), $filename);
            $user->gambar = $filename;
        }

        $user->save();

        Alert::success('Success', 'User created successfully');
        return redirect()->route('user.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }
    public function set($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:user,email,' . $id,
            'password' => 'nullable|min:6',
            'gambar' => 'nullable|image|mimes:jpg,png|max:2048', // Adjust validation for the image file
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }

        // Handle file upload for 'gambar'
        if ($request->file('gambar')) {
            File::delete(public_path('upload/' . $user->gambar));
            $filename = time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('upload'), $filename);
            $user->gambar = $filename;
        }

        $user->save();

        Alert::success('Success', 'User updated successfully');
        return redirect()->route('user.index');
    }

    public function profile(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:user,email,' . $id,
            'password' => 'nullable|min:6',
            'gambar' => 'nullable|image|mimes:jpg,png|max:2048', // Adjust validation for the image file
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }

        // Handle file upload for 'gambar'
        if ($request->file('gambar')) {
            File::delete(public_path('upload/' . $user->gambar));
            $filename = time() . '_' . uniqid() . '.' . $request->file('gambar')->getClientOriginalExtension();
            $request->gambar->move(public_path('upload'), $filename);
            $user->gambar = $filename;
        }

        $user->save();

        Alert::success('Success', 'Profile updated successfully');
        if ($user->role == 'a') {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('mentor.index');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        File::delete(public_path('upload/' . $user->gambar));
        $user->delete();

        Alert::success('Success', 'User deleted successfully');
        return redirect()->route('user.index');
    }
}
