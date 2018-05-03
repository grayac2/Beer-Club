<?php

namespace App\Providers;

use Collective\Html\FormBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        FormBuilder::component('bsText', 'components.form.bs-text', ['name', 'value', 'attributes']);
        FormBuilder::component('rating', 'components.form.rating', ['name']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
