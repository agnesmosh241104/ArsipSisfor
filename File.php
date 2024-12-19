<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'path',
    'folder_id',
    'description',
    'user_id',
    'size',
    'category', // Tambahkan kolom ini
    'starred', // Tambahkan kolom ini
    'is_deleted', 'trashed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    // Fungsi untuk mengecek apakah file sudah expired (misalnya 30 hari di Trash)
    public function isExpired()
    {
        return $this->trashed_at && $this->trashed_at->addDays(30)->isPast();
    }
}