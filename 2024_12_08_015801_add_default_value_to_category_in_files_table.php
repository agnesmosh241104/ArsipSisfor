<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultValueToCategoryInFilesTable extends Migration
{
    public function up()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->string('category')->default('Uncategorized')->change();
        });
    }

    public function down()
    {
        Schema::table('files', function (Blueprint $table) {
            $table->string('category')->default(null)->change();
        });
    }
}