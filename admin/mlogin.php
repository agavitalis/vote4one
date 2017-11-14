<?php
	
	include('../inc/session.inc.php');
	//session_start();
	
		if(isset($_POST['mlogin']))
		{
			$email = $_POST['email'];
			$key = $_POST['key'];
			
			//MD5 Password
			//$key = md5($key);
			
			require('../inc/connect.inc.php');
			
			
			//Check For User 
			$res=mysql_query( "SELECT * FROM master WHERE `email` ='$email' AND `key` ='$key' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if($count == 1)
			{
			
				$_SESSION['email'] = $row['email'];
				$_SESSION['fname'] = $row['fname'];
				$_SESSION['key'] = $row['key'];
				
				
				header("Location: masterpanel.php");
				
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('incorrect Email or Password..')
                window.location.href='';</SCRIPT>");
			}
		}
	

?>





<?php include ("../inc/header.php");?>




<!DOCTYPE html>
<html>
<title>MasterLogin</title>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s"> Masters'Login</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->






	<div class="login">
		<div class="container" ">
		<form method = 'post' action='mlogin.php' >
		<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s" >
		</div>
			
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s" >
				<h3><center>Enter your Masters login details <br/>below</center></h3>
				<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="email" placeholder="Username/Email" required="" name="email">
				</div>
				<div class="login-mail">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" placeholder="Password" required="" name="key">
				</div>
				   

				
			
		
			
			<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Login" name="mlogin">
					</label>
			</div>
			<hr/>
			</form>
	</div>
	</div>

<?php include ("../inc/footer.php");?>
<!-- //footer -->
</body>
</html>