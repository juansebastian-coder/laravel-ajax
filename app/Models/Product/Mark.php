<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';
    protected $primarykey = 'id';
    protected $fillable = [
        'id','name'
    ];


    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
