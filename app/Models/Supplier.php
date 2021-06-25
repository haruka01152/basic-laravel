<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\Log');
    }
}
