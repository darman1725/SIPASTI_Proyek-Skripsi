<?php

namespace App\Models\Information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataProfile extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "data_profile";
    protected $fillable = ['nama','phone','address'];
}
