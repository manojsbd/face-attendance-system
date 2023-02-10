<?php
$conn = mysqli_connect("localhost","root","","face_attendance_system");
if (isset($_POST["import"])){
    $fileName= $_FILES["file"]["tmp_name"];
    if($_FILES["file"]["size"] > 0){
        $file= fopen($fileName, "r");
        while(($column= fgetcsv($file,10000,",")) !== FALSE){
            $sqlInsert= "Insert into student_attendance(Name,Attendance) values ('".$column[0]."','".$column[1]."')";
            $result=mysqli_query($conn,$sqlInsert);
           }
                                    }
}
?> 
<!-- ----------------------------------------------------------------------------------------------------------- -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    <title>Face Attendance System</title>
</head>
<body>
    <div class="container">
        <div class="col-3"></div>
        <div class="col-6 csvcontainer">

            <h1>Upload CSV File</h1>

            <!-- csv wala-------------------------------------------------------------------------------------------------------------- -->
        <form class="form-horizontal" action="" method="post" name="uploadCsv" enctype="multipart/form-data">
        <div>
        <label>Choose todays attendance</label>
        <input type="file" name="file" accept=".csv">
        <button class="btn" type="submit" name="import">Upload to Database</button>
        <button class="btn btn-light" onclick="myfunccsv()"> Proceed to Attendance</button>

        </div>
        </form>
        






      






        <!-- ----------------------------------------------------------------------------------------------------------- -->
        

        </div>
        <div class="col-3"></div>
   
</div>

















<script>
    function myfunccsv(){
       
    
       
            window.open('studenttime.php'); 
       
    }
        </script>
</body>
</html>