<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;





    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function foodCategories()
    {
        return $this->hasMany(FoodCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
