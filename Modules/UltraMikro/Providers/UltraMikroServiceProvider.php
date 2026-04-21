<?php

namespace Modules\UltraMikro\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\UltraMikro\Entities\UltraMikroPembiayaan;

class UltraMikroServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'UltraMikro';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'UltraMikro';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        View::composer('UltraMikro::layouts.sidebar', function ($view) {
            $userId = Auth::id();

            $data = Cache::remember("ultra_mikro:sidebar:{$userId}", 300, function () use ($userId) {
                if (!$userId) {
                    return ['proposalUltraMikro' => 0, 'notifRevisi' => 0];
                }

                $proposalUltraMikro = UltraMikroPembiayaan::where('user_id', $userId)
                    ->whereNull('dokumen_ideb')
                    ->count();

                $latestSub = DB::table('ultra_mikro_pembiayaan_histories')
                    ->select('ultra_mikro_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('ultra_mikro_pembiayaan_id');

                $notifRevisi = DB::query()
                    ->fromSub($latestSub, 'ul')
                    ->join('ultra_mikro_pembiayaan_histories as uh', 'uh.id', '=', 'ul.latest_id')
                    ->join('ultra_mikro_pembiayaans as u', 'u.id', '=', 'ul.ultra_mikro_pembiayaan_id')
                    ->where('u.user_id', $userId)
                    ->where('uh.status_id', 7)
                    ->count();

                return compact('proposalUltraMikro', 'notifRevisi');
            });

            $view->with($data);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'),
            $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
