<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        return view('profile.show', compact('user')); // Menampilkan halaman profil
    }

    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data user yang sedang login
        return view('profile.edit', compact('user')); // Menampilkan halaman edit profil
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = Auth::user();
        $user->nama = $request->nama;
        $user->jurusan = $request->jurusan;
        $user->no_hp = $request->no_hp;

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->save();

        // Update juga data di tabel Mahasiswa jika ada relasi
        if ($user->mahasiswa) {
            $user->mahasiswa->update([
                'nama' => $request->nama,
                'jurusan' => $request->jurusan,
                'no_hp' => $request->no_hp,
                'profile_photo_path' => $user->profile_photo_path,
            ]);
        }

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui.');
    }
}
