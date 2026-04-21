<?php $__env->startSection('content'); ?>
    <style>
        .rotate {
            -moz-transition: all 0.4s;
            -webkit-transition: all 0.4s;
            transition: all 0.4s;
        }

        .rotate.down {
            -moz-transform: rotate(-180deg);
            -webkit-transform: rotate(-180deg);
            transform: rotate(-180deg);
        }

        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #c21914;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #c21914;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Simulasi Pembiayaan</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Simulasi</a></li>
                                    <li class="breadcrumb-item active">Form Simulasi</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Input Mask start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Form Simulasi Pembiayaan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 col-sm-12 mb-3" id="divOtrPkb" style="display: none;">
                                    <label class="form-label" for="otrPkb">Harga OTR PKB</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="otrPkb" onkeyup="simulasi(this.value);" />
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label" for="plafond">Plafond</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="plafond" onkeyup="simulasi(this.value);" />
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label" for="margin">Margin/Bulan</label>
                                    <select class="form-select" id="margin" onchange="simulasi(this.value);">
                                        <option value="0.95833333333333">0,96%</option>
                                        <option value="1.00">1,00%</option>
                                        <option value="1.25">1,25%</option>
                                        <option value="1.50">1,50%</option>
                                        <option value="1.60">1,60%</option>
                                        <option value="1.65">1,65%</option>
                                        <option value="1.75">1,75%</option>
                                        <option value="2.00">2,00%</option>
                                        <option value="2.25">2,25%</option>
                                        <option value="2.50">2,50%</option>
                                        <option value="2.75">2,75%</option>
                                        <option value="3.00">3,00%</option>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-md-6 col-sm-12 mb-3">
                                    <label class="form-label" for="tenor">Tenor (Bulan)</label>
                                    <input type="text" class="form-control" placeholder="Tenor Dalam Bulan"
                                        id="tenor" onkeyup="simulasi(this.value);" />
                                </div>
                            </div>

                            <!-- Hasil Simulasi -->
                            <div class="card bg-primary text-white shadow-sm mb-0" id="hasilSimulasi">
                                <div class="card-body text-center py-4">
                                    <h4 class="mb-3 text-white">Hasil Perhitungan Simulasi</h4>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-5 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Angsuran / Bulan</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="angsuran" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('angsuran')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Harga Jual</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="harga_jual" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('harga_jual')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PKB Section -->
                        <div class="card-header d-flex align-items-center justify-content-between border-top mt-0">
                            <h6 class="mb-0">Perhitungan Pembiayaan Kendaraan Bermotor (PKB)</h6>
                            <label class="switch mb-0">
                                <input type="checkbox" onchange="togglePkb()">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div id="divPkbTable" style="display: none;" class="card-body">
                            <p class="text-danger mb-3"><small>*Tenor yang berlaku: 12/24/36 bulan</small></p>
                            <div class="row">
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="usia">Usia (tahun)</label>
                                    <input type="number" class="form-control" placeholder="Usia (tahun)"
                                        id="usia" onkeyup="simulasi(this.value);" />
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="asuransiKendaraan">Asuransi Kendaraan (TLO)</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="asuransiKendaraan" readonly />
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="asuransiJiwa">Asuransi Jiwa</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="asuransiJiwa" readonly />
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="biayaAdministrasi">Biaya Administrasi</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="biayaAdministrasi" readonly />
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="pemeliharaanRekening">Pemeliharaan Rekening</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="pemeliharaanRekening" readonly />
                                </div>
                                <div class="col-xl-2 col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="holdAngsuran">Hold 1x Angsuran</label>
                                    <input type="text" class="form-control numeral-mask" placeholder="Rp."
                                        id="holdAngsuran" readonly />
                                </div>
                            </div>
                            <div class="card bg-primary text-white shadow-sm">
                                <div class="card-body text-center py-4">
                                    <h5 class="mb-3 text-white">Simulasi PKB</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-xl-4 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Total Potongan</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="totalPotonganBiaya" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('totalPotonganBiaya')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Pencairan Diterima Nasabah</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="pencairanDiterima" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('pencairanDiterima')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Sisa Pencairan (Pencairan diterima - OTR)</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="sisaPencairan" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('sisaPencairan')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Harga Jual PKB</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="hargaJualPkb" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('hargaJualPkb')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mb-2">
                                            <h6 class="mb-1 text-white">Angsuran PKB</h6>
                                            <div class="input-container" style="position: relative; display: inline-block; width: 100%;">
                                                <input type="text" class="form-control text-center bg-white fw-bold" id="angsuranPkb" disabled />
                                                <i title="Salin ke clipboard" onclick="copyValue('angsuranPkb')"
                                                    style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">&#x1F4CB;</i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div><!-- /.col-12 -->
            </div><!-- /.row -->
        </div><!-- /.container-xxl -->
    </div><!-- /.app-content -->
    <!-- END: Content-->
    <script>
        function simulasi(value) {
            var plafond, margin, tenor, hitung_harga, harga_jual, hasil, angsuran, rate, asuransiKendaraan,
                asuransiJiwa, biayaAdministrasi, pemeliharaanRekening,
                holdAngsuran, totalPotonganBiaya, otrPkb, hargaJualPkb, angsuranPkb,
                tenorAsuransi, depresiasiTlo, pertanggunganTlo, kontribusiTlo, totalKontribusiTlo, usia, rateAsuransiJiwa,
                rateTableAsuransiJiwa, pencairanDiterima, sisaPencairan;
            otrPkb = parseFloat(document.getElementById("otrPkb").value.replace(/\./g, "").replace(/,/g, '.')) || 0;
            plafond = parseFloat(document.getElementById("plafond").value.replace(/\./g, "").replace(/,/g, '.')) || 0;
            margin = document.getElementById("margin").value;
            tenor = document.getElementById("tenor").value;
            usia = document.getElementById("usia").value;
            // asuransiKendaraan = parseFloat(document.getElementById("asuransiKendaraan").value.replace(/\./g, "").replace(
            //     /,/g, '.')) || 0;
            // asuransiJiwa = parseFloat(document.getElementById("asuransiJiwa").value.replace(/\./g, "").replace(/,/g,
            //     '.')) || 0;

            rate = margin / 100;
            hitung_harga = +plafond * rate * tenor;
            harga_jual = +hitung_harga + +plafond;
            angsuran = +harga_jual / tenor;

            rateTableAsuransiJiwa = {
                18: [1.95, 3.73, 5.51],
                19: [1.95, 3.73, 5.51],
                20: [1.95, 3.73, 5.51],
                21: [1.95, 3.73, 5.51],
                22: [1.95, 3.73, 5.51],
                23: [1.95, 3.73, 5.51],
                24: [1.95, 3.75, 5.55],
                25: [1.97, 3.79, 5.59],
                26: [1.97, 3.79, 5.61],
                27: [1.97, 3.79, 5.63],
                28: [1.99, 3.83, 5.69],
                29: [2.03, 3.90, 5.80],
                30: [2.05, 3.96, 5.95],
                31: [2.14, 4.15, 6.22],
                32: [2.24, 4.36, 6.52],
                33: [2.35, 4.53, 6.83],
                34: [2.45, 4.78, 7.25],
                35: [2.63, 5.16, 7.85],
                36: [2.88, 5.61, 8.51],
                37: [3.09, 6.03, 9.14],
                38: [3.32, 6.48, 9.84],
                39: [3.56, 7.00, 10.62],
                40: [3.85, 7.58, 11.51],
                41: [4.21, 8.25, 12.52],
                42: [4.53, 8.93, 13.56],
                43: [4.95, 9.69, 14.72],
                44: [5.35, 10.50, 15.94],
                45: [5.82, 11.41, 17.29],
                46: [6.28, 12.33, 18.67],
                47: [6.77, 13.30, 20.17],
                48: [7.34, 14.37, 21.80],
                49: [7.91, 15.53, 23.58],
                50: [8.57, 16.83, 25.57],
                51: [9.30, 18.29, 27.83],
                52: [10.15, 19.98, 30.43],
                53: [11.12, 21.89, 33.43],
                54: [12.20, 24.12, 36.87],
                55: [13.58, 26.73, 40.70],
                56: [14.87, 29.21, 44.43],
                57: [16.20, 31.82, 48.36],
                58: [17.60, 34.59, 52.68],
                59: [19.13, 37.50, 57.25],
                60: [20.78, 40.85, 62.21]
            };

            // Check if the age exists in the rateTableAsuransiJiwa
            tenorAsuransi = 0;
            rateAsuransiJiwa = 0;
            if (rateTableAsuransiJiwa[usia]) {
                if (tenor == 12) {
                    tenorAsuransi = 1; //1 tahun

                    rateAsuransiJiwa = rateTableAsuransiJiwa[usia][0];
                } else if (tenor == 24) {
                    tenorAsuransi = 2; //2 tahun

                    rateAsuransiJiwa = rateTableAsuransiJiwa[usia][1];
                } else if (tenor == 36) {
                    tenorAsuransi = 3; //3 tahun

                    rateAsuransiJiwa = rateTableAsuransiJiwa[usia][2];
                } else {
                    rateAsuransiJiwa = 0;
                }

            }

            asuransiJiwa = plafond * rateAsuransiJiwa / 1000;

            pertanggunganTlo = otrPkb;
            rateAsuransiKendaraan = 1.8 / 100; //Wilayah 2
            depresiasiTlo = 100 / 100;
            kontribusiTlo = 0;
            totalKontribusiTlo = 0;

            for (var i = 0; i < tenorAsuransi; i++) {
                pertanggunganTlo = depresiasiTlo * otrPkb;
                depresiasiTlo -= 10 / 100; //-10 per tahun
                kontribusiTlo = pertanggunganTlo * rateAsuransiKendaraan;
                totalKontribusiTlo += kontribusiTlo
            }


            asuransiKendaraan = totalKontribusiTlo;
            biayaAdministrasi = 1.5 / 100 * +plafond;
            hargaJualPkb = +harga_jual;
            angsuranPkb = +hargaJualPkb / tenor;
            pemeliharaanRekening = tenor * 5000;
            holdAngsuran = +angsuran;
            totalPotonganBiaya = +asuransiKendaraan + +asuransiJiwa + +biayaAdministrasi + +holdAngsuran +
                pemeliharaanRekening;
            pencairanDiterima = +plafond - +totalPotonganBiaya;
            sisaPencairan = +pencairanDiterima - +otrPkb;

            document.getElementById("harga_jual").value = "Rp." + " " + harga_jual.toFixed(0);
            document.getElementById("harga_jual").value = harga_jual.toLocaleString('id-ID');

            document.getElementById("angsuran").value = "Rp." + " " + angsuran.toFixed(0);
            document.getElementById("angsuran").value = angsuran.toLocaleString('id-ID');

            document.getElementById("asuransiJiwa").value = "Rp." + " " + asuransiJiwa.toFixed(0);
            document.getElementById("asuransiJiwa").value = asuransiJiwa.toLocaleString('id-ID');

            document.getElementById("asuransiKendaraan").value = "Rp." + " " + asuransiKendaraan.toFixed(0);
            document.getElementById("asuransiKendaraan").value = asuransiKendaraan.toLocaleString('id-ID');

            document.getElementById("biayaAdministrasi").value = "Rp." + " " + biayaAdministrasi.toFixed(0);
            document.getElementById("biayaAdministrasi").value = biayaAdministrasi.toLocaleString('id-ID');

            document.getElementById("pemeliharaanRekening").value = "Rp." + " " + pemeliharaanRekening.toFixed(0);
            document.getElementById("pemeliharaanRekening").value = pemeliharaanRekening.toLocaleString('id-ID');

            document.getElementById("holdAngsuran").value = "Rp." + " " + holdAngsuran.toFixed(0);
            document.getElementById("holdAngsuran").value = holdAngsuran.toLocaleString('id-ID');

            document.getElementById("totalPotonganBiaya").value = "Rp." + " " + totalPotonganBiaya.toFixed(0);
            document.getElementById("totalPotonganBiaya").value = totalPotonganBiaya.toLocaleString('id-ID');

            document.getElementById("pencairanDiterima").value = "Rp." + " " + pencairanDiterima.toFixed(0);
            document.getElementById("pencairanDiterima").value = pencairanDiterima.toLocaleString('id-ID');

            document.getElementById("hargaJualPkb").value = "Rp." + " " + hargaJualPkb.toFixed(0);
            document.getElementById("hargaJualPkb").value = hargaJualPkb.toLocaleString('id-ID');

            document.getElementById("angsuranPkb").value = "Rp." + " " + angsuranPkb.toFixed(0);
            document.getElementById("angsuranPkb").value = angsuranPkb.toLocaleString('id-ID');

            document.getElementById("sisaPencairan").value = "Rp." + " " + sisaPencairan.toFixed(0);
            document.getElementById("sisaPencairan").value = sisaPencairan.toLocaleString('id-ID');

        }


        function copyValue(elementId) {
            var inputElement = document.getElementById(elementId);

            inputElement.select();
            inputElement.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(inputElement.value);

            alert("Berhasil disalin");
        }

        function togglePkb() {
            var PkbTable = document.getElementById("divPkbTable");
            var hasilSimulasi = document.getElementById("hasilSimulasi");
            var divOtrPkb = document.getElementById("divOtrPkb");
            if (PkbTable.style.display === "none") {
                PkbTable.style.display = "block";
                divOtrPkb.style.display = "block";
                hasilSimulasi.style.display = "none";
            } else {
                PkbTable.style.display = "none";
                divOtrPkb.style.display = "none";
                hasilSimulasi.style.display = "block";
            }
        }

        $(".rotate").click(function() {
            $(this).toggleClass("down");
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('simulasi::layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/ajspryn/Project/fos/Modules/Simulasi/Resources/views/index.blade.php ENDPATH**/ ?>