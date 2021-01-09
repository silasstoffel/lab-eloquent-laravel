<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Default => plural class name
    protected $table = 'product';

    protected $fillable = [
        'name', 'description', 'active', 'total_in_stck', 'price',
    ];
}
