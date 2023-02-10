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
  

<h3><strong>Student Time Record</strong></h3>




<div class="container">
    <div class="col-lg-12">
    <br><br>
    
    
<!-- arko table -->


<table  id="tabledata" class=" table table-striped table-hover table-bordered">
    
    <tr>
    
    <th>Name</th>
    
    <th>Attendance Time</th>
    
   
   
   
    </tr >
   
    <?php
   
    include 'connection.php'; 
    $q = "select * from student_attendance";
   
    $query = mysqli_query($con,$q);
   
    while($res = mysqli_fetch_array($query)){
    ?>
    <tr class="text-center">
    <td> <?php echo $res['Name'];  ?> </td>
    <td> <?php echo $res['Attendance'];  ?> </td>
    
    
   
    </tr>
   
    <?php 
    }
     ?>
    
    </table>  

    <button class="btn btn-light centerbutton" onclick="myfunc1()"> Proceed to Attendance</button>

<script>
        function myfunc1(){
           
        
           
                window.open('studentattend.php'); 
           
        }
            </script>
</body>
</html>