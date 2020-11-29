<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class OrderDetail extends Model
{
    protected $collection = 'orders_detail';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'order_id', 'product_id', 'category_id', 'qty', 'total'];

    public $timestamps = true;
}
