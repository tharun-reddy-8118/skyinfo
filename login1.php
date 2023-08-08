<?php
	session_start();
	include("connection.php");
	include("function.php");

	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		//Something was posted
		$email=$_POST['email'];
		$password=$_POST['password'];
 	
		if(!empty($email) && !empty($password))
		{
			//save to database.

			$query="select *from users where email= '$email' limit 1";
			$result=mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data=mysqli_fetch_assoc($result);
					if($user_data['password']=== $password)
					{
						$_SESSION['email']= $user_data['email'];
						header("Location:test.php");
						die;
					}
				}
			}
			else
			{
				echo "Wrong email or password.";
			}

		}
		else
		{
			echo "Wrong email or password.";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="login-body">
	<img src="logo3.png" class="logo">
	<div id="login-box" style="color:blue;">
	<p>Login to your account</p>

	<form id="login-form" method="post">
		<label>Email Address</label><br>
		<input type="email" name="email" placeholder="you@gmail.com" class="text-box" required><br>
		<label>Password</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<a href="./forgot.php"><label id="forgot">I forgot my password</label></a><br>
		<input type="password" placeholder="Password" name="password" class="text-box"><br>
		<input type="checkbox"><label>keep me logged in</label><br>
		<input  type="submit" value="sign in" class="sign-in-btn">
	</form>
</div>
	 <p class="sin">Don't have account yet? <a href="signup1.php">Sign up</a></p>
</body>
</html>