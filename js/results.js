  							
 // fetching 
	
	function President(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/president.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#no').html('Loading...');
										document.getElementById('no').style.display = "none";
                                    },
                                    success: function(data) {
									document.getElementById('no').style.display = "block";
                                    $("#no").html(data);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}

///////vice president
	function Vpp(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/vpp.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#no').html('Loadinnnnnnng...');
                                    },
                                    success: function(data) {
									//document.getElementById('yes').style.display = "none";
                                    $("#no").html(data);
									alert(data)		
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}

function Sec(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/no.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#no').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#no").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}

$(document).ready(function(){
	$("#Vpsubmit").click(function(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/vpp.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#no').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#no").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
	});
});	

$(document).ready(function(){
	$("#Vpsubmt").click(function(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/president.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#no').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#no").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
	});
});	

function DOT(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/no.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#yes').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#yes").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}


function DOST(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/no.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#yes').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#yes").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}


function DIS(){
                            function displayRecordsuni(numRecords, pageNum) {
                                $.ajax({
                                    type: "GET",
                                    url: "./jw/no.php",
                                    data: "show=" + numRecords + "&pagenum=" + pageNum,
                                    cache: false,
                                    beforeSend: function() {
                                        $('#yes').html('Loading...');
                                    },
                                    success: function(html) {
                                    $("#yes").html(html);
										
                                    }
                                });
                            }

        // used when user change row limit
                            function changeDisplayRowCountuni(numRecords) {
                                displayRecordsuni(numRecords, 1);
                            }

                            $(document).ready(function() {
                                displayRecordsuni(8, 1);
                            });							
		
}

													