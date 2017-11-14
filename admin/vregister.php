<?php

include('../inc/session.inc.php');	
	

if(!$email||!$fname||!$electbody)
{ 
echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('You do not have permissions to access beyound this point:Kindly login!')
                window.location.href='clogin.php';</SCRIPT>");
header("Location: index.php");
}

	
	

	
	
	
	
	
	
	
		if(isset($_POST['vregister']))
		{
			$reg_no = addslashes($_POST['reg_no']);
			$fname = trim(strip_tags($_POST['fname']));
			$lname = trim(strip_tags($_POST['lname']));
			$email = trim(strip_tags($_POST['email']));
			$phone = trim(strip_tags($_POST['phone']));
			$keiy = trim(strip_tags($_POST['key']));
			//random password generation
			//$pass=mt_rand(154360, 987998);
			//$passes= $electbody.$pass;
			$key = md5(md5($keiy));
			$electbody = $_POST['electbody'];
			require('../inc/connect.inc.php');
			
			
			
			//Check For User 
			$res=mysql_query( "SELECT * FROM voters WHERE `email` ='$email' AND `phone`='$phone' AND `electbody`='$electbody' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if(!$count)
				{$upload = mysql_query("INSERT INTO voters ( `username`,`fname`,`lname`,`email`,`phone`,`key`,`electbody`,`beginelection`,`showresults`) 
					VALUES ('$reg_no','$fname','$lname','$email','$phone','$key','$electbody','1','0')");
			
			
					
					if($upload)
					{
					
					
							
			////////////////////////
			//send email///////////
			//////////////////////
			$to = $email;
			$subject = $electbody.' Registeration Details';
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
			$message .='<p>Vivvaa-Solutions is pleased to inform you that,you have been successfully</p>';
			$message .='<p>registered to participate in the '.$electbody.'Elections,at <em>www.vote4one.com</em></p>';
			$message .='<p>You are expected to login to www.vivvaavote.vivvaa.com on the election day and vote </p>';
			$message .='<p>with the following registeration details</p>';
			$message .= '<p style="color:#080;font-size:16px;">Name &raquo;'. $fname.' '.$lname.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Username&raquo; YOUR REG NO</p>';
			$message .= '<p style="color:#080;font-size:16px;">Email &raquo;'. $email.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Phone &raquo;'. $phone.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Electoral body &raquo;'.$electbody.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Password &raquo;'.$passes.'</p>';
			$message .='<p>Best regards from Vivvaa-Solution.</p>';
			$message .='<p><i>For enquires: vivvaa.vivvaa@gmail.com</i></p>';
			$message .='<p><i>Or call:+23408163922749</i></p>';
			$message .= '</body></html>';
			 
			// Sending email
			if(mail($to, $subject, $message, $headers))
			{
				$checksms =mysql_query( "SELECT * FROM client WHERE `smsenable` ='1' AND `electbody`='$electbody' ");
				$checkrow=mysql_fetch_array($checksms);
				$countsms = mysql_num_rows($checksms);
					if($countsms >= 1)//send sms\\
						{
						$json_url = "http://api.ebulksms.com:8080/sendsms.json";
						$xml_url = "http://api.ebulksms.com:8080/sendsms.xml";
						$username = 'vivvaa.vivvaa@gmail.com';
						$apikey = 'ed5b6855724befec0156b9297089328d66a41ba7';
						

							$sendername = $electbody;
							$recipients = $phone;
							$message = $electbody." election login Details:Email=".$email."<br/>Username= YOUR REG NO<br/>Password=".$passes."<br/>Electoral body=".$electbody." log into www.vote4one.com,on the election day and vote";
							$flash = 0;
							
							
								 $message = substr($_POST['message'], 0, 160);
								#Use the next line for HTTP POST with JSON
								//	$result = useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
								
								







	//Function to connect to SMS sending server using HTTP POST
							function doPostRequest($url, $data, $headers = array('Content-Type: application/x-www-form-urlencoded')) {
								$php_errormsg = '';
								if (is_array($data)) {
									$data = http_build_query($data, '', '&');
								}
								$params = array('http' => array(
										'method' => 'POST',
										'content' => $data)
								);
								if ($headers !== null) {
									$params['http']['header'] = $headers;
								}
								$ctx = stream_context_create($params);
								$fp = fopen($url, 'rb', false, $ctx);
								if (!$fp) {
									return "Error: gateway is inaccessible";
								}
								//stream_set_timeout($fp, 0, 250);
								try {
									$response = stream_get_contents($fp);
									if ($response === false) {
										throw new Exception("Problem reading data from $url, $php_errormsg");
									}
									return $response;
								} catch (Exception $e) {
									$response = $e->getMessage();
									return $response;
								}
							}



								
							function useJSON($url, $username, $apikey, $flash, $sendername, $messagetext, $recipients) 
								{
								$gsm = array();
								$country_code = '234';
								$arr_recipient = explode(',', $recipients);
								foreach ($arr_recipient as $recipient) {
									$mobilenumber = trim($recipient);
									if (substr($mobilenumber, 0, 1) == '0'){
										$mobilenumber = $country_code . substr($mobilenumber, 1);
									}
									elseif (substr($mobilenumber, 0, 1) == '+'){
										$mobilenumber = substr($mobilenumber, 1);
									}
									$generated_id = uniqid('int_', false);
									$generated_id = substr($generated_id, 0, 30);
									$gsm['gsm'][] = array('msidn' => $mobilenumber, 'msgid' => $generated_id);
								}
								$message = array(
									'sender' => $sendername,
									'messagetext' => $messagetext,
									'flash' => "{$flash}",
								);

								$request = array('SMS' => array(
										'auth' => array(
											'username' => $username,
											'apikey' => $apikey
										),
										'message' => $message,
										'recipients' => $gsm
								));
								$json_data = json_encode($request);
								if ($json_data) {
									$response = doPostRequest($url, $json_data, array('Content-Type: application/json'));
									$result = json_decode($response);
									return $result->response->status;
								} else {
									return false;
								}
							}
							$result = useJSON($json_url, $username, $apikey, $flash, $sendername, $message, $recipients);
							
						}
						///check ifits sent
						 if ($result == 'SUCCESS')
						 {
						 	echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Voter Succesfully registered!,SMS and Email sent to the details you provided')
							window.location.href='vregister.php';</SCRIPT>");
						 }
						 else
						  {
						 	echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Voter Succesfully registered!,Email sent to the details you provided but not SMS')
							window.location.href='vregister.php';</SCRIPT>");
						 }
				
				
				if(!$countsms)
				{
					
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Voter Succesfully registered!Check out the Quick Guide tab for instructions on how to use the platform')
                window.location.href='vregister.php';</SCRIPT>");
				}
				
			} else{
				//echo 'Unable to send email. Please try again.';
			}
								
							
		}
	else if($count)
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Voter already registered... ')
             window.location.href='vregister.php';</SCRIPT>");
		}
	}
					
}
		
	

?>





<!DOCTYPE html>
<html>
<title>VoterReg</title>
<?php include ("../inc/header.php");?>
<!-- //header -->
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Voters Registeration</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">VivvaaVote...Making every Vote Count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
<div class="login">
	<form method="POST" action="vregister.php" >
			<div class="container" ">
				<h3><center>Fill, to register a new voter</center></h3>
			<hr/>
			
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" value="<?php echo $_POST['fname'];?>" placeholder="First Name" required="" name="fname">
					</div>	
					
					<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" value="<?php echo $_POST['lname'];?>" placeholder="Last Name" required="" name="lname">
					</div>		
					
					</div>
					
					
					<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s">
					<div class="login-mail">
					<i class="glyphicon glyphicon-pencil"></i>
					<input type="text" value="<?php echo $_POST['reg_no'];?>" placeholder="Registeration No" required="" name="reg_no">
					</div>
					<div class="login-mail">
					<i class="glyphicon glyphicon-envelope"></i>
					<input type="email" value="<?php echo $_POST['email'];?>" placeholder="email address" required="" name="email">
					</div>
					</div>
		
		
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class="login-mail">
					<i class="glyphicon glyphicon-phone"></i>
					<input type="phone" value="<?php echo $_POST['phone'];?>" placeholder="Phone number" required="" name="phone">
					</div>
					<div class="login-mail">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password"value="<?php echo $_POST['key'];?>" placeholder="Password..." required="" name="key">
					</div>
					</div>
					<!-- This carries the electoral body name secretely-->
					<input type="hidden" name="electbody" value="<?php echo $electbody; ?>">
		
		
					<div class="col-md-4 login-do animated wow fadeInCenter"></div>
					
					<div class="col-md-4 login-do animated wow fadeInCenter">
					<div class=" animated wow fadeInRight" data-wow-delay=".5s" align="center">
							<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
							<label class="hvr-sweep-to-top login-sub">
							<input type="submit" value="REGISTER" name="vregister">
							</label>
							</div>
							<div class="clearfix"> </div>
					</div>
					</div>
			
		</form>
	</div>


<div class="clearfix"> </div>
</body>
 
<!-- //footer -->
<?php include ("../inc/footer.php");?>
</body>

</html>