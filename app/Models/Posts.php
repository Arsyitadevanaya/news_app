<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'news_content'];

    public function user()
    {
        return $this->belongsTo(User::class, 'author'); // Sesuaikan dengan nama kolom yang benar
    }
}


