<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    use HasFactory;
    protected $table = 'coments';
    protected $fillable = ['post_id,user_id,coments_content'];

    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id'); // Sesuaikan dengan nama kolom yang benar
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Sesuaikan dengan nama kolom yang benar
    }
}
