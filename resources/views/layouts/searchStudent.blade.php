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
                        @if (count($searchResult) == 0)
                            <h2 class="text-danger"> المعذرة , <b>"{{ $mot }}"</b> لا توجد , أو تبحث بparametre
                                الخطأ
                            </h2>
                        @else
                            <h2 class="text-green"> {{ count($searchResult) }} : هو عدد تكرار
                                <b>"{{ $mot }}"</b>
                            </h2>
                            <hr />
                            <table id="example100" class="table table-bordered table-striped">
                                <tr>
                                    <th>ر.ق.م</th>
                                    <th>الاسم الكامل بالعربية</th>
                                    <th>رقم مسار</th>
                                    <th>الفوج</th>
                                    <th>الحالة</th>
                                    <th class="text-center">عرض</th>
                                </tr>
                                @foreach ($searchResult as $sr)
                                    <tr>
                                        <td> {{ $sr->cni }} </td>
                                        <td> {{ $sr->nom_prenomArab }} </td>
                                        <td> {{ $sr->cne }} </td>
                                        <td> {{ $sr->promotion }} </td>
                                        <td> {{ $sr->status }} </td>
                                        <td class="text-center"><a
                                                href="{{ url('boursier/detailSearch/' . $sr->cni) }}"><i
                                                    class="fas fa-eye text-info"></i></a></td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(function() {
        $("#example100").DataTable();
    });
</script>
