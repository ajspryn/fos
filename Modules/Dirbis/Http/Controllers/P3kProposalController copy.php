<?php

namespace Modules\Dirbis\Http\Controllers;

use DateTime;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Akad\Entities\Pembiayaan;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

class P3kProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // $proposal = P3kPembiayaanHistory::select()
        //     ->latest()
        //     ->groupBy('p3k_pembiayaan_id')
        //     ->where(function ($query) {
        //         $query
        //             ->where('status_id', '<', 5)
        //             ->where('jabatan_id', '<', 4);
        //     })
        //     ->get();

        $proposal = P3KPembiayaan::select()->get();
        return view('dirbis::p3k.proposal.index', [
            'title' => 'Proposal P3K',
            'proposals' => $proposal,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        // //Query Chart Proposal Per Bulan
        // $proposalPerBulan = P3kPembiayaan::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->pluck('count', 'nama_bulan');

        // $bulans = $proposalPerBulan->keys();
        // $hitungPerBulan = $proposalPerBulan->values();

        //Query Chart Proposal P3k Per Bulan
        // $proposalPerBulan = Pembiayaan::where('status', 'Selesai Akad')
        //     ->where('segmen', 'P3K')
        //     ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as nama_bulan"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->pluck('count', 'nama_bulan');

        // $bulans = $proposalPerBulan->keys();
        // $hitungPerBulan = $proposalPerBulan->values();

        // //Query Chart Disburse P3k Per Bulan
        // $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
        //     ->where('segmen', 'P3K')
        //     ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->pluck('jml_disburse', 'nama_bulan');

        // $labelDisburse = $disbursePerBulan->keys();
        // $dataDisburse = $disbursePerBulan->values();

        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->select(DB::raw("COUNT(*) as count"))
            ->get();

        // Filter data by tahun
        $filteredData = $this->filterDataByYear($proposals);

        $months = $filteredData->keys()->all();

        // Set default and selected month
        $defaultYear = now()->translatedFormat('Y');
        $selectedYear = request()->input('tahun', $defaultYear);

        // dd($reqBulan, $selectedYear);

        //Current month and year
        $currentYear = now()->translatedFormat('Y');

        $jmlProposalCurrentYear = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $currentYear)
            ->latest()
            ->get();


        // Recreate $data array based on the filtered data
        $data = [];
        if (isset($filteredData[$selectedYear])) {
            // Convert the array to a collection
            $collection = collect($filteredData[$selectedYear]);
            $data['labels'] = $collection->pluck('name')->toArray();
            $data['datasets'] = [
                [
                    'label' => 'Proposal',
                    'data' => $collection->pluck('count')->toArray(),
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ]
            ];
        }



        //Query Chart Disburse P3k Per Bulan
        // $disbursePerBulan = Pembiayaan::where('status', 'Selesai Akad')
        //     ->where('segmen', 'P3K')
        //     ->select(DB::raw("MONTHNAME(created_at) as nama_bulan, sum(plafond) as jml_disburse"))
        //     ->whereYear('created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('id', 'ASC')
        //     ->pluck('jml_disburse', 'nama_bulan');

        // $labelDisburse = $disbursePerBulan->keys();
        // $dataDisburse = $disbursePerBulan->values();

        // //Query Chart Plafond Per Bulan
        // $plafondPerBulan = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
        //     ->select(DB::raw("MONTHNAME(p3k_pembiayaans.created_at) as nama_bulan, sum(nominal_pembiayaan) as jml_plafond"))
        //     ->where('p3k_pembiayaan_histories.status_id', 9)
        //     ->whereYear('p3k_pembiayaans.created_at', date('Y'))
        //     ->groupBy(DB::raw("nama_bulan"))
        //     ->orderBy('p3k_pembiayaans.id', 'ASC')
        //     ->pluck('jml_plafond', 'nama_bulan');

        // $labelPlafond = $plafondPerBulan->keys();
        // $dataPlafond = $plafondPerBulan->values();



        //Proposal Berhasil Akad
        $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select()
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->get();

        return view(
            'dirbis::p3k.index',
            [
                'title' => 'Dashboard Dirbis',
                'proposalSelesais' => $proposalSelesais,
                'jmlProposalCurrentYear' => $jmlProposalCurrentYear,
                'data' => $data,
                // 'totalNominalTarget' => $totalNominalTarget,
                // 'totalNominalRealisasi' => $totalNominalRealisasi,
                // 'totalNominalOnProcess' => $totalNominalOnProcess,
                // 'jmlAo' => $jmlAo,
                // 'jmlAchieved' => $jmlAchieved,
                'filteredData' => $filteredData,
                'selectedYear' => $selectedYear,
                // 'months' => $filteredData->keys()->all(),
                // 'currentMonth' => $currentMonth,
                'currentYear' => $currentYear,
            ]
            // ], compact(
            //     'bulans',
            //     'hitungPerBulan',
            //     'labelDisburse',
            //     'dataDisburse',
        );
    }


    public function filterByYear(Request $request)
    {
        $tahun = $request->input('tahun');

        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $tahun)
            ->get();


        return response()->json($proposals);
    }

    private function filterDataByYear($proposals)
    {
        // Initialize an empty array to hold the filtered data
        $filteredData = [];

        // Extract the year from the 'created_at' attribute and get unique years
        $uniqueYears = $proposals->map(function ($item) {
            // Check if created_at is not null before trying to format it
            return $item->created_at ? $item->created_at->format('Y') : null;
        })->filter()->unique();  // Filter out any null values before calling unique()



        // Iterate over each unique year
        foreach ($uniqueYears as $year) {
            // Filter the proposals for the current year
            $filteredPipelines = $proposals->filter(function ($item) use ($year) {
                return $item->created_at->format('Y') == $year; // Match the year of 'created_at'
            });

            // Convert the filtered proposals to an array and store them under the year key
            $filteredData[$year] = $filteredPipelines->toArray();
        }

        // Convert the array to a collection (optional)
        return collect($filteredData);
    }

    public function updateData(Request $request)
    {
        $selectedYear = $request->input('year');

        // Retrieve data from the database for the selected year, grouped by month
        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $selectedYear)
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        // Format the data as needed for the chart
        $data = [
            'labels' => $proposals->pluck('month')->map(function ($month) {
                return DateTime::createFromFormat('!m', $month)->format('F'); // Converts month number to month name
            })->toArray(),
            'datasets' => [
                [
                    'label' => 'Jumlah Proposal',
                    'data' => $proposals->pluck('count')->toArray(),
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        // Return the data as JSON
        return response()->json($data);
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
    public function show($id)
    {
        return view('dirbis::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('dirbis::edit');
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
