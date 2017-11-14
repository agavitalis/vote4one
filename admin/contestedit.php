<?php
include('../inc/session.inc.php');

if(!$_SESSION['electbody'])
{ 
header("Location: clogin.php");
}
?>
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
<?php include ("../inc/footer.php");?>
</body>
</html>