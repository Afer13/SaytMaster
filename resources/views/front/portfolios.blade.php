@extends('front.app')
@section('main')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">İşlərimiz</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Ana Səhifə</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">İşlərimiz</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->

    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">İşlərimiz</h6>
                <h2 class="mt-2">Gördüyümüz işlər</h2>
            </div>
            <div class="row g-4 portfolio-container">
                @foreach ($portfolios as $portfolio)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="/storage/{{ $portfolio->image_url }}" alt="{{ $portfolio->title }}">
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
