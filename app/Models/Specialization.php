<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    public function users()
{
    return $this->belongsToMany(User::class);
}

}
