<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some folders
        $folders = [
            [
                'name' => 'Folder 1',
                'description' => 'This is the first folder.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Folder 2',
                'description' => 'This is the second folder.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('folders')->insert($folders);

        // Create some files and associate them with folders
        $files = [
            [
                'name' => 'File 1',
                'folder_id' => 1, // Assuming folder IDs are 1 and 2
                'path' => 'files/file1.pdf',
                'description' => 'This is the first file.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'File 2',
                'folder_id' => 1,
                'path' => 'files/file2.pdf',
                'description' => 'This is the second file.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'File 3',
                'folder_id' => 2,
                'path' => 'files/file3.pdf',
                'description' => 'This is the third file.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('files')->insert($files);
    }
}
