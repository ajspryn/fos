<?php

return [
     'enable_runnable_solutions' => env('IGNITION_ENABLE_RUNNABLE_SOLUTIONS', false),

     'editor' => env('IGNITION_EDITOR', 'vscode'),

     'theme' => env('IGNITION_THEME', 'auto'),

     'enable_query_log' => env('IGNITION_ENABLE_QUERY_LOG', true),

     'reporting' => [
          'enabled' => env('IGNITION_REPORTING_ENABLED', false),
          'endpoint' => env('IGNITION_REPORTING_ENDPOINT', ''),
     ],

     'ignored_solution_providers' => [],
];
