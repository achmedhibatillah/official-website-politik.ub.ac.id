<div class="text-clr3 m-0 p-0">
    <h4>Tambah Tenaga Pendidik</h4>
    <hr>
    <form action="{{ url('admin-simpan-tendik') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tendik_session" value="{{ session('tendik_foto_original') }}">
        <div class="mb-3">
            <label for="tendik_nama">Nama</label>
            <input name="tendik_nama" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="tendik_nama" autocomplete="off"
            value="{{ old('tendik_nama') }}">
            @error('tendik_nama')
            <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 position-relative">
            <label for="tendik_foto">Foto Tenaga Pendidik (PNG/JPG/JPEG)</label>
            <input name="tendik_foto" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="tendik_foto" accept="image/png, image/jpeg, image/jpg">      
            <div class="w-100 he-27 border-clr3 position-absolute d-flex align-items-center px-2" style="top:19.5px; z-index:0; color:black;">
                <div class="me-2"><i class="fas fa-folder"></i></div>
                <div id="file-name-display" class="fsz-10">
                    {{ session('tendik_foto_original', 'pilih file') }}
                </div>  
            </div>
        </div>
        <button type="submit" class="btn btn-outline-clr3 btn-sm">Simpan</button>
    </form>
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