<style>
.side-active { border-left: 5px solid var(--clr1); }
.side-home { border-top: 1px solid rgb(200, 200, 200); line-height: 1.2; }
.border-sec-bottom { border-bottom: 1px solid rgb(200, 200, 200); }
</style>

<div class="row m-0 p-0 justify-content-center text-clr3" style="min-height:100vh;">
    <div class="col-11 col-md-10 col-lg-9 col-xl-7 m-0 p-0">
        <div style="margin:120px 0 80px 0;" class="row p-0">
            <div class="col-md-3 m-0 p-0 pe-3 d-none d-md-flex" style="border-right: 1px solid rgb(200, 200, 200);">
                <div class="m-0 p-0">
                    <div class="border-sec-bottom">
                        <h5 class="lh-1">{{ $title_main }}</h5>
                        <div class="mt-4">
                            <a href="{{ url('berita') }}" class="side-home {{ ($status == 'berita') ? 'side-active' : '' }} bg-clr5 hover fsz-10 p-2 td-none text-clr3 d-block">Berita Program Studi</a>
                            <a href="{{ url('pengumuman') }}" class="side-home {{ ($status == 'pengumuman') ? 'side-active' : '' }} bg-clr5 hover fsz-10 p-2 td-none text-clr3 d-block">Pengumuman</a>
                            <a href="{{ url('kegiatan') }}" class="side-home {{ ($status == 'kegiatan') ? 'side-active' : '' }} bg-clr5 hover fsz-10 p-2 td-none text-clr3 d-block">Kegiatan</a>
                            <a href="{{ url('galeri') }}" class="side-home {{ ($status == 'galeri') ? 'side-active' : '' }} bg-clr5 hover fsz-10 p-2 td-none text-clr3 d-block">Galeri</a>
                        </div>
                    </div>
                    @if(isset($berita_lain))
                        <div class="mt-4">
                            <p class="m-0 mb-3">{{ __('berita.berita-lain') }}</p>
                            @if(isset($berita_lain) && $berita_lain->isNotEmpty())
                                @foreach($berita_lain as $x)
                                    <div class="ms-1 mb-1 row m-0 p-0">
                                        <div class="col-3 m-0 p-0">
                                            <div class="d-flex justify-content-center align-items-center overflow-hidden w-100" style="aspect-ratio:3/2;">
                                                <img src="{{ asset($x->berita_gambar) }}" class="img-cover">
                                            </div>
                                        </div>
                                        <div class="col-9 m-0 p-0 ps-1">
                                            <p class="fsz-10 lh-1">{{ $x->berita_judul }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-9 m-0 p-0 ps-0 ps-md-4">