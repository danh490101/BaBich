<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['order_date', 'delivery_date', 'totalamount', 'user_id', 'status', 'name', 'phone', 'email', 'delivery_cost', 'address', 'payment_method', 'payment_status', 'ward_id', 'order_notes'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(OrderDetails::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function ward()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }
}
