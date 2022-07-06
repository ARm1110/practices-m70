<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'description',
        'price',
        'user_id',
        'restaurant_id',
        'food_category_id',
        'category_id',
        'is_active',
        'created_at',
        'updated_at',
    ];

    public function foodCategory()
    {
        return $this->hasOne(FoodCategory::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
