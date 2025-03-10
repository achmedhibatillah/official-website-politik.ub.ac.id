<form action="{{ url('admin-update-dosen') }}" method="post" enctype="multipart/form-data" class="my-4">
    @csrf
    <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
    <input type="hidden" name="dosen_session" value="{{ session('dosen_foto_original') }}">
    <div class="mb-3 row m-0 p-0">
        <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
            <label for="dosen_nama">Nama Lengkap</label>
            <input name="dosen_nama" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_nama" autocapitalize="words" autocomplete="off"
            value="{{ old('dosen_nama', $dosen->dosen_nama) }}">
        </div>
        <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
            <label for="dosen_email">Alamat Email (UB)</label>
            <input name="dosen_email" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_email" autocomplete="off"
            value="{{ old('dosen_email', $dosen->dosen_email) }}">
        </div>
        <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
            @error('dosen_nama')
            <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
            @error('dosen_email')
            <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <label for="dosen_nomor">NIP.</label>
        <input name="dosen_nomor" type="number" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="dosen_nomor" autocomplete="off"
        value="{{ old('dosen_nomor', $dosen->dosen_nomor) }}">
        @error('dosen_nomor')
        <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="dosen_deskripsi_ID">Deskripsi <i class="lang-id"></i></label>
        @error('dosen_deskripsi_ID')
        <div class="ms-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
        @enderror
        <textarea name="dosen_deskripsi_ID" type="text" class="w-100 border-clr3 bg-clr5 px-2 m-0" style="height:100px;" placeholder="..." id="dosen_deskripsi_ID">{{ old('dosen_deskripsi_ID', $dosen->dosen_deskripsi_ID) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="dosen_deskripsi_EN">Deskripsi <i class="lang-en"></i></label>
        @error('dosen_deskripsi_EN')
        <div class="ms-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
        @enderror
        <textarea name="dosen_deskripsi_EN" type="text" class="w-100 border-clr3 bg-clr5 px-2 m-0" style="height:100px;" placeholder="..." id="dosen_deskripsi_EN">{{ old('dosen_deskripsi_EN', $dosen->dosen_deskripsi_EN) }}</textarea>
    </div>
    <div class="mb-3 position-relative">
        <label for="dosen_foto">
            <p class="m-0 lh-1">Foto Dosen (PNG/JPG/JPEG)</p>
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto" class="fsz-11 td-hover text-clr1">LIhat foto sebelumnya.</a>
        </label>
        <input name="dosen_foto" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="dosen_foto" accept="image/png, image/jpeg, image/jpg">      
        <div class="w-100 he-27 border-clr3 position-absolute d-flex align-items-center px-2" style="top:35.5px; z-index:0; color:black;">
            <div class="me-2"><i class="fas fa-folder"></i></div>
            <div id="file-name-display" class="fsz-10">
                {{ session('dosen_foto_original', 'pilih file') }}
            </div>  
        </div>
    </div>
    <button class="btn btn-outline-clr3 btn-sm mt-2" type="submit">Simpan</button>
</form>

<!-- Modal -->
<div class="modal fade" id="modalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $dosen->dosen_nama }}</h1>
                <p class="m-0 text-secondary lh-1">{{ $dosen->dosen_nomor }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="w-100 d-flex justify-content-center align-items-center overflow-hidden bg-clr4" style="aspect-ratio:3/4;">
                <img src="{{ asset($dosen->dosen_foto) }}" style="height:100%;width:100%;object-fit:cover;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let fileInput = document.getElementById('dosen_foto');
        let fileNameDisplay = document.getElementById('file-name-display');

        fileInput.addEventListener('change', function(event) {
            let fileName = event.target.files[0] ? event.target.files[0].name : fileNameDisplay.textContent;
            fileNameDisplay.textContent = fileName;
        });
    });
</script>