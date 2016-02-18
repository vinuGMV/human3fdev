<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

        \Route::bind('university',function($slug){
            return \App\University::where('slug',$slug)->FirstOrFail();

        });

        \Route::bind('college',function($slug){
            return \App\college::where('slug',$slug)->FirstOrFail();

        });

        \Route::bind('school',function($slug){
            return \App\school::where('slug',$slug)->FirstOrFail();

        });

        \Route::bind('department',function($slug){
            return \App\department::where('slug',$slug)->FirstOrFail();

        });

        \Route::bind('faculty',function($slug){
            return \App\faculty::where('slug',$slug)->FirstOrFail();

        });
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
