<nav class="navbar navbar-expand-lg w-100 position-fixed d-flex flex-column py-0" style="z-index: 3;">
<div class="w-100 d-block bg-clr1 d-flex justify-content-center" style="z-index:2;">
    <div class="col-11 col-md-10 col-lg-9 col-xl-7 m-0 p-0 py-1 fsz-10 text-clr4 lh-1" id="top-text" style="max-width: 1250px;">

    <div class="marquee">
        <div class="track">
            <div class="content">&nbsp;Program Studi Ilmu Politik, Fakultas Ilmu Sosial dan Ilmu Politik, Universitas Brawijaya ● Political Science Study Program, Faculty of Social and Political Science, Brawijaya University ● Program Studi Ilmu Politik, Fakultas Ilmu Sosial dan Ilmu Politik, Universitas Brawijaya ● Political Science Study Program, Faculty of Social and Political Science, Brawijaya University ● </div>
        </div>
    </div>

    </div>
</div>
<div class="container-fluid d-flex flex-column py-2 col-11 col-md-10 col-lg-9 col-xl-7 p-0" style="max-width: 1250px;z-index:1;">
    <div class="d-flex w-100 mb-0 mb-md-2" id="navbar-side-top">
        <a class="navbar-brand m-0 p-0 me-auto" href="{{ url('') }}">
            <div class="d-flex justify-content-center align-items-center overflow-hidden bg-clr1 shadow-l-2" style="width:120px;">
                <img src="{{ asset('assets/images/static/logo.png') }}" class="w-100">
            </div>
        </a>
        <div class="d-none d-lg-flex align-items-end">
            <div class="d-flex flex-column">
            <label for="" class="fsz-8 text-clr1 m-0">Cari sesuatu</label>
            <input type="text" autocomplete="off" class="rounded border-clr1 bg-transparent he-22 px-2" placeholder="...">
            </div>
            <button class="btn btn-transparent text-clr3 fsz-10 m-0 p-0 ps-2"><i class="fas fa-search text-clr1"></i></button>
        </div>
        <div class="m-0 p-0 ms-0 ms-md-3 me-3 me-lg-0 d-flex align-items-center align-items-lg-end {{ ($status == 'kontak') ? 'page-now' : '' }}">
            <a class="px-2 text-clr3 m-0 text-clr4 fw-bold btn btn-clr1 btn-sm p-0 fsz-10 he-24 d-flex align-items-center gap-1" href="{{ url('') }}">Login<i class="fa-solid fa-right-to-bracket"></i></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse fsz-10 w-100" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex flex-wrap w-100 me-auto mt-3 mt-lg-1 ms-0 mb-2 mb-lg-0">
            <li class="nav-item mb-2 mb-lg-0 position-relative">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="{{ url('') }}"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-home"></i></div>Home</a>
                {!! ($status == 'home') ? '<div class="page-now d-none d-lg-flex"></div>' : '' !!}
            </li>
            <li class="nav-item mb-2 mb-lg-0 dropdown">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-school"></i></div>Profil<i class="fas fa-chevron-down fsz-6"></i></a>
                <ul class="dropdown-menu border-radius-none fsz-10">
                    <li><a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi, Misi, dan Tujuan Kompetensi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi Keilmuan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Renstra & Proker</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Dosen</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Tenaga Pendidik</a></li>
                </ul>
            </li>
            <li class="nav-item mb-2 mb-lg-0 dropdown">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-user-tie"></i></div>Kemahasiswaan & Alumni<i class="fas fa-chevron-down fsz-6"></i></a>
                <ul class="dropdown-menu border-radius-none fsz-10">
                    <li><a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi, Misi, dan Tujuan Kompetensi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi Keilmuan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Renstra & Proker</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Dosen</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Tenaga Pendidik</a></li>
                </ul>
            </li>
            <li class="nav-item mb-2 mb-lg-0 dropdown">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-atom"></i></div>Penelitian & Pengabdian<i class="fas fa-chevron-down fsz-6"></i></a>
                <ul class="dropdown-menu border-radius-none fsz-10">
                    <li><a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi, Misi, dan Tujuan Kompetensi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi Keilmuan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Renstra & Proker</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Dosen</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Tenaga Pendidik</a></li>
                </ul>
            </li>
            <li class="nav-item mb-2 mb-lg-0 dropdown">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-medal"></i></div>Jaminan Mutu<i class="fas fa-chevron-down fsz-6"></i></a>
                <ul class="dropdown-menu border-radius-none fsz-10">
                    <li><a class="dropdown-item" href="{{ url('sejarah') }}">Sejarah</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi, Misi, dan Tujuan Kompetensi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Visi Keilmuan</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Struktur Organisasi</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Renstra & Proker</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Dosen</a></li>
                    <li><a class="dropdown-item" href="{{ url('') }}">Tenaga Pendidik</a></li>
                </ul>
            </li>
            <li class="nav-item mb-2 mb-lg-0 dropdown">
                <a class="nav-link py-1 px-2 m-0 text-clr3 d-flex align-items-center gap-1 lh-1 h-100" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><div class="fsz-7 m-0 p-0"><i class="fas text-clr1 fa-newspaper"></i></div>Informasi<i class="fas fa-chevron-down fsz-6"></i></a>
                <ul class="dropdown-menu border-radius-none fsz-10">
                    <li><a class="dropdown-item" href="{{ url('berita') }}">Berita Program Studi</a></li>
                    <li><a class="dropdown-item" href="{{ url('pengumuman') }}">Pengumuman</a></li>
                    <li><a class="dropdown-item" href="{{ url('kegiatan') }}">Kegiatan</a></li>
                    <li><a class="dropdown-item" href="{{ url('galeri') }}">Galeri</a></li>
                </ul>
                {!! ($status_main == 'informasi') ? '<div class="page-now d-none d-lg-flex"></div>' : '' !!}
            </li>
        </ul>
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
.page-now { position: absolute; bottom: -5px; left: 50%; transform: translate(-48%, -50%); width: 100%; border-bottom: 2px solid var(--clr1); }

.dropdown-menu {
    max-width: 300px; /* Sesuaikan dengan kebutuhan */
}

.dropdown-item {
    white-space: normal !important;
    word-wrap: break-word;
    overflow-wrap: break-word;
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
#navbar-side-top { transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out; }
.sinking { transform: translateY(-100%); opacity: 0;}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let navbar = document.getElementById("navbar-side-top");
    let mediaQuery = window.matchMedia("(min-width: 768px)");

    function toggleNavbar() {
        if (!mediaQuery.matches) {
            navbar.classList.remove("sinking", "d-none");
            navbar.classList.add("d-flex");
            return;
        }

        if (window.scrollY > 200) {
            if (!navbar.classList.contains("sinking")) {
                navbar.classList.add("sinking");
                setTimeout(() => {
                    navbar.classList.remove("d-flex");
                    navbar.classList.add("d-none");
                }, 300);
            }
        } else {
            navbar.classList.remove("d-none");
            setTimeout(() => {
                navbar.classList.remove("sinking");
                navbar.classList.add("d-flex");
            }, 10);
        }
    }

    window.addEventListener("scroll", toggleNavbar);
    window.addEventListener("resize", toggleNavbar);
});
</script>


