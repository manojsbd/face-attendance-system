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
</head>
<body>
  






<h3><strong>Student Presence Record</strong></h3>
<div class="container">
    <div class="col-lg-12">
    <br><br>
    
    <table  id="tabledata" class=" table table-striped table-hover table-bordered">
    
    <tr>
    
    <th>Name</th>
    
    <th>Attendance Till Now</th>
    
   
   
   
    </tr >
   
    <?php
   
    include 'connection.php'; 
    $q = "select * from student_attendance_final";
   
    $query = mysqli_query($con,$q);
   
    while($res = mysqli_fetch_array($query)){
    ?>
    <tr class="text-center">
    <td> <?php echo $res['NAME'];  ?> </td>
    <td> <?php echo $res['Att'];  ?> </td>
    
    
    <!-- <td> <button class="btn-secondary btn"> <a href="delete.php?id=<?php echo $res['passenger_id']; ?>" class="text-white"> Cancel Flight </a>  </button> </td> -->
   
    </tr>
   
    <?php 
    }
     ?>
    
    </table>  
   

    <button class="btn btn-light centerbutton" onclick="myfunc2()"> Render Student Visuliazed Data</button>

<script>
        function myfunc2(){
           
        
           
                window.open('visual.php'); 
           
        }
            </script>


</body>
</html>