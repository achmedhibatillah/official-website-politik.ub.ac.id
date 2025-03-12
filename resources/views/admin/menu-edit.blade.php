<div class="">
    <h4 class="lh-1">{{ $data->menu_judul_ID }}</h4>
    <p class="lh-1 text-secondary">{{ $data->menu_judul_EN }}</p>
    @include('templates/session')
    <hr>
    <div class="row m-0 p-0">
        <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
            @foreach($data->kategori as $x)
            <?php $kategori_id = $x->kategori_id; ?>
                <div class="d-flex">
                    <p class="lh-1 m-0">Kategori :</p>
                    <div class="ms-3">
                        <p class="lh-1 m-0">{{$x->kategori_judul_ID}}</p>
                        <p class="lh-1 m-0 text-secondary">{{$x->kategori_judul_EN}}</p>
                    </div>
                </div>
            @endforeach
            <div class="d-flex mt-2">
                <p class="lh-1 m-0">Url :</p>
                <div class="ms-3">
                <div class="border-clr3 px-2 he-20 d-flex align-items-center">
                    <p class="lh-1 m-0 fsz-11">https://politik.ub.ac.id/{{$data->menu_slug}}</p>
                </div>
                <a href="{{ url($data->menu_slug) }}" class="text-clr1 td-hover fsz-10 ms-2" target="_blank">Lihat halaman <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                @if($data->menu_as !== 1)
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditSlug"  class="text-clr1 td-hover fsz-10 ms-2">Edit slug <i class="fas fa-pencil fsz-8 mb-1"></i></a>
                @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 row m-0 p-0 ps-0 ps-md-1">
            <div class="">
                <p class="fsz-10 m-0">Urutan: {{ $data->menu_urutan }}/{{ $data->menu_urutan }}</p>
                <p class="fsz-8 m-0"><a href="{{ url('admin-urutan-menu/' . $kategori_id) }}" class="td-hover text-clr1">Ubah urutan menu <i class="fas fa-pencil fsz-6"></i></a></p>
            </div>
            <div class="">
                <p class="fsz-10 m-0 mt-2">Tampilan menu dalam navbar : 
                    @if($data->menu_status == 0) Biasa
                    @elseif($data->menu_status == 1) Bold
                    @elseif($data->menu_status == 2) Baru/New
                    @elseif($data->menu_status == 3) Penting/Urgent
                    @endif
                    <i class="fas fa-info-circle text-secondary cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalInfoStatus"></i>
                </p>
                <form action="{{ url('admin-update-menu-status') }}" method="post">
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
                    <input type="hidden" name="redirect" value="{{ $page }}">
                    <div class="row m-0 p-0">
                        <div class="col-8 m-0 p-0 pe-1 d-flex align-items-center">
                            <select class="form-select form-select-sm border-radius-none py-0 border-clr3" name="menu_status">
                                <option {{ ($data->menu_status == 0) ? 'selected' : '' }} value="0">Biasa</option>
                                <option {{ ($data->menu_status == 1) ? 'selected' : '' }} value="1">Bold</option>
                                <option {{ ($data->menu_status == 2) ? 'selected' : '' }} value="2">Baru/New</option>
                                <option {{ ($data->menu_status == 3) ? 'selected' : '' }} value="3">Penting/Urgent</option>
                            </select>
                        </div>
                        <div class="col-4 m-0 p-0 d-flex align-items-center">
                            <button type="submit" class="btn btn-sm btn-outline-clr3 he-24 m-0 fsz-10 d-flex align-items-center">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-2 fsz-10">
                <p class="m-0">
                    Status: {!! ($data->menu_show == 1) 
                        ? '<span class="text-success"><i class="fas fa-check-circle me-1"></i>Ditampilkan</span>' 
                        : '<span class="text-secondary"><i class="fas fa-minus-circle me-1"></i>Disembunyikan</span>' !!}
                </p>
                @if($data->menu_show == 1)
                    <form action="{{ url('admin-update-menu-show') }}" method="post">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
                        <input type="hidden" name="menu_show" value="0">
                        <input type="hidden" name="redirect" value="{{ $page }}">
                        <button type="submit" class="btn btn-sm btn-warning fsz-7 lh-1 p-0 p-1 m-0"><i class="fas fa-eye-slash"></i> Sembunyikan sekarang</button>
                    </form>
                @else
                    <form action="{{ url('admin-update-menu-show') }}" method="post">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
                        <input type="hidden" name="menu_show" value="1">
                        <input type="hidden" name="redirect" value="{{ $page }}">
                        <button type="submit" class="btn btn-sm btn-success fsz-7 lh-1 p-0 p-1 m-0"><i class="fas fa-eye"></i> Tampilkan sekarang</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="mb-3">
        <form action="{{ url('admin-update-menu-konten') }}" method="post">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
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