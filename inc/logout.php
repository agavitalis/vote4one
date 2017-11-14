
<?php
include('session.inc.php');

if($email || $key || $fname|| $electbody)
	{
		session_destroy();
		
		header('location:../admin/index.php');
	}
	
 if($ozi || $igodo || $ahambu || $ahabuo || $ahaulo)
	{
		session_destroy();
		
		header('location:../index.php');
	}
?>	


	