<div class="py-5">
    <div class="pb-2 w-100 text-clr1">
        <div class="d-flex justify-content-center">
            <h3 class="fw-bold ls-s bg-clr1 text-clr5 px-3 mb-1">@lang('home.dosen')</h3>
        </div>
        <h4 class="fw-light text-center">@lang('home.ilpol')</h4>
    </div>

    <div class="data-dosen mt-5 m-0 w-100">
        @foreach($dosen as $index => $x)
            <div class="d-flex justify-content-center">
                <div class="card border-clr1 shadow m-0 position-relative overflow-hidden" onclick="window.location.href='<?= url('dosen/' . $x->dosen_slug) ?>'">
                    <div class="d-flex justify-content-center align-items-center overflow-hidden" style="width:200px;aspect-ratio:3/4;">
                        <img src="{{ asset($x->dosen_foto) }}" class="img-cover img-hover cursor-pointer">
                    </div>
                    <div class="position-absolute gradient-overlay w-100 text-center text-clr5 pt-5 px-3" style="bottom:0;">
                        <div class="m-0 lh-1 fw-bold he-50 bg-clr2 d-flex align-items-center justify-content-center shadow-l px-2">
                            <a href="{{ url('dosen/' . $x->dosen_slug) }}" class="td-hover text-clr5">{{ $x->dosen_nama }}</a>
                        </div>
                        @if($x->fr_names->isNotEmpty())
                            <div class="m-0 lh-1 mt-1 fsz-9 he-45 d-flex justify-content-center align-items-start">
                                <div class="">
                                    @foreach($x->fr_names as $y)
                                        <a href="{{ url('fokus-riset/' . $y['id']) }}" class="text-clr4 td-hover"><i class="fa-solid fa-square fsz-8"></i> {{ $y['name'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
        <a href="{{ url('dosen') }}" class="btn btn-outline-clr1" style="width:270px;border-radius:20px;">@lang('home.lihat_dosen')</a>
    </div>
    <div class="d-flex justify-content-center mt-2">
        <a href="{{ url('dosen') }}" class="btn btn-outline-clr1" style="width:270px;border-radius:20px;">@lang('home.lihat_tendik')</a>
    </div>

    <style>
    .slick-prev { left: 0; }
    .slick-next { right: 0;}
    .slick-prev, .slick-next { z-index: 10; color: var(--clr1); background-color: transparent; border: none; }
    .slick-prev:before, .slick-next:before { color: var(--clr1) !important; font-size: 24px; }
    .slick-prev:hover:before, .slick-next:hover:before { color: var(--clr1); }
    .gradient-overlay { cursor: pointer; background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 0%, rgba(0, 0, 0, 0.6) 50%, rgba(0, 0, 0, 0.4) 80%, rgba(0, 0, 0, 0) 100%); height: 50%; }
    .gradient-overlay:hover .img-hover { transform: scale(1.05); }
    </style>
    <script>
    $(document).ready(function(){
        $('.data-dosen').slick({
            autoplay: true,
            dots: false,
            arrows: true,
            infinite: true,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    });

    </script>
</div>