<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;



    public function foodCategory()
    {
        return $this->belongsToMany(FoodCategory::class);
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
