<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\DataKriteria;

class DataKegiatan extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_kegiatan";
    protected $fillable = ['nama', 'jenis', 'level', 'gambar', 'tanggal_mulai', 'tanggal_selesai', 'detail_kegiatan'];
}