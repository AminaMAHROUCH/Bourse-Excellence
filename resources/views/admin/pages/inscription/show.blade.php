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

    .first {
        border: solid 1px white;
        background: #9cc8e2 !important;
        margin-left: 10px !important;
    }

    .btn,
    .btn:hover {
        color: white !important;
    }

    input,
    textarea {
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
                <li><a href="{{ url('boursier/renouvellant') }}"> <i class="fas fa-exclamation-triangle text-gray"></i>
                        طلبات إعادة التسجيل</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>
        <h4 class="mr-3">لائحة الطلبة المرشحين للمنحة</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-header mt-2 bg-white">
                        <div class="row mr-2">
                            <div class="col-lg-8">
                                <ul class="nav nav-pills">
                                    <li class="nav-item mb-2"><a class="first btn " href="#">معلومات
                                            الطالب</a></li>
                                    @if ($renouvellements->status != 'accepter')
                                        <li class=" mb-2"><a class="btn btn-accepter" onclick="valider()" style="background:#07B444;" href="#"
                                                data-id="{{ $renouvellements->id }}">
                                                مصادقة</a></li>
                                    @else
                                        <div class=" mb-2"><button class="btn  btn-accepter"  style="background:#07B444;"
                                                disabled>مصادقة</button></div>
                                    @endif
                                    <li class="nav-item mb-2 ml-2"><a class=" btn btn-archiver" style="background:#E14024;" onclick="refuser()"
                                            href="#" data-id="{{ $renouvellements->id }}">
                                            رفض</a></li>
                                    @if ($exception)
                                        @if ($exception->nbre_exception != 1)
                                            <li class="nav-item mb-2 ml-2"><a class=" btn btn-exception" 
                                                    style="background:#DEB50E;" href="#"
                                                    data-id="{{ $renouvellements->id }}">
                                                    إستثناء</a></li>
                                        @endif
                                    @else
                                        <li class="nav-item mb-2 ml-2"><a class=" btn btn-exception" onclick="except()"
                                                style="background:#DEB50E;" href="#" data-id="{{ $renouvellements->id }}">
                                                إستثناء</a></li>
                                    @endif
                                </ul>
                            </div>
                            @if ($renouvellements->status == 'accepter')
                                <div class="col-lg-4">
                                    <h5 class="text-red">لقد تم اعادة التسجيل بنجاح</h5>
                                </div>
                            @endif
                            @if ($renouvellements->status == 'archiver')
                                <div class="col-lg-4">
                                    <h5 class="text-red">مؤرشف</h5>
                                </div>
                            @endif
                            @if ($renouvellements->status == 'exception')
                                @if ($exception && $exception->nbre_exception == 1)
                                    <div class="col-lg-4">
                                        <h5 class="text-red">تم توقيه مؤقتا</h5>
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <div class="container mt-4 mb-4">
                                    <div class="row  ">
                                        <div class="col-lg-3 text-bold">
                                            الاسم الكامل:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $renouvellements->nom_prenom }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            ر.ب.و:
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $renouvellements->cni }}" readonly>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            رقم مسار :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $renouvellements->cne }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            رقم الحساب البنكي :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $renouvellements->numero_compte }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row  ">
                                        <div class="col-lg-3  text-bold">
                                            الجامعة :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value="{{ $renouvellements->universite }}" readonly>
                                        </div>
                                        <div class="col-lg-3  text-bold">
                                            المدرسة :
                                        </div>
                                        <div class="col-lg-3">
                                            <input class="w-100" value=" {{ $renouvellements->ecole }}" readonly>

                                        </div>
                                    </div>
                                    <br />
                                    <div class="row">
                                        <div class="col-lg-3 text-bold">
                                            شهادة :
                                        </div>
                                        <div class="col-lg-3">

                                            @if ($renouvellements->attestation)
                                                <a href="{{ asset('images/' . $renouvellements->attestation) }}">
                                                    <img src={{ asset('images/' . $renouvellements->attestation) }}
                                                        style=" height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style=" height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                        <br>
                                        <div class="col-lg-3 text-bold">
                                            شهادة إعادة التسجيل :
                                        </div>
                                        <div class="col-lg-3">
                                            @if ($renouvellements->attestation_reinscription)
                                                <a
                                                    href="{{ asset('images/' . $renouvellements->attestation_reinscription) }}">
                                                    <img src={{ asset('images/' . $renouvellements->attestation_reinscription) }}
                                                        style=" height: 200px; width: 100%;" class="img-fluid  img-rounded">
                                                </a>
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style=" height: 200px; width: 100%;">
                                            @endif
                                        </div>
                                    </div>
                                    <br />
                                    <div class="row ">
                                        <div class="col-lg-3 text-bold">
                                            تعليل :
                                        </div>
                                        <div class="col-lg-9">
                                            @if ($renouvellements->justification == null)
                                                <textarea class="w-100" class="adresseAA" name="" id="" cols="30" rows="8"
                                                    readonly> لا يوجد شيء</textarea>
                                                <!-- <textarea class="w-100" name="" id="" cols="30" rows="10"لا يوجد شيء">ا يوجد شيء"</textarea> -->
                                                <!-- <input class="w-100" class="adresseAA" value="لا يوجد شيء"> -->
                                            @else
                                                <textarea class="w-100" class="adresseAA" name="" id="" cols="30" rows="8"
                                                    readonly>{{ $renouvellements->justification }}</textarea>
                                                <!-- <textarea class="w-100" class="adresseAA" class="w-100" name="" id="" cols="30" rows="6" value="{{ $renouvellements->justification }}"></textarea> -->
                                                <!-- <input class="w-100" class="adresseAA" value="{{ $renouvellements->justification }}"> -->
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

<script type="text/javascript">
    /////////////////////////////
    var cptv=0 ;
    function valider(){ 
        cptv+= 1 ;
        if(cptv == 1 )  {

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 
                    var renouvllement_id = $(".btn-accepter").data('id'); 
                    $.ajax({
                        type: "GET",
                        url: "/boursier/renouvellement/accepter",
                        data: {
                            'renouvllement_id': renouvllement_id
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href =
                                "http://amefemaroc.com/boursier/renouvellement/show/" +
                                renouvllement_id;
                        }
                    }); 
            });
            
        }
    }  
  
    var cptr=0 ;
    function refuser(){ 
        cptr+= 1 ;
        if(cptr == 1 )  {

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 
                    var renouvllement_id = $(".btn-archiver").data('id'); 
                    $.ajax({
                        type: "GET",
                        url: "/boursier/renouvellement/archiver",
                        data: {
                            'renouvllement_id': renouvllement_id
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href =
                                "http://amefemaroc.com/boursier/renouvellement/show/" +
                                renouvllement_id;
                        }
                    }); 
            });
            
        }
    }

    var cpte=0 ;
    function except(){ 
        cpte+= 1 ;
        if(cpte == 1 )  {

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }); 
                    var renouvllement_id = $(".btn-exception").data('id'); 
                    $.ajax({
                        type: "GET",
                        url: "/boursier/renouvellement/exception",
                        data: {
                            'renouvllement_id': renouvllement_id
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href =
                                "http://amefemaroc.com/boursier/renouvellement/show/" +
                                renouvllement_id;
                        }
                    }); 
            });
            
        }
    }
</script>
