<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Post::class => PostPolicy::class,   
    ];

    /**
     * The gates mappings for the application.
     *
     * @var array
     */
    protected $gates = [
        'attach-role' => 'App\Gates\AdminDashboardGate@attachRole',
        'detach-role' => 'App\Gates\AdminDashboardGate@detachRole',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerGates();

        //
    }

    public function registerGates()
    {
        foreach ($this->gates as $key => $value) {
            Gate::define($key, $value);
        }
    }
}
