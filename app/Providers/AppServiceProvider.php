<?php

namespace App\Providers;

use App\Model\SiteConfigModel;
use App\WebConstant;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->share([
          'site' => SiteConfigModel::first(),
          'webExt' => WebConstant::WEB_EXT,
          'serviceExt' => WebConstant::SERVICE_EXT
        ]);
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
