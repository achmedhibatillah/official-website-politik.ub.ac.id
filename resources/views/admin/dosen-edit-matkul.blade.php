<div class="row m-0 p-0 justify-content-center">
    <div class="col-lg-8 col-xl-6 m-0 p-0 py-5">
        <h4 class="fw-bold">{{ $dosen->dosen_nama }}</h4>
        <hr>
        <h5 class="m-0">Atur Mata Kuliah</h5>
        <p class="m-0">Mata kuliah yang diampu oleh dosen terkait.</p>
        <hr>
        <form action="{{ url('admin-simpan-mata-kuliah-dosen') }}" method="post">
            @csrf
            <input type="hidden" name="redirect_page" value="edit">
            <input type="hidden" name="dosen_id" value="{{ $dosen->dosen_id }}">
            <?php $i = 1 ?>
            @if($dosen->mk_list->isNotEmpty())
                <input type="text" autocomplete="off" placeholder="Kode/Nama Mata Kuliah" class="border-clr3 bg-transparent px-2 rounded" id="searchMk">
                <div class="border-clr3 mt-3 p-3 overflow-scroll" style="height:50vh;" id="boxMk">
                    @foreach($dosen->mk_list as $x)
                        <div class="mb-3 px-2 d-flex align-items-center">
                            <input type="checkbox" name="mk_id[]" value="{{ $x->mk_id }}" id="mk_id-{{ $x->mk_id }}" class="cursor-pointer" {{ ($x->mk_selected == true) ? 'checked' : '' }}>
                            <label for="mk_id-{{ $x->mk_id }}" class="ms-3">
                                <p class="m-0 text-secondary fsz-10 font-price">{{ $x->mk_id }}</p>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalFr-{{ $x->mk_id }}" class="m-0 td-hover text-clr1 fw-bold">{{ $x->mk_mk_ID }}</a>
                                <p class="m-0 fsz-10 text-secondary">{{ $x->mk_mk_EN }}</p>
                            </label>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="modalFr-{{ $x->mk_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <div class="my-2">
                                        <p class="m-0 text-clr3">{{ $x->mk_id }}</p>
                                        <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $x->mk_mk_ID }}</h1>
                                        <p class="m-0 text-secondary lh-1">{{ $x->mk_mk_EN }}</p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Deskripsi</p>
                                    <div class="d-flex">
                                        <div><div class="lang-id me-3"></div></div>
                                        <p class="m-0">{{ $x->mk_deskripsi_ID }}</p>
                                    </div>
                                    <div class="d-flex mt-3">
                                        <div><div class="lang-en me-3"></div></div>
                                        <p class="m-0">{{ $x->mk_deskripsi_EN }}</p>
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
                </div>
            @else
                <p class="m-0">Mata kuliah masih kosong. <a href="{{ url('admin-tambah-matkul') }}" class="td-none">Isi di sini.</a></p>
            @endif
            <input type="hidden" name="relation_length" value="{{ $i }}">
            <hr>
            <button type="submit" class="btn btn-outline-clr3 btn-sm mt-2">Simpan</button>
        </form>
    </div>
</div>

<script>
    document.getElementById("searchMk").addEventListener("input", function () {
        let searchValue = this.value.toLowerCase();
        let items = document.querySelectorAll("#boxMk > div"); 

        items.forEach(item => item.style.backgroundColor = ""); 
        
        for (let item of items) {
            let text = item.textContent.toLowerCase();
            if (text.includes(searchValue)) {
                item.scrollIntoView({ behavior: "smooth", block: "center" });
                item.style.backgroundColor = "yellow";
                break;
            }
        }
    });
</script>

