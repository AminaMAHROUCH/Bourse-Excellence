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
                <li><a href="{{ url('/boursier/reclamation') }}"><i class="fas fa-exclamation-triangle text-gray"></i>
                        الشكايات</a></li>
                <li>تفاصيل</li>
            </ul>
        </div>
        <h2 class="text-bold mr-3 mt-3">الشكاية</h2>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-body">
                        <div class="row">
                            <table class="table-hover  mr-5">
                                <tr>
                                    <th class="">الموضوع</th>
                                    <td class="pr-5"> {{ $lists->objet }}</td>
                                </tr>
                                <tr class="text-center">
                                    <th>فحوى الشكاية</th>
                                    <td style="text-align: justify" class="pr-5 ">{!! $lists->contenu !!}</td>
                                </tr>
                                @if ($lists->reponse)
                                    <tr class="text-center">
                                        <th>الجواب</th>
                                        <td style="text-align: justify" class="pr-5">{{ $lists->reponse }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        @if (!$lists->reponse)
                            <a class="btn btn-primary ml-3"
                                href="{{ route('boursier.reclamation.edit', $lists->id) }}">اجابة</a>
                            <a class="btn btn-info " href="/boursier/reclamation">العودة الى قائمة الشكايات</a>
                        @else
                            <a class="btn btn-info " href="/boursier/reclamationArchivees">العودة الى الأرشيف</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
