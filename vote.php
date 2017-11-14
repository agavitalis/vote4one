<?php
include('inc/session.inc.php');
require_once("inc/connect.php");
if(!$ozi||!$igodo||!$ahambu||!$ahabuo||!$ahaulo)
{ 
header("Location: index.php");
}

?>


	


<!DOCTYPE html>
<html>
<title>vvote</title>
<script src="js/jquery.min.js"></script>
<?php include ("header.php");?>
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
					<h3>Categories</h3>
					<ul class="cate">
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#msg">President</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#vpmsg">Vice-President</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#secmsg">Secretery</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#treemsg">Tresurer</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#promsg">Provost</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#socialmsg">Director of Social</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#sportmsg">Director of Sports</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#transportmsg">Director of Transport</a></li>
						<li class="list-group-item list-group-item-success"><i class="glyphicon glyphicon-menu-right" ></i><a href="#dismsg">Disciplinarian</a></li>
							
					</ul>
				</div>
		<!--//menu-->
		
			<!--colors-->
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
                                    </div>			<!--//colors-->
		
 	</div>
	
	
	

<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s"><!--//General div fades in rigbt-->	


	<!--//presidential div begins-->
			<?php
			//selection for the post of president
				$selectPresident = " SELECT * FROM contestants WHERE `post`='President' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($selectPresident);
					$stmt->execute();
					$president = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
	
	
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "msg"><?php if(!$president){echo "NO CANDIDATE REGISTERED FOR PRESIDENT";}
					else{echo"VOTE YOUR CHOICE FOR THE PRESIDENT"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
			<!--script incharge of voting process-->
			<script src="js/display.js"></script>		
				
						
<div class="mid-popular">
	<form method="post" action="">
				
				<?php 
					if (!$president)
						{
						//echo "<h2 class='white center'><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($president as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="showSub()" class="btn btn-danger"type="radio" name="President" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit" style="display:none;" class="btn btn-success" name="submit" id="submit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!--presidential div  ends-->
				
			
		
<!--// vice presidential div begins-->
<?php
				//selection for the post of president
				$selectVp = " SELECT * FROM contestants WHERE `post`='Vice-President'AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($selectVp);
					$stmt->execute();
					$Vp = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "vpmsg"><?php if(!$Vp){echo "NO CANDIDATE REGISTERED FOR VICE-PRESIDENT";}
					else{echo"VOTE YOU CHOICE FOR THE VICE-PRESIDENT"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$Vp)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($Vp as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="showVpSub()" class="btn btn-danger"type="radio" name="Vp" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="Vpsubmit" id="Vpsubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Vice president ends-->


		
<!--// Secretrey div begins-->
<?php
				//selection for the post of secretery
				$selectVp = " SELECT * FROM contestants WHERE `post`='Secretery' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($selectVp);
					$stmt->execute();
					$secc = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "secmsg"><?php if(!$secc){echo "NO CANDIDATE REGISTERED FOR SECRETERY";}
					else{echo"VOTE YOU CHOICE FOR THE SECRETERY"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$secc)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($secc as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="seccSub()" class="btn btn-danger"type="radio" name="sec" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="secsubmit" id="secsubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Secretery ends-->		
			
			
		
<!--// Treasurer div begins-->
<?php
				//selection for the post of secretery
				$selectVp = " SELECT * FROM contestants WHERE `post`='Treasurer' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($selectVp);
					$stmt->execute();
					$tree = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "treemsg"><?php if(!$tree){echo "NO CANDIDATE REGISTERED FOR TREASURER";}
					else{echo"VOTE YOU CHOICE FOR THE TREASURER"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$tree)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($tree as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="treeSub()" class="btn btn-danger"type="radio" name="tree" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="treesubmit" id="treesubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Treasurer ends-->		
					

			
		
<!--// Provost div begins-->
<?php
				//selection for the post of secretery
				$selectVp = " SELECT * FROM contestants WHERE `post`='Provost' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($selectVp);
					$stmt->execute();
					$pro = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "promsg"><?php if(!$pro){echo "NO CANDIDATE REGISTERED FOR PROVOST";}
					else{echo"VOTE YOU CHOICE FOR THE PROVOST"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$pro)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($pro as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="proSub()" class="btn btn-danger"type="radio" name="pro" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="prosubmit" id="prosubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Provost ends-->		
			
			
<!--// Director of sports div begins-->
<?php
				//selection for the post of director of sports
				$sport = " SELECT * FROM contestants WHERE `post`='Director_Of_Sports' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($sport);
					$stmt->execute();
					$sport = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "sportmsg"><?php if(!$sport){echo "NO CANDIDATE REGISTERED FOR DIRECTOR OF SPORTS";}
					else{echo"VOTE YOU CHOICE FOR THE DIRECTOR OF SPORTS"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$sport)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($sport as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="sportSub()" class="btn btn-danger"type="radio" name="sport" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="sportsubmit" id="sportsubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- director of sports  ends-->	


			
<!--// Director of Social div begins-->
<?php
				//selection for the post of director of TransportS
				$social = " SELECT * FROM contestants WHERE `post`='Director_Of_Social' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($social);
					$stmt->execute();
					$social = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "socialmsg"><?php if(!$social){echo "NO CANDIDATE REGISTERED FOR DIRECTOR OF SOCIAL";}
					else{echo"VOTE YOU CHOICE FOR THE DIRECTOR OF SOCIAL"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$social)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($social as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="socialSub()" class="btn btn-danger"type="radio" name="social" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="socialsubmit" id="socialsubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Director of Social ends-->	




			
<!--// Director of transport div begins-->
<?php
				//selection for the post of Director of transport
				$transport = " SELECT * FROM contestants WHERE `post`='Director_Of_Transport' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($transport);
					$stmt->execute();
					$transport = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "transportmsg"><?php if(!$transport){echo "NO CANDIDATE REGISTERED FOR DIRECTOR OF TRANSPORT";}
					else{echo"VOTE YOU CHOICE FOR THE  DIRECTOR OF TRANSPORT"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$transport)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($transport as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="transportSub()" class="btn btn-danger"type="radio" name="transport" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="transportsubmit" id="transportsubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Director of transport ends-->		
			
			

<!--// Disciplinerian div starts-->
<?php
				//selection for the post of Disciplinerian
				$dis = " SELECT * FROM contestants WHERE `post`='Disciplinarian' AND`electbody`='$ahaulo' ORDER BY id DESC";
				try {
					$stmt = $DB->prepare($dis);
					$stmt->execute();
					$dis = $stmt->fetchAll();
				} catch (Exception $ex) {
						echo($ex->getMessage());		
				}
				?>
				


			<div class="clearfix"></div>
				<div class="mens-toolbar">
					<div class="colors animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3 id= "dismsg"><?php if(!$transport){echo "NO CANDIDATE REGISTERED FOR DISCIPLINARIAN";}
					else{echo"VOTE YOU CHOICE FOR THE  DISCIPLINARIAN"; }?>
					</div>
	    		    <div class="clearfix"></div>		
		        </div>
				
						
<div class="mid-popular">
	<form method="post" action="">
			
				
				<?php 
					if (!$dis)
						{
				
						//$Vpmessage="No Candidiate registered";
						//echo "<h2><font color='green'>No Candidiate registered</font></h2> ";
						}
						else
						{
						foreach ($dis as $res) { ?>
						<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>
						<?php 
							$photo = $res['photoname'];
							if((strpos($photo, '.jpg') !== false) || (strpos($photo, '.png') !== false) || (strpos($photo, '.gif') !== false))
							{ 
								echo "<img src='contestphotos/$photo'style='height:200px;'/>";
							}
							else
							{
								echo "<img src='images/co.png'style='height:200px;'/>";
							}
						?>
						</figure></div>
						<div class="women">
						<h6><?php echo $res['fname'] ." ".$res['lname'];?></h6><hr/>
						<div class="form-group"><h3><span class="label label-danger"><input onchange="disSub()" class="btn btn-danger"type="radio" name="dis" value="<?php echo $res['fname'];?>">Vote</span></h3></div>
						</div>
					</div>
				</div>
			
						<?php
						}
						}
						?>
    					
   
					
			<table class='table table-responsive display-table ' width="50%" border="0" cellspacing="0" cellpadding="0"  align="center">
			<tr>
			<td valign="top" align="center">
			<div class="form-group">
						<button type="submit"  style="display:none;" class="btn btn-success" name="dissubmit" id="dissubmit">
						<span class="glyphicon glyphicon-log-in"></span> &nbsp; Confirm your vote
						</button> 
					</div> 
			</td>
			</tr>
			</table>
	</form>
</div><!-- Director of transport ends-->		
			
			
									
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div>

        					<div class="clearfix"></div>
	</div>
</div>
			
		
				
<?php include ("footer.php");?>
<!-- //footer -->
</body>
</html>