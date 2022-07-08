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

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }
}
