<header class="d-flex  qflex-wrap justify-content-center py-3 mx-1">
    <div class="d-flex align-items-center me-md-auto link-body-emphasis text-decoration-none">
        <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo" class="img-fluid w-75">
        {{-- <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo" class="img-fluid" style="width: 100px; height: auto;"> --}}
    </div>

    <div>
        <p class="text-black fw-bold px-4 py-2">
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y | H:i:s') }} WIB
        </p>
    </div>   
</header>