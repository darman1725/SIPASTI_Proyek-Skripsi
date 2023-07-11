<?php

namespace App\Http\Controllers\Information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Information\User;
use App\Models\Menu\Pendaftaran;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Str;

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

    if (auth()->user()->level === 'admin') {
        $data['level'] = $data['level']; // Ambil opsi level dari form input
    } else {
        $data['level'] = 'user'; // Set level pengguna menjadi 'user'
    }

    User::create($data);

    return redirect()->route('user')->with('success', 'Data pengguna berhasil ditambahkan');
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

    public function generateUsers(Request $request)
    {
    $this->validate($request, [
        'userCount' => 'required|integer|min:1',
    ]);

    $userCount = $request->input('userCount');
    $defaultPassword = 'password'; // Ganti dengan password default yang diinginkan

    for ($i = 0; $i < $userCount; $i++) {
        $name = Str::random(8);
        $email = $name . '@example.com';
        $username = $name . '_' . $i;
        $password = Hash::make($defaultPassword); // Menggunakan password default

        $user = new User();
        $user->nik = 'NIK' . Str::random(6);
        $user->nama_lengkap = $name;
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;
        $user->level = 'user';
        $user->save();
    }

    // Generate CSV
    $users = User::orderBy('created_at', 'desc')->limit($userCount)->get(['nik', 'nama_lengkap', 'email', 'username', 'password']);
    $csvFileName = 'generated_users_' . now()->format('Ymd_His') . '.csv';
    $csvFile = fopen(public_path('downloads/' . $csvFileName), 'w');
    fputcsv($csvFile, ['NIK', 'Nama Lengkap', 'Email', 'Username', 'Password']); // Header

    foreach ($users as $user) {
        fputcsv($csvFile, [
            $user->nik,
            $user->nama_lengkap,
            $user->email,
            $user->username,
            $defaultPassword // Menggunakan password default
        ]); // Data pengguna
    }

    fclose($csvFile);

    return redirect()->route('user')->with('success', 'Pengguna baru telah dihasilkan dan file CSV telah didownload.');
    }

    public function import(Request $request)
    {
    $request->validate([
        'import_file' => 'required|mimes:csv,txt',
    ]);

    if ($request->hasFile('import_file')) {
        $file = $request->file('import_file');

        if (($handle = fopen($file->getPathname(), 'r')) !== false) {
            $header = fgetcsv($handle); // Read column header

            $requiredColumns = ['nik', 'nama_lengkap', 'email', 'username', 'password']; // Update with the column names in your CSV file

            $missingColumns = array_diff($requiredColumns, $header);
            if (count($missingColumns) !== 0) {
                fclose($handle);
                $missingColumnsString = implode(', ', $missingColumns);
                return redirect()->route('user')->with('error', 'Kolom dalam file CSV tidak sesuai. Pastikan kolom yang diimpor adalah ' . $missingColumnsString . '.');
            }

            $importedUsers = [];

            while (($data = fgetcsv($handle)) !== false) {
                $user = array_combine($header, $data);

                $importedUsers[] = $user; // Add imported user to the array

                // Save user to the database
                User::create([
                    'nik' => $user['nik'],
                    'nama_lengkap' => $user['nama_lengkap'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'password' => bcrypt($user['password']),
                    'level' => 'user',
                ]);
            }

            fclose($handle);

            return redirect()->route('user')->with('success', 'Data pengguna berhasil diimpor')->with('importedUsers', $importedUsers);
        }
    }

    return redirect()->route('user')->with('error', 'Gagal mengimpor data pengguna.');
    }
    
}
