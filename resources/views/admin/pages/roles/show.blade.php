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

    tr {
        font-size: 22px;
        font-family: arial;
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
                <li> تدابير </li>
                <li><a href="{{ url('/boursier/roles') }}"> لائحة الأدوار</a></li>
            </ul>
        </div>

        <div class="card-body" style="padding-left : 50px !important ; padding-right : 50px !important">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-info mb-3 mt-4" href="{{ route('boursier.roles.index') }}">
                        الرجوع الى قائمة الأدوار
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>الرقم</th>
                            <td>{{ $role->id }}</td>
                        </tr>
                        <tr>
                            <th>المستعمل بالعربية</th>
                            <td>{{ $role->titre_arabe }}</td>
                        </tr>
                        <tr>
                            <th>المستعمل بالفرنسية</th>
                            <td>{{ $role->titre }}</td>
                        </tr>
                        <tr>
                            <th>الرخص</th>
                            <td>
                                @foreach ($role->permissions as $key => $permissions)
                                    <span class="label label-info">{{ $permissions->titre }} : {{$permissions->description}}</span><br />
                                @endforeach
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="form-group">
                    {{-- <a class="btn btn-default" href="{{ route('admin.roles.index') }}">
                        .back_to_list
                    </a> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
