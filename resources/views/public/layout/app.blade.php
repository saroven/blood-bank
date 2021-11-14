<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap"
      rel="stylesheet"
    />
    <!-- Css Styles -->
    <link
      rel="stylesheet"
      href="{{ asset('visitor/css/style.css') }}"
      type="text/css"
    />
    <title>@yield('title', 'Blood Donation')</title>
    <!-- End Google Tag Manager -->
  </head>

  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript
      ><iframe
        src="https://www.googletagmanager.com/ns.html?id=GTM-TCTCDH7"
        height="0"
        width="0"
        style="display: none; visibility: hidden"
      ></iframe
    ></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="preloder">
      <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    <div class="header_section" id="header_section">
      <header class="header-section">
        <div class="container-fluid">
          <div class="inner-header">
            <div class="logo">
              <a href="{{ route('public.home') }}"
                ><img src="{{ asset('visitor/img/logo.png') }}" alt=""
                /></a>
            </div>

            <ul class="mobile_device_top_menu d-sm-none">
              <li>
                <a href="{{ route('login') }}" style="margin-left: 0"> login </a>
              </li>
              <li>
                <a href="{{ route('register') }}" class="active">Register</a>
              </li>
            </ul>

            <nav class="main-menu mobile-menu">
              <ul>
                <li>
                  <a href="{{ route('public.home') }}"
                    ><i class="fa fa-home d-md-none"></i> Home
                  </a>
                </li>
                <li>
                  <a href="{{ route('public.volunteer') }}"
                    ><i class="fa fa-users d-md-none"></i>Volunteer
                  </a>
                </li>
                <li>
                  <a href="{{ route('public.bloodRequest') }}"
                    ><i class="fa fa-medkit d-md-none"></i> Blood Request
                  </a>
                </li>
                <li>
                  <a href="#"
                    ><i class="fa fa-rss d-md-none"></i> Blog
                  </a>
                </li>
                <li>
                  <a href="{{ route('public.userGuide') }}"
                    ><i class="fa fa-file-text-o d-md-none"></i> User Guide
                  </a>
                </li>
                <li>
                  <a href="{{ route('public.contact') }}"
                    ><i class="fa fa-envelope d-md-none"></i> Contact
                  </a>
                </li>
                  <?php
                  if (!Auth::check()){
                   ?>
                  <li>
                  <a class="btn btn-sm btn-primary login-btn login" href="{{ route('login') }}">Login</a>
                </li>
                  <li>
                      <a class="btn btn-sm btn-danger login-btn" href="{{ route('logout') }}">Register</a>
                  </li>
                  <?php
                    }else{
                  ?>
                  <li>
                  <a class="btn btn-sm btn-primary login-btn login" href="#">Profile</a>
                </li>
                  <li>
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button class="btn btn-danger login-btn">Logout</button>
                      </form>
                </li>
                  <?php
                   }
                   ?>
                  <style>
                      .login-btn{
                          color: white !important;
                      }
                      .login-btn:hover{
                          animation: none !important;
                          text-decoration: none !important;
                      }
                  </style>
              </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
          </div>
        </div>
      </header>
    </div>
    <!-- Header End -->
    @yield('main')
    <!-- Footer Section Begin -->
    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4">
            <div class="footer-item">
              <div class="footer-logo">
                <a href="{{ route('public.home') }}"
                  ><img src="{{ asset('visitor/img/logo.png') }}" alt=""
                /></a>
              </div>
              <p>Service to humanity is the main goal of us.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="footer-item">
              <ul class="footer-menu">
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('public.userGuide') }}">User Guide</a></li>
                <li><a href="{{ route('public.faq') }}">Frequently Asked Questions</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="{{ route('public.tmc') }}">Terms and Condition</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-4">
            <div class="footer-item">
              <h5>Contact Information</h5>
              <ul>
                <li>
                  <img src="{{ asset('visitor/img/placeholder.png') }}" alt="" /> Mirpur, Dhaka - 1216
                </li>
                <li>
                  <img src="{{ asset('visitor/img/phone.png') }}" alt="" /> 01833825028
                </li>
                <li>
                  <img src="{{ asset('visitor/img/contact-us.png') }}" alt="" />
                  <a href="{{ route('public.contact') }}">Contact</a>
                </li>
                <li>
{{--                    <img src="{{ asset('visitor/img.') }}" alt="">--}}
{{--                  <a href="https://facebook.com/sarovenbd"--}}
{{--                    >fb.com/sarovenbd</a>--}}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="copyright-type">
          <div class="small">
            All right reserved
            <span class="en">
              &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
            </span>
            Made with love by
            <a href="https://fb.com/shahalam.roven">saroven</a>
          </div>
        </div>
      </div>
    </footer>
    <!-- Js Plugins -->
    <script src="{{ asset('visitor/js/script.js') }}"></script>
    <div class="modal" id="modal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="font-size: 18px"></h4>
            <button type="button" class="close" data-dismiss="modal">
              &times;
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <img
              src="{{ asset('visitor/img/loading.gif') }}"
              alt="Loading"
              title="Loading"
              style="height: 70px; margin: 0 auto; display: block"
            />
          </div>
        </div>
      </div>
    </div>
    <script>
      function loadModal(url) {
        $(".modal-body").load(url);
      }
    </script>
  </body>
</html>
