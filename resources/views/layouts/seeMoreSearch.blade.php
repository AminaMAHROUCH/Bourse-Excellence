@extends('layouts.master')
<style>
    .titre {
        background-color: #f7f7f7 !important;
    }

    h4 {
        color: rgb(116, 116, 116) !important;
    }

    ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
    }

    ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
    }

    ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
    }

    ul.breadcrumb {
        background-color: #f7f7f7 !important;
        padding-bottom: 0px !important;
        font-size: 13px !important;
    }

    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    table {
        border-style: none !important;
    }

    a.active {
        background: black !important;
    }

    .btn_ {
        border: solid 1px white;
        background: #9cc8e2 !important;
        margin-left: 10px !important;
    }

    .btn_:hover {
        color: white !important;
    }

    input {
        background-color: rgb(232, 232, 232) !important;
        border-color: rgb(232, 232, 232) !important;
        border-style: rgb(116, 116, 116) !important;
        color: rgb(116, 116, 116) !important;
    }

    input:focus {
        background-color: rgb(226, 226, 226) !important;
        border-color: red !important;
    }

    /* @media screen and (max-width: 700px) {
        .adresseAA {
            width: 200px !important;
        }
    } */

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"
                            style="    width: 20px !important;"></i>الرئيسية </a></li>
                <li><a href="{{ url('boursier/archive') }}"> <i class="fas fa-exclamation-triangle text-gray"></i>
                        الشكايات</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">لائحة الطلبة المرشحين للمنحة</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-header mt-2 bg-white">
                        <div class="row mr-2">
                            <div class="col-lg-8">
                                <ul class="nav nav-pills">
                                    <li class="nav-item mb-2"><a class="btn nav-link btn_ active" href="#activity"
                                            data-toggle="tab">معلومات
                                            شخصية</a></li>
                                    <li class="nav-item mb-2"><a class=" btn btn_ nav-link" href="#timeline"
                                            data-toggle="tab">
                                            معلومات
                                            ابوية</a></li>
                                    <li class="nav-item mb-2"><a class="btn btn_ nav-link" href="#settings"
                                            data-toggle="tab">معلومات
                                            دراسية</a></li>
                                    <li class="nav-item mb-2"><a class="btn btn_ nav-link" href="#attest"
                                            data-toggle="tab">الشواهد أو الوثائق</a></li>
                                    <li class="nav-item mb-2"><a class="btn btn_ nav-link" href="#bourse" data-toggle="tab">
                                            المنحة </a></li>
                                </ul>
                            </div>
                            <div class="col-lg-4" style="text-align: left !important">
                                <button class="btn bg-warning text-white btn-sm">{{ $etud->status }}</button>
                                <button class="btn text-white btn-sm"
                                    style="background-color: black !important">{{ $etud->dateInscription }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <div class="container mt-4 mb-4">
                                    <div class="row mt-5">
                                        <div class="col-lg-12 text-center">
                                            @if ($etud->photo)
                                                <a href="{{ asset('images/' . $etud->photo) }}">
                                                    <img src={{ asset('images/' . $etud->photo) }}
                                                        style=" height: 120px; width: 120px;" class="img-fluid ">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style=" height: 120px; width: 120px;">
                                            @endif
                                        </div>
                                    </div>
                                    <br /><br />
                                    <div class="row  ">
                                        <div class="col-lg-3 text-bold">
                                            الاسم الكامل بالقرنسية:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->nom_prenom }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الاسم الكامل بالفرنسية
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->nom_prenomArab }}" readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            ر.ب.و:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->cni }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            البريد الالكتروني:
                                        </div>
                                        <div class="col-lg-3">
                                            <input type=" " class="w-100" value=" {{ $etud->email }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-3  text-bold">
                                            الجنس :
                                        </div>
                                        <div class="col-lg-3 ">
                                            <input class="w-100" value="{{ $etud->sexe }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الحالة الجسدية :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->etat_physique }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            الهاتف 1 :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="  {{ $etud->telephone_1 }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الهاتف 2 :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="  {{ $etud->telephone_2 }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            مكان الازدياد :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->lieu_naissance }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            تاريخ الازدياد:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $etud->date_naissance }}" readonly>

                                        </div>

                                    </div>
                                    <br />
                                    <div class="row ">
                                        <div class="col-lg-3    text-bold">
                                            العنوان
                                        </div>
                                        <div class="col-lg-9">
                                            <input class="w-100" class="adresseAA" value="{{ $etud->adresse }}">

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="timeline">
                                <div class="container ml-5 mr-5 mt-5 mb-5">
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            اسم القيم(ة) الديني(ة) الكامل :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $etud->nom_prenom_adherent }}">
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            مهنته(ا) :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id=" " value="{{ $etud->profession_adherent }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            رقم الإنخراط :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $etud->matricule }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            رقم البطاقة الوطنية :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="  {{ $etud->cni_adherent }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row  ">
                                        <div class="col-lg-3 text-bold">
                                            الجهة :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="  ">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            الاقليم
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value=" ">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            اسم الزوج(ة) الكامل :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value=" {{ $etud->nom_prenom_conjoint }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            مهنته(ا) :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $etud->profession_conjoint }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            رقم هاتف الأب :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $etud->telephone_adherent }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            رقم هاتف الأم:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $etud->telephone_conjoint }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            عدد الاخوة :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $etud->nbr_freres }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            هل الاب اة الام متوفي :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="  {{ $etud->parents_deces }}">

                                        </div>
                                    </div><br>
                                    <div class="row   ">
                                        <div class="col-lg-3 text-bold  ">
                                            عنوان الأباء :
                                        </div>
                                        <div class="col-lg-9">
                                            <input class="w-100" class="adresseAA" value="{{ $etud->adresse_parents }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="attest">
                                <div class="container ml-5 mr-5 mt-5 mb-5">
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            شهادة عمل القيم(ة) الديني(ة) :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->attestationProfession_adherent)
                                                <a href="{{ asset('images/' . $etud->attestationProfession_adherent) }}">
                                                    <img src={{ asset('images/' . $etud->attestationProfession_adherent) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            شهادة عمل الزوج(ة) :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->attestationProfession_conjoint)
                                                <a href="{{ asset('images/' . $etud->attestationProfession_conjoint) }}">
                                                    <img src={{ asset('images/' . $etud->attestationProfession_conjoint) }}
                                                        style=" height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif

                                        </div>
                                    </div><br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            شهادة الدخل الشهري للقيم(ة) الديني(ة) :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->attest_revenu_mensuel_adh)
                                                <a href="{{ asset('images/' . $etud->attest_revenu_mensuel_adh) }}">
                                                    <img src={{ asset('images/' . $etud->attest_revenu_mensuel_adh) }}
                                                        style="height: 200px; width: 100%;;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif


                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            شهادة الدخل الشهري الزوج(ة) :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->attest_revenu_mensuel_conj)
                                                <a href="{{ asset('images/' . $etud->attest_revenu_mensuel_conj) }}">
                                                    <img src={{ asset('images/' . $etud->attest_revenu_mensuel_conj) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                    </div><br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            البطاقة الوطنية للطالب :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->cni_image)
                                                <a href="{{ asset('images/' . $etud->cni_image) }}">
                                                    <img src={{ asset('images/' . $etud->cni_image) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            شهادة القيم الديني (ة) :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->attestationAdherent)
                                                <a href="{{ asset('images/' . $etud->attestationAdherent) }}">
                                                    <img src={{ asset('images/' . $etud->attestationAdherent) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded ">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif

                                        </div>
                                    </div><br />
                                    <div class="row  ">
                                        <div class="col-lg-3 text-bold">
                                            شهادة الباكالوريا :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($etud->AttestationBac)
                                                <a href="{{ asset('images/' . $etud->AttestationBac) }}">
                                                    <img src={{ asset('images/' . $etud->AttestationBac) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            بيان النقط :
                                        </div>
                                        <div class="col-lg-3">

                                            @if ($etud->RelvesNote)
                                                <a href="{{ asset('images/' . $etud->RelvesNote) }}">
                                                    <img src={{ asset('images/' . $etud->RelvesNote) }}
                                                        style="height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane m-3" id="settings">
                                <div class="row">
                                    <div class="col-lg-3 text-bold"> رقم مسار :</div>
                                    <div class="col-lg-3">{{ $etud->cne }}</div>
                                    <div class="col-lg-3 text-bold">سنة الحصول على الباكالوريا :</div>
                                    <div class="col-lg-3">{{ $etud->anne_bac }}</div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">النقطة :</div>
                                    <div class="col-lg-3">{{ $etud->note }}</div>
                                    <div class="col-lg-3 text-bold">الميزة :</div>
                                    <div class="col-lg-3"> {{ $etud->mention }}</div>
                                </div><br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">الجامعة :</div>
                                    <div class="col-lg-3">{{ $etud->universite }}</div>
                                    <div class="col-lg-3 text-bold">المؤسسة :</div>
                                    <div class="col-lg-3"> {{ $etud->ecole }}</div>
                                </div><br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">الفوج :</div>
                                    <div class="col-lg-3">{{ $etud->promotion }}</div>
                                    <div class="col-lg-3 text-bold">السنة الدراسية :</div>
                                    <div class="col-lg-3"> {{ $etud->anne_universitaire }}</div>
                                </div><br />

                            </div>

                            <div class="tab-pane m-3" id="bourse">
                                <h6 class="text-black mb-1 mr-2">معلومات حول المنحة</h6>
                                <hr class="titre ml-2 mr-2 mt-0">
                                <table class="table table-bordered table-striped">
                                    <tr class="text-center">
                                        <th>السنة الدراسية</th>
                                        <th>رقم الحساب </th>
                                        <th>المبلغ </th>
                                        <th>تاريخ</th>
                                        <th>الحالة</th>
                                        <th>Exceptionné ?</th>
                                    </tr>
{{$etudBourse}}
                                    <!--@foreach ($etudBourse as $eb)-->
                                    <!--{{$eb}}-->
                                     
                                    <!--@endforeach-->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
