<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'district_id','type'];
    
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id','id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
