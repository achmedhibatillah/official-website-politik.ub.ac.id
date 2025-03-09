<div class="row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 text-clr1 mt-4 mt-lg-0">
        <h3>Daftar Kurikulum</h3>
        @include('templates/session')
        <a href="{{ url('admin-tambah-kurikulum') }}" class="btn btn-outline-clr1 btn-sm">Tambah Kurikulum</a>
        @if($kurikulum->isNotEmpty())
        <div class="mt-3">
            @foreach($kurikulum as $x)
            <div class="card m-0 mb-2 p-3">
                <div class="w-100 row m-0 p-0">
                    <div class="col-3 col-lg-2 m-0 p-0 d-flex justify-content-center align-items-center">
                        @if($x->kurikulum_status == 1)
                        <form action="{{ url('admin-activate-kurikulum') }}" method="post" class="d-flex flex-column justify-content-center">
                            @csrf
                            <input type="hidden" name="kurikulum_id" value="{{ $x->kurikulum_id }}">
                            <input type="hidden" name="kurikulum_status" value="0">
                            <button type="submit" class="btn"><i class="fa-solid fa-toggle-on fsz-18 text-success"></i></button>
                            <p class="m-0 fsz-10 text-center text-success">Berlaku</p>
                        </form>
                        @else
                        <form action="{{ url('admin-activate-kurikulum') }}" method="post" class="d-flex flex-column justify-content-center">
                            @csrf
                            <input type="hidden" name="kurikulum_id" value="{{ $x->kurikulum_id }}">
                            <input type="hidden" name="kurikulum_status" value="1">
                            <button type="submit" class="btn"><i class="fa-solid fa-toggle-off fsz-18 text-secondary"></i></button>
                            <p class="m-0 fsz-10 text-center text-secondary">Tidak berlaku</p>
                        </form>
                        @endif
                    </div>
                    <div class="col-6 col-lg-8 m-0 p-0 d-flex align-items-center">
                        <div class="">
                            <h4 class="m-0 fw-bold">{{ $x->kurikulum_judul_ID }}</h4>
                            <p class="m-0">{{ $x->kurikulum_judul_EN }}</p>
                            <h5 class="m-0">{{ $x->kurikulum_mulai }}</h5>
                        </div>
                    </div>
                    <div class="col-3 col-lg-2 m-0 p-2 d-flex flex-column">
                        <a href="{{ url('admin-kurikulum/' . $x->kurikulum_id) }}" class="btn btn-sm btn-clr1 d-flex justify-content-start align-items-center lh-1 text-start mb-2 rounded"><i class="fas fa-eye we-22"></i> <div class="lh-1">lihat detail</div></a>
                        @if($x->kurikulum_silabus !== '')
                        <a href="{{ url($x->kurikulum_silabus) }}" target="_blank" class="btn btn-sm btn-clr1 d-flex justify-content-start align-items-center lh-1 text-start rounded"><i class="fas fa-file-pdf we-22"></i> <div class="lh-1">lihat silabus</div></a>
                        @else
                        <a href="#" target="_blank" class="btn btn-sm btn-secondary d-flex justify-content-start align-items-center lh-1 text-start rounded"><i class="fas fa-file-pdf we-22"></i> <div class="lh-1">silabus kosong</div></a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p class="m-0">Data kurikulum belum ada.</p>
        @endif
    </div>
</div>

<script>
document.getElementById('showBtn').addEventListener('click', function() {
    document.getElementById('showCard').classList.toggle('d-none');
});

</script>