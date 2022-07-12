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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f1f3 !important;
        }


        * {
            font-family: 'DroidArabicKufiRegular';
        }

        a {
            text-decoration: none;
        }

        header {
            background-color: white !important;
        }

        header img {
            padding-right: 30px;
            width: 290px !important;
        }

        section {
            margin-top: 80px !important;
        }

        section img {
            margin-bottom: 70px !important;
            height: 40vh !important;
            width: 100%;
        }

        .phrase {
            position: relative;
            top: 240px;
            text-align: center;
        }

        .paragraphe {
            margin-top: 50px !important;
            margin-bottom: 100px !important;
        }

        .titre1 {
            padding-left: 30px !important;
            padding-right: 30px !important;
        }

        .titre2 {
            padding-left: 90px !important;
            padding-right: 90px !important;
        }

        .titre3 {
            padding-left: 70px !important;
            padding-right: 70px !important;
        }

        h1 {
            color: orange !important;
            font-weight: bold;
        }

        ul li {
            font-family: "Arial black", Helvetica, sans-serif;
        }



        footer {
            background-color: #610505 !important;
            color: white;
            padding-top: 40px !important;
            padding-bottom: 40px !important;
        }

        .btn-model {
            width: 100px !important;
            background: orange !important;
            border-radius: 20px !important;
            box-shadow: 3px 8px 3px black !important;
            font-size: 1em !important;
            color: black !important;
        }

        @media screen and (max-width: 768px) {
            ul {
                justify-content: center !important;
                text-align: center !important;
            }

            ul li a.links {
                width: 50% !important;
                margin-bottom: 10px !important;
                margin-left: 35% !important;
                margin-right: 35% !important;
            }

            .phrase {
                font-size: 30px !important;
            }


        }
    </style>
</head>

<body>
    <header class="text-center fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}"> <img src="{{ asset('asset/files/img/lf.png') }}"
                    class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item mr-2">
                        <a class="btn  btn-success rounded-pill nav-link links" style="font-size: 15px !important"
                            href="/login">الدخول الى المنصة</a>
                    </li>
                    <li class="nav-item mr-2">
                        <a class="btn btn-warning rounded-pill  nav-link  links" data-toggle="modal"
                            data-target="#staticBackdrop" style="font-size: 15px !important">التسجيل
                            في
                            المنصة</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>



    <section>

         <br><br>
        <img src="{{ asset('asset/back.jpeg') }}">

        <br><br>
        <div class="container text-center ">
            <h1 class="mb-5">
                {{-- -----{<span class="titre1">منصة منحة التفوق</span>}----- --}}
                منصة منحة التفوق
            </h1>
            <div class="paragraphe">
                عزيزي (تي) الطالب(ة) مرحبا بك بهذه المنصة التي هي بوابتك للتسجيل والترشح لنيل منحة التفوق التي تقدمها
                مؤسسة محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين لأبناء المنخرطين المتفوقين.
                وتروم هذه المنصة إطلاع مستخدميها على كل ما يهم منحة التفوق من إجراءات وتدابير ومستجدات.
            </div>
            <h1 class="mb-5">
                شروط التسجيل
            </h1>
            <div class="paragraphe">
                شروط التسجيل للاستفادة من المنحة المقدمة من طرف مؤسسة محمد السادس : <br /><br />
                <ul class="condition">
                    <li>أن يكون المترشح(ة) ابن(ة) منخرط(ة) بالمؤسسة</li>
                    <li> أن يكون حاصلا على شهادة الباكالوريا برسم الموسم الدراسي 2020/2021 بمعدل يفوق 15/20</li>
                    <li> ألا يتجاوز سن المترشح(ة) 25 سنة في يناير 2022</li>
                    <li> أن يتابع دراسته (ا) ما بعد الباكالوريا داخل ارض الوطن</li>
                </ul>
            </div>
            {{-- <h1 class="mb-5">
                مسطرة الترشح للاستفادة من منحة التفوق
            </h1>
            <div class="paragraphe">
                مرحبا بكم بمنصة طلب الترشح لمنحة مؤسسة محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين للموسم
                الدراسي 2020/2021. لتقديم طلبكم ندعوكم لتعبئة استمارة الترشح واتباع المراحل المطلوبة لاستكمال ملفكم.
                مؤسسة
                محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين تتمنى لكم حظا موفقا في مشواركم الدراسي.
            </div> --}}
        </div>
        <div class="container">
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            @if ($candidature->action == 'مفعل')
                            <form action="{{ url('/etudiant/check') }}" method="post">
                                @csrf
                                <h2 class=" text-center mb-5"> المرجو إدخال رقم البطاقة الوطنية للقيم الديني  </h2>
                                <input type="text" name="cni" class="form-control mt-5 pt-5 pb-5 text-center fs-2">
                                <br />
                                <div class="mt-5 text-center">
                                    <a class="btn bg-orange btn-model" data-dismiss="modal">الغاء</a>
                                    <button class="btn bg-orange btn-model" type="submit">بحث</button>
                                </div>
                            </form>
                            @else
                            <h3>
                                انتهى الموعد النهائي للتسجيل
                            </h3>
                            <div class="mt-5 text-center">
                                <button class="btn bg-orange btn-model" data-dismiss="modal"
                                    aria-label="Close">الغاء</button>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->


            <div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class=" modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <h3>
                                يرجى مراجعة رقم انخراط القيم الديني او تسوية الوضعية المتعلقة بالقيم الديني
                            </h3>
                            <div class="mt-5 text-center">
                                <button class="btn bg-orange btn-model" data-bs-dismiss="modal"
                                    aria-label="Close">الغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <footer>
        <div class="container">
            <div class="row" style="margin-left : 0% !important ; margin-right : 0% !important">
                <div class="col" style="font-size: 13px !important"> <i class="fas fa-map-marker-alt text-orange"></i>
                    فيلا رقم1 ٬ شارع محمد السادس باب زعير - الرباط
                </div>
                <div class="col" style="margin-right: 20px;"> <i class="fas fa-envelope text-orange"></i> <a
                        href="mailto:admin@admin.ma" class="text-white">contact@alqayim.ma</a> </div>
                <div class="col" style="font-size: 13px !important"><a href="https://alqayyim.ma/contactus"
                        class="text-white" style="ma"><i class="fas fa-link text-orange"></i> مؤسسة محمد السادس
                        للنهوض بالأعمال الإجتماعية للقيمين الدينيين</a>
                </div>
                <div class="col" style="margin-right: 30px !important;"><i class="fas fa-phone text-orange"></i>
                    0537666418 <br />
                    <i class="fas fa-phone text-orange"></i> 0537635200<br />
                    <i class="fas fa-fax text-orange"></i> 0537635220
                </div>
            </div>
        </div>
    </footer>
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
@if (!empty(Session::get('error_code')) && Session::get('error_code') == 5)
<script>
    $(document).ready(function() {
            $('#myModal').modal('show');
        });
</script>
@endif



</html>