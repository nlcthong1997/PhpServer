<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $fillable = ['id', 'name', 'discount', 'description', 'active'];

    public $timestamps = true;
}
