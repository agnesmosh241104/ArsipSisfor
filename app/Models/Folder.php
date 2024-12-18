<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'category'];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //relasi ke file
    public function files()
    {
        return $this->hasMany(File::class);
    }

    

     
}