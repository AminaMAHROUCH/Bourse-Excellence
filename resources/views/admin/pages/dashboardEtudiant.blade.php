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

    .visit {
        color: orange !important;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 22px;
        font-family: arial;
    }

    .content {
        font-size: 22px;
        font-family: arial;
        color: #484747
    }

    .row {
        cursor: pointer;
    }

    .title {
        color: orange !important;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 22px;
        font-family: arial;
    }

    .text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 14ch
    }

</style>

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class=" fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li><a href="#actua"><i class=" fas fa-exclamation-triangle text-gray"></i> الاعلانات</a></li>
                <li><a href="#form"> استمارات</a></li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> الاعلانات </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-body" id="actua">
                        <h6 class="text-black mb-1 mr-2">الاعلانات الموجودة</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        @foreach ($ligne as $item)
                            @if ($item->is_read)
                                <div class="col-lg-12">
                                    <div id="click" class="row bg-light" data-toggle="modal" data-backdrop="static"
                                        data-keyboard="false" data-target="#example-{{ $item->id }}">
                                        <table class="table table-hover">
                                            <tr>
                                                <td class="content text">{{ $item->titre }}</td>
                                                <td class="post-date bg-skyblue text-right"><span class="bg-secondary badge"
                                                        style="font-size:16px">{{ $item->created_at->format('d/m/Y') }}</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="row" data-toggle="modal" data-backdrop="static" data-keyboard="false"
                                        data-target="#example-{{ $item->id }}">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>
                                                    <h6 class="visit notice-title text-left">{{ $item->titre }}</h6>
                                                </td>
                                                <td class="text-right"><strong class="post-date bg-skyblue"><span
                                                            class="bg-dark badge"
                                                            style="font-size:16px">{{ $item->created_at->format('d/m/Y') }}</span></strong>
                                                </td> 
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="card-footer bg-white pb-0">
                        {{ $ligne->links() }}
                    </div>
                    <div class="card mt-5 mx-3">
                        <div class="card-body" id="form">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card height-auto">
                                            <div class="card-body">
                                                <div class="text-center" style="margin-bottom: 40px !important ;">
                                                    <div class="item-title " style="margin-top: 40px !important ;">
                                                        <h2 style="text-align: center !important">طلب التدريب </h2>
                                                    </div>
                                                </div>
                                                <form class="new-added-form" action="{{ url('boursier/demandeStage') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                            <label> نوعه</label>
                                                            <input type="text" class="form-control" name="type_s">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                            <label> المدينة</label>
                                                            <input type="text" class="form-control" name="ville_s">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                            <label> من</label>
                                                            <input type="date" placeholder="" class="form-control"
                                                                name="debut">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                            <label> الى</label>
                                                            <input type="date" class="form-control" name="fin_s">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                            <label>تفاصيل</label>
                                                            <textarea class="textarea form-control" name="explication_s"
                                                                id="form-message" rows="4"></textarea>
                                                        </div>
                                                        <div class="col-12 form-group mg-t-8 mt-4 text-center">
                                                            <button type="submit" class="btn bg-green ">حفظ</button>
                                                            <button type="reset" class="btn bg-red">مسح</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card height-auto">
                                            <div class="card-body">
                                                <div class="text-center" style="margin-bottom: 40px !important ;">
                                                    <div class="item-title " style="margin-top: 40px !important ;">
                                                        <h2 style="text-align: center !important">دورات تكونية</h2>
                                                    </div>
                                                </div>
                                                <form class="new-added-form"
                                                    action="{{ url('/boursier/demandeFormation') }}" method="POST">

                                                    <div class="row">
                                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                            <label> نوعها</label>
                                                            <input type="text" placeholder="" class="form-control"
                                                                name="type_f">
                                                        </div>
                                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                            <label>تفاصيل</label>
                                                            <textarea class="textarea form-control" name="detail_f"
                                                                id="form-message" rows="8"></textarea>
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
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($ligne as $item)
                    <div class="col-lg-12">
                        <div class="modal fade" id="example-{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            @if (strlen($item->contenu) > 200)
                                <div id="container"
                                    class="modal-dialog modal-dialog-centered modal-xl  modal-dialog-scrollable text-center">
                                @else
                                    <div id="container" class="modal-dialog modal-dialog-centered text-center">
                            @endif
                            <div class="modal-content">
                                <div class="modal-header bg-orange">
                                    <form class="new-added-form" action="{{ url('boursier/actualite/' . $item->id) }}"
                                        method="post" enctype="multipart/form-data">
                                        <h2 class="modal-title" id="exampleModalLabel">فحوى الاعلان</h2>
                                </div>
                                <div class="modal-body">
                                    <form class="new-added-form" action="{{ url('boursier/actualite/' . $item->id) }}"
                                        method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <div class="content mt-3 col-12-xxxl col-lg-12 col-12">
                                            <h6 class="title my-4">{{ $item->titre }}</h6>
                                            {{ $item->contenu }}
                                        </div>

                                        <div class="col-12 form-group mg-t-8 mt-4">
                                            <button type="submit" class="btn btn-danger">الغاء</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        @endforeach

    @endsection
