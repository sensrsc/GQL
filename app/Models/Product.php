<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];
}
