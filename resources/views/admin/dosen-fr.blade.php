<div class="row m-0 p-0">
    <div class="col-md-4 col-xl-3 m-0 p-0 pe-3">
        <h5>Tambah Fokus Riset</h5>
        <hr>
        <form action="{{ url('admin-simpan-fr') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="fr_fr_ID">Fokus Riset <i class="lang-id"></i></label>
                <input type="text" name="fr_fr_ID" id="fr_fr_ID" autocomplete="off" class="border-clr3 d-block w-100 bg-transparent px-2" placeholder="..." value="{{ old('fr_fr_ID') }}">
                @error('fr_fr_ID')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fr_fr_EN">Fokus Riset <i class="lang-en"></i></label>
                <input type="text" name="fr_fr_EN" id="fr_fr_EN" autocomplete="off" class="border-clr3 d-block w-100 bg-transparent px-2" placeholder="..." value="{{ old('fr_fr_EN') }}">
                @error('fr_fr_EN')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="fr_fr_EN">Deskripsi <i class="lang-id"></i></label>
                @error('fr_deskripsi_ID')
                <div class="ms-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea name="fr_deskripsi_ID" id="fr_deskripsi_ID" autocomplete="off" class="border-clr3 d-block w-100 bg-transparent px-2" placeholder="..." style="height:120px;">{{ old('fr_deskripsi_ID') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="fr_fr_EN">Deskripsi <i class="lang-en"></i></label>
                @error('fr_deskripsi_EN')
                <div class="ms-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea name="fr_deskripsi_EN" id="fr_deskripsi_EN" autocomplete="off" class="border-clr3 d-block w-100 bg-transparent px-2" placeholder="..." style="height:120px;">{{ old('fr_deskripsi_EN') }}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-clr3 mt-3 btn-sm">Simpan</button>
        </form>
    </div>
    <div class="col-md-8 col-lg-8 m-0 p-0">
        @include('templates/session')
        @if($fr->isNotEmpty())
        @foreach($fr as $x)
        <div class="card m-0 p-3 bg-transparent border-clr3 my-3 mx-4">
            <div class="d-flex align-items-center">
                <i class="fas fa-lightbulb text-warning fsz-22 me-4"></i>
                <div class="">
                    <h5 class="m-0">{{ $x->fr_fr_ID }}</h5>
                    <p class="m-0 text-secondary">{{ $x->fr_fr_EN }}</p>
                </div>
                <div class="btn btn-success ms-auto" data-bs-toggle="modal" data-bs-target="#modalFr-{{ $x->fr_id }}">lihat</div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade text-clr3" id="modalFr-{{ $x->fr_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                    <a href="{{ url('admin-hapus-fr/' . $x->fr_id) }}" class="btn btn-danger">Hapus</a>
                </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <p class="m-0">Fokus riset kosong.</p>
        @endif
    </div>
</div>