<div class="row m-0 p-0">
    <div class="col-md-5 col-lg-3 col-xl-2 m-0 p-0 bg-clr1 text-clr4 overflow-y-scroll py-3" style="height:100vh;">
        <div class="mx-2">
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center overflow-hidden w-75">
                    <img src="{{ asset('assets/images/static/logo.png') }}" class="w-100 me-3">
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('dashboard-admin') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fas fa-dashboard fsz-10"></i></div>
                    <div class="ms-2 lh-1">Dashboard</div>
                    @if($status == 'dashboard')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-profil') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-school"></i></div>
                    <div class="ms-2 lh-1">Profil Program Studi</div>
                    @if($status == 'profil')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-kurikulum') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fas fa-graduation-cap"></i></div>
                    <div class="ms-2 lh-1">Kurikulum</div>
                    @if($status == 'kurikulum')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-mata-kuliah') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-book"></i></div>
                    <div class="ms-2 lh-1">Mata Kuliah</div>
                    @if($status == 'mata-kuliah')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-dosen') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-user-tie"></i></div>
                    <div class="ms-2 lh-1">Data Dosen</div>
                    @if($status == 'dosen')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-tenaga-pendidik') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-chalkboard-user"></i></div>
                    <div class="ms-2 lh-1">Data Tenaga Pendidik</div>
                    @if($status == 'tenaga-pendidik')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-berita') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-newspaper"></i></div>
                    <div class="ms-2 lh-1">Berita</div>
                    @if($status == 'berita')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-pengumuman') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-newspaper"></i></div>
                    <div class="ms-2 lh-1">Pengumuman</div>
                    @if($status == 'pengumuman')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-menu') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fas fa-wrench"></i></div>
                    <div class="ms-2 lh-1">Atur Menu</div>
                    @if($status == 'menu')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                <a href="{{ url('admin-kuantitas') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fa-solid fa-calculator"></i></div>
                    <div class="ms-2 lh-1">Konten Kuantitas</div>
                    @if($status == 'kuantitas')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-7 col-lg-9 col-xl-10 m-0 p-0 bg-clr4 text-clr3 overflow-y-scroll px-3" style="height:100vh;">
        <div class="d-flex justify-content-center align-items-end text-clr5 gap-3" style="height:8vh;">
            <div class="d-flex justify-content-center align-items-center bg-clr1 he-30 rounded" style="width:95%;">{{ $title }}</div>
            <div class="d-flex justify-content-end align-items-center he-30 rounded" style="width:5%;">
                <div class="cursor-pointer bg-clr1 rounded-circle we-30 square d-flex justify-content-center align-items-center"><i class="fas fa-user"></i></div>
            </div>
        </div>
        <div class="d-flex align-items-center" style="height:8vh;">
            <div class="w-100 rounded bg-clr4 border-clr1 py-1 px-3 text-clr3">
                <a href="{{ url('dashboard-admin') }}" class="text-clr3"><i class="fas fa-home fsz-14"></i></a>
                @if(!empty($page))
                @foreach($page as $x)
                <i class="mx-2">></i>
                <a href="{{ $x['url'] }}" class="td-none text-clr3">{{ $x['name'] }}</a>
                @endforeach
                @endif
            </div>
        </div>
        <div class="overflow-y-scroll border-clr1 bg-clr5 p-3" style="height:80vh;">