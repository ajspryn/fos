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
    public function create(Request $request)
    {
        // Log request data for debugging
        \Log::info('Request data:', $request->all());

        $proposals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->select(DB::raw("COUNT(*) as count"))
            ->get();

        // Filter data by tahun
        $filteredData = $this->filterDataByYear($proposals);

        $months = $filteredData->keys()->all();

        // Set default and selected month
        $defaultYear = now()->translatedFormat('Y');
        $selectedYear = request()->input('tahun', now()->year);

        $proposalsByMonth = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $selectedYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count, sum(plafond) as jml_disburse')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $data = [
            'labels' => $monthNames,
            'datasets' => [
                [
                    'label' => "Proposals in $selectedYear",
                    'data' => array_fill(0, 12, 0), // Initialize with zero
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ],
                [
                    'label' => "Disburses in $selectedYear",
                    'data' => array_fill(0, 12, 0), // Initialize with zero
                    'backgroundColor' => 'rgba(203, 38, 33, 0.7)',
                    'borderColor' => 'rgba(203, 38, 33, 1)',
                    'borderWidth' => 1
                ]
            ]
        ];

        foreach ($proposalsByMonth as $proposal) {
            // Assuming month values are 1-indexed (1 = January, ..., 12 = December)
            $data['datasets'][0]['data'][$proposal->month - 1] = $proposal->count;
            $data['datasets'][1]['data'][$proposal->month - 1] = $proposal->jml_disburse;
        }

        //Proposal Berhasil Akad
        $proposalSelesais = P3kPembiayaan::join('p3k_pembiayaan_histories', 'p3k_pembiayaans.id', '=', 'p3k_pembiayaan_histories.p3k_pembiayaan_id')
            ->select()
            ->where('p3k_pembiayaan_histories.status_id', 9)
            ->get();

        // $rttotals = Pembiayaan::where('status', 'Selesai Akad')
        //     ->where('segmen', 'P3K')
        //     ->whereYear('pembiayaans.created_at', $selectedYear)
        //     ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
        //     ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
        //     ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
        //     ->selectRaw('p3k_pekerjaans.dinas, COUNT(*) as count')
        //     ->groupBy('p3k_pekerjaans.dinas')
        //     ->get();

        $inputYear = $request->input('inputYear');

        $rttotals = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('pembiayaans.created_at', $inputYear)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->selectRaw('p3k_pekerjaans.dinas, COUNT(*) as count')
            ->groupBy('p3k_pekerjaans.dinas')
            ->get();

        // dd($inputYear);

        $plabels = [];
        $pdatainstansis = [];
        foreach ($rttotals as $rttotal) {
            $plabels[] = $rttotal->dinas;
            $pdatainstansis[] = $rttotal->count;
        }

        // dd($rttotals);

        //piechart
        // $rttotals = DB::table('p3k_nasabahs as jp')
        //     ->join('p3k_pekerjaans as pp', 'pp.p3k_nasabah_id', '=', 'jp.id')
        //     ->select('jp.*', 'pp.*', DB::raw('count(*) as total_noa'))
        //     ->groupBy('pp.dinas')
        //     ->get();



        return view(
            'dirbis::p3k.index',
            [
                'title' => 'Dashboard Dirbis',
                'proposalSelesais' => $proposalSelesais,
                // 'jmlProposalCurrentYear' => $jmlProposalCurrentYear,
                'proposalsByMonth' => $proposalsByMonth,
                'data' => $data,
                'filteredData' => $filteredData,
                'selectedYear' => $selectedYear,
                'plabels' => $plabels,
                'pdatainstansis' => $pdatainstansis,
                // 'currentYear' => $currentYear,
            ]
        );
    }


    public function filterByYear(Request $request)
    {
        $year = $request->input('tahun', now()->year);

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
            ]
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


    public function getDataForDinas(Request $request)
    {
        $year = $request->year;

        $data = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $year)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->selectRaw('p3k_pekerjaans.dinas, COUNT(*) as count')
            ->groupBy('p3k_pekerjaans.dinas')
            ->get();

        return response()->json($data);
    }

    public function getDataForJabatan(Request $request)
    {
        $year = $request->year;
        $dinas = $request->dinas;

        $data = Pembiayaan::where('status', 'Selesai Akad')
            ->where('segmen', 'P3K')
            ->whereYear('created_at', $year)
            ->join('p3k_pembiayaans', 'p3k_pembiayaans.id', '=', 'pembiayaans.kode_kontrak')
            ->join('p3k_nasabahs', 'p3k_pembiayaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->join('p3k_pekerjaans', 'p3k_pekerjaans.p3k_nasabah_id', '=', 'p3k_nasabahs.id')
            ->where('p3k_pekerjaans.dinas', $dinas)
            ->selectRaw('p3k_pekerjaans.jabatan, COUNT(*) as count')
            ->groupBy('p3k_pekerjaans.jabatan')
            ->get();

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
