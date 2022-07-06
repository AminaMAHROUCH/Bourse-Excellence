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
    }

    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    table {
        border-style: none !important;
    }

    .text {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 150px;
    }

    .length {
        width: 300px !important;
    }

    input,
    select {
        background-color: rgb(232, 232, 232) !important;
        border-color: rgb(232, 232, 232) !important;
        border-style: rgb(116, 116, 116) !important;
        outline: none !important;
        color: rgb(116, 116, 116) !important;
    }

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li><a href="{{ url('/boursier/etudiant/profile') }}"> <i class="fas fa-user text-gray"></i> معلومات
                        شخصية</a> </li>
            </ul>
        </div>
        <h4 class="mr-3">معلومات شخصية</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2  bg-white">
                        <div class="row mr-2">
                            <div class="col-lg-8">
                                <a href="{{ url('/boursier/etudiant/profile/modification') }}"
                                    class="btn bg-green mb-1">تغيير
                                    المعلومات</a>
                            </div>
                            <div class="col-lg-4" style="text-align: left !important">
                                <button class="btn text-white btn-sm" style="background-color: black !important"
                                    disabled>{{ $info->promotion }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2">معلومات شخصية</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="row " style="margin-left: 30px !important ; margin-right : 30px !important">
                            <div class="col-lg-4 w-100 text-center mt-5">
                                @if ($info->photo)
                                    <a href="{{ asset('images/' . $info->photo) }}"> <img
                                            src="{{ asset('images/' . $info->photo) }}" alt="student" class="w-75"></a>
                                @else
                                    <img src="{{ asset('asset/300x200.png') }}" alt="student" class="w-75">
                                @endif
                            </div>

                            <div class="col-lg-7 mt-5 ">
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل :</div>
                                    <div> <input class="col-lg-8" value="{{ $info->nom_prenom }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل بالعربية:</div>
                                    <div><input class="col-lg-8" value="{{ $info->nom_prenomArab }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> رقم مسار :</div>
                                    <div><input class="col-lg-8" value="{{ $info->cne }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">رقم البطاقة الوطنية :</div>
                                    <div><input class="col-lg-8" value="{{ $info->cni }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الحالة الجسدية :</div>
                                    <div><input class="col-lg-8" value="{{ $info->etat_physique }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> الجنس :</div>
                                    <div><input class="col-lg-8" value="{{ $info->sexe }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">مكان الازدياد :</div>
                                    <div><input class="col-lg-8" value="{{ $info->lieu_naissance }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">تاريخ الازدياد :</div>
                                    <div><input class="col-lg-8" value="{{ $info->date_naissance }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">العنوان :</div>
                                    <div><input class="col-lg-8" value="{{ $info->adresse }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">رقم الهاتف 1 :</div>
                                    <div><input class="col-lg-8" value="{{ $info->telephone_1 }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">رقم الهاتف 2 :</div>
                                    <div><input class="col-lg-8" value="{{ $info->telephone_2 }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">البريد الالكتروني:</div>
                                    <div><input class="col-lg-8" value="{{ $info->email }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> مسلك البكالوريا : </div>
                                    <div><input class="col-lg-8" value="{{ $info->filiereBac }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> ميزة البكالوريا : </div>
                                    <div><input class="col-lg-8" value="{{ $info->mention }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> سنة الحصول على البكالوريا </div>
                                    <div><input class="col-lg-8" value="{{ $info->anne_bac }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> معدل البكالوريا : </div>
                                    <div><input class="col-lg-8" value="{{ $info->note }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> الثانوية:</div>
                                    <div><input class="col-lg-8" value="{{ $info->lycee }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> المؤسسة:</div>
                                    <div><input class="col-lg-8" value="{{ $info->ecole }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> الجامعة:</div>
                                    <div><input class="col-lg-8" value="{{ $info->universite }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> الشعبة الجامعية :</div>
                                    <div><input class="col-lg-8" value="{{ $info->filiere }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> السنة الجامعية:</div>
                                    <div><input class="col-lg-8" value="{{ $info->anneUniversitaire }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> مدة الدراسة الجامعية:</div>
                                    <div><input class="col-lg-8" value="{{ $info->duree_etude }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل للمنخرط :</div>
                                    <div><input class="col-lg-8" value="{{ $info->nom_prenom_adherent }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل للمنخرط بالعربية :</div>
                                    <div><input class="col-lg-8" value="{{ $info->nom_prenom_adherentAr }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">رقم الانخراط :</div>
                                    <div><input class="col-lg-8" value="{{ $info->matricule }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">رقم البطاقة الوطنية للمنخرط :</div>
                                    <div><input class="col-lg-8" value="{{ $info->cni_adherent }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">مهنة المنخرط:</div>
                                    <div><input class="col-lg-8" value="{{ $info->profession_adherent }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">هاتف المنخرط:</div>
                                    <div><input class="col-lg-8" value="{{ $info->telephone_adherent }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل للزوج(ة) :</div>
                                    <div><input class="col-lg-8" value="{{ $info->nom_prenom_conjoint }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">الاسم الكامل للزوج(ة) بالعربية :</div>
                                    <div><input class="col-lg-8" value="{{ $info->nom_prenom_conjointAr }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">هاتف الزوج(ة):</div>
                                    <div><input class="col-lg-8" value="{{ $info->telephone_conjoint }}" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold">عدد الاخوة :</div>
                                    <div><input class="col-lg-8" value="{{ $info->nbr_freres }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> احد او ابوين متوفيين :</div>
                                    <div><input class="col-lg-8" value="{{ $info->parents_deces }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> عنوان الاباء :</div>
                                    <div><input class="col-lg-8" value="{{ $info->adresse_parents }}" readonly></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-4 text-bold"> تاريخ التسجيل :</div>
                                    <div><input class="col-lg-8" value="{{ $info->dateInscription }}" readonly></div>
                                </div>
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-orange">
                        <h2 class="modal-title" id="exampleModalLabel">تعديل معلوماتي الشخصية</h2>
                        <button type="button" class="btn-close " style="margin-left: 1em;" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('etudiant/' . $info->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 col-12 form-group">
                                    <label> الاسم الكامل </label>
                                    <input id="tel1" type="tel" class="form-control" name="full_name"
                                        value="{{ $info->full_name }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> مكان الازدياد </label>
                                    <input type="text" class="form-control" name="lieu_naissance"
                                        value="{{ $info->lieu_naissance }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> تاريخ الازدياد </label>
                                    <input type="date" class="form-control" name="date_naissance"
                                        value="{{ $info->date_naissance }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="situation"> الحالة العائلية :</label>
                                    <select class="select2" id="situation" name="situation">
                                        <option {{ $info->situation == '(ة) عازب' ? 'selected' : '' }}>(ة) عازب
                                        </option>
                                        <option {{ $info->situation == '(ة) متزوج' ? 'selected' : '' }}>(ة) متزوج</option>
                                        <option {{ $info->situation == 'مطلق (ة)' ? 'selected' : '' }}>مطلق (ة)</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> العنوان </label>
                                    <input type="text" class="form-control" name="adresse" value="{{ $info->adresse }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> رقم الهاتف 1 </label>
                                    <input type="text" class="form-control" name="tel_1"
                                        value="{{ $info->telephone_1 }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> رقم الهاتف 2 </label>
                                    <input type="text" class="form-control" name="tel_2"
                                        value="{{ $info->telephone_2 }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> البريد الالكتروني </label>
                                    <input type="email" class="form-control" name="email" value="{{ $info->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> اسم الأب الكامل </label>
                                    <input type="text" class="form-control" name="full_name_f"
                                        value="{{ $info->full_name_f }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> هاتفه </label>
                                    <input type="tel" class="form-control" name="tel_f" value="{{ $info->tel_f }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> اسم الام الكامل </label>
                                    <input type="text" class="form-control" name="full_name_m"
                                        value="{{ $info->full_name_m }}">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label> هاتفها </label>
                                    <input type="tel" class="form-control" name="tel_m" value="{{ $info->tel_m }}">
                                </div>
                                <div class="col-xl-12 col-lg-6 col-12 form-group">
                                    <label> عنوان الاباء </label>
                                    <textarea class="textarea form-control" name="adresse_parents" id="form-message"
                                        cols="10" rows="7">{{ $info->adresse_parents }}</textarea>
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
        </div> --}}




@endsection
