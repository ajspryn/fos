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

    // public function create(Request $request)
    // {


    //     $proposals = Pembiayaan::where('status', 'Selesai Akad')
    //         ->where('segmen', 'P3K')
    //         ->select(DB::raw("COUNT(*) as count"))
    //         ->get();

    //     // Filter data by tahun
    //     $filteredData = $this->filterDataByYear($proposals);

    //     $months = $filteredData->keys()->all();

    //     // Set default and selected month
    //     $defaultYear = now()->translatedFormat('Y');
    //     $selectedYear = request()->input('tahun', now()->year);

    //     $proposalsByMonth = Pembiayaan::where('status', 'Selesai Akad')
    //         ->where('segmen', 'P3K')
    //         ->whereYear('created_at', $selectedYear)
    //         ->selectRaw('MONTH(created_at) as month, COUNT(*) as count, sum(plafond) as jml_disburse')
    //         ->groupBy('month')
    //         ->orderBy('month')
    //         ->get();

    //     $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    //     $data = [
    //         'labels' => $monthNames,
    //         'datasets' => [
    //             [
    //                 'label' => "Proposals in $selectedYear",
    //                 'data' => array_fill(0, 12, 0), // Initialize with zero
    //                 'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
    //                 'borderColor' => 'rgba(203, 38, 33, 1)',
    //                 'borderWidth' => 1
    //             ],
    //             [
    //                 'label' => "Disburses in $selectedYear",
    //                 'data' => array_fill(0, 12, 0), // Initialize with zero
    //                 'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
    //                 'borderColor' => 'rgba(203, 38, 33, 1)',
    //                 'borderWidth' => 1
    //             ]
    //         ]
    //     ];

    //     // foreach ($proposalsByMonth as $proposal) {
    //     //     // Assuming month values are 1-indexed (1 = January, ..., 12 = December)
    //     //     $data['datasets'][0]['data'][$proposal->month - 1] = $proposal->count;
    //     //     $data['datasets'][1]['data'][$proposal->month - 1] = $proposal->jml_disburse;
    //     // }

    //     //Proposal Berhasil Akad
    //     $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
    //         ->select()
    //         ->where('p3k_pembiayaan_histories.status_id', 9)
    //         ->get();

    //     //Pie
    //     $inputYear = $request->input('inputYear');

    //     $grupDinasP3ks = Pembiayaan::where('status', 'Selesai Akad')
    //         ->where('segmen', 'P3K')
    //         ->whereYear('pembiayaans.created_at', $inputYear)
    //         ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
    //         ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
    //         ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
    //         ->selectRaw('p3k_pekerjaans.dinas, COUNT(*) as count')
    //         ->groupBy('p3k_pekerjaans.dinas')
    //         ->get();

    //     // dd($inputYear);

    //     $pLabels = [];
    //     $pDataDinas = [];
    //     foreach ($grupDinasP3ks as $grupDinasP3k) {
    //         $pLabels[] = $grupDinasP3k->dinas;
    //         $pDataDinas[] = $grupDinasP3k->count;
    //     }

    //     // Fetch proposal counts grouped by month and batch
    //     $proposalsByBatch = Pembiayaan::where('status', 'Selesai Akad')
    //         ->where('segmen', 'P3K')
    //         ->whereYear('pembiayaans.created_at', $inputYear)
    //         ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
    //         ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
    //         ->selectRaw('MONTH(pembiayaans.created_at) as month, p3k_nasabahs.batch, COUNT(*) as count')
    //         ->groupBy('month', 'p3k_nasabahs.batch')
    //         ->orderBy('month')
    //         ->get();

    //     // Fetch disburse amounts grouped by month and batch
    //     $disburseByBatch = Pembiayaan::where('status', 'Selesai Akad')
    //         ->where('segmen', 'P3K')
    //         ->whereYear('pembiayaans.created_at', $inputYear)
    //         ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
    //         ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
    //         ->selectRaw('MONTH(pembiayaans.created_at) as month, p3k_nasabahs.batch, SUM(plafond) as jml_disburse')
    //         ->groupBy('month', 'p3k_nasabahs.batch')
    //         ->orderBy('month')
    //         ->get();

    //     foreach ($proposalsByMonth as $proposal) {
    //         $data['datasets'][0]['data'][$proposal->month - 1] = $proposal->count;
    //         $data['datasets'][1]['data'][$proposal->month - 1] = $proposal->jml_disburse;
    //     }

    //     // Prepare batch data for charts
    //     $batchProposalsData = [];
    //     $batchDisburseData = [];

    //     foreach ($proposalsByBatch as $proposal) {
    //         $monthIndex = $proposal->month - 1;
    //         $batch = $proposal->batch;

    //         if (!isset($batchProposalsData[$batch])) {
    //             $batchProposalsData[$batch] = array_fill(0, 12, 0); // Initialize with zero
    //         }
    //         $batchProposalsData[$batch][$monthIndex] = $proposal->count;
    //     }

    //     foreach ($disburseByBatch as $disburse) {
    //         $monthIndex = $disburse->month - 1;
    //         $batch = $disburse->batch;

    //         if (!isset($batchDisburseData[$batch])) {
    //             $batchDisburseData[$batch] = array_fill(0, 12, 0); // Initialize with zero
    //         }
    //         $batchDisburseData[$batch][$monthIndex] = $disburse->jml_disburse;
    //     }


    //     return view(
    //         'dirbis::p3k.index',
    //         [
    //             'title' => 'Dashboard Dirbis',
    //             'proposalSelesais' => $proposalSelesais,
    //             'proposalsByMonth' => $proposalsByMonth,
    //             'data' => $data,
    //             'filteredData' => $filteredData,
    //             'selectedYear' => $selectedYear,
    //             'pLabels' => $pLabels,
    //             'pDataDinas' => $pDataDinas,
    //             'batchLabels' => $monthNames,
    //             'batchProposalsData' => $batchProposalsData,
    //             'batchDisburseData' => $batchDisburseData
    //         ]
    //     );
    // }
    public function create(Request $request)
    {
        // Fetch total proposals and filtered data
        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->select(DB::raw("COUNT(*) as count"))
            ->get();

        // Filter data by tahun (year)
        $filteredData = $this->filterDataByYear($proposals);

        // Get month names
        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        // Set default and selected year
        $defaultYear = now()->translatedFormat('Y');
        $selectedYear = $request->input('tahun', now()->year);

        // Fetch proposals count and disburse amounts grouped by month
        $proposalsByMonth = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $selectedYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count, SUM(plafond) as jml_disburse')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize data structure for Chart.js datasets
        $data = [
            'labels' => $monthNames,
            'datasets' => [
                [
                    'label' => "Proposals in $selectedYear",
                    'data' => array_fill(0, 12, 0), // Initialize with zero for each month
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => "Disburses in $selectedYear",
                    'data' => array_fill(0, 12, 0), // Initialize with zero for each month
                    'backgroundColor' => 'rgba(142, 26, 23, 0.7)',
                    'borderColor' => 'rgba(142, 26, 23, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        // Populate data for proposals and disbursements by month
        foreach ($proposalsByMonth as $proposal) {
            $data['datasets'][0]['data'][$proposal->month - 1] = $proposal->count;
            $data['datasets'][1]['data'][$proposal->month - 1] = $proposal->jml_disburse;
        }

        // Fetch successful proposals (assuming this part is needed for other sections)
        $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select()
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->get();

        // Fetch data for pie charts
        $inputYear = $request->input('inputYear');
        $grupDinasP3ks = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('pembiayaans.created_at', $inputYear)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->selectRaw('p3k_pekerjaans.dinas, COUNT(*) as count')
            ->groupBy('p3k_pekerjaans.dinas')
            ->get();

        // Prepare data for pie charts
        $pLabels = [];
        $pDataDinas = [];
        foreach ($grupDinasP3ks as $grupDinasP3k) {
            $pLabels[] = $grupDinasP3k->dinas;
            $pDataDinas[] = $grupDinasP3k->count;
        }

        // Fetch proposals and disburse amounts grouped by month and batch
        $proposalsByBatch = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('pembiayaans.created_at', $selectedYear)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->selectRaw('MONTH(pembiayaans.created_at) as month, p3k_nasabahs.batch, COUNT(*) as count, SUM(plafond) as jml_disburse')
            ->groupBy('month', 'p3k_nasabahs.batch')
            ->orderBy('month')
            ->get();

        // Initialize data structures for Chart.js datasets
        $proposalsBatchData = [
            'labels' => $monthNames,
            'datasets' => []
        ];

        $disburseBatchData = [
            'labels' => $monthNames,
            'datasets' => []
        ];

        // Collect all unique batch values dynamically
        $uniqueBatches = $proposalsByBatch->pluck('batch')->unique();

        // Populate datasets for each batch
        foreach ($uniqueBatches as $batch) {
            $datasetProposals = [
                'label' => "Batch $batch Proposals in $selectedYear",
                'data' => array_fill(0, 12, 0), // Initialize with zero for each month
                'backgroundColor' => "rgba(" . rand(0, 255) . "," . rand(0, 255) . ", " . rand(0, 255) . ", 0.5)",
                'borderColor' => "rgba(" . rand(0, 255) . "," . rand(0, 255) . ", " . rand(0, 255) . ", 1)",
                'borderWidth' => 1
            ];

            $datasetDisburses = [
                'label' => "Batch $batch Disburses in $selectedYear",
                'data' => array_fill(0, 12, 0), // Initialize with zero for each month
                'backgroundColor' => "rgba(" . rand(0, 255) . "," . rand(0, 255) . ", " . rand(0, 255) . ", 0.5)",
                'borderColor' => "rgba(" . rand(0, 255) . "," . rand(0, 255) . ", " . rand(0, 255) . ", 1)",
                'borderWidth' => 1
            ];

            foreach ($proposalsByBatch as $proposal) {
                if ($proposal->batch == $batch) {
                    $monthIndex = $proposal->month - 1;
                    $datasetProposals['data'][$monthIndex] = $proposal->count;
                    $datasetDisburses['data'][$monthIndex] = $proposal->jml_disburse;
                }
            }

            $proposalsBatchData['datasets'][] = $datasetProposals;
            $disburseBatchData['datasets'][] = $datasetDisburses;
        }

        if ($request->ajax()) {
            return response()->json([
                'proposalsBatchData' => $proposalsBatchData,
                'disburseBatchData' => $disburseBatchData,
            ]);
        }

        return view('dirbis::p3k.index', [
            'title' => 'Dashboard Dirbis',
            'proposalSelesais' => $proposalSelesais,
            'proposalsByMonth' => $proposalsByMonth,
            'filteredData' => $filteredData,
            'selectedYear' => $selectedYear,
            'pLabels' => $pLabels,
            'pDataDinas' => $pDataDinas,
            'proposalsBatchData' => $proposalsBatchData, // Pass as JSON string for non-AJAX request
            'disburseBatchData' => $disburseBatchData // Pass as JSON string for non-AJAX request
            // 'batchLabels' => $monthNames, // Assuming batch labels are the same as month names
            // 'batchProposalsData' => $batchProposalsData,
            // 'batchDisburseData' => $batchDisburseData
        ]);
    }

    public function filterByYear(Request $request)
    {
        $year = $request->input('tahun', now()->year);
        $dinasFilter = $request->input('dinasFilter', 'top5');
        $unitKerjaFilter = $request->input('unitKerjaFilter', 'top5');

        // Fetch data from the database
        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $year)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count, SUM(plafond) as jml_disburse')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Initialize month labels and data with zeros for counts and disburse values
        $monthNames = [
            '01' => 'January', '02' => 'February', '03' => 'March',
            '04' => 'April', '05' => 'May', '06' => 'June',
            '07' => 'July', '08' => 'August', '09' => 'September',
            '10' => 'October', '11' => 'November', '12' => 'December'
        ];
        $counts = array_fill_keys(array_keys($monthNames), 0);
        $disbursements = array_fill_keys(array_keys($monthNames), 0);

        // Populate the counts and disbursements arrays with data from the database
        foreach ($proposals as $proposal) {
            $monthKey = str_pad($proposal->month, 2, '0', STR_PAD_LEFT);
            $counts[$monthKey] = $proposal->count;
            $disbursements[$monthKey] = $proposal->jml_disburse;
        }

        // Prepare labels and data for the response
        $labels = array_values($monthNames); // Get month names in order
        $counts = array_values($counts);     // Get counts in the same order as labels
        $jml_disburse = array_values($disbursements); // Get disbursements in the same order as labels

        // Your existing logic to calculate statistics
        $diterima = Pembiayaan::whereYear('created_at', $year)
            ->where('segmen', 'P3K')
            ->where('status', 'Selesai Akad')
            ->count();

        $p3ks = P3kPembiayaan::whereYear('created_at', $year)->get();
        $proposalP3k = 0;
        foreach ($p3ks as $p3k) {
            $history = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $p3k->id)->latest()->first();
            if (($history->jabatan_id == 2 && $history->status_id == 5) || ($history->jabatan_id == 2 && $history->status_id == 4)) {
                $proposalP3k++;
            }
        }

        $ditolak = P3kPembiayaanHistory::whereYear('created_at', $year)->where('status_id', 6)->count();

        $komites = P3kPembiayaan::whereYear('created_at', $year)->whereNotNull('dokumen_ideb')->latest()->get();
        $review = 0;
        foreach ($komites as $komite) {
            $history = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $komite->id)->latest()->first();
            if ($history->status_id == 7) {
                $review++;
            }
        }

        $pipeline = 0;
        $p3kPipelines = P3kPembiayaan::whereYear('created_at', $year)->get();
        foreach ($p3kPipelines as $p3kPipeline) {
            $history = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $p3kPipeline->id)->latest()->first();
            if ($history->status_id != 5 || $history->jabatan_id != 2) {
                if ($history->status_id < 9) {
                    $pipeline++;
                }
            }
        }
        -+$approvedKabag = 0;
        $p3kApprovedsKabag = P3kPembiayaan::whereYear('created_at', $year)->get();
        foreach ($p3kApprovedsKabag as $p3kApprovedKabag) {
            $history = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $p3kApprovedKabag->id)->latest()->first();
            if ($history->status_id == 5 && $history->jabatan_id == 2) {
                if ($history->status_id < 9) {
                    $approvedKabag++;
                }
            }
        }

        $batalAkad = Pembiayaan::whereYear('created_at', $year)->where('segmen', 'P3K')->where('status', 'Akad Batal')->count();

        // Fetch data for Dinas
        $grupDinasP3ks = $this->getFilteredData($year, 'dinas', $dinasFilter);

        $pLabelDinas = [];
        $pDataDinas = [];
        foreach ($grupDinasP3ks as $grupDinasP3k) {
            $pLabelDinas[] = $grupDinasP3k->dinas;
            $pDataDinas[] = $grupDinasP3k->count;
        }

        // Fetch data for Unit Kerja
        $grupUnitKerjaP3ks = $this->getFilteredData($year, 'nama_unit_kerja', $unitKerjaFilter);

        $pLabelUnitKerja = [];
        $pDataUnitKerja = [];
        foreach ($grupUnitKerjaP3ks as $grupUnitKerjaP3k) {
            $pLabelUnitKerja[] = $grupUnitKerjaP3k->nama_unit_kerja;
            $pDataUnitKerja[] = $grupUnitKerjaP3k->count;
        }

        // Example logic to fetch proposalsBatchData and disburseBatchData
        $proposalsBatchData = []; // Fetch or initialize your data here
        $disburseBatchData = []; // Fetch or initialize your data here


        return response()->json([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Jumlah Proposal',
                    'data' => $counts,
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => 'Jumlah Disburse',
                    'data' => $jml_disburse,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ]
            ],
            'pengajuan' => array_sum($counts),
            'batalAkad' => $batalAkad,
            'diterima' => $diterima,
            'ditolak' => $ditolak,
            'approvedKabag' => $approvedKabag,
            'review' => $review,
            'pipeline' => $pipeline,
            'pLabelDinas' => $pLabelDinas,
            'pDataDinas' => $pDataDinas,
            'pLabelUnitKerja' => $pLabelUnitKerja,
            'pDataUnitKerja' => $pDataUnitKerja,
            'proposalsBatchData' => $proposalsBatchData,
            'disburseBatchData' => $disburseBatchData,
        ]);
    }


    private function filterDataByYear($proposals)
    {
        // Group proposals by year
        $filteredData = $proposals->groupBy(function ($item) {
            return $item->created_at ? $item->created_at->format('Y') : null;
        });

        // Optionally, convert each group to arrays
        $filteredData->transform(function ($yearGroup) {
            return $yearGroup->toArray();
        });

        return $filteredData;
    }

    private function getFilteredData($year, $column, $filter)
    {
        $query = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('pembiayaans.created_at', $year)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->selectRaw("p3k_pekerjaans.$column, COUNT(*) as count")
            ->groupBy("p3k_pekerjaans.$column");

        switch ($filter) {
            case 'top10':
                $query->orderByDesc('count')->limit(10);
                break;
            case 'all':
                $query->orderByDesc('count');
                break;
            default: // 'top5'
                $query->orderByDesc('count')->limit(5);
                break;
        }

        return $query->get();
    }

    public function updateData(Request $request)
    {
        $selectedYear = $request->input('year', now()->year); // Default to the current year if not specified

        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $selectedYear)
            ->select(DB::raw("COUNT(*) as count"), DB::raw("MONTH(created_at) as month"))
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->get();

        $monthCounts = array_fill(0, 12, 0); // Initialize array to hold counts for all months

        foreach ($proposals as $proposal) {
            // Subtract 1 to match array index (0-11)
            $monthCounts[$proposal->month - 1] = $proposal->count;
        }

        $data = [
            'labels' => array_map(function ($month) {
                return DateTime::createFromFormat('!m', $month)->format('F');
            }, range(1, 12)), // Ensure all months are labeled
            'datasets' => [
                [
                    'label' => 'Jumlah Proposal',
                    'data' => $monthCounts,
                    'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

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
