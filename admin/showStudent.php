<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Course= $_POST['course'];
    $Semester= $_POST['semester'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select * from student where Course='$Course' and Semester='$Semester'";
    $result_q1=mysqli_query($conn,$q1);
    $num1=mysqli_num_rows($result_q1);

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

    <div class="title">
        <h1>Student Record</h1>
        <h2><?php echo "Course: $Course"?></h2>  
        <h2><?php echo "Semester: $Semester"?></h2> 
    </div>

</head>
<body>
        <table class="table" cellspacing="5" cellpadding="5">
            <tr>
                <th style="font-size:25px;"><u>Roll</u></th>
                <th style="font-size:25px;"><u>Name</u></th>
                <th style="font-size:25px;"><u>Course</u></th>
                <th style="font-size:25px;"><u>Semester</u></th>
                <th style="font-size:25px;"><u>Mobile</u></th>
                <th style="font-size:25px;"><u>Select</u></th>
            </tr>

            <?php

                for($i=0;$i<$num1;$i++)
                { 
                    $final_result_q1 =  mysqli_fetch_array($result_q1);
                    $roll = $final_result_q1['RollNo'];

            ?>

            <tr>
                <td><label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['RollNo']; ?> </label></td>
                <td><label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['Name']; ?> </label></td>
                <td> <?php echo  $final_result_q1['Course']; ?> </td>
                <td> <?php echo  $final_result_q1['Semester']; ?> </td>
                <td> <?php echo  $final_result_q1['Mobile']; ?> </td>
                <form action="modifyStudent.php" method="post">
                <td> <input style="cursor:pointer;" type='checkbox' name='modify[]' value="<?php echo $roll; ?>" id='v<?php echo $i?>' ></td>  
            </tr>
            <?php

                }
            
            ?>
        </table>
        <div class="actions">
            <input type="text" name="newSem" placeholder="New Semester">
            <input type="submit" class="" name="updateBTN" value="Update" />
            <input type="submit" class="" name="deleteBTN" value="Delete" />
        </div>
</body>
</html>