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

    .btn {
        border: solid 1px white;
        background: #9cc8e2 !important;
        margin-left: 10px !important;
    }

    .btn:hover {
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

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"
                            style="    width: 20px !important;"></i>الرئيسية </a></li>
                <li><a href="{{ url('boursier/etudiant/liste') }}"> <i class="fas fa-info text-gray"></i>
                        معلومات الطالب</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> معلومات الطالب</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-header mt-2 bg-white">
                        <div class="row mr-2">
                            <div class="col-lg-8">
                                <ul class="nav nav-pills">
                                
                                        <li class="nav-item mb-2"><a class="btn nav-link active" href="#activity"
                                        data-toggle="tab">معلومات
                                        شخصية</a></li>
                                        <li class="nav-item mb-2"><a class=" btn nav-link" href="#timeline" data-toggle="tab">
                                        معلومات
                                        ابوية</a></li>
                                        <li class="nav-item mb-2"><a class="btn nav-link" href="#settings" data-toggle="tab">معلومات
                                        دراسية</a></li>
                                        <li class="nav-item mb-2"><a class="btn nav-link" href="#attest"
                                            data-toggle="tab">الشواهد أو الوثائق</a></li>
                                 </ul>
                            </div>
                            <div class="col-lg-4" style="text-align: left !important">
                                <button class="btn text-white btn-sm" style="background-color: black !important"
                                disabled>الفوج:{{ $student->promotion }}</button>

                             </div>

                        </div></div>
                    

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <div class="container mt-4 mb-4">
                                    <div class="row mt-5">
                                        <div class="col-lg-12 text-center">
                                            @if ($student->photo)
                                                <a href="{{ asset('images/' . $student->photo) }}" target="_blank">
                                                    <img src={{ asset('images/' . $student->photo) }}
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
                                            الاسم الكامل:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $student->nom_prenom }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            ر.ب.و:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $student->cni }}" readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            مكان الازدياد :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $student->lieu_naissance }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            تاريخ الازدياد:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $student->date_naissance }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row   ">
                                        <div class="col-lg-3  text-bold">
                                            البريد الالكتروني:
                                        </div>
                                        <div class="col-lg-3">
                                            <input type=" " class="w-100" value=" {{ $student->email }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الجنس :
                                        </div>
                                        <div class="col-lg-3 ">
                                            <input class="w-100" value="{{ $student->sexe }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            الهاتف 1 :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="  {{ $student->telephone_1 }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الهاتف 2 :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="  {{ $student->telephone_2 }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            الحالة العائلية :
                                        </div>
                                        <div class="col-lg-3  ">
                                            <input class="w-100" value="  {{ $student->telephone_adherent }}" readonly>

                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            الحالة الجسدية :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $student->etat_physique }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row ">
                                        <div class="col-lg-3    text-bold">
                                            العنوان
                                        </div>
                                        <div class="col-lg-9">
                                            <input class="w-100" class="adresseAA" value="{{ $student->adresse }}">

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
                                            <input class="w-100" value="{{ $student->nom_prenom_adherent }}">
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            (ا)مهنته :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id=" "
                                                value="{{ $student->profession_adherent }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            رقم الإنخراط :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $student->matricule }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            رقم البطاقة الوطنية :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="  {{ $student->cni_adherent }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row  ">
                                        <div class="col-lg-3 text-bold">
                                            الجهة :
                                        </div>
                                        <div class="col-lg-3">
                                            mknes-fes
                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            الاقليم
                                        </div>
                                        <div class="col-lg-3">
                                            meknes
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            اسم الزوج(ة) الكامل :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id=""
                                                value=" {{ $student->nom_prenom_conjoint }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            مهنته(ا) :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id=""
                                                value="{{ $student->profession_conjoint }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            رقم هاتف الأب :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" name="" id="" value="{{ $student->telephone_adherent }}">

                                        </div>
                                        <div class="col-lg-3 text-bold">
                                            رقم هاتف الأم:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $student->telephone_conjoint }}">

                                        </div>
                                    </div>
                                    <br>
                                    <div class="row   ">
                                        <div class="col-lg-3 text-bold  ">
                                            عنوان الأباء :
                                        </div>
                                        <div class="col-lg-9">
                                            <input class="w-100" class="adresseAA"
                                                value="{{ $student->adresse_parents }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane m-3" id="settings">
                                <div class="row">
                                    <div class="col-lg-3 text-bold"> رقم مسار :</div>
                                    <div class="col-lg-3"> <input class="w-100" name="" id=""
                                            value="  {{ $student->cne }}"></div>
                                    <div class="col-lg-3 text-bold">سنة الحصول على الباكالوريا :</div>
                                    <div class="col-lg-3"> <input class="w-100" name="" id=""
                                            value="  {{ $student->anne_bac }}">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">النقطة :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value="{{ $student->note }}" ></div>
                                    <div class="col-lg-3 text-bold">الميزة :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value=" {{ $student->mention }}"></div>
                                </div><br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">الجامعة :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value="{{ $student->universite }}" ></div>
                                    <div class="col-lg-3 text-bold">المؤسسة :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value=" {{ $student->ecole }}" ></div>
                                </div><br />
                                <div class="row">
                                    <div class="col-lg-3 text-bold">الفوج :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value="{{ $student->promotion }}" ></div>
                                    <div class="col-lg-3 text-bold">السنة الدراسية :</div>
                                    <div class="col-lg-3"><input class="w-100" name="" id=""
                                        value=" {{ $student->anne_universitaire }}" ></div>
                                </div><br />

                          
                                <br>
                                {{-- <div class="row">
                                    <div class="col-lg-3 text-bold">
                                        شهادة عمل الأم :
                                    </div>
                                    <div class="col-lg-3">

                                        @if ($student->photo)
                                            <a href="{{ asset('images/' . $student->photo) }}">
                                                <img src={{ asset('images/' . $student->photo) }}
                                                    style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                            </a>
                                        @else
                                            <img src={{ asset('asset/300x200.png') }}
                                                style=" height: 100px; width: 100px;">
                                        @endif
                                    </div>
                                    <br>
                                    <div class="col-lg-3 text-bold">
                                        شهادة الدخل السنوي الأم :
                                    </div>
                                    <div class="col-lg-3">
                                        @if ($student->photo)
                                            <a href="{{ asset('images/' . $student->photo) }}">
                                                <img src={{ asset('images/' . $student->photo) }}
                                                    style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                            </a>
                                        @else
                                            <img src={{ asset('asset/300x200.png') }}
                                                style=" height: 100px; width: 100px;">
                                        @endif
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
