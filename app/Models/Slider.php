<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = ['title_id', 'title_en', 'desc_id', 'desc_en', 'image'];
}
