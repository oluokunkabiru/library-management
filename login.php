								<?php
								include('dbcon.php');
								if (isset($_POST['login'])){
								session_start();
								$student_no = $_POST['student_no'];
								$password = $_POST['password'];
								$query = "SELECT * FROM students WHERE student_no='$student_no' AND password='$password' and status = 'active' ";
								$result = mysqli_query($conn, $query)or die(mysqli_error());
								$num_row = mysqli_num_rows($result);
									$row=mysqli_fetch_array($result);
									if( $num_row > 0 ) {
										header('location:dasboard.php');
								$_SESSION['id']=$row['student_id'];
									}
									else{ 
								header('location:access_denied.php');
								}}
								?>

		<!DOCTYPE html>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="X-UA-Compatible" content="ie=edge">
			<title>Login</title>
		</head>
		<body>
			<form action="" method="post">
			<input type="text" name ="student_no" required> <br><br>
			<input type="password" name="password" id="password" required><br><br>
			<input type="submit" value="submit" name="login">
			</form>
		</body>
		</html>