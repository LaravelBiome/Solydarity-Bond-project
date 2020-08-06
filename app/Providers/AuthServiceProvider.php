<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Product;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-only' , function($user) {

            return $user->right == 3;
        });

        Gate::define('seller-only' , function($user){
            return $user->right == 2;
        
        });

        Gate::define('seller-min' , function($user){
            return $user->right >= 2;
        
        });

        Gate::define('buyer-only' , function($user){
            return $user->right == 1;
        });

        Gate::define('buyer-min' , function($user){
            return $user->right >= 1;
        });

        Gate::define('update-product' , function($user , Product $product) {

                if($user->right == 2)
                {
                    if($product->id_user == $user->id)
                        return true;
                }

                return false;
        });

        Gate::define('delete-product' , function($user , Product $product) {
            if($user->right == 3)
                return true;

            if($user->right == 2)
            {
                if($product->id_user == $user->id)
                    return true;
            }

            return false;
    });

        Gate::define('buy-product' , function($user , Product $product) {
                if($user->right == 1)
                {
                    return true;
                }

                if($user->right == 2)
                {
                    if($user->id != $product->id_user)
                        return true;
                }

                return false;
        });
        

        Gate::define('achats' , function($user)
        {
            if($user->right == 1)
                return true;

            if($user->right == 2)
                return true;

            return false;
        });
    }
}
