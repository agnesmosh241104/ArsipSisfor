<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path'); // Path file yang disimpan
            $table->foreignId('folder_id')->constrained()->onDelete('cascade'); // Menambahkan hubungan ke folder
            $table->string('description')->nullable(); // Kolom deskripsi
            //category
            $table->string('category')->nullable(); // Kolom category
            $table->integer('size')->nullable(); // Ukuran file dalam byte
            //starred
            $table->boolean('starred')->default(false); // Menambahkan kolom starred
            $table->boolean('is_deleted')->default(false); // Menambahkan kolom is_deleted tanpa after
            $table->timestamp('trashed_at')->nullable(); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files');
    }
}