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
                                    <span class="bs-stepper-subtitle">Isi Data Diri Dan Pekerjaan</span>
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
                        <form >
                            <div id="form1" class="content" role="tabpanel" aria-labelledby="account-details-trigger">
                                <div class="content-header">
                                    {{-- <h5 class="mb-0">Account Details</h5> --}}
                                    <small class="text-danger">* Wajib Diisi</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tanggal"><small class="text-danger">* </small>Tanggal Pengajuan</label>
                                        <input type="text" id="tanggal" class="form-control flatpickr-basic" name="tanggal" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jenispenggunaan"><small class="text-danger">* </small>Jenis Penggunaan</label>
                                        <select class="select2 w-100" name="jenispenggunaan" id="jenispenggunaan">
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
                                        <input type="text" name="sektor" id="sektor" class="form-control" placeholder="Sektor Ekonomi" disabled />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="akad">Akad</label>
                                        <input type="text" name="akad" id="akad" class="form-control" placeholder="Pilih Jenis Akad" disabled />
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Diri</h5>
                                    <small class="text-muted">Lengkapi Data Diri Sesuai Dengan KTP.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="nama"><small class="text-danger">* </small>Nama Lengkap Nasabah</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="noktp"><small class="text-danger">* </small>No KTP</label>
                                        <input type="number" name="noktp" id="noktp" class="form-control" placeholder="Masukan Nomor KTP Anda" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tempatlahir"><small class="text-danger">* </small>Tempat Lahir</label>
                                        <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" placeholder="Maukan Tempat Lahir Anda" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="tgllahir"><small class="text-danger">* </small>Tanggal Tanggal</label>
                                        <input type="date" id="tgllahir" class="form-control flatpickr-basic" name="tanggal" placeholder="YYYY-MM-DD" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small class="text-danger">* </small>Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="status"><small class="text-danger">* </small>Status</label>
                                        <select class="select2 w-100" name="status" id="status">
                                            <option label="status">Pilih Jenis Status</option>
                                            <option>Sudah Menikah</option>
                                            <option>Belum Menikah</option>
                                            <option>Cerai</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jumlahanak"><small class="text-danger">* </small>Jumlah Anak/Tanggungan</label>
                                        <select class="select2 w-100" name="jumlahanak" id="jumlahanak">
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
                                        <input type="number" name="nonpwp" id="nonpwp" class="form-control" placeholder="Masukan Nomor NPWP Anda"/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelp"><small class="text-danger">* </small>No Telepon</label>
                                        <input type="number" name="notelp" id="notelp" class="form-control" placeholder="Masukan Nomor telepon Anda" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="fotodiri"><small class="text-danger">* </small>Upload Foto Diri</label>
                                        <input type="file" name="fotodiri" id="fotodiri" rows="3" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Orang Terdekat</h5>
                                    <small class="text-muted">Lengkapi Data Orang Terdekat Tidak Serumah.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namaot"><small class="text-danger">* </small>Nama</label>
                                        <input type="text" name="namaot" id="namaot" class="form-control" placeholder="Masukan Nama Orang Terdekat" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot"><small class="text-danger">* </small>No Telepon</label>
                                        <input type="number" name="notelpot" id="notelpot" class="form-control" placeholder="Masukan Nomor Telepon Orang Terdekat" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small class="text-danger">* </small>Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Orang Terdekat" required></textarea>
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Pekerjaan</h5>
                                    <small class="text-muted">Lengkapi Data Pekerjaan Anda.</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="namainstansi"><small class="text-danger">* </small>Nama Instansi</label>
                                        <select class="select2 w-100" name="namainstansi" id="namainstansi">
                                            <option label="namainstansi">Pilih Instansi</option>
                                            <option>Sekda</option>
                                            <option>Bapenda</option>
                                            <option>DPRD</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="golongan"><small class="text-danger">* </small>Golongan</label>
                                        <select class="select2 w-100" name="golongan" id="golongan">
                                            <option label="golongan">Pilih Golongan</option>
                                            <option>Golongan 1</option>
                                            <option>Golongan 2</option>
                                            <option>Golongan 3</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="exampleFormControlTextarea1"><small class="text-danger">* </small>Alamat</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat" required></textarea>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">* </small>Upload Softcopy SK Pengangkatan</label>
                                        <input type="file" name="skpengangkatan" id="skpengangkatan" rows="3" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0 mt-2">Data Jaminan</h5>
                                    <small class="text-muted">Silahkan Upload Data Jaminan Anda</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="jaminan"><small class="text-danger">* </small>Jenis Jaminan</label>
                                        <select class="select2 w-100" name="jaminan" id="jaminan">
                                            <option label="jaminan">Pilih Jaminan</option>
                                            <option>Tidak Ada Jaminan</option>
                                            <option>Softcopy Ijazah Bukan Terakhir</option>
                                            <option>Softcopy Ijazah Terakhir</option>
                                            <option>Ijazah Asli Bukan Terakhir</option>
                                            <option>Ijazah Asli Terakhir</option>
                                        </select>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan"><small class="text-danger">* </small>Upload Jaminan</label>
                                        <input type="file" name="skpengangkatan" id="skpengangkatan" rows="3" class="form-control" required/>
                                    </div>
                                <div class="mb-1 col-md-6">
                                        <label class="form-label" for="notelpot">Jaminan Lainya</label>
                                        <input type="text" name="notelpot" id="notelpot" class="form-control" placeholder="Masukan Nomor NPWP Anda" required/>
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="skpengangkatan">Upload Jaminan Lainnya</label>
                                        <input type="file" name="skpengangkatan" id="skpengangkatan" rows="3" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button class="btn btn-outline-secondary btn-prev" disabled>
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-primary btn-next">
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
                                <div class="row">
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">* </small>Gaji Pokok</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" id="Gaji Pokok Anda" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">* </small>Gaji/Pendapatan Lainnya</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" id="Gaji/Pendapatan Lainnya" required />
                                    </div>
                                    <div class="mb-1 col-md-6">
                                        <label class="form-label" for="numeral-formatting"><small class="text-danger">* </small>Pendapatan TPP</label>
                                        <input type="text" class="form-control numeral-mask" placeholder="10,000" id="Pendapatan TPP" required />
                                    </div>
                                </div>
                                <div class="content-header">
                                    <h5 class="mb-0">Data Pengeluaran Anda</h5>
                                    <small>Data Pengeluaran Nasabah Anda</small>
                                </div>
                                <div class="row">
                                    <div class="mb-1 col-md-12">
                                        <div data-repeater-list="invoice">
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-2 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="namabank">Nama Bank</label>
                                                            <select class="select2 w-100" name="namabank" id="namabank">
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
                                                            <label class="form-label" for="itemcost">Cost</label>
                                                            <input type="number" class="form-control" id="itemcost" aria-describedby="itemcost" placeholder="32"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Quantity</label>
                                                            <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Quantity</label>
                                                            <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <label class="form-label" for="itemquantity">Quantity</label>
                                                            <input type="number" class="form-control" id="itemquantity" aria-describedby="itemquantity" placeholder="1"/>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                                <i data-feather="plus" class="me-25"></i>
                                                                {{-- <span>Add New</span> --}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-1 col-12">
                                                        <div class="mb-1">
                                                            <button class="btn btn-outline-danger text-nowrap px-1" data-repeater-delete type="button">
                                                                <i data-feather="x" class="me-25"></i>
                                                                {{-- <span>Delete</span> --}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr />
                                            </div>
                                        </div>
                                        {{-- <div class="row">
                                            <div class="col-12">
                                                <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                    <i data-feather="plus" class="me-25"></i>
                                                    <span>Add New</span>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-primary btn-prev">
                                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                                        <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                    </button>
                                    <button class="btn btn-success btn-submit">Submit</button>
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
