@extends('analis::layouts.main')

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
                                        {{-- <th style="text-align: center">AO Yang Menangani</th> --}}
                                        <th style="text-align: center">Status</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($komites as $komite)
                                        @php
                                            $proposal_pasar = Modules\Pasar\Entities\PasarPembiayaan::select()
                                                ->where('id', $komite->pasar_pembiayaan_id)
                                                ->get()
                                                ->first();

                                            $history = Modules\Pasar\Entities\PasarPembiayaanHistory::select()
                                                ->where('pasar_pembiayaan_id', $proposal_pasar->id)
                                                ->orderby('created_at', 'desc')
                                                ->get()
                                                ->first();
                                        @endphp
                                        <tr>
                                            <td style="text-align: center">
                                                <button type="button"
                                                    class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="text-align: center">{{ $loop->iteration }}</td>
                                            <td>{{ $proposal_pasar->nasabahh->nama_nasabah }}</td>
                                            <td>{{ $proposal_pasar->nasabahh->alamat }},
                                                {{ $proposal_pasar->nasabahh->rt }},
                                                {{ $proposal_pasar->nasabahh->rw }},
                                                {{ $proposal_pasar->nasabahh->desa_kelurahan }},
                                                {{ $proposal_pasar->nasabahh->kecamatan }},
                                                {{ $proposal_pasar->nasabahh->kabkota }},
                                                {{ $proposal_pasar->nasabahh->provinsi }}</td>
                                            <td style="text-align: center">
                                                {{ $proposal_pasar->keteranganusaha->nama_usaha }}</td>
                                            <td style="text-align: center"
                                                value="{{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}">
                                                {{ $proposal_pasar->keteranganusaha->jenispasar->nama_pasar }}</td>
                                            <td style="text-align: center">{{ $proposal_pasar->harga }}</td>
                                            <td style="text-align: center">{{ $proposal_pasar->tgl_pembiayaan }}</td>
                                            <td style="text-align: center"><span
                                                    class="badge rounded-pill badge-light-info">{{ $history->status }}</span>
                                            </td>
                                            {{-- <td style="text-align: center">{{ $proposal_pasar->user->name }}</td> --}}
                                            <td>
                                                <form method="post" action="/analis/pasar/komite/">
                                                    @csrf
                                                    <a href="/analis/pasar/komite/{{ $proposal_pasar->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </form>
                                            </td>
                                        </tr>
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
