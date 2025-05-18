<header class="d-flex  qflex-wrap justify-content-center py-3 mx-1">
    <div class="d-flex align-items-center me-md-auto link-body-emphasis text-decoration-none">
        <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo" class="img-fluid w-75">
        {{-- <img src="{{ asset('src/company_logo.png') }}" alt="Company Logo" class="img-fluid" style="width: 100px; height: auto;"> --}}
    </div>

    <div>
        <div>
            <p id="current-time" class="text-black fw-bold px-4 py-2"></p>
        </div>
    </div>   
</header>
<script>
    function updateTime() {
        const now = new Date();

        const options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: false,
            // timeZone: 'Asia/Jakarta'
        };

        const formattedTime = new Intl.DateTimeFormat('id-ID', options).format(now) + ' WIB';
        document.getElementById('current-time').textContent = formattedTime;
    }

    updateTime(); // initial
    setInterval(updateTime, 60000); // update setiap menit
</script>