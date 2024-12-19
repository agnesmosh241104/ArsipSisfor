<?php

namespace Database\Seeders;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder 
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ppw.si',
            'role' => 'admin',
            'password' => Hash::make("admin")
        ]);
    }

};
