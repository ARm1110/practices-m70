<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_item_id',
        'order_id',
        'offer_id',
        'user_id',
        'before_discount',
        'after_discount',
        'total_price',
        'discount',
        'quantity',
        'item_price',
        'created_at',
        'updated_at',

    ];
    protected $table = 'menu_item_order';


    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
