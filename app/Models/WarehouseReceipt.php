<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseReceipt extends Model
{
    use HasFactory;
    protected $table = 'warehouse_receipt';
    protected $primaryKey = 'id';
    protected $fillable = ['note', 'total_warehouse', 'user_id', 'supllier_id' ];
}
