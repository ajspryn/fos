<?php

namespace Modules\Ppr\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Form\Entities\FormPprPembiayaan;

class PprServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Ppr';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'ppr';

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

        View::composer('ppr::layouts.sidebar', function ($view) {
            $userId = Auth::id();

            $data = Cache::remember("ppr:sidebar:{$userId}", 300, function () use ($userId) {
                if (!$userId) {
                    return ['proposalPpr' => 0, 'notifRevisi' => 0];
                }

                $proposalPpr = FormPprPembiayaan::where('user_id', $userId)
                    ->where(function ($query) {
                        $query->whereNull('dilengkapi_ao')
                            ->orWhereNull('form_cl')
                            ->orWhereNull('form_score');
                    })
                    ->count();

                $latestSub = DB::table('ppr_pembiayaan_histories')
                    ->select('form_ppr_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('form_ppr_pembiayaan_id');

                $notifRevisi = DB::query()
                    ->fromSub($latestSub, 'pl')
                    ->join('ppr_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                    ->join('form_ppr_pembiayaans as fp', 'fp.id', '=', 'pl.form_ppr_pembiayaan_id')
                    ->where('fp.user_id', $userId)
                    ->where('ph.status_id', 7)
                    ->count();

                return compact('proposalPpr', 'notifRevisi');
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
