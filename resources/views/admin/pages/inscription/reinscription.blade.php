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
                <li> التسجيل </li>
                <li>إعادة التسجيل</li>
            </ul>
        </div>
        <h4 class="mr-3"> إعادة التسجيل</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="row">
                        <div class="col-lg-8">
                            <h6 class="text-black mb-1 mr-2 mt-3 pr-3">استمارة إعادة التسجيل</h6>
                        </div>
                        @if ($inscription->action == 'معطل')
                            <div class="col-lg-4">
                                <h4 class=" text-bold mb-1 mr-2 mt-2 pr-3" style="color : red !important">le delai a été
                                    dépassé
                                </h4>
                            </div>
                        @endif
                    </div>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="mx-4">
                        @if ($errors->get('cne'))
                            @foreach ($errors->get('cne') as $message)
                                <li class="text-danger" class="fw-bold">{{ $message }}</li>
                            @endforeach
                        @endif
                        @if ($errors->get('cni'))
                            @foreach ($errors->get('cni') as $message)
                                <li class="text-danger" class="fw-bold">{{ $message }}</li>
                            @endforeach
                        @endif
                        <form class="new-added-form" action="{{ url('boursier/reinscription') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="univer"> الجامعة :</label>
                                        <input id="univer" type="text" class="form-control" name="universite">
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="ecole"> المؤسسة :</label>
                                        <input id="ecole" type="text" class="form-control" name="school">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="attestation">شهادة النجاح أو بيان النقط :</label>
                                        <input id="attestation" type="file" class="form-control" name="attestation"
                                            onchange="loadFile(event, 'img1')">
                                        <div class="list-img text-center">
                                            <img class="mt-4" id="img1" src={{ asset('asset/300x200.png') }}
                                                style="width: 300px; height:200px; border-radius:15px" class="text-center">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="attestationreinscription">شهادة اعادة التسجيل في السنة الجارية :</label>
                                        <input id="attestationreinscription" type="file" class="form-control"
                                            name="attestationreinscription" onchange="loadFile(event, 'img2')">
                                        <div class="list-img text-center">
                                            <img class="mt-4" id="img2" src={{ asset('asset/300x200.png') }}
                                                style="width: 300px; height:200px; border-radius:15px " class="text-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-12 form-group">
                                        <label for="numero_compte"> رقم الحساب البنكي :</label>
                                        <input id="numero_compte" type="number" class="form-control" name="numero_compte">
                                        @if ($errors->get('numero_compte'))
                                            @foreach ($errors->get('numero_compte') as $message)
                                                <li class="text-danger" class="fw-bold">{{ $message }}</li>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-12 form-group">
                                        <label for="justification">تعليل :</label>
                                        <textarea name="justification" id="justification" class="form-control" cols="30"
                                            rows="8"></textarea>
                                    </div>
                                </div>
                                @if ($inscription->action == 'مفعل')
                                    <div class="card-footer bg-white pb-0">
                                        <button class="btn btn-success" type="submit">تسجيل</button>
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
