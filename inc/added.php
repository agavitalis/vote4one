<?php
include ('session.inc.php');
include ("connect.inc.php");
?>



<?php
//evalutes when the submit butto is clicked
if(isset($_POST['President']))
{
			$choice=$_POST['President'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='President' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			//echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','President','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>


<?php
//evalutes when the submit butto is clicked
if(isset($_POST['Vp']))
{
			$choice=$_POST['Vp'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Vice_President' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Vice_President','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>





<?php
//evalutes when the submit butto is clicked for secretery
if(isset($_POST['sec']))
{
			$choice=$_POST['sec'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Secretery' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Secretery','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>




<?php
//evalutes when the submit butto is clicked for treasurer
if(isset($_POST['tree']))
{
			$choice=$_POST['tree'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Tresurer' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Tresurer','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>


<?php
//evalutes when the submit butto is clicked for provost
if(isset($_POST['pro']))
{
			$choice=$_POST['pro'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Provost' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Provost','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>




<?php
//evalutes when the submit butto is clicked for director of sport
if(isset($_POST['sport']))
{
			$choice=$_POST['sport'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Director_Of_Sports' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Director_Of_Sports','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>



<?php
//evalutes when the submit butto is clicked for director of social
if(isset($_POST['social']))
{
			$choice=$_POST['social'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Director_Of_Social' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Director_Of_Social','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>




<?php
//evalutes when the submit butto is clicked for director of transport
if(isset($_POST['transport']))
{
			$choice=$_POST['transport'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Director_Of_Transport' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Director_Of_Transport','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>


<?php
//evalutes when the submit butto is clicked for director of transport
if(isset($_POST['dis']))
{
			$choice=$_POST['dis'];//my selected candidate
	//Check if the user have voted before 
			$res=mysql_query( "SELECT * FROM voting WHERE `vfname` ='$ahambu' AND `vlname` ='$ahabuo' AND `electbody`= '$ahaulo' AND`vemail`='$ozi' AND `postVotedFor`='Disciplinarian' ");
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); //cheching the number of affected rowsand column
		
			if($count > 0)
			{	
			echo 22; //voter already voted for that post 
			}
			else
			{
			$vote = mysql_query("INSERT INTO voting ( `vfname`,`vlname`,`candidateVoted`,`postVotedFor`,`electbody`,`vemail`) 
					VALUES ('$ahambu','$ahabuo','$choice','Disciplinarian','$ahaulo','$ozi')");
				if($vote)
				{
				echo 1;
				}
				else
				{
				echo 33;
				}
			}


}
?>