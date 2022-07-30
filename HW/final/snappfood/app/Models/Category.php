<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes; //<--- use the softdelete traits

    protected $fillable = [
        'category_name',
        'is_active',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


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
