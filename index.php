<?php include_once('inc/session.inc.php');?>

<?php
	
	
	
	
		if(isset($_POST['igodo']))
		
		{	$username = addslashes($_POST['idn']); //reg number for students
			$email = trim(strip_tags($_POST['email']));
			$key = trim(strip_tags($_POST['key']));
			$key = md5(md5($key));
			$ebody = trim(strip_tags($_POST['ebody']));
			
			//echo $ebody;
			require('inc/connect.inc.php');
			
			//Check weather the election have started is ready
			
			$check=mysql_query( "SELECT * FROM voters WHERE `electbody`= '$ebody' AND `beginelection`='1' ");
			$row=mysql_fetch_array($check);
			
			$count = mysql_num_rows($check); // if uname/pass correct it returns must be 1 row
			//changed the names to make it complex
			if($count <= 0)
			{
			
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The Elections You selected have not yet started. or might have ended.')
                window.location.href='';</SCRIPT>");
			}
			
			
			
			else{
			//Check For User 
			$res=mysql_query( "SELECT * FROM voters WHERE `email` ='$email' AND `key` ='$key' AND `username`= '$username' AND `electbody`= '$ebody' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			//changed the names to make it complex
			if($count == 1)
			{
				//header("Location: clientpanel.php");
				$_SESSION['ozi'] = $row['email'];
				$_SESSION['igodo'] = $row['key'];
				$_SESSION['ahambu'] = $row['fname'];
				$_SESSION['ahabuo'] = $row['lname'];
				$_SESSION['ahaulo'] = $row['electbody'];
				
				header("Location: vote.php");
				
			}
			
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('incorrect Email or Password..');</SCRIPT>");
				
			}
			}
			
			}
			
			
			
			
			if(isset($_POST['view']))
		
		{	$username = addslashes($_POST['idn']);
			$email = trim(strip_tags($_POST['email']));
			$key = trim(strip_tags($_POST['key']));
			$key = md5(md5($key));
			$ebody = trim(strip_tags($_POST['ebody']));
			
			//echo $ebody;
			require('inc/connect.inc.php');
			
			
			//Check weather the election have started
			 
			$check=mysql_query( "SELECT * FROM voters WHERE `electbody`= '$ebody' AND `showresults`='1' ");
			$row=mysql_fetch_array($check);
			
			$counting = mysql_num_rows($check); // if uname/pass correct it returns must be 1 row
			//changed the names to make it complex
			if($counting <=0)
			{
			
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The Election results are not yet ready..')
                window.location.href='index.php';</SCRIPT>");
			}
			
			
			
			else{ 
			
			//Check For User 
			$reds=mysql_query( "SELECT * FROM voters WHERE `email` ='$email' AND `key` ='$key' AND `username`= '$username' AND `electbody`= '$ebody' ");
			$row=mysql_fetch_array($reds);
			
			$count = mysql_num_rows($reds); // if uname/pass correct it returns must be 1 row
			//changed the names to make it complex
			if($count == 1)
			{
				//header("Location: clientpanel.php");
				$_SESSION['ozi'] = $row['email'];
				$_SESSION['igodo'] = $row['key'];
				$_SESSION['ahambu'] = $row['fname'];
				$_SESSION['ahabuo'] = $row['lname'];
				$_SESSION['ahaulo'] = $row['electbody'];
				
				header("Location: results.php");
				
			}
			
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('incorrect Email or Password..');</SCRIPT>");
				
			}
			}
			
		}
	

?>



<?php  include'header.php';?>

<!DOCTYPE html>
<html>
<title>Vvote v1.0</title>

<body>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Voters Login</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">Vote4one!..making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container" >
		<form action="index.php" method="POST">
		<div class="col-md-4 login-do animated wow fadeInCenter">
		
		</div>
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">
				<h3><center>Enter the details sent to you <br/>below</center></h3>
				<div class="login-mail">
					<i class="glyphicon glyphicon-envelope"></i>
					<input type="email" placeholder="Email" required="" name="email">
					</div>
					
					<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" placeholder="Username" required="" name="idn">
					</div>
					
				<div class="login-mail">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" placeholder="Password" required="" name ="key">
				</div>
	
	
	
	
	
	
					
	
	<div class="login-mail">
		<?php 
		echo"<select class='form-control' name='ebody'>";
        echo"  <option selected disabled hidden>Electoral Platform</option>";
        echo"  <option>";
					require('inc/connect.inc.php');//connects to database
						$query = "SELECT DISTINCT electbody FROM client";//selects all our clients
								$result = mysql_query($query) or die(mysql_error());//checks the selection
						while($row = mysql_fetch_assoc($result)) {
							echo '<option   value='.$row['electbody'].'>'.$row['electbody'].'</option>';//shows the results
								}
									echo "</select>"; ?>
	  
	</div>		
	
	
	
	
	
	
	
	
	
	
	
			
		
			
			
			<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Login to Vote" name='igodo'>
					</label>
			</div>
			
			<hr/>
			
			<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value=" View Election Results" name='view'>
					</label>
			</div>
</form>
	</div>
</div>
	


<div class="clearfix"> </div>
<!-- footer -->
	<?php include ("footer.php");?>
<!-- //footer -->

</body>
</html>