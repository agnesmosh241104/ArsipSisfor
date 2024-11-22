<?php
// app/Http/Controllers/SearchController.php
namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Melakukan pencarian pada model Document
        $documents = Document::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('tahun', 'LIKE', "%{$query}%")
            ->get();

        return view('documents.index', compact('documents', 'query'));
    }
}
