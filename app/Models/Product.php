<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $fillable = ['categori_id', 'sub_categori_id', 'name', 'desc_id', 'desc_en', 'image', 'catalog', 'sort', 'status'];

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categori_id', 'id');
    }

    public function subCategori()
    {
        return $this->belongsTo(SubCategori::class, 'sub_categori_id', 'id');
    }
}
