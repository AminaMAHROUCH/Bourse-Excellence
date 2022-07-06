@extends('layouts.master')
<style>
    .titre {
        background-color: #f7f7f7 !important;
    }

    h3 {
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
        font-size: 13px !important;
    }

    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }


    a.active {
        background: black !important;
    }

</style>

@section('content')

        <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"
                            style="    width: 20px !important;"></i>الرئيسية </a></li>
                <li><a href="{{ url('boursier/archive') }}"> <i class="fas fa-exclamation-triangle text-gray"></i>
                        الشكايات</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <div class="form-group">
                    <a class="btn btn-info mb-3 mt-4" href="{{ route('boursier.users.index') }}">
                        الرجوع الى قائمة المستخدمين
                    </a>
                </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                ID
                            </th>
                            <td>
                                {{ $user->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                name
                            </th>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                email
                            </th>
                            <td>
                                {{ $user->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                roles
                            </th>
                            <td>
                                @foreach ($user->roles as $key => $roles)
                                    <span class="label label-info">{{ $roles->titre}}</span>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
