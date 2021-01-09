<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/*
|----- Table: order_status ------
| id (int|pk|increment)
| name  (varchar)
| active (boolean)
| created_at (datetime)
| updated_at (datetime)
|
|----- Table: order ------
| id (int|pk|increment)
| name  (varchar)
| active (boolean)
| created_at (datetime)
| updated_at (datetime)
| dispatched_on (datetime)
| deliver_in (datetime)
| total (decimal)
|
|----- Table: order_item ------
| id (int|pk|increment)
| created_at (datetime)
| updated_at (datetime)
| unit_price (decimal)
| amount (integer)
| total (decimal)
| product_id (integer|fk)
| order_id (integer|fk)
|*/

class OrderItem extends Model
{
    // Default => plural class name
    protected $table = 'order_item';

    // Default => id
    protected $primaryKey = 'id';

    protected $casts = [
        'id'         => 'integer',
        'order_id'   => 'integer',
        'unit_price' => 'decimal:3',
        'amount'     => 'decimal:3',
        'total'      => 'integer',
        'product_id' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function order()
    {
        return $this->hasOne('App\Model\Order', 'id', 'order_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}


