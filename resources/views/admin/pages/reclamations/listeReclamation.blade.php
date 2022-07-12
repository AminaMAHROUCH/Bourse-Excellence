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
                <li><a href="{{ url('/boursier/reclamationArchivees') }}"><i
                            class="fas fa-exclamation-triangle text-gray"></i>
                        ارشيف الشكايات </a></li>
                <li></li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> علبة الشكايات </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2 bg-white">
                        <div class="row"
                            style="margin-bottom: 4px !important  ;margin-top: -1px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-3">
                                <a href="{{ url('/boursier/reclamation/create') }}" class="btn btn-success btn-sm">اضف
                                    شكاية</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الشكايات</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive mt-2">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <table id="exampleee" class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th>الاسم الكامل</th>
                                <th>البريد الإل
                                            <th>
                                                رقم الشكاية
                                            </th>
                                            <th>موضوعها</th>
                                            <th>حالتها </th>
                                            @can('operation_reclamation')
                                                <th>الاجراءات</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic">
                                        @foreach ($list as $item)
                                            @if ($item->status == 'مفتوحة')
                                                <tr role="row" class="text-center">
                                        <td>{{ $item->nom_prenom }}</td>
                                        <td>{{ $item->email }}</td>
                                                    <td>
                                                        {{ $item->id }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $item->objet }}
                                                    </td>
                                                    <td>
                                                        {{ $item->status }}
                                                    </td>
                                                    @can('operation_reclamation')
                                                        <td>
                                                            <a title="اجابة"
                                                                href="{{ route('boursier.reclamation.edit', $item->id) }}">
                                                                <i class="fas fa-folder text-info"></i>
                                                            </a>
                                                        </td>
                                                    @endcan
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $list->links() }} </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
