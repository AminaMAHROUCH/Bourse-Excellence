<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>استمارة الترشيح</title>
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
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" --}}
    {{-- type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"
        type="text/css" />
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
    <link rel="stylesheet" media="screen" href="{{ asset('inscription.css') }}" type="text/css" />
    <link rel="stylesheet" media="screen" href="{{ asset('formulaireStyle.css') }}" type="text/css" />
    <style>
        .bar {
            width: 20% !important;
        }

        .float-left {
            font-size: 16px;
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
                    <li>
                        @if ($Candidature->status == 'accepter')
                        <button class="btn btn-success">Accepter</button>
                        @elseif ($Candidature->status == 'en attente')
                        <button class="btn btn-warning">en attente</button>
                        @endif
                    </li>
                    <li class="nav-item mr-2">
                        <a class="dropdown-item " href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" style="text-align: center">
                            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                            </form>
                            <span style="font-size: 20px !important ;">
                                {{ $Candidature->nom_prenomArab }}</span> <i class="fa fa-sign-out" aria-hidden="true"
                                style="font-size: 30px !important ; transform: rotate(180deg)"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- MultiStep Form -->
    <br><br>
    <section>
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center mt-0">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-5 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-5 mb-5" style="background:#FFFFCC">
                        <h2><strong>استمارة الترشيح للاستفادة من منحة التفوق </strong></h2>
                        <p>المرجو ملء جميع الخانات و ادخال جميع المعلومات</p>
                        <div class="row">
                            <div class="form-wizard">
                                <form action="{{ route('boursier.update', $Candidature->id) }}" method="POST"
                                    enctype="multipart/form-data" id="form-element">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-wizard-header">
                                        @if ($Candidature->status == 'accepter')
                                        <ul id="progressbar" class="list-unstyled form-wizard-steps clearfix">
                                            <li id="account" data-step="step_1" class="active bar">
                                                <strong style="font-size: 20px;">
                                                    معلومات القيم الديني</strong>
                                            </li>
                                            <li id="personal" data-step="step_2" class="bar"><strong
                                                    style="font-size: 20px;">معلومات الطالب
                                            <li id="payment" class="bar" data-step="step_3"><strong
                                                    style="font-size: 20px;">معلومات
                                                    دراسية</strong></li>
                                            <li id="confirm" class="bar" data-step="step_4"><strong
                                                    style="font-size: 20px;">الشواهد
                                                    المطلوبة</strong></li>
                                            <li id="document" class="bar" data-step="step_5"><strong
                                                    style="font-size: 20px;">تنزيل
                                                    الوثائق</strong></li>
                                        </ul>
                                        @else
                                        <ul class="list-unstyled form-wizard-steps clearfix" id="progressbar">
                                            <li id="account" data-step="step_1" class="active">
                                                <strong style="font-size: 20px;">
                                                    معلومات عن الابوين </strong>
                                            </li>
                                            <li id="personal" data-step="step_2"><strong
                                                    style="font-size: 20px;">معلومات الطالب

                                                </strong></li>

                                            <li id="payment" data-step="step_3"><strong style="font-size: 20px;">معلومات
                                                    دراسية</strong>
                                            </li>
                                            <li id="confirm" data-step="step_4"><strong style="font-size: 20px;">الشواهد
                                                    المطلوبة</strong>
                                            </li>
                                        </ul>
                                        @endif
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <div class="form-card" style="background: #FFFFCC;padding: 10px;">

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label for="releve" class="float-left">اسم القيم(ة)
                                                        الديني(ة) بالعربية :
                                                    </label>
                                                    <input id="nom_prenom_adherentAr" type="text"
                                                        value="{{ $Candidature->nom_prenom_adherentAr }}"
                                                        placeholder="اسم القيم(ة) الديني(ة) بالعربية"
                                                        class="form-control" readonly>
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-left">اسم القيم(ة)
                                                        الديني(ة) بالفرنسية :
                                                    </label>
                                                    <input id="nameFather" type="text"
                                                        value="{{ $Candidature->nom_prenom_adherent }}"
                                                        placeholder="اسم القيم(ة) الديني(ة) بالفرنسية"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم
                                                        الإنخراط :</label>
                                                    <input id="nameFather" type="text" class="form-control"
                                                        placeholder="رقم الإنخراط :"
                                                        value="{{ $Candidature->matricule }}" readonly>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم البطاقة الوطنية
                                                        :</label>
                                                    <input id="job" type="text" class="form-control"
                                                        placeholder="رقم البطاقة الوطنية :"
                                                        value="{{ $Candidature->cni_adherent }}" readonly>
                                                </div>

                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="prix" class="float-left"> الجهة :</label>
                                                    <input type="text" value="{{ $Candidature->region }}"
                                                        class="form-control" readonly>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="num " class="float-left"> الإقليم :</label>
                                                    <input type="text" value="{{ $Candidature->province }}"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-12 form-group">
                                                    <label for="num " class="float-left">مهمة القيم(ة) الديني(ة) :
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox1" name="profession_f[]"
                                                            value="امام مرشد"
                                                            {{ in_array('امام مرشد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox1" class="custom-control-label"
                                                            style="width :120px;  text-align:right;">امام
                                                            مرشد(ة)</label>



                                                    </div>
                                                </div>


                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">

                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox2" name="profession_f[]"
                                                            value="مرشد"
                                                            {{ in_array('مرشد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox2" class="custom-control-label"
                                                            style="width :90px; text-align:right;">مرشد </label>

                                                    </div>
                                                </div>






                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox3" name="profession_f[]"
                                                            value="امام"
                                                            {{ in_array('امام', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox3" class="custom-control-label"
                                                            style=" width :90px; text-align:right;"> امام&nbsp;</label>
                                                    </div>
                                                </div>



                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox4" name="profession_f[]"
                                                            value="خطيب"
                                                            {{ in_array('خطيب', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox4" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">خطيب</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <!------------>
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox5" name="profession_f[]" value="مؤذن"
                                                            {{ in_array('مؤذن', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox5" class="custom-control-label"
                                                            style=" width :90px; text-align:right;"> مؤذن </label>



                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">

                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox6" name="profession_f[]" value="واعظ(ة)"
                                                            {{ in_array('واعظ(ة)', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox6" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">واعظ(ة) </label>

                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox7" name="profession_f[]" value="متفقد"
                                                            {{ in_array('متفقد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox7" class="custom-control-label"
                                                            style="width :90px;  text-align:right;"> متفقد&nbsp;</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox8" name="profession_f[]" value="منظف"
                                                            {{ in_array('منظف', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox8" class="custom-control-label"
                                                            style=" width :90px;text-align:right;">منظف</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <br>
                                            <div class="col-lg-12">
                                                <p
                                                    style=" font-size : 15px;  text-align : right; color : red !important">
                                                    * المرجو تحديد
                                                    على
                                                    الأقل مهمة واحدة
                                                </p>
                                                <p class="js-error-field text-danger text-left"
                                                    data-target="profession_f"></p>
                                            </div>


                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for=""
                                                        class="float-left">مهمة
                                                        الزوج(ة) : </label>
                                                    <select class="select2 form-control" id="sexe" name="profession"
                                                        hint-class="show-8 ">
                                                        <option value="" disabled selected>اختر</option>
                                                        <option
                                                            {{ $Candidature->profession == 'عامل(ة)' ? 'selected' : '' }}>
                                                            عامل(ة)
                                                        </option>
                                                        <option
                                                            {{ $Candidature->profession == 'غير عامل(ة)' ? 'selected' : '' }}>
                                                            غير عامل(ة)
                                                        </option>
                                                    </select>
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="profession">
                                                    </p>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-left">في حالة مزاولة
                                                        الزوج(ة) لمهنة يجب إضافتها</label>
                                                    <input id="jobe" type="text" class="form-control "
                                                        name="profession_conjoint"
                                                        value="{{ $Candidature->profession_conjoint }}">
                                                    

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve1"
                                                        class="float-left">
                                                        مكافأة القيم(ة)الديني(ة) :</label>
                                                    <input id="salaire" step="0.01" type="number" class="form-control"
                                                        name="salaire_f" placeholder="ادخل راتبته(ا) "
                                                        value="{{ $Candidature->salaire }}">
                                                    <p id="msgErr" style="display: none; color:red; font-size:15px;">يجب
                                                        أن تكون مكافأة القيم الديني على الأقل أكبر من 100.00 درهم</p>
                                                    <p style=" font-size : 15px;  text-align : right;"> في حالة
                                                        مزاولة
                                                        القيم الديني لمهام متعددة يجب الادلاء بالدخل الاجمالي
                                                        المحصل عليه لقاء هاته المهن
                                                    </p>
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="salaire_f"></p>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve1"
                                                        class="float-left">دخل
                                                        الزوج(ة) : </label>
                                                    <input id="jobe" type="text" class="form-control"
                                                        name="salaire_conjoint"
                                                        value="{{ $Candidature->salaire_conjoint }}">
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="salaire_conjoint"></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-left">
                                                        الاسم الكامل للزوج(ة) بالعربية </label>
                                                    <input id="namemother" type="text"
                                                        class="form-control keyboardInput" name="nom_prenom_conjointAr"
                                                        placeholder="اسم الزوج(ة) الكامل بالعربية "
                                                        value="{{ $Candidature->nom_prenom_conjointAr }}">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="namemother" class="float-left">الاسم الكامل للزوج(ة)
                                                        بالفرنسية</label>
                                                    <input id="namemother" type="text" class="form-control"
                                                        name="nom_prenom_conjoint"
                                                        placeholder="اسم الزوج(ة) الكامل بالفرنسية "
                                                        value="{{ $Candidature->nom_prenom_conjoint }}">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم هاتف القيم(ة)
                                                        الديني(ة)
                                                        :</label>
                                                    <input type="text" class="form-control" name="telephone_adherent"
                                                        id="" value="{{ $Candidature->telephone_adherent }}"
                                                        maxlength="10" pattern="\d{10}"
                                                        title="Please enter exactly 10 digits">
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="telephone_adherent"></p>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم
                                                        هاتف
                                                        الزوج(ة) :</label>
                                                    <input id="numero" type="text" class="form-control"
                                                        name="telephone_conjoint"
                                                        value="{{ $Candidature->telephone_conjoint }}" maxlength="10"
                                                        pattern="\d{10}" title="Please enter exactly 10 digits">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-left">عنوان
                                                        القيم (ة) الديني (ة) (ولي (ة) الأمر) :</label>
                                                    <textarea class="textarea form-control" name="adresse_parents"
                                                        id="form-message" cols="10" rows="5"
                                                        placeholder="عنوان الأباء ">{{ $Candidature->adresse_parents }}</textarea>
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="adresse_parents"></p>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-next-btn"
                                                style="background : #901E2B">التالي</a>

                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">
                                        <div class="card" style="background:#FFFFCC">
                                            <div class="card-body">
                                                <div class="form-card" style="background: #FFFFCC;padding: 10px;">
                                                    <center>
                                                        <div class="form-group" style="display: inline-grid;">
                                                            <input type="file" accept="image/*" name="photo" id="file"
                                                                onchange="loadFile(event, 'output1')"
                                                                style="display: none;">

                                                            <label for="file"
                                                                style="cursor: pointer; border: 2px solid black;">صورة
                                                                شخصية</label>
                                                            @if ($Candidature->photo)
                                                            <img src="{{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->photo) }}"
                                                                id="output1" width="200" />
                                                            @else
                                                            <img id="output1" src={{ asset('asset/300x200.png') }}
                                                                width="200 border-radius: 15px;" class="text-center">
                                                            @endif
                                                        </div>
                                                    </center>
                                                    <div class="row" style="background: #FFFFCC;padding: 10px;">
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="fullname" class="float-left "> الاسم الكامل
                                                                بالعربية
                                                                :</label>
                                                            <input type="text" class="form-control keyboardInput"
                                                                name="full_nameArab" placeholder="الاسم الكامل بالعربية"
                                                                value="{{ $Candidature->nom_prenomArab }}">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="full_nameArab"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="fullname" class="float-left"> الاسم الكامل
                                                                بالفرنسية
                                                                :</label>
                                                            <input type="text" class="form-control" name="full_nameFr"
                                                                placeholder="الاسم الكامل بالفرنسية"
                                                                value="{{ $Candidature->nom_prenom }}">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="full_nameFr"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="cni" class="float-left">رقم البطاقة الوطنية
                                                                :</label>
                                                            <input type="text" class="form-control" name="cni"
                                                                placeholder="رقم البطاقة الوطنية "
                                                                value="{{ $Candidature->cni }}" readonly>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="cni"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> مكان الازدياد :
                                                            </label>
                                                            <input id="lieu" type="text" class="form-control"
                                                                name="lieu_naissance" placeholder="مكان الازدياد "
                                                                value="{{ $Candidature->lieu_naissance }}">
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left">تاريخ الازدياد
                                                                :</label>
                                                            <input id="lieu" type="text" class="form-control"
                                                                name="date_naissance" placeholder="مكان الازدياد "
                                                                value="{{ $Candidature->date_naissance }}">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="date_naissance"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>

                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> البريد الالكتروني
                                                                :</label>
                                                            <input id="email" type="email" class="form-control"
                                                                data-inputmask="'alias': 'email'" name="email"
                                                                placeholder="البريد الالكتروني :"
                                                                value="{{ $Candidature->email }}" readonly>
                                                            <div class="wizard-form-error"></div>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="email"></p>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                            <label for="sexe" class="float-left"> الجنس :</label>
                                                            <select class="select2 form-control" id="sexe" name="sexe">
                                                                <option
                                                                    {{ $Candidature->sexe == 'ذكر' ? 'selected' : '' }}>
                                                                    ذكر
                                                                </option>
                                                                <option
                                                                    {{ $Candidature->sexe == 'أنثى' ? 'selected' : '' }}>
                                                                    أنثى</option>
                                                            </select>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="sexe"></p>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> الهاتف 1 :</label>
                                                            <input id="tel1" type="tel" class="form-control" id="phone"
                                                                name="telephone_1"
                                                                style="text-align:right;unicode-bidi:plaintext;; "
                                                                value="{{ $Candidature->telephone_1 }}">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="telephone_1"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> الهاتف 2 :</label>
                                                            <input id="tel2" type="tel" class="form-control" id="phone1"
                                                                name="telephone_2"
                                                                style="text-align:right;unicode-bidi:plaintext;; "
                                                                value="{{ $Candidature->telephone_2 }}">
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="etat" class="float-left">الوضعية الصحية
                                                                :</label>
                                                            <select class="select2 form-control" id="" name="etat">
                                                                <option
                                                                    {{ $Candidature->etat_physique == 'سليم' ? 'selected' : '' }}>
                                                                    سليم</option>
                                                                <option
                                                                    {{ $Candidature->etat_physique == 'ذوي الاحتياجات الخاصة' ? 'selected' : '' }}>
                                                                    ذوي
                                                                    الاحتياجات الخاصة</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> عدد الإخوة
                                                                :</label>
                                                            <input id="nbr" type="number" class="form-control"
                                                                name="nbre_freres" placeholder="عدد الإخوة" min="0"
                                                                value="{{ $Candidature->nbr_freres }}">
                                                            <div class="wizard-form-error"></div>
                                                        </div>

                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="deces" class="float-left">هل أحد الأبوين متوفي
                                                                :</label>
                                                            <select name="deces" id="deces" aria-hidden="true"
                                                                class="form-control">
                                                                <option
                                                                    {{ $Candidature->deces == 'نعم' ? 'selected' : '' }}>
                                                                    نعم</option>
                                                                <option
                                                                    {{ $Candidature->deces == 'لا' ? 'selected' : '' }}>
                                                                    لا</option>
                                                            </select>
                                                        </div>
                                                        @if ($Candidature->deces == 'نعم')
                                                        <div class="col-12-xl col-lg-6 col-12 form-group"
                                                            id="decesparent">
                                                            <label for="deces" class="float-left">
                                                                في حالة وفاة أحد الأبوين المرجو تحديده
                                                                :</label>
                                                            <select name="parents_deces" aria-hidden="true"
                                                                class="form-control" id="np">
                                                                ابوين على قيد الحياة
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'ابوين على قيد الحياة' ? 'selected' : '' }}>
                                                                    ابوين على قيد الحياة</option>
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'الأم' ? 'selected' : '' }}>
                                                                    الأم</option>
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'الأب' ? 'selected' : '' }}>
                                                                    الأب</option>
                                                            </select>
                                                        </div>
                                                        @endif
                                                        <div class="col-12-xl col-lg-6 col-12 form-group"
                                                            id="decesparent" style="display: none">
                                                            <label for="deces" class="float-left">
                                                                في حالة وفاة أحد الأبوين المرجو تحديده
                                                                :</label>
                                                            <select name="parents_deces" aria-hidden="true"
                                                                class="form-control" id="np">
                                                                ابوين على قيد الحياة
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'ابوين على قيد الحياة' ? 'selected' : '' }}>
                                                                    ابوين على قيد الحياة</option>
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'الأم' ? 'selected' : '' }}>
                                                                    الأم</option>
                                                                <option
                                                                    {{ $Candidature->parents_deces == 'الأب' ? 'selected' : '' }}>
                                                                    الأب</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> تغيير
                                                                كلمة
                                                                السر :</label>
                                                            <input id="nbr" type="text" class="form-control"
                                                                name="password" placeholder="password">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                            <label for="tel2" class="float-left"> العنوان :</label>
                                                            <textarea class="textarea form-control" name="adresse"
                                                                cols="10" rows="5"
                                                                placeholder="العنوان">{{ $Candidature->adresse }}</textarea>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label style=" float: right !important;" for="prix"
                                                                class="float-left"> الجهة :</label>
                                                            <select id="region_id" name="region_etud"
                                                                class="form-control">
                                                                @foreach ($regions as $id => $region)
                                                                <option value="{{ $id }}"
                                                                    {{ $Candidature->region_id_etud == $id ? 'selected' : '' }}>
                                                                    {{ $region }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="region"></p>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label style=" float: right !important;" for="num"
                                                                class="float-left"> الإقليم :</label>
                                                            <select name="province_etud" id="province_id"
                                                                class="select2 form-control">
                                                                @foreach ($provinces as $id => $province)
                                                                <option value="{{ $id }}"
                                                                    {{ $Candidature->province_id_etud == $id ? 'selected' : '' }}>
                                                                    {{ $province }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="province"></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn "
                                                style="background : #504A4A">السابق</a>
                                            <a href="javascript:;" class="form-wizard-next-btn"
                                                style="background : #901E2B">التالي</a>
                                        </div>

                                    </fieldset>


                                    <fieldset class="wizard-fieldset">
                                        <div class="form-card" style="background: #FFFFCC;padding: 10px;">
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-left"> الرقم الوطني للطالب
                                                        :</label>
                                                    <input type="text" class="form-control" name="cne"
                                                        value="{{ $Candidature->cne }}" readonly>
                                                    <div class="wizard-form-error"></div>
                                                    <li class="text-danger text-left js-error-field" data-target="cne">
                                                    </li>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label class="float-left"> المعدل السنوي للباكالوريا
                                                        :</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}"
                                                        name="note" placeholder="المعدل السنوي للباكالوريا"
                                                        value="{{ $Candidature->note }}">
                                                    <div class="wizard-form-error"></div>
                                                    <p class="text-danger text-left js-error-field" data-target="note">
                                                    </p>

                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="mention" class="float-left"> الميزة :</label>
                                                    <select class="select2 form-control" name="mention" tabindex="-1"
                                                        aria-hidden="true">
                                                        <option value="" selected disabled>اختر</option>
                                                        <option ç
                                                            {{ $Candidature->mention == 'Bien' ? 'selected' : '' }}
                                                            value="Bien">
                                                            حسن
                                                        </option>

                                                        <option
                                                            {{ $Candidature->mention == 'Tres Bien' ? 'selected' : '' }}
                                                            value="Tres Bien">
                                                            حسن جدا</option>
                                                        <option
                                                            {{ $Candidature->mention == 'Excellent' ? 'selected' : '' }}
                                                            value="Excellent">
                                                            ممتاز</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left">الموسم الدراسي الجاري
                                                        :</label>
                                                    <input type="text" class="form-control" name="anneUniversitaire"
                                                        value="{{Carbon\Carbon::now()->format('Y');}}/{{Carbon\Carbon::now()->addYear()->format('Y');}}"
                                                        readonly>
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> سنة الحصول على الباكالوريا
                                                        :
                                                    </label>
                                                    <input id="" type="text" class="form-control" name="anne_bac"
                                                        placeholder="سنة الحصول على الباكالوريا "
                                                        value="{{ $Candidature->anne_bac }}">
                                                    <p class="js-error-field text-danger text-left"
                                                        data-target="anne_bac"></p>
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الثانوية :
                                                    </label>
                                                    <input id="" type="text" class="form-control" name="lycee"
                                                        placeholder="الثانوية " value="{{ $Candidature->lycee }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="filiereBac"
                                                        class="float-left">شعبة الباكالوريا
                                                        :</label>
                                                    <input type="text" class="form-control" name="filiereBac"
                                                        placeholder=" ادخل التخصص"
                                                        value="{{ $Candidature->filiereBac }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> التخصص الجامعي :</label>
                                                    <input type="text" class="form-control" name="filiere"
                                                        placeholder="التخصص" value="{{ $Candidature->filiere }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الجامعة :</label>
                                                    <input type="text" class="form-control" name="universite"
                                                        placeholder="الجامعة" value="{{ $Candidature->universite }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> المؤسسة :</label>
                                                    <input type="text" class="form-control" name="ecole"
                                                        placeholder="المؤسسة" value="{{ $Candidature->ecole }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="ville"
                                                        class="float-left">مدينة الدراسة
                                                        :</label>
                                                    <input type="text" class="form-control" name="ville"
                                                        placeholder="ادخل المدينة" value="{{ $Candidature->ville }}">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> مدة الدراسة :</label>
                                                    <input id="nbr" type="number" class="form-control"
                                                        name="duree_etude" min="0" placeholder="مدة الدراسة"
                                                        value="{{ $Candidature->duree_etude }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn "
                                                style="background : #504A4A">السابق</a>
                                            <a href="javascript:;" class="form-wizard-next-btn"
                                                style="background : #901E2B">التالي</a>
                                        </div>
                                    </fieldset>
                                    <fieldset class="wizard-fieldset">

                                        <div class="form-card" style="background: #FFFFCC;padding: 10px;">
                                            <h4 class="text-danger">La taille de l'image ne doit pas depasser 1MB</h4>
                                            <p>Vous pouvez utilisez ce site pour reduire la taille de l'image <a
                                                    href="https://www.resizepixel.com/fr?new=true">cliquer
                                                    ici</a>
                                            </p>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الباكالوريا :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="AttestationBac" style=""
                                                        onchange="loadFile(event, 'output2')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->AttestationBac)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->AttestationBac) }}
                                                            style="width: 180px; border-radius: 15px;" name="image"
                                                            class="text-center" id="output2">
                                                        @else
                                                        <img id="output2" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px;  border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="releve" class="float-left"> بيان النقط :</label>
                                                    <input id="bac" type="file" class=" form-group" name="RelvesNote"
                                                        style="" onchange="loadFile(event, 'output3')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->RelvesNote)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->RelvesNote) }}
                                                            style="width: 180px; border-radius: 15px;" name="image"
                                                            class="text-center" id="output3">
                                                        @else
                                                        <img id="output3" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px; border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row">
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي للقيم(ة)
                                                        الديني(ة)
                                                    </label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attest_revenu_mensuel_adh"
                                                        onchange="loadFile(event, 'output5')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attest_revenu_mensuel_adh)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->attest_revenu_mensuel_adh) }}
                                                            style="width: 180px" name=" image" class="text-center"
                                                            id="output5">
                                                        @else
                                                        <img id="output5" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي للزوج(ة)
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attest_revenu_mensuel_conj" style=""
                                                        onchange="loadFile(event, 'output7')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attest_revenu_mensuel_conj)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->attest_revenu_mensuel_conj) }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                            name="image" class="text-center" id="output7">
                                                        @else
                                                        <img id="output7" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="attestation" class="float-left">شهادة عمل أو عدم عمل
                                                        الزوج(ة)
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attestationProfession_conjoint"
                                                        onchange="loadFile(event, 'output6')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attestationProfession_conjoint)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->attestationProfession_conjoint) }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                            name="image" class="text-center" id="output6">
                                                        @else
                                                        <img id="output6" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">

                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="attestation" class="float-left">شهادة القيم الديني
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attestationAdherent" style=""
                                                        onchange="loadFile(event, 'output8')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attestationAdherent)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->attestationAdherent) }}
                                                            style="width: 180px; border-radius: 15px;" name="image"
                                                            class="text-center" id="output8">
                                                        @else
                                                        <img id="output8" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px;
                                                                                                                                                                                                                                    border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="attestation" class="float-left">
                                                        البطاقة الوطنية للطالب
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group" name="cni_image"
                                                        style="" onchange="loadFile(event, 'output9')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->cni_image)
                                                        <img src={{ asset('bourse_excellence/storage/app/public/images/' . $Candidature->cni_image) }}
                                                            style="width: 180px; border-radius: 15px;" name="image"
                                                            class="text-center" id="output9">
                                                        @else
                                                        <img id="output9" src={{ asset('asset/300x200.png') }}
                                                            style="width: 180px; border-radius: 15px;"
                                                            class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn "
                                                style="background : #504A4A">السابق</a>
                                            @if ($Candidature->status == 'accepter')
                                            <a href="javascript:;" class="form-wizard-next-btn"
                                                style="background : #901E2B">التالي</a>
                                            @else
                                            <button type="submit" class="form-wizard-submit"
                                                style="background : #901E2B">حفظ</button>
                                            @endif

                                        </div>

                                    </fieldset>
                                    @if ($Candidature->status == 'accepter')
                                    <fieldset class="wizard-fieldset">
                                        <div class="form-card" style="background:#FFFEF5; padding:10px;">
                                            <ul style=" text-align: initial; list-style: none">
                                                <li> من أجل تحميل مطبوع التصريح بالمداخيل المرجو الضغط على هذا الرابط<a
                                                        href="{{ asset('asset/engagement.pdf') }}" target="_blank">
                                                        <i class="fa fa-download"></i>تصريح بدخل القيم الديني الخاص
                                                        بمنحة
                                                        التفوق
                                                    </a>
                                                    (يعبأ ويوقع من طرف القيم الديني بمعية السيد المندوب وأعضاء الوحدة
                                                    الإدارية التابع لها)</li>
                                                
                                                <br>
                                               <li> من أجل تحميل مطبوع طلب الحصول على منحة التفوق المرجو الضغط على هذا الرابط<a
                            href="{{ asset('asset/damandeEtudiant.pdf') }}" target="_blank">
                            <i class="fa fa-download"></i>طلب الحصول على منحة التفوق
                        </a>
                    </li><br>
                    
                             <li> من أجل تحميل مطبوع التزام الطالب(ة) للاستفادة من منحة التفوق المرجو الضغط على هذا الرابط
                             <a href="{{ asset('asset/EngagementEtudiant.pdf') }}" target="_blank">
                            <i class="fa fa-download"></i>  التزام الطالب(ة)
                        </a>
                    </li><br>
                                                <li>من أجل فتح حساب بنكي "بريد بنك"، المرجو الضغط على هذا الرابط (تقدم
                                                    <a href="{{ url('/compteBancaire') }}">البريد بنك
                                                    </a>
                                                    هذه الرسالة الإسمية إلى الوكالة البنكية "بريد بنك" المراد فتح الحساب
                                                    البنكي بها من أجل الحصول على حساب مجاني) </li>
                                                <br>
                                                <li>من أجل فتح حساب بنكي" أمنية بنك"، المرجو الضغط على هذا الرابط (تقدم
                                                    <a href="{{ url('/compteOumnia') }}">أمنية بنك
                                                    </a>
                                                    هذه الرسالة الاسمية إلى الوكالة البنكية " أمنية بنك" المراد فتح
                                                    الحساب البنكي بها من أجل الحصول على حساب مجاني) </li>

                                            </ul>
                                            <p style="font-weight: bold">بعد فتح الحساب البنكي المرجو إدخال الأرقام
                                                الأربعة والعشرون (24) للحساب في الخانة أسفله</p>
                                            <div class="row">
                                                <div class=" col-xl-9 col-lg-9 col-12">
                                                    <input type="text" class="form-control"
                                                        value="{{ $Candidature->rib }}" readonly>
                                                </div>
                                                <div class=" col-xl-3 col-lg-3 col-12">
                                                    <div class="float-left">
                                                        <a class="btn btn-warning rounded-pill"
                                                            style="font-size: 15px !important" id="rib">اضافة رقم الحساب
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group clearfix">
                                                <a href="javascript:;" class="form-wizard-previous-btn "
                                                    style="background : #504A4A" id="pr">السابق</a>
                                            </div>
                                    </fieldset>
                                    @endif
                                </form>
                                <br>
                                <center>
                                    <div id="ribshow" style="display: none">
                                        <form action="{{ route('addRiB') }}" method="POST">
                                            @csrf
                                            <h6 class=" text-center mb-3">المرجو ادخال رقم الحساب البنكي
                                            </h6>
                                            <div style="text-align:center;">
                                                <input type="text" name="rib" class="form-control code" id="inputRib"
                                                    type="number" maxlength="24">
                                                <P id="msgrIB" style="display: none; color:red; font-size:15px;">يجب أن
                                                    يتكون رقم الحساب من 24رقما</P>
                                            </div>
                                            <div class="mt-2 text-center">
                                                <button class="btn bg-orange btn-model btn-sm"
                                                    type="submit">valider</button>
                                            </div>
                                        </form>
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
<script href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript">
</script>
<script src="{{ url('vendor/jquery.min.js') }}"></script>
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/dist/inputmask.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            head: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#region_id').on('change', function() {
            id = $(this).val();
            console.log(id);
            $.get('dropdownlistProvince', {
                id: id
            }, function(data) {
                console.log(data);
                $.each(data, function(key, val) {
                    $('#province_id').append('<option value=' val.id ' >' + val
                        .nom_province + '</option>')
                });
            });
        });
    });
</script>
<script>
    var loadFile = function(event, id) {
        var image = document.getElementById(id);
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script>
    $(document).ready(function() {
        // click on next button
        $('.form-wizard-next-btn').click(function() {
            $('.js-error-field').text('')
            var parentFieldset = $(this).parents('.wizard-fieldset');
            var currentActiveStep = $(this).parents('.form-wizard').find('.form-wizard-steps .active');
            if(currentActiveStep) {
                var step = currentActiveStep.data('step')
                var form = document.getElementById("form-element"); 
                var data = new FormData(form);
                var next = $(this);
                data.append("step", step);
                // $.ajax({
                //     type: "POST",
                //     enctype: 'multipart/form-data',
                //     url: "{{ route('candidature.validateUpdate') }}",
                //     data: data,
                //     processData: false,
                //     contentType: false,
                //     success: function (data) {
                        console.log(next)
                        var nextWizardStep = true;

                        parentFieldset.find('.wizard-required').each(function() {
                            var thisValue = $(this).val();

                            if (thisValue == "") {
                                $(this).siblings(".wizard-form-error").slideDown();
                                nextWizardStep = false;
                            } else {
                                $(this).siblings(".wizard-form-error").slideUp();
                            }
                        });
                        
                        if (nextWizardStep) {
                            next.parents('.wizard-fieldset').removeClass("show", "400");
                            currentActiveStep.removeClass('active').addClass('activated').next().addClass('active',
                                "400");
                            next.parents('.wizard-fieldset').next('.wizard-fieldset').addClass("show", "400");
                            $(document).find('.wizard-fieldset').each(function() {
                                if ($(this).hasClass('show')) {
                                    var formAtrr = $(this).attr('data-tab-content');
                                    $(document).find('.form-wizard-steps .form-wizard-step-item').each(
                                        function() {
                                            if ($(this).attr('data-attr') == formAtrr) {
                                                $(this).addClass('active');
                                                var innerWidth = $(this).innerWidth();
                                                var position = $(this).position();
                                                $(document).find('.form-wizard-step-move').css({
                                                    "left": position.left,
                                                    "width": innerWidth
                                                });
                                            } else {
                                                $(this).removeClass('active');
                                            }
                                        });
                                }
                            });
                        }
                    // },
                    // error: function (e) {
                    //     if(e.status == 422) {
                    //         var errors = e.responseJSON.errors;
                    //         for (var key of Object.keys(errors)) {
                    //             $('.js-error-field[data-target="' + key + '"]').text(errors[key])
                    //         }
                    //     }
                    // }
                // });
            }
        });
        //click on previous button
        $('.form-wizard-previous-btn').click(function() {
            var counter = parseInt($(".wizard-counter").text());;
            var prev = $(this);
            var currentActiveStep = $(this).parents('.form-wizard').find(
                '.form-wizard-steps .active');
            prev.parents('.wizard-fieldset').removeClass("show", "400");
            prev.parents('.wizard-fieldset').prev('.wizard-fieldset').addClass("show", "400");
            currentActiveStep.removeClass('active').prev().removeClass('activated').addClass('active',
                "400");
            $(document).find('.wizard-fieldset').each(function() {
                if ($(this).hasClass('show')) {
                    var formAtrr = $(this).attr('data-tab-content');
                    $(document).find('.form-wizard-steps .form-wizard-step-item').each(
                        function() {
                            if ($(this).attr('data-attr') == formAtrr) {
                                $(this).addClass('active');
                                var innerWidth = $(this).innerWidth();
                                var position = $(this).position();
                                $(document).find('.form-wizard-step-move').css({
                                    "left": position.left,
                                    "width": innerWidth
                                });
                            } else {
                                $(this).removeClass('active');
                            }
                        });
                }
            });
        });
        //click on form submit button
        $(document).on("click", ".form-wizard .form-wizard-submit", function(e) {
            e.preventDefault();
            var form = document.getElementById("form-element"); 
            var data = new FormData(form);
            data.append("step", 'step_5');
            // $.ajax({
            //     type: "POST",
            //     enctype: 'multipart/form-data',
            //     url: "{{ route('candidature.validateUpdate') }}",
            //     data: data,
            //     processData: false,
            //     contentType: false,
            //     success: function (data) {
                    form.submit()
                    var parentFieldset = $(this).parents('.wizard-fieldset');
                    var currentActiveStep = $(this).parents('.form-wizard').find( '.form-wizard-steps .active');
                    parentFieldset.find('.wizard-required').each(function() {
                        var thisValue = $(this).val();
                        if (thisValue == "") {
                            $(this).siblings(".wizard-form-error").slideDown();
                        } else {
                            $(this).siblings(".wizard-form-error").slideUp();
                        }
                    });
            //     },
            //     error: function (e) {
            //         if(e.status == 422) {
            //             var errors = e.responseJSON.errors;
            //             for (var key of Object.keys(errors)) {
            //                 $('.js-error-field[data-target="' + key + '"]').text(errors[key])
            //             }
            //         }
            //     }
            // });
        });

        // focus on input field check empty or not
        $(".form-control").on('focus', function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent().addClass("focus-input");
            } else if (tmpThis != '') {
                $(this).parent().addClass("focus-input");
            }
        }).on('blur', function() {
            var tmpThis = $(this).val();
            if (tmpThis == '') {
                $(this).parent().removeClass("focus-input");
                $(this).siblings('.wizard-form-error').slideDown("3000");
            } else if (tmpThis != '') {
                $(this).parent().addClass("focus-input");
                $(this).siblings('.wizard-form-error').slideUp("3000");
            }
        });
    });
</script>
<script type='text/javascript'
    src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script>
    $(document).ready(function(){
    $(":input").inputmask();

        $("#phone").inputmask({
            mask: '99 99 99 99 99',
            placeholder: '__ __ __ __ __',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        //////////////
        $("#phone1").inputmask({
            mask: '99 99 99 99 99',
            placeholder: '__ __ __ __ __',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        $("#phone2").inputmask({
            mask: '99 99 99 99 99',
            placeholder: '__ __ __ __ __',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        $("#phone3").inputmask({
            mask: '99 99 99 99 99',
            placeholder: '__ __ __ __ __',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        //////////cne
        $("#cne").inputmask({
            mask: 'A999999999',
            placeholder: 'A999999999',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
    });
</script>
<link rel="stylesheet" type="text/css" href="http://www.arabic-keyboard.org/keyboard/keyboard.css">
<script type="text/javascript" src="http://www.arabic-keyboard.org/keyboard/keyboard.js" charset="UTF-8"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //Events

        $('#deces').change(function () {

            if($(this).val() == 'نعم') {

                $('#decesparent').slideDown();

                $('#np').val('');

            } else {
                $('#decesparent').slideUp();

                $('#np').val('ابوين على قيد الحياة');

            }

        })

    })

</script>
<script type="text/javascript">
    $(document).ready(function () {

        //Events

        $('#rib').click(function () {
                $('#ribshow').slideDown();
        });
        $('#pr').click(function () {
                $('#ribshow').slideUp();
        });
;
    })

</script>

<script type="text/javascript">
    $("#inputRib").keyup(function ()  {
        var txtlen = $(this).val().length;
    if (txtlen < 24 || txtlen > 24) {
        $('#msgrIB').slideDown();
    }else{
        $('#msgrIB').slideUp();  
    }
});
/////////////////
</script>
<script>
    $(".code").on("keypress keyup blur",function (e) {
   $(this).val($(this).val().replace(/[^0-9\.]/g,''));
      if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
          event.preventDefault();
      }
});
</script>

<script>
    $(function() {
           $('#salaire').keyup(function() {
               var txtlen = $(this).val().length;
               console.log(txtlen);
               if (txtlen< 3) {
                $('#msgErr').slideDown();
                }else{
                    $('#msgErr').slideUp();  
                }
 
           });
       });
</script>

</html>