<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu\DataKriteria;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = "kegiatan";
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'tanggal_mulai', 'tanggal_selesai', 'kuota'];
}