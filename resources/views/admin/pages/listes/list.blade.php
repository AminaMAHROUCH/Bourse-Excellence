@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('newFolder/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
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
                <li><a href="{{ url('/boursier/liste') }}">اللوائح
                    </a></li>
            </ul>
        </div>
        <h4 class="mr-3">اللوائح</h4>
        <div class="col-lg-3 col-3 pt-2 text-bold">
            @if ($errors->any())
                <div class="text-danger">{{ $errors->first() }}</div>
            @endif
        </div>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> قائمة اللوائح الموجودة </h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active btn" id="nav-candidats-tab" data-bs-toggle="tab"
                                data-bs-target="#candidats" onclick="CLICK(this , 'butn')" type="button" role="tab"
                                aria-controls="nav-candidats" aria-selected="false"> المرشحين <span
                                    class="badge bg-secondary">{{ count($candidatures) }}</span>
                            </button>
                            <button class="nav-link btn" id="nav-listeRein-tab" data-bs-toggle="tab"
                                data-bs-target="#listeRein" type="button" role="tab" aria-controls="nav-listeRein"
                                aria-selected="false" onclick="CLICK(this , 'butn')"> اعادة التسجيل <span
                                    class="badge bg-secondary">{{ count($renouvellements) }}</span></button>
                            <button class="nav-link btn" id="nav-boursiers-tab" data-bs-toggle="tab"
                                data-bs-target="#boursiers" type="button" role="tab" aria-controls="nav-boursiers"
                                aria-selected="false" onclick="CLICK(this , 'butn')">الطلبة الممنوحين <span
                                    class="badge bg-secondary">{{ count($fullCandidatures) + count($intermidiares) }}</span></button>
                            <button class="nav-link btn" id="nav-archives-tab" data-bs-toggle="tab"
                                data-bs-target="#archives" type="button" role="tab" aria-controls="nav-archives"
                                aria-selected="false" onclick="CLICK(this , 'butn')">
                                الارشيـــــــــــــــــــــــــــــــف
                                <span
                                    class="badge bg-secondary">{{ count($etudiantRejeters) + count($candidats) }}</span></button>

                            <button class="nav-link btn" id="nav-exceptions-tab" data-bs-toggle="tab"
                                data-bs-target="#exceptions" type="button" role="tab" aria-controls="nav-exceptions"
                                aria-selected="false" onclick="CLICK(this , 'butn')">
                                exceptions <span class="badge bg-secondary"> {{ count($exception) }} </span></button>

                        </div>

                        <div class="tab-content mt-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="candidats" role="tabpanel"
                                aria-labelledby="nav-candidats-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#globale"
                                                    role="tab" aria-controls="globale" aria-selected="true">
                                                    عامة <span
                                                        class="badge bg-secondary">{{ count($candidatures) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#enAttente"
                                                    role="tab" aria-controls="enAttente" aria-selected="false">
                                                    في انتظار <span
                                                        class="badge bg-secondary">{{ count($attente) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#accepter"
                                                    role="tab" aria-controls="accepter" aria-selected="false">
                                                    مقبولة <span
                                                        class="badge bg-secondary">{{ count($accepter) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#confirmer"
                                                    role="tab" aria-controls="confirmer" aria-selected="false">
                                                    مصادق عليها <span
                                                        class="badge bg-secondary">{{ count($valider) }}</span></a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-3" id="myTabContent">
                                            <div class="tab-pane fade show active table-responsive" id="globale"
                                                role="tabpanel" aria-labelledby="home-tab">
                                                <table id="example10" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th> الاسم الكامل</th>
                                                            <th> ر.ب.و</th>
                                                            <th> البريد الالكتروني</th>
                                                            <th> النقطة</th>
                                                            <th> الهاتف 1</th>
                                                            <th colspan="2" class="text-center"> الاجراء</th>
                                                            <th> حالة الطلب</th>
                                                            <th> أرشيف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($candidatures as $candidature)
                                                            <tr role="row">
                                                                <td>{{ $candidature->nom_prenom }}
                                                                </td>
                                                                <td>{{ $candidature->cni }}</td>
                                                                <td>{{ $candidature->email }}</td>
                                                                <td>{{ $candidature->note }}</td>
                                                                <td>{{ $candidature->telephone_1 }}</td>
                                                               
                                                                <td>
                                                                    <a
                                                                        href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                                            class="fas fa-eye text-info"></i></a>
                                                                </td>
                                                                <td>
                                                                    <a data-toggle="modal"
                                                                        data-target="#modal-edit---{{ $candidature->id }}"><i
                                                                            class="far fa-envelope text-red"></i></a>
                                                                </td>
                                                                <td class="text-center" id="sourceDev">
                                                                    <input type="hidden"
                                                                        class="status-{{ $candidature->id }}"
                                                                        value="{{ $candidature->status }}" />
                                                                    @if ($candidature->valider == 1)
                                                                        <button type="button" class=" btn btn-sm text-white"
                                                                            style="background-color:#505050">مصادق
                                                                            عليه</button>
                                                                    @else
                                                                        @if ($candidature->status == 'accepter')
                                                                            <button type="button"
                                                                                class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                data-id="{{ $candidature->id }}"
                                                                                style="background-color:green">{{ $candidature->status }}</button>
                                @elseif($candidature->status == "en attente")
                                                                            <button type="button"
                                                                                class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                data-id="{{ $candidature->id }}"
                                                                                style="background-color:gold">{{ $candidature->status }}</button>
                                                                        @else
                                                                            <button type="button"
                                                                                class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if ($candidature->valider == '1')
                                                                        <button disabled type="button"
                                                                            class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                                            data-id="{{ $candidature->id }}">archiver
                                                                        </button>
                                                                    @else
                                                                        <button type="button"
                                                                            class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                                            data-id="{{ $candidature->id }}">archiver</button>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </form>
                                                    </tbody>
                                                </table>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <button class="btn btn-info " style="color: white">
                                                            <a href="{{ route('boursier.exportCsv') }}"
                                                                style="color: white">
                                                                <strong>Export Excel</strong>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade table-responsive" id="enAttente" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <table id="example11" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">

                                                            <th> الاسم الكامل</th>
                                                            <th> ر.ب.و</th>
                                                            <th> البريد الالكتروني</th>
                                                            <th> النقطة</th>
                                                            <th> الهاتف 1</th>
                                                            <th colspan="2" class="text-center"> الاجراء</th>
                                                            <th> حالة الطلب</th>
                                                            <th> أرشيف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($candidatures as $candidature)
                                                            @if ($candidature->status == 'en attente')
                                                                <tr role="row">

                                                                    <td>{{ $candidature->nom_prenom }}
                                                                    </td>
                                                                    <td>{{ $candidature->cni }}</td>
                                                                    <td>{{ $candidature->email }}</td>
                                                                    <td>{{ $candidature->note }}</td>
                                                                    <td>{{ $candidature->telephone_1 }}</td>
                                                                   
                                                                    <td>
                                                                        <a
                                                                            href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                                                class="fas fa-eye text-info"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a data-toggle="modal"
                                                                            data-target="#modal-edit---{{ $candidature->id }}"><i
                                                                                class="far fa-envelope text-red"></i></a>
                                                                    </td>
                                                                    <td class="text-center" id="sourceDev">
                                                                        <input type="hidden"
                                                                            class="status-{{ $candidature->id }}"
                                                                            value="{{ $candidature->status }}" />
                                                                        @if ($candidature->valider == 1)
                                                                            <button type="button"
                                                                                class=" btn btn-sm text-white"
                                                                                style="background-color:#505050">مصادق
                                                                                عليه</button>
                                                                        @else
                                                                            @if ($candidature->status == 'accepter')
                                                                                <button type="button"
                                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}"
                                                                                    style="background-color:green">{{ $candidature->status }}</button>
                                @elseif($candidature->status == "en attente")
                                                                                <button type="button"
                                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}"
                                                                                    style="background-color:gold">{{ $candidature->status }}</button>
                                                                            @else
                                                                                <button type="button"
                                                                                    class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                                            @endif
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                                            data-id="{{ $candidature->id }}">archiver</button>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade table-responsive" id="accepter" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <table id="example12" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th> مصادقة</th>
                                                            <th> الاسم الكامل</th>
                                                            <th> ر.ب.و</th>
                                                            <th> البريد الالكتروني</th>
                                                            <th> النقطة</th>
                                                            <th> الهاتف 1</th>
                                                            <th colspan="2" class="text-center"> الاجراء</th>
                                                            <th> حالة الطلب</th>
                                                            <th> أرشيف</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <form action="{{ route('boursier.valideCandidat') }}"
                                                            methode="POST" id="validForm">
                                                            @csrf
                                                            @foreach ($candidatures as $candidature)
                                                                @if ($candidature->status == 'accepter')
                                                       @if ($candidature->rib == '')
                                                        <tr role="row" style="background-color: #faf1e1">
                                                            <td>
                                                                <input type="checkbox" name="row[]"
                                                                    value="{{ $candidature->id }}" />
                                                            </td>
                                                            <td>{{ $candidature->nom_prenom }}
                                                            </td>
                                                            <td>{{ $candidature->cni }}</td>
                                                            <td>{{ $candidature->email }}</td>
                                                            <td>{{ $candidature->note }}</td>
                                                            <td>{{ $candidature->telephone_1 }}</td>
                                                           
                                                            <td>
                                                                <a
                                                                    href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                                        class="fas fa-eye text-info"></i></a>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal"
                                                                    data-target="#modal-edit---{{ $candidature->id }}"><i
                                                                        class="far fa-envelope text-red"></i></a>
                                                            </td>
                                                            <td class="text-center" id="sourceDev">
                                                                <input type="hidden"
                                                                    class="status-{{ $candidature->id }}"
                                                                    value="{{ $candidature->status }}" />
                                                                @if ($candidature->valider == 1)
                                                                <button type="button" class=" btn btn-sm text-white"
                                                                    style="background-color:#505050">مصادق
                                                                    عليه</button>
                                                                @else
                                                                @if ($candidature->status == 'accepter')
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}"
                                                                    style="background-color:green">{{ $candidature->status }}</button>
                                                                @elseif($candidature->status == "en
                                                                attente")
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}"
                                                                    style="background-color:gold">{{ $candidature->status }}</button>
                                                                @else
                                                                <button type="button"
                                                                    class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                                @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                                    data-id="{{ $candidature->id }}">archiver</button>
                                                            </td>
                                                        </tr>
                                                        @else
                                                        <tr role="row" style="background-color: white">
                                                            <td>
                                                                <input type="checkbox" name="row[]"
                                                                    value="{{ $candidature->id }}" />
                                                            </td>
                                                            <td>{{ $candidature->nom_prenom }}
                                                            </td>
                                                            <td>{{ $candidature->cni }}</td>
                                                            <td>{{ $candidature->email }}</td>
                                                            <td>{{ $candidature->note }}</td>
                                                            <td>{{ $candidature->telephone_1 }}</td>
                                                           
                                                            <td>
                                                                <a
                                                                    href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                                        class="fas fa-eye text-info"></i></a>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal"
                                                                    data-target="#modal-edit---{{ $candidature->id }}"><i
                                                                        class="far fa-envelope text-red"></i></a>
                                                            </td>
                                                            <td class="text-center" id="sourceDev">
                                                                <input type="hidden"
                                                                    class="status-{{ $candidature->id }}"
                                                                    value="{{ $candidature->status }}" />
                                                                @if ($candidature->valider == 1)
                                                                <button type="button" class=" btn btn-sm text-white"
                                                                    style="background-color:#505050">مصادق
                                                                    عليه</button>
                                                                @else
                                                                @if ($candidature->status == 'accepter')
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}"
                                                                    style="background-color:green">{{ $candidature->status }}</button>
                                                                @elseif($candidature->status == "en
                                                                attente")
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}"
                                                                    style="background-color:gold">{{ $candidature->status }}</button>
                                                                @else
                                                                <button type="button"
                                                                    class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                    data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                                @endif
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                                    data-id="{{ $candidature->id }}">archiver</button>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                                @endif
                                                            @endforeach
                                                        </form>
                                                    </tbody>
                                                </table>
                                                <div class="col-3">
                                                    <button class="btn btn-secondary" style="color: white">
                                                        <a href="#" style="color: white"
                                                            onclick="document.getElementById('validForm').submit()">
                                                            <strong>مصادقة</strong>
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade table-responsive" id="confirmer" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <table id="example13" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">

                                                            <th> الاسم الكامل</th>
                                                            <th> ر.ب.و</th>
                                                            <th> البريد الالكتروني</th>
                                                            <th> النقطة</th>
                                                            <th> الهاتف 1</th>
                                                            <th colspan="2" class="text-center"> الاجراء</th>
                                                            <th> حالة الطلب</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($valider as $candidature)
                                                            @if ($candidature->valider == 1)
                                                                <tr role="row">
                                                                    <td>{{ $candidature->nom_prenom }}</td>
                                                                    <td>{{ $candidature->cni }}</td>
                                                                    <td>{{ $candidature->email }}</td>
                                                                    <td>{{ $candidature->note }}</td>
                                                                    <td>{{ $candidature->telephone_1 }}</td>
                                                                  
                                                                    <td>
                                                                        <a
                                                                            href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                                                class="fas fa-eye text-info"></i></a>
                                                                    </td>
                                                                    <td>
                                                                        <a data-toggle="modal"
                                                                            data-target="#modal-edit---{{ $candidature->id }}"><i
                                                                                class="far fa-envelope text-red"></i></a>
                                                                    </td>
                                                                    <td class="text-center" id="sourceDev">
                                                                        <input type="hidden"
                                                                            class="status-{{ $candidature->id }}"
                                                                            value="{{ $candidature->status }}" />
                                                                        @if ($candidature->valider == 1)
                                                                            <button type="button"
                                                                                class=" btn btn-sm text-white"
                                                                                style="background-color:#505050">مصادق
                                                                                عليه</button>
                                                                        @else
                                                                            @if ($candidature->status == 'accepter')
                                                                                <button type="button"
                                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}"
                                                                                    style="background-color:green">{{ $candidature->status }}</button>
                                @elseif($candidature->status == "en attente")
                                                                                <button type="button"
                                                                                    class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}"
                                                                                    style="background-color:gold">{{ $candidature->status }}</button>
                                                                            @else
                                                                                <button type="button"
                                                                                    class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                                    data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                                            @endif
                                                                        @endif
                                                                    </td>

                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="listeRein" role="tabpanel" aria-labelledby="nav-listeRein-tab">
                                <div class="row">
                                    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        <div class="col-sm-12">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr role="row">
                                                        <th>الاسم الكامل</th>
                                                        <th>ر.ب.و</th>
                                                        <th> رقم مسار</th>
                                                        <th>النقطة</th>
                                                        <th>حالة الطلب</th>
                                                        <th>الاجراء</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($renouvellements as $renouvellement)
                                                        <tr role="row">
                                                            <td>{{ $renouvellement->nom_prenom }}</td>
                                                            <td>{{ $renouvellement->cni }}</td>
                                                            <td>{{ $renouvellement->cne }}</td>
                                                            <td>18</td>
                                                            <td>
                                                                @if ($renouvellement->status == 'accepter')
                                                                    <button class="btn btn-success">مصادق عليه</button>
                                                                @elseif($renouvellement->status == 'exception')
                                                                    <button
                                                                        class="btn btn-warning text-white">exception</button>
                                                                @elseif($renouvellement->status == 'archiver')
                                                                    <button
                                                                        class="btn btn-danger text-white">archiver</button>
                                                                @else
                                                                    <button class="btn btn-dark">NULL</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a
                                                                    href="{{ url('boursier/renouvellement/show/' . $renouvellement->id) }}"><i
                                                                        class="fas fa-eye text-info"></i></a>
                                                                <a class="btn " data-toggle="modal"
                                                                    data-target="#modal-{{ $renouvellement->id }}"><i
                                                                        class="far fa-envelope text-red"></i></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="boursiers" role="tabpanel" aria-labelledby="nav-boursiers-tab">
                                <div id="example1" class="table table-bordered table-striped">
                                    <div class="row mt-4">
                                        <div class="col-sm-12">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link active" id="home-tab" data-toggle="tab"
                                                                href="#boursie" role="tab" aria-controls="boursie"
                                                                aria-selected="true">
                                                                الممنوحين <span
                                                                    class="badge bg-secondary">{{ count($fullCandidatures) }}</span></a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                                href="#etatInter" role="tab" aria-controls="etatInter"
                                                                aria-selected="false">
                                                                بنك آخر
                                                                <span
                                                                    class="badge bg-secondary">{{ count($intermidiares) }}
                                                                </span></a>
                                                        </li>
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link" id="test-tab" data-toggle="tab"
                                                                href="#testInter" role="tab" aria-controls="testInter"
                                                                aria-selected="false">
                                                                البريد بنك
                                                                <span
                                                                    class="badge bg-secondary">{{ count($intermidiaresBB) }}
                                                                </span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-content mt-3" id="myTabContent">
                                                <div class="tab-pane fade show active table-responsive" id="boursie"
                                                    role="tabpanel" aria-labelledby="home-tab">
                                               <table id="example21" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>تعبئة السلة</th>
                                                                <th>الفوج</th>
                                                                <th>الاسم الكامل</th>
                                                                <th>ر.ب.و</th>
                                                                <th> رقم الحساب  </th>
                                                                <th>السنة الدراسية</th>
                                                                <th>حالة الصرف</th>
                                                                <th>سبب عدم الصرف</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <form action="{{ route('boursier.panier') }}" methode="POST"
                                                                id="addToPanier">
                                                                @csrf
                                                                @foreach ($fullCandidatures as $fullCandidature)
                                                                    <tr role="row">
                                                                        <td>
                                                                            <input type="checkbox" name="row[]"
                                                                                value="{{ $fullCandidature->id }}" />
                                                                        </td>
                                <td>الفوج:{{ $fullCandidature->promotion }}</td>
                                <td>{{ $fullCandidature->nom_prenom }}</td>
                                <td>{{ $fullCandidature->cni }}</td>
                                <td>{{ $fullCandidature->rib }}</td>
                                <td>{{ $fullCandidature->anne_universitaire }}
                                                                        </td>
                                                                        <td>{{ $fullCandidature->status }}</td>
                                                                        <td>{{ $fullCandidature->RaisonNonPaiment }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </form>
                                                        </tbody>
                                                    </table>
                                                    <div class="col-3">
                                                        <button class="btn btn-secondary" style="color: white">
                                                            <a href="#" style="color: white"
                                                                onclick="document.getElementById('addToPanier').submit()">
                                                                <strong>مصادقة</strong>
                                                            </a>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade " id="etatInter" role="tabpanel"
                                                    aria-labelledby="profile-tab">
                                                    <table id="example14" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>الاسم الكامل</th>
                                                                <th>ر.ب.و</th>
                                                                <th>رقم الحساب</th>
                                                                <th>السنة</th>
                                                                <th>montant</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($intermidiares as $intermidiare)
                                                                <tr>
                                                                    <td>{{ $intermidiare->nom_prenom }}</td>
                                                                    <td>{{ $intermidiare->cni }}</td>
                                                                    <td>{{ $intermidiare->rib }}</td>
                                                                    <td>{{ $intermidiare->anne_universitaire }}</td>
                                                                    <td>{{ $intermidiare->montant }}</td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('boursier.intemidiare.destroy', $intermidiare->id) }}"
                                                                            method="post">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn" type="submit"><i
                                                                                    class="fas fa-trash text-red"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <a class="btn bg-gray btn-sm"
                                                                        href="{{ url('/boursier/finance') }}">الذهاب
                                                                        الى قائمة
                                                                        الأداء</a>
                                                                    <button class="btn btn-success btn-sm">
                                                                        <a href="{{ url('boursier/sendToPanier/000') }}"
                                                                            class="text-white">
                                                                            ارسال الى السلة</a></button>
                                                                    <button type="button" class="btn btn-sm btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCenter">
                                                                       تغيير مبلغ المنحة
                                                                    </button>

                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade " id="testInter" role="tabpanel"
                                                    aria-labelledby="test-tab">
                                                    <table id="example30" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr role="row">
                                                                <th>الاسم الكامل</th>
                                                                <th>ر.ب.و</th>
                                                                <th>رقم الحساب</th>
                                                                <th>السنة</th>
                                                                <th>montant</th>
                                                                <th>action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($intermidiaresBB as $intermidiare)
                                                                <tr>
                                                                    <td>{{ $intermidiare->nom_prenom }}</td>
                                                                    <td>{{ $intermidiare->cni }}</td>
                                                                    <td>{{ $intermidiare->rib }}</td>
                                                                    <td>{{ $intermidiare->anne_universitaire }}</td>
                                                                    <td>{{ $intermidiare->montant }}</td>
                                                                    <td>
                                                                        <form
                                                                            action="{{ route('boursier.intemidiare.destroy', $intermidiare->id) }}"
                                                                            method="post">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('DELETE') }}
                                                                            <button class="btn" type="submit"><i
                                                                                    class="fas fa-trash text-red"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="5">
                                                                    <a class="btn bg-gray btn-sm"
                                                                        href="{{ url('/boursier/finance') }}">الذهاب
                                                                        الى قائمة
                                                                        الأداء</a>
                                                                    <button class="btn btn-success btn-sm">
                                                                        <a href="{{ url('boursier/sendToPanier/350') }}"
                                                                            class="text-white">
                                                                            ارسال الى السلة</a></button>
                                                                    <button type="button" class="btn btn-sm btn-primary"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCenter">
                                                                       تغيير مبلغ المنحة
                                                                    </button>

                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content" style="background: white;">
                                                <div class="modal-header">
                                                  <h5>المبلغ المخصص للمنحة</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('boursier.addMonatnt') }}" method="post">
                                                        @csrf
                                                        <input type="number" name="montant"
                                                            class="form-control text-center">
                                                        <div class="mt-2 text-center">
                                                            <a class="btn bg-danger btn-model"
                                                                data-dismiss="modal">إلغاء</a>
                                                            <button class="btn bg-success btn-model"
                                                                type="submit">إضافة</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr role="row">
                                                        <th>الفوج</th>
                                                        <th>الاسم الكامل</th>
                                                        <th>ر.ب.و</th>
                                                        <th> رقم مسار </th>
                                                        <th>السنة الدراسية</th>
                                                        <th>الهاتف 1</th>
                                                        <th>الاجراء</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($fullCandidatures as $fullCandidature)
                                                        <tr role="row">
                                                            <td>الفوج:{{ $fullCandidature->promotion }}</td>
                                                            <td>{{ $fullCandidature->nom_prenom }}
                                                            </td>
                                                            <td>{{ $fullCandidature->cni }}</td>
                                                            <td>{{ $fullCandidature->cne }}</td>
                                                            <td>{{ $fullCandidature->anne_universitaire }}</td>
                                                            <td>{{ $fullCandidature->telephone_1 }}</td>
                                                            <td> <a data-toggle="modal"
                                                                    data-target="#modal-show-{{ $renouvellement->id }}"
                                                                    data-id="{{ $renouvellement->id }}">
                                                                    تفاصيل
                                                                </a>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="archives" role="tabpanel" aria-labelledby="nav-archives-tab">
                                <div class="row mt-4">
                                    <div class="col-sm-12">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">أرشيف الطلبات
                                                    المرفوضة <span
                                                        class="badge bg-secondary">{{ count($candidats) }}</span></a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile" aria-selected="false"> أرشيف
                                                    المطرودين <span
                                                        class="badge bg-secondary">{{ count($etudiantRejeters) }}</span></a>
                                            </li>
                                            </li>
                                        </ul>
                                        <div class="tab-content mt-3" id="myTabContent">
                                            <div class="tab-pane fade show active table-responsive" id="home"
                                                role="tabpanel" aria-labelledby="home-tab">
                                                <table id="example3" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>الاسم الكامل</th>
                                                            <th>ر.ب.و</th>
                                                            <th>البريد الالكتروني</th>
                                                            <th>النقطة</th>
                                                            <th>الهاتف 1</th>
                                                            <th>الاجراء</th>
                                                            <th> اعادة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($candidats as $candidature)



                                                            <tr role="row">
                                                                <td>{{ $candidature->nom_prenom }}</td>
                                                                <td>{{ $candidature->cni }}</td>
                                                                <td>{{ $candidature->email }}</td>
                                                                <td>{{ $candidature->note }}</td>
                                                                <td>{{ $candidature->telephone_1 }}</td>
                                                                <td>ijjrae</td>
                                                                <td>
                                                                    <a class="btn btn-danger"
                                                                        href="{{ url('reset/' . $candidature->cni) }}">reset</a>
                                                                </td>
                                                            </tr>

                                                        @endforeach

                                                    </tbody>

                                                </table>

                                            </div>
                                            <div class="tab-pane fade table-responsive" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <table id="example14" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>الاسم الكامل</th>
                                                            <th>ر.ب.و</th>
                                                            <th>البريد الالكتروني</th>
                                                            <th>النقطة</th>
                                                            <th>الهاتف 1</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>

                                                        @foreach ($etudiantRejeters as $etudiantRejeter)
                                                            <tr role="row">
                                                                <td>{{ $etudiantRejeter->nom_prenom }}</td>
                                                                <td>{{ $etudiantRejeter->cni }}</td>
                                                                <td>{{ $etudiantRejeter->email }}</td>
                                                                <td>{{ $etudiantRejeter->telephone_1 }}</td>
                                                               
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade table-responsive" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">
                                                <table id="example5" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr role="row">
                                                            <th>الاسم الكامل</th>
                                                            <th>ر.ب.و</th>
                                                            <th>البريد الالكتروني</th>
                                                            <th>النقطة</th>
                                                            <th>الهاتف 1</th>
                                                            <th>الاجراء</th>
                                                            <th> اعادة</th>
                                                        </tr>


                                                    </thead>
                                                    <tbody>

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="exceptions" role="tabpanel" aria-labelledby="nav-exceptions-tab">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example6" class="table table-bordered table-striped">
                                            <thead>
                                                <tr role="row">
                                                    <th> الفوج</th>
                                                    <th> الاسم الكامل</th>
                                                    <th> ر.ب.و</th>
                                                    <th> رقم مسار</th>
                                                    <th>nbre_exceptions</th>
                                                    <th>السنة الدراسية</th>
                                                    <th colspan="2" class="text-center"> الاجراء</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($exception as $exc)
                                                    <tr role="row">
                                                        <td>الفوج:{{ $exc->promotion }}
                                                        <td>{{ $exc->nom_prenom }}</td>
                                                        <td>{{ $exc->cni }}</td>
                                                        <td>{{ $exc->cne }}</td>
                                                        <td>{{ $exc->nbre_exception }}</td>
                                                        <td>{{ $exc->annee_universitaire }}</td>
                                                        <td>
                                                            <button class="btn btn-primary"
                                                                style="padding: 0; border: none; background: none;"
                                                                type="button" data-toggle="modal"
                                                                data-target="#modal-show-{{ $candidature->id }}"
                                                                data-id="{{ $exc->id }}">
                                                                Reset
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @foreach ($candidatures as $candidature)
        <div class="modal fade" id="modal-edit---{{ $candidature->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-orange ">
                        <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                        </h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="new-added-form" action="{{ url('/boursier/sendMailTo') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12 form-group">
                                    <label> البريد الإلكتروني</label>
                                    <input type="text" placeholder="" name="email" class="form-control w-100"
                                        value="{{ $candidature->email }}" readonly>
                                </div>
                                <div class="col-lg-12 col-12 form-group">
                                    <label> الموضوع</label>
                                    <input type="text" placeholder="" name="type_s" class="form-control w-100"
                                        value="نقص معلومة او وثيقة" readonly>
                                </div>
                                <div class="col-lg-12 col-12 form-group">
                                    <label>المحتوى</label>
                                    <textarea class="textarea form-control" style="text-align: justify" name="contenu"
                                        id="form-message" cols="10" rows="10"></textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                    <button type="submit" class="btn bg-green">حفظ</button>
                                    <button type="reset" class="btn bg-red">مسح</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



    @foreach ($renouvellements as $renouvellement)
        <div class="modal fade" id="modal-{{ $renouvellement->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-orange ">
                        <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                        </h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="new-added-form" action="{{ url('boursier/sendMail') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" placeholder="" name="cni" class="form-control w-100"
                                    value="{{ $renouvellement->cni }}" readonly>
                                <div class="col-lg-12 col-12 form-group">
                                    <label> الموضوع</label>
                                    <input type="text" placeholder="" name="type_s" class="form-control w-100"
                                        value="نقص معلومة او وثيقة" readonly>
                                </div>
                                <div class="col-lg-12 col-12 form-group">
                                    <label>المحتوى</label>
                                    <textarea class="textarea form-control" style="text-align: justify" name="contenu"
                                        id="form-message" cols="10" rows="10"></textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                    <button type="submit" class="btn bg-green">حفظ</button>
                                    <button type="reset" class="btn bg-red">مسح</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($renouvellements as $renouvellement)
        <!-- begin show details -->
        <div class="modal fade" id="modal-show-{{ $renouvellement->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg">
                <div class=" modal-content">
                    <div class="modal-header" style="background-color: orange ">
                        <h4 class="modal-title" id="myModalLabel" style="font-weight: bold; font-size: 20px; ">
                            <i class="fas fa-info-circle"></i> تفاصيل
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="content">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach




    <script>
        $(function() {
            $('#example10').DataTable();
        });
    </script>
        <script>
        $(function() {
            $('#example30').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example11').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example12').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example13').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example13').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example1').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example2').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example3').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example14').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example5').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example6').DataTable();
        });
    </script>
    <script>
        $(function() {
            $('#example20').DataTable();
        });
    </script>
@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script>
    function CLICK(btn, cls) {
        var btns = document.getElementsByClassName(cls);
        if (cls == "btn") {
            for (var i = 0; i < btns.length; i++) {
                if (btns[i].id == btn.id) {
                    btns[i].setAttribute('class', "nav-link active btn");
                } else {
                    unClick(i, cls);
                }
            }
        } else {
            for (var i = 0; i < btns.length; i++) {
                if (btns[i].id == btn.id) {
                    btns[i].setAttribute('class', "nav-link active butn");
                } else {
                    unClick(i, cls);
                }
            }
        }
    }

    function unClick(pos, cls) {
        var btns = document.getElementsByClassName(cls);

        if (cls == "btn") {
            for (var i = 0; i < btns.length; i++) {
                if (btns[i] != btns[pos]) {
                    btns[pos].setAttribute('class', "nav-link  btn");
                }
            }
        } else {
            for (var i = 0; i < btns.length; i++) {
                if (btns[i] != btns[pos]) {
                    btns[pos].setAttribute('class', "nav-link  butn");
                }
            }
        }
    }
</script>
{{-- <script src="{{ asset('newFolder/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('newFolder/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
{{-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script> --}}

<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-update-status").on('click', function() {
            var candidat_id = $(this).data('id');
            var status = $('.status-' + candidat_id).val();
            $.ajax({
                type: "GET",
                url: "/boursier/updateStatus",
                dataType: "json",
                data: {
                    'candidat_id': candidat_id
                },
                success: function(response) {
                    if (status === "NULL") {
                        $('.mybtn-' + candidat_id).html('accepter');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'green';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://amefemaroc.com/boursier/liste');
                    } else if (status === "accepter") {
                        $('.mybtn-' + candidat_id).html('en attente');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'gold';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://amefemaroc.com/boursier/liste');
                    } else {
                        $('.mybtn-' + candidat_id).html('accepter');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'green';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://amefemaroc.com/boursier/liste');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-update-archiver").on('click', function() {
            var candidat_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/boursier/archiver",
                dataType: "json",
                data: {
                    'candidat_id': candidat_id
                },
                success: function(response) {
                    $("body").load(
                        'http://amefemaroc.com/boursier/liste');
                }
            });
        });
    });
</script>
