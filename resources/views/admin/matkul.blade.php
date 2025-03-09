<div class="row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 text-clr1 mt-4 mt-lg-0">
        <div class="row m-0 p-0">
            <div class="col-md-6 m-0 p-0">
                <h3>Daftar Mata Kuliah</h3>
                <a href="{{ url('admin-tambah-matkul') }}" class="btn btn-outline-clr1 btn-sm">Tambah Mata Kuliah</a>
            </div>
            <div class="col-md-6 row m-0 p-0">
                <div class="col-md-8 m-0 p-0 d-flex align-items-end pe-2">
                    <form action="{{ url('admin-mata-kuliah') }}" class="w-100">
                        <label for="k" class="d-block fsz-10">Cari mata kuliah :</label>
                        <input type="text" name="k" class="rounded border-clr1 bg-transparent px-3 he-25 d-block w-100" id="k" placeholder="...">
                    </form>
                </div>
                <div class="col-md-4 m-0 p-0 d-flex align-items-end">
                    <div class="dropdown w-100">
                        <a class="bg-transparent border-clr1 text-clr1 td-none he-25 fsz-10 w-100 d-block dropdown-toggle d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Semester</a>
                        <ul class="dropdown-menu dropdown-menu-end border-clr1 bg-clr4 shadow">
                            <li>
                                <form action="admin-mata-kuliah"><button class="dropdown-item text-center">semua</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="1"><button class="dropdown-item text-center">1</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="2"><button class="dropdown-item text-center">2</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="3"><button class="dropdown-item text-center">3</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="4"><button class="dropdown-item text-center">4</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="5"><button class="dropdown-item text-center">5</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="6"><button class="dropdown-item text-center">6</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="7"><button class="dropdown-item text-center">7</button></form>
                            </li>
                            <li>
                                <form action="admin-mata-kuliah"><input type="hidden" name="semester" value="8"><button class="dropdown-item text-center">8</button></form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">@include('templates/session')</div>
        @if($mk->isNotEmpty())
        <div id="hasil-pencarian">
            @include('admin.matkul-list')
        </div>
        @else
        <p class="m-0">Data mata kuliah tidak ada.</p>
        @endif
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let inputSearch = document.getElementById("k");

    inputSearch.addEventListener("input", function () {
        let query = inputSearch.value.trim();
        let resultContainer = document.getElementById("hasil-pencarian");

        let url = "{{ url('admin-mata-kuliah') }}?k=" + encodeURIComponent(query);

        fetch(url, { headers: { "X-Requested-With": "XMLHttpRequest" } })
            .then(response => response.text())
            .then(html => {
                resultContainer.innerHTML = html;
            })
            .catch(error => console.error("Error:", error));
    });
});
</script>