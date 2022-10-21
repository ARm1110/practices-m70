<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'discount',
        'user_id',
        'is_active',
        ''
    ];
    protected $table = 'offers';

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'menu_items', 'menu_item_id', 'offer_id');
    }
}
