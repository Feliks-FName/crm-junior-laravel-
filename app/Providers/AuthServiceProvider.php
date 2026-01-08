<?php

namespace App\Providers;

use App\Models\Client;
use App\Models\Deal;
use App\Models\User;
use App\Policies\ClientPolicy;
use App\Policies\DealPolicy;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate;
use \Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Deal::class => DealPolicy::class,
        Client::class => ClientPolicy::class,
        User::class => UserPolicy::class,
    ];

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
        $this->registerPolicies();

        Gate::before(function ($user) {
            return $user->isAdmin() ? true : null;
        });
    }
}
