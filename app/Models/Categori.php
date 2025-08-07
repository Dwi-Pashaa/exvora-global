<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    protected $table = 'categori';
    protected $fillable = ['name', 'slug', 'type'];

    public function subCategori()
    {
        return $this->hasMany(SubCategori::class, 'categori_id', 'id');
    }
}
