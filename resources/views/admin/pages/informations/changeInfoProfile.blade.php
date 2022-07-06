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

    .unchangedField {
        background-color: rgb(232, 232, 232) !important;
        border-color: rgb(232, 232, 232) !important;
        border-style: rgb(116, 116, 116) !important;
        outline: none !important;
        border: gray ! color: rgb(116, 116, 116) !important;
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
                    <form class="new-added-form" action="{{ url('/boursier/etudiantChange/' . $info->cni) }}"
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <h6 class="text-black mb-1 mr-2"> تغيير معلومات الشخصية </h6>
                            <hr class="titre ml-2 mr-2 mt-0">
                            <div class="row" style="margin-left: 30px !important ; margin-right : 30px !important">
                                <div class="col-lg-4 w-100 text-center mb- mt-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if ($info->photo)
                                                <img src="{{ asset('images/' . $info->photo) }}" class="w-75" id="imagee">
                                            @else
                                                <img src="{{ asset('asset/300x200.png') }}" alt="student" class="w-75">
                                            @endif
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <input type="file" name="imageee" onchange="loadFile(event,'imagee')">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-7 mt-5 ">
                                    <div class="row w-50  mb-3 ">
                                        <div class="col-lg-8 text-bold">الاسم الكامل :</div>
                                        <div class="col-lg-4"><input value="{{ $info->nom_prenom }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row w-50  mb-3 ">
                                        <div class="col-lg-8 text-bold"> رقم مسار :</div>
                                        <div class="col-lg-4"><input value="{{ $info->cne }}" class="unchangedField"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">رقم البطاقة الوطنية :</div>
                                        <div class="col-lg-4"><input value="{{ $info->cni }}" 
                                                readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">مكان الازدياد :</div>
                                        <div class="col-lg-4"><input value="{{ $info->lieu_naissance }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">تاريخ الازدياد :</div>
                                        <div class="col-lg-4"><input value="{{ $info->date_naissance }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">الحالة العائلية :</div>
                                        <div class="col-lg-4"><input value="{{ $info->situation_familiale }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">الجنس :</div>
                                        <div class="col-lg-4"><input value="{{ $info->sexe }}" class="unchangedField"
                                                readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">العنوان :</div>
                                        <div class="col-lg-4"><input value="{{ $info->adresse }}" class="unchangedField"
                                                readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">رقم الهاتف 1 :</div>
                                        <div class="col-lg-4"><input value="{{ $info->telephone_1 }}" name="tel_1"></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">رقم الهاتف 2 :</div>
                                        <div class="col-lg-4"><input value="{{ $info->telephone_2 }}" name="tel_2"></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">البريد الالكتروني:</div>
                                        <div class="col-lg-4"><input value="{{ $info->email }}" name="email"></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">اسم الأب الكامل :</div>
                                        <div class="col-lg-4"><input value="{{ $info->nom_prenom_adherent }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">هاتفه :</div>
                                        <div class="col-lg-4"><input value="{{ $info->telephone_pere }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">اسم الأم الكامل :</div>
                                        <div class="col-lg-4"><input value="{{ $info->nom_prenom_conjoint }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold">هاتفها :</div>
                                        <div class="col-lg-4"><input value="{{ $info->telephone_mere }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold"> عنوان الاباء :</div>
                                        <div class="col-lg-4"><input value="{{ $info->adresse_parents }}"
                                                class="unchangedField" readonly></div>
                                    </div>
                                    {{-- <div class="row  w-50 mb-3">
                                        <div class="col-lg-8 text-bold"> رقم الحساب :</div>
                                        <div class="col-lg-4"><input value="" maxlength="24"></div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mt-2  bg-white">
                            <button type="submit" class="btn bg-green mb-1">حفظ</button>
                            <a href="{{ url('/boursier/etudiant/profile') }}" class="btn bg-gray mb-1">السابق</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event, id) {
        image = document.getElementById(id);
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
