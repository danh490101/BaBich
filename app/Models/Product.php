<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'desc', 'price', 'quantity', 'image', 'images', 'image2', 'brand_id', 'category_id', 'skin_id'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function skin()
    {
        return $this->belongsTo(Skin::class);
    }

    // Trong model Product
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_favorite_products', 'product_id', 'user_id')
            ->withTimestamps();
    }

    public function feedbacks(){
        return $this->hasMany(Feedback::class);
    }
}
