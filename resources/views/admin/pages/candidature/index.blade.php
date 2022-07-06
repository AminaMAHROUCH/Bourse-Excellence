{{-- @if (session()->has('Alert'))
    <script>
        alert('الرجاء تحديد مرشح واحد على الأقل');
    </script>
@endif --}}


@extends('layouts.master')

<style>
    .newclass {
        background-color: yellow
    }

    h5 {
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
                <li><a href="{{ url('boursier/archive') }}">التسجيل</a></li>
                <li>تفاصيل</li>
            </ul>
        </div>
        <h5 class="mr-3 mt-3">لائحة الطلبة المرشحين للمنحة</h5>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-header mt-2 bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-3 col-3">
                                <form>
                                    <div class=" form-group">
                                        <input type="text" placeholder=" ابحث عن ..." class="form-control">
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="col-lg-3 col-3">
                                <form action="" method="POST">
                                    <div class="form-group">

                                        <select class="form-control" multiple="multiple">
                                            <option disbled selected>المرجو الاختيار </option>
                                            <option value="full_name">الاسم الكامل</option>
                                            <option value="cni">ر.ب.و</option>
                                            <option value="">مكان الازدياد</option>
                                            <option value="date_naissance">تاريخ الازدياد</option>
                                            <option value="email">البريد الالكتروني</option>
                                            <option value="sex">الجنس</option>
                                            <option value="telephone_1">الهاتف 1</option>
                                            <option value="telphone_2">الهاتف 2</option>
                                            <option value="situation">الحالة العائلية</option>
                                            <option value="etat">الحالة الجسدية</option>
                                            <option value="adresse">العنوان</option>
                                            <option value="cne">رقم مسار</option>
                                            <option value="note">النقطة المحصل عليها</option>
                                            <option value="mention">الميزة</option>
                                            <option value="full_name_f">اسم القيم(ة) الديني(ة) الكامل</option>
                                            <option value="profession_f">(ا)مهنته </option>
                                            <option value="matricule">رقم الإنخراط</option>
                                            <option value="cniP">رقم البطاقة الوطنية</option>
                                            <option value="region_id">الجهة</option>
                                            <option value="province_id">اسم الزوج(ة) الكامل</option>
                                            <option value="tel_f">رقم هاتف الأب </option>
                                            <option value="tel_m">رقم هاتف الأم</option>
                                            <option value="adresse_parents">عنوان الأباء</option>
                                        </select>


                                        </select>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="col-lg-3 col-3 ">
                                <button class="btn btn-info " style="color: white">
                                    <a href="{{ route('boursier.exportCsv') }}" style="color: white">
                                        <strong>Export Excel</strong>
                                    </a>
                                </button>

                            </div>
                            {{-- <div class="col-lg-3 col-3 ">
                            </div> --}}
                            <div class="col-lg-3 col-3 pt-2 text-bold">
                                @if ($errors->any())
                                    <div class="text-danger">{{ $errors->first() }}</div>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table display table-hover data-table text-nowrap dataTable no-footer"
                                id="example">
                                <thead>
                                    <tr class="text-center">
                                        <th>مصادقة</th>
                                        <th>الاسم الكامل</th>
                                        <th>ر.ب.و</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>النقطة</th>
                                        <th>الهاتف1</th>
                                        <th colspan="3">الاجراء</th>
                                        <th>حالة الطلب</th>
                                        <th>أرشيف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('boursier.valideCandidat') }}" methode="POST" id="validForm">
                                        @csrf
                                        @foreach ($candidatures as $candidature)
                                            <tr role="row">
                                                <td>
                                                    <input type="checkbox" name="row[]" value="{{ $candidature->id }}" />
                                                </td>
                                                <td>{{ $candidature->nom_prenom }}</td>
                                                <td>{{ $candidature->cni }}</td>
                                                <td>{{ $candidature->email }}</td>
                                                <td>{{ $candidature->note }}</td>
                                                <td>{{ $candidature->telephone_1 }}</td>
                                                <td>
                                                    <a href="{{ url('boursier/getPDF') }}"><i
                                                            class="fas fa-download text-dark-pastel-green"></i></a>
                                                </td>
                                                <td>
                                                    <a href="{{ url('boursier/candidature/show/' . $candidature->id) }}"><i
                                                            class="fas fa-eye text-info"></i></a>
                                                </td>
                                                <td>
                                                    <a data-toggle="modal"
                                                        data-target="#modal-edit---{{ $candidature->id }}"><i
                                                            class="far fa-envelope text-red"></i></a>
                                                </td>
                                                <td class="text-center" id="sourceDev">
                                                    <input type="hidden" class="status-{{ $candidature->id }}"
                                                        value="{{ $candidature->status }}" />
                                                    @if ($candidature->valider == 1)
                                                        <button type="button" class=" btn btn-sm text-white"
                                                            style="background-color:#505050">مصادق عليه</button>
                                                    @else
                                                        @if ($candidature->status == 'accepter')
                                                            <button type="button"
                                                                class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                data-id="{{ $candidature->id }}"
                                                                style="background-color:green">{{ $candidature->status }}</button>
                                                        @elseif($candidature->status == "en attente")
                                                            <button type="button"
                                                                class=" btn btn-sm text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                data-id="{{ $candidature->id }}"
                                                                style="background-color:gold">{{ $candidature->status }}</button>
                                                        @else
                                                            <button type="button"
                                                                class=" btn btn-sm btn-dark text-white btn-update-status mybtn-{{ $candidature->id }}"
                                                                data-id="{{ $candidature->id }}">{{ $candidature->status }}</button>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class=" btn btn-sm text-white btn-update-archiver btn-danger"
                                                        data-id="{{ $candidature->id }}">archiver</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>

                                </tbody>
                            </table>
                            <!-- Modal edit -->
                            @foreach ($candidatures as $candidature)
                                <div class="modal fade" id="modal-edit---{{ $candidature->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-orange ">
                                                <h3 class="modal-title text-center" id="exampleModalLabel">Send Mail
                                                </h3>
                                                <button type="button" class="close" style="font-size: 40px !important"
                                                    data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="text-black">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="new-added-form" action="{{ url('/boursier/sendMailTo') }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-12 col-12 form-group">
                                                            <label> البريد الإلكتروني</label>
                                                            <input type="text" placeholder="" name="email"
                                                                class="form-control w-100"
                                                                value="{{ $candidature->email }}" readonly>
                                                        </div>
                                                        <div class="col-lg-12 col-12 form-group">
                                                            <label> الموضوع</label>
                                                            <input type="text" placeholder="" name="type_s"
                                                                class="form-control w-100" value="نقص معلومة او وثيقة"
                                                                readonly>
                                                        </div>
                                                        <div class="col-lg-12 col-12 form-group">
                                                            <label>المحتوى</label>
                                                            <textarea class="textarea form-control"
                                                                style="text-align: justify" name="contenu" id="form-message"
                                                                cols="10" rows="10"></textarea>
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
                    </div>
                    <div class="card-footer bg-white " style="text-align : left !important">
                        <button class="btn btn-secondary" style="color: white">
                            <a href="#" style="color: white" onclick="document.getElementById('validForm').submit()">
                                <strong>مصادقة</strong>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-update-status").on('click', function() {
            var candidat_id = $(this).data('id');
            var status = $('.status-' + candidat_id).val();
            $.ajax({
                type: "GET",
                url: "/boursier/updateStatus",
                dataType: "json",
                data: {
                    'candidat_id': candidat_id
                },
                success: function(response) {
                    if (status === "NULL") {
                        $('.mybtn-' + candidat_id).html('accepter');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'green';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://127.0.0.1:8000/boursier/candidature');
                    } else if (status === "accepter") {
                        $('.mybtn-' + candidat_id).html('en attente');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'gold';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://127.0.0.1:8000/boursier/candidature');
                    } else {
                        $('.mybtn-' + candidat_id).html('accepter');
                        const buttonstatus = document.querySelector('.mybtn-' +
                            candidat_id);
                        buttonstatus.style.backgroundColor = 'green';
                        buttonstatus.style.color = 'white';
                        $("body").load(
                            'http://127.0.0.1:8000/boursier/candidature');
                    }
                }
            });
        });
    });
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".btn-update-archiver").on('click', function() {
            var candidat_id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/boursier/archiver",
                dataType: "json",
                data: {
                    'candidat_id': candidat_id
                },
                success: function(response) {
                    $("body").load(
                        'http://127.0.0.1:8000/boursier/candidature');
                }
            });
        });
    });
</script>
