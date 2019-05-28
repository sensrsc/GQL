<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'user_id';
    protected $guarded = ['created_at', 'updated_at'];
}
