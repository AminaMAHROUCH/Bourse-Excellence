@extends('layouts.admin')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="index.html">All Notes</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="#">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Notes</span>
                    </li>
                </ul>


            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h1 class="page-title"> Notes
                <!-- <small>scroller extension demos</small> -->
            </h1>

            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-green">
                                <i class="icon-settings font-green"></i>
                                <span class="caption-subject bold uppercase">All Modules</span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover order-column" id="sample_1">
                                <thead>
                                    <tr>


                                        <th>
                                            photo
                                        </th>
                                        <th>
                                            Name
                                        </th>



                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr data-entry-id="{{ $user->id }}">

                                            <td class="text-center">
                                                <img src="{{ asset('images/' . $user->photo) }}" alt="" width="40"
                                                    height="40">
                                            </td>
                                            <td>
                                                {{ $user->name ?? '' }}
                                            </td>

                                            <td>
                                                <button class="btn btn-xs btn-info" type="button" data-toggle="modal"
                                                    data-target="#createModal{{ $user->id }}">add note</button>
                                            </td>



                                        </tr>

                                        <!-- responsive -->
                                        <div id="createModal{{ $user->id }}" class="modal fade" tabindex="-1"
                                            data-width="760">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true"></button>
                                                <h4 class="modal-title">Add NOTE</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('admin.notes.store') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="cc">{{ trans('cruds.note.fields.cc') }}</label>
                                                            <input
                                                                class="form-control {{ $errors->has('cc') ? 'is-invalid' : '' }}"
                                                                type="number" name="cc" id="cc"
                                                                value="{{ old('cc', '') }}" min="0" step="0">
                                                            @if ($errors->has('cc'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('cc') }}
                                                                </div>
                                                            @endif
                                                            <span
                                                                class="help-block">{{ trans('cruds.note.fields.cc_helper') }}</span>

                                                            <label
                                                                for="projet">{{ trans('cruds.note.fields.projet') }}</label>
                                                            <input
                                                                class="form-control {{ $errors->has('projet') ? 'is-invalid' : '' }}"
                                                                type="number" name="projet" id="projet"
                                                                value="{{ old('projet', '') }}" min="0" step="0">
                                                            @if ($errors->has('projet'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('projet') }}
                                                                </div>
                                                            @endif
                                                            <span
                                                                class="help-block">{{ trans('cruds.note.fields.projet_helper') }}</span>

                                                            <label for="tp">{{ trans('cruds.note.fields.tp') }}</label>
                                                            <input
                                                                class="form-control {{ $errors->has('tp') ? 'is-invalid' : '' }}"
                                                                type="number" name="tp" id="tp"
                                                                value="{{ old('tp', '') }}" min="0" step="0">
                                                            @if ($errors->has('tp'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('tp') }}
                                                                </div>
                                                            @endif
                                                            <span
                                                                class="help-block">{{ trans('cruds.note.fields.tp_helper') }}</span>
                                                            <label
                                                                for="moyen">{{ trans('cruds.note.fields.moyen') }}</label>
                                                            <input
                                                                class="form-control {{ $errors->has('moyen') ? 'is-invalid' : '' }}"
                                                                type="number" name="moyen" id="moyen"
                                                                value="{{ old('moyen', '') }}" min="0" step="0">
                                                            @if ($errors->has('moyen'))
                                                                <div class="invalid-feedback">
                                                                    {{ $errors->first('moyen') }}
                                                                </div>
                                                            @endif
                                                            <span
                                                                class="help-block">{{ trans('cruds.note.fields.moyen_helper') }}</span>

                                                            <input type="text" name="student" value="{{ $user->id }}">

                                                            <input type="text" name="seance" value="{{ $matiere->id }}">


                                                        </div>

                                                    </div>
                                                    <!--  <button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button> -->
                                                    <button type="submit" class="btn green">Save </button>

                                                </form>
                                            </div>


                                        </div>
                        </div>
                        @endforeach


                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
        <div class="row">

        </div>
    </div>
    <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2016 &copy; Metronic Theme By
            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
                title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase
                Metronic!</a>
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
@endsection
