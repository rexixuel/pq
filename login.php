<?php

//temporary login handler
$username = $_POST["username"];

if($username == "admin")
{
	header('Location: admin-dashboard.php');
}
else
	if($username == "moderator")
	{
		header('Location: mod-dashboard.php');
	}
	else
		if($username == "user")
		{
			header('Location: index-mock-reg-user.php');
		}
?>