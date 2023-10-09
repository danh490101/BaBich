<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'product_id', 'totalamount', 'quantity', 'price'];

    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

}
