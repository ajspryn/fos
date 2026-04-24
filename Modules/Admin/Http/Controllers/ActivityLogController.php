<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\AdminActivityLog;

class ActivityLogController extends Controller
{
     public function index(Request $request): Renderable
     {
          $search = $request->input('search');
          $module = $request->input('module');

          $logs = AdminActivityLog::with('user')
               ->when($search, fn($q) => $q->where(function ($q2) use ($search) {
                    $q2->where('description', 'LIKE', "%{$search}%")
                         ->orWhere('action', 'LIKE', "%{$search}%")
                         ->orWhereHas('user', fn($u) => $u->where('name', 'LIKE', "%{$search}%"));
               }))
               ->when($module, fn($q) => $q->where('module', $module))
               ->orderByDesc('created_at')
               ->paginate(20)
               ->withQueryString();

          $modules = AdminActivityLog::select('module')
               ->distinct()
               ->whereNotNull('module')
               ->orderBy('module')
               ->pluck('module');

          return view('admin::activity-log.index', compact('logs', 'modules', 'search', 'module'));
     }
}
