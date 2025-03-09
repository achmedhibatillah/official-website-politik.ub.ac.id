<div class="text-clr3 m-0 p-0 col-xl-8">
    <h4>Tambah Mata Kuliah</h4>
    <hr>
    <form action="{{ url('admin-simpan-matkul') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row m-0 p-0 mb-3">
            <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                <label for="mk_id">Kode MK</label>
                <input name="mk_id" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="mk_id" autocomplete="off"
                value="{{ old('mk_id') }}">
                @error('mk_id')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row m-0 p-0 mb-3">
            <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                <label for="mk_mk_ID">Mata Kuliah <i class="lang-id"></i></label>
                <input name="mk_mk_ID" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="mk_mk_ID" autocomplete="off"
                value="{{ old('mk_mk_ID') }}">
            </div>
            <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                <label for="mk_mk_EN">Mata Kuliah <i class="lang-en"></i></label>
                <input name="mk_mk_EN" type="text" class="w-100 border-clr3 bg-clr5 px-2" placeholder="..." id="mk_mk_EN" autocomplete="off"
                value="{{ old('mk_mk_EN') }}">
            </div>
            <div class="col-md-6 m-0 p-0 pe-0 pe-md-1">
                @error('mk_mk_ID')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6 m-0 p-0 ps-0 ps-md-1">
                @error('mk_mk_EN')
                <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
            </div>
        </div>
        <hr class="my-4">
        <div class="row m-0 p-0">
            <div class="col-md-6 m-0 p-0">
                <div class="mb-3">
                    <label for="mk_sks">Jumlah SKS :</label>
                    <input name="mk_sks" type="number" class="d-inline-block wr-10 he-25 border-clr3 bg-clr5 ms-3 px-2 text-center" placeholder="..." id="mk_sks"
                    value="{{ old('mk_sks') }}">
                    @error('mk_sks')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mk_sks">Semester :</label>
                    <select class="cursor-pointer bg-transparent he-28 border-clr3 ms-3" aria-label="mk_semester" name="mk_semester">
                        <option value="">Semester</option>
                        <option value="1" {{ old('mk_semester') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('mk_semester') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('mk_semester') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('mk_semester') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('mk_semester') == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ old('mk_semester') == '6' ? 'selected' : '' }}>6</option>
                        <option value="7" {{ old('mk_semester') == '7' ? 'selected' : '' }}>7</option>
                        <option value="8" {{ old('mk_semester') == '8' ? 'selected' : '' }}>8</option>
                    </select>
                    @error('mk_semester')
                    <div class="ms-1 fsz-10 mt-1 text-clr1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 m-0 p-0">
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalKurikulum" class="btn btn-success btn-sm lh-1 rounded m-0 p-1 fsz-10"><i class="fas fa-plus"></i> tautkan kurikulum</a>
                <p class="lh-1 m-0 mt-2">Termasuk dalam kurikulum :</p>
                <div class="border-clr3 p-2 bg-light mt-2">
                    @include('admin/matkul-tambah-kurikulum')
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="row m-0 p-0">
            <div class="col-lg-6 m-0 p-0 pe-lg-1 mb-3">
                <label for="mk_deskripsi_ID">Deskripsi <i class="lang-id"></i></label>
                @error('mk_deskripsi_ID')
                <div class="ms-1 fsz-10"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea name="mk_deskripsi_ID" id="mk_deskripsi_ID" class="border-clr3 w-100 p-2 bg-transparent" style="height:120px;" placeholder="...">{{ old('mk_deskripsi_ID') }}</textarea>
            </div>
            <div class="col-lg-6 m-0 p-0 ps-lg-1 mb-3">
                <label for="mk_deskripsi_EN">Deskripsi <i class="lang-en"></i></label>
                @error('mk_deskripsi_EN')
                <div class="ms-1 fsz-10"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
                @enderror
                <textarea name="mk_deskripsi_EN" id="mk_deskripsi_EN" class="border-clr3 w-100 p-2 bg-transparent" style="height:120px;" placeholder="...">{{ old('mk_deskripsi_EN') }}</textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-sm btn-clr1 mt-2">Simpan</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalKurikulum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDelLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" action="{{ url('admin-session-kurikulum') }}" method="post">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDelLabel">Tautkan ke Kurikulum</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $i = 1 ?>
                @if(session()->has('session_kurikulum'))
                @foreach(session()->get('session_kurikulum') as $x)
                <div class="my-2 d-flex">
                    <input type="checkbox" name="kurikulum_{{ $i }}" id="kurikulum_{{ $i }}" value="{{ $x['kurikulum_id'] }}" {{ $x['selected'] ? 'checked' : '' }}>
                    <div class="ms-2">
                        <label for="kurikulum_{{ $i }}">
                            <h5 class="m-0 lh-1">{{ $x['kurikulum_judul_ID'] }}</h5>
                            <p class="m-0 lh-1">{{ $x['kurikulum_judul_EN'] }}</p>
                            <div class="">{!! ($x['kurikulum_status'] == 1) ? '<div class="text-success fsz-10"><i class="fas fa-circle"></i> berlaku</div>' : '<div class="text-secondary fsz-10"><i class="fas fa-circle"></i> tidak berlaku</div>' !!}</div>
                        </label>
                    </div>
                </div>
                <?php $i++ ?>
                @endforeach
                @else
                @foreach($kurikulum as $x)
                <div class="my-2 d-flex">
                    <input type="checkbox" name="kurikulum_{{ $i }}" id="kurikulum_{{ $i }}" value="{{ $x->kurikulum_id }}">
                    <div class="ms-2">
                        <label for="kurikulum_{{ $i }}">
                            <h5 class="m-0 lh-1">{{ $x->kurikulum_judul_ID }}</h5>
                            <p class="m-0 lh-1">{{ $x->kurikulum_judul_EN }}</p>
                            <div class="">{!! ($x->kurikulum_status == 1) ? '<div class="text-success fsz-10"><i class="fas fa-circle"></i> berlaku</div>' : '<div class="text-secondary fsz-10"><i class="fas fa-circle"></i> tidak berlaku</div>' !!}</div>
                        </label>
                    </div>
                </div>
                <?php $i++ ?>
                @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Simpan</a>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form.modal-content");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const csrfToken = document.querySelector('input[name="_token"]').value;
        const selectedKurikulum = [];
        document.querySelectorAll('input[type="checkbox"]:checked').forEach((checkbox) => {
            selectedKurikulum.push(checkbox.value);
        });

        fetch("{{ url('admin-session-kurikulum') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrfToken,
            },
            body: JSON.stringify({ kurikulum: selectedKurikulum }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update tampilan tanpa reload
                document.getElementById("containerKurikulum").innerHTML = data.html;

                // Tutup modal secara benar
                const modalEl = document.getElementById("modalKurikulum");
                const modalInstance = bootstrap.Modal.getInstance(modalEl);
                if (modalInstance) {
                    modalInstance.hide();
                }
                document.body.classList.remove("modal-open");
                document.querySelector(".modal-backdrop")?.remove();

                // Reinitialize event listener yang mungkin hilang
                setTimeout(() => {
                    initializeScripts();
                }, 100);
            }
        })
        .catch(error => console.error("Error:", error));
    });
});

function initializeScripts() {
    const tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltips.forEach(t => new bootstrap.Tooltip(t));

    console.log("Event listener di-reinitialize");
}
</script>

