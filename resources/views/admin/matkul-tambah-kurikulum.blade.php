<div id="containerKurikulum">
    @if(session()->has('session_kurikulum'))
        @foreach(session('session_kurikulum') as $x)
            <div class="my-2 px-3 lh-1 d-flex align-items-center @if($x['selected'] == false) d-none @endif">
                <i class="fas fa-check-circle me-3"></i>
                <div>
                    <p class="m-0">{{ $x['kurikulum_judul_ID'] }}</p>
                    <p class="text-secondary fsz-10 m-0">{{ $x['kurikulum_judul_EN'] }}</p>
                </div>
            </div>
        @endforeach
    @else
        <p class="m-0 fsz-10">Tidak ada</p>
    @endif
</div>