<div id="formDataPenghasilanPengeluaran" class="content" role="tabpanel" aria-labelledby="penghasilan-trigger">
    <div class="content-header">
        <h4 class="mb-0 mt-2">Data Penghasilan dan Pengeluaran per Bulan</h4>
        <hr>
    </div>
    <div class="row">
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"><small
                    class="text-danger">*
                </small>1. Penghasilan Utama Pemohon</label>
            <input type="text" name="form_penghasilan_pengeluaran_penghasilan_utama_pemohon"
                id="form_penghasilan_pengeluaran_penghasilan_utama_pemohon" class="form-control numeral-mask"
                placeholder="Masukkan Penghasilan Utama Pemohon" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"><small
                    class="text-danger">*
                </small>6. Biaya Hidup Rutin Keluarga</label>
            <input type="text" name="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga"
                id="form_penghasilan_pengeluaran_biaya_hidup_rutin_keluarga" class="form-control numeral-mask"
                placeholder="Masukkan Biaya Hidup Rutin Keluarga" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"><small
                    class="text-danger">*
                </small>2. Penghasilan Lain-Lain Pemohon</label>
            <input type="text" name="form_penghasilan_pengeluaran_penghasilan_lain_pemohon"
                id="form_penghasilan_pengeluaran_penghasilan_lain_pemohon" class="form-control numeral-mask"
                placeholder="Masukkan Penghasilan Lain-Lain Pemohon" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_kewajiban_angsuran"><small class="text-danger">*
                </small>7. Kewajiban Angsuran <i>(Meliputi Total Kewajiban
                    Angsuran/Bulan
                    atas
                    Pinjaman pada Bank atau
                    Pihak Lain)</i></label>
            <input type="text" name="form_penghasilan_pengeluaran_kewajiban_angsuran"
                id="form_penghasilan_pengeluaran_kewajiban_angsuran" class="form-control numeral-mask"
                placeholder="Masukkan Kewajiban Angsuran" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"><small
                    class="text-danger">*
                </small>3. Penghasilan Utama Istri/Suami</label>
            <input type="text" name="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami"
                id="form_penghasilan_pengeluaran_penghasilan_utama_istri_suami" class="form-control numeral-mask"
                placeholder="Masukkan Penghasilan Utama Istri/Suami" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_total_pengeluaran"><small class="text-danger">*
                </small>8. Total Pengeluaran (6+7)</label>
            <input type="text" id="form_penghasilan_pengeluaran_total_pengeluaran_dummy"
                class="form-control numeral-mask" placeholder="Total Pengeluaran" disabled />
            <input type="hidden" name="form_penghasilan_pengeluaran_total_pengeluaran"
                id="form_penghasilan_pengeluaran_total_pengeluaran" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"><small
                    class="text-danger">*
                </small>4. Penghasilan Lain-Lain Istri/Suami</label>
            <input type="text" name="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami"
                id="form_penghasilan_pengeluaran_penghasilan_lain_istri_suami" class="form-control numeral-mask"
                placeholder="Masukkan Penghasilan Lain-Lain Istri/Suami" onkeyup="sumPP(this.value);" required />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_sisa_penghasilan"><small class="text-danger">*
                </small>9. Sisa Penghasilan (5-8)</label>
            <input type="text" id="form_penghasilan_pengeluaran_sisa_penghasilan_dummy"
                class="form-control numeral-mask" placeholder="Sisa Penghasilan" disabled />
            <input type="hidden" name="form_penghasilan_pengeluaran_sisa_penghasilan"
                id="form_penghasilan_pengeluaran_sisa_penghasilan" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_total_penghasilan"><small class="text-danger">*
                </small>5. Total Penghasilan (1+2+3+4)</label>
            <input type="text" id="form_penghasilan_pengeluaran_total_penghasilan_dummy"
                class="form-control numeral-mask" placeholder="Total Penghasilan" disabled />
            <input type="hidden" name="form_penghasilan_pengeluaran_total_penghasilan"
                id="form_penghasilan_pengeluaran_total_penghasilan" />
        </div>
        <div class="mb-1 col-md-6">
            <label class="form-label" for="form_penghasilan_pengeluaran_kemampuan_mengangsur"><small
                    class="text-danger">*
                </small>10. Kemampuan Mengangsur</label>
            <input type="text" name="form_penghasilan_pengeluaran_kemampuan_mengangsur"
                id="form_penghasilan_pengeluaran_kemampuan_mengangsur" class="form-control numeral-mask"
                placeholder="Masukkan Kemampuan Mengangsur" onkeyup="sumPP(this.value);" required />
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
