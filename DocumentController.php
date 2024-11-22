<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $fitur = $request->get('fitur', 'dokumenAkademik'); // default ke dokumenAkademik
        $documents = Document::where('fitur', $fitur)->get();

        return view('documents.index', compact('documents', 'fitur'));
    }
    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_doc' => 'required|string',
            'nama' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        // Ambil fitur dari request, default ke 'dokumenAkademik'
        $fitur = $request->fitur ?? 'dokumenAkademik';

        // Simpan file ke direktori sesuai fitur
        $filePath = $request->file('file')->store($fitur, 'public');

        // Simpan data ke database
        Document::create([
            'id_doc' => $request->id_doc,
            'nama' => $request->nama,
            'tahun' => $request->tahun, 
            'file_path' => $filePath,
            'fitur' => $fitur,
        ]);

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        // Validasi data yang diterima
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'nullable|integer',
            'folder_name' => 'nullable|string|max:255',
            'file' => 'nullable|file|mimes:pdf,docx,xlsx', // sesuaikan dengan tipe file yang diterima
        ]);

        // Perbarui data document
        $document->nama = $request->input('nama');
        $document->tahun = $request->input('tahun');
        $document->folder_name = $request->input('folder_name');

        // Jika ada file baru yang diupload
        if ($request->hasFile('file')) {
            $document->file_path = $request->file('file')->store('documents'); // sesuaikan dengan folder penyimpanan
        }

        // Simpan perubahan
        $document->save();

        return redirect()->route('documents.index')->with('success', 'Document updated successfully!');
    }
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        Storage::disk('public')->delete($document->file_path);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document deleted successfully.');
    }

    // Metode untuk fitur laporanMagang
    public function laporanMagang()
    {
        return view('documents.laporanMagang'); // Buat file 'laporanMagang.blade.php' di folder 'documents'
    }

    public function storeLaporanMagang(Request $request)
    {
        $request->validate([

            'nama' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $filePath = $request->file('file')->store('laporanMagang', 'public');

        Document::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'file_path' => $filePath,
        ]);

        return redirect()->route('documents.laporanMagang')->with('success', 'Laporan Magang added successfully.');
    }

    public function dokKompetisi()
    {
        $documents = Document::where('fitur', 'dokKompetisi')->get();
        return view('documents.dokKompetisi', compact('documents'));
    }


    public function storeDokKompetisi(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $filePath = $request->file('file')->store('dokKompetisi', 'public');

        Document::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'file_path' => $filePath,
            'fitur' => 'dokKompetisi',
        ]);

        return redirect()->route('documents.dokKompetisi')->with('success', 'Dokumen Kompetisi berhasil ditambahkan.');
    }

    public function showDocumentsByFitur($fitur)
    {
        // Mengambil file hanya untuk fitur yang dipilih
        $documents = Document::where('fitur', $fitur)->get();

        return view('documents.index', compact('documents'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        // Melakukan pencarian pada model Document
        $documents = Document::where('nama', 'LIKE', "%{$query}%")
            ->orWhere('tahun', 'LIKE', "%{$query}%")
            ->get();

        return view('documents.index', compact('documents', 'query'));
    }


    public function dokKepanitiaan()
    {
        $documents = Document::where('fitur', 'dokKepanitiaan')->get();
        return view('documents.dokKepanitiaan', compact('documents'));
    }

    public function storeDokKepanitiaan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun' => 'required|numeric|min:1900|max:' . date('Y'),
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048'
        ]);

        $filePath = $request->file('file')->store('dokKepanitiaan', 'public');

        Document::create([
            'nama' => $request->nama,
            'tahun' => $request->tahun,
            'file_path' => $filePath,
            'fitur' => 'dokKepanitiaan',
        ]);

        return redirect()->route('documents.dokKepanitiaan')->with('success', 'Dokumen Kepanitiaan berhasil ditambahkan.');
    }
    public function showDokumenAkademik()
    {
        return view('documents.dokumenAkademik'); // Sesuaikan path ini
    }

    public function uploadFolder()
    {
        // Logic untuk menampilkan halaman upload folder
        return view('documents.upload-folder');
    }

    public function storeFolder(Request $request)
    {
        // Validasi input
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'folder_files' => 'required|array',
            'folder_files.*' => 'file|mimes:pdf,docx,txt|max:2048',
        ]);

        // Proses upload folder
        $folderName = $request->input('folder_name');
        $files = $request->file('folder_files');

        foreach ($files as $file) {
            $file->storeAs("uploads/$folderName", $file->getClientOriginalName());
        }

        return redirect()->route('documents.index')->with('success', 'Folder uploaded successfully!');
    }


    public function showFile($id)
    {
        $document = Document::findOrFail($id);
        $filePath = storage_path('app/public/' . $document->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'File not found.');
        }

        return response()->file($filePath);
    }

    public function show($id)
    {
        // Cari dokumen berdasarkan ID
        $document = Document::findOrFail($id);

        // Return view untuk menampilkan detail dokumen
        return view('documents.show', compact('document'));
    }
}
