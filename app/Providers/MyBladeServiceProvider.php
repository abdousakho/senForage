<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
class MyBladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('roles',function($roles){
            $rolesArray=explode("|",$roles);
            $checkroles= false;
            if(\Auth::check() && \Auth::user()->hasAnyRoles($rolesArray)){
                $checkroles=true;
            }

            return $checkroles;
        });

        Blade::directive('displayrole',function(){
            if(\Auth::check()){
                $role=\Auth::user()->role->name;
                return "<?php echo '$role' ; ?>";
            }
            "<?php echo 'Aucun Role' ; ?>";
        });
    }
}
