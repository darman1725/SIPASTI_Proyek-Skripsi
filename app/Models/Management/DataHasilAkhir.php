<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DataHasilAkhir extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_hasil";
    protected $fillable = ['id_pendaftaran','jenis_kegiatan', 'nilai'];

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
}
