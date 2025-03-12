<div class="mb-4">
    <h3 class="text-clr1 m-0 mb-2 lh-1 fw-bold text-center">{{ $pengumuman->pengumuman_judul }}</h3>
    <p class="text-center fsz-10 text-secondary">{{ $pengumuman->created_at_tgl }} {{ $pengumuman->created_at_jam }} WIB</p>
</div>
<hr class="my-4">
<div>
    {!! $pengumuman->pengumuman_isi !!}
</div>