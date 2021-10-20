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

        Gate::define( 'donee_edit', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });
        Gate::define( 'donee_create', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });
        Gate::define( 'campaign_edit', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });
        Gate::define( 'campaign_create', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });
        Gate::define( 'collect_responses', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });

        Gate::define('administer', function(User $user) { return in_array(Auth::user()->id, explode(',', env('APP_ADMIN'))) ? TRUE : FALSE; });
    }
}
