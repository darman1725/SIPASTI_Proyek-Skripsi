<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Menu\Pendaftaran;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "users";
    protected $fillable = ['nik', 'email', 'email_verified_at', 'nama_lengkap', 'username', 'password', 'level', 'npwp', 'alamat', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'status_perkawinan', 'pendidikan_terakhir', 'no_handphone', 'pekerjaan', 'catatan', 'pengalaman', 'pas_foto', 'foto_ktp'];

    public function pendaftaran()
    {
    return $this->hasMany(Pendaftaran::class, 'id_data_user');
    }

}
