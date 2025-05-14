{{-- <div class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom bg-white">
    <div>
        <a href="/">
            <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo">
        </a>
    </div>
    
    <!-- Header tanggal -->
    <div>
        <small class="text-black fw-bold">
            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y | H:i:s') }} WIB
        </small>
    </div>    
</div> --}}

{{-- <div class="container"> --}}
    <header class="d-flex flex-wrap justify-content-center py-3 mb-1 mx-2">
        <div href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo">
        </div>

        <div>
            <h5 class="text-black fw-bold px-4 py-3">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y | H:i:s') }} WIB
            </h5>
        </div>   
    </header>
{{-- </div> --}}
