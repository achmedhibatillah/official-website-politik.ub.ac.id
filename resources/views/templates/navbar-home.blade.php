<nav class="navbar navbar-expand-lg w-100 position-fixed d-flex flex-column py-0" style="z-index: 3;">
<div class="w-100 d-block bg-clr1 d-flex justify-content-center">
    <div class="col-11 col-md-10 col-lg-9 col-xl-7 m-0 p-0 py-1 fsz-10 text-clr4 lh-1" id="top-text">

    <div class="marquee">
        <div class="track">
            <div class="content">&nbsp;Program Studi Ilmu Politik, Fakultas Ilmu Sosial dan Ilmu Politik, Universitas Brawijaya ● Political Science Study Program, Faculty of Social and Political Science, Brawijaya University ● Program Studi Ilmu Politik, Fakultas Ilmu Sosial dan Ilmu Politik, Universitas Brawijaya ● Political Science Study Program, Faculty of Social and Political Science, Brawijaya University ● </div>
        </div>
    </div>

    </div>
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
    <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto ms-0 ms-lg-5 mb-2 mb-lg-0">
            <li class="nav-item {{ ($status == 'home') ? 'page-now' : '' }}">
                <a class="nav-link text-clr3 m-0" href="{{ url('') }}">Home</a>
            </li>
            <li class="nav-item dropdown {{ ($status_main == 'profil') ? 'page-now' : '' }}">
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
            <li class="nav-item dropdown {{ ($status_main == 'berita') ? 'page-now' : '' }}">
                <a class="nav-link m-0 text-clr3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Berita <i class="fas fa-chevron-down fsz-10"></i></a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ url('berita') }}">Berita Program Studi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Pengumuman</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Galeri</a></li>
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
    background-color: rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(1px);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}
.page-now {
    border-bottom: 3px solid var(--clr1);
}


.marquee {
  position: relative;
  width: 100vw;
  max-width: 100%;
  height: 12px;
  overflow: hidden;
}
.track {
  position: absolute;
  white-space: nowrap;
  will-change: transform;
  animation: marquee 32s linear infinite;
}
@keyframes marquee {
  from { transform: translateX(0); }
  to { transform: translateX(-50%); }
}

</style>