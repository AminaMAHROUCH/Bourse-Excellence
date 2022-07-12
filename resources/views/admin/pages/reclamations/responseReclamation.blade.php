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
            <li><a href="{{ url('/boursier/reclamation') }}"><i class="fas fa-exclamation-triangle text-gray"></i>
                    الشكايات</a></li>
            <li>الاجابة</li>
        </ul>
    </div>
    <h4 class="mr-3"> اجابة شكاية</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card height-auto">
                <hr class="titre ml-2 mr-2 mt-0">
                <div class="pl-5 pr-5">
                    <div class="card">
                        <div class="card-header mt-1 bg-white">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3>الشكاية</h3>
                                </div>
                                <div class="col-lg-9">
                                    @if ($lists->status == 'مفتوحة')
                                    <form class="new-added-form"
                                        action="{{ url('boursier/clotureReclamation', $lists->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-success btn-sm float-right" type="submit">اغلاق
                                            الشكاية</button>
                                    </form>
                                    @else
                                    <form class="new-added-form"
                                        action="{{ url('boursier/clotureReclamation', $lists->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button class="btn btn-danger btn-sm float-right" type="submit">فتح
                                            الشكاية</button>
                                    </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2 text-bold">
                                    الموضوع
                                </div>
                                <div class="col-lg-10">
                                    {{ $lists->objet }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 text-bold">
                                    مضمون الشكاية
                                </div>
                                <div class="col-lg-10">
                                    {{ $lists->contenu }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @foreach ($responses as $response)
                            @if ($response->id_user == Auth::user()->id)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="callout callout-success w-50 " style="float: left !important ;">
                                        <p class="text-bold " style="float: left !important ; color : green !important">
                                            {{ $response->nom_user }}</p><br>
                                        <hr>
                                        <p style=" text-align: justify !important"> {{ $response->message }}
                                        </p>
                                        <hr>
                                        <p style="color : green !important ">{{ $response->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="callout callout-warning w-50">
                                        <p class="text-bold "
                                            style="float: left !important ; color : goldenrod !important ">
                                            {{ $response->nom_user }}</p><br>
                                        <hr>
                                        <p style=" text-align: justify !important"> {{ $response->message }}
                                        </p>
                                        <hr>
                                        <p style="color : goldenrod !important ">{{ $response->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="card-body">
                            @if ($lists->status == 'مفتوحة')
                            <div class="card-footer bg-white">
                                <form class="new-added-form"
                                    action="{{ route('boursier.reclamation.update', $lists->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <textarea id="" rows="5" class="w-100" name="reponse"></textarea>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn bg-gray mt-1" type="submit"> <i
                                                    class="fas fa-paper-plane "
                                                    style="transform: rotate(270deg)"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    @if ($lists->status == 'مغلقة')
                                    <a class="btn bg-gray btn-sm" href="{{ url('/boursier/reclamationArchivees') }}">
                                        قائمة ارشيف الشكايات</a>
                                    @else
                                    <a class="btn bg-gray btn-sm" href="{{ url('/boursier/reclamation') }}">قائمة
                                        الشكايات</a>
                                    @endif
                                </div>
                                <div class="col-lg-8 text-center">
                                    {{ $responses->links() }}
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