<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $table = 'benefit';
    protected $fillable = ['title_id', 'title_en', 'desc_id', 'desc_en', 'icon'];
}
