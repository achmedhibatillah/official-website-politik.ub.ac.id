<div class="text-clr3 row m-0 p-0 w-100">
    <div class="d-flex align-items-top m-0 p-0">
        <div class="m-0 p-0 mt-4 mt-lg-0 flex-grow-1">
            <h3 class="lh-1">{{ $pengumuman->pengumuman_judul_ID }}</h3>
            <p class="text-secondary lh-1 ms-1">{{ $pengumuman->pengumuman_judul_EN }}</p>
            @include('templates/session')
            <hr>
            <div class="d-flex lh-1 mb-2">
                <p class="m-0 fsz-11">Url:</p>
                <a href="{{ url('pengumuman/' . $pengumuman->pengumuman_slug) }}" class="td-hover fsz-11 ms-2 text-clr1" target="_blank">lihat halaman di halaman pengunjung <i class="fa-solid fa-arrow-up-right-from-square fsz-10"></i></a>
            </div>
            <div class="d-flex">
                <p class="text-clr3 fsz-11 border-clr3 lh-1 py-1 px-2">https://politik.ub.ac.id/pengumuman/{{ $pengumuman->pengumuman_slug }}</p>
            </div>
            <div class="mt-3">
            </div>
        </div>
    </div>
    <hr>
    <div class="m-0 p-0">
        <table class="fsz-11">
            <tr>
                <td>Dibuat</td>
                <td>:</td>
                <td class="ps-2 font-price fw-light fsz-10 text-secondary">{{ $pengumuman->created_at }}</td>
            </tr>
            <tr>
                <td>Diedit</td>
                <td>:</td>
                <td class="ps-2 font-price fw-light fsz-10 text-secondary">@if($pengumuman->created_at !== $pengumuman->updated_at) {{ $pengumuman->updated_at }} @else Belum pernah diubah. @endif</td>
            </tr>
        </table>
        <a href="{{ url('admin-edit-pengumuman/' . $pengumuman->pengumuman_id) }}" class="btn btn-sm p-0 px-2 fsz-10 btn-warning" style="width:100px;"><i class="fas fa-pencil"></i> edit</a>
        <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete" class="btn btn-sm p-0 px-2 fsz-10 btn-danger" style="width:100px;"><i class="fas fa-trash"></i> hapus</a>
    </div>
    <hr class="mt-3">
    <div class="m-0 p-0 mb-4 d-flex gap-1">
        <div class="bg-clr3 text-clr4 border-clr3 cursor-pointer px-2 fsz-10 ls-s text-center" style="width:150px;" id="btnID">Konten Bahasa Indonesia</div>
        <div class="border-clr3 cursor-pointer px-2 fsz-10 ls-s text-center" style="width:150px;" id="btnEN">Konten Bahasa Inggris</div>
    </div>
    <div class="m-0 p-0">
        <div class="border-clr3 p-3 overflow-x-hidden w-100 pt-4" id="kontenID">
            <h1 class="mb-4">{{ $pengumuman->pengumuman_judul_ID }}</h1>
            {!! $pengumuman->pengumuman_isi_ID !!}
        </div>
        <div class="border-clr3 p-3 overflow-x-hidden w-100 pt-4 d-none" id="kontenEN">
            <h1 class="mb-4">{{ $pengumuman->pengumuman_judul_EN }}</h1>
            {!! $pengumuman->pengumuman_isi_EN !!}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $pengumuman->pengumuman_judul_ID }}</h1>
                <p class="text-secondary m-0 lh-1">{{ $pengumuman->pengumuman_judul_EN }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="w-100 d-flex justify-content-center align-items-center overflow-hidden bg-clr4 shadow-l" style="aspect-ratio:3/2;">
                <img src="{{ asset($pengumuman->pengumuman_gambar) }}" style="height:100%;width:100%;object-fit:cover;">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <div class="my-2">
                <h1 class="modal-title fs-5 lh-1 mb-1" id="">{{ $pengumuman->pengumuman_judul_ID }}</h1>
                <p class="text-secondary m-0 lh-1">{{ $pengumuman->pengumuman_judul_EN }}</p>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="m-0">Apakah Anda yakin ingin menghapus pengumuman ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a href="{{ url('admin-hapus-pengumuman/' . $pengumuman->pengumuman_id) }}" class="btn btn-danger">Hapus</a>
        </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const btnID = document.getElementById("btnID");
    const btnEN = document.getElementById("btnEN");
    const kontenID = document.getElementById("kontenID");
    const kontenEN = document.getElementById("kontenEN");

    function switchContent(activeBtn, inactiveBtn, showContent, hideContent) {
        inactiveBtn.classList.remove("bg-clr3", "text-clr4");
        activeBtn.classList.add("bg-clr3", "text-clr4");

        hideContent.classList.add("d-none");
        showContent.classList.remove("d-none");
    }

    btnID.addEventListener("click", function () {
        switchContent(btnID, btnEN, kontenID, kontenEN);
    });

    btnEN.addEventListener("click", function () {
        switchContent(btnEN, btnID, kontenEN, kontenID);
    });
});
</script>

