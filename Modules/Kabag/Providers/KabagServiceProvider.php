<?php

namespace Modules\Kabag\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class KabagServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Kabag';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'kabag';

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

        View::composer('kabag::layouts.sidebar', function ($view) {
            $data = Cache::remember('kabag:sidebar:stats', 300, function () {
                $skpdLatest = DB::table('skpd_pembiayaan_histories')
                    ->select('skpd_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('skpd_pembiayaan_id');

                $pasarLatest = DB::table('pasar_pembiayaan_histories')
                    ->select('pasar_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('pasar_pembiayaan_id');

                $umkmLatest = DB::table('umkm_pembiayaan_histories')
                    ->select('umkm_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('umkm_pembiayaan_id');

                $pprLatest = DB::table('ppr_pembiayaan_histories')
                    ->select('form_ppr_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('form_ppr_pembiayaan_id');

                $p3kLatest = DB::table('p3k_pembiayaan_histories')
                    ->select('p3k_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('p3k_pembiayaan_id');

                $ultraLatest = DB::table('ultra_mikro_pembiayaan_histories')
                    ->select('ultra_mikro_pembiayaan_id', DB::raw('MAX(id) as latest_id'))
                    ->groupBy('ultra_mikro_pembiayaan_id');

                $komiteSkpd = DB::query()
                    ->fromSub($skpdLatest, 'sl')
                    ->join('skpd_pembiayaan_histories as sh', 'sh.id', '=', 'sl.latest_id')
                    ->where('sh.status_id', 5)
                    ->where('sh.jabatan_id', 2)
                    ->count();

                $proposalSkpd = DB::query()
                    ->fromSub($skpdLatest, 'sl2')
                    ->join('skpd_pembiayaan_histories as sh2', 'sh2.id', '=', 'sl2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('sh2.status_id', 11)->where('sh2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('sh2.status_id', 4)->where('sh2.jabatan_id', 2);
                        });
                    })
                    ->count();

                $komite = DB::query()
                    ->fromSub($pasarLatest, 'pl')
                    ->join('pasar_pembiayaan_histories as ph', 'ph.id', '=', 'pl.latest_id')
                    ->where('ph.status_id', 5)
                    ->where('ph.jabatan_id', 2)
                    ->count();

                $data = DB::query()
                    ->fromSub($pasarLatest, 'pl2')
                    ->join('pasar_pembiayaan_histories as ph2', 'ph2.id', '=', 'pl2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('ph2.status_id', 11)->where('ph2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('ph2.status_id', 4)->where('ph2.jabatan_id', 2);
                        });
                    })
                    ->count();

                $b = DB::query()
                    ->fromSub($umkmLatest, 'ul')
                    ->join('umkm_pembiayaan_histories as uh', 'uh.id', '=', 'ul.latest_id')
                    ->where('uh.status_id', 5)
                    ->where('uh.jabatan_id', 2)
                    ->count();

                $a = DB::query()
                    ->fromSub($umkmLatest, 'ul2')
                    ->join('umkm_pembiayaan_histories as uh2', 'uh2.id', '=', 'ul2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('uh2.status_id', 11)->where('uh2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('uh2.status_id', 4)->where('uh2.jabatan_id', 2);
                        });
                    })
                    ->count();

                $komiteppr = DB::query()
                    ->fromSub($pprLatest, 'prl')
                    ->join('ppr_pembiayaan_histories as prh', 'prh.id', '=', 'prl.latest_id')
                    ->where('prh.status_id', 5)
                    ->where('prh.jabatan_id', 2)
                    ->count();

                $proposalppr = DB::query()
                    ->fromSub($pprLatest, 'prl2')
                    ->join('ppr_pembiayaan_histories as prh2', 'prh2.id', '=', 'prl2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('prh2.status_id', 11)->where('prh2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('prh2.status_id', 4)->where('prh2.jabatan_id', 2);
                        });
                    })
                    ->count();

                $komiteP3k = DB::query()
                    ->fromSub($p3kLatest, 'p3l')
                    ->join('p3k_pembiayaan_histories as p3h', 'p3h.id', '=', 'p3l.latest_id')
                    ->where('p3h.status_id', 5)
                    ->where('p3h.jabatan_id', 2)
                    ->count();

                $proposalP3k = DB::query()
                    ->fromSub($p3kLatest, 'p3l2')
                    ->join('p3k_pembiayaan_histories as p3h2', 'p3h2.id', '=', 'p3l2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('p3h2.status_id', 11)->where('p3h2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('p3h2.status_id', 4)->where('p3h2.jabatan_id', 2);
                        });
                    })
                    ->count();

                $komiteUltraMikro = DB::query()
                    ->fromSub($ultraLatest, 'ultra')
                    ->join('ultra_mikro_pembiayaan_histories as uh', 'uh.id', '=', 'ultra.latest_id')
                    ->where('uh.status_id', 5)
                    ->where('uh.jabatan_id', 2)
                    ->count();

                $proposalUltraMikro = DB::query()
                    ->fromSub($ultraLatest, 'ultra2')
                    ->join('ultra_mikro_pembiayaan_histories as uh2', 'uh2.id', '=', 'ultra2.latest_id')
                    ->where(function ($q) {
                        $q->where(function ($q2) {
                            $q2->where('uh2.status_id', 11)->where('uh2.jabatan_id', 3);
                        })->orWhere(function ($q2) {
                            $q2->where('uh2.status_id', 4)->where('uh2.jabatan_id', 2);
                        });
                    })
                    ->count();

                return compact(
                    'komiteSkpd',
                    'proposalSkpd',
                    'komite',
                    'data',
                    'b',
                    'a',
                    'komiteppr',
                    'proposalppr',
                    'komiteP3k',
                    'proposalP3k',
                    'komiteUltraMikro',
                    'proposalUltraMikro'
                );
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
