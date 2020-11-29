<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    protected $collection = 'products';

    // protected $primaryKey = '_id';

    protected $casts = [
        'url_imgs' => 'array',
    ]; // Json

    protected $fillable = ['id', 'category_id', 'name', 'url_imgs', 'price'];

    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
