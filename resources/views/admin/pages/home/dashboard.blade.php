@extends('layouts.master')

<style>
.visit {
    color: orange !important;
    font-weight: bold;
    text-transform: uppercase;
}
</style>

@section('content')

<!-- All Notice Area Start Here -->
<div class="card height-auto" style="margin-top: 5% !important">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>الاعلانات</h3>
            </div>
        </div>
        @foreach ($ligne as $item)
        @if ($item->read)
        <div class="row" data-toggle="modal" data-backdrop="static" data-keyboard="false"
            data-target="#example-{{ $item->id }}">
            <div class="col-lg-12">
                <div class="notice-board-wrap">
                    <div class="notice-list">
                        <div class="post-date bg-skyblue">{{ $item->created_at->format('d:m:Y') }}</div>
                        <h6 class="visit">{{ $item->title }}</h6>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row" data-toggle="modal" data-backdrop="static" data-keyboard="false"
            data-target="#example-{{ $item->id }}">
            <div class="col-lg-12">
                <div class="notice-board-wrap">
                    <div class="notice-list">
                        <div class="post-date bg-skyblue">{{ $item->created_at->format('d:m:Y') }}</div>
                        <h6 class="notice-title">{{ $item->title }}</h6>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        <div class="row ">
            <div class="col-lg-12 text-center">
                {{ $ligne->links() }}
            </div>
        </div>
    </div>
</div>
<!-- All Notice Area End Here -->
<div class="container-fluid" style="margin-top: 40px !important">
    <div class="row">
        <div class="col-lg-6">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1" style="margin-bottom: 30px !important ;">
                        <div class="item-title " style="margin-top: 40px !important ;">
                            <h3 style="text-align: center !important">طلب التدريب </h3>
                        </div>
                    </div>
                    <form class="new-added-form" action="{{ route('stageDash') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label> نوعه</label>
                                <input type="text" class="form-control" name="type_s">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label> المدينة</label>
                                <input type="text" class="form-control" name="ville_s">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label> من</label>
                                <input type="date" placeholder="" class="form-control" name="debut">
                            </div>
                            <div class="col-12-xxxl col-lg-6 col-12 form-group">
                                <label> الى</label>
                                <input type="date" class="form-control" name="fin_s">
                            </div>
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>تفاصيل</label>
                                <textarea class="textarea form-control" name="explication_s" id="form-message" cols="10"
                                    rows="7"></textarea>
                            </div>

                            <div class="col-12 form-group mg-t-8">
                                <button type="submit"
                                    class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">حفظ</button>
                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">مسح</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card height-auto">
                <div class="card-body">
                    <div class="heading-layout1" style="margin-bottom: 30px !important ;">
                        <div class="item-title " style="margin-top: 40px !important ;">
                            <h3 style="text-align: center !important">دورات تكونية</h3>
                        </div>
                    </div>
                    <form class="new-added-form" action="{{ route('formationDash') }}" method="POST">

                        <div class="row">
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label> نوعها</label>
                                <input type="text" placeholder="" class="form-control" name="type_f">
                            </div>
                            <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                <label>تفاصيل</label>
                                <textarea class="textarea form-control" name="detail_f" id="form-message" cols="10"
                                    rows="12"></textarea>
                            </div>

                            <div class="col-12 form-group mg-t-8">
                                <button type="submit"
                                    class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">حفظ</button>
                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">مسح</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@foreach ($ligne as $item)
<div class="modal fade" id="example-{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                <h2 class="modal-title text-center" id="exampleModalLabel">فحوى الاعلان</h2>
            </div>
            <div class="modal-body">
                <form class="new-added-form" action="{{ url('actualite/' . $item->id) }}" method="post"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        {{-- <div class="col-12-xxxl col-lg-12 col-12 form-group">
                                    <textarea class="textarea form-control" name="explication_s" id="form-message" cols="10"
                                        rows="14">{{ $item->explication }}</textarea>
                    </div> --}}
                    <div class="col-12-xxxl col-lg-12 col-12">
                        {!! $item->content !!}
                    </div>
                    <div class="col-12 form-group mg-t-8">
                        <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">الغاء</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach
{{-- <script>
        $(document).ready(function() {
            $("a").click(function() {
                $(this)
                    .css('color', '#EE178C')
                    .siblings()
                    .css('color', '#ffffff');
            });
        });

    </script> --}}
@endsection