<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Melakukan pencarian pada model File berdasarkan nama
        $results = File::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($results);
    }
}