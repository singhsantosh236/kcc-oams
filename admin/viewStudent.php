<?php
session_start();
if( !isset($_SESSION['usernameA'] ) )  
{
    header('location:http://localhost/ams/main/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC | Admin</title>
    <link rel="stylesheet" href="../main/index.css">
    <link rel="shortcut icon" type="image/jpg" href="../main/logo.jpg">
</head>
<body>
    <img src="../main/logo.jpg">

    <!-- user and logout start -->
    <div id="goBack" onclick="window.history.back();">
        <h2 style="text-align:center;margin-top:19px"><< Go Back</h2>
    </div>
    <div id="logout" onclick="javascript:location.href='../main/logout.php'">
        <h2 style="text-align:center;margin-top:19px">Logout</h2>
    </div>
    <div id="user">
        <h2>Admin: <span style="color:green;" ><?php echo $_SESSION['usernameA'] ?></span></h2>
    </div>
    <!-- user and logout end -->

    <form action="showStudent.php" class="form" method="POST">
        <select name="course" class="choice" required>
            <option value="">Course</option>
            <option value="BScIT">BscIT</option>
            <option value="BCA">BCA</option>
        </select> <br> <br>
        <select name="semester" class="choice" required>
            <option value="">Semester</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select> <br>
        <input class="inputbox" type="text">
        <input type="submit" class="doneBtn" value="View">
    </form>
</body>
</html>