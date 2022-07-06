<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>منحة التفوق</title>
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('newFolder/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/icheck-bootstrap/icheck-bootstrap.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/jqvmap/jqvmap.min.css ') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('newFolder/dist/css/adminlte.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/overlayScrollbars/css/OverlayScrollbars.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/daterangepicker/daterangepicker.css ') }}">
    <link rel="stylesheet" href="{{ asset('newFolder/plugins/summernote/summernote-bs4.css ') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('newFolder/dist/css/custom.css') }}">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        * {
            font-family: 'DroidArabicKufiRegular';
        }

        a {
            text-decoration: none;
        }

        nav.navbar,
        a.navbar {
            background-color: #222222 !important;
        }

        .butn {
            cursor: pointer !important;
        }

        .butn i {
            color: white !important;
        }

        .butn:hover i {
            color: #ffffff !important;
        }

        ul.navigation li a.active,
        ul.navigat li a.active {
            background-color: #676767 !important;
            font-weight: bold !important;

        }

        ul.navigation li a.active p,
        ul.navigat li a.active p {
            color: white !important;
        }

    </style>


</head>
@php
$tab = Auth::user()->unreadNotifications;
@endphp

<body class="hold-transition sidebar-mini layout-fixed">
    <nav class="main-header navbar navbar-expand navbar fixed-top">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars text-orange"></i></a>
            </li>
        </ul>
        {{-- <form class="form-inline my-2 my-lg-0" methode="GET" action="{{ route('boursier.search') }}">
            <input type="text" name="query" value="{{ isset($searchterm) ? $searchterm : '' }}" cols="30" rows="4"
                class="bg-gray-100 border-2  p-1 rounded-lg " placeholder="Search products..." aria-label="Search">
            <button class="btn btn-success btn-sm rounded text-white " type="submit"> ابحث</button>
        </form> --}}
        @can('searchglobal')
        <form class="form-inline my-2 my-lg-0" methode="get" action="{{ route('boursier.searchMaster') }}">
            <input type="text" name="mot" class="bg-gray-100 border-2 w-75  p-1 rounded-lg "
                placeholder="ابحث ب : ر.ق.م أو الاسم أو الجهة أو الاقليم" aria-label="Search">
            <button class="btn btn-danger btn-sm rounded text-white " type="submit"> ابحث</button>
        </form>
        @endcan
        <ul class="navbar-nav mr-auto-navbav">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell text-white"></i>
                    <span id="js-count" class="badge  navbar-badge bg-danger">
                        {{ Auth::user()->unreadNotifications->count() }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header text-center"><a class="btn text-bold "
                            href="{{ url('/boursier/notification/read') }}">Mark as
                            read</a></span>
                    <div class="dropdown-divider"></div>
                    @if (Auth::user()->unreadNotifications->count() != 0)
                        @foreach (Auth::user()->unreadNotifications as $notification)
                            <a href="{{ url($notification->data['url']) }}" class="dropdown-item">
                                <i class="fas fa-exclamation-triangle mr-2"></i>
                                <p>{{ $notification->data['objet'] }}</p>
                                <span
                                    class="float-right text-muted text-sm">{{ date('G ساعة و i دقيقة ', strtotime(now()) - strtotime($notification->created_at)) }}
                                    دقيقة</span>
                                <div class="dropdown-divider"></div>
                            </a>
                        @endforeach
                    @else
                        <a class="dropdown-item">
                            <span class="float-right text-muted text-sm">لا توجد اي اشعارات</span>
                            <div class="dropdown-divider"></div>
                        </a>
                    @endif
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }} <i class="fa fa-chevron-circle-down text-white"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a class="dropdown-item  " href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt " style="transform: rotate(180deg)"></i> تسجيل الخروج
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                </div>

            </li>
        </ul>

    </nav>
    <div class="wrapper">
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style=" background: rgb(86,86,86);  ">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link navbar" style="    height: 56px !important;">
                <img src="{{ asset('newFolder/images/logo-fondation.png') }}" alt="" style="height: 80px;
                position: relative;
                top: -20px;">
                {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image " style="width: 100px !important">
                        <img src="{{ asset('newFolder/images/icon.png') }}" class="img-circle elevation-2"
                            style="width: 100px !important" alt="User Image">
                    </div>
                    <div class="info mt-5">
                        <a href="{{ url('/boursier/dashboard') }}" class="d-block text-bold">منحة التفوق</a>
                    </div>
                </div>
                <!-- Sidebar user panel (optional) -->
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image mt-0">
                        <img src="{{ asset('newFolder/images/icon.png') }}"
                            class="img-circle text-white w-50 ml-5 mr-5 " alt="User Image">
                        <br>
                        <h5 class="text-center">منحة التفوق</h5>
                    </div>
                </div> --}}
                {{-- <div class="user-panel pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('newFolder/images/icon.png') }}" class="img-circle  elevation-2"
                            alt="User Image">
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('newFolder/images/icon.png') }}" class="w-50" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> منحة التفوق</a>
                    </div>
                </div> --}}
                <!-- Sidebar Menu -->
                @can('filtre')
                <form action="{{ route('config') }}" method="post">
                    @csrf
                    @php
                        $config = App\Models\Config::first();
                    @endphp
                    <div class="row" style="padding-right: 0px !important;">
                        <div class="col-lg-6">
                            <label class="text-white">س.الدراسية</label>
                            <input class="form-control" type="text" name="anne_universitaire"
                                value="{{ $config->anne_universitaire }}" placeholder="anne">
                        </div>
                        <div class="col-lg-6">
                        <label class="text-white">الفوج </label>

                            <input class="form-control" type="text" name="promotion" value="{{ $config->promotion }}"
                                placeholder="promotion">
                        </div>
                        <div class="col-lg-12" style="text-align: center; padding-top: 10px;">
                            <button class="btn btn-warning text-white">تغيير</button>
                        </div>
                    </div>
                </form>
                @endcan
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview">
                            <a href="{{ url('boursier/dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt text-orange"
                                    style="    width: 20px !important;"></i>
                                <p>
                                    الصفحة الرئيسيـــــــة </p>
                            </a>
                        </li>
                        @can('actualite_access')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                    <i class="fas fa-bullhorn text-orange" style="    width: 20px !important;"></i>
                                    <p>
                                        الاعلانـــــــــــــــــــــــــــــات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('actualite_create')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/actualites/create') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>اضافة
                                                    اعلان</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('actualite_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/actualites') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>
                                                    لائحة
                                                    الاعلانات</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('statistique')
                        <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                    <i class="fas fa-chart-area text-orange" style="    width: 20px !important;"></i>
                                    <p>
                                        الاحصائيـــــــــــــــــــــــات
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('statistique_global')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/statistics') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> احصائيــــــــــات عامة
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                        </li>
                        @endcan
                        @can('user_mangement_acces')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    {{-- <i class="nav-icon fas fa-copy"></i> --}}
                                    <i class="fas fa-tasks text-orange" style="    width: 20px !important;"></i>
                                    <p>
                                        تدابيـــــــــــــــــــــــــــــــــــــــر
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('role_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.roles.index') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> الدور</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('permission_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.permissions.index') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>الرخص </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('user_liste')
                                        <li class="nav-item">
                                            <a href="{{ route('boursier.users.index') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> المستعمل</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('controle')
                                     <li class="nav-item">
                                        <a href="{{ url('boursier/setting') }}" class="nav-link"
                                            style="margin-right: 14px !important;">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p> اعدادات</p>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('service_acces')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy text-orange" style="    width: 20px !important;"></i>
                                    <p> خدمـــــــــــــــــــــــــــــــــات
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('formation_liste') -
                                        <li class="nav-item">
                                            <a href="{{ url('/boursier/formations') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>لائحة
                                                    الدورات التكوينية</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('stage_liste')
                                        <li class="nav-item">
                                            <a href="{{ url('/boursier/stages') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> لائحة التدريبات
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('demande_service')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/demandes/service') }}" class="nav-link"> <i
                                                    class="far fa-circle nav-icon" style="margin-right: 18px !important;"></i>
                                                طلب </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('reclamation_service')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-exclamation-triangle text-orange"></i>
                                    <p> شكايــــــــــــــــــــــــــــــات
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('reclamation_form')

                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reclamation/create') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> استمارة
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('reclamation_boite')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reclamation') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> علبة الشكايات
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('reclamation_archive')
                                        <li class="nav-item">
                                            {{-- <a href="{{ url('boursier/reclamation') }}" class="nav-link" --}}
                                            {{-- style="margin-right: 14px !important;"> --}}
                                            <a href="/boursier/reclamationArchivees" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> ارشيف الشكايات
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('inscription')
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-user text-orange" style="    width: 20px !important;"></i>
                                    <p>التسجيـــــــــــــــــــــــــــــل
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @can('demande_reinscription')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reinscription') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p>طلب إعادة التسجيل</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('changer_information')
                                        <li class="nav-item">
                                            <a href="{{ url('boursier/reinscription/modification') }}" class="nav-link"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p> تغيير المعلومات</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('liste')
                            <li class="nav-item ">
                                <a href="{{ url('/boursier/liste') }}" class="nav-link">
                                    <i class="fas fa-user text-orange" style="    width: 20px !important;"></i>
                                    <p>اللــــــــــــــــــــــــــــوائــــح
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-pills navigation" role="tablist">
                                    @can('candidats')
                                        <li class="nav-item">
                                            <a class="nav-link active butn" id="nav-candidats-tab" data-bs-toggle="tab"
                                                data-bs-target="#candidats" role="tab" aria-controls="nav-candidats"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> المرشحين
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('reinscription')
                                        <li class="nav-item">
                                            <a class="nav-link butn" id="nav-listeRein-tab" data-bs-toggle="tab"
                                                data-bs-target="#listeRein" role="tab" aria-controls="nav-listeRein"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> اعادة التسجيل</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('boursiers')
                                        <li class="nav-item">
                                            <a class="nav-link butn" id="nav-boursiers-tab" data-bs-toggle="tab"
                                                data-bs-target="#boursiers" role="tab" aria-controls="nav-boursiers"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> الطلبة الممنوحين</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('archive')
                                        <li class="nav-item">
                                            <a class="nav-link butn" id="nav-archives-tab" data-bs-toggle="tab"
                                                data-bs-target="#archives" role="tab" aria-controls="nav-archives"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> الارشيـــــف</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('exceptions')
                                        <li class="nav-item">
                                            <a class="nav-link butn" id="nav-exceptions-tab" data-bs-toggle="tab"
                                                data-bs-target="#exceptions" role="tab" aria-controls="nav-exceptions"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> exceptions</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endcan
                        @can('etudiant')
                            <li class="nav-item has-treeview">
                                <a href="{{ url('boursier/etudiant/liste') }}" class="nav-link">
                                    <i class="fas fa-info text-orange" style="    width: 20px !important;"></i>
                                    <p> معلومات
                                        الطالـــــــــــب
                                        {{-- <i class="fas fa-angle-left right"></i> --}}
                                    </p>
                                </a>
                                {{-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('boursier/etudiantListe') }}" class="nav-link"
                                        style="margin-right: 14px !important;">
                                        <i class="far fa-circle nav-icon"></i>
                                        لائحة الطلبة

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/listeDocs') }}" class="nav-link"
                                        style="margin-right: 14px !important;">
                                        <i class="far fa-circle nav-icon"></i>
                                        الوثائق
                                    </a>
                                </li>
                            </ul> --}}
                            </li>
                        @endcan
                        @can('information_personnelle')
                            <li class="nav-item has-treeview">
                                <a href="{{ url('boursier/etudiant/profile') }}" class="nav-link">
                                    <i class="fas fa-user text-orange" style="    width: 20px !important;"></i>
                                    <p> معلومات شخصيــــــــــة
                                    </p>
                                </a>
                            </li>
                        @endcan
                        @can('liste_demande')
                            <li class="nav-item ">
                                <a href="{{ url('/boursier/demande/paiement') }}" class="nav-link">
                                    <i class="fas fa-user text-orange" style="    width: 20px !important;"></i>
                                    <p> قائمة الطلبات
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                @can('list_payement')
                                    <ul class="nav nav-pills navigat" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active butn" id="nav-addae-tab" data-bs-toggle="tab"
                                                data-bs-target="#addae" role="tab" aria-controls="nav-addae"
                                                aria-selected="true" onclick="CLICK(this , 'btn')"
                                                style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> قائمة الأداء
                                                </p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('list_change')
                                        <li class="nav-item">
                                            <a class="nav-link butn" id="nav-sarf-tab" data-bs-toggle="tab"
                                                data-bs-target="#sarf" role="tab" aria-controls="nav-sarf" aria-selected="true"
                                                onclick="CLICK(this , 'btn')" style="margin-right: 14px !important;">
                                                <i class="far fa-circle nav-icon"></i>
                                                <p class="text-white-50"> قائمة الصرف </p>
                                            </a>
                                        </li>
                                    </ul>
                                @endcan
                            </li>
                        @endcan
                        @can('forum_action')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user text-orange" style="    width: 20px !important;"></i>
                                <p>المنتــــــــــــــــــــــــــــــدى
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('boursier/market/create') }}" class="nav-link"
                                        style="margin-right: 14px !important;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>اضافة عرض أو طلب</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('boursier/market/promotions') }}" class="nav-link"
                                        style="margin-right: 14px !important;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>العروض</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('boursier/market/demandes') }}" class="nav-link"
                                        style="margin-right: 14px !important;">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>الطلبات</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endcan
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="content-wrapper" style="min-height: 267px; padding-top: 40px !important ;">
            @yield("content")
        </div>
    </div>




<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>

    <script src="{{ asset('newFolder/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('newFolder/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/jqvmap/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <script src="{{ asset('newFolder/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script>
        window.User = {
            id: {{ optional(Auth::user())->id }}
        }
    </script>
    <script src="{{ asset('js/app.js') }}"> </script>

    {{-- <script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script> --}}
    <script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $('#example122').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example22').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            if (window.location.href == "http://localhost:8000/boursier/liste") {
                $('.navigation').show();
            } else {
                $('.navigation').hide();
            }
        })
        $(document).ready(function() {
            if (window.location.href == "http://localhost:8000/boursier/demande/paiement") {
                $('.navigat').show();
            } else {
                $('.navigat').hide();
            }
        })
    </script>
</body>

</html>
