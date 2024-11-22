<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('id_doc'); // Pastikan kolom ini ada
            $table->string('nama');
            $table->integer('tahun');
            $table->string('file_path');
            $table->string('fitur')->nullable();
            $table->timestamps();
        });
        
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    } 
    
};
