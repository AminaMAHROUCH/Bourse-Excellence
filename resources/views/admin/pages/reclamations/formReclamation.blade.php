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
            <li><a href="{{ url('/boursier/reclamation') }}"><i class="fas fa-exclamation-triangle text-gray"></i>
                    الشكايات</a></li>
            <li>اضافة</li>
        </ul>
    </div>
    <h4 class="mr-3 mt-3">اضافة شكاية</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card height-auto">
                <hr class="titre ml-2 mr-2 mt-0">
                <form class="new-added-form" action="{{ route('boursier.reclamation.store') }}" method="POST">
                    @csrf
                    <div class=" card-body pl-5 pr-5">
                        <div class="row">
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>الموضوع</label>
                                <select name="objt" id="deces" class="form-control">
                                    <option value="تأخر الصرف">تأخر الصرف</option>
                                    <option value="الوثائق المكونة للملف">الوثائق المكونة للملف</option>
                                    <option value="أعطاب تقنية للتطبيق">أعطاب تقنية للتطبيق</option>
                                    <option id="np" value="آخـــــر">آخـــــر</option>
                                </select>
                                <br>
                                <input style="display: none;" id="decesparent" type="text" placeholder=""
                                    class="form-control" name="objet">
                            </div>
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>نص الشكاية</label>
                                <textarea class="textarea form-control" name="text" id="form-message"
                                    rows="4"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <!--<a href="{{ url('/boursier/reclamation') }}" class="btn bg-gray">لائحة الشكايات</a>-->
                        <button type="submit" class="btn btn-success">حفظ</button>
                        <button type="reset" class="btn btn-danger">مسح</button>
                    </div>
                </form>
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

                $('#decesparent').val('');

            } else {
                $('#decesparent').slideUp();
            }

        })

    })

</script>