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
            <li>الاعدادات</li>
        </ul>
    </div>
    <h4 class="mr-3 mt-3">الاعدادات</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card height-auto">
                <h6 class="text-black mb-1 mr-2 mt-3 pr-3">جدول الاعدادات</h6>
                <hr class="titre ml-2 mr-2 mt-0">
                <table class="table table-hover table-striped table-condensed">
                    <thead>
                        <tr class="text-center">
                            <th>اسم الخدمة</th>
                            <th>الحالة</th>
                            <th>من</th>
                            <th>إلى</th>
                            <th>الاجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($controles as $controle)
                        <tr class="text-center">
                            <th>{{ $controle->nom_fonction }}</th>
                            @if ($controle->action == 'مفعل')
                            <td class="btn bg-green btn-sm ml-1">مفعل</td>
                            @elseif($controle->action == 'معطل')
                            <td class="btn bg-red btn-sm mr-1">معطل</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>{{ $controle->start_at }}</td>
                            <td>{{ $controle->end_at }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#modal-add---{{ $controle->id }}"><i
                                        class="fas fa-calendar-day"></i></a>
                            </td>
                            {{-- <td>
                                <a href="{{ url('boursier/setting/' . $controle->id . '/activer') }}"
                            class="btn bg-green btn-sm ml-1">تفعيل</a>
                            <a href="{{ url('boursier/setting/' . $controle->id . '/desactiver') }}"
                                class="btn bg-red btn-sm mr-1">تعطيل</a>
                            </td> --}}

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach ($controles as $controles)
    <div class="modal fade" id="modal-add---{{ $controles->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-orange ">
                    <h3 class="modal-title text-center" id="exampleModalLabel">إضافة مدة التسجيل
                    </h3>
                    <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" class="text-black">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="new-added-form" action="{{ url('boursier/setting/' . $controles->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-6 form-group">
                                <label>من</label>
                                <input type="date" placeholder="" name="start" class="form-control w-100">
                            </div>
                            <div class="col-lg-6 col-6 form-group">
                                <label> إلى</label>
                                <input type="date" placeholder="" name="end" class="form-control w-100">
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
    @endforeach
</div>
@endsection