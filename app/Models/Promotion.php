<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Promotion extends Model
{
    protected $collection = 'promotions';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'discount', 'description', 'active'];

    public $timestamps = true;
}
