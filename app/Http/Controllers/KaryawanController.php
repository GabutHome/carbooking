<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;


class KaryawanController extends Controller
{
    public function index()
    {
        return view('dashboard.karyawan.index', [
            'title' => 'Data Karyawan',
            'active' => 'karyawan',
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.karyawan.create', [
            'title' => 'Buat Data Karyawan',
            'active' => 'karyawan',
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|max:255',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image' => 'image|file|max:1024',
            'phone_number' => 'required',
            'password' => 'required|min:5|max:255'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('user-images');
        }

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Success! Please Login');

        return redirect('/dashboard/users')->with('success', 'Data karyawan berhasil dibuat!');
    }

    public function edit(User $user)
    {
        return view('dashboard.karyawan.edit', [
            'user' => $user
        ]);
    }
    
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'phone_number' => 'required',
            'image' => 'image|file|max:1024'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('car-images');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        User::where('user_id', $user->user_id)
            ->update($validatedData);

        return redirect('/dashboard/users')->with('success', 'Data karyawan berhasil diubah!');
    }

    public function destroy(User $user)
    {
        User::destroy($user->user_id);

        return redirect('/dashboard/users')->with('success', 'Data karyawan berhasil dihapus!');
    }
}
