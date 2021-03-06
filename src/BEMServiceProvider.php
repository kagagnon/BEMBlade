<?php
namespace KAGagnon\BEMBlade;


use Illuminate\Support\ServiceProvider;
use KAGagnon\BEMBlade\Blade\BEM;

class BEMServiceProvider extends ServiceProvider{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(){
        // publish config file
        $this->publishes([__DIR__.'/../config' => config_path()], 'config');
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/../config/bem-blade.php',
            'bem-blade'
        );

        BEM::boot();
    }
}