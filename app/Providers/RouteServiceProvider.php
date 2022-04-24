<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/dashboard';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapWebRoutes();
        $this->mapPegawaiRoutes();
        $this->mapManagerRoutes();
        $this->mapSdmRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapPegawaiRoutes()
    {
        Route::prefix('pegawai')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/pegawai.php'));
    }

    protected function mapManagerRoutes()
    {
        Route::prefix('manager')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/manager.php'));
    }

    protected function mapSdmRoutes()
    {
        Route::prefix('sdm')
             ->middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/sdm.php'));
    }

}
