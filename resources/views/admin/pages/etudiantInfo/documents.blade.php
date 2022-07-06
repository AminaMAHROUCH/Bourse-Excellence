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
                <li>
                    <i class="fas fa-info text-gray"></i> معلومات الطالب
                </li>
                <li><a href="{{ url('/listeDocs') }}">
                        الوثائق</a> </li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">الوثائق</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2  bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-3 col-3">
                                <form>
                                    <div class=" form-group">
                                        <input type="text" placeholder=" ابحث عن ..." class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> الوثائق </h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive">
                            <table class="table display data-table text-nowrap">
                                <thead>
                                    <tr class="text-center">
                                        <th>الاسم الكامل</th>
                                        <th>رقم مسار</th>
                                        <th>الاطلاع على الوثائق</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($list as $item) --}}
                                    <tr role="row" class="text-center">
                                        {{-- <td>{{ $item->full_name }}</td> --}}
                                        <td>dsdfsdf</td>
                                        <td>dfdfdfq</td>
                                        <td>
                                            <a href="{{ url('/boursier/etudiantDocument') }}">
                                                <i class="fas fa-eye text-info"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    {{-- @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
