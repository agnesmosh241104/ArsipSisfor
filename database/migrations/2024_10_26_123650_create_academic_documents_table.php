<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('academic_documents', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title'); // Judul dokumen (misalnya, Tugas Proyek Kuliah, Skripsi)
        //     $table->string('type');  // Jenis dokumen (misalnya, 'proyek', 'skripsi')
        //     $table->string('academic_year'); // Tahun akademik atau semester (misalnya, '2020/2021')
        //     $table->string('file_path'); // Path ke file yang diunggah
        //     $table->timestamps();
        // });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_document');
    }
};
