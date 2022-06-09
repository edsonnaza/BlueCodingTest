@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <h2>Ranking Web Visited</h2>
                     <div id="chart_div" ></div>
                

                </div>
            </div>
        </div>
    </div>
</div>

 <script type="text/javascript">
 // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['bar']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);
      
    function drawChart() {
        var base = "127.0.0.1:8000/";
        var url = base + "api/programs";
        var jsonData = $.ajax({
          url: "api/programs",
          dataType: "json",
          async: false
          }).responseText;
          
      // Create our data table out of JSON data loaded from server.
      var data = new google.visualization.DataTable(jsonData);
         var options = {
          width: 800,
          legend: { position: 'none' },
          chart: {
            title: 'Chess opening moves',
            subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'top', label: 'White to move'} // Top x-axis.
            }
          },
          bar: { groupWidth: "90%" }
        };
        //var_dump($data);
      // Instantiate and draw our chart, passing in some options.
       var chart = new google.charts.Bar(document.getElementById('chart_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    
    </script>
@endsection