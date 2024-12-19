<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('sub_categories')->insert([
            ['name' => 'Tugas Proyek', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Skripsi', 'category_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Proposal Kompetisi', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hasil Lomba', 'category_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laporan Magang', 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sertifikat Magang', 'category_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laporan Kegiatan', 'category_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

