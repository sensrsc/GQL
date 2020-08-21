<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $primaryKey = 'document_id';
    protected $guarded = ['created_at', 'updated_at', 'deleted_at'];

    public function setPropertyAttribute($value)
    {
        $this->attributes['property'] = json_encode($value);
    }
}
