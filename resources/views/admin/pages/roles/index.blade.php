@extends('layouts.master')
<style>
    ul.popup {
        font-size: 22px;
        font-family: arial;
        margin-right: 30% !important;
        margin-left: 30% !important;
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
                <li> تدابير </li>
                <li><a href="{{ url('/boursier/roles') }}"> لائحة الأدوار</a></li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> الدور </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2 bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-2 mb-2">
                                <a href="{{ url('/boursier/roles/create') }}" class="btn btn-success">اضف دور</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الادوار</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        الرقم
                                    </th>
                                    <th>
                                        المستعمل بالعربية
                                    </th>
                                    <th>
                                        المستعمل بالفرنسية
                                    </th>
                                    <th class="text-center">
                                        الرخص
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">
                                        <td>
                                            {{ $role->id  }}
                                        </td>
                                        <td>
                                            {{ $role->titre_arabe  }}
                                        </td>
                                        <td>
                                            {{ $role->titre  }}
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-secondary" data-toggle="modal"
                                                data-target="#modal-show-{{ $role->id }}" data-id="{{ $role->id }}">
                                                تفاصيل
                                            </a>
                                        </td>
                                        <td class="text-center">

                                            <a class="btn btn-xs " href="{{ route('boursier.roles.show', $role->id) }}">
                                                <i class="fas fa-eye text-info"></i>
                                            </a>

                                            <a class="btn btn-xs " href="{{ route('boursier.roles.edit', $role->id) }}">
                                                <i class="fas fa-edit text-wanrning"></i>
                                            </a>

                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal  details-->
    @foreach ($roles as $role)
        <div class="col-lg-12">
            <div class="modal fade" id="modal-show-{{ $role->id }}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel">
                <div id="container" class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-orange ">
                            <h3 class="modal-title text-center" id="exampleModalLabel">الرخص</h3>
                            <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true" class="text-black">×</span></button>
                        </div>
                        <div class="modal-body">
                            {{-- <ul type="square" class="popup "> --}}
                                @foreach ($role->permissions as $key => $item)
                                    {{-- <li  class="ml-1">{{ $item->titre }}</li> --}}
                                    <i class="fas fa-square mr-2"></i> <span class="text-bold">{{ $item->titre }}</span><br>
                                @endforeach
                            {{-- </ul> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(function() {
            $('#example1').dataTable({
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
    <script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('newFolder/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    {{-- <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script> --}}

    <script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

