<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Address extends Model
{
    use HasFactory;

    protected $table = 'Addresses';

    protected $fillable = [
        'country',
        'state',
        'city',
        'zip',
        'colony',
        'street',
        'outer_number',
        'interior_number',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }
}
