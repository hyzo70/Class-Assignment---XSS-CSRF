<?php 
session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = htmlspecialchars($_POST['user_name']);
		$email = htmlspecialchars($_POST['email']);
		$password = htmlspecialchars($_POST['password']);

		if(!empty($email) && !empty($password))
		{
			$password_hash = sha512 ($password);
			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,email,password) values ('$user_id','$user_name','$email','$password_hash')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
		<meta http-equiv="Content-Security-Policy" content="default-src 'self'; img-src 'self'; script-src 'self'; style-src 'self';">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="signup.css">
    </head>
    <body>
        
        <div id="form">
            <h1>Sign Up</h1>
            <form onsubmit="isvalid()" method="POST" autocomplete="off">
				<label>Full Name: </label>
                <input type="text" id="user_name" name="user_name" pattern="^[a-zA-Z]+(?: [a-zA-Z]+(?: [a-zA-Z]+(?: (?:bin|ibn) )*[a-zA-Z]+)*)*(?: @ [a-zA-Z]+)?$" required></br></br>
                <label>Email: </label>
                <input type="email" id="email" name="email" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required></br></br>
                <label>Password: </label>
                <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$" required></br></br>
                <input type="submit" id="btn" value="Sign Up"><br><br>
				<a href="login.php">Click to Login</a><br><br>
            </form>
        </div>
        <script src="login.js"></script>
    </body>
</html>