<?php

namespace Modules\P3k\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\P3k\Entities\P3kPipeline;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

//Locale Indonesia
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class P3kPipelineController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // Step 1: Retrieve aggregated data (SUM) per user per month to reduce memory
        // cache aggregates briefly to reduce repeated heavy queries
        $pipelines = Cache::remember('p3k.pipeline.aggregates', 30, function () {
            return P3kPipeline::join('users', 'users.id', '=', 'p3k_pipelines.user_id')
                ->select('users.name', DB::raw('SUM(p3k_pipelines.nominal_target) as nominal_target'), DB::raw('SUM(p3k_pipelines.nominal_realisasi) as nominal_realisasi'), DB::raw('SUM(p3k_pipelines.nominal_on_process) as nominal_on_process'), 'p3k_pipelines.bulan')
                ->groupBy('users.name', 'p3k_pipelines.bulan')
                ->get();
        });

        // Filter data by bulan (grouped aggregated results)
        $filteredData = $this->filterDataByMonth($pipelines);

        $months = $filteredData->keys()->all();

        // Set default and selected month
        $defaultMonth = now()->translatedFormat('F');
        // $reqBulan =  request()->input('bulan');
        // $selectedMonth = $reqBulan ?? $defaultMonth;
        $selectedMonth = request()->input('bulan', $defaultMonth);

        // dd($reqBulan, $selectedMonth);

        //Current month and year
        $currentMonth = now()->translatedFormat('F');
        $currentYear = now()->translatedFormat('Y');

        $userPipelines = P3kPipeline::select()
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();

        $userPipelinesCurrentMonth = P3kPipeline::select()
            ->where('user_id', Auth::user()->id)
            ->where('tahun', $currentYear)
            ->where('bulan', $currentMonth)
            ->latest()
            ->get();


        // Recreate $data array based on the filtered data
        $data = [];
        if (isset($filteredData[$selectedMonth])) {
            // Convert the array to a collection
            $collection = collect($filteredData[$selectedMonth]);
            $data['labels'] = $collection->pluck('name')->toArray();
            $data['datasets'] = [
                [
                    'label' => 'Target',
                    'data' => $collection->pluck('nominal_target')->toArray(),
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'Realisasi',
                    'data' => $collection->pluck('nominal_realisasi')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'On Process',
                    'data' => $collection->pluck('nominal_on_process')->toArray(),
                    'backgroundColor' => 'rgba(255, 206, 86, 0.7)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'borderWidth' => 1
                ]
            ];
        }


        return view('p3k::pipeline.index', [

            'title' => 'Data Pipeline P3K',
            'pipelines' => $pipelines,
            'userPipelines' => $userPipelines,
            'userPipelinesCurrentMonth' => $userPipelinesCurrentMonth,
            'data' => $data,
            // 'totalNominalTarget' => $totalNominalTarget,
            // 'totalNominalRealisasi' => $totalNominalRealisasi,
            // 'totalNominalOnProcess' => $totalNominalOnProcess,
            // 'jmlAo' => $jmlAo,
            // 'jmlAchieved' => $jmlAchieved,
            'filteredData' => $filteredData,
            'selectedMonth' => $selectedMonth,
            'months' => $filteredData->keys()->all(),
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
        ]);
    }

    public function filterByMonth(Request $request)
    {
        $month = $request->input('bulan');

        $pipelines = P3kPipeline::select('users.name', 'p3k_pipelines.nominal_target', 'p3k_pipelines.nominal_realisasi', 'p3k_pipelines.nominal_on_process', 'p3k_pipelines.bulan')
            ->join('users', 'users.id', '=', 'p3k_pipelines.user_id')
            ->where('p3k_pipelines.bulan', $month)
            ->get();

        return response()->json($pipelines);
    }

    // private function filterDataByMonth($pipelines) ALL MONTHS
    // {
    //     $filteredData = [];

    //     // Group data by month
    //     $groupedData = $pipelines->groupBy('bulan');

    //     // Initialize data for all months
    //     $allMonths = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    //     foreach ($allMonths as $month) {
    //         $filteredData[$month] = [];
    //     }

    //     // Fill in data for each month
    //     foreach ($groupedData as $month => $data) {
    //         $filteredData[$month] = $data->toArray();
    //     }

    //     // Convert the array to a collection
    //     return collect($filteredData);
    // }

    private function filterDataByMonth($pipelines)
    {
        // Initialize an empty array to hold the filtered data
        $filteredData = [];

        // Retrieve all unique months from the filtered pipelines
        $uniqueMonths = $pipelines->pluck('bulan')->unique();

        // Iterate over each unique month
        foreach ($uniqueMonths as $month) {
            // Filter the pipelines for the current month
            $filteredPipelines = $pipelines->where('bulan', $month);

            // Convert the filtered pipelines to an array and store them under the month key
            $filteredData[$month] = $filteredPipelines->toArray();
        }

        // Convert the array to a collection (optional)
        return collect($filteredData);
    }

    public function updateData(Request $request)
    {
        $selectedMonth = $request->input('bulan');

        // Retrieve data from the database for the selected month
        $pipelines = P3kPipeline::select('users.name', 'p3k_pipelines.nominal_target', 'p3k_pipelines.nominal_realisasi', 'p3k_pipelines.nominal_on_process', 'p3k_pipelines.bulan')
            ->join('users', 'users.id', '=', 'p3k_pipelines.user_id')
            ->where('p3k_pipelines.bulan', $selectedMonth)
            ->get();

        // Format the data as needed for the chart
        $data = [
            'labels' => $pipelines->pluck('name')->toArray(),
            'datasets' => [
                [
                    'label' => 'Target',
                    'data' => $pipelines->pluck('nominal_target')->toArray()
                ],
                [
                    'label' => 'Realisasi',
                    'data' => $pipelines->pluck('nominal_realisasi')->toArray()
                ],
                [
                    'label' => 'On Process',
                    'data' => $pipelines->pluck('nominal_on_process')->toArray()
                ]
            ]
        ];

        // Return the data as JSON
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('p3k::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        // Check if the request contains both month and year parameters
        if ($request->has('bulan') && $request->has('tahun')) {
            $selectedMonth = $request->input('bulan');
            $selectedYear = $request->input('tahun');

            $filteredData = P3kPipeline::select('users.name', 'p3k_pipelines.nominal_target', 'p3k_pipelines.nominal_realisasi', 'p3k_pipelines.nominal_on_process', 'p3k_pipelines.bulan')
                ->join('users', 'users.id', '=', 'p3k_pipelines.user_id')
                ->where('p3k_pipelines.bulan', $selectedMonth)
                ->whereYear('p3k_pipelines.created_at', $selectedYear) // Filter by year
                ->get()
                ->groupBy('bulan'); // Group by bulan
        } else {
            // If either month or year parameter is missing, fetch all data
            $filteredData = P3kPipeline::select('users.name', 'p3k_pipelines.nominal_target', 'p3k_pipelines.nominal_realisasi', 'p3k_pipelines.nominal_on_process', 'p3k_pipelines.bulan')
                ->join('users', 'users.id', '=', 'p3k_pipelines.user_id')
                ->get()
                ->groupBy('bulan'); // Group by bulan
        }


        // Recreate $data array based on the filtered data
        $data = [];
        if (isset($filteredData[$selectedMonth])) {
            // Convert the collection to an array
            $collection = $filteredData[$selectedMonth];
            $data['labels'] = $collection->pluck('name')->toArray();
            $data['datasets'] = [
                [
                    'label' => 'Target',
                    'data' => $collection->pluck('nominal_target')->toArray(),
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'Realisasi',
                    'data' => $collection->pluck('nominal_realisasi')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'On Process',
                    'data' => $collection->pluck('nominal_on_process')->toArray(),
                    'backgroundColor' => 'rgba(255, 206, 86, 0.7)',
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'borderWidth' => 1
                ]
            ];
        }
        if ($request->ajax()) {
            // If it's an AJAX request, return JSON data
            return response()->json($data);
        } else {
            // If it's not an AJAX request, return a view
            return view('p3k::pipeline.index', [
                'title' => 'Data Pipeline P3K',
                'data' => $data
                // 'filteredData' => $filteredData,
                // 'selectedMonth' => $selectedMonth
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('p3k::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
