<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'phone', 'email', 'address', 'description', 'order_total', 'status'];

    public $timestamps = true;
}
