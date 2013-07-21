<?php
if (@$_GET['mode'] == "scan") {
	echo file_get_contents("https://www.meethue.com/api/nupnp");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hue Game</title>
    <link href="bootstrap-combined.min.css" rel="stylesheet">
    <link href="huehueheu.css" rel="stylesheet">
    <script src="jquery.min.js"></script>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; 
    maximum-scale=1.0;"/>
    <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
    <script type='application/javascript' src='fastclick.js'></script>
   </head>
	<body>
			<style>
			body {
				text-align: center;
			}
			#bridges {
				margin-top: 40px;
			}
			.ips {
				width: 500px;
				margin-left: auto;
				margin-right: auto;
			}
			.cme {
				text-align: center !important;
			}
			</style>
	
	  		<h1 style="font-family:'Dosis',sans-serif;">SUPER BULB MEMORY COLOUR GAME</h1>
	  		<h2 class="dosis">LET'S BRIDGE</h2>
	  		
	  		<form action="configure.php" method="POST">
	  		<Br/>
	  		
	  		<div id="pow" class="btn btn-large">Scan for Hue Bridges</div>
	  		
	  		<div id="bridges">
	  		
		  		<script>
		  			$('#pow').click(function() {
		  			$('#bridges').html("Scanning...");
		  			$.ajax({
		  					type: 'GET',
		  					url: 'configure.php?mode=scan',
		  					contentType: "application/json; charset=utf-8",
		  					dataType: "json",
		  					success: function(data) { 
		  						$('#bridges').html("<p class='explain'>You'll find the hardware ID on the back of your Hue Bridge!</p><table class='table ips' id='table'><tr><th>Hardware ID</th><th>IP Address</th><th></th></tr></table>");
		  						$.each(data, function( key, value ) {
			  						 console.log(value);
			  						$("#table").append("<tr><td>"+value.id+"</td><td>"+value.internalipaddress+"</td><td class='cme'><a class='btn btn-success' href='pair.php?bridge="+value.internalipaddress+"'>Use This Bridge</a></tr>");
			  					});
		  					}
		  				});
		  			});
		  		</script>
	  		
	  		</div>
	  		
	  		</form>	  		
	  		
	</body>
</html>