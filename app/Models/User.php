<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\News;     
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name','email','password','is_admin',
        'username','birthday','profile_photo','about_me'
    ];

    public function isAdmin(): bool
{
    return $this->is_admin;
}

public function news()
{
    return $this->hasMany(News::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}
public function specializations()
{
    return $this->belongsToMany(Specialization::class);
}



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
            'email_verified_at' => 'datetime',
            'birthday' => 'date',
        ];
    }

