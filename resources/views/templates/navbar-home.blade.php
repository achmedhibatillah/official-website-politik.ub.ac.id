<nav class="navbar navbar-expand-lg w-100 position-fixed d-flex flex-column py-0" style="z-index: 3;">
<div class="w-100 d-block bg-clr1 d-flex justify-content-center">
    <div class="col-11 col-md-10 col-lg-9 col-xl-7 m-0 p-0 text-clr4">Program Studi Ilmu Politik Universitas Brawijaya</div>
</div>
<div class="container-fluid py-2 col-11 col-md-10 col-lg-9 col-xl-7 p-0">
    <a class="navbar-brand m-0 p-0" href="{{ url('') }}">
        <div class="d-flex justify-content-center align-items-center overflow-hidden bg-clr1 rounded shadow-m" style="width:120px;">
            <img src="{{ asset('assets/images/static/logo.png') }}" class="w-100">
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto ms-0 ms-lg-5 mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link m-0 text-clr3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil <i class="fas fa-chevron-down fsz-10"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi, Misi, dan Tujuan Kompetensi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi Keilmuan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Renstra & Proker</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Sumber Daya Manusia</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Dosen</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Tenaga Pendidik</a></li>
                </ul>
            </li>
        </ul>
        <div class="btn btn-transparent text-clr3"><i class="fas fa-search"></i></div>
    </div>
</div>
</nav>

<div class="bg-clr5">

<style>
.navbar {
    /* background: linear-gradient(to bottom, rgba(255, 0, 0, 0.7), rgba(255, 0, 0, 0.5), rgba(255, 0, 0, 0.3), rgba(0, 0, 0, 0)); */
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(1px);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}
</style>