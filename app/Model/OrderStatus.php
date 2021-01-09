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
|*/
class OrderStatus extends Model
{

    // Default => plural class name
    protected $table = 'order_status';

    // Default => id
    protected $primaryKey = 'id';

    protected $casts = [
        'id'     => 'integer',
        'active' => 'boolean',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // hidden fields/attrs
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // include accessor method on load (column not existis in table)
    protected $appends = [
        'url_suffix',
        'name_url',
    ];

    /**
     * // Accessor method
     * https://laravel.com/docs/5.8/eloquent-mutators#accessors-and-mutators
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getUrlSuffixAttribute()
    {
        return '/order-status/' . $this->id;
    }

    public function getNameUrlAttribute()
    {
        $url = str_replace(' ', '-', strtolower($this->name));
        return '/order-status/name/' . $url;
    }

}
