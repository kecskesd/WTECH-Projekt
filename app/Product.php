<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'collection', 'brand', 'model', 'nickname', 'color', 'gender', 'details', 'sku', 'price'
    ];
}
