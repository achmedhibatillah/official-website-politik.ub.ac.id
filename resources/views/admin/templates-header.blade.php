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
                <p class="lh-xs m-0 fsz-11">https://politik.ub.ac.id/{{$data->menu_slug}}</p>
            </div>
            <a href="{{ url($data->menu_slug) }}" class="text-clr1 td-hover fsz-10 ms-2" target="_blank">Lihat halaman <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
            @if($data->menu_as !== 1)
            <a href="#" data-bs-toggle="modal" data-bs-target="#modalEditSlug"  class="text-clr1 td-hover fsz-10 ms-2">Edit slug <i class="fas fa-pencil fsz-8 mb-1"></i></a>
            @endif
            </div>
        </div>
        @if(isset($data->menu_gambar))
        <form action="{{ url('admin-update-menu-gambar') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="menu_id" value="{{ $data->menu_id }}">
            <input type="hidden" name="menu_slug" value="{{ $data->menu_slug }}">
            <input type="hidden" name="message" value="Gambar {{ $data->menu_id }} berhasil diperbarui.">
            <input type="hidden" name="redirect" value="{{ $page }}">                
            <input type="hidden" name="gambar_for" value="{{ $data->menu_slug }}">
            <div class="row m-0 p-0">
                <div class="col-9 m-0 p-0">
                    <label for="menu_gambar" class="fsz-10 lh-1">Ubah Sertifikat Akreditasi (PNG/JPG/JPEG)</label>
                    <div class="position-relative">
                        <input name="menu_gambar" type="file" class="w-100 border-clr1 bg-clr5 he-27 position-relative" style="opacity:0; z-index:1;" id="menu_gambar" accept="image/png, image/jpeg, image/jpg">   
                        <div class="w-100 he-27 border-clr3 position-absolute d-flex align-items-center px-2" style="top:0; z-index:0; color:black;">
                            <div class="me-2"><i class="fas fa-folder"></i></div>
                            <div id="file-name-display" class="fsz-10">
                                {{ session('menu_gambar_original', 'pilih file') }}
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="col-3 m-0 p-0 ps-1 d-flex align-items-end">
                    <button type="submit" class="he-27 btn btn-outline-clr3 fsz-10 d-flex align-items-center">Simpan</button>
                </div>
            </div>
            @error('menu_gambar')
            <div class="ms-1 fsz-8 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </form>
        <div class="mt-2">
            <p class="m-0">Gambar :</p>
            <div class="m-0 d-flex justify-content-center align-items-center overflow-hidden wr-50">
                <img src="{{ asset($data->menu_gambar) }}" class="w-100">
            </div>
        </div>
        @endif
    </div>
    <div class="col-md-6 row m-0 p-0 ps-0 ps-md-1 d-flex flex-column gap-2">
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