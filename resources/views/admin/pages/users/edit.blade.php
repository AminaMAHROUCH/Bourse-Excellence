@extends('layouts.master')
<style>
    .titre {
        background-color: #f7f7f7 !important;
    }

    h3 {
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
        font-size: 13px !important;
    }

    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }


    a.active {
        background: black !important;
    }

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"
                            style="    width: 20px !important;"></i>الرئيسية </a></li>
                <li><a href="{{ url('boursier/archive') }}"> <i class="fas fa-exclamation-triangle text-gray"></i>
                        الشكايات</a></li>
                <li> <i class="fas fa-eye text-gray"></i> تفاصيل</li>
            </ul>
        </div>
        <h3 class="mr-3 mb-0"> تعديل معلومات المستخدم </h3>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card-body">
                    <h6 class="text-black mb-1 mr-2"> استمارة تعديل معلومات المستعمل</h6>
                    <hr class="titre ml-2 mr-2 mt-0">
                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="{{ route('boursier.users.update', [$user->id]) }}"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label class="required" for="name">الاسم</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                                        name="name" id="name" value="{{ old('name', $user->name) }}" required>
                                    <!--  @if ($errors->has('name')) <div class="invalid-feedback">
                                                                    {{ $errors->first('name') }}
                                                                </div> @endif
                                                            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span> -->
                                </div>
                                <div class="form-group">
                                    <label class="required" for="email">البريد الالكتروني</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                        required>
                                    <!-- @if ($errors->has('email')) <div class="invalid-feedback">
                                                                    {{ $errors->first('email') }}
                                                                </div> @endif
                                                            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span> -->
                                </div>
                                <div class="form-group">
                                    <label class="required" for="password">كلمة السر</label>
                                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                        type="password" name="password" id="password">
                                    <!-- @if ($errors->has('password')) <div class="invalid-feedback">
                                                                    {{ $errors->first('password') }}
                                                                </div> @endif
                                                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span> -->
                                </div>
                                <div class="form-group">
                                    <label class="required" for="roles">الدور</label>
                                    {{-- <div style="padding-bottom: 4px">
                                            <span class="btn btn-info btn-xs select-all"
                                                style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                            <span class="btn btn-info btn-xs deselect-all"
                                                style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                        </div> --}}
                                    <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                        name="roles[]" id="roles" multiple required>
                                        @foreach ($roles as $id => $roles)
                                            <option value="{{ $id }}"
                                                {{ in_array($id, old('roles', [])) || $user->roles->contains($id) ? 'selected' : '' }}>
                                                {{ $roles }}</option>
                                        @endforeach
                                    </select>
                                    <!--  @if ($errors->has('roles')) <div class="invalid-feedback">
                                                                    {{ $errors->first('roles') }}
                                                                </div> @endif
                                                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span> -->
                                </div>
                                <div class="form-group">
                                    <button class="btn bg-green" type="submit">
                                        تعديل
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
