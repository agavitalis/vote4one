<?php
include('../inc/session.inc.php');

if(!$_SESSION['email']&& !$_SESSION['key'])
{ 
header("Location: clogin.php");
}
?>
<?php

////activates the clients
	if(isset($_POST['activate']))
		{	
			$ebody = trim(strip_tags($_POST['ebody']));
			
			require_once('../inc/connect.inc.php');
			
			
			//select client electrol name and give start a value of 1,by default start is 0
			$res=mysql_query( "UPDATE client SET `approved`='1' WHERE `electbody`='$ebody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Client Successfully activated..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to activate client oh..')
                window.location.href='';</SCRIPT>");
			}
		}
		
		
		////deactivate a client
				if(isset($_POST['deactivate']))
		{
			$ebody = trim(strip_tags($_POST['ebody']));
			
			require_once('../inc/connect.inc.php');
			
			
			//select all voters with the electrol name and give start a value of 0
			$res=mysql_query( "UPDATE client SET `approved` ='0' WHERE `electbody`='$ebody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Client successfully Deactivated..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to deactivate client oh..')
                window.location.href='';</SCRIPT>");
			}
		}
		
		
		
		
		////deletes a client
		if(isset($_POST['deleteC']))
		{
			$ebody = trim(strip_tags($_POST['ebody']));
			
			require_once('../inc/connect.inc.php');
			
			
			//deletes delected clent
			$res=mysql_query( "DELETE FROM client  WHERE `electbody`='$ebody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Client successfully deleted..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to delete the clients..')
                window.location.href='';</SCRIPT>");
			}
		}
	

?>


<?php include ("../inc/header.php");?>


<html>
<title>MasterPanel</title>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Masters' Panel</h2>
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
							echo"<select class='form-control' name='ebody'>";
							echo"  <option selected disabled hidden>Electoral Platform</option>";
							echo"  <option>";
								require('../inc/connect.inc.php');//connects to database
								$query = "SELECT DISTINCT electbody FROM client";//selects all our clients
								$result = mysql_query($query) or die(mysql_error());//checks the selection
								while($row = mysql_fetch_assoc($result)) 
								{
								echo '<option   value='.$row['electbody'].'>'.$row['electbody'].'</option>';//shows the results
								}
								echo "</select>"; 
					?>
				  
				</div>		
		
			
					<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
						<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value="Activate Client" name='activate'>
							</label>
					</div>
			
					<hr/>
					
					<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
						<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value=" Deactivate Client" name='deactivate'>
							</label>
					</div>
					
					<hr/>
					
					<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
						<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value=" Delete Client" name='deleteC'>
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