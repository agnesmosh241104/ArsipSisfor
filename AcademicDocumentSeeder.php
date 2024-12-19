<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AcademicDocument;

class AcademicDocumentSeeder extends Seeder
{
    public function run()
    {
        $this->call(AcademicDocumentSeeder::class);
        AcademicDocument::create([
            'title' => 'Tugas Proyek Kuliah',
            'academic_year' => '2022'
        ]);

        AcademicDocument::create([
            'title' => 'Skripsi',
            'academic_year' => '2021'
        ]);
    }
}  

