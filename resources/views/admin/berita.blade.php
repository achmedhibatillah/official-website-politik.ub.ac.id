<div class="text-clr3 row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 mt-4 mt-lg-0">
        <h3>Berita</h3>
        @include('templates/session')
        <a href="{{ url('admin-tambah-berita') }}" class="btn btn-outline-clr3 btn-sm">Tambah Berita</a>
        <div class="mt-3">
            @if($berita->isNotEmpty())
                @foreach($berita as $x)
                    <div class="card mb-2 p-1 border-clr3" id="card-{{ $x->berita_id }}">
                        <div class="d-flex align-items-center">
                            <div class="d-flex justify-content-center align-items-center overflow-hidden rounded shadow-l-2 ms-3" style="width:100px;aspect-ratio:3/2;">
                                <img src="{{ url($x->berita_gambar) }}" style="height:100%;width:100%;object-fit:cover;">
                            </div>
                            <div class="ms-3 m-0 my-2">
                                <h5 class="lh-1 m-0 mb-1"><a href="{{ url('admin-berita/' . $x->berita_id) }}" class="text-clr1 td-hover">{{ $x->berita_judul_ID }}</a></h5>
                                <p class="text-secondary lh-1">{{ $x->berita_judul_EN }}</p>
                                <p class="text-secondary m-0 lh-1 font-price fsz-10 fw-light">{{ $x->created_at }}</p>
                            </div>
                            <div class="ms-auto d-flex flex-column me-3">
                                @if($x->berita_status == 1)
                                <a href="{{ url('admin-deactivate-berita/' . $x->berita_id) }}" class="btn btn-outline-success btn-sm text-center fsz-10 d-flex align-items-center"><i class="fas fa-eye"></i></a>
                                @else
                                <a href="{{ url('admin-activate-berita/' . $x->berita_id) }}" class="btn btn-outline-secondary btn-sm text-center fsz-10 d-flex align-items-center"><i class="fas fa-eye-slash"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="m-0">Berita masih kosong.</p>
            @endif
        </div>
    </div>
</div>
