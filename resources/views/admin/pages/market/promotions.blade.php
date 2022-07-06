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
                <li>االعروض</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">العروض</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <h6 class="text-black mb-1 mr-2 mt-3 pr-3">قائمة العروض</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    @foreach ($promotions as $promotion)
                        @if ($promotion->cni == Auth::user()->cni)
                            <a href="{{ url('/boursier/market/forum/promotions/' . $promotion->id) }}"
                                style="text-decoration: none ; color : black !important">
                                <div class="row ml-2 mr-2">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="callout callout-success ">
                                            <p class="text-bold "
                                                style="float: left !important ; color : green !important ">
                                                {{ $promotion->nom }} </p><br>
                                            <hr>
                                            <p style=" text-align: justify !important">
                                                {{ $promotion->titre }}
                                            </p>
                                            <hr>
                                            <p style="color : goldenrod !important ">
                                                {{ $promotion->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ url('/boursier/market/forum/promotions/' . $promotion->id) }}"
                                style="text-decoration: none ; color : black !important">
                                <div class="row ml-2 mr-2">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="callout callout-warning ">
                                            <p class="text-bold "
                                                style="float: left !important ; color : goldenrod !important ">
                                                {{ $promotion->nom }} </p><br>
                                            <hr>
                                            <p style=" text-align: justify !important">
                                                {{ $promotion->titre }}
                                            </p>
                                            <hr>
                                            <p style="color : goldenrod !important ">
                                                {{ $promotion->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="card-footer d-flex justify-content-center bg-white pb-0">
                    {{ $promotions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
