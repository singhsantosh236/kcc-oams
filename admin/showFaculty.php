<?php

    session_start();
    if( !isset($_SESSION['usernameA'] ) )  
    {
        header('location:http://localhost/ams/main/index.php');
    }

    $Department= $_POST['department'];

    $conn= mysqli_connect('localhost','uttam','uttam123');
    mysqli_select_db($conn,'KCC_db');

    $q1="select * from faculty where Department='$Department'";
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
        <h1>Faculty Record</h1>
        <h2><?php echo "Department: $Department"?></h2>
    </div>

</head>
<body>
        <table class="table" cellspacing="5" cellpadding="5">
            <tr>
                <th style="font-size:25px;"><u>Name</u></th>
                <th style="font-size:25px;"><u>Qualification</u></th>
                <th style="font-size:25px;"><u>Mobile</u></th>
                <th style="font-size:25px;"><u>UserID</u></th>
                <th style="font-size:25px;"><u>Password</u></th>
                <th style="font-size:25px;"><u>Select</u></th>
            </tr>

            <?php

                for($i=0;$i<$num1;$i++)
                { 
                    $final_result_q1 =  mysqli_fetch_array($result_q1);
                    $userid = $final_result_q1['UserID'];

            ?>

            <tr>
                <td><label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['Name']; ?> </label></td>
                <td> <?php echo  $final_result_q1['Qualification']; ?> </td>
                <td> <?php echo  $final_result_q1['Mobile']; ?> </td>
                <td><label for="v<?php echo $i?>" style="cursor:pointer;"> <?php echo  $final_result_q1['UserID']; ?> </label></td>
                <td> <?php echo  $final_result_q1['Password']; ?> </td>
                <form action="modifyFaculty.php" method="POST">
                <td> <input style="cursor:pointer;" type='checkbox' name='delete[]' value="<?php echo $userid; ?>" id='v<?php echo $i?>' ></td>  
            </tr>
            <?php

                }
            
            ?>
        </table>
        <div class="actions">
            <input type="submit" class="" name="action" value="Delete" />
        </div>
</body>
</html>