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
    <ul class="breadcrumb"
        style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 60px !important">
        <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
        <li><a href="{{ url('boursier/reinscription') }}">التسجيل</a></li>
        <li> لائحة</li>
    </ul>
    <div class="card height-auto"
        style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 5px !important">
        <div class="card-body">
            <h2 class="text-center " style="margin-top:5% !important ; margin-bottom : 7% !important  ">لائحة الطلبة
            </h2>
            <form style="margin-top: 50px !important">
                <div class="row gutters-8">
                    <div class="col-lg-4 col-12 form-group">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                    <div class="col-lg-1 col-3 form-group">
                        <button type="submit" class="btn  btn-info btn-lg"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table display data-table text-nowrap table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>الاسم الكامل</th>
                            <th>ر.ب.و</th>
                            <th>رقم مسار</th>
                            <th>حالة الطلب</th>
                            <th colspan="2">الاجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($renouvellements as $renouvellement)
                            <tr role="row" class="text-center">
                                <td>{{ $renouvellement->nom_prenom }}</td>
                                <td>{{ $renouvellement->cni }}</td>
                                <td>{{ $renouvellement->cne }}</td>
                                <td>
                                    @if ($renouvellement->status == 'accepter')
                                        <button class="btn btn-success">مصادق عليه</button>
                                    @elseif($renouvellement->status == 'exception')
                                        <button class="btn btn-warning text-white">exception</button>
                                    @else
                                        <button class="btn btn-danger">رفض</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('boursier/renouvellement/show/' . $renouvellement->id) }}"><i
                                            class="fas fa-eye text-info"></i></a>

                                    <a class="btn " data-toggle="modal" data-target="#modal-{{ $renouvellement->id }}"><i
                                            class="far fa-envelope text-red"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Modal edit -->
            @foreach ($renouvellements as $renouvellement)
                <div class="modal fade" id="modal-{{ $renouvellement->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-orange ">
                                <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                                </h3>
                                <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true" class="text-black">×</span></button>
                            </div>
                            <div class="modal-body">
                                <form class="new-added-form" action="{{ url('boursier/sendMail') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" placeholder="" name="cni" class="form-control w-100"
                                            value="{{ $renouvellement->cni }}" readonly>
                                        <div class="col-lg-12 col-12 form-group">
                                            <label> الموضوع</label>
                                            <input type="text" placeholder="" name="type_s" class="form-control w-100"
                                                value="نقص معلومة او وثيقة" readonly>
                                        </div>
                                        <div class="col-lg-12 col-12 form-group">
                                            <label>المحتوى</label>
                                            <textarea class="textarea form-control" style="text-align: justify"
                                                name="contenu" id="form-message" cols="10" rows="10"></textarea>
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


            {{-- @foreach ($renouvellements as $renouvellement) 
                <div class="modal fade" id="modal-show-{{ $renouvellement->id }}" tabindex="-1" role="dialog"
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
                                    <h1>{{ $renouvellement->cni }}</h1> 
                                    <div class="col-xl-12 col-lg-6 col-12">
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
                                                            شهادة النجاح :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($renouvellement->attestation)
                                                                <img src={{ asset('images/' . $renouvellement->attestation) }}
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
                                                            شهادة اعادة التسجيل :
                                                        </div>
                                                        <div class="col-lg-3">
                                                            @if ($renouvellement->attestationreinscription)
                                                                <img src={{ asset('images/' . $renouvellement->attestationreinscription) }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @else
                                                                <img src={{ asset('asset/300x200.png') }}
                                                                    style=" height: 70px; width: 70px;">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <br />
                                                    @if ($renouvellement->justification)
                                                        <div class="row">
                                                            <div class="col-lg-3">
                                                                المبرر :
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-lg-3">
                                                                    شهادة النجاح :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    @if ($renouvellement->attestation)
                                                                        <img src={{ asset('images/' . $renouvellement->attestation) }}
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
                                                                    شهادة اعادة التسجيل :
                                                                </div>
                                                                <div class="col-lg-3">
                                                                    @if ($renouvellement->attestationreinscription)
                                                                        <img src={{ asset('images/' . $renouvellement->attestationreinscription) }}
                                                                            style=" height: 70px; width: 70px;">
                                                                    @else
                                                                        <img src={{ asset('asset/300x200.png') }}
                                                                            style=" height: 70px; width: 70px;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <br />
                                                            @if ($renouvellement->justification)
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        المبرر :
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        {{ $renouvellement->justification }}
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
        </div>
    </div>
@endsection
