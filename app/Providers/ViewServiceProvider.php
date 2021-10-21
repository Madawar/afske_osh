<?php

namespace App\Providers;

use App\Http\View\Composers\ProfileComposer;
use App\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...

     //   View::composer('livewire.*', SidebarComposer::class);
    //    View::composer('layouts.*', SidebarComposer::class);


    }
}
