<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Menu\Pendaftaran;
use App\Models\Menu\DataKriteria;

class DataPenilaian extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_penilaian";
    protected $fillable = ['id_pendaftaran','id_data_kriteria','nilai'];

    public function pendaftaran() {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }

    public function kriteria() {
        return $this->belongsTo(DataKriteria::class, 'id_data_kriteria');
    }

    public static function tampil()
    {
    $penilaian = DB::table('data_penilaian')->get();
    return $penilaian;
    }

    public static function get_kriteria()
    {
    return DB::table('data_kriteria')->get();
    }

    public static function get_sub_kriteria()
    {
        return DB::table('data_sub_kriteria')->get();
    }

    public static function get_pendaftaran()
    {
        return Pendaftaran::with('user')->get();
    }

    public static function untuk_tombol($id)
    {
    $num_rows = DB::table('data_penilaian')
                    ->where('id_pendaftaran', $id)
                    ->count();
    return $num_rows;
    }

    public static function data_sub_kriteria($id)
    {
    $sub_kriteria = DB::table('data_sub_kriteria')
                    ->where('id_data_kriteria', $id)
                    ->orderBy('nilai', 'desc')
                    ->get();
    return $sub_kriteria->toArray();
    }

    public function data_nilai($id_pendaftaran, $id_data_kriteria)
    {
    $penilaian = DB::table('data_penilaian')
                ->join('data_sub_kriteria', 'data_penilaian.nilai', '=', 'data_sub_kriteria.id')
                ->where('data_penilaian.id_pendaftaran', $id_pendaftaran)
                ->where('data_penilaian.id_data_kriteria', $id_data_kriteria)
                ->first();
    return (array) $penilaian;
    }

    public static function tambah_penilaian($id_pendaftaran, $id_data_kriteria, $nilai)
    {
    $query = DB::table('data_penilaian')->insert([
        'id_pendaftaran' => $id_pendaftaran,
        'id_data_kriteria' => $id_data_kriteria,
        'nilai' => $nilai,
    ]);
    return $query;
    }

    public static function data_penilaian($id_pendaftaran, $id_data_kriteria) {
        $data = DB::table('data_penilaian')
                    ->where('id_pendaftaran', $id_pendaftaran)
                    ->where('id_data_kriteria', $id_data_kriteria)
                    ->first();
        return (array) $data;
    }

    public static function edit_penilaian($id_pendaftaran, $id_data_kriteria, $nilai)
    {
    $query = DB::table('data_penilaian')
        ->where('id_pendaftaran', '=', $id_pendaftaran)
        ->where('id_data_kriteria', '=', $id_data_kriteria)
        ->update(['nilai' => $nilai]);

    return $query;
    }


}
