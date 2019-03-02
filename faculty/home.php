<?php

    session_start();
    if( !isset($_SESSION['usernameF'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Portal | KCC | Faculty</title>
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
        <h2>Faculty: <span style="color:green;" ><?php echo $_SESSION['usernameF'] ?></span></h2>
    </div>
    <!-- user and logout end -->

    <!-- attendance selection start here -->
    <form action="markAttendance.php" id="markAttendance" method="POST" class=form>
        <h2>Select Class</h2>
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
        </select> <br>
        <input class="inputbox" type="text">
        <input type="submit" value="Open"> <!-- Open button -->

        &NegativeVeryThinSpace; &NegativeVeryThinSpace;

        <!-- faculty options start here -->
        <select id="userMode" onchange="facultyShow(this.value)">
            <option value="markAttendance">Mark Attendance</option>
            <option value="Student">View Attendance</option>
		</select>
        <!-- faculty options end here -->

    </form>
    <!-- attendance selection end here -->

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

        <!-- faculty options start here -->
        <select id="userMode" onchange="facultyShow(this.value)">
            <option value="Student">View Attendance</option>
            <option value="markAttendance">Mark Attendance</option>
		</select>
        <!-- faculty options end here -->

    </form>
    <!-- view student attendance end -->

    <script>
        var markAttendance=document.getElementById("markAttendance");
        var studentLogin=document.getElementById("studentLogin");

        markAttendance.style.display="inline-block";
        studentLogin.style.display="none";

        function facultyShow(val)
        {
            if (val=='Student') {
                markAttendance.style.display="none";
                studentLogin.style.display="inline-block";
            }
            else {
                markAttendance.style.display="inline-block";
                studentLogin.style.display="none";
            }
        }
    </script>
</body>
</html>