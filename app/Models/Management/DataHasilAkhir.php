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
    protected $fillable = ['id_data_alternatif','nilai'];

    public static function get_hasil_alternatif($id_data_alternatif)
    {
    $data_alternatif = DB::table('data_alternatif')
                        ->where('id', '=', $id_data_alternatif)
                        ->first();

    if($data_alternatif){
        return (array) $data_alternatif;
    }else{
        return [];
    }
    }
}
