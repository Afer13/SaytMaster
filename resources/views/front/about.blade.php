@extends('front.app')
@section('main')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Haqqımızda</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Ana Səhifə</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Haqqımızda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->



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
            <div class="row g-5">
                <div class="col-lg-6">
                    <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/front/img/about-2.webp">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="mb-4">{!! $about->content !!}</p>
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
@endsection
