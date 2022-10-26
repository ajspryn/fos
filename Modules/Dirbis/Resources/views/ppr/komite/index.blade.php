@extends('dirbis::layouts.main')

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
                                    <li class="breadcrumb-item"><a href="/dirbis/ppr">PPR</a>
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
                                        <th class="midCenter" style="vertical-align: middle;">No.</th>
                                        <th class="midCenter" style="vertical-align: middle;">Tanggal Pengajuan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jenis Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        <th class="midCenter" style="vertical-align: middle;">Peruntukan</th>
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($komites as $komite)
                                        @php
                                            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                ->where('id', $komite->form_ppr_pembiayaan_id)
                                                ->get()
                                                ->first();

                                            $history = Modules\Ppr\Entities\PprPembiayaanHistory::where('form_ppr_pembiayaan_id', $proposal_ppr->id)
                                                ->latest()
                                                ->first();

                                        @endphp
                                        @if ($history->jabatan_id == 4 ||
                                            ($history->jabatan_id == 3 && $history->status_id == 5) ||
                                            ($history->jabatan_id == 1 && $history->status_id >= 9))
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
                                                <td>{{ $proposal_ppr->jenis_nasabah }}</td>
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
                                                    {{ $proposal_ppr->form_permohonan_jangka_waktu_ppr }}
                                                    Tahun
                                                    <br />
                                                    ({{ $proposal_ppr->form_permohonan_jml_bulan }} Bulan)
                                                </td>
                                                <td style="text-align: center"
                                                    value=" {{ $history->statusHistory->id }}, {{ $history->jabatan->jabatan_id }}">
                                                    @if ($history->statushistory->id == 5 && $history->jabatan->jabatan_id == 4)
                                                        <span
                                                            class="badge rounded-pill badge-light-success">{{ $history->statusHistory->keterangan }}
                                                            {{ $history->jabatan->keterangan }}</span>
                                                    @elseif ($history->statusHistory->id == 9)
                                                        <span class="badge rounded-pill badge-light-success">
                                                            {{ $history->statusHistory->keterangan }}</span>
                                                    @elseif ($history->statushistory->id == 5 && $history->jabatan->jabatan_id == 3)
                                                        <span
                                                            class="badge rounded-pill badge-light-info">{{ $history->statusHistory->keterangan }}
                                                            {{ $history->jabatan->keterangan }}</span>
                                                    @elseif ($history->statusHistory->id == 10)
                                                        <a class="badge rounded-pill badge-light-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history->statusHistory->keterangan }}
                                                        </a>
                                                    @else
                                                        <span
                                                            class="badge rounded-pill badge-light-warning">{{ $history->statusHistory->keterangan }}
                                                            {{ $history->jabatan->keterangan }}</span>
                                                    @endif
                                                </td>

                                                <td style="text-align: center">{{ $proposal_ppr->user->name }}
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="/dirbis/ppr/komite/{{ $proposal_ppr->id }}"
                                                        class="btn btn-outline-info round">Detail</a>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    @foreach ($komites as $forCatatanModal)
                                        @php
                                            $proposal_ppr = Modules\Form\Entities\FormPprPembiayaan::select()
                                                ->where('id', $forCatatanModal->form_ppr_pembiayaan_id)
                                                ->get()
                                                ->first();

                                            $historyCatatan = Modules\Ppr\Entities\PprPembiayaanHistory::where('form_ppr_pembiayaan_id', $proposal_ppr->id)
                                                ->latest()
                                                ->first();
                                        @endphp
                                        <!-- Modal Catatan Akad Batal -->
                                        <div class="modal fade" id="modalCatatanAkadBatal-{{ $historyCatatan->id }}"
                                            tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-transparent">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body px-sm-5 mx-50 pb-5">
                                                        <h5 class="text-center">Catatan</h5>
                                                        <br />
                                                        <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan">{{ $historyCatatan->catatan }}</textarea>
                                                        <br />
                                                        <div class="row">
                                                            <div class="col-md-6" style="width:150px; margin:0 auto;">
                                                                <button type="button" class="btn btn-primary w-100"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modal Catatan Akad Batal -->
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
