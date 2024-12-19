<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        // Ambil data aktivitas dari database
        $activities = Activity::with('user', 'file')->latest()->get();

        // Kirim data aktivitas ke view
        return view('recent', compact('activities'));
    }
}