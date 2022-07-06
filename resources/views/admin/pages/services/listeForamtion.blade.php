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

    .text {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        max-width: 150px;
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
        <h4 class="mr-3 mt-3"> لائحة دورات التكوين</h4>
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
                        <table id="example1" class="table table-bordered table-striped" role="grid">
                            <thead>
                                <tr role="row">
                                    <th> رقم الدورة</th>
                                    <th>نوعها</th>
                                    @can('operation_visualiser_supprimer_formation')
                                    @if (Auth::user()->role == 'admin')
                                        <th class="text-center" colspan="2">الاجراءات</th>
                                    @else
                                        <th class="text-center" colspan="3">الاجراءات</th>
                                    @endif
                                    @endcan
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->titre_formation }}</td>
                                   <!--     @if (Auth::user()->role != 'admin')
                                            <td>
                                                <button class="btn " data-toggle="modal"
                                                    data-target="#exampleModal-{{ $item->id }}"><i
                                                        class="fas fa-cogs text-yellow "></i></button>
                                            </td>
                                        @endif -->
                                        @can('operation_visualiser_supprimer_formation')
                                        @can('supprimer_formation')
                                        <td class="text-center">
                                            <form action="{{ url('/boursier/formations/' . $item->id) }}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button class="btn" title="مسح"><i
                                                        class="fas fa-trash text-red"></i></button>
                                            </form>
                                        </td>
                                        @endcan
                                        @can('visualiser_formation')
                                        <td class="text-center">
                                        <a href="{{ url('/boursier/formations/' . $item->id) }}" title="عرض"><i
                                                    class="fas fa-eye text-info"></i></a>
                                        </td>
                                        @endcan
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10">{{ $list->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal  details-->
            {{-- @foreach ($list as $item)
                <div class="modal fade" id="modal-show-{{ $item->id }}" tabindex="-1" role="dialog"
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
                                <div class="col-12-xxxl col-lg-12 col-12 form-group" style="text-align: justify">
                                    {{ $item->explication }}
                                </div>
                                <div class="col-12 form-group mg-t-8 mt-4 text-center">
                                    <button type="submit" data-dismiss="modal" class="btn bg-green">الغاء</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}


























            <!-- Modal -->
            @foreach ($list as $item)
                <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-orange">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                <h2 class="modal-title text-center" id="exampleModalLabel">تعديل معلوماتي التدربية</h2>
                            </div>
                            <div class="modal-body">
                                <form class="new-added-form" action="{{ route('boursier.editer', $item->id) }}"
                                    method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label> نوعه</label>
                                            <input type="text" placeholder="" name="type_f" class="form-control"
                                                value={{ $item->titre_formation }}>
                                        </div>
                                        <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                            <label>تفاصيل</label>
                                            <textarea class="textarea form-control" name="explication_f" id="form-message"
                                                cols="10" rows="7">{{ $item->explication }}</textarea>
                                        </div>
                                        <div class="col-12 form-group mg-t-8">
                                            <button type="submit"
                                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">حفظ</button>
                                            <button type="reset"
                                                class="btn-fill-lg bg-blue-dark btn-hover-yellow">مسح</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            






            <!-- Modal -->
            {{-- @foreach ($list as $item)
            <div class="modal fade" id="example-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-orange">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h2 class="modal-title text-center" id="exampleModalLabel">تفاصيل معلوماتي التدربية</h2>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                    <textarea class="textarea form-control" name="explication_s" id="form-message" cols="10"
                                        rows="14">{{ $item->explication }}</textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit" data-bs-dismiss="modal"
                                        class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">الغاء</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach --}}

            {{-- <div class="card height-auto mt-5">
    <div class="card-body">
        <div class="">
            <div class="item-title">
                <h3 class="mb-5 text-center"> دورات تكونية</h3>
            </div>
        </div>
        <div class="table-responsive">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer"><table class="table display data-table text-nowrap dataTable no-footer" id="DataTables_Table_0" role="grid">
                <thead>
                    <tr role="row" class="text-center">
                        <th class="sorting_asc" rowspan="1" colspan="1" aria-label="ID" style="width: 40.6667px;">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">رقم الطلب</label>
                            </div>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Photo: activate to sort column ascending" style="width: 42px;">نوعها</th>
                         <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="2" aria-label="Address: activate to sort column ascending"  >الاجراءات</th>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="sorting_1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input">
                                <label class="form-check-label">12</label>
                            </div>
                        </td>
                        <td>Businessman</td>
                        <td class="text-center">dow icon</td>
                        <td class="text-center"><a> بوب اب تفاصيل</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
            {{-- @csrf
        <input type="hidden" name="_method" value="PUT"> --}}
            <script>
                $(function() {
                    $('#example1').DataTable();
                });
            </script>
        @endsection
