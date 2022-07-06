@extends('layouts.master')
<style>
    .titre {
        background-color: #f7f7f7 !important;
    }

    h2 {
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
                <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
                <li><a href="{{ url('/boursier/reclamation') }}"><i class="nav-icon fas fa-copy text-gray"></i>
                        خدمات</a></li>
                <li> دورات تكوينية</li>
                <li><i class="fas fa-eye text-gray"></i> تفاصيل</li>

            </ul>
        </div>
        <h2 class="text-bold mr-3 "> دورات تكوينية</h2>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-hover  mr-5">
                                <tr>
                                    <th style="width: 20% !important">إسم الدورة</th>
                                    <td class="pr-5 "> <input class="w-100" value="{{ $formation->titre_formation }}"
                                            readonly> </td>
                                </tr>
                                <tr>
                                    <th style="width: 20% !important">رقم مسار</th>
                                    <td class="pr-5 "><input class="w-100" value="{{ $formation->cne }}" readonly></td>
                                </tr>
                                <tr>
                                    <th style="width: 20% !important">رقم البطاقة الوطنية</th>
                                    <td class="pr-5 "><input class="w-100" value="{{ $formation->cni }}" readonly></td>
                                </tr>
                                <tr>
                                    <th style="width: 20% !important">التفاصيل</th>
                                    <td class="pr-5 "> <textarea name="" rows="7" class="w-100" id=""
                                            readonly>{{ $formation->explication }}</textarea>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a class="btn bg-gray btn-sm" href="{{ url('/boursier/formations') }}">لائحة الدورات
                            التتكوينية</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
