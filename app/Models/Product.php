<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['maker_id', 'updated_at'];

    protected $fillable = [
        'maker_id',
        'name',
        'price',
        'quantity',
        'last_editor',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'last_editor', 'id');
    }

    public function makers()
    {
        return $this->belongsTo('App\Models\Maker', 'maker_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\Log', 'id', 'product_id');
    }
}
