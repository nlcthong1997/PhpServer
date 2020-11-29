<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    protected $collection = 'orders';

    // protected $primaryKey = 'id';

    protected $fillable = ['id', 'phone', 'email', 'address', 'description', 'order_total', 'status'];

    public $timestamps = true;
}
