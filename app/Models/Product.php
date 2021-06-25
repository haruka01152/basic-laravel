<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory;
    use Sortable;

    public $sortable = ['supplier_id', 'updated_at'];

    protected $fillable = [
        'supplier_id',
        'name',
        'price',
        'quantity',
        'last_editor',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'last_editor', 'id');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Models\supplier', 'supplier_id', 'id');
    }

    public function logs()
    {
        return $this->hasMany('App\Models\Log', 'id', 'product_id');
    }
}
