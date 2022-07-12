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

    .length {
        width: 300px !important;
    }

    .unchangedField {
        background-color: rgb(232, 232, 232) !important;
        border-color: rgb(232, 232, 232) !important;
        border-style: rgb(116, 116, 116) !important;
        outline: none !important;
        border: gray ! color: rgb(116, 116, 116) !important;
    }

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <ul class="breadcrumb mb-1">
                <li><a href="{{ url('boursier/dashboard') }}"> <i class="nav-icon fas fa-tachometer-alt text-gray"></i>
                        الرئيسية</a></li>
                <li><a href="{{ url('/boursier/etudiant/profile') }}"> <i class="fas fa-user text-gray"></i> معلومات
                        شخصية</a> </li>
            </ul>
        </div>
        <h4 class="mr-3">معلومات شخصية</h4>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card height-auto">
                    <form class="new-added-form" action="{{ url('/boursier/etudiantChange/' . $info->cni) }}"
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="card-body">
                            <h6 class="text-black mb-1 mr-2">معلومات شخصية</h6>
                            <hr class="titre ml-2 mr-2 mt-0">
                            <div class="row " style="margin-left: 30px !important ; margin-right : 30px !important">
                                {{-- <div class="row">
                                    <div class="col-lg-12">
                                        @if ($info->photo)
                                            <img src="{{ asset('images/' . $info->photo) }}" class="w-50" id="imagee">
                                        @else
                                            <img src="{{ asset('asset/300x200.png') }}" alt="student" class="w-50">
                                        @endif
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <input type="file" name="imageee" onchange="loadFile(event,'imagee')">
                                    </div>
                                </div> --}}
    
                                <div class="col-lg-7 mt-5 ">
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nom_prenom }}" readonly></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل بالعربية:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nom_prenomArab }}" name="nom_prenomArab"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> رقم مسار :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->cne }}" name="cne">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">رقم البطاقة الوطنية :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->cni }}" readonly></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الحالة الجسدية :</div>
                                        <div class="col-lg-8">
                                            <select class="select2 form-control" id="" name="etat_physique">
                                                <option
                                                    {{ $info->etat_physique == 'سليم' ? 'selected' : '' }}>
                                                    سليم</option>
                                                <option
                                                    {{ $info->etat_physique == 'ذوي الاحتياجات الخاصة' ? 'selected' : '' }}>
                                                    ذوي
                                                    الاحتياجات الخاصة</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> الجنس :</div>
                                        <div class="col-lg-4">
                                            <label>أنثى<input type="radio"  name="sexe" value="أنثى"></label>
                                            <label>ذكر<input type="radio"  name="sexe" value="ذكر"></label>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">مكان الازدياد :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->lieu_naissance }}" type="text" name="lieu_naissance"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">تاريخ الازدياد :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->date_naissance }}" type="date" name="date_naissance" ></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">العنوان :</div>
                                        <div class="col-lg-8" ><textarea class="form-control" name="adresse">{{ $info->adresse }}</textarea></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">رقم الهاتف 1 :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->telephone_1 }}" name="telephone_1"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">البريد الالكتروني:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->email }}" name="email"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> مسلك البكالوريا : </div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->filiereBac }}" name="filiereBac"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> ميزة البكالوريا : </div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->mention }}" name="mention"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> سنة الحصول على البكالوريا </div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->anne_bac }}" name="anne_bac"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> معدل البكالوريا : </div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->note }}" name="note"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> الثانوية:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->lycee }}" name="lycee" ></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> المؤسسة:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->ecole }}" name="ecole"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> الجامعة:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->universite }}" name="universite"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> الشعبة الجامعية :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->filiere }}" name="filiere"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> السنة الجامعية:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->anne_universitaire }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> مدة الدراسة الجامعية:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->duree_etude }}" name="duree_etude"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل للمنخرط :</div>
                                        <div class="col-lg-8" ><input class="form-control" name="nom_prenom_adherent" value="{{ $info->nom_prenom_adherent }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل للمنخرط بالعربية :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nom_prenom_adherentAr }}" name="nom_prenom_adherentAr">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">رقم الانخراط :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->matricule }}" name="matricule"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">رقم البطاقة الوطنية للمنخرط :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->cni_adherent }}" readonly></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">مهنة المنخرط:</div>
                                        <div  class="col-lg-8">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
            
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox2" name="profession_f[]"
                                                            value="مرشد"
                                                            {{ in_array('مرشد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox2" class="custom-control-label"
                                                            style="width :90px; text-align:right;">مرشد </label>
            
                                                    </div>
                                                </div>
            
            
            
            
            
            
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox3" name="profession_f[]"
                                                            value="امام"
                                                            {{ in_array('امام', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox3" class="custom-control-label"
                                                            style=" width :90px; text-align:right;"> امام&nbsp;</label>
                                                    </div>
                                                </div>
            
            
            
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox4" name="profession_f[]"
                                                            value="خطيب"
                                                            {{ in_array('خطيب', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox4" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">خطيب</label>
                                                    </div>
                                                </div>
            
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" class="form-control"
                                                            type="checkbox" id="customCheckbox1" name="profession_f[]"
                                                            value="امام مرشد"
                                                            {{ in_array('امام مرشد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox1" class="custom-control-label"
                                                            style="width :120px;  text-align:right;">امام
                                                            مرشد(ة)</label>
            
                                                    </div>
                                                </div>
                                            </div>
            
                                            <!------------>
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox5" name="profession_f[]" value="مؤذن"
                                                            {{ in_array('مؤذن', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox5" class="custom-control-label"
                                                            style=" width :90px; text-align:right;"> مؤذن </label>
            
            
            
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
            
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox6" name="profession_f[]" value="واعظ(ة)"
                                                            {{ in_array('واعظ(ة)', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox6" class="custom-control-label"
                                                            style="width :90px;  text-align:right;">واعظ(ة) </label>
            
                                                    </div>
                                                </div>
            
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox7" name="profession_f[]" value="متفقد"
                                                            {{ in_array('متفقد', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox7" class="custom-control-label"
                                                            style="width :90px;  text-align:right;"> متفقد&nbsp;</label>
                                                    </div>
                                                </div>
            
                                                <div class="col-xl-3 col-lg-3 col-12 ">
                                                    <div class="custom-control custom-checkbox">
                                                        <input class="custom-control-input" type="checkbox"
                                                            id="customCheckbox8" name="profession_f[]" value="منظف"
                                                            {{ in_array('منظف', $profession) ? 'checked' : '' }}>
                                                        <label for="customCheckbox8" class="custom-control-label"
                                                            style=" width :90px;text-align:right;">منظف</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">هاتف المنخرط:</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->telephone_adherent }}" readonly>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل للزوج(ة) :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nom_prenom_conjoint }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">الاسم الكامل للزوج(ة) بالعربية :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nom_prenom_conjointAr }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">هاتف الزوج(ة):</div>
                                        <div class="col-lg-8" ><input class="form-control" name="telephone_conjoint" value="{{ $info->telephone_conjoint }}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold">عدد الاخوة :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->nbr_freres }}" readonly></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> Numero de compte :</div>
                                        <div class="col-lg-8" ><input class="form-control" value="{{ $info->rib }}" name="rib" type="number"></div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> احد او ابوين متوفيين :</div>
                                        <div class="col-lg-8" >
                                            <select name="parents_deces" aria-hidden="true"
                                            class="form-control" id="np">
                                            <option
                                                {{ $info->parents_deces == 'ابوين على قيد الحياة' ? 'selected' : '' }}>
                                                ابوين على قيد الحياة</option>
                                            <option
                                                {{ $info->parents_deces == 'الأم' ? 'selected' : '' }}>
                                                الأم</option>
                                            <option
                                                {{ $info->parents_deces == 'الأب' ? 'selected' : '' }}>
                                                الأب</option>
                                        </select>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row">
                                        <div class="col-lg-4 text-bold"> عنوان الاباء :</div>
                                        <div class="col-lg-8 ">
                                            <textarea class="form-control" name="adresse_parents">{{ $info->adresse_parents }}</textarea>
                                        </div>
                                    </div>
                                    <br>
    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer mt-2  bg-white">
                            <button type="submit" class="btn bg-green mb-1">حفظ</button>
                            <a href="{{ url('/boursier/etudiant/profile') }}" class="btn bg-gray mb-1">السابق</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event, id) {
        image = document.getElementById(id);
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
