<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::where('user_id', Auth::user()->user_id)->first();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(Request $request, $id)
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
        
        User::where('user_id', $id)
            ->update($validatedData);

        return redirect('/dashboard/profile')->with('success', 'User berhasil diubah!');
    }
}
