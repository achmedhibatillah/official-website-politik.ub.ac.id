<div class="">
        <div class="d-flex align-items-center">
        <div class="m-0 p-0 fsz-22">{!! $kategori->kategori_icon !!}</div>
            <div class="ms-3">
                <h5 class="m-0 mt-1 fw-bold">{{ $kategori->kategori_judul_ID }}</h5>
                <p class="m-0 fw-bold text-secondary">{{ $kategori->kategori_judul_EN }}</p>
            </div>
        </div>
        <hr>
        <p>Menu Default :</p>
        <div class="mt-3 gap-2">        
        @if($menu->menu->isNotEmpty())
            @foreach($menu->menu as $x)
                @if($x->menu_as == 0 || $x->menu_as == 1)
                    <a href="{{ ($x->menu_as == 1) ? url('admin-dependen-' . $x->menu_slug) : url('admin-' . $x->menu_slug) }}" class="btn btn-outline-clr3 td-none px-3 text-clr3 mb-1">{{ $x->menu_judul_ID }}</a>
                @endif
            @endforeach
        @else
            <p class="m-0 text-secondary ms-2">Menu default belum tersedia.</p>
        @endif
        </div>
        <hr>
        <p>Menu Ditambahkan :</p>
        <div class="mt-3 gap-2">
            <p class="m-0 text-secondary ms-2">Menu tambahan belum tersedia.</p>
        </div>
    </div>
