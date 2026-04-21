<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SweetAlertCompatServiceProvider extends ServiceProvider
{
     public function boot(): void
     {
          // Compatibility shim for legacy Blade includes like:
          // @include('sweetalert::alert', [...])
          $this->loadViewsFrom(resource_path('views/sweetalert'), 'sweetalert');
     }
}
