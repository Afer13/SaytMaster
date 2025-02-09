  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>SaytMaster - Admin</title>
      <meta content="" name="description">
      <meta content="" name="keywords">

      <!-- Favicons -->
      <link href="/admin/assets/img/favicon.png" rel="icon">
      <link href="/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

      <!-- Google Fonts -->
      <link href="https://fonts.gstatic.com" rel="preconnect">
      <link
          href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

      <!-- Vendor CSS Files -->
      <link href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
      <link href="/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
      <link href="/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

      <!-- Template Main CSS File -->
      <link href="/admin/assets/css/style.css?v=1.3" rel="stylesheet">
  </head>

  <body>

      <!-- ======= Header ======= -->
      <header id="header" class="header fixed-top d-flex align-items-center">

          <div class="d-flex align-items-center justify-content-between">
              <a href="/admin/blank" class="logo d-flex align-items-center">
                  <img src="/storage/{{ $setting->logo_2_url }}" alt="">
                  {{-- <span class="d-none d-lg-block">Sayt Master</span> --}}
              </a>
              <i class="bi bi-list toggle-sidebar-btn"></i>
          </div><!-- End Logo -->



          <nav class="header-nav ms-auto">
              <ul class="d-flex align-items-center">


                  <li class="nav-item dropdown pe-3">

                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                          data-bs-toggle="dropdown">
                          <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                          <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                      </a><!-- End Profile Iamge Icon -->

                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                          <li>
                              <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}">
                                  <i class="bi bi-box-arrow-right"></i>
                                  <span>Logout</span>
                              </a>
                          </li>
                      </ul><!-- End Profile Dropdown Items -->
                  </li><!-- End Profile Nav -->

              </ul>
          </nav><!-- End Icons Navigation -->

      </header><!-- End Header -->

      <!-- ======= Sidebar ======= -->
      <aside id="sidebar" class="sidebar">

          <ul class="sidebar-nav" id="sidebar-nav">

              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/blank">
                      <i class="bi bi-grid"></i>
                      <span>Home</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/applications">
                      <i class="bi bi-envelope"></i>
                      <span>Applications</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/application-shorts">
                      <i class="bi bi-envelope"></i>
                      <span>Application Shorts</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/contact-messages">
                      <i class="bi bi-chat"></i>
                      <span>Contact Messages</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/posts">
                      <i class="bi bi-newspaper"></i>
                      <span>Posts</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/services">
                      <i class="bi bi-gear"></i>
                      <span>Services</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/portfolios">
                      <i class="bi bi-aspect-ratio"></i>
                      <span>Portfolios</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/about">
                      <i class="bi bi-journal-text"></i>
                      <span>About Us</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" href="/admin/setting">
                      <i class="bi bi-gear"></i>
                      <span>Setting</span>
                  </a>
              </li>
          </ul>

      </aside>


      <!-- ======= MAIN ======= -->
      @yield('main')

      <!-- ======= Footer ======= -->
      <footer id="footer" class="footer">
          <div class="copyright">
              &copy; Copyright <strong><span>SaytMaster</span></strong>. All Rights Reserved
          </div>
      </footer>

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
              class="bi bi-arrow-up-short"></i></a>

      <!-- Vendor JS Files -->
      <script src="/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
      <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="/admin/assets/vendor/chart.js/chart.umd.js"></script>
      <script src="/admin/assets/vendor/echarts/echarts.min.js"></script>
      <script src="/admin/assets/vendor/quill/quill.js"></script>
      <script src="/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
      <script src="/admin/assets/vendor/tinymce/tinymce.min.js"></script>
      <script src="/admin/assets/vendor/php-email-form/validate.js"></script>

      <!-- Template Main JS File -->
      <script src="/admin/assets/js/main.js"></script>
      <script src="/admin/assets/js/jquery-3-7-1.min.js"></script>
      @yield('script')
      <script>
          function getCsrf() {
              return $('meta[name="csrf-token"]').attr('content');
          }
      </script>
  </body>

  </html>
