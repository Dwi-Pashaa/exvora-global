<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $table = 'gallerie';
    protected $fillable = ['title_id', 'title_en', 'desc_id', 'desc_en', 'image'];
}
