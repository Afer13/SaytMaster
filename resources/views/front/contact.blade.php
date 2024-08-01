@extends('front.app')
@section('main')

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-12 text-center">
                            <h1 class="text-white animated zoomIn">Əlaqə</h1>
                            <hr class="bg-white mx-auto mt-0" style="width: 90px;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a class="text-white" href="/">Ana Səhifə</a></li>
                                    <li class="breadcrumb-item text-white active" aria-current="page">Əlaqə</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                            <h6 class="position-relative d-inline text-primary ps-4">Əlaqə</h6>
                            <h2 class="mt-2">İstənilən sual üçün əlaqə saxlayın</h2>
                        </div>
                        <div class="wow fadeInUp" data-wow-delay="0.3s">
                            <form action="{{ route('contact.post') }}" method="POST">
                                @csrf
                                <div class="row g-3">
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
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="{{ old('name','') }}" name="name" id="name" placeholder="Adınız">
                                            <label for="name">Adınız</label>
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" value="{{ old('email','') }}" name="email" id="email" placeholder="E-poçtunuz">
                                            <label for="email">E-poçtunuz</label>
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" value="{{ old('subject','') }}" name="subject" id="subject" placeholder="Mövzu">
                                            <label for="subject">Mövzu</label>
                                        </div>
                                        @error('subject')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Burada bir mesaj buraxın" name="message" id="message" style="height: 150px">{{ old('message','') }}</textarea>
                                            <label for="message">Mesaj</label>
                                        </div>
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Mesaj Göndər</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="/front/img/contact.jpg">
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endsection