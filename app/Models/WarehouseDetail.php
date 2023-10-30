<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseDetail extends Model
{
    use HasFactory;

    protected $table = 'warehouse_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['price', 'quantity', 'product_id'];
}
