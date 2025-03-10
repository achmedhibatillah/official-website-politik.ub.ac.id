<div class="text-clr3 row m-0 p-0 w-100">
    <div class="col-lg-12 m-0 p-0 mt-4 mt-lg-0">
        <h3>Daftar Tenaga Pendidik</h3>
        <a href="{{ url('admin-tambah-tendik') }}" class="btn btn-outline-clr3 btn-sm">Tambah Tenaga Pendidik</a>
        <div class="mt-2">
            @if($tendik->isNotEmpty())
            CEK
            @else
            <p class="m-0">Data tenaga pendidik belum ada.</p>
            @endif
        </div>
    </div>
</div>