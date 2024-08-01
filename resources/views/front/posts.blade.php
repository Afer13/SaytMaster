@extends('front.app')
@section('main')
    <div class="container-xxl py-5 bg-primary hero-header mb-5">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Blog</h1>
                    <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="/">Ana Səhifə</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar & Hero End -->


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">Blog</h6>
                <h2 class="mt-2">Məlumat və Yeniliklər</h2>
            </div>
            <div class="row g-4">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                        <div class="service-item post-item d-flex flex-column justify-content-center text-center rounded">
                            <div class="flex-shrink-0">
                                <img class="service-title-image" src="/storage/{{ $post->image_url }}" alt="">
                            </div>
                            <h5 class="mb-3 text-align-start">{!! $post->title !!}</h5>
                            <p class="text-align-start">{!! $post->content_short !!}</p>
                            <div class="param-box">
                                <div class="param">
                                    <i class="fas fa-calendar-alt"></i> {{ date('d.m.Y',strtotime($post->created_at)) }}
                                </div>
                                <div class="param">
                                    <i class="far fa-eye"></i> {{ $post->views }}
                                </div>
                            </div>
                            <a class="btn px-3 mt-auto mx-auto" href="/news/{!! $post->slug !!}">Daha
                                Ətraflı</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->
    
@endsection
