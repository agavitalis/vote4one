<?php
include('../inc/session.inc.php');

if(!$_SESSION['email']&& !$_SESSION['key'])
{ 
header("Location: clogin.php");
}
?>
<?php

		
		////deletes a client
		if(isset($_POST['deleteC']))
		{
			$email = trim(strip_tags($_POST['email']));
			
			require_once('../inc/connect.inc.php');
			
			
			//deletes delected clent
			$res=mysql_query( "DELETE FROM contestants  WHERE `electbody`='$electbody' AND `email`='$email'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Contestant successfully deleted..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to delete the Contestants..')
                window.location.href='';</SCRIPT>");
			}
		}
	

?>


<?php include ("../inc/header.php");?>


<html>
<title>AdminPanel</title>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Admins' Panel</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">VivvaaVote..making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- banner stops -->
	<div class="login">
		<div class="container" >
	<form action="" method="POST">
			<h3><center style="color:red;">Becareful,Your Decision is Final!</center></h3><hr>
		<div class="col-md-3 login-do animated wow fadeInCenter">
		
		</div>
			<div class="col-md-6 login-do animated wow fadeInCenter" data-wow-delay=".5s">
			
			
				<div class="login-mail">
					<?php 
							echo"<select class='form-control' name='email'>";
							echo"  <option selected disabled hidden>Select contestant</option>";
							echo"  <option>";
								require('../inc/connect.inc.php');//connects to database
								$query = "SELECT * FROM contestants WHERE `electbody`='$electbody'";//selects all our clients
								$result = mysql_query($query) or die(mysql_error());//checks the selection
								while($row = mysql_fetch_assoc($result)) 
								{
								echo '<option   value='.$row['email'].'>'.$row['email'].'</option>';//shows the results
								}
								echo "</select>"; 
					?>
				  
				</div>		
		
			
					<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
						<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value="Delete Contestant" name='deleteC'>
							</label>
					</div>
			
					
</form>
	</div>
</div>
		
</div>

<?php include ("../inc/footer.php");?>
<!-- //footer -->
</body>
</html>