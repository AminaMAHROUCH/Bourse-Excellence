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
        color: rgb(116, 116, 116) !important;
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
                <li> <i class="fas fa-eye text-gray"></i> مشاهدة الوثاق </li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">الوثائق</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-body pr-5">
                        <h6 class="text-black mb-1 mr-2"> لائحة الوثائق </h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="row mt-5">
                            <div class="col-lg-3 text-bold">
                                شهادة الباكالوريا :
                            </div>
                            <div class="col-lg-3">
                                {{-- @if ($candidature->AttestationBac)
                                    <a href="{{ asset('images/' . $candidature->AttestationBac) }}">
                                        <img src={{ asset('images/' . $candidature->AttestationBac) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                            <div class="col-lg-3 text-bold">
                                بيان النقط :
                            </div>
                            <div class="col-lg-3">

                                {{-- @if ($candidature->RelvesNote)
                                    <a href="{{ asset('images/' . $candidature->RelvesNote) }}">
                                        <img src={{ asset('images/' . $candidature->RelvesNote) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-3 text-bold">
                                شهادة عمل الأب :
                            </div>
                            <div class="col-lg-3">
                                {{-- @if ($candidature->attestProfessionm)
                                    <a href="{{ asset('images/' . $candidature->attestProfessionm) }}">
                                        <img src={{ asset('images/' . $candidature->attestProfessionm) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                            <div class="col-lg-3 text-bold">
                                شهادة الدخل السنوي للأب :
                            </div>
                            <div class="col-lg-3">
                                {{-- @if ($candidature->photo)
                                    <a href="{{ asset('images/' . $candidature->photo) }}">
                                        <img src={{ asset('images/' . $candidature->photo) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-3 text-bold">
                                شهادة عمل الأم :
                            </div>
                            <div class="col-lg-3">

                                {{-- @if ($candidature->photo)
                                    <a href="{{ asset('images/' . $candidature->photo) }}">
                                        <img src={{ asset('images/' . $candidature->photo) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                            <div class="col-lg-3 text-bold">
                                شهادة الدخل السنوي الأم :
                            </div>
                            <div class="col-lg-3">
                                {{-- @if ($candidature->photo)
                                    <a href="{{ asset('images/' . $candidature->photo) }}">
                                        <img src={{ asset('images/' . $candidature->photo) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3 text-bold">
                                شهادة عمل الأم :
                            </div>
                            <div class="col-lg-3">

                                {{-- @if ($candidature->photo)
                                    <a href="{{ asset('images/' . $candidature->photo) }}">
                                        <img src={{ asset('images/' . $candidature->photo) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                            <br>
                            <div class="col-lg-3 text-bold">
                                شهادة الدخل السنوي الأم :
                            </div>
                            <div class="col-lg-3">
                                {{-- @if ($candidature->photo)
                                    <a href="{{ asset('images/' . $candidature->photo) }}">
                                        <img src={{ asset('images/' . $candidature->photo) }}
                                            style=" height: 100px; width: 100px;" class="img-fluid  img-rounded">
                                    </a>
                                @else
                                    <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                                @endif --}}
                                <img src={{ asset('asset/300x200.png') }} style=" height: 100px; width: 100px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer mt-2  bg-white">
                        <a href="{{ url('/listeDocs') }}" class="btn bg-gray mb-1">السابق</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
