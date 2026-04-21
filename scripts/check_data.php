<?php

use Illuminate\Support\Facades\DB;

$tables = ['skpd_pembiayaans', 'umkm_pembiayaans', 'pasar_pembiayaans', 'ppr_pembiayaans', 'p3k_pembiayaans', 'ultra_mikro_pembiayaans'];
foreach ($tables as $t) {
     try {
          $c = DB::table($t)->count();
          echo $t . ': ' . $c . PHP_EOL;
     } catch (Exception $e) {
          echo $t . ': ERROR ' . PHP_EOL;
     }
}
