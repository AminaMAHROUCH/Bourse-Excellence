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
                <li><i class="nav-icon fas fa-copy text-gray"></i> الخدمات</li>
                <li>لائحة</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> لائحة التدريبات</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2 bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-3 col-3">
                                <form>
                                    <div class=" form-group">
                                        <input type="text" placeholder=" ابحث عن ..." class="form-control">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2">جدول طلبات التدريب</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                <table id="example1" class="table table-bordered table-striped" id="DataTables_Table_0"
                                    role="grid">
                                    <thead>
                                        <tr role="row">

                                            <th>نوعه</th>
                                            <th>المدينة</th>
                                            <th>من</th>
                                            <th>الى
                                            </th>
                                            <th> المدة</th>
                                            @can('operation_editer_supprimer_visualiser_stage')
                                                <th colspan="3" class="text-center">
                                                    الاجراءات</th>
                                            @endcan

                                    </thead>
                                    <tbody>
                                        @foreach ($list as $item)
                                            <tr role="row" class="odd">
                                                <td>{{ $item->type }}</td>
                                                <td>{{ $item->ville }}</td>
                                                <td>{{ $item->debut }}</td>
                                                <td>{{ $item->fin }}</td>
                                                <td>sqdqsdqs</td>
                                                @can('operation_editer_supprimer_visualiser_stage')
                                                    @can('editer_stage')
                                                        <td>
                                                            <button class="btn " data-toggle="modal"
                                                                data-target="#modal-edit---{{ $item->id }}"><i
                                                                    class="fas fa-edit text-yellow  "></i></button>
                                                        </td>
                                                    @endcan
                                                    @can('supprimer_stage')
                                                        <td>
                                                            <form action="{{ route('boursier.suppressionStage', $item->id) }}"
                                                                method="post">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn"><i class="fas fa-trash text-red"></i></button>
                                                            </form>
                                                        </td>
                                                    @endcan
                                                    @can('visualiser_stage')
                                                        <td><a href="{{ url('/boursier/stages/' . $item->id) }}" title="عرض"><i
                                                                    class="fas fa-eye text-info"></i></a>
                                                        </td>
                                                    @endcan
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit -->
    @foreach ($list as $item)
        <div class="modal fade" id="modal-edit---{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-orange ">
                        <h3 class="modal-title text-center" id="exampleModalLabel">تعديل</h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="new-added-form" action="{{ route('boursier.demande', $item->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label> نوعه</label>
                                    <input type="text" placeholder="" name="type_s" class="form-control"
                                        value={{ $item->type }}>
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label> المدينة</label>
                                    <input type="text" placeholder="" name="ville_s" class="form-control"
                                        value={{ $item->ville }}>
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label> من</label>
                                    <input type="date" placeholder="" class="form-control" name="debut"
                                        value={{ $item->debut }}>
                                </div>
                                <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                    <label> الى</label>
                                    <input type="date" placeholder="" class="form-control" name="fin_s"
                                        value={{ $item->fin }}>
                                </div>

                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                    <label>تفاصيل</label>
                                    <textarea class="textarea form-control" style="text-align: justify" name="explication_s"
                                        id="form-message" cols="10" rows="10">{{ $item->explication }}</textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8 mt-3 text-center">
                                    <button type="submit" class="btn bg-green">حفظ</button>
                                    <button type="reset" class="btn bg-red">مسح</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal details -->
    {{-- @foreach ($list as $item)
        <div class="modal fade" id="modal-detail-{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-orange ">
                        <h3 class="modal-title text-center" id="exampleModalLabel">تفاصيل</h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: justify !important">
                                {{ $item->explication }}
                            </div>
                            <div class="col-lg-12 form-group mt-4 text-center">
                                <button type="submit" data-dismiss="modal" class="btn bg-green">الغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach --}}
    <script>
        $(function() {
            $('#example1').DataTable();
        });
    </script>
@endsection
