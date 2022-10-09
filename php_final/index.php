<?php

session_start();

	include_once('connect.php'); 

	if(!isset($_SESSION['kullanici_id'])) {
		
		header("location:login.php");

	} else {
		
		header("location:alim.php");

	}
	
?>