<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatif extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_alternatif";
    protected $fillable = ['id_pendaftaran'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}
