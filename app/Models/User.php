<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $guarded=['id'];
    protected $table = "users";
    protected $fillable = ['nik','email','email_verified_at','nama_lengkap','username','password','level'];
}