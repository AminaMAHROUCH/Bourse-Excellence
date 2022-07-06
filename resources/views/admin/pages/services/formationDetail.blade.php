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

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
                <li><a href="{{ url('/boursier/reclamation') }}"><i class="nav-icon fas fa-copy text-gray"></i>
                خدمات</a></li>
                        <li> دورات التكوين</li>
                <li><i class="fas fa-eye text-gray"></i> تفاصيل</li>
                
            </ul>
        </div>
        <h2 class="text-bold mr-3 "> دورات التكوين</h2>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <table class="table-hover  mr-5">
                                <tr>
                                    <th class="">الموضوع</th>
                                    <td class="pr-5">asdasd</td>
                                </tr>
                                 <tr  >
                                    <th>رقم مسار</th>
                                    <td   class="pr-5 ">asddasd</td>
                                </tr> <tr  >
                                    <th>رقم البطاقة الوطنية</th>
                                    <td   class="pr-5 ">asddasd</td>
                                </tr>
                                 <tr>
                                    <th>إسم الدورة</th>
                                    <td   class="pr-5 ">asddasd</td>
                                </tr>
                                <tr  >
                                    <th>التفاصيل</th>
                                    <td   class="pr-5 ">asddasd</td>
                                </tr>
                               
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                      
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
