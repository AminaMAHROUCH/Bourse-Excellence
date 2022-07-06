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
                <li> المنتدى</li>
            </ul>
        </div>
        <h4 class="mr-3">المنتدى</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <hr class="titre ml-2 mr-2 mt-0">

                    <div class="card-body pl-3 pr-3">
                        <div class="card">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2 text-bold">
                                        titre
                                    </div>
                                    <div class="col-lg-10">
                                        {{ $promotion->titre }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 text-bold">
                                        date
                                    </div>
                                    <div class="col-lg-10">
                                        {{ $promotion->created_at }}
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2 text-bold">
                                    </div>
                                    <div class="col-lg-10">
                                        <a class="btn bg-gray" data-toggle="modal"
                                            data-target="#showPromotion">التفاصيل</i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-white">
                                <form class="new-added-form"
                                    action="{{ url('boursier/market/forum/add/' . $promotion->id) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <textarea id="" rows="5" class="w-100" name="forum"></textarea>
                                        </div>
                                        <div class="col-lg-2">
                                            <button class="btn bg-gray mt-1" type="submit"> <i class="fas fa-paper-plane "
                                                    style="transform: rotate(270deg)"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card ml-3 mr-3">
                        <div class="card-body">
                            @foreach ($forums as $forum)
                                @if ($forum->id_user == Auth::user()->id)
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="callout callout-success  ">
                                                <p class="text-bold "
                                                    style="float: left !important ; color : green !important">
                                                    {{ $forum->nom_user }}</p>
                                                <br>
                                                <hr>
                                                <p style=" text-align: justify !important">
                                                    {{ $forum->message }}
                                                </p>
                                                <hr>
                                                <p style="color : green !important ">
                                                    {{ $forum->updated_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="callout callout-warning ">
                                                <p class="text-bold "
                                                    style="float: left !important ; color : goldenrod !important ">
                                                    {{ $forum->nom_user }}</p><br>
                                                <hr>
                                                <p style=" text-align: justify !important">
                                                    {{ $forum->message }}
                                                </p>
                                                <hr>
                                                <p style="color : goldenrod !important ">
                                                    {{ $forum->updated_at }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="card-footer bg-white">
                            <div class="row">
                                <div class="col-lg-4 ">
                                    <a class="btn bg-gray btn-sm" href="{{ url('/boursier/market/promotions') }}">
                                        قائمة العروض</a>
                                </div>
                                <div class="col-lg-8">
                                    {{ $forums->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="modal fade" id="showPromotion" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-orange">
                    <h3 class="modal-title text-center">التفاصيل</h3>
                    <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" class="text-black">×</span></button>
                </div>
                <div class="modal-body">
                    {{ $promotion->description }}
                </div>
                <div class="model-footer">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mt-2 mb-2 text-center">
                                <a class="btn bg-danger btn-model" data-dismiss="modal">الغاء</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
