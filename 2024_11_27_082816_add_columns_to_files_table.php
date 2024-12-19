<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFilesTable extends Migration
{
    public function up()
    {
        // Schema::table('files', function (Blueprint $table) {
        //     $table->string('description')->nullable();
        //     $table->string('category')->nullable();
        //     $table->unsignedBigInteger('user_id')->nullable();
        //     $table->bigInteger('size')->nullable();
            
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        // });
    }

    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            // $table->dropColumn('description');
            // $table->dropColumn('category');
            // $table->dropColumn('user_id');
            // $table->dropColumn('size');
        });
    }
}