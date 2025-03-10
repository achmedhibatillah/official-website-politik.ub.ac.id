<div class="text-clr1 m-0 p-0">
    <h4>Tambah Tenaga Pendidik</h4>
    <hr>
    <form action="{{ url('admin-simpan-tendik') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="tendik_session" value="{{ session('tendik_foto_original') }}">
        <div class="mb-3">
            <label for="tendik_nama">Nama</label>
            <input name="tendik_nama" type="text" class="w-100 border-clr1 bg-clr5 px-2" placeholder="..." id="tendik_nama" autocomplete="off"
            value="{{ old('tendik_nama') }}">
            @error('tendik_nama')
            <div class="ms-1 fsz-10 mt-1"><i class="fa-solid fa-circle-exclamation"></i> {{ $message }}</div>
            @enderror
        </div>
    </form>
</div>