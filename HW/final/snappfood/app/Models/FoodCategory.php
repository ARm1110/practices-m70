<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FoodCategory extends Model
{
    use HasFactory;

    use SoftDeletes; //<--- use the softdelete traits

    protected $dates = ['deleted_at']; //<--- new field to be added in your table

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function menuItems()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
}
