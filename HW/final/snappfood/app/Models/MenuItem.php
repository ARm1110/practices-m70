<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Customer;
use Bavix\Wallet\Interfaces\ProductInterface;

class MenuItem extends Model implements ProductInterface
{
    use HasFactory;
    use HasWallet;

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
    protected $table = 'menu_items';
    public function getAmountProduct(Customer $customer): int|string
    {
        return $this->price;
    }

    public function getMetaProduct(): ?array
    {
        return [
            'title' => $this->title,
            'description' => 'Purchase of Product #' . $this->id,
        ];
    }
    public function foodCategory()
    {
        return $this->hasOne(FoodCategory::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
