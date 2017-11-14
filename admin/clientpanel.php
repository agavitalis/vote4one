<?php
include('../inc/session.inc.php');

if(!$_SESSION['electbody'])
{ 
header("Location: clogin.php");
}
?>
<?php

////starts the elections
	if(isset($_POST['start']))
		{
			require_once('../inc/connect.inc.php');
			
			
			//select all voters with the electrol name and give start a value of 1,by default start is 0
			$res=mysql_query( "UPDATE voters SET `beginelection`='1' WHERE `electbody`='$electbody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Elections successfully started, Your registerd voters can now vote..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to start your election, pls contact the admins..')
                window.location.href='';</SCRIPT>");
			}
		}
		
		
		////stop the election
				if(isset($_POST['stop']))
		{
			require_once('../inc/connect.inc.php');
			
			
			//select all voters with the electrol name and give start a value of 0
			$res=mysql_query( "UPDATE voters SET `beginelection`='0' WHERE `electbody`='$electbody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Elections successfully stoped, I hope it was successful? kindly give us your feedback..')
                window.location.href='';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to stop your election, pls contact the admins..')
                window.location.href='';</SCRIPT>");
			}
		}
		
		
		
		
		////opens the result portal
		if(isset($_POST['results']))
		{
			require_once('../inc/connect.inc.php');
			
			
			//select all voters with the electrol name and give start a value of 1,by default start is 0
			$res=mysql_query( "UPDATE voters SET `showresults`='1' WHERE `electbody`='$electbody'");
			if($res)
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Elections Results now avaliable to all that participated in the election..')
                window.location.href='../results.php';</SCRIPT>");		
			}
			else
			{
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('The system was unable to show the results of your election, Pls contact the admins..')
                window.location.href='';</SCRIPT>");
			}
		}
	

?>




<!DOCTYPE html>
<html>
<body>
<title>ClientPanel</title>
<?php include ("../inc/header.php");?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Admins' Panel</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">VivvaaVote..making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">
		
		
		
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="contestantReg.php" class="hvr-sweep-to-top">Register a Contestant</a>
			</div>
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="#" class="hvr-sweep-to-top">Edit a Contestant</a>
			</div>
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="contestdel.php" class="hvr-sweep-to-top">Delete a Contestant</a>
			</div>
			
			
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="vregister.php" class="hvr-sweep-to-top">Register a Voter</a>
			</div>
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="#" class="hvr-sweep-to-top">Edit a Voter</a>
			</div>
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">	
			<p>Do you want to ?</p>		
			<a href="voterdel.php" class="hvr-sweep-to-top">Delete a Voter</a>
			</div>
			
			<form action="clientpanel.php" method="POST">
				<div class="col-md-4  login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<p>Do you want to ?</p>	
					<label class="hvr-sweep-to-top login-sub">
						<input type="submit" value="Start Elections" name='start'>
					</label>
				</div>
			
				<div class="col-md-4 login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<p>Do you want to ?</p>	
					<label class="hvr-sweep-to-top login-sub">
						<input type="submit" value="Stop Elections " name='stop'>
					</label>
				</div>
				
				<div class="col-md-4 login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<p>Do you want to ?</p>	
					<label class="hvr-sweep-to-top login-sub">
						<input type="submit" value="Show Results" name='results'>
					</label>
				</div>
			</form>
			
			<div class="clearfix"> </div>
			

	</div>
</div>
		


<?php include ("../inc/footer.php");?>
<!-- //footer -->
</body>
</html>