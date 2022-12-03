<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these  tags -->

    <!-- Title -->
<title>{{env('APP_NAME')}} - @yield('title')</title>
    @toastr_css
    @jquery
    @toastr_js
    @toastr_render
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('vendor/main/stylecss.css')}}">
</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="loading" style="display:none;">
            <div class="spinner"></div>
            <br/>
            Vui lòng chờ...
        </div>

    <div class="loader d-flex align-items-center justify-content-center">
            <div class="lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                    <a href="{{url('/')}}" class="nav-brand text-white text-center">NHẠC VIỆT</a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                <li><a href="{{url('/')}}">Trang chủ</a></li>
                                    <li><a href="{{url('/albums')}}">Albums</a></li>
                                     <li><a href="{{url('/events')}}">Sự kiện</a></li>
                                    <li><a href="{{url('/musics')}}">Bài hát</a></li>
                                    <li><a href="{{url('/contact')}}">Góp Ý</a></li>

                                    @if (Auth::check())
                                        <li><a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="text-uppercase">{{Auth::user()->name}}</a></li>
                                    @endif
                                    @if(!Auth::check())   
                                        <li><a href="{{url('/register')}}">Đăng ký</a></li>
                                        <li><a href="{{url('/login')}}">Đăng nhập</a></li>                                
                                    @endif
                                </ul>

                                @if (Auth::check())
                                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                  <div class="offcanvas-header">
                                    <h5 id="offcanvasRightLabel">Trang quản lý</h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                  </div>
                                  <div class="offcanvas-body">
                                    <p>Xin chào: {{Auth::user()->name}}</p>
                                    <p>Email: {{Auth::user()->email}}</p>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <em class="fa fa-power-off mr-1"></em>
                                    Đăng xuất
                                 
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                  </div>
                                </div>
                                @endif

                                <!-- Login/Register & Cart Button -->

                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('img/bg-img/breadcumb3.jpg')}});">
        <div class="bradcumbContent">
            <p></p>
            <h2>@yield('title')</h2>
        </div>
    </section>
    <section class="contact-area">
        <div class="container">

            @yield('content')
        </div>
    </section>


</div>
</section>
<!-- ##### Contact Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area section-padding-100">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
            <a href="#" class="text-white h4">WEBMUSIC</a>
                <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                    <li><a href="{{url('/')}}">Trang Chủ</a></li>
                        <li><a href="{{url('/albums')}}">Albums</a></li>
                        <li><a href="{{url('/events')}}">Sự Kiện</a></li>
                        <li><a href="{{url('/musics')}}">Bài hát</a></li>
                        <li><a href="{{url('/contact')}}">Góp Ý</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{asset('vendor/main/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('vendor/main/js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap js -->
<script src="{{asset('vendor/main/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('vendor/main/js/plugins/plugins.js')}}"></script>
<!-- Active js -->

<script src="{{asset('vendor/main/js/active.js')}}"></script>

</body>
</html>
