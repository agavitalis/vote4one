<?php
include('../inc/session.inc.php');

if(!$email||!$fname||!$electbody)
{ 
echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('You do not have permissions to access beyound this point:Kindly login!')
                window.location.href='clogin.php';</SCRIPT>");
header("Location: clogin.php");
}

	
		if(isset($_POST['contentreg']))
		{
			$em = trim(strip_tags($_POST['em']));
			$cln =trim(strip_tags($_POST['cln']));
			$cfn =trim(strip_tags($_POST['cfn']));
			$cpost = trim(strip_tags($_POST['cpost']));
			//$about= $_POST['about'];
			$electbody = $_POST['electbody'];
			$name = $_FILES['doc'] ['name'];
			$size = $_FILES['doc'] ['size'];
			$tmp_name = $_FILES['doc'] ['tmp_name'];
			
			require('../inc/connect.inc.php');
			$extension = strtolower(substr($photoname, strpos($photoname, '.') +1));
			$max_size = 100000;
r			//when javascript is triggered
			$postwrite=trim(strip_tags($_POST['postwrite']));
			  if($postwrite != NULL)
			 { $cpost=$postwrite;}
			


//$type = $_FILES['file'] ['type'];


if(isset($_FILES['doc']))
		{									
				if(file_exists("../contestphotos/".@$_FILES['doc']['name']))
				{
					//echo @$_FILES['doc']['name']." Already exists";
					//header('Location:../index.php');
				
					
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('File NOT Succesfully uploaded!...File name already exist in the data base..')
                window.location.href='contestantReg.php';</SCRIPT>");
					
				}
				else
				{
					move_uploaded_file(@$_FILES['doc']['tmp_name'], "../contestphotos/".$_FILES['doc']['name']);
									
					//require_once ('connect.inc.php');
									
					//$doc = $_FILES['doc']['name'];
					
					//
					
			
			
			
			
			
			//Check For User 
			$res=mysql_query( "SELECT * FROM contestants WHERE `fname` ='$cfn' AND `lname` ='$cln' AND `electbody`='$electbody'AND `email`='$em' ");
			$row=mysql_fetch_array($res);// used for logins
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
		
			if(!$count)
				{$upload = mysql_query("INSERT INTO contestants ( `fname`,`lname`,`post`,`photoname`,`electbody`,`email`) 
					VALUES ('$cfn','$cln','$cpost','$name','$electbody','$em')");
			
			
					
					if($upload)
					{
					
						////////////////////////
			//send email///////////
			//////////////////////
			$to = $em;
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
			$message = '<html><body style="background:#FFF3;">';
			$message .='<h1 style="color:#f40;">Vote4one Contestant Details</h1>';
			$message .='<p>Vote4one is pleased to inform you that,you have been successfully</p>';
			$message .='<p>registered to contest for the office of '.$cpost.'in the '.$electbody.' Elections,conducted by Vivvaa-Solutions.  </p>';
			$message .='<p>You are expected to login to www.vote4one.com on the election day and vote </p>';
			$message .='<p>with the following registeration details</p>';
			$message .= '<p style="color:#080;font-size:16px;">Name &raquo;'. $cfn.' '.$cfn.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Email &raquo;'. $em.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Post-Registered &raquo;'. $cpost.'</p>';
			$message .= '<p style="color:#080;font-size:16px;">Electoral body &raquo;'.$electbody.'</p>';
			$message .='<p>Best regards from VivvaaVoteOnline-Solution.</p>';
			$message .='<p><i>For enquires: vivvaa.vivvaa@gmail.com</i></p>';
			$message .='<p><i>Or call:+23408163922749</i></p>';
			$message .= '</body></html>';
			 
			// Sending email
			if(mail($to, $subject, $message, $headers)){
				//echo 'Your mail has been sent successfully.';
			} else{
				//echo 'Unable to send email. Please try again.';
			}
					
					
					
				echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert('Contestant Succesfully registered!Check out the Quick Guide tab for instructions on how to use the platform')
                window.location.href='contestantReg.php';</SCRIPT>");
					}
					else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>window.alert(' Contestant NOT Succesfully,Contact the Masters or try registering again leter ')
                window.location.href='contestantReg.php';</SCRIPT>");
					}
				}
					
			}
		
	}}

?>





<?php include ("../inc/header.php");?>




<!DOCTYPE html>
<html>
<title>Contestant|Registeration</title>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s"> Contestant Registeration</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s">making every vote count</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->





	<div class="login">
		<div class="container">
		<form method= "POST" action="contestantReg.php" enctype='multipart/form-data'>	

		<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s" >
		</div>
			
			<div class="col-md-4 login-do animated wow fadeInCenter" data-wow-delay=".5s" >
				<h3><center>Fill to regiser a Contestant </center></h3><hr/> 
				
			
			
		
		
        <img id="blah" src="../images/co.png" alt="Candidate's Picture" style='position: relative; left: 25%;border: 2px solid green;width: 50%; height:25%; border-radius:1em;' /><hr/> 
        <input type='file'name = 'doc'  class='btn btn-success btn-sm' id="imgInp" style='position: relative; left:15%;width: 70%;'/><hr/>
		
			 
				  
		
		
				  
<div class="clearfix"> </div>
				
				<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" placeholder="First Name" required="" name="cfn"/>
				</div>
				
				
				<div class="login-mail">
					<i class="glyphicon glyphicon-user"></i>
					<input type="text" placeholder="Last Name" required="" name="cln"/>
				</div>
				
				
				<div class="login-mail">
					<i class="glyphicon glyphicon-envelope"></i>
					<input type="email" placeholder="Email" required="" name="em"/>
				</div>
				
		<!-- This carries the electoral body name secretely-->
				<input type="hidden" name="electbody" value="<?php echo $electbody; ?>"/>		
				
				
	<div class="login-mail" id="given_div">
		<select class="form-control" name="cpost"  id="test"  onchange="showDiv(this)">
          <option selected disabled hidden>Contesting for?</option>
           <option>President</option>
          <option>Vice_President</option>
		  <option>Chairman</option>
		  <option>Vice_Chairman</option>
		  <option>Secretery</option>
		  <option>Provost</option>
		  <option>Treasurer</option>
		  <option>Director_Of_Social</option>
		  <option>Director_Of_Sports</option>
		  <option>Director_Of_Transport</option>
		  <option>Disciplinarian</option>
		  <option value="1">Not Here? Specify</option>
	  </select>		
	</div>			
			
		<!--hidden until triggered -->
				<div id="hidden_div" style="display:none;" class="login-mail">
					<i class="glyphicon glyphicon-pencil"></i>
					<input type="text" placeholder="Contesting for?"  name="postwrite"/>
				</div>
				
			
			<div class=" login-do animated wow fadeInRight" data-wow-delay=".5s" align="center">
				<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Register" name="contentreg">
					</label>
			</div>
			<hr/>
			</form>
		
	
	</div>
	</div>
	
	<script type="text/javascript">
function showDiv(select){
   if(select.value==1){
    document.getElementById('hidden_div').style.display = "block";
	document.getElementById('given_div').style.display = "none";
   } else{
    document.getElementById('hidden_div').style.display = "none";
   }
} 
</script>
	
	<script> 
		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
								}
    
    $("#imgInp").change(function(){
        readURL(this);
    });     </script>    




<?php include ("../inc/footer.php");?>
<!-- //footer -->
</body>
</html>