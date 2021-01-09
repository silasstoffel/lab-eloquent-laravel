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
|----- Table: Order ------
| id (int|pk|increment)
| name  (varchar)
| active (boolean)
| created_at (datetime)
| updated_at (datetime)
| dispatched_on (datetime)
| deliver_in (datetime)
| total (decimal)
|*/

class Order extends Model
{
    // Default => plural class name
    protected $table = 'order';

    // Default => id
    protected $primaryKey = 'id';

    protected $casts = [
        'id'              => 'integer',
        'order_status_id' => 'integer',
        'total'           => 'decimal:3',
    ];

    protected $fillable = [
        'order_status_id', 'total', 'dispatched_on', 'deliver_in',
    ];

    public function orderStatus()
    {
        return $this->belongsTo('App\Model\OrderStatus');
        // or
        return $this->hasOne('App\Model\OrderStatus', 'id', 'order_status_id');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Model\OrderItem');
    }
}
