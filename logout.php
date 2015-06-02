<?php

	include ('/include/pqControl.php');
	session_start();
	$userControl = new userControl();

	$userControl->Logout();


?>