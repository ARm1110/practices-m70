<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'restaurant_name',
        'phone_number',
        'opening_hours',
        'closing_hours',
        'latitude',
        'longitude',
        'city_id',
        'category_id',
        'user_id',
        'is_active',
        'is_verified',
    ];
    //restaurant_name
    // description
    // phone_number
    // opening_hours
    // closing_hours
    // latitude
    // longitude
    // is_active

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function foodCategories()
    {
        return $this->hasMany(FoodCategory::class);
    }
}
