@extends('analis::layouts.main')

@section('content')
    <style>
        .pCenter {
            text-align: center;
        }

        .midJustify {
            vertical-align: middle;
            text-align: justify;
        }

        .midCenter {
            vertical-align: middle;
            text-align: center;
        }
    </style>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Proposal</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/ppr">PPR</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Proposal</a>
                                    </li>
                                    <li class="breadcrumb-item active">Data Pengajuan
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
                                        <th class="midCenter" style="vertical-align: middle;"></th>
                                        <th class="midCenter" style="vertical-align: middle;">No</th>
                                        <th class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon
                                        </th>
                                        <th class="midCenter" style="vertical-align: middle;">Peruntukan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                ->where('id', $proposal->form_ppr_pembiayaan_id)
                                                ->get()
                                                ->first();

                                            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                ->where('form_ppr_pembiayaan_id', $proposal_ppr->id)
                                                ->orderBy('created_at', 'desc')
                                                ->get()
                                                ->first();
                                        @endphp

                                        @if (($history->status_id == 5 && $history->jabatan_id == 2) ||
                                            ($history->status_id == 4 && $history->jabatan_id == 3))
                                            <tr>
                                                <td style="text-align: center">
                                                    <button type="button"
                                                        class="btn btn-icon btn-icon rounded-circle btn-flat-success">
                                                        <i data-feather="eye"></i>
                                                    </button>
                                                </td>
                                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                                <td style="text-align: center">
                                                    {{ date_format($proposal_ppr->created_at, 'd-m-Y') }}
                                                </td>
                                                <td style="text-align: center">{{ $proposal_ppr->jenis_nasabah }}</td>
                                                <td style="text-align: center">
                                                    {{ $proposal_ppr->pemohon->form_pribadi_pemohon_nama_lengkap }}</td>
                                                <td style="text-align: center">
                                                    Rp.
                                                    {{ number_format($proposal_ppr->form_permohonan_nilai_ppr_dimohon) }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_ppr->form_permohonan_peruntukan_ppr }}
                                                </td>
                                                <td style="text-align: center">
                                                    {{ $proposal_ppr->form_permohonan_jangka_waktu_ppr }} Bulan
                                                </td>
                                                <td>
                                                    <a href="/analis/ppr/komite/{{ $proposal_ppr->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
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
    <!-- END: Content-->
@endsection
