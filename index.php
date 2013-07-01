<?php
/**
 * Placeweb
 * A fairly uninspiring placeholder page for your resting VPS instances.
 * You can pass the following GET parameters to spritz things up a bit:
 * 		int compute: Number of hashes to compute.
 */

define('LOCKED-ACCESS',"blech.");

require_once('helpers.php');

// Do something fancy here if you'd like.
$no_extra = TRUE;


$compute_array = array();
$compute_start = time();
$compute_time = FALSE;
$compute_count = FALSE;

if( isset($_GET['compute']) )
{
	$compute_count = intval($_GET['compute']);
	for( $i = 0; $i < $compute_count; $i++ )
	{
		$compute_array[] = helper_generatehash();
	}
	$compute_end = time();
	$compute_time = $compute_end - $compute_start;

	$no_extra = FALSE;
}


?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/css/placeweb.css" media="all" />
	</head>
	<body>
		<h1>Placeweb</h1>
		<div class="wrapper">
			<h2>Box Statistics</h2>
			<p>IP Address: <? echo $_SERVER['SERVER_ADDR']; ?></p>
			<p>Domain: <? echo $_SERVER['HTTP_HOST']; ?></p>
			<p>Protocol: <? echo $_SERVER['SERVER_PROTOCOL']; ?></p>
			<p>Host: <? echo $_SERVER['SERVER_SOFTWARE']; ?></p>
		</div>
		<div class="wrapper">
			<h2>Extra Tests</h2>
			<? if( $no_extra ) { ?> 
				<p style="text-align: center;">None</p>
			<? } ?>
			<? if( $compute_count ) { ?>
				<p>Compute Hashes: <? echo $compute_count; ?> in <? echo $compute_time; ?> seconds.</p>
			<? } ?>
		</div>
	</body>
</html>