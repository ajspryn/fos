<?php

namespace Modules\P3k\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\P3k\Entities\P3kPembiayaan;

class P3kServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'P3k';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'p3k';

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

        View::composer('p3k::layouts.sidebar', function ($view) {
            $userId = Auth::id();

            $data = Cache::remember("p3k:sidebar:{$userId}", 300, function () use ($userId) {
                if (!$userId) {
                    return ['proposalP3k' => 0, 'notifRevisi' => 0];
                }

                $proposalP3k = P3kPembiayaan::where('user_id', $userId)
                    ->whereNull('dokumen_ideb')
                    ->count();

                $latestSub = DB::table('p3k_pembiayaan_histories')
                    ->select('p3k_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('p3k_pembiayaan_id');

                $notifRevisi = DB::query()
                    ->fromSub($latestSub, 'pl')
                    ->join('p3k_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                    ->join('p3k_pembiayaans as pp', 'pp.id', '=', 'pl.p3k_pembiayaan_id')
                    ->where('pp.user_id', $userId)
                    ->where('ph.status_id', 7)
                    ->count();

                return compact('proposalP3k', 'notifRevisi');
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
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
