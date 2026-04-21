<?php

namespace Modules\Dirut\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\P3k\Entities\P3kPembiayaan;
use Modules\P3k\Entities\P3kPembiayaanHistory;

setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID', 'id_ID.UTF-8', 'id_ID.8859-1', 'IND.UTF8');

class P3kKomiteController extends Controller
{
     public function index()
     {
          $komite = P3kPembiayaanHistory::select()
               ->latest()
               ->groupBy('p3k_pembiayaan_id')
               ->where(function ($query) {
                    $query->where('status_id', 5)->where('jabatan_id', 4);
               })
               ->orWhere(function ($query) {
                    $query->where('status_id', '>=', 9)
                         ->where('user_id', Auth::user()->id);
               })
               ->get();

          return view('dirut::p3k.komite.index', [
               'title' => 'Data Komite',
               'proposals' => $komite,
          ]);
     }

     public function create() {}

     public function store(Request $request)
     {
          P3kPembiayaanHistory::create([
               'p3k_pembiayaan_id' => $request->p3k_pembiayaan_id,
               'catatan' => $request->catatan,
               'status_id' => $request->status_id,
               'user_id' => Auth::user()->id,
               'jabatan_id' => $request->jabatan_id,
               'divisi_id' => null,
          ]);

          if ($request->status_id == 5) {
               return redirect('/dirut/p3k/komite/')->with('success', 'Proposal Berhasil Disetujui!');
          } elseif ($request->status_id == 7) {
               return redirect('/dirut/p3k/komite/')->with('success', 'Proposal Diajukan Untuk Revisi!');
          }

          return redirect('/dirut/p3k/komite/');
     }

     public function show($id)
     {
          $pembiayaan = P3kPembiayaan::with(['nasabah'])->where('id', $id)->firstOrFail();

          $historyStatus = P3kPembiayaanHistory::where('p3k_pembiayaan_id', $id)
               ->orderBy('created_at', 'desc')->first();

          return view('dirut::p3k.komite.lihat', [
               'title' => 'Detail Komite',
               'pembiayaan' => $pembiayaan,
               'historyStatus' => $historyStatus,
          ]);
     }

     public function edit($id) {}
     public function update(Request $request, $id) {}
     public function destroy($id) {}
}
