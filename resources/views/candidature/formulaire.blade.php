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

</head>

<body>
    <header class="text-center fixed-top">
        <img src="{{ asset('asset/files/img/lf.png') }}" class="logo">
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
                                <form action="{{ route('candidature.store') }}" method="POST"
                                    enctype="multipart/form-data" id="form-element">
                                    {{ csrf_field() }}
                                    <div class="form-wizard-header">
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
                                    </div>
                                    <fieldset class="wizard-fieldset show">
                                        <div class="form-card" style="background: #FFFFCC;padding: 10px;">
                                            @if ($adherent)
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">اسم القيم(ة)
                                                        الديني(ة) بالعربية :
                                                    </label>
                                                    <input id="nameFather" type="text" class="form-control "
                                                        value="{{ $adherent->NOM_A }}"
                                                        placeholder="ادخل اسم القيم(ة) الديني(ة) بالعربية" readonly
                                                        name="nom_Arab_recu">
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">اسم القيم(ة)
                                                        الديني(ة) بالفرنسية :
                                                    </label>
                                                    <input id="nameFather" type="text" class="form-control"
                                                        value="{{ $adherent->NOM_F }}" name="nom_Fr_recu"
                                                        placeholder=" ادخل اسم القيم(ة) الديني(ة) بالفرنسية" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم
                                                        الإنخراط :</label>
                                                    <input id="nameFather" type="text" class="form-control"
                                                        placeholder="ادخل رقم الإنخراط"
                                                        value="{{ $adherent->NUMERO_ADHESION }}" name="matricule_recu"
                                                        readonly>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم البطاقة
                                                        الوطنية
                                                        :</label>
                                                    <input id="job" type="text" class="form-control"
                                                        value="{{ $adherent->CIN }}"
                                                        placeholder="ادخل رقم البطاقة الوطنية " name="cni_recu"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="fullname" class="float-left"> الجهة :</label>
                                                    <input type="text" class="form-control" placeholder="الجهة"
                                                        value="{{ $adherent->REGION }}" name="region_recu" readonly>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="fullname" class="float-left"> الإقليم :</label>
                                                    <input type="text" class="form-control" placeholder="الإقليم"
                                                        name="province_recu" value="{{ $adherent->DELEGATION }}"
                                                        readonly>
                                                </div>
                                            </div>

                                            @endif
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
                                                            value="امام مرشد">
                                                        <label for="customCheckbox1" class="custom-control-label"
                                                            style="width :120px;  text-align:right;">امام
                                                            مرشد(ة)</label>
                                                    </div>
                                                </div>



                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox2" name="profession_f[]"
                                                            value="مرشد">
                                                        <label for="customCheckbox2" class="custom-control-label"
                                                            style="width :90px; text-align:right;">مرشد </label>

                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox3" name="profession_f[]"
                                                            value="امام">
                                                        <label for="customCheckbox3" class="custom-control-label"
                                                            style=" width :90px; text-align:right;"> امام&nbsp;</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox4" name="profession_f[]"
                                                            value="خطيب">
                                                        <label for="customCheckbox4" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">خطيب</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox5" name="profession_f[]"
                                                            value="مؤذن">
                                                        <label for="customCheckbox5" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">مؤذن</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox6" name="profession_f[]"
                                                            value="واعظ(ة)">
                                                        <label for="customCheckbox6" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">واعظ(ة)</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox7" name="profession_f[]"
                                                            value="متفقد">
                                                        <label for="customCheckbox7" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">متفقد</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox8" name="profession_f[]"
                                                            value="منظف(ة)">
                                                        <label for="customCheckbox8" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">منظف(ة)</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
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
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for=""
                                                        class="float-right">مهمة
                                                        الزوج(ة) : </label>
                                                    <select class="select2 form-control" id="sexe" name="profession"
                                                        hint-class="show-8 ">
                                                        <option value="" disabled selected>اختر</option>
                                                        <option value="عامل(ة)">
                                                            عامل(ة)
                                                        </option>
                                                        <option value="غير عامل(ة)">
                                                            غير عامل(ة)</option>
                                                    </select>
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="profession">
                                                    </p>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">في حالة مزاولة
                                                        الزوج(ة) لمهنة يجب إضافتها</label>
                                                    <input id="jobe" type="text" class="form-control wizard-required"
                                                        name="profession_conjoint" placeholder="ادخل مهنته(ا) ">
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve1"
                                                        class="float-right">
                                                        مكافأة القيم(ة)الديني(ة) :</label>
                                                    <input id="salaire" type="number" step="0.01" min="100"
                                                        class="form-control wizard-required" name="salaire_f"
                                                        placeholder="ادخل مكافأة(ا) ">
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
                                                        class="float-right">دخل
                                                        الزوج(ة) : </label>
                                                    <input id="salaire1" type="number" step="0.01" class="form-control"
                                                        name="salaire_conjoint" placeholder="ادخل راتبته(ا) ">
                                                    <p id="msgErr1" style="display: none; color:red; font-size:15px;">
                                                    يجب أن يكون الدخل أكبر من أو يساوي 100.00 درهم </p>
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="salaire_conjoint"></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">
                                                        الاسم الكامل للزوج(ة) بالعربية </label>
                                                    <input id="namemother" type="text"
                                                        class="form-control keyboardInput" name="nom_prenom_conjointAr"
                                                        placeholder="ادخل الاسم الكامل الزوج(ة) الكامل بالعربية ">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="namemother" class="float-left">الاسم الكامل للزوج(ة)
                                                        بالفرنسية</label>
                                                    <input id="namemother" type="text" class="form-control"
                                                        name="nom_prenom_conjoint"
                                                        placeholder="الاسم الكامل للزوج(ة) بالفرنسية">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم هاتف القيم(ة)
                                                        الديني(ة)
                                                        :</label>
                                                    <input class="form-control wizard-required" id="phone2"
                                                        data-inputmask="'alias': 'phonebe'"
                                                        style="text-align:right;unicode-bidi:plaintext;; "
                                                        name="telephone_adherent" placeholder="__________">
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="telephone_adherent"></p>
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم
                                                        هاتف
                                                        الزوج(ة) :</label>
                                                    <input class="form-control" id="phone3" name="telephone_conjoint"
                                                        data-inputmask="'alias': 'phonebe'"
                                                        style="text-align:right;unicode-bidi:plaintext;; "
                                                        placeholder="__ __ __ __ __">
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">عنوان
                                                        القيم (ة) الديني (ة) (ولي (ة) الأمر) :</label>
                                                    <textarea class="textarea form-control wizard-required"
                                                        name="adresse_parents" id="form-message" cols="10" rows="5"
                                                        placeholder="ادخل عنوان القيم (ة) الديني (ة) (ولي (ة) الأمر) "></textarea>
                                                    </textarea>
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
                                                                onchange="loadFile(event, 'img1')"
                                                                style="display: none;">
                                                            <label style="float: right !important;" for="file"
                                                                style="cursor: pointer; border: 2px solid black;">صورة
                                                                شخصية</label>
                                                            <img id="img1" width="150" height="150" />

                                                        </div>
                                                    </center>
                                                    <div class="row" style="background: #FFFFCC;padding: 10px;">
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="fullname" class="float-left "> الاسم الكامل
                                                                بالعربية
                                                                :</label>
                                                            <input type="text"
                                                                class="form-control partInput  wizard-required keyboardInput"
                                                                name="full_nameArab" placeholder="اسم الكامل بالعربية">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="full_nameArab"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="fullname" class="float-left"> الاسم الكامل
                                                                بالفرنسية
                                                                :</label>
                                                            <input type="text"
                                                                class="form-control partInput wizard-required"
                                                                name="full_nameFr" placeholder="اسم الكامل بالفرنسية">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="full_nameFr"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="cni" class="float-left">رقم البطاقة الوطنية
                                                                :</label>
                                                            <input type="text"
                                                                class="form-control partInput wizard-required cni"
                                                                name="cni" placeholder=" ادخل رقم البطاقة الوطنية ">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="cni"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> مكان الازدياد :
                                                            </label>
                                                            <input id="lieu" type="text"
                                                                class="form-control partInput wizard-required"
                                                                name="lieu_naissance" placeholder="مكان الازدياد "
                                                                hint-class="show-4 ">
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left">تاريخ الازدياد
                                                                :</label>
                                                            <input id="date" type="date"
                                                                class="form-control partInput wizard-required"
                                                                name="date_naissance" placeholder="ادخل تاريخ الازدياد"
                                                                hint-class="show-5 ">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="date_naissance"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>

                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> البريد الالكتروني
                                                                :</label>
                                                            <input class="form-control wizard-required"
                                                                data-inputmask="'alias': 'email'" name="email">
                                                            <div class="wizard-form-error"></div>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="email"></p>
                                                        </div>
                                                        <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                            <label for="sexe" class="float-left"> الجنس :</label>
                                                            <select class="select2 form-control email" id="sexe"
                                                                name="sexe" hint-class="show-8 ">
                                                                <option value="" disabled selected>اختر</option>
                                                                <option value="ذكر">
                                                                    ذكر
                                                                </option>
                                                                <option value="أنثى">
                                                                    أنثى</option>

                                                            </select>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="sexe"></p>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> الهاتف 1 :</label>
                                                            <input class="form-control" id="phone" name="telephone_1"
                                                                data-inputmask="'alias': 'phonebe'"
                                                                style="text-align:right;unicode-bidi:plaintext;; "
                                                                placeholder="__ __ __ __ __">
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="telephone_1"></p>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> الهاتف 2 :</label>
                                                            <input class="form-control" id="phone1" name="telephone_2"
                                                                data-inputmask="'alias': 'phonebe'"
                                                                placeholder="__ __ __ __ __"
                                                                style="text-align:right;unicode-bidi:plaintext;; ">
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="etat" class="float-left">الوضعية الصحية
                                                                :</label>
                                                            <select class="select2 form-control" id="" name="etat"
                                                                hint-class="show-9">
                                                                <option value="" disabled selected>اختر</option>
                                                                <option value="سليم">
                                                                    سليم</option>
                                                                <option value="ذوي الاحتياجات الخاصة">
                                                                    ذوي
                                                                    الاحتياجات الخاصة</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="tel2" class="float-left"> عدد الإخوة
                                                                :</label>
                                                            <input id="nbr" type="number"
                                                                class="form-control partInput wizard-required"
                                                                name="nbre_freres" placeholder="عدد الإخوة" min="0"
                                                                hint-class="show-6">
                                                            <div class="wizard-form-error"></div>
                                                        </div>

                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label for="deces" class="float-left">هل أحد الأبوين متوفي
                                                                :</label>
                                                            <select name="deces" aria-hidden="true" id="deces"
                                                                class="form-control" hint-class="show-10">
                                                                <option disabled selected>اختر</option>
                                                                <option value="نعم">
                                                                    نعم</option>
                                                                <option value="لا">
                                                                    لا</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group"
                                                            id="decesparent" style="display: none">
                                                            <label for="deces" class="float-left">
                                                                في حالة وفاة أحد الأبوين المرجو تحديده
                                                                :</label>
                                                            <select name="parents_deces" aria-hidden="true" id="np"
                                                                class="form-control" hint-class="show-10">
                                                                <option disabled selected>اختر</option>
                                                                <option value="الأم">
                                                                    الأم</option>
                                                                <option value="الأب">
                                                                    الأب</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                            <label for="tel2" class="float-left"> العنوان :</label>
                                                            <textarea
                                                                class="textarea form-control partInput wizard-required"
                                                                name="adresse" cols="10" rows="5" placeholder="العنوان"
                                                                hint-class="show-13"></textarea>
                                                            <div class="wizard-form-error"></div>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label style=" float: right !important;" for="prix"
                                                                class="float-right"> الجهة :</label>
                                                            <select id="region_id" name="region" class="form-control">
                                                                <option disabled selected>اختر الجهة</option>
                                                                @foreach ($regions as $id => $region)
                                                                <option value="{{ $id }}"
                                                                    {{ old('region_id') == $id ? 'selected' : '' }}>
                                                                    {{ $region }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <p class="text-danger text-left js-error-field"
                                                                data-target="region"></p>
                                                        </div>
                                                        <div class="col-12-xl col-lg-6 col-12 form-group">
                                                            <label style=" float: right !important;" for="num"
                                                                class="float-right"> الإقليم :</label>
                                                            <select name="province" id="province_id"
                                                                class="select2 form-control">
                                                                <option selected disabled>اختر الاقليم</option>
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
                                                        class="float-right"> الرقم الوطني للطالب
                                                        :</label>
                                                    <input class="form-control wizard-required" id="cne" name="cne"
                                                        data-inputmask="'alias': 'cne'" placeholder="cne"
                                                        style="text-align:right;; ">
                                                    <div class="wizard-form-error"></div>
                                                    <li class="text-danger text-left js-error-field" data-target="cne">
                                                    </li>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label class="float-left"> المعدل السنوي للباكالوريا
                                                        :</label>
                                                    <input type="text" class="form-control wizard-required" name="note"
                                                        placeholder="ادخل المعدل السنوي للباكالوريا">
                                                    <div class="wizard-form-error"></div>
                                                    <p class="text-danger text-left js-error-field" data-target="note">
                                                    </p>

                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="mention" class="float-left"> الميزة :</label>
                                                    <select class="select2 form-control" name="mention" tabindex="-1"
                                                        aria-hidden="true">
                                                        <option value="" selected disabled>اختر</option>
                                                        <option value="Bien">
                                                            حسن </option>
                                                        <option value="Tres Bien">
                                                            حسن جدا</option>
                                                        <option value="Excellent">
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
                                                    <input id="" type="text" class="form-control wizard-required"
                                                        name="anne_bac" placeholder="2021">
                                                    <p class="js-error-field text-danger text-left"
                                                        data-target="anne_bac"></p>
                                                    <div class="wizard-form-error"></div>

                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الثانوية :
                                                    </label>
                                                    <input id="" type="text" class="form-control" name="lycee"
                                                        placeholder="الثانوية ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="filiereBac"
                                                        class="float-right">شعبة الباكالوريا
                                                        :</label>
                                                    <input type="text" class="form-control" name="filiereBac"
                                                        placeholder=" ادخل التخصص">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> التخصص الجامعي :</label>
                                                    <input type="text" class="form-control" name="filiere">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الجامعة :</label>
                                                    <input type="text" class="form-control" name="universite"
                                                        placeholder="الجامعة">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> المؤسسة :</label>
                                                    <input type="text" class="form-control" name="ecole"
                                                        placeholder="المؤسسة">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="ville"
                                                        class="float-right">مدينة الدراسة
                                                        :</label>
                                                    <input type="text" class="form-control wizard-required" name="ville"
                                                        placeholder="ادخل مدينة الدراسة">
                                                    <div class="wizard-form-error"></div>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> مدة الدراسة :</label>
                                                    <input id="nbr" type="number" class="form-control wizard-required"
                                                        name="duree_etude" placeholder="مدة الدراسة">
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
                                        <div class="form-card" style="background: #FFFFCC;padding: 10px;"> <br>
                                            <h4 class="text-danger">La taille de l'image ne doit pas depasser 1MB</h4>
                                            <p>Vous pouvez utilisez ce site pour reduire la taille de l'image <a
                                                    href="https://www.resizepixel.com/fr?new=true">cliquer
                                                    ici</a>
                                            </p>
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="AttestationBac"
                                                        style="float: right;">شهادة الباكالوريا
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        name="AttestationBac" id="AttestationBac"
                                                        onchange="loadFile(event, 'img2')">
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="AttestationBac"></p>
                                                    <img id="img2" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        style="float: right;"> بيان
                                                        النقط :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="releve"
                                                        name="RelvesNote" onchange="loadFile(event, 'img3')">
                                                    <p class="text-danger text-left js-error-field"
                                                        data-target="RelvesNote"></p>
                                                    <img id="img3" width="50%" class="center" />
                                                </div>
                                                {{-- <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="attestation" class="float-left"> شهادة عمل القيم(ة)
                                                        الديني(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" name="attestationProfession_adherent"
                                                        onchange="loadFile(event, 'img4')">
                                                    <img id="img4" width="50%" class="center" />
                                                </div> --}}
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي للقيم(ة)
                                                        الديني(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="bac"
                                                        name="attest_revenu_mensuel_adh"
                                                        onchange="loadFile(event, 'img5')">
                                                    <img id="img5" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="attestation" class="float-left"> شهادة عمل أو عدم عمل
                                                        الزوج(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" name="attestationProfession_conjoint"
                                                        onchange="loadFile(event, 'img6')">
                                                    <img id="img6" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي للزوج(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="bac"
                                                        type="file" onchange="loadFile(event, 'img7')"
                                                        name="attest_revenu_mensuel_conj">
                                                    <img id="img7" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="attestation" class="float-left">شهادة القيم الديني
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" name="attestationAdherent"
                                                        onchange="loadFile(event, 'img8')">
                                                    <img id="img8" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="attestation" class="float-left">
                                                        البطاقة الوطنية للطالب :
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" name="cni_image"
                                                        onchange="loadFile(event, 'img9')">
                                                    <img id="img9" width="50%" class="center" />
                                                </div>
                                                <div class="col-12 form-group mg-t-8 text-center"
                                                    style="margin-top:70px !important">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix">
                                            <a href="javascript:;" class="form-wizard-previous-btn "
                                                style="background : #504A4A">السابق</a>
                                            <button type="submit" class="form-wizard-submit"
                                                style="background : #901E2B">حفظ</button>


                                        </div>

                                    </fieldset>
                                </form>
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
                    $('#province_id').append('<option value=' + val.id + ' >' + val
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
                $.ajax({
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: "{{ route('candidature.validate') }}",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function (data) {
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
                    },
                    error: function (e) {
                        if(e.status == 422) {
                            var errors = e.responseJSON.errors;
                            for (var key of Object.keys(errors)) {
                                $('.js-error-field[data-target="' + key + '"]').text(errors[key])
                            }
                        }
                    }
                });
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
            data.append("step", 'step_4');
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "{{ route('candidature.validate') }}",
                data: data,
                processData: false,
                contentType: false,
                success: function (data) {
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
                },
                error: function (e) {
                    if(e.status == 422) {
                        var errors = e.responseJSON.errors;
                        for (var key of Object.keys(errors)) {
                            $('.js-error-field[data-target="' + key + '"]').text(errors[key])
                        }
                    }
                }
            });
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
            mask: '9999999999',
            placeholder: '__________',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        //////////////
        $("#phone1").inputmask({
            mask: '9999999999',
            placeholder: '__________',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        $("#phone2").inputmask({
            mask: '9999999999',
            placeholder: '__________',
            showMaskOnHover: false,
            showMaskOnFocus: false,
            onBeforePaste: function (pastedValue, opts) {
            var processedValue = pastedValue;
                return processedValue;
            }
        });
        $("#phone3").inputmask({
            mask: '9999999999',
            placeholder: '__________',
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
<script>
    $(function() {
           $('#salaire1').keyup(function() {
               var txtlen = $(this).val().length;
               console.log(txtlen);
               if (txtlen< 3) {
                $('#msgErr1').slideDown();
                }else{
                    $('#msgErr1').slideUp();  
                }
 
           });
       });
</script>

</html>