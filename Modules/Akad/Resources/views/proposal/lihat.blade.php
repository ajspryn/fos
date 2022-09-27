@extends('akad::layouts.main')

@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="nav-filled">

                    <div class="col-xl-12 col-lg-12">
                        @if ($segmen == 'PPR')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan PPR</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-xl-12 col-md-8 col-12">
                                        <div class="card invoice-preview-card">

                                            <!-- Detail -->
                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <div class="col-xl-8 p-0">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="pe-1">Jenis Nasabah</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->jenis_nasabah }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Tanggal Pengajuan</td>
                                                                    <td>:
                                                                        {{ date_format($pembiayaan->created_at, 'd-m-Y') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Nama AO</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->user->name }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="pe-1">Akad</td>
                                                                    <td>:
                                                                        @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran_lain != null)
                                                                            {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}
                                                                        @else
                                                                            {{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Peruntukan</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->form_permohonan_peruntukan_ppr }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Nama Nasabah</td>
                                                                    <td>:<span class="fw-bold">
                                                                            {{ $pembiayaan->pemohon->form_pribadi_pemohon_nama_lengkap }}</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Jenis Kelamin</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_jenis_kelamin }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Usia</td>
                                                                    <td>:
                                                                        {{ $usiaNasabah }} Tahun
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">No. Telp</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_telp }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Alamat</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_alamat_domisili }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">No. KTP</td>
                                                                    <td>:
                                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_no_ktp }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="pe-1">Tempat, tanggal lahir
                                                                    </td>
                                                                    <td>:
                                                                        {{ $pembiayaan->pemohon->form_pribadi_pemohon_tempat_lahir }},
                                                                        @php
                                                                            $tgl_lahir = Carbon\Carbon::parse($pembiayaan->pemohon->form_pribadi_pemohon_tanggal_lahir);
                                                                        @endphp
                                                                        {{ date_format($tgl_lahir, 'd-m-Y') }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                        @php
                                                            $fotoPemohon = Modules\Form\Entities\FormPprFoto::Select()
                                                                ->where('form_ppr_pembiayaan_id', $pembiayaan->id)
                                                                ->where('kategori', 'Foto Pemohon')
                                                                ->get()
                                                                ->first();
                                                        @endphp
                                                        <div class="px-sm-5 pb-5" style="margin-right:-67px;">
                                                            <h6 class="text-center">Foto Pemohon</h6>
                                                            <div class="card-body" style="margin-top:-20px;">
                                                                <img src="{{ asset('storage/' . $fotoPemohon->foto) }}"
                                                                    class="d-block w-100" height="240px;" width="240px;"
                                                                    style="border-radius: 5%;" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /Detail -->

                                            <!-- Tombol Aksi -->
                                            <div class="row" style="margin-top:-60px;">
                                                <div class="col-md-12">
                                                    <form action="">
                                                        <input type="hidden" name="" value="" />
                                                        <input type="hidden" name="cek_staff_akad" value="Dicetak" />
                                                        <button type="submit" class="btn btn-info w-100"><i
                                                                data-feather="printer"></i>
                                                            Cetak
                                                            Akad
                                                        </button>
                                                    </form>
                                                </div>
                                                <br />
                                                <p></p>
                                                <div class="col-md-6">
                                                    <button type="button" class="btn btn-primary w-100"
                                                        data-bs-toggle="modal" data-bs-target="#modalAkadPprBatal"><i
                                                            data-feather="x"></i> Akad
                                                        Batal
                                                    </button>
                                                </div>

                                                <!-- Modal Batal-->
                                                <div class="modal fade" id="modalAkadPprBatal" tabindex="-1"
                                                    aria-labelledby="addNewCardTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-transparent">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body px-sm-5 mx-50 pb-5">
                                                                <form action="/staff/proposal" method="POST">
                                                                    @csrf
                                                                    @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya')
                                                                        <input type="hidden" name="akad"
                                                                            value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                                                    @else
                                                                        <input type="hidden" name="akad"
                                                                            value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}" />
                                                                    @endif
                                                                    <input type="hidden" name="segmen" value="PPR" />
                                                                    <input type="hidden" name="cif"
                                                                        value="{{ $pembiayaan->pemohon->id }}" />
                                                                    <input type="hidden" name="kode_tabungan"
                                                                        value="{{ $pembiayaan->id }}" />
                                                                    <input type="hidden" name="plafond"
                                                                        value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                                                    <input type="hidden" name="harga_jual"
                                                                        value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                                                    <input type="hidden" name="status"
                                                                        value="Akad Batal" />
                                                                    <h5 class="text-center">Tuliskan catatan mengapa akad
                                                                        batal!</h5>
                                                                    <br />
                                                                    <textarea class="form-control" name="catatan" rows="3" placeholder="Catatan Anda"></textarea>
                                                                    <input type="hidden" name="form_ppr_pembiayaan_id"
                                                                        value="{{ $pembiayaan->id }}" />
                                                                    <input type="hidden" name="status_id"
                                                                        value="10" />
                                                                    <input type="hidden" name="cek_staff_akad"
                                                                        value="Sudah" />
                                                                    <br />
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <button type="button"
                                                                                class="btn btn-outline-danger w-100"
                                                                                data-bs-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <button type="submit"
                                                                                class="btn btn-primary w-100"><i
                                                                                    data-feather="x"></i> Akad
                                                                                Batal
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Modal Batal-->
                                                <div class="col-md-6">
                                                    <form action="/staff/proposal" method="POST">
                                                        @csrf
                                                        @if ($pembiayaan->form_permohonan_jenis_akad_pembayaran == 'Akad Lainnya')
                                                            <input type="hidden" name="akad"
                                                                value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran_lain }}" />
                                                        @else
                                                            <input type="hidden" name="akad"
                                                                value="{{ $pembiayaan->form_permohonan_jenis_akad_pembayaran }}" />
                                                        @endif
                                                        <input type="hidden" name="segmen" value="PPR" />
                                                        <input type="hidden" name="cif"
                                                            value="{{ $pembiayaan->pemohon->id }}" />
                                                        <input type="hidden" name="kode_tabungan"
                                                            value="{{ $pembiayaan->id }}" />
                                                        <input type="hidden" name="plafond"
                                                            value="{{ $pembiayaan->form_permohonan_nilai_ppr_dimohon }}" />
                                                        <input type="hidden" name="harga_jual"
                                                            value="{{ $pembiayaan->form_permohonan_harga_jual }}" />
                                                        <input type="hidden" name="status" value="Selesai Akad" />
                                                        <input type="hidden" name="form_ppr_pembiayaan_id"
                                                            value="{{ $pembiayaan->id }}" />
                                                        <input type="hidden" name="status_id" value="9" />
                                                        <input type="hidden" name="cek_staff_akad" value="Sudah" />
                                                        <button type="submit" class="btn btn-success w-100"><i
                                                                data-feather="check"></i>
                                                            Selesai
                                                            Akad
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <!-- /Tombol Aksi -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($segmen == 'Pasar')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan Pasar</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-xl-12 col-md-8 col-12">
                                        <div class="card invoice-preview-card">

                                            <!-- Detail -->
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab-justified"
                                                            data-bs-toggle="tab" href="#proposal" role="tab"
                                                            aria-controls="home-just" aria-selected="true">Proposal</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab-justified"
                                                            data-bs-toggle="tab" href="#identitas-pribadi" role="tab"
                                                            aria-controls="profile-just" aria-selected="true">Identitas
                                                            Pribadi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="messages-tab-justified"
                                                            data-bs-toggle="tab" href="#legalitas-agunan" role="tab"
                                                            aria-controls="messages-just" aria-selected="false">Legalitas
                                                            Agunan</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active " id="proposal"
                                                        role="tabpanel"aria-labelledby="home-tab-justified">
                                                        <div class="card-body invoice-padding pt-0">
                                                            <div class="row invoice-spacing">
                                                                <div class="col-xl-8 p-0">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pe-1">Tanggal Pengajuan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tgl_pembiayaan }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama AO</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->user->name }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="pe-1">Akad</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->akad->nama_akad }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Peruntukan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->penggunaan_id }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama Nasabah</td>
                                                                                <td>:<span class="fw-bold">
                                                                                        {{ $pembiayaan->nasabahh->nama_nasabah }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Jenis Kelamin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->jenis_kelamin }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Usia</td>
                                                                                <td>:
                                                                                    {{ $usiaNasabah }} Tahun
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. Telp</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->no_tlp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Alamat</td>
                                                                                <td>:
                                                                                    @if ($pembiayaan->nasabahh->alamat != null)
                                                                                        {{ $pembiayaan->nasabahh->alamat }}
                                                                                    @else
                                                                                        {{ $pembiayaan->nasabahh->alamat_domisili }}
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. KTP</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->no_ktp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tempat, tanggal lahir
                                                                                </td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->tmp_lahir }},
                                                                                    @php
                                                                                        $tgl_lahir = Carbon\Carbon::parse($pembiayaan->nasabahh->tgl_lahir);
                                                                                    @endphp
                                                                                    {{ date_format($tgl_lahir, 'd-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Plafond</td>
                                                                                <td>:
                                                                                    Rp.
                                                                                    {{ number_format($pembiayaan->harga) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tenor</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tenor }} Bulan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Margin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->rate }} / Rp.
                                                                                    {{ number_format($hargaJual - $pembiayaan->harga) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Harga Jual</td>
                                                                                <td>:
                                                                                    Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                    @php
                                                                        $fotoPemohon = Modules\Pasar\Entities\PasarFoto::Select()
                                                                            ->where('pasar_pembiayaan_id', $pembiayaan->id)
                                                                            ->where('kategori', 'Foto Diri')
                                                                            ->get()
                                                                            ->first();
                                                                    @endphp
                                                                    <div class="px-sm-5 pb-5" style="margin-right:-67px;">
                                                                        <h6 class="text-center">Foto Pemohon</h6>
                                                                        <div class="card-body" style="margin-top:-20px;">
                                                                            <img src="{{ asset('storage/' . $fotoPemohon->foto) }}"
                                                                                class="d-block w-100" height="240px;"
                                                                                width="240px;"
                                                                                style="border-radius: 5%;" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                                        aria-labelledby="profile-tab-justified">
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotodiri->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotoktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $fotodiribersamaktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotokk->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotokk->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotokk->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="tab-pane" id="legalitas-agunan"
                                                        role="tabpanel"aria-labelledby="messages-tab-justified">
                                                        @foreach ($jaminanusahas as $jaminan)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0"> Jaminan :
                                                                                {{ $jaminans->nama_jaminan }}
                                                                            </h6>
                                                                            <h6 class="mb-0"><br>No KTB :
                                                                                {{ $jaminan->no_ktb }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                        @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Detail -->

                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <!-- Tombol Aksi -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Dicetak" />
                                                                <a type="submit" class="btn btn-info w-100"
                                                                    href="/staff/cetak/pasar/{{ $pembiayaan->id }}"><i
                                                                        data-feather="printer"></i>

                                                                    Cetak
                                                                    Akad
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <br />
                                                        <p></p>
                                                        <div class="col-md-6">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <button type="submit" class="btn btn-primary w-100"><i
                                                                        data-feather="x"></i> Akad
                                                                    Batal
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form action="/staff/proposal" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="segmen" value="Pasar" />
                                                                <input type="hidden" name="cif"
                                                                    value="{{ $pembiayaan->nasabahh->id }}" />
                                                                <input type="hidden" name="kode_tabungan"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="plafond"
                                                                    value="{{ $pembiayaan->harga }}" />
                                                                <input type="hidden" name="harga_jual"
                                                                    value="{{ $hargaJual }}" />
                                                                <input type="hidden" name="status"
                                                                    value="Selesai Akad" />
                                                                <input type="hidden" name="pasar_pembiayaan_id"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="status_id" value="9" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Sudah" />
                                                                <button type="submit" class="btn btn-success w-100"><i
                                                                        data-feather="check"></i>
                                                                    Selesai
                                                                    Akad
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Tombol Aksi -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($segmen == 'UMKM')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan UMKM</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-xl-12 col-md-8 col-12">
                                        <div class="card invoice-preview-card">

                                            <!-- Detail -->
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab-justified"
                                                            data-bs-toggle="tab" href="#proposal" role="tab"
                                                            aria-controls="home-just" aria-selected="true">Proposal</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab-justified"
                                                            data-bs-toggle="tab" href="#identitas-pribadi" role="tab"
                                                            aria-controls="profile-just" aria-selected="true">Identitas
                                                            Pribadi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="messages-tab-justified"
                                                            data-bs-toggle="tab" href="#legalitas-agunan" role="tab"
                                                            aria-controls="messages-just" aria-selected="false">Legalitas
                                                            Agunan</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active " id="proposal"
                                                        role="tabpanel"aria-labelledby="home-tab-justified">
                                                        <div class="card-body invoice-padding pt-0">
                                                            <div class="row invoice-spacing">
                                                                <div class="col-xl-8 p-0">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pe-1">Tanggal Pengajuan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tgl_pembiayaan }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama AO</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->user->name }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="pe-1">Akad</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->akad->nama_akad }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Peruntukan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->penggunaan_id }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama Nasabah</td>
                                                                                <td>:<span class="fw-bold">
                                                                                        {{ $pembiayaan->nasabahh->nama_nasabah }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Jenis Kelamin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->jenis_kelamin }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Usia</td>
                                                                                <td>:
                                                                                    {{ $usiaNasabah }} Tahun
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. Telp</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->no_tlp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Alamat</td>
                                                                                <td>:
                                                                                    @if ($pembiayaan->nasabahh->alamat != null)
                                                                                        {{ $pembiayaan->nasabahh->alamat }}
                                                                                    @else
                                                                                        {{ $pembiayaan->nasabahh->alamat_domisili }}
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. KTP</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->no_ktp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tempat, tanggal lahir
                                                                                </td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabahh->tmp_lahir }},
                                                                                    @php
                                                                                        $tgl_lahir = Carbon\Carbon::parse($pembiayaan->nasabahh->tgl_lahir);
                                                                                    @endphp
                                                                                    {{ date_format($tgl_lahir, 'd-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Plafond</td>
                                                                                <td>:
                                                                                    Rp.
                                                                                    {{ number_format($pembiayaan->nominal_pembiayaan) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tenor</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tenor }} Bulan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Margin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->rate }} / Rp.
                                                                                    {{ number_format($hargaJual - $pembiayaan->harga) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Harga Jual</td>
                                                                                <td>:
                                                                                    Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                    @php
                                                                        $fotoPemohon = Modules\Umkm\Entities\UmkmFoto::Select()
                                                                            ->where('umkm_pembiayaan_id', $pembiayaan->id)
                                                                            ->where('kategori', 'Foto Diri')
                                                                            ->get()
                                                                            ->first();
                                                                    @endphp
                                                                    <div class="px-sm-5 pb-5" style="margin-right:-67px;">
                                                                        <h6 class="text-center">Foto Pemohon</h6>
                                                                        <div class="card-body" style="margin-top:-20px;">
                                                                            <img src="{{ asset('storage/' . $fotoPemohon->foto) }}"
                                                                                class="d-block w-100" height="240px;"
                                                                                width="240px;"
                                                                                style="border-radius: 5%;" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                                        aria-labelledby="profile-tab-justified">
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotodiri->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotoktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $fotodiribersamaktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotokk->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotokk->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotokk->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="tab-pane" id="legalitas-agunan"
                                                        role="tabpanel"aria-labelledby="messages-tab-justified">
                                                        @foreach ($jaminanusahas as $jaminan)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0"> Jaminan :
                                                                                {{ $jaminans->nama_jaminan }}
                                                                            </h6>
                                                                            <h6 class="mb-0"><br>No KTB :
                                                                                {{ $jaminan->no_ktb }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminan->dokumenktb) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                        @foreach ($jaminanlainusahas as $jaminanlainnya)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Detail -->

                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <!-- Tombol Aksi -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Dicetak" />
                                                                <a type="submit" class="btn btn-info w-100"
                                                                    href="/staff/cetak/umkm/{{ $pembiayaan->id }}"><i
                                                                        data-feather="printer"></i>

                                                                    Cetak
                                                                    Akad
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <br />
                                                        <p></p>
                                                        <div class="col-md-6">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <button type="submit" class="btn btn-primary w-100"><i
                                                                        data-feather="x"></i> Akad
                                                                    Batal
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form action="/staff/proposal" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="segmen" value="UMKM" />
                                                                <input type="hidden" name="cif"
                                                                    value="{{ $pembiayaan->nasabahh->id }}" />
                                                                <input type="hidden" name="kode_tabungan"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="plafond"
                                                                    value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                <input type="hidden" name="harga_jual"
                                                                    value="{{ $hargaJual }}" />
                                                                <input type="hidden" name="status"
                                                                    value="Selesai Akad" />
                                                                <input type="hidden" name="umkm_pembiayaan_id"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="status_id" value="9" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Sudah" />
                                                                <button type="submit" class="btn btn-success w-100"><i
                                                                        data-feather="check"></i>
                                                                    Selesai
                                                                    Akad
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Tombol Aksi -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($segmen == 'SKPD')
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Proposal Pengajuan Pembiayaan SKPD</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-xl-12 col-md-8 col-12">
                                        <div class="card invoice-preview-card">

                                            <!-- Detail -->
                                            <div class="card-body">
                                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="home-tab-justified"
                                                            data-bs-toggle="tab" href="#proposal" role="tab"
                                                            aria-controls="home-just" aria-selected="true">Proposal</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="profile-tab-justified"
                                                            data-bs-toggle="tab" href="#identitas-pribadi" role="tab"
                                                            aria-controls="profile-just" aria-selected="true">Identitas
                                                            Pribadi</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="messages-tab-justified"
                                                            data-bs-toggle="tab" href="#legalitas-agunan" role="tab"
                                                            aria-controls="messages-just" aria-selected="false">Legalitas
                                                            Agunan</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content pt-1">
                                                    <div class="tab-pane active " id="proposal"
                                                        role="tabpanel"aria-labelledby="home-tab-justified">
                                                        <div class="card-body invoice-padding pt-0">
                                                            <div class="row invoice-spacing">
                                                                <div class="col-xl-8 p-0">
                                                                    <table>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="pe-1">Tanggal Pengajuan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tanggal_pengajuan }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama AO</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->user->name }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <td class="pe-1">Akad</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->akad->nama_akad }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Peruntukan</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->jenis_penggunaan->jenis_penggunaan }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Nama Nasabah</td>
                                                                                <td>:<span class="fw-bold">
                                                                                        {{ $pembiayaan->nasabah->nama_nasabah }}</span>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Jenis Kelamin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabah->jenis_kelamin }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Usia</td>
                                                                                <td>:
                                                                                    {{ $usiaNasabah }} Tahun
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. Telp</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabah->no_telp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Alamat</td>
                                                                                <td>:
                                                                                    @if ($pembiayaan->nasabah->alamat != null)
                                                                                        {{ $pembiayaan->nasabah->alamat }}
                                                                                    @else
                                                                                        {{ $pembiayaan->nasabah->alamat_domisili }}
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">No. KTP</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabah->no_ktp }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tempat, tanggal lahir
                                                                                </td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->nasabah->tempat_lahir }},
                                                                                    @php
                                                                                        $tgl_lahir = Carbon\Carbon::parse($pembiayaan->nasabah->tgl_lahir);
                                                                                    @endphp
                                                                                    {{ date_format($tgl_lahir, 'd-m-Y') }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Plafond</td>
                                                                                <td>:
                                                                                    Rp.
                                                                                    {{ number_format($pembiayaan->nominal_pembiayaan) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Tenor</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->tenor }} Bulan
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Margin</td>
                                                                                <td>:
                                                                                    {{ $pembiayaan->rate }} / Rp.
                                                                                    {{ number_format($hargaJual - $pembiayaan->nominal_pembiayaan) }}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="pe-1">Harga Jual</td>
                                                                                <td>:
                                                                                    Rp. {{ number_format($hargaJual) }}
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                    @php
                                                                        $fotoPemohon = Modules\Skpd\Entities\SkpdFoto::Select()
                                                                            ->where('skpd_pembiayaan_id', $pembiayaan->id)
                                                                            ->where('kategori', 'Foto Diri')
                                                                            ->get()
                                                                            ->first();
                                                                    @endphp
                                                                    <div class="px-sm-5 pb-5" style="margin-right:-67px;">
                                                                        <h6 class="text-center">Foto Pemohon</h6>
                                                                        <div class="card-body" style="margin-top:-20px;">
                                                                            <img src="{{ asset('storage/' . $fotoPemohon->foto) }}"
                                                                                class="d-block w-100" height="240px;"
                                                                                width="240px;"
                                                                                style="border-radius: 5%;" />
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane" id="identitas-pribadi" role="tabpanel"
                                                        aria-labelledby="profile-tab-justified">
                                                        <!-- post 1 -->
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotodiri->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiri->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiri->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotoktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotoktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotoktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">
                                                                            {{ $fotodiribersamaktp->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotodiribersamaktp->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotodiribersamaktp->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div
                                                                    class="d-flex justify-content-start align-items-center mb-1">
                                                                    <div>
                                                                        <h6 class="mb-0">{{ $fotokk->kategori }}</h6>
                                                                        <small class="text-muted">Diupload Pada :
                                                                            {{ $fotokk->created_at->diffForhumans() }}</small>
                                                                    </div>
                                                                </div>
                                                                <!-- post img -->
                                                                <img class="img-fluid rounded mb-75"
                                                                    src="{{ asset('storage/' . $fotokk->foto) }}"
                                                                    alt="avatar img" />
                                                                <!--/ post img -->
                                                            </div>
                                                        </div>

                                                    </div>


                                                    <div class="tab-pane" id="legalitas-agunan" role="tabpanel"
                                                        aria-labelledby="messages-tab-justified">
                                                        @foreach ($jaminans as $jaminan)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0">
                                                                                {{ $jaminan->jenis_jaminan->nama_jaminan }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminan->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminan->dokumen_jaminan) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                        @foreach ($jaminanlainnyas as $jaminanlainnya)
                                                            <!-- post 1 -->
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <div
                                                                        class="d-flex justify-content-start align-items-center mb-1">
                                                                        <div>
                                                                            <h6 class="mb-0">
                                                                                {{ $jaminanlainnya->nama_jaminan_lainnya }}
                                                                            </h6>
                                                                            <small class="text-muted">Diupload Pada :
                                                                                {{ $jaminanlainnya->created_at->diffForhumans() }}</small>
                                                                        </div>
                                                                    </div>
                                                                    <!-- post img -->
                                                                    <img class="img-fluid rounded mb-75"
                                                                        src="{{ asset('storage/' . $jaminanlainnya->dokumen_jaminan_lainnya) }}"
                                                                        alt="avatar img" />
                                                                    <!--/ post img -->
                                                                </div>
                                                            </div>
                                                            <!--/ post 1 -->
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Detail -->

                                            <div class="card-body invoice-padding pt-0">
                                                <div class="row invoice-spacing">
                                                    <!-- Tombol Aksi -->
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Dicetak" />
                                                                <a type="submit" class="btn btn-info w-100"
                                                                    href="/staff/cetak/skpd/{{ $pembiayaan->id }}"><i
                                                                        data-feather="printer"></i>

                                                                    Cetak
                                                                    Akad
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <br />
                                                        <p></p>
                                                        <div class="col-md-6">
                                                            <form action="">
                                                                <input type="hidden" name="" value="" />
                                                                <button type="submit" class="btn btn-primary w-100"><i
                                                                        data-feather="x"></i> Akad
                                                                    Batal
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <form action="/staff/proposal" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="segmen" value="SKPD" />
                                                                <input type="hidden" name="cif"
                                                                    value="{{ $pembiayaan->nasabah->id }}" />
                                                                <input type="hidden" name="kode_tabungan"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="plafond"
                                                                    value="{{ $pembiayaan->nominal_pembiayaan }}" />
                                                                <input type="hidden" name="harga_jual"
                                                                    value="{{ $hargaJual }}" />
                                                                <input type="hidden" name="status"
                                                                    value="Selesai Akad" />
                                                                <input type="hidden" name="skpd_pembiayaan_id"
                                                                    value="{{ $pembiayaan->id }}" />
                                                                <input type="hidden" name="status_id" value="9" />
                                                                <input type="hidden" name="cek_staff_akad"
                                                                    value="Sudah" />
                                                                <button type="submit" class="btn btn-success w-100"><i
                                                                        data-feather="check"></i>
                                                                    Selesai
                                                                    Akad
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Tombol Aksi -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        @endif
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
