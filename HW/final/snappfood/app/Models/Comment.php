<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'menu_item_order_id',
        'comment',
        'rating',
        'status',
        'created_at',
        'updated_at',

    ];
    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menuItemOrder()
    {
        return $this->belongsTo(MenuItemOrder::class);
    }
}
