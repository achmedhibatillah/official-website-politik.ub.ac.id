<div class="text-clr3 m-0 p-0">
    <h4>Edit Tenaga Pendidik</h4>
    <hr>
    <form action="{{ url('admin-update-tendik') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tendik_id" value="{{ $tendik->tendik_id }}">
        <input type="hidden" name="tendik_session" value="{{ session('tendik_foto_original') }}">
        <div class="mb-3">
            <label for="tendik_nama">Nama</label>
            <input name="tendik_nama" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="tendik_nama" autocomplete="off"
            value="{{ old('tendik_nama', $tendik->tendik_nama) }}">
            @error('tendik_nama')
            <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 position-relative">
            <label for="tendik_foto">
                <p class="m-0 lh-1">Foto Tenaga Pendidik (PNG/JPG/JPEG)</p>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalFoto" class="fsz-11 td-hover text-clr1">LIhat foto sebelumnya.</a>
            </label>
            <input name="tendik_foto" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="tendik_foto" accept="image/png, image/jpeg, image/jpg">      
            <div class="w-100 he-27 border-clr3 position-absolute d-flex align-items-center px-2" style="top:35.5px; z-index:0; color:black;">
                <div class="me-2"><i class="fas fa-folder"></i></div>
                <div id="file-name-display" class="fsz-10">
                    {{ session('tendik_foto_original', 'pilih file') }}
                </div>  
            </div>
        </div>
        <button type="submit" class="btn btn-outline-clr3 btn-sm">Simpan</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $tendik->tendik_nama }}</h1>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="w-100 d-flex justify-content-center align-items-center overflow-hidden bg-clr4" style="aspect-ratio:3/4;">
                <img src="{{ asset($tendik->tendik_foto) }}" style="height:100%;width:100%;object-fit:cover;">
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
        let fileInput = document.getElementById('tendik_foto');
        let fileNameDisplay = document.getElementById('file-name-display');

        fileInput.addEventListener('change', function(event) {
            let fileName = event.target.files[0] ? event.target.files[0].name : fileNameDisplay.textContent;
            fileNameDisplay.textContent = fileName;
        });
    });
</script>