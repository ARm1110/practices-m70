<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;


    protected $fillable = [
        'address_name',
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'latitude',
        'longitude',
        'is_active',
    ];

    public function users()
    {
        return $this->morphToMany(Address::class, 'addressable');
    }
}
