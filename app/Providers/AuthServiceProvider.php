<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
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

        Gate::define('isSuperUser', function($user){ 
            return $user->role === 'superuser'; 
        });
        Gate::define('isAdmin', function($user){ 
            return $user->role === 'admin'; 
        });
        Gate::define('isDirektur', function($user){ 
            return $user->role === 'direktur'; 
        });
        Gate::define('isGeneralManager', function($user){ 
            return $user->role === 'generalmanager'; 
        });
        Gate::define('isManager', function($user){ 
            return $user->role === 'manager'; 
        });
        Gate::define('isStaff', function($user){ 
            return $user->role === 'staff'; 
        });

        //
    }
}
