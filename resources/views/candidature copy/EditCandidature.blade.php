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
<style>
    .bar {
        width: 20% !important;
    }

    footer {
        background-color: #610505 !important;
        color: white;
        padding-top: 40px !important;
        padding-bottom: 40px !important;
    }

</style>

<body>
    <header>
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
                        @else
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
                                {{ $Candidature->full_name }}</span> <i class="fa fa-sign-out" aria-hidden="true"
                                style="font-size: 30px !important ; transform: rotate(180deg)"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <section style="margin-top : 0px !important">
        <div class="container-fluid" id="grad1">
            <div class="row justify-content-center">
                <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-5 mb-2">
                    <div class="card px-0 pt-4 pb-0 mt-5 mb-5" style="background:#FFFEF5">
                        <h2><strong>بطاقة تعديل معلومات المترشح </strong></h2>
                        <p>المرجو ملء جميع الخانات و ادخال جميع المعلومات</p>
                        <div class="row">
                            <div class="col-md-12 mx-0">
                                <form id="msform" action="{{ route('boursier.update', $Candidature->id) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <!-- progressbar -->
                                 {{-- @if ($Candidature->status == 'accepter')
                                        <ul id="progressbar">
                                            <li class="active bar" id="account"><strong style="font-size: 20px;">معلومات
                                                    شخصية
                                                </strong></li>
                                            <li id="personal" class="bar"><strong style="font-size: 20px;">معلومات
                                                    الأبوين</strong></li>
                                            <li id="payment" class="bar"><strong style="font-size: 20px;">معلومات
                                                    دراسية</strong></li>
                                            <li id="confirm" class="bar"><strong style="font-size: 20px;">الشواهد
                                                    المطلوبة</strong></li>
                                            <li id="document" class="bar"><strong style="font-size: 20px;">تنزيل
                                                    الوثائق</strong></li>
                                        </ul>  
                                    @else --}}
                                        <ul id="progressbar">
                                            <li class="active" id="account"><strong style="font-size: 20px;">معلومات
                                                    شخصية
                                                </strong></li>
                                            <li id="personal"><strong style="font-size: 20px;">معلومات الأبوين</strong>
                                            </li>
                                            <li id="payment"><strong style="font-size: 20px;">معلومات دراسية</strong>
                                            </li>
                                            <li id="confirm"><strong style="font-size: 20px;">الشواهد المطلوبة</strong>
                                            </li>
                                        </ul> <!-- fieldsets -->
                                   {{-- @endif --}}

                                    <fieldset style="background:#FFFEF5">
                                        <div class="form-card" style="background:#FFFEF5">
                                            <center>
                                                <div class="form-group" style="display: inline-grid;">
                                                    <input type="file" accept="image/*" name="photo" id="file"
                                                        onchange="loadFile(event, 'output1')" style="display: none;">
                                                        
                                                    <label for="file"
                                                        style="cursor: pointer; border: 2px solid black;">صورة
                                                        شخصية</label>
                                                    @if ($Candidature->photo)
<<<<<<< HEAD
                                                        <img src="{{ asset('images/' . $Candidature->photo) }}"
                                                            id="output" width="200" />
=======
                                                    <img src="{{ asset('images/' . $Candidature->photo) }}"
                                                        id="output1" width="200" />
>>>>>>> f38d62f4b01b05a3b8d056b5114611ae6053e54e
                                                    @else
                                                    <img id="output1" src={{ asset('asset/300x200.png') }}
                                                    width="200"                                                                                                                                                                         border-radius: 15px;"
                                                                class="text-center">
                                                    @endif
                                                </div>
                                            </center>
                                            <div class="row">
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="fullname" class="float-left"> اسم الكامل :</label>
                                                    <input type="text" class="form-control" name="full_name"
                                                        placeholder="اسم الكامل"
                                                        value="{{ $Candidature->nom_prenom}}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="cni" class="float-left">رقم البطاقة الوطنية :</label>
                                                    <input type="text" class="form-control" name="cni"
                                                        placeholder="رقم البطاقة الوطنية "
                                                        value="{{ $Candidature->cni }}" readonly>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> مكان الازدياد : </label>
                                                    <input id="lieu" type="text" class="form-control"
                                                        name="lieu_naissance" placeholder="مكان الازدياد "
                                                        value="{{ $Candidature->lieu_naissance }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left">تاريخ الازدياد :</label>
                                                    <input id="date" type="date" class="form-control"
                                                        name="date_naissance" placeholder="تاريخ الازدياد"
                                                        value="{{ $Candidature->date_naissance }}">
                                                </div>

                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> البريد الالكتروني :</label>
                                                    <input id="email" type="email" class="form-control" name="email"
                                                        placeholder="البريد الالكتروني :"
                                                        value="{{ $Candidature->email }}">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="sexe" class="float-left"> الجنس :</label>
                                                    <select class="select2 form-control" id="sexe" name="sex">
                                                        <option {{ $Candidature->sex == 'ذكر' ? 'selected' : '' }}>
                                                            ذكر
                                                        </option>
                                                        <option {{ $Candidature->sex == 'أنثى' ? 'selected' : '' }}>
                                                            أنثى</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الهاتف 1 :</label>
                                                    <input id="tel1" type="tel" class="form-control" name="telephone_1"
                                                        placeholder="الهاتف 1"
                                                        value="{{ $Candidature->telephone_1 }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> الهاتف 2 :</label>
                                                    <input id="tel2" type="tel" class="form-control" name="telephone_2"
                                                        placeholder="الهاتف 2"
                                                        value="{{ $Candidature->telephone_2 }}">
                                                </div>

                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="etat" class="float-left"> الحالة الجسدية :</label>
                                                    <select class="select2 form-control" id="" name="etat">
                                                        <option {{ $Candidature->etat == 'سليم' ? 'selected' : '' }}>
                                                            سليم</option>
                                                        <option
                                                            {{ $Candidature->etat == 'ذوي الاحتياجات الخاصة' ? 'selected' : '' }}>
                                                            ذوي
                                                            الاحتياجات الخاصة</option>
                                                    </select>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="situation" class="float-left"> الحالة العائلية
                                                        :</label>
                                                    <select class="select2 form-control" id="situation"
                                                        name="situation">
                                                        <option
                                                            {{ $Candidature->situation == '(ة) عازب' ? 'selected' : '' }}>
                                                            (ة) عازب
                                                        </option>
                                                        <option
                                                            {{ $Candidature->situation == '(ة) متزوج' ? 'selected' : '' }}>
                                                            (ة) متزوج
                                                        </option>
                                                        <option
                                                            {{ $Candidature->situation == 'مطلق (ة)' ? 'selected' : '' }}>
                                                            مطلق (ة)
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="deces" class="float-left">هل أحد الأبوين متوفي
                                                        :</label>
                                                    <select name="deces" aria-hidden="true" class="form-control">
                                                        <option disabled selected>اختر</option>
                                                        <option {{ $Candidature->parents_deces == 'الأم' ? 'selected' : '' }}
                                                           >
                                                            الأم</option>
                                                        <option {{ $Candidature->parents_deces == 'الأب' ? 'selected' : '' }}
                                                            >
                                                            الأب</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> عدد الإخوة :</label>
                                                    <input id="nbr" type="number" class="form-control" name="nbr"
                                                        placeholder="عدد الإخوة" min="0"
                                                        value="{{ $Candidature->nbr_freres}}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> تغيير
                                                        كلمة
                                                        السر :</label>
                                                    <input id="nbr" type="text" class="form-control" name="password"
                                                        placeholder="password">
                                                </div>
                                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                    <label for="tel2" class="float-left"> العنوان :</label>
                                                    <textarea class="textarea form-control" name="adresse" cols="10"
                                                        rows="5"
                                                        placeholder="العنوان">{{ $Candidature->adresse }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="button" name="next" class="next action-button" value="التالي " />
                                    </fieldset>
                                    <fieldset style="background:#FFFEF5">

                                        <div class="form-card" style="background:#FFFEF5">
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12">
                                                    <label for="tel2" class="float-left">اسم القيم(ة) الديني(ة)
                                                        :</label>
                                                    <input id="nameFather" type="text"
                                                        value="{{ $Candidature->nom_prenom_adherent }}" name="full_name_f"
                                                        placeholder="اسم القيم(ة) الديني(ة)" class="form-control"
                                                        readonly>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> مهنته(ا) :</label>
                                                    <input id="job" type="text" class="form-control" name="profession_f"
                                                        placeholder="مهنته(ا) "
                                                        value="{{ $Candidature->profession_f }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم
                                                        الإنخراط :</label>
                                                    <input id="nameFather" type="text" class="form-control"
                                                        name="matricule" placeholder="رقم الإنخراط :"
                                                        value="{{ $Candidature->matricule }}">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم البطاقة الوطنية :</label>
                                                    <input id="job" type="text" class="form-control" name="cniP"
                                                        placeholder="رقم البطاقة الوطنية :"
                                                        value="{{ $Candidature->cniP }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="prix" class="float-left"> الجهة :</label>
                                                    <select id="region_id" name="region_id" class="form-control">
                                                        <option disabled selected>choose your region</option>
                                                        @foreach ($regions as $id => $region)
                                                            <option value="{{ $id }}"
                                                                {{ (old('region_id') ? old('region_id') : $uniteRegional->region->id ?? '') == $id ? 'selected' : '' }}>
                                                                {{ $region }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="num " class="float-left"> الإقليم :</label>
                                                    <select name="province_id" id="province_id"
                                                        class="select2 form-control">
                                                        <option selected disabled>select</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="namemother" class="float-left">اسم الزوج(ة) الكامل
                                                        :</label>
                                                    <input id="namemother" type="text" class="form-control"
                                                        name="full_name_m" placeholder="اسم الزوج(ة) الكامل "
                                                        value="{{ $Candidature->full_name_m }}">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> مهنته(ا) :</label>
                                                    <input id="jobe" type="text" class="form-control"
                                                        name="profession_m" placeholder="مهنته(ا) "
                                                        value="{{ $Candidature->profession_m }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم هاتف الأب :</label>
                                                    <input id="num" type="text" class="form-control" name="tel_f"
                                                        placeholder="رقم هاتف الأب :"
                                                        value="{{ $Candidature->telephone_pere }}">
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> رقم
                                                        هاتف
                                                        الأم :</label>
                                                    <input id="numero" type="text" class="form-control" name="tel_m"
                                                        placeholder="رقم هاتف الأم"
                                                        value="{{ $Candidature->telephone_mere }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> عنوان الأباء :</label>
                                                    <textarea class="textarea form-control" name="adresse_parents"
                                                        id="form-message" cols="10" rows="5"
                                                        placeholder="عنوان الأباء ">{{ $Candidature->adresse_parents }}</textarea>
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
                                                    <label for="tel2" class="float-left"> رقم مسار :</label>
                                                    <input type="text" class="form-control" name="cne"
                                                        placeholder="رقم مسار" value="{{ $Candidature->cne }}"
                                                        readonly>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> المعدل السنوي للباكالوريا
                                                        :</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}"
                                                        name="note" placeholder="المعدل السنوي للباكالوريا"
                                                        value="{{ $Candidature->note }}">
                                                    @if ($errors->has('note'))
                                                        <span class="text-danger">{{ $errors->first('note') }}</span>
                                                    @endif
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="mention" class="float-left"> الميزة :</label>
                                                    <select class="select2 form-control" name="mention" tabindex="-1"
                                                        aria-hidden="true">
                                                        <option value="" selected disabled>اختر</option>
                                                        <option value="AssezBien"
                                                            {{ $Candidature->mention == 'AssezBien' ? 'selected' : '' }}>
                                                            مستحسن</option>
                                                        <option value="Bien"
                                                            {{ $Candidature->mention == 'Bien' ? 'selected' : '' }}>
                                                            حسن
                                                        </option>

                                                        <option value="TresBien"
                                                            {{ $Candidature->mention == 'TresBien' ? 'selected' : '' }}>
                                                            حسن جدا</option>
                                                        <option value="Excellent"
                                                            {{ $Candidature->mention == 'Excellent' ? 'selected' : '' }}>
                                                            ممتاز</option>
                                                    </select>
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> السنة الدراسية الجارية
                                                        :</label>
                                                    <input id="" type="text" class="form-control"
                                                        placeholder="مثال : 2020/2021" name="anneUniversitaire"
                                                        placeholder="السنة الدراسية الجارية "
                                                        value="{{ $Candidature->anneUniversitaire }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> سنة الحصول على الباكالوريا :
                                                    </label>
                                                    <input id="" type="text" class="form-control" name="anne_bac"
                                                        placeholder="سنة الحصول على الباكالوريا "
                                                        value="{{ $Candidature->anne_bac }}">
                                                </div>
                                                <div class="col-12-xl col-lg-6 col-12 form-group">
                                                    <label for="tel2" class="float-left"> التخصص :</label>
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
                                                    <input type="text" class="form-control" name="school"
                                                        placeholder="المؤسسة" value="{{ $Candidature->school }}">
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
                                                <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الباكالوريا :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="AttestationBac" style=""
                                                        onchange="loadFile(event, 'output2')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->AttestationBac)
                                                            <img src={{ asset('images/' . $Candidature->AttestationBac) }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                                name="image" class="text-center">
                                                        @else
                                                            <img id="output2" src={{ asset('asset/300x200.png') }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
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
                                                            <img src={{ asset('images/' . $Candidature->RelvesNote) }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                                name="image" class="text-center">
                                                        @else
                                                            <img id="output3" src={{ asset('asset/300x200.png') }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                                class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" row">
                                                <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="attestation" class="float-left"> شهادة عمل الأب
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attestProfessionf" style=""
                                                        onchange="loadFile(event, 'output4')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attestProfessionf)
                                                            <img src={{ asset('images/' . $Candidature->attestProfessionf) }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                                name="image" class="text-center">
                                                        @else
                                                            <img id="output4" src={{ asset('asset/300x200.png') }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                                class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي للأب
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group" name="salaireF"
                                                        style="" onchange="loadFile(event, 'output5')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->salaireF)
                                                            <img src={{ asset('images/' . $Candidature->salaireF) }}
                                                                style="width: 180px" ; name=" image"
                                                                class="text-center">
                                                        @else
                                                            <img id="output5" src={{ asset('asset/300x200.png') }}
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
                                                    <label for="attestation" class="float-left"> شهادة عمل الأم
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attestProfessionm" onchange="loadFile(event, 'output6')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attestProfessionm)
                                                            <img src={{ asset('images/' . $Candidature->attestProfessionm) }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                                name="image" class="text-center">
                                                        @else
                                                            <img id="output6" src={{ asset('asset/300x200.png') }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                                                class="text-center">
                                                        @endif
                                                        <br /><br />

                                                    </div>
                                                </div>
                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="bac" class="float-left">شهادة الدخل السنوي الأم
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group" name="salaireM"
                                                        style="" onchange="loadFile(event, 'output7')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->salaireM)
                                                            <img src={{ asset('images/' . $Candidature->salaireM) }}
                                                                style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                                                name="image" class="text-center">
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

                                                <div class=" col-xl-6 col-lg-6 col-12 form-group text-center">
                                                    <label for="attestation" class="float-left">شهادة القيم الديني
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group"
                                                        name="attestationAdherent" style=""
                                                        onchange="loadFile(event, 'output8')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->attestationAdherent)
                                                            <img src={{ asset('images/' . $Candidature->attestationAdherent) }}
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
                                                    <label for="attestation" class="float-left">البطاقة الوطنية
                                                        :</label>
                                                    <input id="bac" type="file" class=" form-group" name="cniPhoto"
                                                        style="" onchange="loadFile(event, 'output9')">
                                                    <div class="item-img text-center">
                                                        @if ($Candidature->cniPhoto)
                                                            <img src={{ asset('images/' . $Candidature->cniPhoto) }}
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
                                        <input type="button" name="previous" class="previous action-button-previous"
                                            value="السابق" />

                                        @if ($Candidature->status == 'accepter')
                                            <input type="button" name="make_payment" class="next action-button"
                                                value="التالي" />
                                        @else
                                            <button type=" submit" class="next action-button">حفظ</button>
                                        @endif
                                    </fieldset>
                                    @if ($Candidature->status == 'accepter')
                                        <fieldset style="background:#FFFEF5">
                                            <div class="form-card" style="background:#FFFEF5">
                                                <p>Le lorem ipsum est, en imprimerie, une suite de mots sans
                                                    signification
                                                    utilisée à titre provisoire pour calibrer une mise en page, le texte
                                                    définitif venant remplacer le faux-texte dès qu'il est prêt ou que
                                                    la
                                                    mise en page est achevée. Généralement, on utilise un texte en faux
                                                    latin, le Lorem ipsum ou Lipsum.</p>
                                                <a href="{{ asset('asset/engagement.pdf') }}" target="_blank">
                                                    <i class="fa fa-download"></i>تصريح بدخل القيم الديني الخاص بمنحة
                                                    التفوق
                                                </a>
                                            </div>
                                        </fieldset>
                                    @endif
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
            <div class="row text-center" style="margin-left : 10% !important ; margin-left : 10% !important">
                <div class="col-lg-4"> mekens , hamria <i class="fas fa-map-marker-alt text-orange"></i></div>
                <div class="col-lg-4"><a href="mailto:admin@admin.ma" class="text-white">admin@admin.ma</a> <i
                        class="fas fa-envelope text-orange"></i></div>
                <div class="col-lg-4">0654321231 <i class="fas fa-phone"></i> </div>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> --}}
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
