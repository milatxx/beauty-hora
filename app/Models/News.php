<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class News extends Model
{
    use HasFactory;
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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
