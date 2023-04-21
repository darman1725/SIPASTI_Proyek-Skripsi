<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DataSubKriteria extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_sub_kriteria";
    protected $fillable = ['id_data_kegiatan','deskripsi','nilai','id_data_kriteria'];

    public function guestDataKegiatan() {
        return $this->belongsTo(DataKegiatan::class, 'id_data_kegiatan');
    }
    
    public function guestDataKriteria() {
        return $this->belongsTo(DataKriteria::class, 'id_data_kriteria');
    }

    public function data_sub_kriteria($id_data_kriteria)
    {
    $result = DB::table('data_sub_kriteria')
              ->where('id_data_kriteria', $id_data_kriteria)
              ->orderBy('nilai', 'desc')
              ->get()
              ->toArray();
    return $result;
    }

    public function insert($data = [])
    {
    $result = DB::table('data_sub_kriteria')->insert($data);
    return $result;
    }   

    public static function get_kriteria()
    {
    return DB::table('data_kriteria')->get();
    }

    public static function count_kriteria()
    {
    $query = DB::table('data_sub_kriteria')
                ->select('id_data_kriteria', DB::raw('COUNT(deskripsi) AS jml_setoran'))
                ->groupBy('id_data_kriteria')
                ->get();
    return $query;
    }
}