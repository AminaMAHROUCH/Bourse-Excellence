{{-- @if (session()->has('Alert'))
    <script>
        alert('الرجاء تحديد مرشح واحد على الأقل');
    </script>
@endif --}}


@extends('layouts.master')

<style>
    .card-header {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

</style>
@section('content')
    <div class="card mt-3 ">
        <div class="card-header">
            <h5 class="mr-3 my-3 bg-white"> نتائج البحث</h5>
        </div>
        <hr class="titre ml-2 mr-2">
        <div class="card ml-2 mr-2">
            <div class="card-body ">
                <div class="card ">
                    <div class="card-body">
                        @if (isset($searchResults))
                            @if ($searchResults->isEmpty())
                                <h2 class="text-danger"> المعذرة , <b>"{{ $searchterm }}"</b> لا توجد </h2>
                            @else
                                <h2 class="text-green"> {{ $searchResults->count() }} : هو عدد تكرار
                                    <b>"{{ $searchterm }}"</b>
                                </h2>
                                <hr />
                                <table id="example10" class="table table-bordered table-striped">
                                    <tr>
                                        <th>اللوائح</th>
                                        <th>الموقع</th>
                                    </tr>
                                    @foreach ($searchResults->groupByType() as $type => $modelSearchResults)
                                        <tr>
                                            <td class="text-bold">
                                                @if (ucwords($type) == 'Be_candidatures')
                                                    <p>لائحة المرشحين</p>
                                                @elseif(ucwords($type) == 'Be_users')
                                                    <p>لائحة المستعملين</p>
                                                @elseif(ucwords($type) == 'Be_actualite')
                                                    <p>لائحة الاعلانات</p>
                                                @elseif(ucwords($type) == 'Be_adherent')
                                                    <p> القيم(ة) الديني(ة)</p>
                                                @elseif(ucwords($type) == 'Be_exceptions')
                                                    <p>جدول الاستثناءات</p>
                                                @elseif(ucwords($type) == 'Be_formations')
                                                    <p>لائحة دورات تكوينية</p>
                                                @elseif(ucwords($type) == 'Be_reclamations')
                                                    <p>جدول الشكاية</p>
                                                @elseif(ucwords($type) == 'Be_renouvellements')
                                                    <p>لائحة اعادة التسجيل</p>
                                                @elseif(ucwords($type) == 'Be_stages')
                                                    <p>لائحة التدريات</p>
                                                @elseif(ucwords($type) == 'Be_students')
                                                    <p>لائحة الطلبة</p>
                                                @elseif(ucwords($type) == 'Be_etudiant_boursiers')
                                                    <p>لائحة الممنوحين</p>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($modelSearchResults as $searchResult)
                                                    <a href="{{ $searchResult->url }}">{{ $searchResult->url }}</a><br>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $("#example10").DataTable();
        });
    </script>
@endsection
