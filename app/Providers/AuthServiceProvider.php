<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('admin', function($user){
            return $user->role == "admin";
        });
         Gate::define('user', function($user){
            return $user->role == "user";
        });
         Gate::define('author', function($user){
            return $user->role == "author";
        });

        Gate::define('accecc-content', function($user){
            // return $user->role == "admin" || $user->role == "author";
            return in_array($user->role, ['user', 'author']);
        });


    }
}
