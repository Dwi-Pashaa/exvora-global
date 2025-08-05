<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companie';
    protected $fillable = ['name', 'email', 'telp', 'address', 'twitter', 'facebook', 'instagram', 'linkedin', 'image'];
}
