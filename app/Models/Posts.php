<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'news_content', 'author'];

    public function user()
    {
        return $this->belongsTo(User::class,'author');
    }
    public function coment()
{
    return $this->hasMany(Coment::class,'post_id');
}
}
