<div class="row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 text-clr1 mt-4 mt-lg-0">
        <h3>Daftar Dosen</h3>
        @include('templates/session')
        <a href="{{ url('admin-tambah-dosen') }}" class="btn btn-outline-clr1 btn-sm m-1">Tambah Dosen</a>
        <a href="{{ url('admin-fokus-riset') }}" class="btn btn-outline-clr1 btn-sm m-1">Fokus Riset Dosen</a>
        @if($dosen->isNotEmpty())
            <div class="row m-0 p-0 mt-3">
                @foreach($dosen as $x)
                    <div class="col-md-6 col-lg-4 m-0 p-0">
                        <div class="card m-1 p-3 border-clr3">
                            <div class="d-flex w-100">
                                <div class="overflow-hidden d-flex justify-content-center align-items-center bg-clr4 rounded shadow-m-2" style="width:50px;aspect-ratio:3/4;">
                                    <img src="{{ asset($x->dosen_foto) }}" style="height:100%;width:100%;object-fit:cover;">
                                </div>
                                <div class="ms-3">
                                    <p class="m-0 lh-1 mb-1"><a href="{{ url('admin-dosen/' . $x->dosen_id) }}" class="m-0 td-hover text-clr1 fw-bold lh-s">{{ $x->dosen_nama }}</a></p>
                                    <p class="m-0 text-secondary fsz-11">{{ $x->dosen_nomor }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
        <p class="m-0">Data dosen belum ada.</p>
        @endif
    </div>
</div>