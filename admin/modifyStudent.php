<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');
    
    $newSem=$_POST['newSem'];

    if (isset($_POST['updateBTN']))
    {
        if(!empty($_POST['modify']))
        {
            foreach ($_POST['modify'] as $roll)
            {
                $q1="update student set Semester='$newSem' where RollNo='$roll'";
                mysqli_query($conn,$q1);
            }
        }
    }
    else
    if (isset($_POST['deleteBTN']))
    {
        if(!empty($_POST['modify']))
        {
            foreach ($_POST['modify'] as $roll)
            {
                $q1="delete from student where RollNo='$roll'";
                mysqli_query($conn,$q1);
            }
        }
    }    
    mysqli_close($conn);
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC | Admin</title>
    <link rel="shortcut icon" type="image/jpg" href="../main/logo.jpg">
</head>
<body>
    <script>
        alert("Student Record Updated Successfully!");
    </script>
    <?php echo"<script>window.location='http://localhost/ams/admin/home.php'</script>" ?>
</body>
</html>