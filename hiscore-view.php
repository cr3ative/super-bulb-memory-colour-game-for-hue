<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hue Game</title>
    <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
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
	.table {
		font-size: 1.3em;
	}
	</style>
	<br/>
	<div class="row-fluid">
	
	<div class="span8">
	
	  		<h1 style="font-family:'Dosis',sans-serif;">SUPER BULB MEMORY COLOUR GAME</h1>
	  		<h2 id="secs">THE HUEPERSTARS!</h2>
	  		
	  		<table class="table" style="margin-top: 30px;width:70%;margin-left: auto; margin-right: auto;"><tr><th>Name</th><th>Score</th></tr>
	  		
	  		<?php
	  		
	  		krsort($hiscores);
	  		$scs = 0;
	  		foreach ($hiscores as $hiscore=>$name) {
	  			$scs++;
	  			echo "<tr><td>$name</td><td>$hiscore</td></tr>";
	  			if ($scs > 9) {
	  				break;
	  			}
	  		}
	  		?>
	  		
	  		
	  		</table>
	  		
	  </div>
	  <div class="span4 pull-right">
	  
	  		<img src="lights-small/trophy.png" width="100%"/>
	  
	  </div>
	  
	  </div>
	  		<br/><br/>
	  		<a href="index.html" class="dosis btn btn-large btn-success">Go play, and get your own highscore!</a>
	  		
	</body>
</html>