<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity; // Asumsikan ada model 'Activity'
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    // Ambil daftar aktivitas terbaru

    // Tambahkan aktivitas baru ke log
    public function storeActivity($description)
    {
        Activity::create([
            'user_id' => \Auth::user()->id,
            'description' => $description,
        ]);
    }


    public function recentActivities()
{
    $activities = Activity::latest()->take(10)->get(); // Contoh data aktivitas
    return view('recent', compact('activities')); // Pastikan nama view sesuai
} 

}
