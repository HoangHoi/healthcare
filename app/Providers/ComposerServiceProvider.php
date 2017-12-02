<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\ViewComposers\LeftMenuComposer;
use App\Http\ViewComposers\TopMenuComposer;
use App\Http\ViewComposers\BreadcrumbComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('includes.left-menu', LeftMenuComposer::class);
        View::composer('includes.top-menu', TopMenuComposer::class);
        View::composer('includes.breadcrumb', BreadcrumbComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
