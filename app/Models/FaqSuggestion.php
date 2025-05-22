<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaqSuggestion extends Model
{
    protected $fillable = [
        'question',
        'name',
        'email',
        'approved',
    ];
}
