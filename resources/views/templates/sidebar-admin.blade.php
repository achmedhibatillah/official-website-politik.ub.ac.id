<!-- Modal -->
<div class="modal fade" id="modalAuthAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-clr5">
            <div class="modal-header bg-clr1">
                <div class="my-2">
                    <img src="{{ asset('assets/images/static/logo.png') }}" class="wr-30">
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="m-0 mb-3">Sistem Informasi Program Studi Ilmu Politik, Fakultas Ilmu Sosial dan Ilmu Politik, Universitas Brawijaya</p>
                <a href="{{ url('d') }}" class="btn btn-clr1 btn-sm">Logout <i class="fas fa-sign-out-alt"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row m-0 p-0">
    <div class="col-md-5 col-lg-3 col-xl-2 m-0 p-0 bg-clr1 text-clr4 overflow-y-scroll py-3" style="height:100vh;">
        <div class="mx-2">
            <div class="d-flex justify-content-center">
                <div class="d-flex justify-content-center overflow-hidden w-75">
                    <img src="{{ asset('assets/images/static/logo.png') }}" class="w-100 me-3">
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ url('admin-dashboard') }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2 he-32">
                    <div class="d-flex justify-content-center align-items-center we-18"><i class="fas fa-dashboard fsz-10"></i></div>
                    <div class="d-flex align-items-center ms-2 lh-1 fsz-10">Dashboard</div>
                    @if($status == '0')
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                    @else
                    <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                    @endif
                </a>
                @foreach($side as $x)
                    <a href="{{ url('admin-kategori-' . $x->kategori_slug) }}" class="d-flex btn btn-sm btn-outline-clr4 text-start w-100 mb-2 he-32">
                        <div class="d-flex justify-content-center align-items-center we-18">{!! $x->kategori_icon !!}</div>
                        <div class="d-flex align-items-center ms-2 lh-1 fsz-10">{{ $x->kategori_judul_ID }}</div>
                        @if($status == $x->kategori_slug)
                        <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-on fsz-12"></i></div>
                        @else
                        <div class="d-flex align-items-center ms-auto"><i class="fa-solid fa-toggle-off fsz-12"></i></div>
                        @endif
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-7 col-lg-9 col-xl-10 m-0 p-0 bg-clr4 text-clr3 overflow-y-scroll px-3" style="height:100vh;">
        <div class="d-flex justify-content-center align-items-end text-clr5 gap-3" style="height:8vh;">
            <div class="d-flex justify-content-center align-items-center bg-clr1 he-30 rounded" style="width:95%;">{{ $title }}</div>
            <div class="d-flex justify-content-end align-items-center he-30 rounded" style="width:5%;">
                <div data-bs-toggle="modal" data-bs-target="#modalAuthAdmin" class="cursor-pointer bg-clr1 rounded-circle we-30 square d-flex justify-content-center align-items-center"><i class="fas fa-user"></i></div>
            </div>
        </div>
        <div class="d-flex align-items-center" style="height:8vh;">
            <div class="w-100 rounded bg-clr4 border-clr1 py-1 px-3 text-clr3">
                <a href="{{ url('admin-dashboard') }}" class="text-clr3"><i class="fas fa-home fsz-14"></i></a>
                @if(!empty($page))
                @foreach($page as $x)
                <i class="mx-2">></i>
                <a href="{{ $x['url'] }}" class="td-none text-clr3">{{ $x['name'] }}</a>
                @endforeach
                @endif
            </div>
        </div>
        <div class="overflow-y-scroll border-clr1 bg-clr5 p-3" style="height:80vh;">