<?php

namespace App\Providers;

use App\Models\News;
use App\Policies\NewsPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * De model–policy mappen.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\News::class => \App\Policies\NewsPolicy::class,
        \App\Models\Comment::class => \App\Policies\CommentPolicy::class,
        News::class => NewsPolicy::class,
    ];
    

    public function boot()
    {
        $this->registerPolicies();
        Gate::define('admin', function ($user) {
            return $user->is_admin;
        });
    }
}
