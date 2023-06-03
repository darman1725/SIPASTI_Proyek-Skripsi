<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\DataKegiatan;
use App\Models\Management\DataPenilaian;

class DataKriteria extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_kriteria";
    protected $fillable = ['keterangan','kode_kriteria','bobot','jenis','id_data_kegiatan'];

    public function kegiatan()
    {
        return $this->belongsTo(DataKegiatan::class, 'id_data_kegiatan');
    }

    public function data_penilaian()
    {
    return $this->hasMany(DataPenilaian::class, 'id_data_kriteria');
    }

}
