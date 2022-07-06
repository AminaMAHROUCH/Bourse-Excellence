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
                <li>لائحة</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> ارشيف الشكايات </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة شكايات الأرشيف</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive mt-2">
                            <table id="examplee" class="table table-bordered table-striped">

                                <tbody>
                                    <thead>
                                        <tr role="row" class="text-center">
                                            <th>
                                                رقم الشكاية
                                            </th>
                                            <th>موضوعها</th>
                                            <th>الحالة</th>
                                            @can('operation_archive_reclamation')
                                                <th colspan="3">الاجراءات </th>
                                            @endcan
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($list as $item)
                                        @if ($item->status == 'مغلقة')
                                            <tr role="row" class="text-center">
                                                <td class="text-center">
                                                    {{ $item->id }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $item->objet }}
                                                </td>
                                                <td>
                                                    {{ $item->status }}
                                                </td>
                                                @can('operation_archive_reclamation_visualiser')
                                                    <td>
                                                        <a title="اجابة"
                                                            href="{{ route('boursier.reclamation.edit', $item->id) }}">
                                                            <button class="btn btn-sm" style="">
                                                                <i class="fas fa-folder text-info"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                @endcan
                                                @can('operation_archive_reclamation_supprimer')
                                                    <td style="text-align: right !important">
                                                        <form action="{{ route('boursier.reclamation.destroy', $item->id) }}"
                                                            method="post">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button class="btn btn-sm" style=""><i
                                                                    class="fas fa-trash text-red"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#examplee').DataTable();
        });
    </script>
@endsection
