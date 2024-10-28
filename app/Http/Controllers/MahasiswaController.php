<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check()) {
                $user = auth()->user();
                // Debugging untuk melihat objek user
                if ($user->isAdmin()) {
                    return $next($request);
                }
            }
            abort(403, 'Unauthorized action.');
        })->only(['edit', 'update', 'toggleVisibility']);
    }

    public function index()
    {
        if (auth()->user() && auth()->user()->isAdmin()) {
            // Jika admin, ambil semua mahasiswa
            $mahasiswas = Mahasiswa::all();
        } else {
            // Jika bukan admin, hanya ambil mahasiswa yang visible
            $mahasiswas = Mahasiswa::where('is_visible', true)->get();
        }
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function edit($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $nim)
    {
        $request->validate([
            'nama' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->no_hp = $request->no_hp;

        if ($request->hasFile('profile_photo')) {
            if ($mahasiswa->profile_photo_path) {
                Storage::disk('public')->delete($mahasiswa->profile_photo_path);
            }
            $path = $request->file('profile_photo')->store('profile_photos', 'public');
            $mahasiswa->profile_photo_path = $path;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui.');
    }

    public function toggleVisibility($nim)
    {
        $mahasiswa = Mahasiswa::findOrFail($nim);
        $mahasiswa->is_visible = !$mahasiswa->is_visible; // Toggle nilai
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Status visibilitas berhasil diperbarui.');
    }
}
