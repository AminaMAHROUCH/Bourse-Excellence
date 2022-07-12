@extends('layouts.master')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('newFolder/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
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

    /* .bad {
        position: absolute;
        font-size: xx-small;
        margin-right: -30px !important;
        margin-top: -10px;
        background-color: var(--orange);
        color: white;
    } */

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

    button#nav-addae-tab,
    button#nav-sarf-tab {
        width: 250px;
        height: 80px;
        border: solid 1px gray;
        margin-bottom: 10px !important;
        background-color: rgb(241, 239, 239) !important;
    }

    button.active {
        border-top: orange 5px solid !important;
        border-bottom-color: white !important;
        margin-bottom: 0% !important;
        background-color:  !important
    }

    button#nav-addae-tab:focus,
    button#nav-sarf-tab:focus {
        border-top: orange 5px solid !important;
        border-bottom-color: white !important;
        margin-bottom: 0% !important;
        background-color: white !important
    }

    #nav-addae-tab {
        margin-left: 40px !important;
    }
</style>
@section('content')
<div class="card mt-3 ">
    <div class="card-header">
        <ul class="breadcrumb mb-1">
            <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                    الرئيسية</a></li>
            <li><a href="{{ url('/boursier/demande/payer') }}">الطلبات
                </a></li>
        </ul>
    </div>
    <h4 class="mr-3">قائمة الطلبات</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card height-auto">
                <div class="card-body">
                    <h6 class="text-black mb-1 mr-2"> قائمة الطلبات الموجودة </h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active btn" id="nav-addae-tab" data-bs-toggle="tab"
                            data-bs-target="#addae" onclick="CLICK(this , 'butn')" type="button" role="tab"
                            aria-controls="nav-candidats" aria-selected="false">قائمة الأداء<br><span
                                class="badge mt-1 bg-orange text-white ">{{ count($paniers) }}
                            </span>
                        </button>
                        <button class="nav-link btn" id="nav-sarf-tab" data-bs-toggle="tab" data-bs-target="#listeRein"
                            type="button" role="tab" aria-controls="nav-listeRein" aria-selected="false"
                            onclick="CLICK(this , 'butn')"> قائمة الصرف <br><span
                                class="badge mt-1 bg-orange text-white ">{{ count($paiments) }}
                            </span></button>
                    </div>
                    <div class="tab-content mt-4" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="addae" role="tabpanel"
                            aria-labelledby="nav-addae-tab">
                            <div class="row">
                                <div class="col-sm-12 ">
                                    <table id="example122" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th>رقم السلة</th>
                                                <th>تارسخ الانشاء</th>
                                                <th> الحالة</th>
                                                <th>الطلبات</th>
                                                @can('panier_action')
                                                <th colspan="3">خيارات </th>
                                               
                                                @endcan
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($paniers as $panier)
                                            <tr role="row">
                                                <td>{{ $panier->num_panier }}</td>
                                                <td>{{ $panier->date_creation }}</td>
                                                @if ($panier->etat == 'مغلوقة')
                                                <td class="text-danger">{{ $panier->etat }}</td>
                                                @else
                                                <td class="text-success">{{ $panier->etat }}</td>
                                                @endif
                                                <td style="text-align: center; padding: 20px; font-size:20px;">
                                                
                                <a href="{{ url('boursier/filepdf/'. $panier->num_panier) }}">
                                                        <i class="fas fa-file-pdf text-danger"><span
                                                                class='badge badge-pill bg-danger'
                                                                style="float: right ;  font-size: 13px;   position: relative; top: -10px;">{{
                                                                $panier->code }}</span></i>
                                                    </a>
                                                    <a href="{{ asset('bourse_excellence/storage/app/public/' . $panier->file_xlsx) }}">
                                                        <i class="fas fa-file-excel text-success"><span
                                                                class='badge badge-pill bg-danger'
                                                                style="float: right ; font-size: 13px;    position: relative; top: -10px;">{{
                                                                $panier->code }}</span></i>
                                                    </a>
                                                </td>
                                               
                                                 @if ($panier->etat == 'مغلوقة')
                                                           <td colspan="3" style="text-align: center;" >تم الإغلاق</td>
                                                        @elseif($panier->annuler == 1)
                                                        <td colspan="3" style="text-align: center;">تم الإلغاء</td>
                                                        @else
                                                @can('panier_action')
                                                <td class="text-center">
                                                    <button id="edit" class="btn"
                                                        style="border: none; background: non;">
                                                        <a href="{{ url('boursier/editPanier/' . $panier->id) }}"><i
                                                                class="fas fa-edit text-warning"></i>
                                                            &nbsp;تعديل
                                                        </a>
                                                    </button>
                                                </td>
                                                 <td class="text-center">
                                                                    <button id="edit" class="btn"
                                                                        style="border: none; background: non;">
                                                                        <a
                                                                            href="{{ url('boursier/annuler/' . $panier->id) }}">
                                                                            <i class="fas fa-times-circle text-red"></i>
                                                                            إلغاء                                                                           
                                                                        </a>
                                                                    </button>
                                                                </td>
                                                <td>
                                                    <form action="{{ route('boursier.finance.close', $panier->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        <button class="btn" type="submit"><i
                                                                class="fas fa-times-circle text-red"></i>
                                                            &nbsp;إغلاق</button>
                                                    </form>
                                                </td>
                                                @endcan
                                                @endif

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="listeRein" role="tabpanel" aria-labelledby="nav-listeRein-tab">
                            <div class="row">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="col-sm-12">
                                        <table id="example22"
                                            class="table table-bordered table-striped table-responsive">
                                            <thead>
                                                <tr role="row">
                                                    <th>رقم السلة</th>
                                                    <th>تاريخ الانشاء</th>
                                                    <th>حساب الاقتطاع</th>
                                                    <th>اسم حساب الاقتطاع</th>
                                                    <th>تاريخ العملية</th>
                                                    <th>رقم العملية</th>
                                                    <th>الحالة</th>
                                                    <th>الطلبات</th>
                                                    <th>المجموع</th>
                                                    <th>التفاصيل</th>
                                                    <th>المستخدم</th>
                                                    <th>خيارات</th>
                                                </tr>
                                            </thead>
                                            <tbody style="overflow-y: auto; overflow-x: auto;">
                                                @foreach ($paiments as $paiment)
                                                <tr role="row">
                                                    <td class="text-center">{{ $paiment->numero_panier }}
                                                        @if ($paiment->description != '')
                                                        <i class="fas fa-circle" style="color: red; font-size: 20px;"
                                                            title="{{ $paiment->description }}"></i>
                                                        @endif
                                                    </td>
                                                    <td>{{ $paiment->date_creation }}</td>
                                                    <td>{{ $paiment->compte_debiter }}</td>
                                                    <td>{{ $paiment->intitule_compte }}</td>
                                                    <td>{{ $paiment->date_panier }}</td>
                                                    <td>{{ $paiment->numero_operation }}</td>
                                                    <td>{{ $paiment->etat }}</td>
                                                    <td style="text-align: center; padding: 20px;">

                                                        <a href="{{ asset('bourse_excellence/storage/app/public/' . $paiment->demande) }}">
                                        @php
                    $config = App\Models\Panier::where('num_panier', $paiment->numero_panier)->select('code')->first();
                    @endphp
                                                            <i class="fas fa-list"><span
                                                                    class='badge badge-pill bg-danger'
                                                                    style="float: right ;     position: relative; top: -10px;">{{
                                                    $config->code }}</span></i>

                                                        </a>
                                                    </td>
                                                    <td>{{ $paiment->total }}</td>
                                                    @if ($paiment->detail == '-')
                                                    <td>{{ $paiment->detail }}</td>
                                                    @else
                                                    <td class="text-center">
                                                        <p class="text-success">تم الصرف ل:{{ $paiment->paye }}
                                                        </p>
                                                        <p class="text-danger">تم رفض: {{ $paiment->rejete }}</p>
                                                        <a href="{{ asset('bourse_excellence/storage/app/public/avisSort/' . $paiment->detail) }}">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                    </td>
                                                    @endif
                                                    <td>{{ $paiment->user_name }}</td>
                                                    <td>
                                                        @if ($paiment->description != '')
                                                        <button type="button" class="btn btn-secondary">
                                                            تم الإلغاء
                                                        </button>
                                                        @else
                                                        <div class="btn-group dropend">
                                                            <button type="button"
                                                                class="btn btn-secondary dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                خيارات
                                                            </button>
                                                            <ul class="dropdown-menu">
                                    @if ($paiment->etat == 'لم ترفع بعد')
                                <li class="dropdown-item">
                                                                    <button style="border: none; background:transparent"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCenter--{{ $paiment->id }}">
                                                                        <i class="fas fa-file"></i>
                                                                        <strong>إعداد الملف</strong>
                                                                    </button>
                                                                </li>
                                                                <li class="dropdown-item">
                                                                    <button style="border: none; background:transparent"
                                                                        data-toggle="modal"
                                                                        data-target="#exampleModalCenter1--{{ $paiment->id }}">
                                                                        <i class="fas fa-times"></i>
                                                                        <strong>إلغاء السلة</strong>
                                                                    </button>
                                                                </li>
                                       <li class="dropdown-item">
                                                                    <button
                                                                        style="border: none; background:transparent">
                    <a href="{{ url('boursier/changeEtat/' . $paiment->id) }}" style="color:black;">
                            <i class="fas fa-file-upload"></i>
                                                                            <strong>رفع الملف</strong>
                                                                        </a>
                                                                    </button>
                                                                </li>
                                                                @else
                                                                <li class="dropdown-item">
                                                                    <button
                                                                        style="border: none; background:transparent">
                                                                        <a
                                                                            href="{{ url('boursier/downloadFile/' . $paiment->id) }}">
                                                                            <i class="fas fa-download"></i>
                                                                            <strong>تحميل الملف</strong>
                                                                        </a>
                                                                    </button>
                                                                </li>
                                                                <li class="dropdown-item">
                                                                    <button style="border: none; background:transparent"
                                                                        data-toggle="modal"
                                                                        data-target="#examplAdd--{{ $paiment->id }}">
                                                                        <i class="fas fa-plus"></i><strong>إضافة
                                                                            الملف المرجوع
                                                                        </strong></button>
                                                                </li>
                                                                @endif

                                                            </ul>
                                                        </div>
                                                        @endif



                                                    </td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @foreach ($paiments as $paiment)
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter--{{ $paiment->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="background: white;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            إعداد الملف
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                <form action="{{ route('boursier.addfile', $paiment->id) }}"
                                        method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group">
                                                                <label>حساب الاقتطاع</label>
                                                                <input type="text" name="compte_debiter"
                                                                    class="form-control"
                                                                    value="{{ $paiment->compte_debiter }}" id="ribb"
                                                                    hint-class="ribb">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>اسم حساب الاقتطاع</label>
                                                                <input type="text" name="intitule_compte"
                                                                    class="form-control"
                                                                    value="{{ $paiment->intitule_compte }}"
                                                                    maxlength="50">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>رقم العملية</label>
                                                                <input type="number" name="numero_operation"
                                                                    class="form-control"
                                                                    value="{{ $paiment->numero_operation }}">
                                                            </div>
                                                            <div class="text-center">
                                                                <a class="btn bg-danger btn-model"
                                                                    data-dismiss="modal">إلغاء</a>
                                                                <button class="btn bg-success btn-model"
                                                                    type="submit">إضافة</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal 1-->
                                        <div class="modal fade" id="exampleModalCenter1--{{ $paiment->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="background: white;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            إعداد الملف
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form
                                                            action="{{ route('boursier.annulerPanier', $paiment->id) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group">
                                                                <label>تفاصيل الإلغاء</label>
                                                                <textarea class="form-control"
                                                                    name="description"></textarea>
                                                            </div>
                                                            <div class="text-center">
                                                                <a class="btn bg-danger btn-model"
                                                                    data-dismiss="modal">ANNULER</a>
                                                                <button class="btn bg-success btn-model"
                                                                    type="submit">ADD</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal 2-->
                                        <div class="modal fade" id="examplAdd--{{ $paiment->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="background: white;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                                            الملف المرجوع
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('boursier.AddAvisSort', $paiment->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                            {{ method_field('PUT') }}
                                                            <div class="form-group">
                                                                <label>الملف المرجوع</label>
                                                                <input class="form-control" type="file"
                                                                    name="avis_sort">
                                                            </div>
                                                            <div class="text-center">
                                                                <a class="btn bg-danger btn-model"
                                                                    data-dismiss="modal">ANNULER</a>
                                                                <button class="btn bg-success btn-model"
                                                                    type="submit">ADD</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script>
    function CLICK(btn, cls) {
            var btns = document.getElementsByClassName(cls);
            if (cls == "btn") {
                for (var i = 0; i < btns.length; i++) {
                    if (btns[i].id == btn.id) {
                        btns[i].setAttribute('class', "nav-link active btn");
                    } else {
                        unClick(i, cls);
                    }
                }
            } else {
                for (var i = 0; i < btns.length; i++) {
                    if (btns[i].id == btn.id) {
                        btns[i].setAttribute('class', "nav-link active butn");
                    } else {
                        unClick(i, cls);
                    }
                }
            }
        }

        function unClick(pos, cls) {
            var btns = document.getElementsByClassName(cls);

            if (cls == "btn") {
                for (var i = 0; i < btns.length; i++) {
                    if (btns[i] != btns[pos]) {
                        btns[pos].setAttribute('class', "nav-link  btn");
                    }
                }
            } else {
                for (var i = 0; i < btns.length; i++) {
                    if (btns[i] != btns[pos]) {
                        btns[pos].setAttribute('class', "nav-link  butn");
                    }
                }
            }
        }
</script>

@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        $("#TEST").hide();
        $("#ribb").blur(function() {
            if ($(this).val().length < 24) {
                $("." + $(this).attr('hint-class')).show();
            }
        });
    });
</script>