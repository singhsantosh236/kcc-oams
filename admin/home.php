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

    <!-- view student attendance start -->
    <form action="viewAttendance.php" id="studentLogin" method="POST" class="form">
		<h2>View Student Attendance</h2>
        <select name="course" class="choice" required>
            <option value="">Course</option>
            <option value="BScIT">BScIT</option>
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
        </select> <br> <br>
		<input class="inputbox" type="date" name="date" required>
		<input type="submit" value="View"> <!-- view button -->

        &NegativeVeryThinSpace; &NegativeVeryThinSpace;

        <!-- admin tasks start here -->
        <select id="userMode" onchange="javascript:location.href = this.value;">
            <option value="#">View Attendance</option>
            <option value="addStudent.php">Add Student</option>
            <option value="viewStudent.php">View Student</option>
            <option value="addFaculty.php">Add Faculty</option>
            <option value="viewFaculty.php">View Faculty</option>
            <option value="addSubject.php">Add Subject</option>
            <option value="viewSubject.php">View Subject</option>
        </select>
        <!-- admin tasks end here -->

    </form>
    <!-- view student attendance end -->
    
</body>
</html>