<div class="col-lg-2 mt-4 text-white p-2 border-end" style="min-height: 80vh;">
    <div class="text-start ms-3 mb-3 mt-3">
        {{-- <img src="{{ asset('storage/' . $user->foto_pengguna) ?? asset('src/defaultPfp.jpg') }}" alt="Foto Pengguna" class="rounded-circle" width="100" style="border-radius: 121px; border: 5px white solid" src="https://placehold.co/100x100"> --}}
        <img src="{{ !empty($user->foto_pengguna) ? asset('storage/' . $user->foto_pengguna) : asset('src/defaultPfp.jpg') }}" alt="Foto Pengguna" class="rounded-circle" width="100" style="border-radius: 121px; border: 5px white solid" src="https://placehold.co/100x100">
    </div>
    <table class="text-white table-borderless mb-0 ms-3" style="background-color: transparent;">
        <tbody>
            <tr>
                <td><strong>Nama</strong></td>
                <td>&nbsp;:&nbsp;{{ $user->nama_pengguna }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>&nbsp;:&nbsp;{{ $user->email }}</td>
            </tr>
            <tr>
                <td><strong>Jobdesk</strong></td>
                <td>&nbsp;:&nbsp;{{ $user->jobdesk }}</td>
            </tr>
        </tbody>
    </table>
    
    @if(Route::currentRouteName() === 'projects.index')
        <form action="{{ route('logout') }}" method="POST" class="w-75 mt-5 ms-3">
            @csrf
            <button type="submit" class="btn btn-danger fw-bold w-100 rounded-pill">
                Keluar <i class="bi bi-box-arrow-right ms-2"></i>
            </button>
        </form>
    @endif
</div>