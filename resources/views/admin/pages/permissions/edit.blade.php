@extends('layouts.master')
<style>
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

</style>
@section('content')
    <ul class="breadcrumb"
        style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 60px !important">
        <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
        <li> التدابير </li>
        <li><a href="{{ url('boursier/roles') }}"> لائحة الرخص</a></li>
        <li>تعديل</li>
    </ul>

    <div class="card" style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 5px !important">

        <div class="card-body"
            style="padding-top : 50px !important ; padding-left : 40px !important ; padding-right : 40px !important">
            <form method="POST" action="{{ route('boursier.permissions.update', [$permission->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="col-12-xl col-lg-12 col-12 form-group">
                    <label class="required" for="title">اسم</label>
                    <input class="form-control mt-4" type="text" name="title" id="title"
                        value="{{ old('title', $permission->titre) }}" readonly>
                </div>
                <div class="col-12-xl col-lg-12 col-12 form-group">
                    <label class="required" for="titre"> تفاصيل الرخصة </label>
                    <textarea class="textarea form-control" name="description" cols="10" rows="5"
                        placeholder=" ادخل تفاصيل الرخصة"></textarea>
                </div>


                <div class="form-group mt-5 mb-5">
                    <button class="btn btn-danger" type="submit">
                        تعديل
                    </button>
                </div>
            </form>
        </div>
    </div>



@endsection
