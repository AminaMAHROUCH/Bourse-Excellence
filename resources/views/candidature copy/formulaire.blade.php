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
                    <div class="card px-0 pt-4 pb-0 mt-5 mb-5" style="background:#FFFEF5">
                        <h2><strong>بطاقة الترشيح لمنحة التفوق </strong></h2>
                        <p>Fill all form field to go to next step</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="{{ route('candidature.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <!-- progressbar -->
                                    <ul id="progressbar">
                                        <li class="active" id="account"><strong style="font-size: 20px;">معلومات شخصية
                                            </strong></li>
                                        <li id="personal"><strong style="font-size: 20px;">معلومات الأبوين</strong></li>
                                        <li id="payment"><strong style="font-size: 20px;">معلومات دراسية</strong></li>
                                        <li id="confirm"><strong style="font-size: 20px;">الشواهد المطلوبة</strong></li>
                                    </ul> <!-- fieldsets -->
                                    <fieldset style="background:#FFFEF5">
                                        <div class="form-card" style="background:#FFFEF5">
                                            <center>
                                                <div class="form-group" style="display: inline-grid;">
                                                    <input type="file" accept="image/*" name="photo" id="file"
                                                        onchange="loadFile(event, 'img1')" style="display: none;">
                                                    <label style="float: right !important;" for="file"
                                                        style="cursor: pointer; border: 2px solid black;">صورة
                                                        شخصية</label>
                                                    <img id="img1" width="150" height="150" />
                                                </div>
                                            </center>
                                            <div class="row">
                                            <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">الاسم الكامل :
                                                        </label>
                                                    <input type="text" class="form-control" name="full_name"
                                                        placeholder=" ادخل الاسم الكامل ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم البطاقة الوطنية
                                                        :</label>
                                                    <input type="text" class="form-control" name="cni"
                                                        placeholder=" ادخل رقم البطاقة الوطنية ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">مكان الازدياد :</label>
                                                    <input id="lieu" type="text" class="form-control"
                                                        name="lieu_naissance" placeholder=" ادخل مكان الازدياد ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">تاريخ الازدياد :</label>
                                                    <input id="date" type="date" class="form-control"
                                                        name="date_naissance" placeholder="ادخل تاريخ الازدياد">
                                                </div>

                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">البريد الالكتروني :</label>
                                                    <input id="email" type="email" class="form-control" name="email"
                                                        placeholder="ادخل البريد الالكتروني">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="sex"
                                                        class="float-right"> ادخل الجنس</label>
                                                    <select name="sex" class="form-control">
                                                        <option disabled selected>اختر</option>
                                                        <option value="ذكر">ذكر</option>
                                                        <option value="أنثى">أنثى</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">الهاتف 1</label>
                                                    <input id="tel1" type="tel" class="form-control" name="telephone_1"
                                                        placeholder="ادخل الهاتف 1">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right"> الهاتف 2</label>
                                                    <input id="tel2" type="tel" class="form-control" name="telephone_2"
                                                        placeholder="ادخل الهاتف 2">
                                                </div>

                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="etat"
                                                        class="float-right"> ادخل الحالة الجسدية </label>
                                                    <select name="etat" tabindex="-1" class="form-control">
                                                        <option selected disabled>اختر</option>
                                                        <option value="سليم">سليم</option>
                                                        <option value="ذوي الاحتياجات الخاصة">ذوي الاحتياجات الخاصة
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="situation"
                                                        class="float-right"> الحالة العائلية
                                                        :</label>
                                                    <select name="situation" aria-hidden="true" class="form-control">
                                                        <option disabled selected>اختر</option>
                                                        <option value="عازب (ة)">عازب (ة) </option>
                                                        <option value="متزوج (ة)">متزوج (ة) </option>
                                                        <option value="مطلق (ة)"> مطلق (ة) </option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="deces"
                                                        class="float-right">هل أحد الأبوين متوفي
                                                        :</label>
                                                    <select name="deces" aria-hidden="true" class="form-control">
                                                        <option disabled selected>اختر</option>
                                                        <option value="الأم">الأم</option>
                                                        <option value="الأب">الأب</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="deces"
                                                        class="float-right">عدد الإخوة :</label>
                                                    <input id="nbr" type="number" class="form-control" name="nbr"
                                                        placeholder="ادخل عدد الإخوة" min="0">
                                                </div>
                                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">العنوان :</label>
                                                    <textarea class="textarea form-control" name="adresse" cols="10"
                                                        rows="5" placeholder="ادخل العنوان"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="التالي " />
                                    </fieldset>

                                    <fieldset style="background:#FFFEF5">
                                        <div class="form-card" style="background:#FFFEF5">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">اسم القيم(ة)
                                                        الديني(ة) :
                                                    </label>
                                                    @if ($adherent)
                                                        <input id="nameFather" type="text" class="form-control"
                                                            value="{{ $adherent->full_name }}" name="full_name_f"
                                                            placeholder=" ادخل اسم القيم(ة) الديني(ة)" readonly>
                                                    @else
                                                        <input id="nameFather" type="text" name="full_name_f"
                                                            class="form-control"
                                                            placeholder=" ادخل اسم القيم(ة) الديني(ة)">
                                                    @endif
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">مهنته(ا) :</label>
                                                    {{-- <input id="job" type="text" class="form-control" name="profession_f"
                                                        placeholder="ادخل مهنته(ا) "> --}}
                                                    <select class="form-control" name="profession_f[]" id="mission"
                                                        multiple>
                                                        <option disbled selected>ادخل مهنته(ا)</option>
                                                        <option value="إمام مرشد">إمام مرشد</option>
                                                        <option value="مرشد(ة)">مرشد(ة)</option>
                                                        <option value="إمام">إمام</option>
                                                        <option value="خطيب">خطيب</option>
                                                        <option value="مؤذن">مؤذن</option>
                                                        <option value="واعظ">واعظ</option>
                                                        <option value="متفقد">متفقد</option>
                                                        <option value="منظف">منظف</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم الإنخراط :</label>
                                                    <input id="nameFather" type="text" class="form-control"
                                                        name="matricule" placeholder="ادخل رقم الإنخراط">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم البطاقة الوطنية
                                                        :</label>
                                                    <input id="job" type="text" class="form-control" name="cniP"
                                                        placeholder="ادخل رقم البطاقة الوطنية ">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="prix"
                                                        class="float-right"> الجهة :</label>
                                                    <select id="region_id" name="region_id" class="form-control">
                                                        <option disabled selected>اختر الجهة</option>
                                                        @foreach ($regions as $id => $region)
                                                            <option value="{{ $id }}"
                                                                {{ old('region_id') == $id ? 'selected' : '' }}>
                                                                {{ $region }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="num"
                                                        class="float-right"> الإقليم :</label>
                                                    <select name="province_id" id="province_id"
                                                        class="select2 form-control">
                                                        <option selected disabled>اختر الاقليم</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">اسم الزوج(ة) الكامل :
                                                    </label>
                                                    <input id="namemother" type="text" class="form-control"
                                                        name="full_name_m" placeholder="ادخل اسم الزوج(ة) الكامل ">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">مهنته(ا) : </label>
                                                    <input id="jobe" type="text" class="form-control"
                                                        name="profession_m" placeholder="ادخل مهنته(ا) ">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم هاتف الأب :</label>
                                                    <input id="num" type="text" class="form-control" name="tel_f"
                                                        placeholder="ادخل رقم هاتف الأب">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم هاتف الأم :</label>
                                                    <input id="numero" type="text" class="form-control" name="tel_m"
                                                        placeholder="ادخل رقم هاتف الأم">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">عنوان الأباء :</label>
                                                    <textarea class="textarea form-control" name="adresse_parents"
                                                        id="form-message" cols="10" rows="5"
                                                        placeholder="ادخل عنوان الأباء "></textarea>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="السابق" />
                                        <input type="button" name="next" class="next action-button" value="التالي " />
                                    </fieldset>

                                    <fieldset style="background:#FFFEF5">
                                        <div class="form-card" style="background:#FFFEF5">
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">رقم مسار :</label>
                                                    <input type="text" class="form-control" name="cne"
                                                        placeholder="ادخل رقم مسار">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">المعدل السنوي للباكالوريا
                                                        :</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}"
                                                        name="note" placeholder="ادخل المعدل السنوي للباكالوريا">
                                                    @if ($errors->has('note'))
                                                        <span class="text-danger">{{ $errors->first('note') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">

                                                    <label style="float: right !important;" for="mention"
                                                        class="float-right"> الميزة :</label>
                                                    <select class="select2 form-control" name="mention"
                                                        aria-hidden="true">
                                                        <option value="" selected disabled>اختر</option>
                                                        <option value="AssezBien">مستحسن</option>
                                                        <option value="Bien">حسن</option>
                                                        <option value="TresBien">حسن جدا</option>
                                                        <option value="Excellent">ممتاز</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">السنة الدراسية الجارية
                                                        :</label>
                                                    <input id="" type="text" class="form-control"
                                                        placeholder="مثال : 2020/2021" name="anneUniversitaire"
                                                        placeholder="السنة الدراسية الجارية ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">سنة الحصول على الباكالوريا
                                                        :</label>
                                                    <input id="" type="text" class="form-control" name="anne_bac"
                                                        placeholder="ادخل سنة الحصول على الباكالوريا ">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">التخصص :</label>
                                                    <input type="text" class="form-control" name="filiere"
                                                        placeholder=" ادخل التخصص">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">الجامعة :</label>
                                                    <input type="text" class="form-control" name="universite"
                                                        placeholder="ادخل الجامعة">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        class="float-right">المؤسسة :</label>
                                                    <input type="text" class="form-control" name="school"
                                                        placeholder="ادخل المؤسسة">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="السابق" />
                                        <input type="button" name="make_payment" class="next action-button"
                                            value="التالي" />

                                    </fieldset>

                                    <fieldset style="background:#FFFEF5">
                                        <div class="form-card" style="background:#FFFEF5"> <br><br>
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="AttestationBac"
                                                        style="float: right;">شهادة الباكالوريا
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        name="AttestationBac" id="AttestationBac"
                                                        onchange="loadFile(event, 'img2')">
                                                    <img id="img2" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="releve"
                                                        style="float: right;"> بيان النقط :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="releve"
                                                        name="RelvesNote" onchange="loadFile(event, 'img3')">
                                                    <img id="img3" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="attestation"
                                                        style="float: right;"> شهادة عمل الأب
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" multiple="multiple" name="attestProfessionf"
                                                        onchange="loadFile(event, 'img4')">
                                                    <img id="img4" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="bac"
                                                        style="float: right;">شهادة الدخل الشهري للقيم(ة)
                                                        الديني(ة) :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="bac"
                                                        name="salaireF" onchange="loadFile(event, 'img5')">
                                                    <img id="img5" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="attestation"
                                                        style="float: right;"> شهادة عمل الزوج(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" multiple="multiple" name="attestProfessionm"
                                                        onchange="loadFile(event, 'img6')">
                                                    <img id="img6" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="bac"
                                                        style="float: right;">شهادة الدخل الشهري الزوج(ة)
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*" id="bac"
                                                        type="file" onchange="loadFile(event, 'img7')" name="salaireM">
                                                    <img id="img7" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="attestation"
                                                        style="float: right;">شهادة القيم الديني
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" multiple="multiple" name="attestationAdherent"
                                                        onchange="loadFile(event, 'img8')">
                                                    <img id="img8" width="50%" class="center" />
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label style="float: right !important;" for="attestation"
                                                        style="float: right;">البطاقة الوطنية
                                                        :</label>
                                                    <input type="file" class="form-control" accept="image/*"
                                                        id="attestation" multiple="multiple" name="cniPhoto"
                                                        onchange="loadFile(event, 'img9')">
                                                    <img id="img9" width="50%" class="center" />
                                                </div>
                                                <div class="col-12 form-group mg-t-8 text-center"
                                                    style="margin-top:70px !important">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="السابق" />
                                        <button type="submit" class="next action-button">حفظ</button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row text-center" style="margin-left : 10% !important ; margin-right : 10% !important">
                <div class="col-lg-4"> mekens , hamria <i class="fas fa-map-marker-alt text-orange"></i></div>
                <div class="col-lg-4"><a href="mailto:admin@admin.ma" class="text-white">admin@admin.ma</a> <i
                        class="fas fa-envelope text-orange"></i></div>
                <div class="col-lg-4">0654321231 <i class="fas fa-phone text-orange"></i> </div>
            </div>
        </div>
    </footer>
</body>
<script href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" type="text/javascript">
</script>
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            head: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#region_id').on('change', function() {
            id = $(this).val();
            $.get('dropdownlistProvince', {
                id: id
            }, function(data) {
                console.log('test');
                $.each(data, function(key, val) {
                    $('#province_id').append('<option value=' + val.id + ' >' + val
                        .name + '</option>')
                });
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function() {

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $(".previous").click(function() {

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function(now) {
                    // for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({
                        'opacity': opacity
                    });
                },
                duration: 600
            });
        });

        $('.radio-group .radio').click(function() {
            $(this).parent().find('.radio').removeClass('selected');
            $(this).addClass('selected');
        });

        $(".submit").click(function() {
            return false;
        })

    });
</script>

<script>
    var loadFile = function(event, id) {
        var image = document.getElementById(id);
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>












</html>
