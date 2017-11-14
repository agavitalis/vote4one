<?php	
	include('../inc/session.inc.php');
	
	if(isset($_POST['cregister']))
		{
			$electbody = strtoupper(trim(strip_tags($_POST['electbody'])));
			$fname = trim(strip_tags($_POST['fname']));
			$lname = trim(strip_tags($_POST['lname']));
			$email = trim(strip_tags($_POST['email']));
			$phone = trim(strip_tags($_POST['phone']));
			$key = trim(strip_tags($_POST['key']));
			$key = md5(md5($key));
		
			
			require('../inc/connect.inc.php');
			
			
			//Check For User 
			$res=mysql_query( "SELECT * FROM client WHERE `email` ='$email' AND `phone`='$phone' AND `electbody`='$electbody' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			if($count){
					echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Email or Electoral name aready exist...Change the name and try again!')
						window.location.href='cregister.php';</SCRIPT>");
						}
			
			if(!$count)
				{
				
				
				
				$upload = mysql_query("INSERT INTO client ( `electbody`,`fname`,`lname`,`email`,`phone`,`key`,`approved`) 
					VALUES ('$electbody','$fname','$lname','$email','$phone','$key','1')");
			
			
		
					if($upload)
					{
					
				//////////SEND MASSAGE
				
					
			////////////////////////
			//send email///////////
	
			
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$to = $email;
$subject = 'VivvaaVote Registeration Details';
$from = 'VivvaaSolutions-OnlineElections';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: Vivvaa-Solutions'."\r\n".
    'Reply-To: vivvaa.vivvaa@gmail.com'."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .='<h1 style="color:#f40;">Vote4one Registeration Details</h1>';
$message .='<p>We at Vote4one are pleased to inform you on your successful registeration as a client at Vote4one.</p>';
$message .='<p>Below are your registeration details.</p>';
$message .= '<p style="color:#080;font-size:16px;">Name &raquo;'. $fname.' '.$lname.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Email &raquo;'. $email.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Phone &raquo;'. $phone.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Electoral body &raquo;'.$electbody.'</p>';
$message .= '<p style="color:#080;font-size:16px;">Password &raquo;........</p>';
$message .='<p>Best regards from Vivvaa-Solution.</p>';
$message .= '</body></html>';
 
// Sending email
if(mail($to, $subject, $message, $headers)){
   // echo 'Your mail has been sent successfully.';
} else{
   // echo 'Unable to send email. Please try again.';
}
/////////////////////////////////////////////////////////////////////////



					
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Admin Succesfully registered!Check out the Quick Guide tab for instructions on how to use the platform')
                window.location.href='index.php';</SCRIPT>");
					}
					else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Admin NOT Succesfully,Contact the Masters ot try registering again leter ')
                window.location.href='cregister.php';</SCRIPT>");
					}
				}
					
			}
		
	

?>






<!DOCTYPE html>
<html>
<title>ClientReg</title>
<?php include ("../inc/header.php");?>
<!-- //header -->
<!--banner-->
<body>
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Client Registeration</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">Vote4one..making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>




<div class="login">
	<form method="POST" action="cregister.php" >
			<div class="container" ">
				<h3><center>Fill, to register as an Admin</center></h3>
			<hr/>
			
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class="login-mail">
					<i class="glyphicon glyphicon-home"></i>
					<input type="text" placeholder="Electrol Body" required="" name="electbody"/>
					</div>	
					
					<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" placeholder="First Name" required="" name="fname"/>
					</div>		
					
					</div>
					
					
					<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">
					<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" placeholder="Last Name" required="" name="lname"/>
					</div>
					<div class="login-mail">
					<i class="glyphicon glyphicon-envelope"></i>
					<input type="email" placeholder="email address" required="" name="email"/>
					</div>
					</div>
		
		
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class="login-mail">
					<i class="glyphicon glyphicon-phone"></i>
					<input type="phone" placeholder="Phone number" required="" name="phone"/>
					</div>
					<div class="login-mail">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" placeholder="Password..." required="" name="key"/>
					</div>
					</div>
		
		
		
					 <a class="news-letter" href="#" required="">
						 <label class="checkbox1"><input type="checkbox" name="checkbox" ><i> </i>I agree with the terms and conditions</label>
					   </a>
					<div class="col-md-4 login-do animated wow fadeInCenter"></div>   
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class=" animated wow fadeInRight" data-wow-delay=".5s" align="center">
							<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
							<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value="REGISTER" name="cregister">
							</label>
							</div>
							<div class="clearfix"> </div>
					</div>
					</div>
			
		</form>
	</div>


<div class="clearfix"> </div>
</body>

<?php include ("../inc/footer.php");?>
</html>