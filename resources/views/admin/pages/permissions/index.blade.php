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
                <li> <i class="fas fa-pencil-alt"></i>
                    التدابير </li>
                <li>لائحة الأدوار</li>
                <li>المشاهدة</li>
            </ul>
        </div>
        <h4 class="mr-3"> التدابير</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <!--<div class="card-header mt-2 bg-white">-->
                    <!--    <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">-->
                    <!--        <div class="col-lg-2 mb-2">-->
                    <!--            <a href="{{ route('boursier.permissions.create') }}" class="btn btn-info mb-4">-->
                    <!--                اضف رخصة-->
                    <!--            </a>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الادوار</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <table id="example21" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        الرقم
                                    </th>
                                    <th>
                                        الرخصة
                                    </th>
                                    <th>
                                        {{-- &nbsp; --}}
                                        الاجراءات
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>
                                            {{ $permission->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permission->titre ?? '' }}
                                        </td>
                                        <td class="text-center">

                                            <a class="btn btn-xs"
                                                href="{{ route('boursier.permissions.show', $permission->id) }}">
                                                <i class="fas fa-eye text-info"></i>
                                            </a>

                                            <a class="btn btn-xs"
                                                href=" {{ route('boursier.permissions.edit', $permission->id) }}">
                                                <i class="fas fa-edit text-wanrning"></i>
                                            </a>

                                           
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>

                                <tr>

                                    <td colspan="3">
                                        <div class="d-flex">
                                            <div class="mx-auto">
                                                {{ $permissions->links() }}
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                    </div>
                    </tfoot>

                    </table>
                </div>
            </div>
        </div>

        <script>
            $(function() {
                $('#example21').dataTable({
"oLanguage": {
    "sSearch": "البحث",
    "sLengthMenu": "أظهر _MENU_طلب",
    "oPaginate": {
           "sNext": "اللاحق",
           "sPrevious": "السابق",
           
         },
         
     "sInfo": "Got a total of _TOTAL_ entries to show (_START_ to _END_)",
     "sEmptyTable": "لا توجد معطيات في هذه الصفحة أو هي في طور التحديث "
    
}
});
            });
        </script>

    @endsection
    {{-- <script src="{{ asset('newFolder/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
    <script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script> --}}

    <script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
