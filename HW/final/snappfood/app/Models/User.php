<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Interfaces\Customer;

class User extends Authenticatable implements Wallet, HasMedia, Customer
{
    use HasApiTokens, HasFactory, Notifiable;
    use InteractsWithMedia;
    use HasWallet;
    use CanPay;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'phone',
        'city_id',
        'password',
        'role',
        'city_name'

    ];

    protected $table = 'users';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function foodCategories()
    {
        return $this->hasMany(FoodCategory::class);
    }

    public function addresses()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }


    public function getMediaUrl(string $conversionName = ''): string
    {
        if ($conversionName === 'preview') {
            return $this->getFirstMediaUrl('preview');
        }
        return $this->getFirstMediaUrl();
    }
    public function menuItemOrders()
    {
        return $this->hasMany(MenuItemOrder::class);
    }




    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
