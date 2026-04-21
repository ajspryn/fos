    <footer class="content-footer footer bg-footer-theme mt-6">
        <div class="container d-flex flex-wrap justify-content-between py-3">
            <div>
                COPYRIGHT © {{ date('Y') }} <a href="#" class="fw-medium" target="_blank">BPRS BTB</a>
                <span class="d-none d-sm-inline-block">, All rights reserved</span>
            </div>
            <div class="d-none d-lg-inline-block">Hand-crafted & Made with <i data-feather="heart"></i></div>
        </div>
    </footer>

    @include('layouts.vuexy.footer-scripts', ['isFront' => true])
    </body>
    </html>
