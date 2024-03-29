@extends('ppr::layouts.main')

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
                                    <li class="breadcrumb-item active">Komite
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
                                        <th class="midCenter" style="vertical-align: middle;">NIK</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nama Nasabah</th>
                                        <th class="midCenter" style="vertical-align: middle;">Nilai yang Dimohon</th>
                                        {{-- <th class="midCenter" style="vertical-align: middle;">Peruntukan</th> --}}
                                        <th class="midCenter" style="vertical-align: middle;">Jangka Waktu</th>
                                        <th class="midCenter" style="vertical-align: middle;">Status</th>
                                        <th class="midCenter" style="vertical-align: middle;">AO yang Menangani</th>
                                        <th class="midCenter" style="vertical-align: middle;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        @php
                                            $history = Modules\Ppr\Entities\PprPembiayaanHistory::select()
                                                ->where('form_ppr_pembiayaan_id', $proposal->id)
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
                                            <td style="text-align: center">
                                                {{ date_format($proposal->created_at, 'd-m-Y') }}
                                            </td>
                                            <td style="text-align: center">{{ $proposal->jenis_nasabah }}</td>
                                            <td style="text-align: center">
                                                {{ $proposal->pemohon->form_pribadi_pemohon_no_ktp }}</td>
                                            <td style="text-align: center">
                                                {{ $proposal->pemohon->form_pribadi_pemohon_nama_lengkap }}</td>
                                            <td style="text-align: center">
                                                Rp. {{ number_format($proposal->form_permohonan_nilai_ppr_dimohon) }}
                                            </td>
                                            {{-- <td style="text-align: center">{{ $proposal->form_permohonan_peruntukan_ppr }}
                                            </td> --}}
                                            <td style="text-align: center">{{ $proposal->form_permohonan_jangka_waktu_ppr }}
                                                Tahun
                                                <br />
                                                ({{ $proposal->form_permohonan_jml_bulan }} Bulan)
                                            </td>
                                            <td style="text-align: center"
                                                value=" {{ $history->statusHistory->id }}, {{ $history->jabatan->jabatan_id }}">
                                                @if ($history->statusHistory->id == 5)
                                                    <span
                                                        class="badge rounded-pill badge-light-success">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 9)
                                                    <span class="badge rounded-pill badge-light-success">
                                                        {{ $history->statusHistory->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 4)
                                                    <span
                                                        class="badge rounded-pill badge-light-info">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @elseif ($history->statusHistory->id == 10)
                                                    <a class="badge rounded-pill badge-light-danger" data-bs-toggle="modal"
                                                        data-bs-target="#modalCatatanAkadBatal-{{ $history->id }}">{{ $history->statusHistory->keterangan }}
                                                    </a>
                                                @elseif ($history->statusHistory->id == 6)
                                                    <span
                                                        class="badge rounded-pill badge-light-danger">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @else
                                                    <span
                                                        class="badge rounded-pill badge-light-warning">{{ $history->statusHistory->keterangan }}
                                                        {{ $history->jabatan->keterangan }}</span>
                                                @endif
                                            </td>

                                            <td style="text-align: center">{{ $proposal->user->name }}
                                            </td>
                                            <td style="text-align: center">
                                                <a href="/ppr/komite/{{ $proposal->id }}"
                                                    class="btn btn-outline-info round">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @foreach ($proposals as $forCatatanModal)
                                        @php
                                            $historyCatatan = Modules\Ppr\Entities\PprPembiayaanHistory::where('form_ppr_pembiayaan_id', $forCatatanModal->id)
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
