<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Todo;
use App\Policies\TodoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Todo::class => TodoPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        //
        $this->registerPolicies();
    }
}
