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

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li><a href="{{ url('/boursier/etudiant/liste') }}"> <i class="fas fa-info text-gray"></i> معلومات الطالب
                    </a> </li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> لائحة الطلبة</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2 bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            
                            <div class="col-lg-3 col-3">
                                <button class="btn btn-danger" style="color: white">
                                    <a href="#" style="color: white" data-toggle="modal" data-target="#modal-send">
                                        <strong>ارسال للكل</strong>
                                    </a>
                                </button>
                                <button class="btn btn-info" style="color: white">
                                    <a href="#" style="color: white" data-toggle="modal" data-target="#modal-send-user">
                                        <strong>ارسال للخاص</strong>
                                    </a>
                                </button>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الطلبة </h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive">
                            <table  class="table display data-table text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>تحديد </th>
                                        <th>الاسم الكامل</th>
                                        <th>ر.ب.و</th>
                                        <th>رقم مسار</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>رقم الهاتف</th>
                                        <th>الاجراء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form class="new-added-form" action="{{ route('boursier.etudiant.SendMail') }}"
                                        methode="POST" id="mailGlobal">
                                        @foreach ($list as $item)
                                            <tr role="row" class="text-center">
                                                <td>
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            value="{{ $item->id }}" name="mail[]">
                                                    </div>
                                                <td>{{ $item->nom_prenom }}</td>
                                                <td>{{ $item->cni }}</td>
                                                <td>{{ $item->cne }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->telephone_1 }}</td>
                                                <td>
                                                    <a class="btn" title="عرض"
                                                        href="{{ url('/boursier/etudiant/details/' . $item->id) }}">
                                                        <i class="fas fa-eye text-info"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <div class="modal fade" id="modal-send-user" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-orange ">
                                                        <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                                                        </h3>
                                                        <button type="button" class="close"
                                                            style="font-size: 40px !important" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="text-black">×</span></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12 col-12 form-group">
                                                                <label> الموضوع</label>
                                                                <input type="text" placeholder="الموضوع" name="subject1"
                                                                    class="form-control w-100">
                                                            </div>
                                                            <div class="col-lg-12 col-12 form-group">
                                                                <label>contenu d'email</label>
                                                                <textarea class="textarea form-control"
                                                                    style="text-align: justify" name="contenuMail"
                                                                    id="form-message" cols="10" rows="10"></textarea>
                                                            </div>
                                                            <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                                                <button type="reset" class="btn bg-red">مسح</button>
                                                                <button class="btn btn-secondary" style="color: white">
                                                                    <a href="#" style="color: white"
                                                                        onclick="document.getElementById('mailGlobal').submit()">
                                                                        <strong>مصادقة</strong>
                                                                    </a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                            <!-- Modal edit -->
                            <div class="modal fade" id="modal-send" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange ">
                                            <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                                            </h3>
                                            <button type="button" class="close" style="font-size: 40px !important"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="text-black">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="new-added-form" action="{{ url('boursier/etudiant/send') }}"
                                                methode="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12 col-12 form-group">
                                                        <label> الموضوع</label>
                                                        <input type="text" placeholder="الموضوع" name="subject"
                                                            class="form-control w-100">
                                                    </div>
                                                    <div class="col-lg-12 col-12 form-group">
                                                        <label>contenu d'email</label>
                                                        <textarea class="textarea form-control" style="text-align: justify"
                                                            name="contenu" id="form-message" cols="10" rows="10"></textarea>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                                        <button type="submit" class="btn bg-green">ارسال</button>
                                                        <button type="reset" class="btn bg-red">مسح</button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script>
        $(function() {
            $('#example20').DataTable();
        });
    </script>
@endsection
{{-- <script src="{{ asset('newFolder/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('newFolder/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
{{-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script> --}}

<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
{{-- @foreach ($list as $item) --}}
{{-- <div class="modal fade" id="modal-show-{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-lg">
                                    <div class=" modal-content">
                                        <div class="modal-header" style="background-color: orange ">
                                            <h4 class="modal-title" id="myModalLabel"
                                                style="font-weight: bold; font-size: 20px; ">
                                                <i class="fas fa-info-circle"></i> تفاصيل
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="content">
                                                <div class="col-xl-12 col-lg-6 col-12">
                                                    <div class="card dashboard-card-ten">
                                                        <div class="card-body">
                                                            <div class="student-info">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <h3 class="mb-5 mt-5  font text-center">معلومات
                                                                            شخصية</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12 text-center">
                                                                        @if ($item->photo)
                                                                            <img src={{ asset('images/' . $item->photo) }}
                                                                                style="border-radius: 50%; height: 70px; width: 70px;">
                                                                        @else
                                                                            <img src={{ asset('asset/300x200.png') }}
                                                                                style="border-radius: 50%; height: 70px; width: 70px;">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <br /><br />
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        الاسم الكامل:
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->full_name }}
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        ر.ب.و:
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->cni }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        مكان الازدياد :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->lieu_naissance }}
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        تاريخ الازدياد:
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->date_naissance }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        البريد الالكتروني:
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->email }}
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        الجنس :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->sex }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        الهاتف 1 :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->telephone_1 }}
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        الهاتف 2 :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->telephone_2 }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        الحالة العائلية :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->situation }}
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        الحالة الجسدية :
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        {{ $item->etat }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        العنوان
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        {{ $item->adresse }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <h3 class="mb-5 mt-5  font text-center">
                                                                        معلومات ابوية</h3>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    اسم القيم(ة) الديني(ة) الكامل :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->full_name_f }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    (ا)مهنته :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->profession_f }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    رقم الإنخراط :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->matricule }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    رقم البطاقة الوطنية :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->cniP }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    الجهة :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    mknes-fes
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    الاقليم
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    meknes
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    اسم الزوج(ة) الكامل :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->full_name_m }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    مهنته(ا) :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->profession_m }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    رقم هاتف الأب :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->tel_f }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    رقم هاتف الأم:
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->tel_m }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    عنوان الأباء :
                                                                </div>
                                                                <div class="col-lg-9">
                                                                    {{ $item->adresse_parents }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <h3 class="mb-5 mt-5  font text-center">معلومات
                                                                        دراسية</h3>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    رقم مسار :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->cne }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    المعدل السنوي للباكالوريا :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->note }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    الميزة :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->mention }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    السنة الدراسية الجارية :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->anne_universitaire }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    الجامعة :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->universite }}
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    التخصص :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->filiere }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    المؤسسة :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    {{ $item->school }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> --}}
{{-- </div> --}}
