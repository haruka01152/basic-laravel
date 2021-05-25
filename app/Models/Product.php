<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'last_editor', 'id');
    }

    public function makers()
    {
        return $this->belongsTo('App\Models\Maker', 'maker_id', 'id');
    }
}
