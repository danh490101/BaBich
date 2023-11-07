<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $table = 'discounts';

    protected $fillable = ['name', 'code', 'value', 'expire_day', 'product_ids'];

    public function products()
    {
        return array_map(function ($id) {
            return Product::find($id);
        }, $this->product_ids);
    }
}
