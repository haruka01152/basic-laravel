<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'editor',
        'supplier',
        'product_name',
        'price',
        'quantity',
        'action',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'editor', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier', 'id');
    }

    public function actions()
    {
        return $this->belongsTo('App\Models\Action', 'action', 'id');
    }
}
