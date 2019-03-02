<?php

	session_start();
	if( isset($_SESSION['usernameF'] ) )  
	{
		header('location:http://localhost/ams/faculty/home.php');
	}
	else 
	if ( isset($_SESSION['usernameA'] ) )
	{
		header('location:http://localhost/ams/admin/home.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Attendance Portal | KCC</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="shortcut icon" type="image/jpg" href="logo.jpg">
</head>
<body>
	<img src="logo.jpg">

	<!-- admin login start -->
	<form action="../admin/login_validate_admin.php" id="adminLogin" method="POST" class="form">
		<h2>Admin Login </h2>
		<input class="inputbox" type="text" name="usernameA" required placeholder="Username">
		<input class="inputbox" type="password" name="passwordA" required placeholder="Password">
		<br>
		<input type="submit" value="Login"> <!-- login button -->
		
		&NegativeVeryThinSpace; &NegativeVeryThinSpace;

		<!-- user selection start here -->
		<select id="userMode" onchange="loginShow(this.value)">
				<option value="Student">Student</option>
				<option value="Faculty">Faculty</option>
				<option value="Admin">Admin</option>
		</select>
		<!-- user selection end here -->

	</form>
	<!-- admin login end -->

	<!-- faculty login start -->
	<form action="../faculty/login_validate_faculty.php" id="facultyLogin" method="POST" class="form">
		<h2>Faculty Login</h2>
		<input class="inputbox" type="text" name="usernameF" required placeholder="Username">
		<input class="inputbox" type="password" name="passwordF" required placeholder="Password">
		<br>
		<input type="submit" value="Login"> <!-- login button -->
		
		&NegativeVeryThinSpace; &NegativeVeryThinSpace;

		<!-- user selection start here -->
		<select id="userMode" onchange="loginShow(this.value)">
				<option value="Student">Student</option>
				<option value="Faculty">Faculty</option>
				<option value="Admin">Admin</option>
		</select>
		<!-- user selection end here -->

	</form>
	<!-- faculty login end -->

	<!-- check attendance start -->
	<form action="checkAttendance.php" id="studentLogin" method="POST" class="form">
		<h2>Check Student Attendance</h2>
		<input class="inputbox" type="text" name="rollno" required placeholder="Roll No.">
		<br>
		<input type="submit" value="Check"> <!-- check button -->
		
		&NegativeVeryThinSpace; &NegativeVeryThinSpace;

		<!-- user selection start here -->
		<select id="userMode" onchange="loginShow(this.value)">
				<option value="Student">Student</option>
				<option value="Faculty">Faculty</option>
				<option value="Admin">Admin</option>
		</select>
		<!-- user selection end here -->

	</form>
	<!-- check attendance end -->

	<script>
			var adminLogin=document.getElementById("adminLogin");
			var facultyLogin=document.getElementById("facultyLogin");
			var studentLogin=document.getElementById("studentLogin");
		
			adminLogin.style.display="none";
			facultyLogin.style.display="none";
			studentLogin.style.display="inline-block";
		
			function loginShow(val){
				if(val=='Admin'){
					adminLogin.style.display="inline-block";
					facultyLogin.style.display="none";
					studentLogin.style.display="none";
				}
				else if(val=='Faculty'){
					adminLogin.style.display="none";
					facultyLogin.style.display="inline-block";
					studentLogin.style.display="none";
				}
				else{
					adminLogin.style.display="none";
					facultyLogin.style.display="none";
					studentLogin.style.display="inline-block";
				}
			}
	</script>
</body>
</html>