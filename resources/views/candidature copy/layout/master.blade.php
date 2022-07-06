<!doctype html>
<html class="no-js" lang="" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>فضاء التسجيل</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/bootstrap.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/fonts/flaticon.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/animate.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/select2.min.css')}}">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="{{ asset('asset/files/css/style.css')}}">
    <!-- Modernize js -->
    <script src="{{ asset('asset/files/js/modernizr-3.6.0.min.js')}}"></script>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <style>
        .font {
            font-family: 'DroidArabicKufiRegular'; 
        } 
        </style>
</head>

<body class="font">
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        <div class="navbar navbar-expand-md header-menu-one bg-light" >
            {{-- <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{ asset('asset/files/img/logo.png')}}" alt="logo">
                    </a>
                </div>
                <div class="toggle-button sidebar-toggle">
                    <button type="button" class="item-link">
                        <span class="btn-icon-wrap">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>
                </div>
            </div> --}}
            <div class="d-md-none mobile-nav-bar">
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                {{-- <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button> --}}
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar" style="height: 7% !important;" > 
                <ul class="navbar-nav" >
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ $Candidature->full_name }}</h5> 
                            </div>
                            {{-- <div class="admin-img">
                                <img src="{{ asset('asset/files/img/figure/admin.jpg')}}" alt="Admin">
                            </div> --}}
                            @if($Candidature->photo)
                            <img src={{ asset('images/'.$Candidature->photo) }} style="width: 35px;    height: 35px;
                            border-radius: 50%;" name="image" class="text-center">
                            @else
                            <img src={{ asset('asset/300x200.png') }} style="width:35px;    height: 35px;
                                border-radius: 50%; " class="text-center">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ $Candidature->full_name }}</h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    {{-- <li><a href="#"><i class="flaticon-user"></i>My Profile</a></li>
                                    <li><a href="#"><i class="flaticon-list"></i>Task</a></li>
                                    <li><a href="#"><i
                                                class="flaticon-chat-comment-oval-speech-bubble-with-text-lines"></i>Message</a>
                                    </li>
                                    <li><a href="#"><i class="flaticon-gear-loading"></i>Account Settings</a></li> --}}
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            <i class="flaticon-turn-off"></i>تسجيل الخروج
                                        </a>
                                        <form id="logout-form" action="{{ route('logout')}}" method="post"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-message">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-envelope"></i>
                            <div class="item-title d-md-none text-16 mg-r-10">رسائل</div>
                            <span>5</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">05 Message</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-img bg-skyblue author-online">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Maria Zaman</span>
                                                <span class="item-time">18:30</span>
                                            </a>
                                        </div>
                                        <p>What is the reason of buy this item.
                                            Is it usefull for me.....</p>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </li>
                    <li class="navbar-item dropdown header-notification">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <i class="far fa-bell"></i>
                            <div class="item-title d-md-none text-16 mg-r-10">اشعارات</div>
                            <span>8</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">03 Notifiacations</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-icon bg-skyblue">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Complete Today Task</div>
                                        <span>1 Mins ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            {{-- <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">



                    </ul>
                </div>
            </div> --}}
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one" style="margin-left: 10% !important ; margin-right : 10% !important ">
                @yield('content')
                <footer class="footer-wrap-layout1">
                </footer>
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>
    <!-- jquery-->
    <script src="{{ asset('asset/files/js/jquery-3.3.1.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('asset/files/js/plugins.js')}}"></script>
    <!-- Popper js -->
    <script src="{{ asset('asset/files/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('asset/files/js/bootstrap.min.js')}}"></script>
    <!-- Select 2 Js -->
    <script src="{{ asset('asset/files/js/select2.min.js')}}"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('asset/files/js/jquery.scrollUp.min.js')}}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('asset/files/js/main.js')}}"></script>

</body>

</html>