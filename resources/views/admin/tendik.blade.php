<div class="text-clr3 row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 mt-4 mt-lg-0">
        <h3>Daftar Tenaga Pendidik</h3>
        @include('templates/session')
        <a href="{{ url('admin-tambah-tendik') }}" class="btn btn-outline-clr3 btn-sm">Tambah Tenaga Pendidik</a>
        <div class="mt-2">
            <div class="row m-0 p-0">
                @if($tendik->isNotEmpty())
                    @foreach($tendik as $x)
                        <div class="col-md-6 col-lg-4 col-xl-3 m-0 p-0">
                            <div class="card m-1 p-3 border-clr3">
                                <div class="d-flex w-100 align-items-center">
                                    <div class="d-flex justify-content-center align-items-center overflow-hidden rounded shadow-m-2 bg-clr4" style="width:60px;aspect-ratio:3/4;">
                                        <img src="{{ asset($x->tendik_foto) }}" style="width:100%;height:100%;object-fit:cover;">
                                    </div>
                                    <div class="ms-3">
                                        <p class="m-0 mb-1 lh-1">{{ $x->tendik_nama }}</p>
                                        <p class="m-0 lh-1 fsz-10 text-secondary">Slug: {{ $x->tendik_slug }}</p>
                                        <a href="#" class="td-hover text-clr1 fsz-10" data-bs-toggle="modal" data-bs-target="#modalFoto-{{ $x->tendik_id }}">Lihat foto</a>
                                    </div>
                                    <div class="d-flex flex-column ms-auto">
                                        <a href="{{ url('admin-edit-tendik/' . $x->tendik_id) }}" class="btn btn-warning btn-sm we-30"><i class="fas fa-pencil"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $x->tendik_id }}" class="btn btn-danger btn-sm we-30 mt-2"><i class="fas fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalFoto-{{ $x->tendik_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <div class="my-2">
                                        <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $x->tendik_nama }}</h1>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="w-100 d-flex justify-content-center align-items-center overflow-hidden bg-clr4" style="aspect-ratio:3/4;">
                                        <img src="{{ asset($x->tendik_foto) }}" style="height:100%;width:100%;object-fit:cover;">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete-{{ $x->tendik_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <div class="my-2">
                                        <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $x->tendik_nama }}</h1>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="m-0">Apakah Anda yakin ingin menghapus data tenaga pendidikan ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{ url('admin-hapus-tendik/' . $x->tendik_id) }}" class="btn btn-danger">Hapus</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
            </div>
            <p class="m-0">Data tenaga pendidik belum ada.</p>
            @endif
        </div>
    </div>
</div>