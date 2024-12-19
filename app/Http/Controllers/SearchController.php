<?php
// app/Http/Controllers/SearchController.php
namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Melakukan pencarian pada model File berdasarkan nama
        $results = File::where('name', 'LIKE', "%{$query}%")->get();

        return view('search.results', compact('results', 'query'));
    }
}
