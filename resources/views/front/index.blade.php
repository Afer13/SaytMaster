@extends('front.app')
@section('main')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn">Veb Sayt Hazırlama Xidmətləri ilə İşinizi Sürətlə
                        Genişləndirin</h1>
                    <p class="text-white pb-3 animated zoomIn">Bizim peşəkar komandamız sizin üçün yüksək keyfiyyətli və
                        funksional veb saytlar hazırlayır. Müasir texnologiyalar və kreativ dizaynlarla işinizin rəqəmsal
                        dünyada uğur qazanmasını təmin edirik. Keyfiyyətli və effektiv həllər üçün bizə müraciət edin.</p>
                    <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Layihəniz
                        var?</a>
                    <a href=""
                        class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">İşlərimiz</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="/front/img/hero-2.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-title position-relative mb-4 pb-2">
                        <h6 class="position-relative text-primary ps-4">Haqqımızda</h6>
                        <h2 class="mt-2">{{ $about->title }}</h2>
                    </div>
                    <p class="mb-4">{{ $about->content_short }}</p>
                    <div class="row g-3">
                        @foreach ($about->getItemsGroup() as $itemGroup)
                            <div class="col-sm-6">
                                @foreach ($itemGroup as $item)
                                    <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>{{ $item }}</h6>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <a class="btn btn-primary rounded-pill px-4 me-3" href="/about-us">Daha Ətraflı</a>
                        @if ($setting->facebook)
                            <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                                href="{!! $setting->facebook !!}"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($setting->twitter)
                            <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                                href="{!! $setting->twitter !!}"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if ($setting->instagram)
                            <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                                href="{!! $setting->instagram !!}"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if ($setting->youtube)
                            <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                                href="{!! $setting->youtube !!}"><i class="fab fa-youtube"></i></a>
                        @endif
                        @if ($setting->whatsapp)
                            <a class="btn btn-outline-primary btn-square me-3" target="_blank"
                                href="{!! $setting->whatsapp !!}"><i class="fab fa-whatsapp"></i></a>
                        @endif

                    </div>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/storage/{{ $about->image_url }}">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Newsletter Start -->
    <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container px-lg-5">
            <div class="row align-items-center" style="height: 250px;">
                <div class="col-12 col-md-6">
                    <h3 class="text-white">Başlamağa hazırsınız?</h3>
                    <small class="text-white">Sizə daha yaxşı xidmət göstərmək üçün əlaqə nömrənizi daxil edin.</small>
                    @if (Session::has('success'))
                        <div class="col-md-12 mb-2">
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        </div>
                    @endif
                    @if (Session::has('warning'))
                        <div class="col-md-12 mb-2">
                            <div class="alert alert-danger">{{ Session::get('warning') }}</div>
                        </div>
                    @endif
                    <form action="{{ route('application-short.post') }}" method="POST"
                        class="position-relative w-100 mt-3">
                        @csrf
                        <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
                            placeholder="Əlaqə nömrənizi daxil edin" name="phone_number" style="height: 48px;">
                        <button type="submit" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                class="fa fa-paper-plane text-primary fs-4"></i></button>
                    </form>
                    @error('phone_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                    <img class="img-fluid mt-5" style="height: 250px;" src="/front/img/newsletter.png">
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Bizim xidmətlərimiz</h6>
                <h2 class="mt-2">Hansı Həlləri Təqdim Edirik</h2>
            </div>
            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="service-icon flex-shrink-0">
                                <i class="{!! $service->icon !!} fa-2x"></i>
                            </div>
                            <h5 class="mb-3">{!! $service->title !!}</h5>
                            <p>{!! $service->content_short !!}</p>
                            <a class="btn px-3 mt-auto mx-auto" href="/services/{!! $service->slug !!}">Daha Ətraflı</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">İşlərimiz</h6>
                <h2 class="mt-2">Gördüyümüz işlər</h2>
            </div>
            {{-- <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn px-3 pe-4 active" data-filter="*">All</li>
                        <li class="btn px-3 pe-4" data-filter=".first">Design</li>
                        <li class="btn px-3 pe-4" data-filter=".second">Development</li>
                    </ul>
                </div>
            </div> --}}
            <div class="row g-4 portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="/storage/{{ $portfolio->image_url }}"
                                alt="{{ $portfolio->title }}">
                            <div class="portfolio-overlay">
                                {{-- <a class="btn btn-light" href="img/portfolio-1.jpg" data-lightbox="portfolio"><i
                                        class="fa fa-plus fa-2x text-primary"></i></a> --}}
                                <div class="mt-auto">
                                    {{-- <small class="text-white"><i class="fa fa-folder me-2"></i>Web Design</small> --}}
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">{{ $portfolio->title }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Portfolio End -->
@endsection
@section('script')
@endsection
