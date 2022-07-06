<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>منحة التفوق</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset/files/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/main.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('asset/files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/fonts/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/files/css/style.css') }}">
    <script src="{{ asset('asset/files/js/modernizr-3.6.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/files/css/style.css') }}">
    <script src="{{ asset('asset/files/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <style>
        * {
            font-family: 'DroidArabicKufiRegular';
        }

        a {
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div id="preloader"></div>
    <div id="wrapper" class="wrapper bg-ash">
        <div class="navbar navbar-expand-md header-menu-one bg-light">
            <div class="nav-bar-header-one">
                <div class="header-logo">
                    <a href="index.html">
                        <img src="{{ asset('asset/files/img/logo.png') }}" alt="logo">
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
            </div>
            <div class="d-md-none mobile-nav-bar">
                <button class="navbar-toggler pulse-animation" type="button" data-toggle="collapse"
                    data-target="#mobile-navbar" aria-expanded="false">
                    <i class="far fa-arrow-alt-circle-down"></i>
                </button>
                <button type="button" class="navbar-toggler sidebar-toggle-mobile">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-main-menu collapse navbar-collapse" id="mobile-navbar">
                <ul class="navbar-nav">
                    <li class="navbar-item header-search-bar">
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="navbar-item dropdown header-admin">
                        <a class="navbar-nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                            aria-expanded="false">
                            <div class="admin-title">
                                <h5 class="item-title">{{ Auth::user()->name }} </h5>
                                <span>{{ Auth::user()->role }}</span>
                            </div>
                            <div class="admin-img">
                                <img src="{{ asset('asset/files/img/figure/admin.jpg') }}" alt="Admin">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">{{ Auth::user()->name }} </h6>
                            </div>
                            <div class="item-content">
                                <ul class="settings-list">
                                    <li><a href="#"><i class="flaticon-user"></i>معلوماتي الشخصية</a></li>
                                    <li><a href="#"><i class="flaticon-gear-loading"></i>تعديل معلوماتي</a></li>
                                    <li> <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="flaticon-turn-off"></i>تسجيل الخروج
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="post"
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
                            <div class="item-title d-md-none text-16 mg-r-10">Message</div>
                            <span>5</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">05 Message</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-img bg-violet-blue">
                                        <img src="img/figure/student11.png" alt="img">
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="item-title">
                                            <a href="#">
                                                <span class="item-name">Joshep Joe</span>
                                                <span class="item-time">12:35</span>
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
                            <div class="item-title d-md-none text-16 mg-r-10">Notification</div>
                            <span>8</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="item-header">
                                <h6 class="item-title">03 Notifiacations</h6>
                            </div>
                            <div class="item-content">
                                <div class="media">
                                    <div class="item-icon bg-violet-blue">
                                        <i class="fas fa-cogs"></i>
                                    </div>
                                    <div class="media-body space-sm">
                                        <div class="post-title">Update Password</div>
                                        <span>45 Mins ago</span>
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
            <div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color">
                <div class="mobile-sidebar-header d-md-none">
                    <div class="header-logo">
                        <a href="index.html"><img src="img/logo1.png" alt="logo"></a>
                    </div>
                </div>
                <div class="sidebar-menu-content">
                    <ul class="nav nav-sidebar-menu sidebar-toggle-view">
                        @can('dashboard_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="{{ url('boursier/dashboard') }}" class="nav-link icon"><i
                                        class="flaticon-dashboard"></i><span>الصفحة
                                        الرئيسية
                                    </span></a>
                            </li>
                        @endcan
                        @can('actualite_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="fas fa-user"></i><span>
                                        الاعلانــــــــــــــــــــــات
                                    </span></a>
                                <ul class="nav sub-group-menu">
                                    @can('actualite_create')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/actualites/create') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>اضافة
                                                اعلان</a>
                                        </li>
                                    @endcan
                                    @can('actualite_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/actualites') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>لائحة
                                                الاعلانات</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('user_mangement_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="fas fa-user"></i><span>
                                        management
                                    </span></a>
                                <ul class="nav sub-group-menu">
                                    @can('role_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.roles.index') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>role</a>
                                        </li>
                                    @endcan
                                    @can('permission_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.permissions.index') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>permission</a>
                                        </li>
                                    @endcan
                                    @can('user_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.users.index') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>User</a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('service_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="flaticon-shopping-list"></i><span>
                                        خدمــــــــــــــــــــــــــات
                                    </span></a>
                                <ul class="nav sub-group-menu">
                                    @can('formation_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/formations') }}" class="nav-link"><i
                                                    class="fas fa-angle-left"></i> لائحة
                                                الدورات التكوينية</a>
                                        </li>
                                    @endcan
                                    @can('stage_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/stages') }}" class="nav-link"><i
                                                    class="fas fa-angle-left"></i>
                                                لائحة طلبات التدريبات</a>
                                        </li>
                                    @endcan
                                    @can('demande_service')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/demandes/service') }}" class="nav-link"> <i
                                                    class="fas fa-angle-right"></i>
                                                طلب </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('reclamation_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="fas fa-exclamation-triangle"></i><span>شكايـــــــــــــــــــــــات</span></a>
                                <ul class="nav sub-group-menu">
                                    @can('reclamation_create')
                                        <li class="nav-item">
                                            <a href="{{ 'boursier/reclamation/create' }}" class="nav-link"> <i
                                                    class="fas fa-angle-right"></i>استمارة
                                            </a>
                                        </li>
                                    @endcan
                                    @can('reclamation_non_lus')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reclamation') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>
                                                علبة الشكايات</a>
                                            {{-- va contenir tout les réclamations : lues et non lues
                                        si je répond une ou plus , elles doivent etre en les réclamations lues --}}
                                        </li>
                                    @endcan
                                    @can('reclamation_archive')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reclamation') }}" class="nav-link"> <i
                                                    class="fas fa-angle-left"></i>
                                                ارشيف الشكايات </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('inscription_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i
                                        class="flaticon-classmates"></i><span>التسجيــــــــــــــــــــــل</span></a>
                                <ul class="nav sub-group-menu">

                                    @can('renouvellement_acces')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reinscription') }}" class="nav-link"> <i
                                                    class="fas fa-angle-right"></i>
                                                اعادة التسجيل</a>
                                        </li>
                                    @endcan
                                    @can('renouvellement_modification')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reinscription/modification') }}" class="nav-link">
                                                <i class="fas fa-angle-right"></i>تغيير المعلومات</a>
                                        </li>
                                    @endcan
                                    @can('candidats_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/candidature') }}" class="nav-link"><i
                                                    class="fas fa-angle-left"></i>
                                                لائحة المرشحين</a>
                                        </li>
                                    @endcan
                                    @can('renouvellement_demande_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/renouvellant') }}" class="nav-link">
                                                <i class="fas fa-angle-left"></i> طلبات اعادة التسجيل </a>
                                        </li>
                                    @endcan
                                    @can('etudiant_boursier')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/benefiant') }}" class="nav-link">
                                                <i class="fas fa-angle-left"></i> الطلبة الممنوحين </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('etudiant_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link"><i class="fas fa-info"></i><span> معلومات
                                        الطالــــب</span></a>
                                <ul class="nav sub-group-menu">
                                    @can('etudiant_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/etudiantListe') }}" class="nav-link"><i
                                                    class="fas fa-angle-left"></i>
                                                لائحة الطلبة</a>
                                        </li>
                                    @endcan
                                    @can('document_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/etudiantDocument') }}" class="nav-link">
                                                <i class="fas fa-angle-left"></i> الوثائق </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('profile_etudiant')
                            <li class="nav-item sidebar-nav-item">
                                <a href="{{ url('boursier/etudiant/profile') }}" class="nav-link"><i
                                        class="fas fa-user"></i><span> معلومـات
                                        شخصية </span></a>
                            </li>
                        @endcan
                        @can('archive_acces')
                            <li class="nav-item sidebar-nav-item">
                                <a href="#" class="nav-link icon"><i class="fas fa-archive"></i><span>
                                        الارشيــــــــــــــــــــــــف</span></a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </div>
            <div class="dashboard-content-one">
                @yield('content')
            </div>
        </div>
    </div>
    </div>









    <script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/plugins.js') }}"></script>
    <script src="{{ asset('asset/files/js/popper.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/moment.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/select2.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/Chart.min.js') }}"></script>
    <script src="{{ asset('asset/files/js/main.js') }}"></script>

</body>

</html>
