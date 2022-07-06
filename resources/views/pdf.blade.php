<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css ') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css ') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div
        style="margin-left: 120px !important ; margin-right : 120px !important ; padding-left:40px !important ; padding-right : 40px !important">
        <table>
            <div id="content">
                <!-- Student Info Area Start Here -->
                <div class="col-xl-12 col-lg-6 col-12 ">
                    <div class="student-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="mb-5 mt-5  font text-center">معلومات
                                    شخصية</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <img src="{{ asset('images/lf.png') }}" alt="" class="w-25">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                الاسم الكامل:
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->full_name }} --}}
                                mouhcine simani
                            </div>
                            <div class="col-lg-3">
                                ر.ب.و:
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->cni }} --}}
                                v121212
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                مكان الازدياد :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->lieu_naissance }} --}}
                                sidi yahya ou saad
                            </div>
                            <div class="col-lg-3">
                                تاريخ الازدياد:
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->date_naissance }} --}}
                                12-12-2000
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                البريد الالكتروني:
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->email }} --}}
                                mouhcine@gmail.com
                            </div>
                            <div class="col-lg-3">
                                الجنس :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->sex }} --}}
                                home
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                الهاتف 1 :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->telephone_1 }} --}}
                                0564544323
                            </div>
                            <div class="col-lg-3">
                                الهاتف 2 :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->telephone_2 }} --}}
                                0534231234
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                الحالة العائلية :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->situation }} --}}
                                celebataire
                            </div>
                            <div class="col-lg-3">
                                الحالة الجسدية :
                            </div>
                            <div class="col-lg-3">
                                sain
                                {{-- {{ $candidature->etat }} --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                العنوان
                            </div>
                            <div class="col-lg-9">
                                {{-- {{ $candidature->adresse }} --}}
                                sidi yahya ou saad
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-5 mt-5  font text-center">
                                معلومات ابوية</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            اسم القيم(ة) الديني(ة) الكامل :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->full_name_f }} --}}
                        </div>
                        <div class="col-lg-3">
                            (ا)مهنته :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->profession_f }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            رقم الإنخراط :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->matricule }} --}}
                        </div>
                        <div class="col-lg-3">
                            رقم البطاقة الوطنية :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->cniP }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            الجهة :
                        </div>
                        <div class="col-lg-3">
                            mknes-fes
                        </div>
                        <div class="col-lg-3">
                            الاقليم
                        </div>
                        <div class="col-lg-3">
                            meknes
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            اسم الزوج(ة) الكامل :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->full_name_m }} --}}
                        </div>
                        <div class="col-lg-3">
                            مهنته(ا) :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->profession_m }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            رقم هاتف الأب :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->tel_f }} --}}
                        </div>
                        <div class="col-lg-3">
                            رقم هاتف الأم:
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->tel_m }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            عنوان الأباء :
                        </div>
                        <div class="col-lg-9">
                            {{-- {{ $candidature->adresse_parents }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-5 mt-5  font text-center">معلومات
                                دراسية</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            رقم مسار :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->cne }} --}}
                        </div>
                        <div class="col-lg-3">
                            المعدل السنوي للباكالوريا :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->note }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            الميزة :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->mention }} --}}
                        </div>
                        <div class="col-lg-3">
                            السنة الدراسية الجارية :
                        </div>
                        {{-- <div class="col-lg-3">
                                                        {{ $candidature->anneUniversitaire }}
                                                    </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            الجامعة :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->universite }} --}}
                        </div>
                        <div class="col-lg-3">
                            التخصص :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->filiere }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            المؤسسة :
                        </div>
                        <div class="col-lg-3">
                            {{-- {{ $candidature->school }} --}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3 class="mb-5 mt-5  font text-center">
                                الشواهد المطلوبة</h3>
                        </div>
                    </div>
                    <br>
                    {{-- <div class="row"> --}}
                    {{-- <div class="col-lg-3">
                            شهادة الباكالوريا :
                        </div>
                        <div class="col-lg-3"> --}}

                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3">
                            بيان النقط :
                        </div>
                        <div class="col-lg-3"> --}}
                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-3">
                            شهادة عمل الأب :
                        </div>
                        <div class="col-lg-3"> --}}
                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3">
                            شهادة الدخل السنوي للأب :
                        </div>
                        <div class="col-lg-3"> --}}
                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-lg-3">
                            شهادة عمل الأم :
                        </div>
                        <div class="col-lg-3"> --}}
                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div>
                        <div class="col-lg-3">
                            شهادة الدخل السنوي الأم :
                        </div>
                        <div class="col-lg-3"> --}}
                    {{-- @if ($candidature->photo)
                                <img src={{ asset('images/' . $candidature->photo) }}
                                    style=" height: 70px; width: 70px;">
                            @else
                                <img src={{ asset('asset/300x200.png') }} style=" height: 70px; width: 70px;">
                            @endif --}}
                    {{-- <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                        </div> --}}
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100 h-100">
                    </div>
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                    </div>
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                    </div>
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                    </div>
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                    </div>
                    <div class="row">
                        <img src="{{ asset('images/lf.png') }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
    </div>
    </table>
    </div>






    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
</body>


</html>
