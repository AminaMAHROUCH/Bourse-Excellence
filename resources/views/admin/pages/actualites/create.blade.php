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
                <li><a href="{{ url('/boursier/actualites') }}"><i class="fas fa-bullhorn text-orange text-gray"></i>
                        الاعلانات</a></li>
                <li>اضافة</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3">اضافة اعلان</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <h6 class="text-black mb-1 mr-2 mt-3 pr-3"> استمارة اضافة اعلان</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <form role="form" action="{{ route('boursier.actualites.store') }}" method="POST">
                        @csrf
                        <div class=" card-body pl-5 pr-5">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>الموضوع</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>مضمون الإعلان</label>
                                        <textarea class="textarea" name="content" placeholder="Place some text here"
                                            style="width: 100%; height: 140px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="{{ url('/boursier/actualites') }}" class="btn bg-gray "
                                style="color : white !important"> قائمة
                                الاعلانات</a>
                            <button type="submit" class="btn bg-green">انشر</button>
                            <button type="reset" class="btn bg-red">مسح</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="/js/fm6/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="/js/fm6/jquery.icheck.min.js"></script>
<script type="text/javascript" src="/js/fm6/jquery.cookie.js"></script>
<script type="text/javascript" src="/js/fm6/jquery.regex.js"></script>
<script type="text/javascript" src="/js/fm6/select2.min.js"></script>
<script type="text/javascript" src="/js/fm6/select2_locale_ar.js"></script>