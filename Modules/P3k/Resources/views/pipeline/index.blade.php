@extends('p3k::layouts.main')

@push('page-css')
<style>
    .table-sm th,
    .table-sm td {
        font-size: 0.8rem;
    }
</style>
@endpush

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- Alert bulan ini belum ada pipeline --}}
        @if ($userPipelinesCurrentMonth->isEmpty())
            <div class="alert alert-danger d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-1 mb-4">
                <div>
                    <div class="fw-semibold">Anda belum memiliki data pipeline bulan {{ $currentMonth . ' ' . $currentYear }}.</div>
                    <small>Silakan tambah pipeline.</small>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTambahPipeline">
                    <i data-feather="plus-circle"></i>&nbsp;Tambah Pipeline
                </button>
            </div>
        @endif

        {{-- Page Title --}}
        <div class="content-header row mb-3">
            <div class="content-header-left col-12">
                <h3 class="content-header-title float-start mb-0">Data Pipeline {{ Auth::user()->name }}</h3>
            </div>
        </div>

        {{-- Row 1: Chart + Ringkasan Bulan Ini --}}
        <div class="row g-4 mb-4">
            {{-- Chart Card --}}
            <div class="col-xl-7 col-md-6 col-12">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <h4 class="card-title mb-0">Pipeline PPPK</h4>
                        <input type="month" class="form-control w-auto" name="bulan" id="selectMonth" oninput="filterData()" />
                    </div>
                    <div class="card-body">
                        <canvas id="chartPipeline"></canvas>
                    </div>
                </div>
            </div>

            {{-- Ringkasan Bulan Ini (AJAX) --}}
            <div class="col-xl-5 col-md-6 col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Ringkasan Bulan Ini</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="pipelineTable" class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th class="text-end">Target</th>
                                        <th class="text-end">Realisasi</th>
                                        <th class="text-end">On Process</th>
                                        <th class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0"></tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Row 2: Riwayat Pipeline --}}
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Riwayat Pipeline</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formTambahPipeline">
                            <i data-feather="plus-circle"></i>&nbsp;Tambah Pipeline
                        </button>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">Bulan</th>
                                        <th class="text-end">Target</th>
                                        <th class="text-end">Realisasi</th>
                                        <th class="text-end">On Process</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($userPipelines as $userPipeline)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $userPipeline->tahun }}</td>
                                            <td class="text-center">{{ $userPipeline->bulan }}</td>
                                            <td class="text-end">Rp{{ number_format($userPipeline->nominal_target, 0, ',', '.') }}</td>
                                            <td class="text-end">Rp{{ number_format($userPipeline->nominal_realisasi, 0, ',', '.') }}</td>
                                            <td class="text-end">Rp{{ number_format($userPipeline->nominal_on_process, 0, ',', '.') }}</td>
                                            <td class="text-center">
                                                @if ($userPipeline->nominal_realisasi >= $userPipeline->nominal_target)
                                                    <span class="badge rounded-pill badge-light-success">Achieved</span>
                                                @else
                                                    <span class="badge rounded-pill badge-light-danger">Belum Achieve</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="/p3k/userPipeline/{{ $userPipeline->id }}" class="btn btn-sm btn-outline-info">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center py-3">Belum ada data pipeline.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Modal Tambah Pipeline --}}
<div class="modal fade" id="formTambahPipeline" tabindex="-1" aria-labelledby="addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 mx-50 pb-5">
                <h3 class="text-center mb-1" id="addNewCardTitle">Tambah Pipeline</h3>
                <form id="addNewCardValidation" class="row gy-1 gx-2 mt-75" method="POST"
                    action="/p3k/pipeline" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="inputBulanPipeline">
                            <small class="text-danger">* </small>Bulan
                        </label>
                        <input type="month" name="input_bulan_pipeline" class="form-control"
                            id="inputBulanPipeline" required disabled />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="nominalTarget">
                            <small class="text-danger">* </small>Masukkan Nominal Target
                        </label>
                        <input type="text" name="nominal_pembiayaan" class="form-control numeral-mask"
                            placeholder="Rp." id="nominalTarget" required />
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-1 mt-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary mt-1"
                            data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('page-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

<script>
    window.addEventListener('load', function () {
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        var currentMonth = currentDate.getMonth() + 1;
        var monthYearInput = currentYear + '-' + ('0' + currentMonth).slice(-2);
        document.getElementById('selectMonth').value = monthYearInput;
        document.getElementById('inputBulanPipeline').value = monthYearInput;
        filterData();
    });
</script>

<script>
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    var currentMonth = currentDate.getMonth() + 1;
    document.getElementById('selectMonth').max = currentYear + '-' + ('0' + currentMonth).slice(-2);

    var chartPipeline;

    function filterData() {
        var monthYear = document.getElementById('selectMonth').value;
        var selectedDate = new Date(monthYear);
        var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        var selectedMonth = monthNames[selectedDate.getMonth()];
        var selectedYear = selectedDate.getFullYear();

        $.ajax({
            url: '/p3k/pipeline/filter-by-month',
            type: 'GET',
            data: { bulan: selectedMonth, tahun: selectedYear },
            success: function (response) {
                if (chartPipeline) { chartPipeline.destroy(); }
                populateChart(response);
                populateTable(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function populateChart(data) {
        var ctx = document.getElementById('chartPipeline').getContext('2d');
        if (!data.datasets || data.datasets.length === 0) {
            ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            ctx.font = '14px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText('Data tidak tersedia', ctx.canvas.width / 2, ctx.canvas.height / 2);
            return;
        }
        var labels = data.labels;
        var datasets = data.datasets;
        chartPipeline = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    { label: 'Target', data: datasets[0].data, backgroundColor: 'rgba(203, 38, 33, 0.7)', borderColor: 'rgba(203, 38, 33, 1)', borderWidth: 1 },
                    { label: 'Realisasi', data: datasets[1].data, backgroundColor: 'rgba(54, 162, 235, 0.7)', borderColor: 'rgba(54, 162, 235, 1)', borderWidth: 1 },
                    { label: 'On Process', data: datasets[2].data, backgroundColor: 'rgba(255, 206, 86, 0.7)', borderColor: 'rgba(255, 206, 86, 1)', borderWidth: 1 }
                ]
            },
            options: {
                indexAxis: 'y',
                scales: { y: { beginAtZero: true } },
                responsive: true,
                plugins: { legend: { position: 'right' } }
            }
        });
    }

    function populateTable(data) {
        var tableBody = document.querySelector('#pipelineTable tbody');
        var tableFooter = document.querySelector('#pipelineTable tfoot');
        tableBody.innerHTML = '';
        tableFooter.innerHTML = '';

        if (!data || !data.labels || !data.labels.length) {
            tableBody.innerHTML = '<tr><td colspan="6" class="text-center py-3">Data tidak tersedia</td></tr>';
            return;
        }

        data.labels.forEach(function (name, index) {
            var target = data.datasets[0].data[index];
            var realisasi = data.datasets[1].data[index];
            var onProcess = data.datasets[2].data[index];
            tableBody.innerHTML += `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td>${name}</td>
                    <td class="text-end">Rp${numberFormat(target)}</td>
                    <td class="text-end">Rp${numberFormat(realisasi)}</td>
                    <td class="text-end">Rp${numberFormat(onProcess)}</td>
                    <td class="text-center">
                        ${+realisasi >= +target
                            ? '<span class="badge rounded-pill badge-light-success">Achieved</span>'
                            : '<span class="badge rounded-pill badge-light-danger">Belum Achieve</span>'}
                    </td>
                </tr>`;
        });

        var totalTarget    = calculateTotal(data.datasets[0].data);
        var totalRealisasi = calculateTotal(data.datasets[1].data);
        var totalOnProcess = calculateTotal(data.datasets[2].data);
        var achieved = calculateAchieved(data.datasets[0].data, data.datasets[1].data);

        tableFooter.innerHTML = `
            <tr>
                <td colspan="2" class="text-center"><strong>Total</strong></td>
                <td class="text-end"><strong>Rp${numberFormat(totalTarget)}</strong></td>
                <td class="text-end"><strong>Rp${numberFormat(totalRealisasi)}</strong></td>
                <td class="text-end"><strong>Rp${numberFormat(totalOnProcess)}</strong></td>
                <td class="text-center"><strong>${achieved.totalAchieved} / ${achieved.totalIterations} Achieved</strong></td>
            </tr>`;
    }

    function calculateTotal(array) {
        return array.reduce(function (total, val) {
            return total + parseFloat(String(val).replace(/[^\d.-]/g, ''));
        }, 0);
    }

    function calculateAchieved(targets, realisasi) {
        var countAchieved = 0;
        for (var i = 0; i < targets.length; i++) {
            if (+realisasi[i] >= +targets[i]) countAchieved++;
        }
        return { totalAchieved: countAchieved, totalIterations: targets.length };
    }

    function numberFormat(number) {
        if (typeof number === 'string') {
            number = parseFloat(number.replace(/\./g, '').replace(/,/g, '.'));
        }
        if (isNaN(number)) return '';
        return number.toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }
</script>
@endpush
