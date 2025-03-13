<div class="mb-4">
    <h3 class="text-clr1 m-0 mb-2 lh-1 fw-bold text-center">{{ $menu->menu_judul_ID }}</h3>
</div>
<div class="d-flex justify-content-center">
    @if($menu->menu_gambar !== '' && $menu->menu_gambar !== null)
        <div class="d-flex justify-content-center align-items-center overflow-hidden me-3" style="width:100%;aspect-ratio:10/6;">
            <img src="{{ url($menu->menu_gambar) }}" class="img-cover">
        </div>
    @endif
</div>
<hr class="my-4">
<div>
    {!! $menu->menu_isi_ID !!}
</div>