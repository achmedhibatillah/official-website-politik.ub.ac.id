<div class="">
    <h4 class="lh-1">{{ $data->menu_judul_ID }}</h4>
    <p class="lh-1 text-secondary">{{ $data->menu_judul_EN }}</p>
    @include('templates/session')
    <hr>
    @include('admin/templates-header')
    <hr>
    <div class="mb-3">
        <form action="{{ url('admin-update-menu-konten') }}" method="post">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
            <input type="hidden" name="menu_slug" value="{{ $data->menu_slug }}">
            <input type="hidden" name="redirect" value="{{ $page }}">
            <div class="d-flex mb-2">
                <div id="btnID" class="bg-clr3 text-clr4 px-3 cursor-pointer">@error('menu_isi_ID') <i class="fa-solid fa-circle-exclamation text-clr1"></i> @enderror Konten <i class="lang-id"></i></div>
                <div id="btnEN" class="border-clr3 text-clr3 px-3 cursor-pointer">@error('menu_isi_EN') <i class="fa-solid fa-circle-exclamation text-clr1"></i> @enderror Konten <i class="lang-en"></i></div>
            </div>
            <div class="" id="contID">
                @error('menu_isi_ID')
                    <div class="ms-1 fsz-10 mt-1 text-clr1 mb-2"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea id="menu_isi_ID" name="menu_isi_ID" class="border-clr1">{{ old('menu_isi_ID', $data->menu_isi_ID) }}</textarea>
                <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('menu_isi_ID');
                </script>
            </div>
            <div class="d-none" id="contEN">
                @error('menu_isi_EN')
                    <div class="ms-1 fsz-10 mt-1 text-clr1 mb-2"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea id="menu_isi_EN" name="menu_isi_EN" class="border-clr1">{{ old('menu_isi_EN', $data->menu_isi_EN) }}</textarea>
                <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
                <script>
                    CKEDITOR.replace('menu_isi_EN');
                </script>
            </div>
            <button type="submit" class="border-clr3 text-clr3 bg-success text-clr4 px-3 cursor-pointer mt-2 fsz-10">Simpan Perubahan Konten <i class="fas fa-save"></i></button>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalInfoStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">Tampilan Menu dalam Navbar</h1>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fsz-10">
            <p class="m-0">Bagian ini mengatur bagaimana menu ditampilkan dalam navbar. Terdapat 4 opsi yang dapat dipilih antara lain: biasa, bold, baru/new, dan penting/urgen. Berikut percontohan bagaimana menu akan ditampilkan dalam navbar:</p>
            <div class="mt-2 d-flex justify-content-center align-items-center overflow-hidden border-clr1 wr-80">
                <img src="{{ asset('assets/images/doc/tampilan-navbar-untuk-menu.png') }}" class="w-100">
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
    let fileInput = document.getElementById('menu_gambar');
    let fileNameDisplay = document.getElementById('file-name-display');

    fileInput.addEventListener('change', function(event) {
        let fileName = event.target.files[0] ? event.target.files[0].name : fileNameDisplay.textContent;
        fileNameDisplay.textContent = fileName;
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const btnID = document.getElementById("btnID");
    const btnEN = document.getElementById("btnEN");
    const contID = document.getElementById("contID");
    const contEN = document.getElementById("contEN");

    btnID.addEventListener("click", function () {
        contID.classList.remove("d-none");
        contEN.classList.add("d-none");

        btnID.classList.add("bg-clr3", "text-clr4");
        btnID.classList.remove("border-clr3", "text-clr3");

        btnEN.classList.remove("bg-clr3", "text-clr4");
        btnEN.classList.add("border-clr3", "text-clr3");
    });

    btnEN.addEventListener("click", function () {
        contEN.classList.remove("d-none");
        contID.classList.add("d-none");

        btnEN.classList.add("bg-clr3", "text-clr4");
        btnEN.classList.remove("border-clr3", "text-clr3");

        btnID.classList.remove("bg-clr3", "text-clr4");
        btnID.classList.add("border-clr3", "text-clr3");
    });
});
</script>