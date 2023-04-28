<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information\User;
use App\Models\Menu\Pendaftaran;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('information.data_pelamar.index', compact('users'));
    }

    public function create()
    {
        $users = User::all();
        return view('information.data_pelamar.create', compact('users'));
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect()->route('user')->with('success', 'Data User berhasil dibuat');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('information.data_pelamar.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('information.data_pelamar.edit', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        $user->update($data);
        return redirect()->route('user')->with('success', 'Data User berhasil diupdate');
    }

    public function destroy($id)
{
    try {
        $user = Pendaftaran::findOrFail($id);
        $user->delete();

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Data User berhasil dihapus');
    } catch (\Exception $e) {
        return redirect()->route('user')->with('error', 'Gagal menghapus data user');
    }
}

}
