// fetching records
//selection for president

	$(document).ready(function(){
	$("#submit").click(function(){
	var President =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " + President+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "President="+President,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#msg").html("You have successfully voted for the President");
					$("#submit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("submit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#submit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("submit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
		
		
		
		
		
//selection for vice- president

$(document).ready(function(){
	$("#Vpsubmit").click(function(){
	var Vp =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +Vp+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "Vp="+Vp,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#Vpsubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#vpmsg").html("You have successfully voted for the Vice-President");
					$("#Vpsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("Vpsubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#Vpsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("Vpsubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
		
		
		
		
		

//selection for secretery

$(document).ready(function(){
	$("#secsubmit").click(function(){
	var sec =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +sec+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "sec="+sec,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#secsubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#secmsg").html("You have successfully voted for the Secretery");
					$("#secsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("secsubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#secsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("secsubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
		
		
				

//selection for treasurer

$(document).ready(function(){
	$("#treesubmit").click(function(){
	var tree =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +tree+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "tree="+tree,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#treesubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#treemsg").html("You have successfully voted for the Secretery");
					$("#treesubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("treesubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#treesubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("treesubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
		
		
				
						
//selection for provost

$(document).ready(function(){
	$("#prosubmit").click(function(){
	var pro =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +pro+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "pro="+pro,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#prosubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#promsg").html("You have successfully voted for the Secretery");
					$("#prosubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("prosubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#prosubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("prosubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
			






$(document).ready(function(){
	$("#sportsubmit").click(function(){
	var sport =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +sport+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "sport="+sport,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#sportsubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#sportmsg").html("You have successfully voted for the Secretery");
					$("#sportsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("sportsubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#sportsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("sportsubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
			

/////////////////////////////
///////DIRECTOR OF SOCIAL////
/////////////////////////////
$(document).ready(function(){
	$("#socialsubmit").click(function(){
	var social =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +social+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "social="+social,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#socialsubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#socialmsg").html("You have successfully voted for Director Of Social");
					$("#socialsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("socialsubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#socialsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("socialsubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
			


////////////////////////////////
///////DIRECTOR OF TRANSPORT////
////////////////////////////////
$(document).ready(function(){
	$("#transportsubmit").click(function(){
	var transport =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +transport+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "transport="+transport,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#transportsubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#transportmsg").html("You have successfully voted for Director Of Transport");
					$("#transportsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("transportsubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#transportsubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("transportsubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
			

////////////////////////////////
///////DISCILPINARIAN
////////////////////////////////
$(document).ready(function(){
	$("#dissubmit").click(function(){
	var dis =$('input[type="radio"]:checked').val();
	if($('input[type="radio"]:checked').length == "0")
		{
		alert("Pls select a Contestant");
		}
	else
	{
		var confirming =   confirm("Your Choosed  " +dis+", are You sure? ");
		if(confirming){

	$.ajax({
	type: "POST",
	url: "./inc/added.php",//target php file for processsing
	data: "dis="+dis,//data to be sent to the php 
	//asycn:false,
			beforeSend: function()
			{	
				$("#dissubmit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; Voting ...');
			},

				success: function(response)
				{
					if( response==1)
					{
					$("#dismsg").html("You have successfully voted for Director Of Transport");
					$("#dissubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp; Voted');
					document.getElementById("dissubmit").disabled=true;			
					alert("Your Vote have been successfully recorded")
					}
						else
						{
						$("#dissubmit").html('<span class="glyphicon glyphicon-saved"></span> &nbsp;You av already Voted, You only Vote once!');
						document.getElementById("dissubmit").disabled=true;
						//alert(response)
						}
				}

		});
			}

	else{
	alert("You did not make up your mind")
		}
	}
								return false;
	});
});
			

		
			
			
			
			





			
		
		
////////////////////////////////////////////
///////////hiding submit button div////////
///////////////////////////////////////////
		
		
		
function showSub(){
    document.getElementById('submit').style.display = "block";
} 
function showVpSub(){
    document.getElementById('Vpsubmit').style.display = "block";
} 
	function seccSub(){
    document.getElementById('secsubmit').style.display = "block";
}
	function treeSub(){
    document.getElementById('treesubmit').style.display = "block";
}
function proSub(){
    document.getElementById('prosubmit').style.display = "block";
}		
function sportSub(){
    document.getElementById('sportsubmit').style.display = "block";
}	
function socialSub(){
    document.getElementById('socialsubmit').style.display = "block";
}	
function transportSub(){
    document.getElementById('transportsubmit').style.display = "block";
}
function disSub(){
    document.getElementById('dissubmit').style.display = "block";
}		