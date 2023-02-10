<?php include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Attendance System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&family=Shizuru&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">






<!-- sql to google chart -->





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Name of Student ', 'Present Days'],
          <?php


//  yo table name ho--------------------------
            $query="select * from student_attendance_final";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $NAME=$data['NAME'];
              $Att=$data['Att'];
              
           ?>
           ['<?php echo $NAME;?>',<?php echo $Att;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Student Info',
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          },
          bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<!-- // --------------------------------------------------------- -->



</head>
<body>
   
<h3><strong>Visualized Student Data</strong></h3>

<div class="container">
<div class="row">
<div class="col-1"></div>
<div class="col-10">

  <div id="barchart_material" class="visually" style="width: 900px; height: 700px;"></div>
</div>
<div class="col-1"></div>
</div>
</div>









</body>
</html>