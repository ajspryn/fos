@extends('dirbis::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal Nasabah</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/pasar">Pasar</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Proposal
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <table class="datatables-basic table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center"></th>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Nama nasabahh</th>
                                        <th style="text-align: center">Alamat</th>
                                        <th style="text-align: center">Nama Kios / Los</th>
                                        <th style="text-align: center">Alamat Pasar</th>
                                        <th style="text-align: center">Nominal Pembiayaan</th>
                                        <th style="text-align: center">Tanggal Pengajuan</th>
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">AO Yang Menangani</th>
                                        {{-- <th style="text-align: center">Actionn</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            
                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                ->where('pasar_pembiayaan_id', $proposal->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                            
                                            $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                ->where('id', $history->pasar_pembiayaan_id)
                                                ->get()
                                                ->first();
                                        @endphp

                                        @if (( $history->jabatan_id == 0 || $history->jabatan_id == 1 ||  $history->jabatan_id == 2 || $history->jabatan_id == 3 && $history->status_id == 4 ))
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $proposal_pasar->nasabahh->alamat }}
                                            <td style="text-align: center">
                                                {{ $proposal_pasar->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center"
                                                value="{{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}">
                                                {{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}</td>
                                            <td style="text-align: center">Rp.{{ number_format($proposal_pasar->harga) }}</td>
                                            <td style="text-align: center">{{ $proposal_pasar->tgl_pembiayaan }}</td>
                                            <td style="text-align: center"
                                                value="{{ $history->statushistory->id }} ,{{ $history->jabatan->jabatan_id }} ">
                                                @if ($history->statushistory->id == 5 || $history->statushistory->id == 9 )
                                                    <span
                                                        class="badge rounded-pill badge-light-success">{{ $history->statushistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statushistory->id == 4)
                                                    <span
                                                        class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statushistory->id == 7)
                                                    <span
                                                        class="badge rounded-pill badge-light-warning">{{ $history->statushistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statushistory->id == 6 || $history->statushistory->id == 10)
                                                    <span
                                                        class="badge rounded-pill badge-light-danger">{{ $history->statushistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @else
                                                        <span
                                                            class="badge rounded-pill badge-light-info">{{ $history->statushistory->keterangan }}
                                                            {{ $history->jabatan->keterangan }}</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center">{{ $proposal_pasar->user->name }}</td>
                                            {{-- <td>
                                                <a href="/dirbis/pasar/komite/{{ $proposal_pasar->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td> --}}
                                        </tr>
                                    @endif
                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Basic table -->
        </div>
    </div>
@endsection
<
