    <div class="">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-school fsz-14 me-2"></i>
            <h5 class="m-0 mt-1 fw-bold">Profil</h5>
        </div>
        <hr>
        <p>Menu Default :</p>
        <div class="mt-3 gap-2">        
        @foreach($kategori->menu as $x)
            @if($x->menu_as == 0 || $x->menu_as == 1)
                <a href="{{ url('admin-' . $x->menu_slug) }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">{{ $x->menu_judul_ID }}</a>
            @endif
        @endforeach
        </div>
        <hr>
        <p>Menu Default :</p>
        <div class="mt-3 gap-2">
            <a href="{{ url('admin-edit-menu-1') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Sejarah</a>
            <a href="{{ url('admin-visi-misi-tujuan-kompetensi') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Visi, Misi, & Tujuan Kompetensi</a>
            <a href="{{ url('admin-visi-keilmuan') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Visi Keilmuan</a>
            <a href="{{ url('admin-struktur-organisasi') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Struktur Organisasi</a>
            <a href="{{ url('admin-renstra-proker') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Rencana Strategis dan Program Kerja</a>
            <a href="{{ url('admin-dosen') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Dosen</a>
            <a href="{{ url('admin-tenaga-pendidik') }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">Tenaga Pendidik</a>
        </div>
        <hr>
        <p>Menu Ditambahkan :</p>
        <div class="mt-3 gap-2">
            <p class="m-0 text-secondary ms-2">Menu tambahan belum tersedia.</p>
        </div>
    </div>
