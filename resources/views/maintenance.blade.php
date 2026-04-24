<!doctype html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="layout-wide"
    dir="ltr"
    data-skin="default"
    data-bs-theme="light"
    data-assets-path="{{ asset('assets/') }}/"
    data-template="front-pages">
<head>
    @include('layouts.vuexy.head-assets', [
        'title' => $title ?? 'Sedang Maintenance',
        'isFront' => true,
        'includeVerticalMenu' => false,
    ])

    <style>
        body {
            background:
                radial-gradient(1200px 450px at -10% -20%, rgba(211, 47, 47, 0.18), transparent 60%),
                radial-gradient(900px 400px at 110% 120%, rgba(255, 111, 97, 0.16), transparent 60%),
                #f8f7fa;
        }

        .maintenance-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .maintenance-card {
            width: 100%;
            max-width: 860px;
            border: 0;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1.8rem rgba(47, 43, 61, 0.14);
        }

        .maintenance-side {
            background: linear-gradient(160deg, #d32f2f, #b71c1c);
            color: #fff;
        }

        .maintenance-illust {
            width: 100%;
            max-width: 280px;
            margin: 0 auto;
            display: block;
        }

        .status-pill {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 50rem;
            padding: 0.35rem 0.75rem;
            background: rgba(255, 255, 255, 0.2);
            font-size: 0.78rem;
            font-weight: 600;
        }

        .icon-svg {
            width: 16px;
            height: 16px;
            display: inline-block;
            vertical-align: -2px;
        }

        .eta-box {
            border-radius: 0.75rem;
            border: 1px dashed rgba(211, 47, 47, 0.45);
            background: rgba(211, 47, 47, 0.08);
            padding: 0.8rem 0.9rem;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <main class="maintenance-wrapper">
        <div class="card maintenance-card">
            <div class="row g-0">
                <div class="col-lg-5 maintenance-side p-4 p-lg-5 d-flex flex-column justify-content-between">
                    <div>
                        <span class="status-pill mb-3">
                            <svg class="icon-svg" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M14.7 6.3a4 4 0 0 0-5.44 5.2l-5.1 5.1a1.5 1.5 0 1 0 2.12 2.12l5.1-5.1a4 4 0 0 0 5.2-5.44l-2.07 2.07-2.83-.71-.71-2.83 2.07-2.07z" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Maintenance Mode
                        </span>
                        <h4 class="text-white mb-1">Layanan Sedang Ditingkatkan</h4>
                        <p class="mb-0 opacity-75">Kami sedang melakukan pemeliharaan sistem agar aplikasi lebih stabil dan nyaman digunakan.</p>
                    </div>

                    <svg class="maintenance-illust mt-4" viewBox="0 0 360 260" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Ilustrasi maintenance">
                        <rect x="0" y="0" width="360" height="260" rx="24" fill="rgba(255,255,255,0.08)"/>
                        <rect x="38" y="42" width="284" height="170" rx="14" fill="rgba(255,255,255,0.16)"/>
                        <rect x="58" y="62" width="244" height="16" rx="8" fill="rgba(255,255,255,0.32)"/>
                        <rect x="58" y="92" width="96" height="16" rx="8" fill="rgba(255,255,255,0.25)"/>
                        <rect x="58" y="118" width="180" height="10" rx="5" fill="rgba(255,255,255,0.22)"/>
                        <rect x="58" y="136" width="160" height="10" rx="5" fill="rgba(255,255,255,0.22)"/>
                        <circle cx="282" cy="154" r="28" fill="#ffb3b3"/>
                        <path d="M272 148l9 9 16-16" stroke="#8b1f1f" stroke-width="6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                        <circle cx="95" cy="200" r="8" fill="rgba(255,255,255,0.35)"/>
                        <circle cx="122" cy="200" r="8" fill="rgba(255,255,255,0.35)"/>
                        <circle cx="149" cy="200" r="8" fill="rgba(255,255,255,0.35)"/>
                    </svg>
                </div>

                <div class="col-lg-7 bg-white p-4 p-lg-5 d-flex flex-column justify-content-center">
                    <h2 class="mb-2">{{ $title ?? 'Sedang Maintenance' }}</h2>
                    <p class="text-body mb-3">{{ $message ?? 'Aplikasi sedang dalam proses maintenance. Silakan coba kembali beberapa saat lagi.' }}</p>

                    @if(!empty($eta ?? ''))
                        <div class="eta-box mb-3">
                            <svg class="icon-svg me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.7"/>
                                <path d="M12 8v4l2.6 1.6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Estimasi selesai: {{ $eta }}
                        </div>
                    @endif

                    <div class="d-flex flex-wrap gap-2 mt-2">
                        <button class="btn btn-primary" type="button" onclick="window.location.reload()">
                            <svg class="icon-svg me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M20 12a8 8 0 1 1-2.34-5.66" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"/>
                                <path d="M20 4v5h-5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Coba Lagi
                        </button>
                        <a class="btn btn-outline-secondary" href="{{ url('/') }}">
                            <svg class="icon-svg me-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M4 10.5L12 4l8 6.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.5 9.5V20h11V9.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Kembali ke Beranda
                        </a>
                    </div>

                    <small class="text-muted d-block mt-3">Terima kasih atas pengertiannya.</small>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
