<?php
/**
 * Placeweb
 * A fairly uninspiring placeholder page for your resting VPS instances.
 * You can pass the following GET parameters to spritz things up a bit:
 * 		int compute: Number of hashes to compute.
 */

define('LOCKED-ACCESS',"blech.");

require_once('helpers.php');

$no_extra = TRUE;

$compute_array = array();
$compute_start = time();
$compute_time = FALSE;
$compute_count = FALSE;

$data = new stdClass;

if( file_exists('data.json') ) 
{
	$data = json_decode(file_get_contents('data.json'));
}

if( isset($_GET['set-welcome']) )
{
	$data->welcome = $_GET['set-welcome'];
}

if( isset($_GET['set-bgcolor']) )
{
	$data->bgcolor = $_GET['set-bgcolor'];
}



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

$refresh = FALSE;
if( isset($_GET['refresh']) AND $_GET['refresh'] )
{
	$no_extra = FALSE;
	$refresh = intval($_GET['refresh']);
}

$welcome = "Placeweb";
$bgcolor = 'efefef';

if( isset($data->welcome) ) 
	$welcome = $data->welcome;

if( isset($data->bgcolor) )
	$bgcolor = $data->bgcolor;

// Write our changes.

$warning = FALSE;

if( ! file_put_contents('data.json', json_encode($data)) ) {
	$warning = 'COULD NOT WRITE DATA FILE!';
}

?>
<!DOCTYPE html>
<html style="background: #<? echo $bgcolor; ?>;">
	<head>
		<link rel="stylesheet" type="text/css" href="/css/placeweb.css" media="all" />
	</head>
	<body style="background: #<? echo $bgcolor; ?>;">
		<? if( $warning ) { echo '<h2>'.$warning.'</h2>'; } ?>
		<h1><? echo $welcome; ?></h1>
		<div class="wrapper">
			<h2>Box Statistics</h2>
			<p>IP Address: <? echo $_SERVER['SERVER_ADDR']; ?></p>
			<p>Domain: <? echo $_SERVER['HTTP_HOST']; ?></p>
			<p>Protocol: <? echo $_SERVER['SERVER_PROTOCOL']; ?></p>
			<p>Host: <? echo $_SERVER['SERVER_SOFTWARE']; ?></p>
			<p>Index Path: <? echo __FILE__; ?></p>
			<p>Server Time: <? echo date("Y-m-d g:i:s a"); ?></p>
		</div>
		<div class="wrapper">
			<h2>Extra</h2>
			<? if( $no_extra ) { ?> 
				<p style="text-align: center;">None</p>
			<? } ?>
			<? if( $compute_count ) { ?>
				<p>Compute Hashes: <? echo $compute_count; ?> in <? echo $compute_time; ?> seconds.</p>
			<? } ?>
			<? if( $refresh ) { ?>
				<p>Page will refresh in <? echo $refresh; ?> seconds.</p>
			<? } ?>
		</div>
		<? if( $refresh ) { ?>
			<script type="text/javascript">
				window.onload = function() {
					setTimeout((function() {
						window.location.reload();
					}), <? echo ( $refresh * 1000 ); ?> );
				}
			</script>
		<? } ?>
	</body>
</html>
