<?php

    session_start();
    if( !isset($_SESSION['usernameF'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }
    
    $subject=$_POST['subject'];

    if(!empty($_POST['present']))
    {
        foreach ($_POST['present'] as $data)
        {
            
            $conn= mysqli_connect('localhost','uttam','uttam123');
            mysqli_select_db($conn,'KCC_db');
    
            $q1="insert into attendance(RollNo,Subject,Date) values('$data','$subject',CURDATE() )";
    
            mysqli_query($conn,$q1);
        
            mysqli_close($conn);

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC | Faculty</title>
    <link rel="shortcut icon" type="image/jpg" href="../main/logo.jpg">
</head>
<body>
    <script>
        alert("Attendance Recorded Successfully!");
    </script>
    <?php echo"<script>window.location='http://localhost/ams/faculty/home.php'</script>" ?>
</body>
</html>