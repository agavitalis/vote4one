<?php
	
	include('../inc/session.inc.php');
	
	
		if(isset($_POST['clogin']))
		{
			$email = $_POST['email'];
			$key = $_POST['key'];
			
			//MD5 Password
			$key = md5(md5($key));
			
			require('../inc/connect.inc.php');
			
			
			//Check For User 
			$res=mysql_query( "SELECT * FROM client WHERE `email` ='$email' AND `key` ='$key' AND `approved`='1'");
			$row=mysql_fetch_array($res);//used for login
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if($count == 1)
			{
					
				$_SESSION['email'] = $row['email'];
				$_SESSION['electbody'] = $row['electbody'];
				$_SESSION['fname'] = $row['fname'];
				
				header("Location: clientpanel.php");
				
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('incorrect Email or Password OR contant the admins to check if your account is active..')
                window.location.href='';</SCRIPT>");
			}
		}
	

?>











<!DOCTYPE html>
<html>
<title>Admin Login</title>
<?php include ("../inc/header.php");?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Admin Login</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">VivvaaVote..making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>

<div class="login">
		<div class="container">
		<form method = 'post' action='index.php' >
		<h3><center>Enter Your Admin Login details below</center></h3>
			<hr/>
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">
				<i class="glyphicon glyphicon-user"></i>
					<input type="email" value="<?php echo $_POST['email'];?>" placeholder="Username/Email" required="" name="email">
					
				</div>
				<div class="login-mail">
				<i class="glyphicon glyphicon-lock"></i>
					<input type="password" value="<?php echo $_POST['key'];?>"" placeholder="Password" required="" name="key">
					
				</div>
				
				  
	
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Login" name="clogin">
					</label>
					<p>Are you new?</p>
				<a href="cregister.php" class="hvr-sweep-to-top">Register</a>
			</div>
			<div class="clearfix"> </div>
			</form>
		</div>


	</div>


<div class="clearfix"> </div>
</body>

<?php include ("../inc/footer.php");?>
</body>
</html>