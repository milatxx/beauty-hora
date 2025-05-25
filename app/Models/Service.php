<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function specializations()
{
    return $this->belongsToMany(Specialization::class);
}

}
