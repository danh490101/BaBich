<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryFee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function provinces()
    {
        return $this->hasMany(Province::class);
    }

}
