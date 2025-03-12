<div class="bg-web bg-clr5 text-clr3 pb-5" style="min-height:600px;">
    <div style="height:195px;"></div>
    <div class="row m-0 p-0 justify-content-center">
        <div class="col-11 col-md-10 col-lg-9 col-xl-7 text-clr3 row m-0 p-0" style="max-width: 1250px;">
            <div class="col-md-6 m-0 p-0 d-flex align-items-center">
                <div>
                    <h5 class="m-0 mb-3 text-clr3">Program Studi</h5>
                    <h2 class="m-0 fw-800 text-clr1">Ilmu Politik</h2>
                    <h5 class="m-0 lh-1 text-clr1">Fakultas Ilmu Sosial dan Ilmu Politik</h5>
                    <div class="d-flex align-items-end gap-2">
                        <h5 class="m-0 text-clr1">Universitas Brawijaya</h5>
                        <div class="d-flex we-20 overflow-hidden">
                            <img src="{{ url('assets/images/static/logo-ub.png') }}" class="w-100">
                        </div>
                    </div>
                    <hr>
                    <div class="text-clr3 mt-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum quas illum temporibus adipisci veniam libero distinctio deserunt quasi hic asperiores suscipit non possimus, facere enim amet sit natus. Magnam, sed!
                    </div>
                    <a href="" class="btn btn-outline-clr3 btn-sm mt-4">Selengkapnya</a>
                    <div class="my-5 my-md-0 d-block d-md-none">.</div>
                </div>
            </div>
            <div class="col-md-6 m-0 p-0 d-flex justify-content-center position-relative">
                <div class="m-0 p-3 ms-0 ms-md-5 border-clr3 wr-100 bg-web d-flex align-items-end justify-content-center" style="background-image: url('{{ asset('assets/images/dynamic/main.png') }}');min-height:280px;">
                    <div class="bg-clr4 border-clr3 shadow-l w-100">
                        <div class="text-center mt-auto fw-bold text-dark m-0"><h5 class="m-0 my-4">Pembukaan Program Studi</h5></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-clr2 mb-5 row justify-content-center position-relative" style="margin:120px 0 0 0;z-index:2;">
        <div class="col-11 col-md-10 col-lg-9 col-xl-7 text-clr3 m-0 p-0 py-3 position-relative" style="max-width: 1250px;">
            <div class="position-absolute d-flex" style="top:-30px">
                <img src="{{ asset('assets/images/static/illustrations/anc.png') }}" class="we-45 img-death position-relative" style="top:-20px">
                <h5 class="text-clr2">Pengumuman Terbaru</h5>
            </div>
            <div class="row m-0 p-0 d-flex">
                <div class="col-md-6 m-0 p-1">
                    <div class="border-clr5 p-3 text-clr5 d-flex align-items-center" style="height:65px;">
                        <p class="lh-1 m-0 hide-text-2"><a href="{{ url('') }}" class="td-hover text-clr5">Rekapitulasi Pengembalian Berkas Pemilwa FISIP UB 2024 & Pengembalian Berkas Pemilwa FISIP UB 2025</a></p>
                    </div>
                </div>
                <div class="col-md-6 m-0 p-1">
                    <div class="border-clr5 p-3 text-clr5 d-flex align-items-center" style="height:65px;">
                        <p class="lh-1 m-0 hide-text-2"><a href="{{ url('') }}" class="td-hover text-clr5">Pengumuman Penghargaan Lomba</a></p>
                    </div>
                </div>
            </div>
            <p class="ms-1 mt-3 m-0"><a href="" class="td-hover text-clr5">Lihat pengumuman lain <i class="fas"></i></a></p>
            <div class="col-md-4 m-0 p-0 position-relative">
                
            </div>
        </div>
    </div>
</div>

<div class="row m-0 p-0 justify-content-center">
    <div class="col-11 col-md-10 col-lg-9 col-xl-7 text-clr3 m-0 p-0" style="max-width: 1250px;">
        @include('home/sec-2')
        <hr>
        @include('home/sec-3')
        @include('home/sec-4')
    </div>
</div>

<div style="height: 300vh;"></div>