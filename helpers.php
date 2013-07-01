<?php defined('LOCKED-ACCESS') or die('No direct access allowed.');

function helper_generatehashfast()
{
	$hash = md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time());

	return $hash;
}

function helper_generatehash()
{
	// Source for hash.
	$hash = md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time()).
			md5(time().rand(1000,9999).microtime().rand(1000,9999).time());

	for( $a = 0; $a < 1000; $a++ ) {
		$hash = md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32))).
				md5(substr($hash,rand(0,223),rand(0,32)));
	}

	return $hash;
}

function helper_generateshorthashfast()
{
	$hash = helper_generatehashfast();
	
	$len = strlen($hash);
	
	return substr($hash,rand(0,($len - 65)),rand(1,64));
}

function helper_generateshorthash()
{
	$hash = helper_generatehash();

	$len = strlen($hash);

	return substr($hash,rand(0,($len - 65)),rand(1,64));
}