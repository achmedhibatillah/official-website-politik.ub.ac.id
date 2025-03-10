<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 col-xl-6 m-0 p-0 py-5">
        <h4 class="fw-bold">{{ $dosen->dosen_nama }}</h4>
        <hr>
        <h5 class="m-0">Fokus Riset Dosen</h5>
        <hr>
        <form action="{{ url('admin-simpan-dosen/step-3') }}" method="post">
            @csrf
            <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
            <?php $i = 1 ?>
            @if($fr->isNotEmpty())
                @foreach($fr as $x)
                    <div class="mb-3 d-flex align-items-center">
                        <input type="checkbox" name="fr_id[]" value="{{ $x->fr_id }}" id="fr_id-{{ $x->fr_id }}" class="cursor-pointer">
                        <label for="fr_id-{{ $x->fr_id }}" class="ms-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFr-{{ $x->fr_id }}" class="m-0 td-hover text-clr1 fw-bold">{{ $x->fr_fr_ID }}</a>
                            <p class="m-0 fsz-10 text-secondary">{{ $x->fr_fr_EN }}</p>
                        </label>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="modalFr-{{ $x->fr_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            <div class="modal-header">
                                <div class="my-2">
                                    <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $x->fr_fr_ID }}</h1>
                                    <p class="m-0 text-secondary lh-1">{{ $x->fr_fr_EN }}</p>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Deskripsi</p>
                                <div class="d-flex">
                                    <div><div class="lang-id me-3"></div></div>
                                    <p class="m-0">{{ $x->fr_deskripsi_ID }}</p>
                                </div>
                                <div class="d-flex mt-3">
                                    <div><div class="lang-en me-3"></div></div>
                                    <p class="m-0">{{ $x->fr_deskripsi_EN }}</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php $i++ ?>
                @endforeach
            @else
                <p class="m-0">Fokus riset masih kosong. <a href="{{ url('admin-fokus-riset') }}" class="td-none">Isi di sini.</a></p>
            @endif
            <input type="hidden" name="relation_length" value="{{ $i }}">
            <hr>
            <button type="submit" class="btn btn-outline-clr3 btn-sm mt-2">Simpan</button>
        </form>
    </div>
</div>