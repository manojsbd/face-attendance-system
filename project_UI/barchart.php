<?php include "db.php";?>
<html>
  <head>
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
  </head>
  <body>
    <!-- put this whereever you want---------------------- -->
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

