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
                <li><a href="{{ url('/boursier/actualites') }}"><i class="fas fa-bullhorn text-orange text-gray"></i>
                        الاعلانات</a></li>
                <li>لائحة</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> لائحة الاعلانات </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <!-- <div class="card-header mt-2 bg-white">
                                            <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                                                <div class="col-lg-3 col-3">
                                                    <form>
                                                        <div class=" form-group">
                                                            <input type="text" placeholder=" ابحث عن ..." class="form-control">
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-lg-2">
                                                    <a href="{{ url('/boursier/actualites/create') }}" class="btn btn-success">اضف اعلان</a>
                                                </div>
                                            </div>
                                        </div> -->
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الاعلانات</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">التاريخ</th>
                                        <th class="text-center">الموضوع</th>
                                        @can('operation_editer_supprimer_visualiser_actualites')
                                            <th  class="text-center"> الاجراءات</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actualites as $actualite)
                                        <tr role="row" class="odd text-center">
                                            <td>{{ $actualite->publier }}</td>
                                            <td>{{ $actualite->titre }}</td>
                                            @can('operation_editer_supprimer_visualiser_actualites')
                                             <td style="display: -webkit-inline-box;">

                                        @can('editer_actualite')

                                        <button class="btn" style="border: none; background: non;" data-toggle="modal"
                                            data-target="#edit-{{ $actualite->id }}">
                                            <i class="fas fa-pencil-alt mr-1 text-warning">
                                            </i>
                                        </button>

                                        @endcan
                                        @can('supprimer_actualite')
                                        <form action="{{ route('boursier.actualites.destroy', $actualite->id) }}"
                                            method="post">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn" type="submit"><i
                                                    class="fas fa-trash text-red"></i></button>
                                        </form>
                                        @endcan
                                        @can('visualiser_actualite')
                                        <button style="    padding: 7px; border: none; background: none;" type="button"
                                            data-toggle="modal" data-target="#modal-show-{{ $actualite->id }}"
                                            data-id="{{ $actualite->id }}">
                                            <i class="fas fa-eye text-info"></i>
                                        </button>
                                        @endcan
                                    </td>
                                            @endcan
                                            </tr>
                                      
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  details-->
    @foreach ($actualites as $actualite)
        <div class="modal fade" id="modal-show-{{ $actualite->id }}" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel">
            <div class="modal-dialog">
                <div class="modal-content" style="width:160%;">
                    <div class="modal-header bg-orange ">
                        <h3 class="modal-title text-center" id="exampleModalLabel">مضمون الإعلان</h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-3">
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <div>{!! $actualite->contenu !!}</div>
                            </div>
                            <div class="col-12 form-group mt-3 text-center">
                                <button type="submit" data-dismiss="modal" class="btn btn-secondary">الغاء</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach








    <!-- Modal  update-->
    @foreach ($actualites as $actualite)
        <div class="modal fade" id="edit-{{ $actualite->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="width: 160%;">
                    <div class="modal-header bg-orange">
                        <h3 class="modal-title text-center" id="exampleModalLabel">تعديل الإعلان </h3>
                        <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true" class="text-black">×</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="new-added-form" style="padding-top: 5% !important"
                            action="{{ route('boursier.actualites.update', $actualite->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                    <label>نص الإعلان</label>
                                    <input type="text" placeholder="" value="{{ $actualite->titre }}"
                                        class="form-control" name="title">
                                </div>
                                <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                    <label>محتوى الإعلان</label>
                                    <textarea class="textarea form-control ckeditor" name="content"
                                        id="form-message" cols="10" rows="7">{!! $actualite->contenu !!}</textarea>
                                </div>
                                <div class="col-12 form-group mg-t-8 text-center">
                                    <button type="submit" class="btn btn-info">حفظ</button>
                                    <button type="reset" class="btn btn-secondary">مسح</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>

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
         
     "sInfo": "أظهر _START_ إلى _END_ من أصل _TOTAL_ طلب",
     "sEmptyTable": "لا توجد معطيات في هذه الصفحة أو هي في طور التحديث "
    
}
});
        });
    </script>
