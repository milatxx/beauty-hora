<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'image',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // relatie naar auteur
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
