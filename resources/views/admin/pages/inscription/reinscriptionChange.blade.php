{{-- @if (session()->has('jsAlert'))
<script>
alert('لقد تسجيل طلبكم بنجاح، المرجو التحقق من بريدكم الإلكتروني');
</script> 
@endif --}}
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

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li> <i class="fas fa-pencil-alt"></i>
                    التسجيل </li>
                <li>المعلومات</li>
            </ul>
        </div>
        <h4 class="mr-3"> تعديل معلوماتي</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="text-black mb-1 mr-2 mt-3 pr-3">استمارة تعديل معلوماتي</h6>
                        </div>
                        <div class="col-lg-4">
                            @if ($inscription->action == 'معطل')
                                <h4 class=" text-bold mb-1 mr-2 mt-2 pr-3" style="color : red !important">le delai a été
                                    dépassé
                                </h4>
                            @endif
                        </div>
                    </div>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="mx-4">
                        <form class="new-added-form" action="{{ url('boursier/reinscription/modification') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="full_name"> الاسم الكامل :</label>
                                    <input id="full_name" type="text" class="form-control" maxlength="200" size="200"
                                        name="full_name" value="{{ $list->nom_prenom }}" readonly>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="cni"> ر.ب.و :</label>
                                    <input id="cni" type="text" class="form-control" name="cni" value="{{ $list->cni }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="cne"> رقم مسار :</label>
                                    <input id="cne" type="text" class="form-control" maxlength="200" size="200" name="cne"
                                        value="{{ $list->cne }}" readonly>

                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="numero_compte"> رقم الحساب البنكي :</label>
                                    <input id="numero_compte" type="number" class="form-control" name="numero_compte"
                                        value="{{ $list->numero_compte }}">
                                    @if ($errors->get('numero_compte'))
                                        @foreach ($errors->get('numero_compte') as $message)
                                            <li class="text-danger" class="fw-bold">{{ $message }}</li>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="univer"> الجامعة :</label>
                                    <input id="univer" type="text" class="form-control" maxlength="200" size="200"
                                        name="universite" value="{{ $list->universite }}">

                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="ecole"> المؤسسة :</label>
                                    <input id="ecole" type="text" class="form-control" name="school"
                                        value="{{ $list->ecole }}">
                                </div>
                                 <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="attestation_rib">   تحميل شهادة RIB   :</label>
                                    <input id="attestation_rib" type="file" class="form-control"
                                        name="attestation_rib" onchange="loadFile(event, 'img2')">
                                    <div class="list-img text-center">
                                        @if ($list->attestation_rib)
                                            <a href="{{ asset('bourse_excellence/public/images/' . $list->attestation_rib) }}">
                                                <img class="mt-4" id="img2"
                                                    src={{ asset('bourse_excellence/public//images/' . $list->attestation_rib) }}
                                                    style=" height: 200px; width: 300px; border-radius:15px"
                                                    class="img-fluid" name="attestation_rib" class="text-center">
                                            </a>
                                        @else
                                            <img class="mt-4" id="img2" src={{ asset('asset/300x200.png') }}
                                                style=" height: 200px; width: 300px; border-radius:15px" class="img-fluid"
                                                name="attestation_rib" class="text-center">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="attestation">شهادة النجاح أو بيان النقط :</label>
                                    <input id="attestation" type="file" class="form-control" name="attestation"
                                        onchange="loadFile(event, 'img1')">
                                    <div class="list-img text-center">
                                        @if ($list->attestation)
                                            <a href="{{ asset('bourse_excellence/public/images/' . $list->attestation) }}">
                                                <img class="mt-4" id="img1"
                                                    src={{ asset('bourse_excellence/public/images/' . $list->attestation) }}
                                                    style=" height: 200px; width: 300px; border-radius:15px"
                                                    class="img-fluid" name="attestation" class="text-center">
                                            </a>
                                        @else
                                            <img class="mt-4" id="img1" src={{ asset('asset/300x200.png') }}
                                                style=" height: 200px; width: 300px; border-radius:15px" class="img-fluid"
                                                name="attestation" class="text-center">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-12 form-group">
                                    <label for="attestation_reinscription">شهادة اعادة التسجيل في السنة الجارية :</label>
                                    <input id="attestation_reinscription" type="file" class="form-control"
                                        name="attestation_reinscription" onchange="loadFile(event, 'img2')">
                                    <div class="list-img text-center">
                                        @if ($list->attestation_reinscription)
                                            <a href="{{ asset('bourse_excellence/public//images/' . $list->attestation_reinscription) }}">
                                                <img class="mt-4" id="img2"
                                                    src={{ asset('bourse_excellence/public//images/' . $list->attestation_reinscription) }}
                                                    style=" height: 200px; width: 300px; border-radius:15px"
                                                    class="img-fluid" name="attestation_reinscription" class="text-center">
                                            </a>
                                        @else
                                            <img class="mt-4" id="img2" src={{ asset('asset/300x200.png') }}
                                                style=" height: 200px; width: 300px; border-radius:15px" class="img-fluid"
                                                name="attestation_reinscription" class="text-center">
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row ">
                                <label class="col-lg-3 text-bold">
                                    تعليل :
                                </label>
                                <div class="col-lg-12">
                                    @if ($list->justification == null)
                                        <textarea class="w-100" class="adresseAA" name="justification" id="justification"
                                            cols="30" rows="8"> لا يوجد شيء</textarea>
                                    @else
                                        <textarea class="w-100" class="adresseAA" name="justification" id="justification"
                                            cols="30" rows="8">{{ $list->justification }}</textarea>
                                    @endif
                                </div>
                            </div>
                            @if ($inscription->action == 'مفعل')
                                <div class="row mt-5 mb-5">
                                    <div class="col-lg-12 text-center">
                                        <button class="btn btn-secondary" type="submit">تعديل</button>
                                    </div>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var loadFile = function(event, id) {
            var image = document.getElementById(id);
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>

@endsection
