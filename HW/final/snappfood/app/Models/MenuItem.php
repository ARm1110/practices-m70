<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;



    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
