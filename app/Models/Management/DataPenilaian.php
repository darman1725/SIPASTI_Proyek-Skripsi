<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataPenilaian extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_penilaian";
    protected $fillable = ['id_data_alternatif','id_data_kriteria','nilai'];

    public function guestDataAlternatif() {
        return $this->belongsTo(DataAlternatif::class, 'id_data_alternatif');
    }

    public function guestDataKriteria() {
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

    public static function get_alternatif()
    {
        return DB::table('data_alternatif')->get();
    }

    public static function untuk_tombol($id)
    {
    $num_rows = DB::table('data_penilaian')
                    ->where('id_data_alternatif', $id)
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

    public function data_nilai($id_data_alternatif, $id_data_kriteria)
    {
    $penilaian = DB::table('data_penilaian')
                ->join('data_sub_kriteria', 'data_penilaian.nilai', '=', 'data_sub_kriteria.id')
                ->where('data_penilaian.id_data_alternatif', $id_data_alternatif)
                ->where('data_penilaian.id_data_kriteria', $id_data_kriteria)
                ->first();
    return (array) $penilaian;
    }

    public static function tambah_penilaian($id_data_alternatif, $id_data_kriteria, $nilai)
    {
    $query = DB::table('data_penilaian')->insert([
        'id_data_alternatif' => $id_data_alternatif,
        'id_data_kriteria' => $id_data_kriteria,
        'nilai' => $nilai,
    ]);
    return $query;
    }

    public static function data_penilaian($id_data_alternatif, $id_data_kriteria) {
        $data = DB::table('data_penilaian')
                    ->where('id_data_alternatif', $id_data_alternatif)
                    ->where('id_data_kriteria', $id_data_kriteria)
                    ->first();
        return (array) $data;
    }

    public static function edit_penilaian($id_data_alternatif, $id_data_kriteria, $nilai)
    {
    $query = DB::table('data_penilaian')
        ->where('id_data_alternatif', '=', $id_data_alternatif)
        ->where('id_data_kriteria', '=', $id_data_kriteria)
        ->update(['nilai' => $nilai]);

    return $query;
    }


}
