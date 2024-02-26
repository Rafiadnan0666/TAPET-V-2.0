<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Tapet V.2.0</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icon -->
    <link rel="icon" href="{{ asset('dist') }}/images/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/responsive.css" />
    <!-- color css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/colors.css" />
    <!-- select bootstrap -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/bootstrap-select.css" />
    <!-- scrollbar css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/perfect-scrollbar.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('dist') }}/css/custom.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="{{ route('dash') }}"><img class="logo_icon img-responsive"
                                    src="{{ asset('dist') }}/images/logo/logo_icon.png" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img"><img class="img-responsive"
                                    src="{{ asset('dist') }}/images/layout_img/user_img.jpg" alt="#" /></div>
                            <div class="user_info">
                                <h6>{{ Auth::user()->name }}</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>General</h4>
                    <ul class="list-unstyled components">
                        <li><a href="{{ route('dash') }}"><i class="fa fa-home white_color"></i>
                                <span>Dashboard</span></a>
                        </li>
                        <li class="active">
                            <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                                    class="fa fa-database white_color"></i> <span>Manage Data</span></a>
                            <ul class="collapse list-unstyled" id="dashboard">
                                <li>
                                    <a href="#">> <span>Manage Mentor</span></a>
                                </li>
                                <li>
                                    <a href="{{route("mahasantri.index")}}">> <span>Manage Mahasantri</span></a>
                                </li>
                                <li>
                                    <a href="{{route("setoran.index")}}">> <span>Manage Setoran</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">><i
                                        class="fa fa-sign-out white_color"></i>
                                    <span>Log Out</span></a>
                            </form>
                        </li>

                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section">
                                <a href="{{ route('dash') }}"><img class="img-responsive"
                                        src="{{ asset('dist') }}/images/logo/logo.png" alt="#" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><img
                                                    class="img-responsive rounded-circle"
                                                    src="{{ asset('dist') }}/images/layout_img/user_img.jpg"
                                                    alt="#" /><span class="name_user">{{ Auth::user()->name }}</span></a>
                                            <div class="dropdown-menu">
                                                <a href="{{ route('profile.edit') }}" class="dropdown-item"
                                                    href="{{ asset('dist') }}/profile.html">My
                                                    Profile</a>
                                                <a class="dropdown-item"
                                                    href="{{ asset('dist') }}/settings.html">Settings</a>
                                                <a class="dropdown-item" href="{{ asset('dist') }}/help.html">Help</a>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                this.closest('form').submit();"><span>Log
                                                            Out</span> <i class="fa fa-sign-out"></i></a>
                                                </form>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->
                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        @yield('konten')
                    </div>
                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                                Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('dist') }}/js/jquery.min.js"></script>
    <script src="{{ asset('dist') }}/js/popper.min.js"></script>
    <script src="{{ asset('dist') }}/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="{{ asset('dist') }}/js/animate.js"></script>
    <!-- select country -->
    <script src="{{ asset('dist') }}/js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="{{ asset('dist') }}/js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="{{ asset('dist') }}/js/Chart.min.js"></script>
    <script src="{{ asset('dist') }}/js/Chart.bundle.min.js"></script>
    <script src="{{ asset('dist') }}/js/utils.js"></script>
    <script src="{{ asset('dist') }}/js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="{{ asset('dist') }}/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="{{ asset('dist') }}/js/chart_custom_style1.js"></script>
    <script src="{{ asset('dist') }}/js/custom.js"></script>
</body>

</html>
