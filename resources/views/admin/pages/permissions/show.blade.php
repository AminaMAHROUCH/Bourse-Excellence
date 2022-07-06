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

@extends('layouts.master')
@section('content')
    <ul class="breadcrumb"
        style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 60px !important">
        <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
        <li> التدابير </li>
        <li><a href="{{ url('boursier/roles') }}"> لائحة الأدوار</a></li>
        <li>المشاهدة</li>
    </ul>

    <div class="card" style="margin-right: 80px !important ; margin-left : 80px !important ;  margin-top : 5px !important">

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a href="{{ route('boursier.permissions.index') }}">
                        الرجوع الى قائمة الرخص
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                الرقم
                            </th>
                            <td>
                                {{ $permission->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                اسم الرخصة
                            </th>
                            <td>
                                {{ $permission->titre }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                تفاصيل الرخصة
                            </th>
                            <td>
                                {{ $permission->description }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
