<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    public function index()
    {
        return view('backend.layouts.index')
        ->with('message', 'Maaf, alamat yang Anda cari tidak ditemukan'); // Menggunakan desain dari index.blade.php
    }
}
