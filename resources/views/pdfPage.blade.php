<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>pagePdf</title>
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
                <h1 class="mb-5 mt-5  font text-center">معلومات المترشح</h1>
                    <div class="card">
                    <div class="student-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header" style="height:8rem;">
                                <h3 class="mb-5 mt-5  font text-center">معلومات
                                    شخصية</h3>
                                    </div>
                            </div>
                        </div>
                        
                        <br>
                        <div class="row">
                            <div class="col-lg-12 mb-4">
                            <div class="col-lg-12 text-center">
                                <img src="{{ asset('images/5239311.png') }}" alt="" style="width:200px; height:150px">
                            </div>
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
                                الاسم الكامل:
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->full_name }} --}}
                                mouhcine simani
                            </div>
                            <div class="col-lg-3 mb-4">
                                ر.ب.و:
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->cni }} --}}
                                v121212
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
                                مكان الازدياد :
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->lieu_naissance }} --}}
                                sidi yahya ou saad
                            </div>
                            <div class="col-lg-3 mb-4">
                                تاريخ الازدياد:
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->date_naissance }} --}}
                                12-12-2000
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
                                البريد الالكتروني:
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->email }} --}}
                                mouhcine@gmail.com
                            </div>
                            <div class="col-lg-3 mb-4">
                                الجنس :
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->sex }} --}}
                                home
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
                                الهاتف 1 :
                            </div>
                            <div class="col-lg-3 mb-4">
                                {{-- {{ $candidature->telephone_1 }} --}}
                                0564544323
                            </div>
                            <div class="col-lg-3 mb-4">
                                الهاتف 2 :
                            </div>
                            <div class="col-lg-3">
                                {{-- {{ $candidature->telephone_2 }} --}}
                                0534231234
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
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
                        <div class="row mr-4">
                            <div class="col-lg-3 mb-4">
                                العنوان
                            </div>
                            <div class="col-lg-9">
                                {{-- {{ $candidature->adresse }} --}}
                                sidi yahya ou saad
                            </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="card-header"style="height:8rem;">
                            <h3 class="mb-5 mt-5  font text-center">
                                معلومات ابوية</h3>
                        </div>
                    </div>
                    <div class="card-body">
                    
                        <div class="row mr-4">
                            <div class="col-lg-6">
                                <div class="mb-4 ">
                                    اسم القيم(ة) الديني(ة) الكامل :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->full_name_f }} --}}
                                </div>
                            </div>
                        
                            <div class="col-lg-6">
                                <div class="">
                                مهنته (ا) :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->profession_f }} --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4">
                            <div class="col-lg-6">
                                <div class="">
                                رقم الإنخراط  :
                                </div>
                                <div class="">
                                {{-- {{ $candidature->matricule }} --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                رقم البطاقة الوطنية  :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->cniP }} --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4 mt-4">
                            <div class="col-lg-6">
                                <div class="">
                                الجهة :
                                    meknes-fes
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                الاقليم : 
                                    meknes
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4 mt-4">
                            <div class="col-lg-6">
                                <div class="">
                                    اسم الزوج (ة) الكامل :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->full_name_m }} --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                مهنته (ا) :
                                </div>
                                <div class="col-lg-3">
                                    {{-- {{ $candidature->profession_m }} --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4 mt-4">
                            <div class="col-lg-6">
                                <div class="">
                                رقم هاتف الأب :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->tel_f }} --}}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                رقم هاتف الأم:
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->tel_m }} --}}
                                </div>
                            </div>
                        </div>
                        <div class="row mr-4 mt-4">
                            <div class="col-lg-6">
                                <div class="">
                                عنوان الأباء :
                                </div>
                                <div class="">
                                    {{-- {{ $candidature->adresse_parents }} --}}
                                </div>
                            </div>
                        </div>
     
                    </div>                  
                    </div>
                    </div>

                    <div class="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header"style="height:8rem;">
                                    <h3 class="mb-5 mt-5  font text-center">معلومات
                                        دراسية</h3>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="row mr-4 mt-4">
                                <div class="col-lg-6">
                                    <div class="">
                                    رقم مسار :
                                    </div>
                                    <div class="">
                                        {{-- {{ $candidature->cne }} --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                    المعدل السنوي للباكالوريا :
                                    </div>
                                    <div class="">
                                        {{-- {{ $candidature->note }} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mr-4 mt-4">
                                <div class="col-lg-6">
                                    <div class="">
                                        الميزة :
                                    </div>
                                    <div class="">
                                        {{-- {{ $candidature->mention }} --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        السنة الدراسية الجارية :
                                    </div>
                                    {{-- <div class="">
                                    {{ $candidature->anneUniversitaire }}
                                    </div> --}}
                                </div>
                            </div>
                            <div class="row mr-4 mt-4">
                                <div class="col-lg-6">
                                    <div class="">
                                        الجامعة   :
                                    </div>
                                    <div class="">
                                        {{-- {{ $candidature->universite }} --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        التخصص :
                                    </div>
                                    <div class="">
                                        {{-- {{ $candidature->filiere }} --}}
                                    </div>
                                </div>
                            </div>
                            <div class="row mr-4 mt-4">
                                <div class="col-lg-6">
                                    <div class="">
                                        المؤسسة :
                                    </div>
                                    <div class="">
                                    {{-- {{ $candidature->school }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    </div>
                    
                    <div class="card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-header"style="height:8rem;">
                                        <h3 class="mb-5 mt-5  font text-center">الشواهد المطلوبة</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        <div class="">
                                        شهادة الباكالوريا :
                                        </div>
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->AttestationBac)
                                                    <img src={{ asset('images/' . $candidature->AttestationBac) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4"></div>
                                    <div class="col-lg-12">
                                        بيان النقط :
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->photo)
                                                    <img src={{ asset('images/' . $candidature->photo) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                        <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                    </div>
                                    <div class="row mr-4 mt-4"></div>
                                    <div class="col-lg-12">
                                    شهادة عمل الأب :
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->photo)
                                                    <img src={{ asset('images/' . $candidature->photo) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                        <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                </div>
                                <div class="row mr-4 mt-4"></div>
                                    <div class="col-lg-12">
                                    شهادة الدخل السنوي للأب :
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->photo)
                                                    <img src={{ asset('images/' . $candidature->photo) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                        <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                </div>
                                <div class="row mr-4 mt-4"></div>
                                    <div class="col-lg-12">
                                    شهادة عمل الأم :
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->photo)
                                                    <img src={{ asset('images/' . $candidature->photo) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                        <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                </div>
                                <div class="row mr-4 mt-4"></div>
                                    <div class="col-lg-12">
                                    شهادة الدخل السنوي الأم :
                                    </div>
                                </div>
                                <div class="row mr-4 mt-4">
                                    <div class="col-lg-12">
                                        @foreach($candidatures as $candidature)
                                        @if ($candidature->photo)
                                                    <img src={{ asset('images/' . $candidature->photo) }}
                                                    style=" height: 100%; width: 100%;">
                                                @else
                                                        <img src={{ asset('asset/300x200.png') }} style=" height: 100%; width: 100%;">
                                                @endif 
                                        @endforeach
                                </div>
                                
                            </div>
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
