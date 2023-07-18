<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */

     //aqui creamos una pequeña funcion que devuelve verdadero o falso si el usuario tiene el rol de admin  
    public function boot(): void
    {
        Gate::define('admin-access', function ($user) {
           
            return $user->hasRole('admin');
            
        });
// esto aumente para que el entrenador pueda acceder a las rutas de entrenador
        Gate::define('entrenador-access', function ($user) {
           
            return $user->hasRole('entrenador');
            
        });

        // esto aumente para que el entrenador pue
    }



}
