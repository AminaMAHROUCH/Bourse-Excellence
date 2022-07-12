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
            <li> المنتدى</li>
            <li>اضافة</li>
        </ul>
    </div>
    <h4 class="mr-3 mt-3">العروض</h4>
    <hr class="titre ml-2 mr-2">
    <div class="card ml-2 mr-2">
        <div class="card-body ">
            <div class="card-header bg-white">
               
            </div>
            <div class="card height-auto">
                <h6 class="text-black mb-1 mr-2 mt-3 pr-3">قائمة العروض و الطلبات</h6>
                <hr class="titre ml-2 mr-2 mt-0">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer ml-3 mr-3">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>الرقم</th>
                                <th>العنوان</th>
                                <th>النوع</th>
                                <th>اجراءات</th>
                            </tr>
                        </thead>
                        <tbody id="dynamic">
                            @foreach ($markets as $market)
                            <tr class="text-center">
                                <td>{{ $market->id }}</td>
                                <td>{{ $market->titre }}</td>
                                <td>{{ $market->type }}</td>
                                <td>
                                    <a data-toggle="modal" data-target="#showMarket-{{ $market->id }}"><i
                                            class="fas fa-eye text-info"></i></a>
                                    <form  action="{{url('boursier/market/valider')}}" methode="POST">
                                        {{method_field('post')}}
                                        @csrf
                                        <input type="hidden" value="{{$market->id}}" name="id"> 
                                        <button class="btn btn-success text-white" type="submit"><i class="fa-solid fa-circle-check"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $markets->links() }} </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                <h3 class="modal-title text-center">أضف عرض</h3>
                <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-black">×</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('boursier/market/store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12 col-12 form-group">
                            <label>العنوان :</label>
                            <input type="text" placeholder="" name="titre" class="form-control w-100">
                        </div>
                        <div class="col-lg-12 col-12 form-group">
                            <label>الوصف :</label>
                            <textarea class="textarea form-control ckeditor" style="text-align: justify"
                                name="description" id="form-message" cols="10" rows="4"></textarea>
                        </div>
                        <div class="col-lg-12 col-12 form-group">
                            <label>النوع :</label>
                            <select class="form-control" name="type">
                                <option selected disabled>اختر</option>
                                <option value="عرض">عرض</option>
                                <option value="طلب">طلب</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <a class="btn bg-danger btn-model" data-dismiss="modal">الغاء</a>
                        <button class="btn bg-success btn-model" type="submit">أضف</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($markets as $market)
<div class="modal fade" id="showMarket-{{ $market->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                <h3 class="modal-title text-center">الوصف</h3>
                <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true" class="text-black">×</span></button>
            </div>
            <div class="modal-body">
                {!! $market->description !!}
            </div>
            <div class="model-footer">
                <div class="row mb-2">
                    <div class="Col-lg-12 text-center">
                        <a class="btn bg-danger btn-model" data-dismiss="modal">الغاء</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
<script src="//cdn.ckeditor.com/4.16.0/full/ckeditor.js"></script>
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

{{-- <script src="{{ asset('newFolder/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
<script src="{{ asset('newFolder/plugins/datatables/jquery.dataTables.js') }}"></script>
<script>
    $(function() {
            $('#example1').DataTable();
        });
</script>