<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKriteria extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_kriteria";
    protected $fillable = ['keterangan','kode_kriteria','bobot','jenis'];
}

