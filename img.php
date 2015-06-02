<?php

	if (session_status() == PHP_SESSION_NONE) {
		session_start();		
	}

	include ('/include/pqControl.php');

	$element = new elementControl();
	$bannerId = $_SESSION['bannerId'];

	$banner = $element->GetImage($bannerId);
    
	header("Content-type: ".$banner->type);    
    /*** output the image ***/
    print $banner->image;

?>