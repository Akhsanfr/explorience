<?php

namespace App\Providers;

use App\Models\Artikel;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('team', function(User $user){
            return $user->role('admin') || $user->role('writer') || $user->role('supervisor') || $user->role('podcaster') ;
        });
        Gate::define('admin', function(User $user){
            return $user->role('admin');
        });
        Gate::define('writer', function(User $user){
            return $user->role('writer') && $user->is_active;
        });
        Gate::define('supervisor', function(User $user){
            return $user->role('supervisor') && $user->is_active;
        });
        Gate::define('creator', function( User $user, $slug){
            return Artikel::where('slug', $slug)->first()->user_writer_id == $user->id;
        });
    }
}
