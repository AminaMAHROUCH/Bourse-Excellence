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

</style>

@section('content')
<div class="card mt-3">
    <div class="card-header">
        <ul class="breadcrumb mb-1">
            <li>
                <a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i> الرئيسية</a>
            </li>
            <li>تدابير</li>
            <li>تعديل</li>
        </ul>
    </div>
    <h4 class="mr-3 mt-3">تعديل دور</h4>
    <hr class="titre ml-2 mr-2" />
    <div class="card ml-2 mr-2">
        <div class="card-body">
            <div class="card height-auto">
                <h6 class="text-black mr-2 mt-3 pr-3">استمارة تعديل الدور</h6>
                <hr class="titre ml-2 mr-2 mt-0" />
                <form method="POST" action="{{ route('boursier.roles.update', [$role->id]) }}" enctype="multipart/form-data">
                    @method('PUT') @csrf
                    <div class="card-body pt-0 pl-5 pr-5">
                        <div class="form-group">
                            <label class="required" for="title">الدور</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('titre', $role->titre) }}" readonly />
                        </div>
                        <div class="form-group">
                            <table class="table table-bordered table-striped table-hover">
                                <tr>
                                    <th>
                                        <label class="required" for="permissions">الرخصة</label>
                                        <div style="padding-bottom: 4px;">
                                            <div class="checkbox">
                                                <label> <input type="checkbox" id="checkall" onClick="checkAll()" /> حدد الكل / إلغاء الكل </label>
                                            </div>
                                        </div>
                                    </th>
                                    <th>الوصف</th>
                                </tr>
                                @foreach($help as $h)  
                                            <tr>
                                                <td>  
                                                    <div class="checkbox">
                                                        <label for="">
                                                            <input type="checkbox" class="checkitem" name="permissions[]" id="permissions" value="{{ $h->id }}" checked >
                                                            </label>
                                                            </div>
                                                            {{ $h->titre }}
                                                </td>
                                                <td> 
                                                    {{ $h->description }}
                                                </td>
                                                </tr>   
                                @endforeach
                                
                                    @foreach($permissions as $permission)  
                                            <tr>
                                                <td>  
                                                    <div class="checkbox">
                                                        <label for="">
                                                            <input type="checkbox" class="checkitem" name="permissions[]" id="permissions" value="{{ $permission->id }}" >
                                                            </label>
                                                            </div>
                                                            {{ $permission->titre }}
                                                </td>
                                                <td> 
                                                    {{ $permission->description }}
                                                </td>
                                                </tr>   
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <a href="{{ url('/boursier/roles') }}" class="btn bg-gray"> العودة الى لائحة الأدوار</a>
                        <button class="btn btn-success" type="submit">
                            حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection                           
<script>
    function checkAll() {
        var input = document.getElementById('checkall') ;
        if(input.checked)
        {
            selectAll()
        }
        else 
        {
            unSelectAll()
        }

    }

        function selectAll(){
            var inputs = document.getElementsByClassName('checkitem') 
            for(var i =0; i<inputs.length; i++){ 
                    inputs[i].checked = true 
            }
        }
            
        function unSelectAll(){
            var inputs = document.getElementsByClassName('checkitem')
            for(var i =0; i<inputs.length; i++){
                inputs[i].checked = false
            } 
        }

    </script>                       
    