<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Dokumen Akademik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dokumen Kompetisi', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laporan Magang', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dokumen Kepanitiaan', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

