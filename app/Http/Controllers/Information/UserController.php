<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information\User;
use App\Models\Menu\Pendaftaran;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        return view('information.data_pelamar.index', compact('users'));
    }

    public function create()
    {
        return view('information.data_pelamar.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['level'] = 'user';
        User::create($data);
        return redirect()->route('user')->with('success', 'Data pelamar berhasil ditambahkan');
    }

    public function show(User $user)
    {
        return view('information.data_pelamar.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('information.data_pelamar.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);
        
        return redirect()->route('user')
            ->with('success', 'Data pengguna berhasil diupdate');
    }

    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            // Hapus data terkait di tabel data_alternatif
            DB::table('data_alternatif')->whereIn('id_pendaftaran', function ($query) use ($user) {
                $query->select('id')->from('pendaftaran')->where('id_data_user', $user->id);
            })->delete();
    
            // Hapus data terkait di tabel pendaftaran
            $user->pendaftaran()->delete();
    
            // Hapus data user
            $user->delete();
    
            DB::commit();
            return redirect()->route('user')->with('success', 'Data Pengguna berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('user')->with('error', 'Terjadi kesalahan saat menghapus pengguna: ' . $e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $userIds = $request->input('user_ids');
        User::whereIn('id', $userIds)->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus');
    }
}
