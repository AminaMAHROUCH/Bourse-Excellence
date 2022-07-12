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
</style>
@section('content')
<div class="card mt-3 ">
    <div class="card-header">
        <ul class="breadcrumb mb-1">
            <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                    الرئيسية</a></li>
            <li><i class="nav-icon fas fa-copy text-gray"></i> الخدمات</li>
            <li>استمارات</li>
        </ul>
    </div>
    <h4 class="mr-3 mt-3"> الخدمات المتوفرة</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card height-auto">
                <div class="card-body">
                    <h6 class="text-black mb-1 mr-2">تسجيل الطلبات</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="card-body" style="padding-left :  30px !important ; padding-right : 30px !important">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card height-auto">
                                        <div class="card-body">
                                            <div class="text-center" style="margin-bottom: 40px !important ;">
                                                <div class="item-title " style="margin-top: 40px !important ;">
                                                    <h2 style="text-align: center !important">طلب التدريب </h2>
                                                </div>
                                            </div>
                                            <form class="new-added-form" action="{{ url('boursier/demandeStage') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                        <label> نوعه</label>
                                                        <select name="type_s" id="" class="form-control">
                                                            <option value="Stage observation">Stage
                                                                d’observation ou d’initiation</option>
                                                            <option value="Stage application">Stage d’application
                                                            </option>
                                                            <option value="Stage de fin etudes">Stage de fin d’études
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> من</label>
                                                        <input type="date" placeholder="" class="form-control"
                                                            name="debut">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> الى</label>
                                                        <input type="date" placeholder="" class="form-control"
                                                            name="fin_s">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> المدينة</label>
                                                        <input type="text" placeholder="" name="ville_s"
                                                            class="form-control">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> تحميل السيرة الذاتية</label>
                                                        <input type="file" placeholder="" class="form-control"
                                                            name="cv_file">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                        <div class="form-group">
                                                            <label>تفاصيل</label>
                                                            <textarea class="form-control" rows="4" name="explication_s"
                                                                id="form-message"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                                        <button type="submit" class="btn bg-green ">حفظ</button>
                                                        <button type="reset" class="btn bg-red">مسح</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card height-auto">
                                        <div class="card-body">
                                            <div class="text-center" style="margin-bottom: 40px !important ;">
                                                <div class="item-title " style="margin-top: 40px !important ;">
                                                    <h2 style="text-align: center !important">دورات تكونية</h2>
                                                </div>
                                            </div>
                                            <form class="new-added-form"
                                                action="{{ url('/boursier/demandeFormation') }}" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> اسم التكوين</label>
                                                        <input type="text" placeholder="" class="form-control"
                                                            name="titre_formation">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> نوعها</label>
                                                        <select name="type_f" id="deces" class="form-control">
                                                            <option value="الإعلاميات">الإعلاميات</option>
                                                            <option value="اللغات">اللغات</option>
                                                            <option value="تسيير المقاولات">تسيير المقاولات</option>
                                                            <option id="np" value="آخـــــر">آخـــــر</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-12 col-12 form-group"
                                                        style="display: none;" id="decesparent">
                                                        <label> إدخال نوع التكوين</label>
                                                        <input type="text" placeholder="" id="np" class="form-control"
                                                            name="type_formation">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> من</label>
                                                        <input type="date" placeholder="" class="form-control"
                                                            name="debut">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                                        <label> الى</label>
                                                        <input type="date" placeholder="" class="form-control"
                                                            name="fin_s">
                                                    </div>
                                                    <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                                        <label>تفاصيل</label>
                                                        <textarea class="form-control" rows="8" name="detail_f"
                                                            id="form-message"></textarea>
                                                    </div>
                                                    <div class="col-12 form-group mg-t-8 mt-4 text-center">
                                                        <button type="submit" class="btn bg-green">حفظ</button>
                                                        <button type="reset" class="btn bg-red">مسح</button>
                                                    </div>
                                                </div>
                                            </form>
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
</div>
@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {

        //Events

        $('#deces').change(function () {

            if($(this).val() == 'آخـــــر') {

                $('#decesparent').slideDown();

                $('#np').val('');

            } else {
                $('#decesparent').slideUp();
            }

        })

    })

</script>