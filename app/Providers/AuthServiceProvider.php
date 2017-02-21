<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('SHOW_ADMIN', function ($user){
            return $user->canDo('SHOW_ADMIN');
        });

        Gate::define('PERMISSION_INDEX', function ($user){
            return $user->canDo('PERMISSION_INDEX');
        });

    }
}
