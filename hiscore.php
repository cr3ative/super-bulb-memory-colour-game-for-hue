<?php
$hiscores = @unserialize(file_get_contents('./hiscores.bin'));

$inmd5 = @$_GET['score'];
$i = -100;
if (isset($_POST['name'])) {
	$inmd5 = $_POST['score'];
}
while ($i < 100) {
	$i++;
	$md5 = md5("SECRETSHIT".$i);
	if ($md5 == $inmd5) {
		$score = $i;
		break;
	}
}
if (isset($_POST['name'])) {
	if (!isset($score)) {
		die("Bad Score Submission");
	}
	$hiscores[$score] = $_POST['name'];
	$fh = fopen('hiscores.bin', 'w') or die("can't open file");
	fwrite($fh, serialize($hiscores));
	fclose($fh);
	include("./hiscore-view.php");
	die();
}
if (!isset($score)) {
	include("./hiscore-view.php");
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
			</style>
	
	  		<h1 style="font-family:'Dosis',sans-serif;">SUPER BULB MEMORY COLOUR GAME</h1>
	  		<img src="lights-small/trophy.png" width="200px"/>
	  		<h2 id="secs" class="dosis">HEY HUEPERSTAR!</h2>
	  		<h2 id="score" class="dosis">LET'S SAVE YOUR SCORE OF: <i><?php echo $score; ?></i></h2>
	  		<hr>
	  		<h2 class="dosis">Your Name</h2>
	  		<form action="hiscore.php" method="POST">
	  		<input type="hidden" name="score" value="<?php echo $inmd5; ?>"/>
	  		<input type="text" style="padding: 20px; font-size: 36px; width: 300px;border: 1px solid black;" name="name"/><br/><br/>
	  		<button type="submit" class="dosis btn btn-large btn-success">Let's do it!</button>
	  		<a href="index.html" class="dosis btn btn-large btn-danger">Maybe not...</a>
	  		</form>
	  		
	  		
	</body>
</html>


