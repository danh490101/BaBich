<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    use HasFactory;
    protected $table = 'skins';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
