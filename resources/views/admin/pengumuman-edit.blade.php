<form action="{{ url('admin-update-pengumuman') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="pengumuman_id" value="{{ $pengumuman->pengumuman_id }}">
    <input type="hidden" name="pengumuman_session" value="{{ session('pengumuman_gambar_original') }}">
    <div class="d-flex justify-content-center align-items-center w-100 text-clr3" style="height:100%;">
        <div class="w-100">
            <div class="d-flex">
                <div class="bg-clr3 text-clr4 border-clr3 cursor-pointer d-flex justify-content-center align-items-center fsz-10 text-center" style="width:100px;" id="btnPengumumanHeader">Header</div>
                <div class="border-clr3 cursor-pointer d-flex justify-content-center align-items-center fsz-10 text-center" style="width:100px;" id="btnPengumumanIsiID">
                    @error('pengumuman_isi_ID')
                    <i class="me-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i></i>
                    @enderror
                    Isi <i class="lang-id-sm ms-1"></i>
                </div>
                <div class="border-clr3 cursor-pointer d-flex justify-content-center align-items-center fsz-10 text-center" style="width:100px;" id="btnPengumumanIsiEN">
                    @error('pengumuman_isi_EN')
                    <i class="me-1 fsz-10 mt-0 text-clr1"><i class="fa-solid fa-circle-exclamation"></i></i>
                    @enderror
                    Isi <i class="lang-en-sm ms-1"></i>
                </div>
                <button type="submit" class="btn-outline-clr3 d-flex justify-content-center align-items-center fsz-10 cursor-pointer text-center" style="width:100px;">Simpan <i class="fas fa-save ms-2"></i></button>
            </div>

            <!-- Pengumuman Header -->
            <div class="border-clr3 p-3 overflow-y-scroll" style="height:70vh;" id="PengumumanHeader">
                <div class="col-md-10 col-lg-8 col-xl-6 m-0 p-0">
                    <div class="mb-3">
                        <label for="pengumuman_judul_ID">Judul <i class="lang-id"></i></label>
                        <input name="pengumuman_judul_ID" id="pengumuman_judul_ID" type="text" class="border-clr3 bg-transparent w-100 px-2" placeholder="..." autocomplete="off"
                        value="{{ old('pengumuman_judul_ID', $pengumuman->pengumuman_judul_ID) }}">
                        @error('pengumuman_judul_ID')
                        <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pengumuman_judul_EN">Judul <i class="lang-en"></i></label>
                        <input name="pengumuman_judul_EN" id="pengumuman_judul_EN" type="text" class="border-clr3 bg-transparent w-100 px-2" placeholder="..." autocomplete="off"
                        value="{{ old('pengumuman_judul_EN', $pengumuman->pengumuman_judul_EN) }}">
                        @error('pengumuman_judul_EN')
                        <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pengumuman_slug">Slug</label>
                        <input name="pengumuman_slug" id="pengumuman_slug" onkeypress="return event.key != ' '" type="text" class="border-clr3 bg-transparent w-100 px-2" placeholder="..." autocomplete="off"
                        value="{{ old('pengumuman_slug', $pengumuman->pengumuman_slug) }}">
                        @error('pengumuman_slug')
                        <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="pengumuman_gambar">Gambar Pengumuman (PNG/JPG/JPEG)</label>
                        <input name="pengumuman_gambar" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="pengumuman_gambar" accept="image/png, image/jpeg, image/jpg">   
                        <p class="m-0 fsz-10">Disarankan skala 3/2</p>   
                        <div class="w-100 he-27 border-clr3 position-absolute d-flex align-items-center px-2" style="top:19.5px; z-index:0; color:black;">
                            <div class="me-2"><i class="fas fa-folder"></i></div>
                            <div id="file-name-display" class="fsz-10">
                                {{ session('pengumuman_gambar_original', 'pilih file') }}
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pengumuman Isi ID -->
            <div class="d-none border-clr3 p-3 overflow-y-scroll" style="height:70vh;" id="PengumumanIsiID">
                <h5>Konten Pengumuman (Bahasa Indonesia)</h5>
                @error('pengumuman_isi_ID')
                <div class="ms-1 fsz-10 mt-0 mb-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <div>
                    <textarea name="pengumuman_isi_ID" class="border-clr1 m-0">{{ old('pengumuman_isi_ID', $pengumuman->pengumuman_isi_ID) }}</textarea>
                    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('pengumuman_isi_ID');
                    </script>
                </div>
            </div>
            <!-- Pengumuman Isi EN -->
            <div class="d-none border-clr3 p-3 overflow-y-scroll" style="height:70vh;" id="PengumumanIsiEN">
                <h5>Konten Pengumuman (Bahasa Inggris)</h5>
                @error('pengumuman_isi_EN')
                <div class="ms-1 fsz-10 mt-0 mb-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <div>
                    <textarea name="pengumuman_isi_EN" class="border-clr1 m-0">{{ old('pengumuman_isi_EN', $pengumuman->pengumuman_isi_EN) }}</textarea>
                    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                    <script>
                        CKEDITOR.replace('pengumuman_isi_EN');
                    </script>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let fileInput = document.getElementById('pengumuman_gambar');
    let fileNameDisplay = document.getElementById('file-name-display');

    fileInput.addEventListener('change', function(event) {
        let fileName = event.target.files[0] ? event.target.files[0].name : fileNameDisplay.textContent;
        fileNameDisplay.textContent = fileName;
    });
});
document.addEventListener("DOMContentLoaded", function () {
const buttons = [
    { btn: "btnPengumumanHeader", content: "PengumumanHeader" },
    { btn: "btnPengumumanIsiID", content: "PengumumanIsiID" },
    { btn: "btnPengumumanIsiEN", content: "PengumumanIsiEN" }
];

buttons.forEach(({ btn, content }) => {
    document.getElementById(btn).addEventListener("click", function () {
        buttons.forEach(({ btn, content }) => {
            document.getElementById(content).classList.add("d-none");
            document.getElementById(btn).classList.remove("bg-clr3", "text-clr4");
        });

        document.getElementById(content).classList.remove("d-none");
        document.getElementById(btn).classList.add("bg-clr3", "text-clr4");
    });
});
});

document.addEventListener("DOMContentLoaded", function () {
    const titleInput = document.getElementById("pengumuman_judul_ID");
    const slugInput = document.getElementById("pengumuman_slug");

    titleInput.addEventListener("input", function () {
        let slug = titleInput.value
            .toLowerCase()
            .trim()
            .replace(/[^a-z0-9\s-]/g, "")
            .replace(/\s+/g, "-");

        slugInput.value = slug;
    });
});
</script>
