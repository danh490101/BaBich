<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseReceipt extends Model
{
    use HasFactory;
    protected $table = 'warehouse_receipt';
    protected $primaryKey = 'id';
    protected $fillable = ['note', 'total_warehouse', 'user_id', 'supplier_id' ];

    public function supplier(){
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
