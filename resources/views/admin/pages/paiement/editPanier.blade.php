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
                        تعديل مضمون السلة</a></li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> لائحة </h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <div class="card-header mt-2 bg-white">
                        <div class="row" style="margin-bottom: 0px !important  ; padding-bottom: 0px !important">
                            <div class="col-lg-3 col-3">
                                <h3>{{ $panier->num_panier }}</h3>
                            </div>
                            <div class="col-lg-3 col-3">
                                <h3>{{ $panier->date_creation }}</h3>
                            </div>
                            <div class="col-lg-3 col-3">
                                <button type="button" class="btn btn-secondary" data-toggle="modal"
                                    data-target="#modal-add">
                                    add liste
                                </button>
                            </div>
                            <div class="col-lg-3 col-3">
                                <button class="btn btn-danger" style="color: white">
                                    <a href="#" style="color: white"
                                        onclick="document.getElementById('deleteInter').submit()">
                                        <strong>حذف</strong>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="text-black mb-1 mr-2"> لائحة الطلبة</h6>
                        <hr class="titre ml-2 mr-2 mt-0">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>
                                            <strong>حذف</strong>
                                            </button>
                                        </th>
                                        <th>الاسم الكامل</th>
                                        <th>ر.ب.و</th>
                                        <th>الحساب البنكي</th>
                                        <th class="text-center"> الاجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ url('boursier/deleteIntermidiare') }}" methode="POST"
                                        id="deleteInter">
                                        @csrf
                                        @foreach ($intermidiaires as $intermidiaire)
                                            <tr role="row" class="odd text-center">
                                                <td><input type="checkbox" name="supprimer[]"
                                                        value="{{ $intermidiaire->id }}">
                                                </td>
                                                <td>{{ $intermidiaire->nom_prenom }}</td>
                                                <td>{{ $intermidiaire->cni }}</td>
                                                <td>{{ $intermidiaire->rib }}</td>
                                                <td>
                                                    <form
                                                        action="{{ route('boursier.intemidiare.destroy', $intermidiaire->id) }}"
                                                        method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn" type="submit"><i
                                                                class="fas fa-trash text-red"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                            <div>
                                <form class="new-added-form" action="{{ route('boursier.updatePanier', $panier->id) }}"
                                    method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <button type="submit" class="btn bg-green">حفظ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  details-->

    <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-orange ">
                    <h3 class="modal-title text-center" id="exampleModalLabel">مضمون الإعلان</h3>
                    <button type="button" class="close" style="font-size: 40px !important" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true" class="text-black">×</span></button>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>الاسم الكامل</th>
                                <th>ر.ب.و</th>
                                <th>الحساب البنكي</th>
                                <th class="text-center"> الاجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ url('boursier/addPanier') }}" methode="POST" id="PanierForm">
                                @csrf
                                @foreach ($fullCandidatures as $fullCandidature)
                                    <tr role="row" class="odd text-center">
                                        <td>{{ $fullCandidature->nom_prenom }}</td>
                                        <td>{{ $fullCandidature->cni }}</td>
                                        <td>{{ $fullCandidature->rib }}</td>
                                        <td><input type="checkbox" name="row[]" value="{{ $fullCandidature->id }}">
                                            <input type="hidden" name="code" value="{{ $panier->num_panier }}">
                                        </td>
                                    </tr>
                                @endforeach

                            </form>

                        </tbody>

                    </table>
                    <div>
                        <button class="btn btn-success" style="color: white">
                            <a href="#" style="color: white" onclick="document.getElementById('PanierForm').submit()">
                                <strong>valider</strong>
                            </a>
                        </button>
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
