<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Modules\Admin\Entities\PasarScoreBobot;
use Modules\Admin\Entities\SkpdScoreTerbobot;

class ParameterBobotController extends Controller
{
     /**
      * Display a listing of parameter bobot.
      */
     public function index(): Renderable
     {
          /** @var Collection<int, SkpdScoreTerbobot> $skpdScoreTerbobots */
          $skpdScoreTerbobots = Schema::hasTable('skpd_score_terbobots')
               ? SkpdScoreTerbobot::query()->orderBy('id')->get()
               : collect();

          /** @var Collection<int, PasarScoreBobot> $pasarScoreBobots */
          $pasarScoreBobots = Schema::hasTable('pasar_score_bobots')
               ? PasarScoreBobot::query()->orderBy('id')->get()
               : collect();

          return view('admin::parameterbobot.index', [
               'title' => 'Parameter Bobot',
               'skpdScoreTerbobots' => $skpdScoreTerbobots,
               'pasarScoreBobots' => $pasarScoreBobots,
          ]);
     }
}
