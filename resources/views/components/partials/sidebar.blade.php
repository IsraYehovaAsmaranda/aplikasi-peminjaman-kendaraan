<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark vh-100" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
            <use xlink:href="#bootstrap" />
        </svg>
        <span class="fs-4">Menu</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link {{Route::is('dashboardPage') ? 'active' : 'text-white'}}" aria-current="page">
                <span class="mdi mdi-view-dashboard"></span>
                Dashboard
            </a>
        </li>
        <li>
            <a href="/pesankendaraan" class="nav-link {{Route::is('pesanKendaraanPage') ? 'active' : 'text-white'}}">
                <span class="mdi mdi-car-estate"></span>
                Pemesanan Kendaraan
            </a>
        </li>
        <li>
            <a href="/laporanpemesanan" class="nav-link {{Route::is('laporanPemesananPage') ? 'active' : 'text-white'}}">
                <span class="mdi mdi-file-chart"></span>
                Laporan Periodik Pemesanan kendaraan
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
            id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong> {{ Auth::user()->name }} </strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="/logout">Sign out</a></li>
        </ul>
    </div>
</div>
