<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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
        Gate::define('is-admin', function (User $user) {
            return $user->role == 'admin';
        });
        // Gate::define('is-bau', function (User $user) {
        //     return $user->role == 'bau';
        // });
        // Gate::define('is-mahasiswa', function (User $user) {
        //     return $user->role == 'mahasiswa';
        // });
        // Gate::define('is-dosen', function (User $user) {
        //     return $user->role == 'dosen';
        // });
        // Gate::define('is-dpl', function (User $user) {
        //     return $user::is_dpl();
        // });
        // Gate::define('is-kaprodi', function (User $user) {
        //     return $user::is_kaprodi();
        // });
        // Gate::define('is-online', function (User $user) {
        //     return $user->is_login;
        // });

        // Gate::define('is-evaluator', function (User $user) {
        //     return $user->role == 'evaluator';
        // });
    }
}
