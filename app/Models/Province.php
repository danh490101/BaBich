<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'delivery_fee_id'];

    public function deliveryfee()
    {
        return $this->belongsTo(DeliveryFee::class, 'delivery_fee_id','id');
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
