<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';
    protected $fillable = ['user_id', 'categori_id', 'title', 'desc_id', 'desc_en', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categori_id', 'id');
    }
}
