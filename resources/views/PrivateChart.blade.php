@extends('layouts.master')
<style>
    @media (min-width: 768px) {
        .modal-xl {
            width: 90%;
            max-width: 1200px;
        }
    }

</style>
@section('content')
    <div class="card" style="margin-right: 30px !important ; margin-left : 30px !important ;  margin-top : 40px !important">
        <div class="card-body">
            <h2 class="text-center " style="margin-top:5% !important ; margin-bottom : 7% !important  "><i
                class="fas fa-chart-pie"></i>
            صفحة الاحصائيـــــــــــــــــــــــات الخاصة 

        </h2>
        </div>
        <div class="card-body">
            <div class="card ">
                
                <div class="card-header mt-2 bg-white">
                    <form  action="" method="">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-2 col-lg-2 col-12 form-group">
                                <label for="parametre1"> البارامتر الاول
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                <select class="form-control" name="parametre1" >
                                    <option disbled selected> ادخل البارامتر الاول</option>
                                    <option value="الجهات"> الجهات</option>
                                    <option value="الاقاليم">الاقاليم</option>
                                </select>
                            </div>

                            <div class="col-xl-2 col-lg-2 col-12 form-group">
                                <label for="parametre2"> البارمتر الثاني
                            </div>
                            <div class="col-xl-4 col-lg-4 col-12 form-group">
                                <select class="form-control" name="parametre2" >
                                    <option disbled selected> ادخل البارامتر الثاني</option>
                                    <option  value="المرشحين">المرشحين</option>
                                    <option value="الطلبة الممنوحين">الطلبة الممنوحين</option>
                                </select>
                                
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="حفظ"/>
                    </form>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- PIE CHART -->

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">عدد المرشحين في كل جهة</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="myAreaChart"
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- PIE CHART -->

                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">عدد المرشحين في كل جهة</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id=""
                                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>

@endsection

<script src="{{ url('vendor/jquery.min.js') }}"></script>

<script src="{{ url('vendor/Chart.min.js') }}"></script>
{{-- <script src="{{ url('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --}}



<script>
    ( function ( $ ) {

var charts = {
    init: function () {
        // -- Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        this.ajaxGetRegionCandidatData();

    },

    ajaxGetRegionCandidatData: function () {
        var urlPath =  'http://' + window.location.hostname + '/test/chart';
        var request = $.ajax( {
            method: 'GET',
            url: "/test/chart"
    } );

        request.done( function ( response ) {
            console.log( response );
            charts.createCompletedJobsChart( response );
        });
    },

    /**
     * Created the Completed Jobs Chart
     */
    createCompletedJobsChart: function ( response ) {

        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: response.regions, // The response got from the ajax request containing all month names in the database
                datasets: [{
                    label: "Sessions",
                    lineTension: 0.3,
                    backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                    borderColor: "white",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
                    pointHitRadius: 20,
                    pointBorderWidth: 2,
                    data: response.candidat_count_data // The response got from the ajax request containing data for the completed jobs in the corresponding months
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio : false,
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: response.max, // The response got from the ajax request containing max limit for y axis
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                }
            }
        });
    }
};

charts.init();

} )( jQuery );
</script>