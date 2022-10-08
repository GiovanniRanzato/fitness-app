<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{


    /* The messages used on the methods
     */
    protected $messages = [
        'admin_only' => 'You must be an administrator.'
    ];

    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        Gate::define('show-user', function (User $user, User $requestUser) {
            return $user->isAdmin() ||  $user->id === $requestUser->id
            ? Response::allow()
            : Response::deny($this->messages['admin_only']);
        });

        Gate::define('index-users', function (User $user) {
            return $user->isAdmin()
            ? Response::allow()
            : Response::deny($this->messages['admin_only']);
        });
    }
}

