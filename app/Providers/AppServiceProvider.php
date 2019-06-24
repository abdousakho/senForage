<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


use Illuminate\Support\DateFactory;
use Carbon\CarbonImmutable;

class AppServiceProvider extends ServiceProvider
{
   /**
    * Register any application services.
    *
    * @return void
    */
   public function register()
   {
       DateFactory::use(CarbonImmutable::class);
   }

   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
       //
   }
}

