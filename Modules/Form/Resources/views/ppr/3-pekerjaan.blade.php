<div id="formDataPekerjaan" class="content" role="tabpanel" aria-labelledby="pekerjaan-trigger">
    <div class="content-header">
        <h4 class="mb-0 mt-2">Data Pekerjaan</h4>
        <hr>
    </div>
    <div class="content-header">
        <h5 class="mb-0 mt-2">Pemohon PPR Syariah</h5>
        <small class="text-muted">Lengkapi Data Pekerjaan Pemohon.</small>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_nama"><small class="text-danger">*
                </small>Nama Perusahaan/Instansi</label>
            <input type="text" name="form_pekerjaan_pemohon_nama" id="form_pekerjaan_pemohon_nama"
                class="form-control" placeholder="Nama Perusahaan/Instansi" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_badan_hukum"><small class="text-danger">*
                </small>Badan Hukum Perusahaan/Instansi</label>
            <select class="select2 w-100" name="form_pekerjaan_pemohon_badan_hukum"
                id="form_pekerjaan_pemohon_badan_hukum"
                data-placeholder="Pilih Badan Hukum Perusahaan/Instansi"required>
                <option value=""></option>
                <option value="Departemen">Departemen</option>
                <option value="Pemerintahan">Pemerintahan</option>
                <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                <option value="Koperasi">Koperasi</option>
                <option value="Persero">Persero</option>
                <option value="Perusahaan Umum">Perusahaan Umum</option>
                <option value="Perseroan Terbatas">Perseroan Terbatas</option>
                <option value="Commanditer Venotschap">Commanditer Venotschap</option>
                <option value="FIRMA">FIRMA</option>
                <option value="Namloose Venotschap">Namloose Venotschap</option>
                <option value="Usaha Dagang">Usaha Dagang</option>
                <option value="Yayasan">Yayasan</option>
                <option value="Lainnya Perorangan">Lainnya Perorangan</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_alamat"><small class="text-danger">*
                </small>Alamat Pekerjaan/Kantor</label>
            <textarea class="form-control" id="form_pekerjaan_pemohon_alamat" name="form_pekerjaan_pemohon_alamat" rows="2"
                placeholder="Alamat Pekerjaan/Kantor" required></textarea>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_alamat_kode_pos"><small class="text-danger">*
                </small>Kode Pos</label>
            <input type="number" name="form_pekerjaan_pemohon_alamat_kode_pos"
                id="form_pekerjaan_pemohon_alamat_kode_pos" class="form-control" placeholder="Kode Pos" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_no_telp"><small class="text-danger">*
                </small>Nomor Telp. Kantor</label>
            <input type="text" name="form_pekerjaan_pemohon_no_telp" id="form_pekerjaan_pemohon_no_telp"
                class="form-control prefix-mask3" placeholder="Masukkan Nomor Telepon Kantor" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_no_telp_extension">Pesawat/Extension</label>
            <input type="number" name="form_pekerjaan_pemohon_no_telp_extension"
                id="form_pekerjaan_pemohon_no_telp_extension" class="form-control"
                placeholder="Masukkan Nomor Pesawat/Extension" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_facsimile">Nomor Facsimile
                Kantor</label>
            <input type="number" name="form_pekerjaan_pemohon_facsimile" id="form_pekerjaan_pemohon_facsimile"
                class="form-control" placeholder="Masukkan Nomor Nomor Facsimile Kantor" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_npwp">Nomor NPWP
                Perusahaan/Instansi</label>
            <input type="text" name="form_pekerjaan_pemohon_npwp" id="form_pekerjaan_pemohon_npwp"
                class="form-control" placeholder="Nomor NPWP Perusahaan/Instansi" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_bidang_usaha"><small class="text-danger">*
                </small>Bidang Usaha Perusahaan/Instansi</label>
            <select class="select2 w-100" name="form_pekerjaan_pemohon_bidang_usaha"
                id="formPekerjaanPemohonBidangUsaha" onChange="changePemohonBidangUsaha()"
                data-placeholder="Pilih
                                            Bidang Usaha" required>
                <option value=""></option>
                <option value="Pemerintahan">Pemerintahan</option>
                <option value="Pertanian, Perburuan, dan Sarana Pertanian">Pertanian,
                    Perburuan, dan Sarana Pertanian</option>
                <option value="Pertambangan">Pertambangan</option>
                <option value="Perindustrian">Perindustrian</option>
                <option value="Listrik, Gas, dan Air">Listrik, Gas, dan Air</option>
                <option value="Perdagangan, Restoran, dan Hotel">Perdagangan, Restoran, dan
                    Hotel</option>
                <option value="Pengangkutan, Pergudangan, dan Komunikasi">Pengangkutan,
                    Pergudangan, dan Komunikasi</option>
                <option value="Jasa-Jasa Dunia Usaha">Jasa-Jasa Dunia Usaha</option>
                <option value="Jasa-Jasa Sosial Masyarakat">Jasa-Jasa Sosial Masyarakat
                </option>
                <option value="Jasa-Jasa Keuangan dan Perbankan">Jasa-Jasa Keuangan dan
                    Perbankan</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifPemohonBidangUsahaLain">
            <label class="form-label" for="pemohonBidangUsahaLain"><small class="text-danger">*
                </small>Bidang Usaha Lainnya</label>
            <input type="text" name="form_pekerjaan_pemohon_bidang_usaha_lain" id="pemohonBidangUsahaLain"
                class="form-control" placeholder="Bidang Usaha Lainnya" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_jenis_pekerjaan"><small class="text-danger">*
                </small>Jenis Pekerjaan</label>
            <select class="select2 w-100" name="form_pekerjaan_pemohon_jenis_pekerjaan"
                id="formPekerjaanPemohonJenisPekerjaan" onChange="changePemohonJenisPekerjaan()"
                data-placeholder="Pilih
                                            Jenis Pekerjaan" required>
                <option value=""></option>
                <option value="Akunting/Keuangan">Akunting/Keuangan</option>
                <option value="Customer Service">Customer Service</option>
                <option value="Engineering">Engineering</option>
                <option value="Eksekutif">Eksekutif</option>
                <option value="Administrasi Umum">Administrasi Umum</option>
                <option value="Komputer">Komputer</option>
                <option value="Konsultan">Konsultan</option>
                <option value="Marketing8">Marketing</option>
                <option value="Pendidikan">Pendidikan</option>
                {{-- <option value="10">Pemerintahan</option>
                                            <option value="11">Militer</option> --}}
                <option value="ASN">ASN SKPD</option>
                <option value="ASN">ASN PPPK DINKES</option>
                <option value="ASN">ASN PPPK DISDIK</option>
                <option value="ASN">ASN PPPK TEKNIS</option>
                <option value="TNI">TNI</option>
                <option value="Polri">Polri</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Profesional">Profesional</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifPemohonJenisPekerjaanLain">
            <label class="form-label" for="pemohonJenisPekerjaanLain"><small class="text-danger">*
                </small>Jenis Pekerjaan Lainnya</label>
            <input type="text" name="form_pekerjaan_pemohon_jenis_pekerjaan_lain" id="pemohonJenisPekerjaanLain"
                class="form-control" placeholder="Jenis Pekerjaan Lainnya" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_jml_karyawan"><small class="text-danger">*
                </small>Jumlah Karyawan</label>
            <select class="select2 w-100" name="form_pekerjaan_pemohon_jml_karyawan"
                id="form_pekerjaan_pemohon_jml_karyawan"
                data-placeholder="Pilih
                                            Jumlah Karyawan" required>
                <option value=""></option>
                <option value="<= 5 Karyawan">
                    <= 5 Karyawan</option>
                <option value="6-30 Karyawan">6-30 Karyawan</option>
                <option value="31-60 Karyawan">31-60 Karyawan</option>
                <option value="61-100 Karyawan">61-100 Karyawan</option>
                <option value=">100 Karyawan">>100 Karyawan</option>
            </select>
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_departemen"><small class="text-danger">*
                </small>Dept./Bagian/Divisi</label>
            <input type="text" name="form_pekerjaan_pemohon_departemen" id="form_pekerjaan_pemohon_departemen"
                class="form-control" placeholder="Dept./Bagian/Divisi" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_pangkat_gol_jabatan"><small class="text-danger">*
                </small>Pangkat/Gol. Dan Jabatan</label>
            <input type="text" name="form_pekerjaan_pemohon_pangkat_gol_jabatan"
                id="form_pekerjaan_pemohon_pangkat_gol_jabatan" class="form-control"
                placeholder="Pangkat/Gol. Dan Jabatan" required />
        </div>
        <div class="mb-1 col-md-6">
            @if (request('jenis_nasabah') == 'Fixed Income')
                <label class="form-label" for="form_pekerjaan_pemohon_nip_nrp"><small class="text-danger">*
                    </small>NIP/NRP</label>
                <input type="number" name="form_pekerjaan_pemohon_nip_nrp" id="form_pekerjaan_pemohon_nip_nrp"
                    class="form-control" placeholder="NIP/NRP" required />
            @else
                <label class="form-label" for="form_pekerjaan_pemohon_nip_nrp">NIP/NRP</label>
                <input type="number" name="form_pekerjaan_pemohon_nip_nrp" id="form_pekerjaan_pemohon_nip_nrp"
                    class="form-control" placeholder="NIP/NRP" />
            @endif
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_pekerjaan_pemohon_mulai_bekerja">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-auto col-md-4">
                            <div class="mb-1">
                                <label class="form-label" for="form_pekerjaan_pemohon_mulai_bekerja"><small
                                        class="text-danger">*
                                    </small>Mulai Bekerja</label>
                                <input type="date" class="form-control flatpickr-basic"
                                    id="form_pekerjaan_pemohon_mulai_bekerja"
                                    name="form_pekerjaan_pemohon_mulai_bekerja"
                                    aria-describedby="form_pekerjaan_pemohon_mulai_bekerja" placeholder="DD-MM-YYYY"
                                    required />
                            </div>
                        </div>

                        <div class="row col-auto col-md-3" style="margin-bottom: 15px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label" for="form_pekerjaan_pemohon_usia_pensiun"><small
                                        class="text-danger">*
                                    </small>Usia Pensiun</label>
                                <input type="number" class="form-control" name="form_pekerjaan_pemohon_usia_pensiun"
                                    id="form_pekerjaan_pemohon_usia_pensiun"
                                    aria-describedby="form_pekerjaan_pemohon_usia_pensiun" placeholder="Usia Pensiun"
                                    required />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>

                        <div class="row col-auto" style="margin-bottom: 15px; margin-left: -100px">
                            <div class="col-auto">
                                <label class="form-label" for="form_pekerjaan_pemohon_masa_kerja"><small
                                        class="text-danger">*
                                    </small>Masa Kerja
                                    (termasuk sebelumnya)</label>
                                <input type="number" class="form-control" name="form_pekerjaan_pemohon_masa_kerja"
                                    id="form_pekerjaan_pemohon_masa_kerja"
                                    aria-describedby="form_pekerjaan_pemohon_masa_kerja" placeholder="Masa Kerja"
                                    required />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_nama_atasan_langsung"><small class="text-danger">*
                </small>Nama Atasan Langsung</label>
            <input type="text" name="form_pekerjaan_pemohon_nama_atasan_langsung"
                id="form_pekerjaan_pemohon_nama_atasan_langsung" class="form-control"
                placeholder="Nama Atasan Langsung" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_no_telp_atasan_langsung"><small
                    class="text-danger">*
                </small>Nomor Telp. Atasan Langsung</label>
            <input type="text" name="form_pekerjaan_pemohon_no_telp_atasan_langsung"
                id="form_pekerjaan_pemohon_no_telp_atasan_langsung" class="form-control prefix-mask4"
                placeholder="Masukkan Nomor Telp. Atasan Langsung" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label"
                for="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension">Pesawat/Extension</label>
            <input type="number" name="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension"
                id="form_pekerjaan_pemohon_no_telp_atasan_langsung_extension" class="form-control"
                placeholder="Masukkan Nomor Pesawat/Extension" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_pemohon_grup_afiliasi">Group
                Afiliasi Perusahaan</label>
            <input type="text" name="form_pekerjaan_pemohon_grup_afiliasi"
                id="form_pekerjaan_pemohon_grup_afiliasi" class="form-control"
                placeholder="Group Afiliasi Perusahaan" />
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_pekerjaan_pemohon_pengalaman_kerja_terakhir">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <h6>Pengalaman
                            Kerja
                            Terakhir</h6>
                        <div class="col-auto col-md-4">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan">Perusahaan</label>
                                <input type="text" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    placeholder="Nama Perusahaan" />
                            </div>
                        </div>

                        <div class="col-auto col-md-2">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                <input type="text" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    placeholder="Jabatan" />
                            </div>
                        </div>

                        <div class="row col-auto" style="margin-bottom: 15px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun">Lama
                                    Kerja</label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    placeholder="Tahun" />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>
                        <div class="row col-auto" style="margin-bottom: 17px; margin-left:-100px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan">
                                </label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    placeholder="Bulan" />
                            </div>
                            <div class="col-auto" style="margin-top: 29px;">
                                <span class="form-text-beside">Bulan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pekerjaan Istri/Suami pemohon --}}
    <div class="content-header hide" id="ifISMHeader">
        <h5 class="mb-0 mt-2">Istri/Suami Pemohon PPR Syariah</h5>
        <small class="text-muted">Lengkapi Data Pekerjaan pasangan, kosongkan bila tidak
            bekerja.</small>
    </div>
    <div class="row hide" id="ifISM">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_nama">Nama
                Perusahaan/Instansi</label>
            <input type="text" name="form_pekerjaan_istri_suami_nama" id="form_pekerjaan_istri_suami_nama"
                class="form-control" placeholder="Nama Perusahaan/Instansi" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_badan_hukum">Badan
                Hukum Perusahaan</label>
            <select class="select2 w-100" name="form_pekerjaan_istri_suami_badan_hukum"
                id="form_pekerjaan_istri_suami_badan_hukum"
                data-placeholder="Pilih
                                            Badan Hukum
                                            Perusahaan">
                <option value=""></option>
                <option value="Departemen">Departemen</option>
                <option value="Pemerintahan">Pemerintahan</option>
                <option value="Perusahaan Daerah">Perusahaan Daerah</option>
                <option value="Koperasi">Koperasi</option>
                <option value="Persero">Persero</option>
                <option value="Perusahaan Umum">Perusahaan Umum</option>
                <option value="Perseroan Terbatas">Perseroan Terbatas</option>
                <option value="Commanditer Venotschap">Commanditer Venotschap</option>
                <option value="FIRMA">FIRMA</option>
                <option value="Namloose Venotschap">Namloose Venotschap</option>
                <option value="Usaha Dagang">Usaha Dagang</option>
                <option value="Yayasan">Yayasan</option>
                <option value="Lainnya Perorangan">Lainnya Perorangan</option>
            </select>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_alamat">Alamat
                Pekerjaan/Kantor</label>
            <textarea class="form-control" name="form_pekerjaan_istri_suami_alamat" id="form_pekerjaan_istri_suami_alamat"
                rows="2" placeholder="Alamat Pekerjaan/Kantor"></textarea>
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_alamat_kode_pos">Kode
                Pos</label>
            <input type="number" name="form_pekerjaan_istri_suami_alamat_kode_pos"
                id="form_pekerjaan_istri_suami_alamat_kode_pos" class="form-control" placeholder="Kode Pos" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_no_telp">Nomor Telp.
                Kantor</label>
            <input type="text" name="form_pekerjaan_istri_suami_no_telp" id="form_pekerjaan_istri_suami_no_telp"
                class="form-control prefix-mask5" placeholder="Masukkan Nomor Telepon Kantor" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_no_telp_extension">Pesawat/Extension</label>
            <input type="number" name="form_pekerjaan_istri_suami_no_telp_extension"
                id="form_pekerjaan_istri_suami_no_telp_extension" class="form-control"
                placeholder="Masukkan Nomor Pesawat/Extension" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_facsimile">Nomor
                Facsimile Kantor</label>
            <input type="number" name="form_pekerjaan_istri_suami_facsimile"
                id="form_pekerjaan_istri_suami_facsimile" class="form-control"
                placeholder="Masukkan Nomor Nomor Facsimile Kantor" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_npwp">Nomor NPWP
                Perusahaan/Instansi</label>
            <input type="text" name="form_pekerjaan_istri_suami_npwp" id="form_pekerjaan_istri_suami_npwp"
                class="form-control" placeholder="Nomor NPWP Perusahaan" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_bidang_usaha">Bidang
                Usaha Perusahaan</label>
            <select class="select2 w-100" name="form_pekerjaan_istri_suami_bidang_usaha"
                id="formPekerjaanPasanganBidangUsaha" onChange="changePasanganBidangUsaha()"
                data-placeholder="Pilih Bidang Usaha
                                            Perusahaan">
                <option value="">
                </option>
                <option value="Pemerintahan">Pemerintahan</option>
                <option value="Pertanian, Perburuan, dan Sarana Pertanian">Pertanian,
                    Perburuan, dan Sarana Pertanian</option>
                <option value="Pertambangan">Pertambangan</option>
                <option value="Perindustrian">Perindustrian</option>
                <option value="Listrik, Gas, dan Air">Listrik, Gas, dan Air</option>
                <option value="Perdagangan, Restoran, dan Hotel">Perdagangan, Restoran, dan
                    Hotel</option>
                <option value="Pengangkutan, Pergudangan, dan Komunikasi">Pengangkutan,
                    Pergudangan, dan Komunikasi</option>
                <option value="Jasa-Jasa Dunia Usaha">Jasa-Jasa Dunia Usaha</option>
                <option value="Jasa-Jasa Sosial Masyarakat">Jasa-Jasa Sosial Masyarakat
                </option>
                <option value="Jasa-Jasa Keuangan dan Perbankan">Jasa-Jasa Keuangan dan
                    Perbankan</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifPasanganBidangUsahaLain">
            <label class="form-label" for="pasanganBidangUsahaLain"><small class="text-danger">*
                </small>Bidang Usaha Lainnya</label>
            <input type="text" name="form_pekerjaan_istri_suami_bidang_usaha_lain" id="pasanganBidangUsahaLain"
                class="form-control" placeholder="Bidang Usaha Lainnya" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_jenis_pekerjaan">Jenis
                Pekerjaan</label>
            <select class="select2 w-100" name="form_pekerjaan_istri_suami_jenis_pekerjaan"
                id="formPekerjaanPasanganJenisPekerjaan" onChange="changePasanganJenisPekerjaan()"
                data-placeholder="Pilih Jenis
                                            Pekerjaan">
                <option value="">
                </option>
                <option value="Akunting/Keuangan">Akunting/Keuangan</option>
                <option value="Customer Service">Customer Service</option>
                <option value="Engineering">Engineering</option>
                <option value="Eksekutif">Eksekutif</option>
                <option value="Administrasi Umum">Administrasi Umum</option>
                <option value="Komputer">Komputer</option>
                <option value="Konsultan">Konsultan</option>
                <option value="Marketing8">Marketing</option>
                <option value="Pendidikan">Pendidikan</option>
                {{-- <option value="10">Pemerintahan</option>
                                                <option value="11">Militer</option> --}}
                <option value="ASN">ASN</option>
                <option value="TNI">TNI</option>
                <option value="Polri">Polri</option>
                <option value="Pensiunan">Pensiunan</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Wiraswasta">Wiraswasta</option>
                <option value="Profesional">Profesional</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>
        <div class="mb-1 col-md-6 hide" id="ifPasanganJenisPekerjaanLain">
            <label class="form-label" for="pasanganJenisPekerjaanLain"><small class="text-danger">*
                </small>Jenis Pekerjaan Lainnya</label>
            <input type="text" name="form_pekerjaan_istri_suami_jenis_pekerjaan_lain"
                id="pasanganJenisPekerjaanLain" class="form-control" placeholder="Jenis Pekerjaan Lainnya" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_jml_karyawan">Jumlah
                Karyawan</label>
            <select class="select2 w-100" name="form_pekerjaan_istri_suami_jml_karyawan"
                id="form_pekerjaan_istri_suami_jml_karyawan" data-placeholder="Pilih Jumlah Karyawan">
                <option value=""> </option>
                <option value="<= 5 Karyawan">
                    <= 5 Karyawan</option>
                <option value="6-30 Karyawan">6-30 Karyawan</option>
                <option value="31-60 Karyawan">31-60 Karyawan</option>
                <option value="61-100 Karyawan">61-100 Karyawan</option>
                <option value=">100 Karyawan">>100 Karyawan</option>
            </select>
        </div>

        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_departemen">Dept./Bagian/Divisi</label>
            <input type="text" name="form_pekerjaan_istri_suami_departemen"
                id="form_pekerjaan_istri_suami_departemen" class="form-control" placeholder="Dept./Bagian/Divisi" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_pangkat_gol_jabatan">Pangkat/Gol. Dan
                Jabatan</label>
            <input type="text" name="form_pekerjaan_istri_suami_pangkat_gol_jabatan"
                id="form_pekerjaan_istri_suami_pangkat_gol_jabatan" class="form-control"
                placeholder="Pangkat/Gol. Dan Jabatan" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_nip_nrp">NIP/NRP</label>
            <input type="number" name="form_pekerjaan_istri_suami_nip_nrp" id="form_pekerjaan_istri_suami_nip_nrp"
                class="form-control" placeholder="NIP/NRP" />
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_pekerjaan_istri_suami_mulai_bekerja">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <div class="col-auto col-md-4">
                            <div class="mb-1">
                                <label class="form-label" for="form_pekerjaan_istri_suami_mulai_bekerja">Mulai
                                    Bekerja</label>
                                <input type="date" class="form-control flatpickr-basic"
                                    name="form_pekerjaan_istri_suami_mulai_bekerja"
                                    id="form_pekerjaan_istri_suami_mulai_bekerja"
                                    aria-describedby="form_pekerjaan_istri_suami_mulai_bekerja"
                                    placeholder="DD-MM-YYYY" />
                            </div>
                        </div>

                        <div class="row col-auto col-md-3" style="margin-bottom: 15px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label" for="form_pekerjaan_istri_suami_usia_pensiun">Usia
                                    Pensiun</label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_istri_suami_usia_pensiun"
                                    id="form_pekerjaan_istri_suami_usia_pensiun"
                                    aria-describedby="form_pekerjaan_istri_suami_usia_pensiun"
                                    placeholder="Usia Pensiun" />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>

                        <div class="row col-auto" style="margin-bottom: 15px; margin-left: -100px">
                            <div class="col-auto">
                                <label class="form-label" for="form_pekerjaan_istri_suami_masa_kerja">Masa Kerja
                                    (termasuk sebelumnya)</label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_istri_suami_masa_kerja"
                                    id="form_pekerjaan_istri_suami_masa_kerja"
                                    aria-describedby="form_pekerjaan_istri_suami_masa_kerja"
                                    placeholder="Masa Kerja" />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_nama_atasan_langsung">Nama
                Atasan
                Langsung</label>
            <input type="text" name="form_pekerjaan_istri_suami_nama_atasan_langsung"
                id="form_pekerjaan_istri_suami_nama_atasan_langsung" class="form-control"
                placeholder="Nama Atasan Langsung" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_no_telp_atasan_langsung">Nomor
                Telp. Atasan
                Langsung</label>
            <input type="text" name="form_pekerjaan_istri_suami_no_telp_atasan_langsung"
                id="form_pekerjaan_istri_suami_no_telp_atasan_langsung" class="form-control prefix-mask6"
                placeholder="Masukkan Nomor Telp. Atasan Langsung" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label"
                for="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension">Pesawat/Extension</label>
            <input type="number" name="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension"
                id="form_pekerjaan_istri_suami_no_telp_atasan_langsung_extension" class="form-control"
                placeholder="Masukkan Nomor Pesawat/Extension" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_pekerjaan_istri_suami_grup_afiliasi">Group
                Afiliasi Perusahaan</label>
            <input type="text" name="form_pekerjaan_istri_suami_grup_afiliasi"
                id="form_pekerjaan_istri_suami_grup_afiliasi" class="form-control"
                placeholder="Group Afiliasi Perusahaan" />
        </div>

        <div class="mb-1 col-md-12">
            <div data-repeater-list="form_pekerjaan_pemohon_pengalaman_kerja_terakhir">
                <div data-repeater-item>
                    <div class="row d-flex align-items-end">
                        <h6>Pengalaman
                            Kerja
                            Terakhir</h6>
                        <div class="col-auto col-md-4">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan">Perusahaan</label>
                                <input type="text" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_perusahaan"
                                    placeholder="Nama Perusahaan" />
                            </div>
                        </div>

                        <div class="col-auto col-md-2">
                            <div class="mb-1">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan">Jabatan</label>
                                <input type="text" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_jabatan"
                                    placeholder="Jabatan" />
                            </div>
                        </div>

                        <div class="row col-auto" style="margin-bottom: 15px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun">Lama
                                    Kerja</label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_tahun"
                                    placeholder="Tahun" />
                            </div>
                            <div class="col-auto" style="margin-top: 32px;">
                                <span class="form-text-beside">Tahun</span>
                            </div>
                        </div>
                        <div class="row col-auto" style="margin-bottom: 17px; margin-left:-100px;">
                            <div class="col-auto col-md-6">
                                <label class="form-label"
                                    for="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan">
                                </label>
                                <input type="number" class="form-control"
                                    name="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    id="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    aria-describedby="form_pekerjaan_pemohon_pengalaman_kerja_terakhir_bulan"
                                    placeholder="Bulan" />
                            </div>
                            <div class="col-auto" style="margin-top: 29px;">
                                <span class="form-text-beside">Bulan</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-primary btn-prev" type="button">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Previous</span>
        </button>
        <button class="btn btn-primary btn-next" type="button">
            <span class="align-middle d-sm-inline-block d-none">Next</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>
