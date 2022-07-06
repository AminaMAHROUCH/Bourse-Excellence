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
                <li>الطلبات</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">الطلبات</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <h6 class="text-black mb-1 mr-2 mt-3 pr-3">قائمة الطلبات</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    @foreach ($demandes as $demande)
                        @if ($demande->cni == Auth::user()->cni)
                            <a href="{{ url('/boursier/market/forum/demandes/' . $demande->id) }}"
                                style="text-decoration: none ; color : black !important">
                                <div class="row ml-2 mr-2">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="callout callout-success ">
                                            <p class="text-bold "
                                                style="float: left !important ; color : green !important ">
                                                {{ $demande->nom }}</p><br>
                                            <hr>
                                            <p style=" text-align: justify !important">
                                                {{ $demande->titre }}
                                            </p>
                                            <hr>
                                            <p style="color : green !important ">
                                                {{ $demande->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ url('/boursier/market/forum/demandes/' . $demande->id) }}"
                                style="text-decoration: none ; color : black !important ">
                                <div class="row ml-2 mr-2">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="callout callout-warning ">
                                            <p class="text-bold "
                                                style="float: left !important ; color : goldenrod !important ">
                                                {{ $demande->nom }} </p><br>
                                            <hr>
                                            <p style=" text-align: justify !important">
                                                {{ $demande->titre }}
                                            </p>
                                            <hr>
                                            <p style="color : goldenrod !important ">
                                                {{ $demande->created_at }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center bg-white pb-0">
                {{ $demandes->links() }}
            </div>
        </div>
    </div>
    <script>
        // $(document).ready(function() {
        //     $('.callout').click(function() {
        //         window.location.replace("/boursier/market/forum/demandes/");
        //     })
        // });
    </script>
@endsection
