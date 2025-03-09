<div class="text-clr1 m-0 p-0">
    <h4>Tambah Kurikulum</h4>
    <hr>
    <form action="{{ url('admin-simpan-kurikulum') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="kurikulum_session" value="{{ session('kurikulum_silabus_original') }}">
        <div class="mb-3">
            <label for="kurikulum_judul_ID">Judul <i class="lang-id"></i></label>
            <input name="kurikulum_judul_ID" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="kurikulum_judul_ID"
            value="{{ old('kurikulum_judul_ID') }}">
            @error('kurikulum_judul_ID')
            <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="kurikulum_judul_EN">Judul <i class="lang-en"></i></label>
            <input name="kurikulum_judul_EN" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="kurikulum_judul_EN"
            value="{{ old('kurikulum_judul_EN') }}">
            @error('kurikulum_judul_EN')
            <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <div class="row m-0 p-0">
                <div class="col-6 m-0 p-0 pe-1">
                    <label for="kurikulum_mulai">Waktu dimulai</label>
                    <input name="kurikulum_mulai" type="date" class="w-100 border-clr1 bg-clr5 px-2 he-27" id="kurikulum_mulai"
                    value="{{ old('kurikulum_mulai') }}">
                </div>
                <div class="col-6 m-0 p-0 ps-1 position-relative">
                    <label for="kurikulum_silabus">File silabus (PDF)</label>
                    <input name="kurikulum_silabus" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="kurikulum_silabus" accept="application/pdf">      
                    <div class="w-100 he-27 border-clr1 position-absolute d-flex align-items-center px-2" style="top:19.5px; z-index:0; color:black;">
                        <div class="me-2"><i class="fas fa-folder"></i></div>
                        <div id="file-name-display" class="fsz-10">
                            {{ session('kurikulum_silabus_original', 'pilih file') }}
                        </div> 
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-6 m-0 p-0 pe-1">
                    @error('kurikulum_mulai')
                    <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="col-6 m-0 p-0 ps-1">
                    @error('kurikulum_silabus' && !(session('kurikulum_silabus_temp')))
                    <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="kurikulum_deskripsi_ID">Deskripsi <i class="lang-id"></i></label>
            @error('kurikulum_deskripsi_ID')
            <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
            <textarea id="kurikulum_deskripsi_ID" name="kurikulum_deskripsi_ID" class="border-clr1">{{ old('kurikulum_deskripsi_ID') }}</textarea>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('kurikulum_deskripsi_ID');
            </script>
        </div>
        <div class="mb-3">
            <label for="kurikulum_deskripsi_EN">Deskripsi <i class="lang-en"></i></label>
            @error('kurikulum_deskripsi_EN')
            <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
            <textarea id="kurikulum_deskripsi_EN" name="kurikulum_deskripsi_EN" class="border-clr1">{{ old('kurikulum_deskripsi_EN') }}</textarea>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('kurikulum_deskripsi_EN');
            </script>
        </div>
        <button class="btn btn-outline-clr1 btn-sm mt-2" type="submit">Simpan</button>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let fileInput = document.getElementById('kurikulum_silabus');
        let fileNameDisplay = document.getElementById('file-name-display');

        fileInput.addEventListener('change', function(event) {
            let fileName = event.target.files[0] ? event.target.files[0].name : fileNameDisplay.textContent;
            fileNameDisplay.textContent = fileName;
        });
    });
</script>