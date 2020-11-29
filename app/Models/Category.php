<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    protected $collection = 'categories';

    // protected $primaryKey = '_id';
    // protected $casts = ['id' => 'string'];

    protected $fillable = ['id', 'name'];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
