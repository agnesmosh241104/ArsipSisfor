<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Folder;


class DocumentController extends Controller
{

  public function index()
  {
      $files = File::all();
      $folders = Folder::all();

      return view('documents', compact('files', 'folders'));

  }
}
