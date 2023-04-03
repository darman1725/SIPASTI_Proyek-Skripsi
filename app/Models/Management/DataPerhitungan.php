<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DataPerhitungan extends Model
{
    use HasFactory;
    protected $fillable = ['id_data_alternatif', 'nilai'];

    public static function get_kriteria()
    {
        $query = DB::table('data_kriteria')->get();
        return $query->toArray();
    }

    public static function get_alternatif()
    {
        $query = DB::table('data_alternatif')->get();
        return $query->toArray();
    }

    // public static function data_nilai($id_alternatif, $id_kriteria)
    // {
    // $query = DB::select("SELECT * FROM data_penilaian JOIN data_sub_kriteria WHERE data_penilaian.nilai=data_sub_kriteria.id_data_kriteria AND data_penilaian.id_data_alternatif='$id_alternatif' AND data_penilaian.id_data_kriteria='$id_kriteria';");

    // if(count($query) > 0) {
    //     return (array) $query[0];
    // } else {
    //     return null;
    // }
    // }

    public static function data_nilai($id_data_alternatif, $id_data_kriteria)
    {
    $query = DB::table('data_penilaian')
             ->join('data_sub_kriteria', 'data_penilaian.nilai', '=', 'data_sub_kriteria.id')
             ->select('data_sub_kriteria.*')
             ->where('data_penilaian.id_data_alternatif', '=', $id_data_alternatif)
             ->where('data_penilaian.id_data_kriteria', '=', $id_data_kriteria)
             ->first();
    return $query;
    }


    public static function get_total_kriteria()
    {
        $query = DB::select("SELECT SUM(bobot) as total_bobot FROM data_kriteria;");
        return (array) $query[0];
    }

    public static function get_max_min($id_kriteria)
    {
    $query = DB::select("SELECT max(data_sub_kriteria.nilai) as max, min(data_sub_kriteria.nilai) as min, data_kriteria.jenis as jenis FROM `data_penilaian` JOIN data_kriteria ON data_penilaian.id_data_kriteria=data_kriteria.id JOIN data_sub_kriteria ON data_penilaian.nilai=data_sub_kriteria.id WHERE data_penilaian.id_data_kriteria='$id_kriteria' GROUP BY data_kriteria.jenis;");
    
    if(count($query) > 0) {
        return (array) $query[0];
    } else {
        return null;
    }
    }

    public function get_hasil()
    {
        $query = DB::select("SELECT * FROM hasil ORDER BY nilai DESC;");
        return $query->toArray();
    }

    public function get_hasil_alternatif($id_alternatif)
    {
        $query = DB::select("SELECT * FROM data_alternatif WHERE id_data_alternatif='$id_data_alternatif';");
        return (array) $query[0];
    }

    public static function insert_hasil($hasil_akhir = [])
    {
        $result = DB::table('data_hasil')->insert($hasil_akhir);
        return $result;
    }

    public function hapus_hasil()
    {
        $query = DB::select("TRUNCATE TABLE hasil;");
        return $query;
    }
}