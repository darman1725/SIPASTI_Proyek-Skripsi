<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DataPerhitungan extends Model
{
    use HasFactory;
    protected $fillable = ['id_pendaftaran', 'nilai'];

    public static function get_kriteria()
    {
        $query = DB::table('data_kriteria')->get();
        return $query->toArray();
    }

    public static function get_pendaftaran()
    {
        $query = DB::table('pendaftaran')->get();
        return $query->toArray();
    }

    public static function data_nilai($id_pendaftaran, $id_data_kriteria)
    {
    $query = DB::table('data_penilaian')
             ->join('data_sub_kriteria', 'data_penilaian.nilai', '=', 'data_sub_kriteria.id')
             ->select('data_sub_kriteria.*')
             ->where('data_penilaian.id_pendaftaran', '=', $id_pendaftaran)
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
        $query = DB::select("SELECT * FROM data_hasil ORDER BY nilai DESC;");
        return $query->toArray();
    }

    public static function get_hasil_pendaftaran($id_pendaftaran)
    {
    $data_pendaftaran = DB::table('pendaftaran')
                        ->where('id', '=', $id_pendaftaran)
                        ->first();

    if($data_pendaftaran){
        return (array) $data_pendaftaran;
    }else{
        return [];
    }
    }   

    public static function insert_hasil($hasil_akhir = [])
    {
    $existingData = DB::table('data_hasil')
                      ->where('id_pendaftaran', $hasil_akhir['id_pendaftaran'])
                      ->first();

    if ($existingData) {
        // Data already exists, perform update instead of insert
        $result = DB::table('data_hasil')
                    ->where('id_pendaftaran', $hasil_akhir['id_pendaftaran'])
                    ->update($hasil_akhir);
    } else {
        // Data does not exist, perform insert
        $result = DB::table('data_hasil')->insert($hasil_akhir);
    }

    return $result;
    }


    public function hapus_hasil()
    {
        $query = DB::select("TRUNCATE TABLE data_hasil;");
        return $query;
    }
}

