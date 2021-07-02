<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use Auth;

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

        Gate::define( 'donee_edit', function(User $user) { return Auth::user()->id === 24 ? TRUE : FALSE; });
        Gate::define( 'donee_create', function(User $user) { return Auth::user()->id === 24 ? TRUE : FALSE; });

        Gate::define('administer', function(User $user) { return Auth::user()->id === 24 ? TRUE : FALSE; });
    }
}
