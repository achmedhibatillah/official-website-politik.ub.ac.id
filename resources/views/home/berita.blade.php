<div class="">
    <h4>{{ __('header.title.berita-prodi') }}</h4>
    <form action="{{ url('berita') }}">
        <input type="text" class="bg-transparent border-clr3 px-2" name="k" value="{{ $k }}" placeholder="{{ __('berita.cari') }}">
    </form>
</div>

<div class="mt-5">
    @if($berita->isNotEmpty())
        @foreach ($berita as $x)
            <div class="berita-box d-flex m-0 p-0 py-3">
                <div class="d-flex justify-content-center align-items-center overflow-hidden me-3" style="height:50px;aspect-ratio:3/2;">
                    @if($x->berita_gambar !== '' && $x->berita_gambar !== null)
                    <img src="{{ url($x->berita_gambar) }}" class="img-cover">
                    @else
                    <img src="{{ asset('assets/images/static/blank.png') }}" class="img-cover">
                    @endif
                </div>
                <div class="">
                    <h5><a href="{{ url('berita/' . $x->berita_slug) }}" class="text-clr1 td-hover">{{ $x->berita_judul }}</a></h5>
                    <p class="m-0 fsz-10">{{ $x->created_at_tgl }}</p>
                </div>
            </div>
        @endforeach
        <div class="mt-5">
            @include('templates/pagination')
        </div>
    @else
        <p class="m-0 ms-3">{{ __('berita.berita404') }}</p>
    @endif
</div>


