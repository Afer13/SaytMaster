<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sayt Master</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="/storage/{{ $setting->favicon_url }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/front/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/front/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/front/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/front/css/style.css?v=1.1" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="/" class="navbar-brand p-0">
                    <!-- <h1 class="m-0"><i class="fa fa-search me-2"></i>SEO<span class="fs-5">Master</span></h1> -->
                    <img class="logo-write" src="/storage/{{ $setting->logo_url }}" alt="Logo">
                    <img class="logo-blue" src="/storage/{{ $setting->logo_2_url }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="/" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Ana
                            Səhifə</a>
                        <a href="/about-us"
                            class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Haqqımızda</a>
                        <a href="/services" class="nav-item nav-link @active('services')">Xidmətlər</a>
                        <a href="/portfolios"
                            class="nav-item nav-link {{ request()->routeIs('portfolios') ? 'active' : '' }}">İşlərimiz</a>
                        <a href="/blog" class="nav-item nav-link @active('posts')">Blog</a>
                        <a href="/contact-us"
                            class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Əlaqə</a>
                    </div>
                    {{-- <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal"
                        data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton> --}}
                    <a href="https://htmlcodex.com/startup-company-website-template"
                        class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Layihəniz var?</a>
                </div>

            </nav>
            <!-- Full Screen Search Start -->
            <div class="modal fade" id="searchModal" tabindex="-1">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                        <div class="modal-header border-0">
                            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body d-flex align-items-center justify-content-center">
                            <div class="input-group" style="max-width: 600px;">
                                <input type="text" class="form-control bg-transparent border-light p-3"
                                    placeholder="Type search keyword">
                                <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Full Screen Search End -->
            @yield('main')


            <!-- Footer Start -->
            <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="row g-5">
                        <div class="col-md-6 col-lg-4">
                            <h5 class="text-white mb-4">Əlaqə üçün</h5>
                            <p><i class="fa fa-map-marker-alt me-3"></i>{{ $setting->address }}</p>
                            <p><i class="fa fa-phone-alt me-3"></i>{{ $setting->phone_number }}</p>
                            <p><i class="fa fa-envelope me-3"></i>{{ $setting->email }}</p>
                            <div class="d-flex pt-2">
                                @if ($setting->facebook)
                                    <a class="btn btn-outline-light btn-social" target="_blank"
                                        href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                @endif
                                @if ($setting->instagram)
                                    <a class="btn btn-outline-light btn-social" target="_blank"
                                        href="{{ $setting->instagram }}"><i class="fab fa-instagram"></i></a>
                                @endif
                                @if ($setting->twitter)
                                    <a class="btn btn-outline-light btn-social" target="_blank"
                                        href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a>
                                @endif
                                @if ($setting->youtube)
                                    <a class="btn btn-outline-light btn-social" target="_blank"
                                        href="{{ $setting->youtube }}"><i class="fab fa-youtube"></i></a>
                                @endif
                                @if ($setting->whatsapp)
                                    <a class="btn btn-outline-light btn-social" target="_blank"
                                        href="{{ $setting->whatsapp }}"><i class="fab fa-whatsapp"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <h5 class="text-white mb-4">Menu</h5>
                            <a class="btn btn-link" href="/">Ana Səhifə</a>
                            <a class="btn btn-link" href="/about-us">Haqqımızda</a>
                            <a class="btn btn-link" href="/services">Xidmətlər</a>
                            <a class="btn btn-link" href="/portfolios">İşlərimiz</a>
                            <a class="btn btn-link" href="/contact-us">Əlaqə</a>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <h5 class="text-white mb-4">Başlamağa hazırsınız?</h5>
                            <p>Sizə daha yaxşı xidmət göstərmək üçün əlaqə nömrənizi daxil edin.</p>
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
                                    placeholder="Sizin əlaqə nömrəniz" name="phone_number" style="height: 48px;">
                                <button type="submit"
                                    class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                                        class="fa fa-paper-plane text-primary fs-4"></i></button>
                            </form>
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="container px-lg-5">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                                &copy; <a class="border-bottom" href="/">Sayt Master</a>, Bütün hüquqlar
                                qorunur.

                                {{-- <a class="border-bottom" href="/">SaytMaster</a> tərəfindən hazırlanmışdır --}}
                            </div>
                            {{-- <div class="col-md-6 text-center text-md-end">
                                <div class="footer-menu">
                                    <a href="">Home</a>
                                    <a href="">Cookies</a>
                                    <a href="">Help</a>
                                    <a href="">FQAs</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->


            <!-- Back to Top -->
            <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i
                    class="bi bi-arrow-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/front/lib/wow/wow.min.js"></script>
        <script src="/front/lib/easing/easing.min.js"></script>
        <script src="/front/lib/waypoints/waypoints.min.js"></script>
        <script src="/front/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="/front/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="/front/lib/lightbox/js/lightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="/front/js/main.js?v=1"></script>
        @yield('script')
</body>

</html>
