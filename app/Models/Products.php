<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $casts = ['url_imgs' => 'array'];     // Json

    protected $fillable = ['id', 'categories_id', 'name', 'url_imgs', 'price'];

    public $timestamps = true;
}
