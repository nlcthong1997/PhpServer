<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdersDetail extends Model
{
    protected $fillable = ['id', 'order_id', 'product_id', 'category_id', 'qty', 'total'];

    public $timestamps = true;
}
