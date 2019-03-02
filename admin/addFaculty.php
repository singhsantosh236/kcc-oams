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

    <!-- add faculty form start here -->
    <form action="submitFaculty.php" id="addFaculty" class="form" method="POST">
        <h2>Add Faculty</h2> <br>
        <input class="inputbox" type="text" name="name" required placeholder="Name"> <br>
        <input class="inputbox" type="text" name="qualification" required placeholder="Qualification"> <br>
        <input class="inputbox" type="text" name="mobile" required placeholder="Mobile"> <br>
        <input class="inputbox" type="text" name="userid" required placeholder="UserID"> <br>
        <input class="inputbox" type="password" name="password" required placeholder="Password"> <br>
        <select name="department" class="choice" required>
            <option value="">Department</option>
            <option value="IT">IT</option>
            <option value="CA">CA</option>
        </select> <br>
        <input class="inputbox" type="text">
        <input type="submit" value="Submit"> <br> <!-- submit button -->
        
        &NegativeVeryThinSpace; &NegativeVeryThinSpace;
        
        <!-- admin tasks start here -->
        <select id="userMode" onchange="javascript:location.href = this.value;">
        <option value="#">Add Faculty</option>
            <option value="viewFaculty.php">View Faculty</option>
            <option value="addStudent.php">Add Student</option>
            <option value="viewStudent.php">View Student</option>
            <option value="addSubject.php">Add Subject</option>
            <option value="viewSubject.php">View Subject</option>
            <option value="home.php">View Attendance</option>
        </select>
        <!-- admin tasks end here -->

    </form>
    <!-- add faculty form end here -->

</body>
</html>