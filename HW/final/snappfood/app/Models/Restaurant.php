<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Restaurant extends Model implements Wallet, HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasWallet;
    use  Notifiable;
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
