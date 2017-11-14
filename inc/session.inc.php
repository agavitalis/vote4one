<?php
	
	error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	
	$email = $_SESSION['email'];
	$key = $_SESSION['key'];
	$fname = $_SESSION['fname'];
	$electbody= $_SESSION['electbody'];
	
	
	//specialy  for voters login
	$ozi = $_SESSION['ozi'];
	$igodo = $_SESSION['igodo'];
	$ahambu = $_SESSION['ahambu'];
	$ahabuo= $_SESSION['ahabuo'];
	$ahaulo= $_SESSION['ahaulo'];
	
	
	
?>