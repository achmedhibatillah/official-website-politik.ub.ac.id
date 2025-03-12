<div class="">
    <h4>{{ __('header.title.pengumuman') }}</h4>
    <form action="{{ url('pengumuman') }}">
        <input type="text" class="bg-transparent border-clr3 px-2" name="k" value="{{ $k }}" placeholder="{{ __('berita.cari') }}">
    </form>
</div>

<div class="mt-5">
    @if($pengumuman->isNotEmpty())
        @foreach ($pengumuman as $x)
            <div class="berita-box d-flex m-0 p-0 py-3">
                <div class="">
                    <h5><a href="{{ url('pengumuman/' . $x->pengumuman_slug) }}" class="text-clr1 td-hover">{{ $x->pengumuman_judul }}</a></h5>
                    <p class="m-0 fsz-10">{{ $x->created_at_tgl }} {{ $x->created_at_jam }} WIB</p>
                </div>
            </div>
        @endforeach
        <div class="berita-box"></div>
        <div class="mt-5">
            @include('templates/pagination', ['xxx' => $pengumuman])
        </div>
    @else
        <p class="m-0 ms-3">{{ __('berita.pengumuman404') }}</p>
    @endif
</div>


