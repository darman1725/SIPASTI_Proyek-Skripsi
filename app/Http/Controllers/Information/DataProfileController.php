<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information\User;
use Illuminate\Support\Facades\Storage;

class DataProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id); 
        return view('information.data_profile.index', compact('user'));
    }

    public function edit()
    {
        $user = User::find(auth()->user()->id); // Mengambil data user yang sedang login
        return view('information.data_profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->nik = $request->input('nik');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->npwp = $request->input('npwp');
        $user->alamat = $request->input('alamat');
        $user->tanggal_lahir = $request->input('tanggal_lahir');
        $user->jenis_kelamin = $request->input('jenis_kelamin');
        $user->agama = $request->input('agama');
        $user->status_perkawinan = $request->input('status_perkawinan');
        $user->pendidikan_terakhir = $request->input('pendidikan_terakhir');
        $user->no_handphone = $request->input('no_handphone');
        $user->pekerjaan = $request->input('pekerjaan');
        $user->catatan = $request->input('catatan');

        // Update pengalaman
        $pengalaman = $request->input('pengalaman');
        $user->pengalaman = $pengalaman ? implode(',', $pengalaman) : '';

        // Upload pas_foto
        if ($request->hasFile('pas_foto')) {
        $pasFoto = $request->file('pas_foto');
        $extension = $pasFoto->getClientOriginalExtension();
        $filename = $pasFoto->getClientOriginalName();
        $path = $pasFoto->storeAs('pas_foto', $filename, 'public');

        // Hapus foto lama jika ada
        if ($user->pas_foto) {
            Storage::disk('public')->delete($user->pas_foto);
        }

        $user->pas_foto = $path;
        }

        // Upload foto_ktp
        if ($request->hasFile('foto_ktp')) {
        $fotoKtp = $request->file('foto_ktp');
        $extension = $fotoKtp->getClientOriginalExtension();
        $filename = $fotoKtp->getClientOriginalName();
        $path = $fotoKtp->storeAs('foto_ktp', $filename, 'public');

        // Hapus foto lama jika ada
        if ($user->foto_ktp) {
            Storage::disk('public')->delete($user->foto_ktp);
        }

        $user->foto_ktp = $path;
        }

        $user->save();

        return redirect()->route('data_profile')->with('success', 'Data profil berhasil diperbarui');
    }
}
