<script src="../js/fusioncharts.js"></script>       
<?php
include('../inc/session.inc.php');
if(!$ozi||!$igodo||!$ahambu||!$ahabuo||!$ahaulo)
{ 
header("Location:../index.php");
}
//require_once('../inc/connect.inc.php');//connects to database
/*Include the `fusioncharts.php` file that contains functions
	to embed the charts.
*/
  include("../inc/fusioncharts.php");

  /* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "vvote"; 
   //$namedb = "fusioncharts_phpsample";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

   // Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }


?>
 	<?php
	

     	// Form the SQL query that returns the top 10 most populous countries
		$strQuery= "SELECT * FROM contestants WHERE `electbody`='$ahaulo' AND `post`='Provost'";
		//$row=mysql_fetch_array($Total);
		
     	//$strQuery = "SELECT Name, Population, Code FROM Country ORDER BY Population DESC LIMIT 10";

     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
                "chart" => array(
                    "caption" => "Provost Election Result",
                    "paletteColors" => "#0075c2",
                    "bgColor" => "#ffffff",
                    "borderAlpha"=> "20",
                    "canvasBorderAlpha"=> "1",
                    "usePlotGradientColor"=> "1",
                    "plotBorderAlpha"=> "10",
                    "showXAxisLine"=> "1",
                    "xAxisLineColor" => "#999999",
                    "showValues"=> "1",
                    "divlineColor" => "#999999",
                    "divLineIsDashed" => "1",
                    "showAlternateHGridColor" => "1",
					"xaxisname" => "Contestants", 
					"yaxisname" =>"Votes Acquired"
					
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array

        	
        	while($row = mysqli_fetch_array($result)) {
			$v = $row["fname"];
			if($vita=mysqli_query( $dbhandle,"SELECT * FROM voting WHERE `electbody`='$ahaulo' AND `postVotedFor`='Provost' AND `candidateVoted`='$v'"))
			{ $number= mysqli_num_rows($vita);}
	
			
           	array_push($arrData["data"], array(
                "label" => $row["fname"],
                "value" => $number,
               
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

        	/*Create an object for the column chart. Initialize this object using the FusionCharts PHP class constructor. The constructor is used to initialize the chart type, chart id, width, height, the div id of the chart container, the data format, and the data source. */

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , "100%", "80%", "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();
			
			
				 
					 ///total registered voters
		 $totalVoter = "SELECT * FROM voters WHERE `electbody`='$ahaulo'";
			  $totalVoter = mysqli_query( $dbhandle, $totalVoter);
					$totalVoters = mysqli_num_rows($totalVoter);
		  
			//total vote cast fot presisent
		 $totalVotecast = "SELECT * FROM voting WHERE `electbody`='$ahaulo' AND `postVotedFor`='Provost' ";
			  $totalVotecast = mysqli_query( $dbhandle, $totalVotecast);
					$totalVoted = mysqli_num_rows($totalVotecast);
  
  
			
			
			
			

        	// Close the database connection
        	$dbhandle->close();

     	}
?>

	


<!DOCTYPE html>
<html>
 <script src="../js/jquery.min.js"></script> 
 
  
		<?php include ("../inc/header.php");?>
<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s"><i>making every vote count!</i></h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".7s">VOTE WISELY</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
						<div class="col-md-3 product-bottom">
			<!--categories left side bar-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>View Results</h3>
					<ul class="cate">
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="../results.php">President</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="vpp.php">Vice-President</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="sec.php">Secretery</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="tre.php">Tresurer</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="pro.php" >Provost</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="dos.php">Director of Social</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="dost.php">Director of Sports</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="dot.php">Director of Transport</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="dis.php">Disciplinarian</a></li>
						
							
					</ul>
				</div>
		<!--//menu-->
		
			<!--colors
			<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Colors</h3>

                                        <div class="color-top">
                                            <ul>
											<li><a href="#"><i></i></a></li>
												<li><a href="#"><i class="color1"></i></a></li>
												<li><a href="#"><i class="color2"></i></a></li>
												<li><a href="#"><i class="color3"></i></a></li>
												<li><a href="#"><i class="color4"></i></a></li>
												<li><a href="#"><i class="color5"></i></a></li>
												<li><a href="#"><i class="color6"></i></a></li>
												<li><a href="#"><i class="color7"></i></a></li>
											</ul>
                                        </div>
                                    </div>			-->
		
 	</div>
	
	
	

<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s"><!--//General div fades in rigbt-->	


	
	
	
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "msg"><?php if(!$vita){echo "NO ELECTIONS RESULTS YET FOR THE PROVOST";}
					else{echo "PROVOST ELECTIONS RESULTS"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
					
				
						
<div class="mid-popular">
	
  <div class="container" >	
		<div class="col-md-8 login-do animated wow fadeInCenter" id="chart-1"></div>
		
			<div class="col-md-8 login-do animated wow fadeInCenter">
		<!--for the result detalis-->
		<p><h3><center><u>Summary of the Provost Elections</u></center></h3></br>
		<h4>Total Registered Voters:<?php echo' '. $totalVoters.' '.'Voter(s)' ;?></h4></br>
		<h4>Total Registered Contestants:<?php echo' '. $Totalcontestants.' '.'Contestant(s)' ;?></h4></br>
		<h4>Total Votes Cast:<?php echo' '. $totalVoted.' '.'Vote(s)' ;?></h4></br>
		<h4><center><u>Total Votes gotten by each contestants are:</u></center> </h4></br>
		
		
		<?php 
		
		// Establish a connection to the database
		   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

		  // Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect
		   if ($dbhandle->connect_error) {
			exit("There was an error with your connection: ".$dbhandle->connect_error);
		   }
				
			$str = "SELECT * FROM contestants WHERE `electbody`='$ahaulo' AND`post`='Provost'";
				
				
     	// Execute the query, or else return the error message.
     	$t = $dbhandle->query($str) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");	
		
		while($rorr = mysqli_fetch_array($t)) {
			$f = $rorr["fname"];
			$l = $rorr["lname"];
			$diebere = mysqli_query( $dbhandle,"SELECT * FROM voting WHERE `electbody`='$ahaulo' AND `postVotedFor`='Provost' AND `candidateVoted`='$f'");
			$chidiebere= mysqli_num_rows($diebere);
			
			echo '<h4>'.$l.' '.$f.': '.  $chidiebere.  '  Vote(s)</h4></br>';
			}
			
			if(!$diebere)
			{echo"No Results Yet!";}
		?>
		
		
		</p>
	
		
		
		
		
		
		
	</div>  					
   
					
		
</div><!--pro div  ends-->
				
			
		



			

			
				
			



			

				


			
			
			
			
			</div>

        					<div class="clearfix"></div>
	</div>
</div>
			
		
				
<?php include ("../inc/footer.php");?>
<!-- //footer -->
</body>
</html>