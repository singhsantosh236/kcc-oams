<?php

    session_start();
    if( !isset($_SESSION['usernameF'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Course= $_POST['course'];
    $Semester= $_POST['semester'];
    $username= $_SESSION['usernameF'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select RollNo,Name from student where Course='$Course' and Semester='$Semester'";
    $q2="select Code,Name,Faculty from subject where Course='$Course' and Semester='$Semester' and Faculty='$username'";

    $result_q1=mysqli_query($conn,$q1);
    $num1=mysqli_num_rows($result_q1);

    $result_q2=mysqli_query($conn,$q2);
    $num2=mysqli_num_rows($result_q2);

    mysqli_close($conn);

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

    <!-- attendance table start -->
    <div class="form">
        <h2>Attendance Table for <br> <span style="color:grey; font-size:20px"><?php echo "$Course | Semester: $Semester"?></span></h2>
        <table id="table" cellspacing="5" cellpadding="5">
            <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Present</th>
            </tr>

            <?php

                for($i=0;$i<$num1;$i++)
                { 
                    $final_result_q1 =  mysqli_fetch_array($result_q1);
                    $roll = $final_result_q1['RollNo'];

            ?>

            <tr>
                <td> <label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['RollNo']; ?> </label> </td>
                <td> <label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['Name']; ?> </label> </td>
                <form action="submitAttendance.php" method="post">
                <td> <input style="cursor:pointer;" type='checkbox' name='present[]' value="<?php echo $roll; ?>" id='v<?php echo $i?>' ></td>  
            </tr>
            <?php

                }
            
            ?>
        </table>
        <input class="inputbox" type="text"> <br>
        <input type="submit" class="doneBtn" value="Done"> <!-- done button -->
        <!-- subject selection button start -->
        <select required id="userMode" name="subject">
            <option value="">Select Subject</option>
            <?php

                for($j=0;$j<$num2;$j++)
                {
                    $final_result_q2 = mysqli_fetch_array($result_q2);

            ?>
                <option value="<?php echo $final_result_q2['Code']; ?>"> <?php echo $final_result_q2['Name']; ?> </option>
            <?php
            
                }
            
            ?>
        </select>
        <!-- subject selection button end -->
        
        </form>
    </div>

    <!-- attendance table end -->

</body>
</html>