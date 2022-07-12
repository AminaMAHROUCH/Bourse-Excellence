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
            <h2 class="text-center " style="margin-top:5% !important ; margin-bottom : 7% !important  ">مؤسسة محمد السادس للنهوض بالأعمال الاجتماعية للقيمين الدينيين	
 <br>
 البوابة الخاصة بتدبير منحة التفوق	

            </h2>
        </div>
  </div>

@endsection

                <script src="{{ url('vendor/jquery.min.js') }}"></script>

                <script src="{{ url('vendor/Chart.min.js') }}"></script>
                <script src="{{ url('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

                <script src="{{ url('vendor/create-charts.js') }}"></script>
                <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script>
                    //- PIE CHART -
                    //-------------
                    // Get context with jQuery - using jQuery's .get() method.
                    var pieChartCanvas = $('#myAreaChart').get(0).getContext('2d')
                    var pieData = donutData;
                    var pieOptions = {
                        maintainAspectRatio: false,
                        responsive: true,
                    }
                    //Create pie or douhnut chart
                    // You can switch between pie and douhnut using the method below.
                    new Chart(pieChartCanvas, {
                        type: 'pie',
                        data: pieData,
                        options: pieOptions
                    })
                </script>
