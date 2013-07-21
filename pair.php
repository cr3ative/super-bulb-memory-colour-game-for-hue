<?php
include("hue.php");
if (@$_GET['mode'] == "pair") {
	$bridge = $_GET['bridge'];
	try {
		echo register();
		$color['on'] = true;
		$color['hue'] =  0;
		$color['sat'] = 254;
		$color['bri'] = 254;
		$color['transitiontime'] = 1;
		setLight(2,$color);
	} catch (Exception $e) {
		echo json_encode(array("FATAL"));
	}
	die();
}
if (@$_GET['mode'] == "save") {
	$bridge = $_GET['bridge'];
	$fh = fopen('config.json', 'w') or die("can't open file");
	$status = fwrite($fh, json_encode(array("bridge"=>$bridge)));
	fclose($fh);
	if ($status) {
		echo "Saved config!";
	} else {
		echo "Trouble writing :(";
	}
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
			#explain {
				font-size: 1.5em;
				padding-bottom: 20px;
			}
			</style>
	
	  		<h1 style="font-family:'Dosis',sans-serif;">SUPER BULB MEMORY COLOUR GAME</h1>
	  		<h2 class="dosis">LET'S PAIR</h2>
	  		
	  		<form action="configure.php" method="POST">
	  		<Br/>
	  		
	  		<p id="explain">Please press the button on the front of your hue bridge now!</p>
	  		
	  		<div id="pow" class="btn btn-large">I've pressed the button!</div>
	  		
	  		<div id="bridges">
	  		
		  		<script>
		  			$('#pow').click(function() {
		  			$('#bridges').html("Contacting Bridge...");
		  			$.ajax({
		  					type: 'GET',
		  					url: 'pair.php?mode=pair&bridge=<?php echo $_GET['bridge'];?>',
		  					contentType: "application/json; charset=utf-8",
		  					dataType: "json",
		  					success: function(data) { 
		  						if (data[0]['error']) {
		  							$('#bridges').html("Link button not pressed - please press the link button on the front.");
		  						}
		  						if (data[0]['success']) {
		  							$('#bridges').html("Successfully paired to Bridge! Did Light 2 turn red?");
		  							$('#save').show();
		  							$('#cancel').show();
		  						}
		  						if (data == "FATAL") {
		  							$('#bridges').html("Couldn't contact the Bridge :(");
		  						}
		  						console.log(data);
		  					}
		  				});
		  			});
		  		</script>
	  		
	  		</div>
	  		
	  		<Br/><br/>
	  		
	  		<a id="save" style="display: none;" class="btn btn-large btn-success" href="pair.php?mode=save&bridge=<?php echo $_GET['bridge'];?>">Yes - Save Configuration!</a>
	  		
	  		<a id="cancel" style="display: none;" class="btn btn-large btn-warning" href="configure.php">No - Start Again</a>
	  		
	  		</form>	  		
	  		
	</body>
</html>