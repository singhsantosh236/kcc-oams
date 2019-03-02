<?php
    
    $usernameA = $_POST['usernameA'];
    $passwordA = $_POST['passwordA'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select * from admin where UserID='$usernameA' and Password='$passwordA'";
    $result = mysqli_query($conn,$q1);
    $num = mysqli_num_rows($result);
    if($num==1)
    {
        header('location:http://localhost/ams/admin/home.php');
        session_start();
        $_SESSION['usernameA'] = $usernameA; 
    }
    else
    {

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
        alert("UserID or/and Password Incorrect! Retry!!");
    </script>
    <?php echo"<script>window.location='http://localhost/ams/main/index.php'</script>" ?>
</body>
</html>

<?php

    }
    mysqli_close($conn);

?>