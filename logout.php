<?php

session_start();

if(isset($_SESSION['user_id']))
{
	unset($_SESSION['user_id']);

}

session_unset(); // remove all stored values in session variables
session_destroy(); // Destroys all data registered to a session
session_write_close(); // End the current session and store session data.
setcookie(session_name(),'',0,'/'); // Send Cookie to client web browser.
header("Location: login.php");
die;