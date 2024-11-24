<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $userid = Auth::id();
        $profiledetail = Profile::where('user_id', $userid)->first();

        return view('profile.index', ['profiledetail' => $profiledetail]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|max:20',
            'age' => 'required',
            'bio' => 'required',
        ]);

        $profile = Profile::find($id);
        $user = $profile->user;

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password); // Hash password sebelum menyimpannya
        }
        $user->save();

        $profile->age = $request->age;
        $profile->bio = $request->bio;
        $profile->save();
        return redirect()->route('profile.index')->with('success', 'Genre berhasil diupdate.');
    }
}
