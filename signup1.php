<?php
	session_start();
	include("connection.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		//Something was posted
		$email=$_POST['email'];
		$password_1 =  $_POST['password_1'];
  		$password_2 =  $_POST['password_2'];

		 if($password_1 != $password_2) {
			echo "The two passwords do not match";
 		 }
 		$password =md5($password_1);//encrypt the password before saving in the database
 		//echo $email;
 		//echo $password;
		if(!empty($email) && !empty($password))
		{
			//save to database.
			//echo "hello";
			$sql="insert into users (email,password) values('$email','$password_1')";
			mysqli_query($con,$sql);

			header("Location:login1.php");
			die;
		}else
		{
			echo "please enter some valid information.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="signup-body">
	<img src="logo3.png" class="logo">
	<div id="signup-box">
        <p>Sign up for SKYINFO</p>
        <form id="login-form" method="post">
            <label>Email Address</label><br>
            <input type="email" name="email" placeholder="you@gmail.com" class="text-box" required><br>
            <label>Password</label><br>
            <input type="password" name="password_1" placeholder="Your Password" class="text-box" required>
            <label>Confirm Password</label><br>
            <input type="password" name="password_2" placeholder="Confirm your password" class="text-box" required>
            <input type="checkbox">I've read and agree to the <label class="sp">terms of services</label><br>
            <input  type="submit" value="sign in" class="sign-in-btn">

        </form>
    </div>
    <p class="sin2">Already have account?<a href="login1.php">Sign in</a></p>

</body>
</html>