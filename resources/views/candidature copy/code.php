@extends('candidature.layout.master')
<style>
    .font {
        font-family: 'DroidArabicKufiRegular';
    }

</style>
@section('content')
    <!-- Breadcubs Area Start Here -->
    <div class="breadcrumbs-area">
        <h2 class="text-center">تعديل معلومات المترشح</h2>
    </div>
    <!-- Breadcubs Area End Here -->
    <!-- Student Table Area Start Here -->
    <div>
        <div class="card-body">
            <div>
                <div>
                    <div class="header-inline item-header">
                        <h3 class="text-dark-medium font-medium">SUIVI DE CANDIDATURE</h3>
                        <div class="header-elements">
                            <button>STATUS</button>
                        </div>
                    </div>
                    @if (!Auth::user()->valider)
                        <div class="header-inline item-header">
                            <div class="header-elements">
                                <a href="{{ asset('images/1360958101.docx') }}" download>document 1 </a><br />
                                <a href="{{ asset('images/1360958101.docx') }}" download>document 2 </a>
                            </div>
                        </div>
                    @endif
                    <form class="new-added-form" action="{{ route('candidature.update', $Candidature->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <h3 class="mb-5 text-center font">معلومات شخصية</h3>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->photo) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                </div>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <input id="releve" type="file" class=" form-group" name="photo"
                                    style="
                                                                                                                                                padding-left: 40px;
                                                                                                                                                padding-right: 40px;
                                                                                                                                                width: 280px;
                                                                                                                                            ">
                            </div>
                        </div>
                        <br><br>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="fullname"> اسم الكامل :</label>
                                <input id="fullname" type="text" class="form-control" name="full_name"
                                    value="{{ $Candidature->full_name }}">
                            </div>

                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="cni">رقم البطاقة الوطنية :</label>
                                <input id="cni" type="text" class="form-control" name="cni"
                                    value="{{ $Candidature->cni }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="lieu"> مكان الازدياد :</label>
                                <input id="lieu" type="text" class="form-control" name="lieu_naissance"
                                    value="{{ $Candidature->lieu_naissance }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="date"> تاريخ الازدياد:</label>
                                <input type="date" placeholder="" class="form-control" name="naissance"
                                    value={{ $Candidature->anne_bac }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="email"> البريد الالكتروني :</label>
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ $Candidature->email }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="sexe"> الجنس :</label>
                                <select class="select2" id="sexe" name="sex">
                                    <option {{ $Candidature->sex == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                    <option {{ $Candidature->sex == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="tel1"> الهاتف 1 :</label>
                                <input id="tel1" type="tel" class="form-control" name="telephone_1"
                                    value="{{ $Candidature->telephone_1 }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="tel2"> الهاتف 2 :</label>
                                <input id="tel2" type="tel" class="form-control" name="telephone_2"
                                    value="{{ $Candidature->telephone_2 }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="situation"> الحالة العائلية :</label>
                                <select class="select2" id="situation" name="situation">
                                    <option {{ $Candidature->situation == '(ة) عازب' ? 'selected' : '' }}>(ة) عازب
                                    </option>
                                    <option {{ $Candidature->situation == '(ة) متزوج' ? 'selected' : '' }}>(ة) متزوج
                                    </option>
                                    <option {{ $Candidature->situation == 'مطلق (ة)' ? 'selected' : '' }}>مطلق (ة)
                                    </option>
                                </select>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="etat"> الحالة الجسدية :</label>
                                <select class="select2" id="" name="etat">
                                    <option {{ $Candidature->etat == 'سليم' ? 'selected' : '' }}>سليم</option>
                                    <option {{ $Candidature->etat == 'ذوي الاحتياجات الخاصة' ? 'selected' : '' }}>ذوي
                                        الاحتياجات الخاصة</option>

                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="etat"> تغيير كلمة السر :</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-12 form-group">
                                <label for="adresse"> العنوان :</label>
                                <textarea class="textarea form-control" name="adresse" id="form-message" cols="10"
                                    rows="9">{{ $Candidature->adresse }}</textarea>
                            </div>
                        </div>
                        <h3 class="mb-5 mt-5 font text-center ">معلومات أبوية</h3>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="namefather">اسم القيم(ة) الديني(ة) :</label>
                                <input id="nameFather" type="text" class="form-control" name="full_name_f"
                                    value="{{ $Candidature->full_name_f }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="job"> مهنته(ا) :</label>
                                <input id="job" type="text" class="form-control" name="profession_f"
                                    value="{{ $Candidature->profession_f }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="namefather"> رقم الإنخراط :</label>
                                <input id="nameFather" type="text" class="form-control" name="matricule"
                                    value="{{ $Candidature->matricule }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="job"> رقم البطاقة الوطنية :</label>
                                <input id="job" type="text" class="form-control" name="cniP"
                                    value="{{ $Candidature->cniP }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="prix"> الجهة :</label>
                                <select class="select2" id="region_id" name="region_id">
                                    @foreach ($regions as $id => $region)
                                        <option value="{{ $id }}"
                                            {{ (old('region_id') ? old('region_id') : $uniteRegional->region->id ?? '') == $id ? 'selected' : '' }}>
                                            {{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="num"> الإقليم :</label>
                                <select name="province_id" id="province_id" class="select2 ">
                                    <option selected disabled>select</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="namemother">اسم الزوج(ة) الكامل :</label>
                                <input id="namemother" type="text" class="form-control" name="full_name_m"
                                    value="{{ $Candidature->full_name_m }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="jobe"> مهنته(ا) :</label>
                                <input id="jobe" type="text" class="form-control" name="profession_m"
                                    value="{{ $Candidature->profession_m }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="num">رقم هاتف الأب :</label>
                                <input id="num" type="text" class="form-control" name="tel_f"
                                    value="{{ $Candidature->tel_f }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="numero">رقم هاتف الأم:</label>
                                <input id="numero" type="text" class="form-control" name="tel_m"
                                    value="{{ $Candidature->tel_m }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-12 form-group">
                                <label for="adresse"> عنوان الأباء :</label>
                                <textarea class="textarea form-control" name="adresse_parents" id="form-message" cols="10"
                                    rows="9">{{ $Candidature->adresse_parents }}</textarea>
                                </textarea>
                            </div>
                        </div>
                        <h3 class="mb-5 mt-5  font text-center">معلومات دراسية</h3>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="cne"> رقم مسار :</label>
                                <input id="cne" type="text" class="form-control" name="cne"
                                    value="{{ $Candidature->cne }}" readonly>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="moyenne">المعدل السنوي للباكالوريا :</label>
                                <input id="moyenne" type="text" class="form-control" name="note"
                                    value="{{ $Candidature->note }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="mention"> الميزة :</label>
                                <select class="select2" id="mention" name="mention">
                                    <option selected>اختر الميزة</option>
                                    <option value="AssezBien"
                                        {{ $Candidature->situation == 'AssezBien' ? 'selected' : '' }}>مستحسن</option>
                                    <option value="Bien" {{ $Candidature->situation == 'Bien' ? 'selected' : '' }}>حسن
                                    </option>
                                    <option value="TresBien"
                                        {{ $Candidature->situation == 'TresBien' ? 'selected' : '' }}>حسن جدا</option>
                                    <option value="Excellent"
                                        {{ $Candidature->situation == 'Excellent' ? 'selected' : '' }}>ممتاز</option>
                                </select>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="moyenne">سنة الحصول على البكالوريا :</label>
                                <input id="moyenne" type="text" class="form-control" name="anne_bac"
                                    value="{{ $Candidature->anne_bac }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="anneeC"> السنة الدراسية الجارية:</label>
                                <input id="anneeC " type="text" class="form-control" name="anneUniversitaire"
                                    value="{{ $Candidature->anneUniversitaire }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="specialite"> التخصص :</label>
                                <input id="specialite" type="text" class="form-control" name="filiere"
                                    value="{{ $Candidature->filiere }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="univer"> الجامعة :</label>
                                <input id="univer" type="text" class="form-control" name="universite"
                                    value="{{ $Candidature->universite }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group">
                                <label for="ecole"> المؤسسة :</label>
                                <input id="ecole" type="text" class="form-control" name="school"
                                    value="{{ $Candidature->school }}">
                            </div>
                        </div>
                        <h3 class="mb-5 mt-5 text-center font ">الشواهد المطلوبة</h3>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="bac">شهادة الباكالوريا :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="AttestationBac"
                                        style="
                                                                                                                                                                                padding-left: 28px;
                                                                                                                                                                                padding-right: 28px;
                                                                                                                                                                                width: 260px;
                                                                                                                                                                            ">
                                </div>
                                {{-- <input id="bac" type="file" class="form-control" name="AttestationBac"> --}}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="releve"> بيان النقط :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="RelvesNote"
                                        style="
                                                                                                                                                                            padding-left: 28px;
                                                                                                                                                                            padding-right: 28px;
                                                                                                                                                                            width: 260px;
                                                                                                                                                                        ">
                                </div>
                                {{-- <input id="releve" type="file" class="form-control" name="RelvesNote"> --}}
                            </div>
                        </div>
                        .
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="attestation"> شهادة عمل الأب :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="attestProfessionf"
                                        style="
                                                                                                                                                                        padding-left: 28px;
                                                                                                                                                                        padding-right: 28px;
                                                                                                                                                                        width: 260px;
                                                                                                                                                                    ">
                                </div>
                                {{-- <input id="attestation" type="file" class="form-control" multiple="multiple" --}}
                                {{-- name="attestProfessionf"> --}}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="bac">شهادة الدخل السنوي للأب :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="salaireF"
                                        style="
                                                                                                                                                                    padding-left: 28px;
                                                                                                                                                                    padding-right: 28px;
                                                                                                                                                                    width: 260px;
                                                                                                                                                                ">
                                </div>
                                {{-- <input id="bac" type="file" class="form-control" name="salaireF"> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="attestation"> شهادة عمل الأم :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="attestProfessionm"
                                        style="
                                                                                                                                                                padding-left: 28px;
                                                                                                                                                                padding-right: 28px;
                                                                                                                                                                width: 260px;
                                                                                                                                                            ">
                                </div>
                                {{-- <input id="attestation" type="file" class="form-control" multiple="multiple"
                                    name="attestProfessionm"> --}}
                            </div>
                            <div class="col-xl-6 col-lg-6 col-12 form-group text-center">
                                <label for="bac">شهادة الدخل السنوي الأم :</label>
                                <div class="item-img text-center">
                                    @if ($Candidature->photo)
                                        <img src={{ asset('images/' . $Candidature->attestationBac) }}
                                            style="width: 180px;
                                                                                                                                                                                                                                            border-radius: 15px;"
                                            name="image" class="text-center">
                                    @else
                                        <img src={{ asset('asset/300x200.png') }}
                                            style="width: 180px;
                                                                                                                                                                                                                                        border-radius: 15px;"
                                            class="text-center">
                                    @endif
                                    <br /><br />
                                    <input id="bac" type="file" class=" form-group" name="salaireM"
                                        style="
                                                                                                                                                            padding-left: 28px;
                                                                                                                                                            padding-right: 28px;
                                                                                                                                                            width: 260px;
                                                                                                                                                        ">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mb-5">
                            <div class="col-lg-12 text-center inscrire">
                                <button class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark"
                                    type="submit">تــــــعـــــــديل</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Student Table Area End Here -->

@endsection
