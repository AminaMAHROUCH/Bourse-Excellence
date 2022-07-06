@extends('layouts.master')

<style>
    @media (min-width: 768px) {
        .modal-xl {
            width: 90%;
            max-width: 1200px;
        }
    }

    ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
    }

    ul.breadcrumb li {
        display: inline;
        font-size: 18px;
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

</style>
@section('content')
    <ul class="breadcrumb"
        style="margin-right: 30px !important ; margin-left : 30px !important ;  margin-top : 60px !important">
        <li><a href="{{ url('boursier/dashboard') }}">الرئيسية</a></li>
        <li>الأرشيف</li>
    </ul>
    <div class="card" style="margin-right: 30px !important ; margin-left : 30px !important ;  margin-top : 40px !important">
        <div class="card-body">
            <h2 class="text-center " style="margin-top:5% !important ; margin-bottom : 7% !important  ">الأرشيف
            </h2>
            <form class="mg-b-20 ">
                <div class="row gutters-8">
                    <div class="col-lg-4 col-12 form-group">
                        <input type="text" class="form-control" id="" placeholder="">
                    </div>
                    <div class="col-lg-1 col-3 form-group">
                        <button type="submit" class="btn btn-block btn-info btn-lg"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <nav>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">أرشيف الطلبات المرفوضة</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false"> أرشيف المطرودين</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">أرشيف استثناء</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active table-responsive" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <table class="table display table-hover data-table text-nowrap dataTable no-footer" id="example">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 166.484px;">الاسم الكامل</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">ر.ب.و</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 203.938px;">رقم مسار</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">البريد الإلكتروني
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending" style="width: 98.1875px;">
                                        رقم الهاتف</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الحالة</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        نقطة البكالوريا</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        اسم القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        مهنة القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        رقم انخراط القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الاجراء</th>
                                </tr>


                            </thead>
                            <tbody>
                                @foreach ($candidats as $candidature)
                                    <tr role="row">
                                        <td>{{ $candidature->nom_prenom }}</td>
                                        <td>{{ $candidature->cni }}</td>
                                        <td>{{ $candidature->cne }}</td>
                                        <td>{{ $candidature->email }}</td>
                                        <td>{{ $candidature->telephone_1 }}</td>
                                        <td>{{ $candidature->etat }}</td>
                                        <td>{{ $candidature->mention }}</td>
                                        <td>{{ $candidature->nom_prenom_adherent }}</td>
                                        <td>{{ $candidature->profession_adherent }}</td>
                                        <td>{{ $candidature->matricule }}</td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#modal-show-{{ $candidature->id }}"
                                                data-id="{{ $candidature->id }}">
                                                Reset
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

<<<<<<< HEAD
</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li><a href="{{ url('/boursier/archive') }}"><i class="fas fa-archive text-gray"></i>
                        الارشيف</a></li>
                <li>لائحة</li>
            </ul>
        </div>
        <h4 class="mr-3 mt-3"> الارشيف </h4>
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
=======
>>>>>>> aa8f84b401835da5c3dfb59bc388a1d890e90e75
                    </div>
                    <div class="tab-pane fade table-responsive" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <table class="table display table-hover data-table text-nowrap dataTable no-footer" id="example">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 166.484px;">الاسم الكامل</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">ر.ب.و</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 203.938px;">رقم مسار</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">البريد الإلكتروني
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending" style="width: 98.1875px;">
                                        رقم الهاتف</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الحالة</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        نقطة البكالوريا</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        اسم القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        مهنة القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        رقم انخراط القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الاجراء</th>
                                </tr>


                            </thead>
                            <tbody>
                                @foreach ($etudiantRejeters as $etudiantRejeter)
                                    <tr role="row">
                                        <td>{{ $etudiantRejeter->nom_prenom }}</td>
                                        <td>{{ $etudiantRejeter->cni }}</td>
                                        <td>{{ $etudiantRejeter->cne }}</td>
                                        <td>{{ $etudiantRejeter->email }}</td>
                                        <td>{{ $etudiantRejeter->telephone_1 }}</td>
                                        <td>{{ $etudiantRejeter->etat }}</td>
                                        <td>{{ $etudiantRejeter->mention }}</td>
                                        <td>{{ $etudiantRejeter->nom_prenom_adherent }}</td>
                                        <td>{{ $etudiantRejeter->profession_adherent }}</td>
                                        <td>{{ $etudiantRejeter->matricule }}</td>
                                        <td>
                                            <button class="btn btn-primary"
                                                style="padding: 0; border: none; background: none;" type="button"
                                                data-toggle="modal" data-target="#modal-show-{{ $candidature->id }}"
                                                data-id="{{ $candidature->id }}">
                                                Reset
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>


                    </div>
                    <div class="tab-pane fade table-responsive" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <table class="table display table-hover data-table text-nowrap dataTable no-footer" id="example">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending"
                                        style="width: 166.484px;">الاسم الكامل</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending">ر.ب.و</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending"
                                        style="width: 203.938px;">رقم مسار</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Engine version: activate to sort column ascending">البريد الإلكتروني
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending" style="width: 98.1875px;">
                                        رقم الهاتف</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الحالة</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        نقطة البكالوريا</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الميزة</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        اسم القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        مهنة القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        رقم انخراط القيم(ة) الديني(ة)</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                        aria-label="Browser: activate to sort column ascending" style="width:  98.1875px;">
                                        الاجراء</th>
                                </tr>


                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">karim slimani</td>
                                    <td>v121218</td>
                                    <td>m12121912</td>
                                    <td>ww@gmail.com</td>
                                    <td>04112122</td>
                                    <td>cele</td>
                                    <td>tres bien</td>
                                    <td>imam</td>
                                    <td>mouha</td>
                                    <td>v12123</td>
                                    <td>190</td>


                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </nav>
        </div>
    </div>

@endsection
<script src="{{ asset('asset/files/js/jquery-3.3.1.min.js') }}"></script>
