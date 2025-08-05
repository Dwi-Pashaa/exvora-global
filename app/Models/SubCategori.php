<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategori extends Model
{
    protected $table = 'sub_categori';
    protected $fillable = ['categori_id', 'name', 'slug'];
}
