@extends('form::layouts.main')

@section('content')

<!-- BEGIN: Content-->
    <div class="content-wrapper container-xxl">
        <div class="content-body">
            <!-- Modern Horizontal Wizard -->
            <section class="modern-horizontal-wizard">
                <div class="bs-stepper wizard-modern modern-wizard-example">
                    <div class="bs-stepper-header">
                        <div class="step" data-target="#form1" role="tab" id="account-details-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="file-text" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Form Data Diri</span>
                                    <span class="bs-stepper-subtitle">Isi Data Diri Dan Data Usaha</span>
                                </span>
                            </button>
                        </div>
                        <div class="line">
                            <i data-feather="chevron-right" class="font-medium-2"></i>
                        </div>
                        <div class="step" data-target="#form2" role="tab" id="personal-info-modern-trigger">
                            <button type="button" class="step-trigger">
                                <span class="bs-stepper-box">
                                    <i data-feather="user" class="font-medium-3"></i>
                                </span>
                                <span class="bs-stepper-label">
                                    <span class="bs-stepper-title">Form Keuangan</span>
                                    <span class="bs-stepper-subtitle">Isi Data Keuangan</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <form action="/umkm/form" method="post">
                            @csrf

                            <div id="form1" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ao"><small class="text-danger">* </small>Kode Account Officer</label>
                                        <select class="select2 w-100" name="AO_id" id="ao">
                                            <option label="kodeao">Pilih Kode AO</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tanggal"><small class="text-danger">* </small>Tanggal Pengajuan</label>
                                        <input type="text" name="tgl_pembiayaan" id="tgl_pembiayaan" class="form-control flatpickr-basic" name="tanggal" placeholder="YYYY-MM-DD" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispenggunaan"><small class="text-danger">* </small>Jenis Penggunaan</label>
                                        <select class="select2 w-100" name="penggunaan_id" id="jenispenggunaan">
                                            <option label="jenispenggunaan">Pilih Jenis Penggunaan</option>
                                            <option>Kesehatan</option>
                                            <option>Kepemilikan Kendaraan Bermotor</option>
                                            <option>Perbaikan Rumah</option>
                                            <option>Pendidikan</option>
                                            <option>Modal Usaha/Pekerjaan</option>
                                            <option>Ibadah</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="sektor">Sektor Ekonomi</label>
                                        <input type="text" name="sektor" id="sektor_id" class="form-control" placeholder="Sektor Ekonomi" disabled />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="akad">Akad</label>
                                        <input type="text" name="akad" id="akad_id" class="form-control" placeholder="Pilih Jenis Akad" disabled />
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">* </small>Nama Lengkap Nasabah</label>
                                        <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control" placeholder="Nama Lengkap" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noktp"><small class="text-danger">* </small>No KTP</label>
                                        <input type="number" name="no_ktp" id="no_ktp" class="form-control" placeholder="Masukan Nomor KTP Anda" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">* </small>Tempat Lahir</label>
                                        <input type="text" name="tmp_lahir" id="tmp_lahir" class="form-control" placeholder="Maukan Tempat Lahir Anda" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgl_lahir"><small class="text-danger">* </small>Tanggal Tanggal</label>
                                        <input type="date" id="tgl_lahir" class="form-control flatpickr-basic" name="tgl_lahir" placeholder="YYYY-MM-DD" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="gender"><small class="text-danger">* </small>Jenis Kelamin</label>
                                        <select class="select2 w-100" name="jk_id" id="gender">
                                            <option label="jumlahanak">Pilih Jenis Kelamin</option>
                                              <option >Laki-Laki</option>
                                              <option >Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="ibu"><small class="text-danger">* </small>Nama Ibu Kandung</label>
                                        <input class="form-control" name ="nama_ibu" id="ibu" rows="3" placeholder="Masukkan Nama Ibu Kandung" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small class="text-danger">* </small>Alamat KTP</label>
                                        <textarea class="form-control" name="alamat_ktp" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" ></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"></small>Alamat Domisili</label>
                                        <textarea class="form-control" name="alamat_domisili" id="exampleFormControlTextarea1" rows="3" placeholder="Jika Sama Dengan KTP tidak Pelu Diisi"></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="lamatinggal"><small class="text-danger">* </small>Lama Tinggal Di Alamat Rumah</label>
                                        <input class="form-control" name="lama_tinggal" id="lama_tinggal" rows="3" placeholder="Masukkan Lama Tinggal" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="kep_rumah"><small class="text-danger">* </small>Kepemilikan Rumah</label>
                                        <select class="select2 w-100" name="kep_rumah_id" id="kep_rumah">
                                            <option label="kep_rumah">Pilih Kepemilikan Rumah</option>
                                            <option>Milik Sendiri</option>
                                            <option>Milik Keluarga</option>
                                            <option>Sewa Atau Kontrak</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="leg_rumah"><small class="text-danger">* </small>Legalitas Kepemilikan Rumah</label>
                                        <select class="select2 w-100" name="leg_rumah_id" id="leg_rumah">
                                            <option label="leg_rumah">Pilih Legalitas Kepemilikan Rumah</option>
                                            <option>Girik</option>
                                            <option>Akta Jual Beli (AJB)</option>
                                            <option>Surat Hak Guna Bangunan (SHGB)</option>
                                            <option>Surat Hak Milik (SHM)</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="Pendidikan"><small class="text-danger">* </small>Pendidikan Terakhir</label>
                                        <select class="select2 w-100" name="pendidikan" id="pendidikan_id">
                                            <option label="Pendidikan">Pilih Pendidikan Terakhir</option>
                                            <option>Tidak Sekolah</option>
                                            <option>SD</option>
                                            <option>SMP</option>
                                            <option>SMA</option>
                                            <option>Diploma</option>
                                            <option>S1</option>
                                            <option>S2</option>
                                            <option>S3</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="agama"><small class="text-danger">* </small>Pendidikan Terakhir</label>
                                        <select class="select2 w-100" name="agama_id" id="pendidikan_id">
                                            <option label="Pendidikan">Pilih Pendidikan Terakhir</option>
                                            <option>Tidak Sekolah</option>
                                            <option>SD</option>
                                            <option>SMP</option>
                                            <option>SMA</option>
                                            <option>Diploma</option>
                                            <option>S1</option>
                                            <option>S2</option>
                                            <option>S3</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="status"><small class="text-danger">* </small>Status</label>
                                        <select class="select2 w-100" name="status_id" id="status_id">
                                            <option label="status">Pilih Jenis Status</option>
                                            <option>Sudah Menikah</option>
                                            <option>Belum Menikah</option>
                                            <option>Cerai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jumlahanak"><small class="text-danger">* </small>Jumlah Anak/Tanggungan</label>
                                        <select class="select2 w-100" name="jumlah_anak" id="jumlah_anak">
                                            <option label="jumlahanak">Pilih Jumlah Anak</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>>7</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nonpwp">No NPWP</label>
                                        <input type="number" name="npwp" id="npwp" class="form-control" placeholder="Masukan Nomor NPWP Anda"/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelp"><small class="text-danger">* </small>No Telepon</label>
                                        <input type="number" name="no_tlp" id="no_tlp" class="form-control" placeholder="Masukan Nomor telepon Anda" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiri"><small class="text-danger">* </small>Upload Foto Diri</label>
                                        <input type="file" name="foto_id" id="foto_id" rows="3" class="form-control" >
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                    <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaot"><small class="text-danger">* </small>Nama</label>
                                        <input type="text" name="namaot" id="namaot" class="form-control" placeholder="Masukan Nama Orang Terdekat" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="telpot"><small class="text-danger">* </small>No Telepon</label>
                                        <input type="number" name="telp_ot" id="telp_ot" class="form-control" placeholder="Masukan Nomor Telepon Orang Terdekat" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small class="text-danger">* </small>Alamat</label>
                                        <textarea class="form-control" name="alamat_ot" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Orang Terdekat" ></textarea>
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Usaha</h5>
                                    <small class="text-muted">Lengkapi Data Usaha Anda.</small>
                                </div>
                                <div class="row">
                                <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namatoko"><small class="text-danger">* </small>Nama Toko</label>
                                        <input type="text" name="nama_usaha" id="namatoko" class="form-control" placeholder="Masukan Nama Toko Atau Usaha" >
                                </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenisdagang"><small class="text-danger">* </small>Jenis Dagang</label>
                                        <select class="select2 w-100" name="jenisdagang_id" id="jenisdagang">
                                            <option label="jenisdagang">Pilih Jenis Dagang</option>
                                            <option>Pedagang Musiman</option>
                                            <option>Primer</option>
                                            <option>Sekunder</option>
                                            <option>Tersier</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="keptoko"><small class="text-danger">* </small>Kepemilikan Toko</label>
                                        <select class="select2 w-100" name="kep_toko_id" id="keptoko">
                                            <option label="golongan">Pilih Kepemilikan Toko</option>
                                            <option>Milik Sendiri</option>
                                            <option>Milik Keluarga</option>
                                            <option>Sewa Atau Kontrak</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="lamausaha"><small class="text-danger">* </small>Lama Usaha</label>
                                        <input type="text" name="lama_usaha" id="lamausaha" class="form-control" placeholder="Masukan Lama Usaha" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="legalitastoko"><small class="text-danger">* </small>Legalitas Kepemilikan Toko</label>
                                        <select class="select2 w-100" name="leg_toko_id" id="legalitastoko">
                                            <option label="legalitastoko">Pilih Legalitas Kepemilikan Toko</option>
                                            <option>Surat Keterangan Usaha ( SKU )</option>
                                            <option>Surat Keterangan Domisili Usaha ( SKDU )</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fototoko"><small class="text-danger">* </small>Upload Foto Toko</label>
                                        <input type="file" name="fototoko" id="fototoko" rows="3" class="form-control" >
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                    <small class="text-muted">Silahkan Upload Data Jaminan Anda</small>
                                </div>
                                <div class="row">
                                    <small>Jaminan Utama</small>
                                    <div class="mb-1 col-md-6">
                                         <label class="form-label" for="lamausaha"><small class="text-danger">* </small>No KTB</label>
                                         <input type="text" name="jaminan_id" id="lamausaha" class="form-control" placeholder="Masukan No KTB" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="SHPB">Upload Jaminan KTB</label>
                                        <input type="file" name="SHPB" id="SHPB" rows="3" class="form-control" >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan"></small>Jaminan Lainnya</label>
                                        <select class="select2 w-100" name="jaminan" id="jaminan">
                                            <option label="jaminan">Pilih Jaminan</option>
                                            <option>BPKB Kendaraan Bermotor</option>
                                            <option>Akta Jual Beli (AJB)</option>
                                            <option>SHGB</option>
                                            <option>SHM</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="upjaminan"></small>Upload Jaminan Lainnya</label>
                                        <input type="file" name="upjaminan" id="upjaminan" rows="3" class="form-control">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-next">
                                        <span class="align-middle d-sm-inline-block d-none">Next</span>
                                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="form2" class="content" role="tabpanel" aria-labelledby="personal-info-modern-trigger">
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pendapatan</h5>
                                    <small>Isikan Data Pendapatan Anda</small>
                                </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">* </small>Omset Per Bulan</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" name ="omset" id="omset" >
                                    </div>
                                    <div class = "row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>HPP</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="hpp" id="hpp">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Biaya Listrik</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="listrik" id="listrik">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Biaya Transport</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" name ="trasport" id="transport">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Biaya Karyawan</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="karyawan" id="karyawan">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Biaya Telpon</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="telpon" id="telpon">
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"> </small>Biaya Sewa Kios</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="sewa" id="sewa">
                                    </div>
                                    </div>
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pengeluaran Anda</h5>
                                    <small>Data Pengeluaran Nasabah Anda</small>
                                </div>
                                <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Cicilan Bank BTB</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" name ="cicilanbtb" id="cicilanbtb" >
                                    </div>
                                </br>
                                    <small>Cicilan Bank Lain</small>
                                        <div class="row">
                                            <div class="mb-1 col-md-12">
                                                            <div class="repeater-default">
                                                                <div data-repeater-list="car">
                                                                    <div data-repeater-item>
                                                                         <div class="row d-flex align-items-end">
                                                                                        <div class="col-md-2 col-12">
                                                                                            <div class="mb-1">
                                                                                                <label class="form-label" for="bank_id">Nama Bank</label>
                                                                                                <select class="select2 w-100" name="bank_id" id="namabank">
                                                                                                    <option label="namabank">Pilih Bank</option>
                                                                                                    <option>BRI</option>
                                                                                                    <option>BNI</option>
                                                                                                    <option>BCA</option>
                                                                                                    <option>BSI</option>
                                                                                                    <option>Permata</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemcost">Plafond</label>
                                                                                    <input type="number" class="form-control" name="plafond" id="plafond" aria-describedby="itemcost" placeholder="32"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Outstanding</label>
                                                                                    <input type="number" class="form-control" name="outstanding" id="outstanding" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Tenor</label>
                                                                                    <input type="number" class="form-control" name="tenor" id="tenor" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Bng/Mgn</label>
                                                                                    <input type="number" class="form-control" name="bgn/mgn"id="bgn" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Angsuran</label>
                                                                                    <input type="number" class="form-control" name="angsuran" id="angsuran" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Agunan</label>
                                                                                    <input type="number" class="form-control" name ="agunan" id="agunan" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-1 col-12">
                                                                                <div class="mb-1">
                                                                                    <label class="form-label" for="itemquantity">Kol Tertinggi</label>
                                                                                    <input type="number" class="form-control" name="kol" id="kol" aria-describedby="itemquantity" placeholder="1"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-1 col-12">
                                                                                <button type="button" data-repeater-create class="btn btn-icon btn-primary">
                                                                                    <i data-feather="plus" class="me-25"></i>
                                                                                </button>
                                                                            </div>
                                                                            <div class="col-md-1 col-12">
                                                                                <button type="button" class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete>
                                                                                <i data-feather="x" class="me-25"></i>
                                                                                </button>
                                                                            </div>

                                                                        <hr>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                        </div>
                                <div class ="row">
                                <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">*</small>Kebutuhan Keluarga</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000"  name ="keb_keluarga" id="kebkeluarga" require >
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="lamausaha"><small class="text-danger">* </small>Aset / Harta Benda</label>
                                        <input type="text" name="lamausaha" id="lamausaha" class="form-control"  name ="aset" placeholder="Masukan Kepemilikkan Aset" >
                                   </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"></small>Kesanggupan Angsuran</label>
                                        <input type="text" class="form-control numeral-mask"  name ="angsuran" placeholder="10,000" id="kesangsuran" >
                                    </div><br>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- /Modern Horizontal Wizard -->
        </div>
    </div>
<!-- END: Content-->

@endsection
