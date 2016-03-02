<?php

namespace Blog;

use Illuminate\Support\ServiceProvider;

class ZipServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app['zip'] = $this->app->share(
            function ($app) {
                return new \Blog\Zip();
            }
        );

        $this->app->booting(
            function () {
                $aliases = \Config::get('app.aliases');

                if(empty($aliases['ZipClass'])){
                    $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                    $loader->alias('ZipClass','Blog\Facades\ZipClass');
                }

            }
        );
    }


}