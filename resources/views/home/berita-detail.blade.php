<div class="mb-4">
    <h3 class="text-clr1 m-0 mb-2 lh-1 fw-bold text-center">{{ $berita->berita_judul }}</h3>
    <p class="text-center fsz-10 text-secondary">{{ $berita->created_at_tgl }} {{ $berita->created_at_jam }} WIB</p>
</div>
<div class="d-flex justify-content-center">
    <div class="d-flex justify-content-center align-items-center overflow-hidden me-3" style="width:100%;aspect-ratio:10/6;">
        @if($berita->berita_gambar !== '' && $berita->berita_gambar !== null)
            <img src="{{ url($berita->berita_gambar) }}" class="img-cover">
        @else
            <img src="{{ asset('assets/images/static/blank.png') }}" class="img-cover img-death shadow-l">
        @endif
    </div>
</div>
<hr class="my-4">
<div>
    {!! $berita->berita_isi !!}
</div>