<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function dokumenAkademik()
    {
        return view('dokumenAkademik');
    }

    public function laporanMagang()
    {
        return view('laporanMagang');
    }

    public function dokKompetisi()
    {
        return view('dokKompetisi');
    }

    public function dokKepanitiaan()
    {
        return view('dokKepanitiaan');
    }

    public function index()
    {
        return view('dokumenAkademik'); // Ganti dengan nama view yang sesuai
    }

    public function createNewFolder()
    {
        // Logic untuk membuat folder baru
        return view('createNewFolder'); // Ganti dengan view untuk membuat folder baru
    }

    public function uploadFolder()
    {
        // Logic untuk mengupload folder
        return view('uploadFolder'); // Ganti dengan view untuk mengupload folder
    }

    public function uploadFile()
    {
        // Logic untuk mengupload file
        return view('uploadFile'); // Ganti dengan view untuk mengupload file
    }
}

