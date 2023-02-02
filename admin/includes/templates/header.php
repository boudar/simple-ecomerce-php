<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="../admin/layouts/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../admin/layouts/images/shopping-cart.png">
    <link rel="stylesheet" href="../admin/layouts/css/styles.css" />
    <title>Admin Panel</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          ['2004',  1000      ],
          ['2005',  1170      ],
          ['2006',  660      ],
          ['2007',  1030      ]
        ]);

        var options = {
          title: 'Market Visites',
          curveType: 'function',
          legend: { position: 'center' },
          backgroundColor: { fill:'transparent' },
          lineWidth: 5,
          series: {
            0: { color: '#d0ff00' },
          }

        };

    
        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
        // chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>


