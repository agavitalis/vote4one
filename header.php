<?php include('inc/session.inc.php');?>


<header>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<!-- Font Awesome Offline -->
    <link rel='stylesheet' href='fa/css/font-awesome.min.css' />
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>
	
<body>
<!-- header -->
	<div class="header" id= "mainwork">
			<div class="header-grid">
					
				<div class="container">
				<div class="header-left animated wow fadeInLeft" data-wow-delay=".5s">
					<ul>
					<li><i class="glyphicon glyphicon-headphones"></i><a href="#">24x7 live support</a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i>+08163922749</li>
						
					</ul>
				</div>
				<div class="header-right animated wow fadeInRight" data-wow-delay=".5s">
				<div class="header-right1 ">
				
				<?php 
			
			if(isset($ahambu))
			{
			echo '<ul>
						<li><i class="glyphicon glyphicon-user" ></i>'.$ahambu.'</li>
						<li><i class="glyphicon glyphicon-log-out" ></i><a href="inc/logout.php">Logout</a></li>
				</ul>';

			}
			else{
				echo'	<ul>
						<li><i class="glyphicon glyphicon-circle-arrow-left" ></i><a href="index.php">Login</a></li>
					</ul>';
					}
			?>
				</div>
				
				<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>
			<div class="container">
			<div class="logo-nav">
				
					<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header nav_2">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							
							<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

							<span class="icon-bar"></span>
						</button>
						 <div class="navbar-brand logo-nav-left wow fadeInLeft animated" data-wow-delay=".5s">
							<h1 class="animated wow pulse" data-wow-delay=".5s"><a href="index.php">Vote<span id="m4">4<span><span>one</span></a></h1>
						</div>

					</div> 
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li ><a href="index.php" class="act">Home</a></li>	
							<!-- Mega Menu -->
							
							<li class="dropdown active">
								<a href='#quickguide' data-toggle='modal' data-target='#quickguide'> Quick Guide</b></a>
							</li>
							
							<li><a href="contact.php">Contact Us</a></li>
						</ul>
					</div>
					</nav>
				</div>
				
		</div>
	</div>
<!-- //header -->
<!-- Quick Guide Modal Starts -->
    <div class='modal fade' id='quickguide' tableindex='1' role='dialog' aria-labelledby='comingSoonLabel' aria-hidden='true'>
    	<div class='modal-dialog'>
        	<div class='modal-content'>
            	
                <div class='modal-header'>
                	<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                    <h4 class='modal-title'> Quick Guide</h4>
                </div>
                
               <div class='modal-body'><p>
                	Vote4one Online Voting Platform is advancely design to solve our All Elections problems,especially in our Universities.
					This platform runs thousands of elections at a time,displaying each results pictorally.
						To get started, <a href="admin/index.php">Register</a> your Election as a client by creating
					an Account where you can manage your contestants and Voters.
						At each successful registeration of a voter and a contestant, their login details are delivered to their
					emails at no cost!.
						At the specified time for the election,Voters login to <a href="www.vote4one.com">Vote4one</a> with their 
					registeration details and then cast their Vote.
						The Results can be seen as the election is going on or at the end of the election,all depending on the choice
					of the Client.</p>
				<p><em>Note:</em><br>
					<ul type="i">
						<li>1.Every Registered Client must be verified and approved by the Admins.</li>
						<li>2.The Admins cannot access the informations provided by the Clients as they are securely encrypted.</li>
						<li>3.All  Elections and All voting Process are done with a high degree of accuracy and security.</li>
						<li>4.All Elections Registered as Conducted by Vote4One must be registered with the correct credentials as Vote4one have no rom for rigging!</li>
						<li>5.Vote for one is commited to serving you better and will not hesitate to delete the account of any malicious Client</li>
						
					</ul>
				</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick Guide Modal Ends -->