<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'restaurant_id',
        'menu_item_id',
        'quantity',
        'status',
        'total_price',
        'is_active',
        'created_at',
        'updated_at',
    ];
    protected $table = 'orders';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
