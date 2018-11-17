

<!-- Page Header -->
<header class="masthead" style="background-image: url('img/about-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Report</h1>
              <span class="subheading">This is what I do.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <button type="button" onclick="getData()">Fetch</button>
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
        </div>
      </div>
    </div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      var mydata = [
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ];

      function drawChart() {
        var data = google.visualization.arrayToDataTable(mydata);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      function getData() {

        $.ajax({
                    method: "POST",
                    url: "<?=base_url('api/report_api')?>"
                })
                .done(function( msg ) {
                   var result = JSON.parse(msg);
                   mydata = result;
                   drawChart();
                });

      }
    </script>