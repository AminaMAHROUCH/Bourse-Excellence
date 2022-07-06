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
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li> <i class="fas fa-user text-gray"></i>
                    التسجيل </li>
                <li>لائحة</li>
            </ul>
        </div>
        <h4 class="mr-3"> الطلبة الممنوحين</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <h6 class="text-black mb-1 mr-2 mt-3 pr-3">لائحة المستفيدين من المنحة</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="table-responsive">
                        <table class="table display data-table text-nowrap">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input checkAll">
                                            <label class="form-check-label">رقم</label>
                                        </div>
                                    </th>
                                    <th class="text-center">الاسم الكامل</th>
                                    <th class="text-center">صورة</th>
                                    <th class="text-center">ر.ب.و</th>
                                    <th class="text-center">رقم مسار</th>
                                    <th colspan="2" class="text-center">الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr role="row">
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input">
                                                <label class="form-check-label">1</label>
                                            </div>
                                        </td>
                                        <td class="text-center">{{ $item->full_name }}</td>
                                        <td class="text-center">
                                            @if ($item->photo)
                                                <img src={{ asset('images/' . $item->photo) }}
                                                    style="border-radius: 50%; height: 50px; width: 50px;">
                                            @else
                                                <img src={{ asset('asset/300x200.png') }}
                                                    style="border-radius: 50%; height: 50px; width: 50px;">
                                            @endif
                                        </td>
                                        <td class="text-center">{{ $item->cni }}</td>
                                        <td class="text-center">{{ $item->cne }}</td>
                                        <td class="text-center">
                                            <a style="padding: 0; border: none; background: none;" data-toggle="modal"
                                                data-target="#modal-show-{{ $item->id }}" data-id="{{ $item->id }}">
                                                تفاصيل
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
                <div class="table-responsive">
                    <table class="table display data-table text-nowrap">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th class="text-center">الفوج</th>
                                <th class="text-center">الاسم الكامل</th>
                                <th class="text-center">ر.ب.و</th>
                                <th class="text-center">رقم مسار</th>
                                <th class="text-center">السنة الدراسية</th>
                                <th colspan="2" class="text-center">الاجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr role="row">
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $item->promotion }}</td>
                                    <td class="text-center">{{ $item->nom_prenom }}</td>
                                    <td class="text-center">{{ $item->cni }}</td>
                                    <td class="text-center">{{ $item->cne }}</td>
                                    <td class="text-center">{{ $item->anne_universitaire }}</td>
                                    <td class="text-center">
                                        <a style="padding: 0; border: none; background: none;" data-toggle="modal"
                                            data-target="#modal-show-{{ $item->id }}" data-id="{{ $item->id }}">
                                            تفاصيل
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach ($items as $item)
                    <!-- begin show details -->
                    <div class="modal fade" id="modal-show-{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg">
                            <div class=" modal-content">
                                <div class="modal-header" style="background-color: orange ">
                                    <h4 class="modal-title" id="myModalLabel" style="font-weight: bold; font-size: 20px; ">
                                        <i class="fas fa-info-circle"></i> تفاصيل
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <div id="content">
                                        <!-- Student Info Area Start Here -->
                                        {{-- <div class="col-xl-12 col-lg-6 col-12">
                                        <div class="card dashboard-card-ten">
                                            <div class="card-body">
                                                <div class="student-info">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h3 class="mb-5 mt-5  font text-center">
                                                                الشواهد </h3>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            شهادة الباكالوريا :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->AttestationBac)
                                                                <img src={{ asset('images/' . $item->AttestationBac) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-3">
                                                            بيان النقط :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->RelvesNote)
                                                                <img src={{ asset('images/' . $item->RelvesNote) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            شهادة عمل الأب :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->attestProfessionP)
                                                                <img src={{ asset('images/' . $item->attestProfessionP) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-3">
                                                            شهادة الدخل السنوي للأب :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->attestProfessionP)
                                                                <img src={{ asset('images/' . $item->attestProfessionP) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            شهادة عمل الأم :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->attestProfessionP)
                                                                <img src={{ asset('images/' . $item->attestProfessionP) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                        <div class="col-lg-3">
                                                            شهادة الدخل السنوي الأم :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($item->attestProfessionP)
                                                                <img src={{ asset('images/' . $item->attestProfessionP) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection
