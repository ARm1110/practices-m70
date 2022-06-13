<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'start_time',
        'end_time',
        'date',
        'service',
        'price',
        'fastService',
        'user_id',
        'status',
        'station',
        'token_reserve'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
