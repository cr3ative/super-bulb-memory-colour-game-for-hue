<?php
require('hue.php');

// Let's make a game board

$colors["red"] = 0;
$colors["pink"] = 60000;
$colors["blue"] = 46920;
$colors["yellow"] = 20000;

$killbulb = $_POST['killbulb'];
$setbulb = $_POST['setbulb'];
$setcolor = $_POST['setcolor'];

if ($setbulb == 1) {
	// Light 1
	if ($killbulb == "true") {
		$color['on'] =  false;
		$color['transitiontime'] = 1;
	} else {
		$color['on'] = true;
		$color['hue'] =  $colors[$setcolor];
		$color['sat'] = 254;
		$color['bri'] = 254;
		$color['transitiontime'] = 1;
	}
	echo setLight(1, $color);
}

if ($setbulb == 2) {
	// Light 2
	if ($killbulb == "true") {
		$color['on'] =  false;
		$color['transitiontime'] = 1;
	} else {
		$color['on'] = true;
		$color['hue'] =  $colors[$setcolor];
		$color['sat'] = 254;
		$color['bri'] = 254;
		$color['transitiontime'] = 1;
	}
	echo setLight(2, $color);
}

if ($setbulb == 3) {
	// Light 3
	if ($killbulb == "true") {
		$color['on'] =  false;
		$color['transitiontime'] = 1;
	} else {
		$color['on'] = true;
		$color['hue'] =  $colors[$setcolor];
		$color['sat'] = 254;
		$color['bri'] = 254;
		$color['transitiontime'] = 1;
	}
	echo setLight(3, $color);
}