<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UiMaintenanceMode
{
     /**
      * Handle an incoming request.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
      * @return \Symfony\Component\HttpFoundation\Response
      */
     public function handle(Request $request, Closure $next)
     {
          if (!config('app.ui_maintenance.enabled', false)) {
               return $next($request);
          }

          $bypassToken = (string) config('app.ui_maintenance.bypass_token', '');
          if ($bypassToken !== '' && hash_equals($bypassToken, (string) $request->query('bypass'))) {
               return $next($request);
          }

          return response()->view('maintenance', [
               'title' => (string) config('app.ui_maintenance.title', 'Sedang Maintenance'),
               'message' => (string) config('app.ui_maintenance.message', 'Aplikasi sedang dalam proses maintenance. Silakan coba kembali beberapa saat lagi.'),
               'eta' => (string) config('app.ui_maintenance.eta', ''),
          ], 503);
     }
}
