<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primarykey = 'id';
    protected $fillable = [
        'id', 'name', 'price', 'mark_id'
    ];

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }
}
