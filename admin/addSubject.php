<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select Name,UserID from faculty";
    $result_q1=mysqli_query($conn,$q1);
    $num=mysqli_num_rows($result_q1);

    mysqli_query($conn,$q1);

    mysqli_close($conn);
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

    <!-- add subject form start here -->
    <form action="submitSubject.php" id="addSubject" class="form" method="POST">
        <h2>Add Subject</h2> <br>
        <input class="inputbox" type="text" name="code" required placeholder="Subject Code"> <br>
        <input class="inputbox" type="text" name="name" required placeholder="Subject Name"> <br>
        <select name="course" class="choice" required>
            <option value="">Course</option>
            <option value="BScIT">BScIT</option>
            <option value="BCA">BCA</option>
        </select> <br> <br>
        <select name="semester" class="choice" required>
            <option value="none">Semester</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select> <br> <br>
        <select name="faculty" class="choice" required>
            <option value="none">Faculty</option>
            <?php

                for($i=0;$i<$num;$i++)
                {
                    $final_result_q1 = mysqli_fetch_array($result_q1);

            ?>
                <option value="<?php echo $final_result_q1['UserID']; ?>"> <?php echo $final_result_q1['Name']; ?> </option>
            <?php
            
                }
            
            ?>
        </select> <br>
        <input class="inputbox" type="text">
        <input type="submit" value="Submit"> <br> <!-- submit button -->
        
        &NegativeVeryThinSpace; &NegativeVeryThinSpace;

        <!-- admin tasks start here -->
        <select id="userMode" onchange="javascript:location.href = this.value;">
            <option value="#">Add Subject</option>
            <option value="viewSubject.php">View Subject</option>
            <option value="addStudent.php">Add Student</option>
            <option value="viewStudent.php">View Student</option>
            <option value="addFaculty.php">Add Faculty</option>
            <option value="viewFaculty.php">View Faculty</option>
            <option value="home.php">View Attendance</option>
        </select>
        <!-- admin tasks end here -->

    </form>
    <!-- add subject form end here -->

</body>
</html>