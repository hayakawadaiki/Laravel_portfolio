<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // システム管理者
        Gate::define('admin', function ($user) {
            return ($user->admin_role === 1);
        });

        // ユーザーとシステム管理者
        Gate::define('user', function ($user) {
            return in_array($user->admin_role, [1, 10], true);
        });
    }
}
