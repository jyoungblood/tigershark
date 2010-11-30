<?php
/*
	TIGERSHARK - 0.0.1
	stupid simple key val store for php

	j. youngblood, 2010
	http://github.com/jyoungblood/tigershark/
*/


// config options
$tshrk[dirr] = "./tigershark/";


// oh, php4...what ever are we going to do with you?

if (!function_exists('file_put_contents')) {
	function file_put_contents($fn, $data) {
		$fh = fopen($fn, 'w');
		fwrite($fh, $data);
		fclose($fh);
	}
}

if (!function_exists('file_get_contents')){
	function file_get_contents($fn){
		$fh = fopen($fn, "r");
		$gc = fread($fh, filesize($fn));
		fclose($fh); 
		return $gc;
	}
}


// write, update
function tigershark_put($keyname,$val){
	if (!is_dir($GLOBALS[tshrk][dirr])){
		mkdir($GLOBALS[tshrk][dirr], 0755);
	}
	file_put_contents(
		$GLOBALS[tshrk][dirr].$keyname,
		serialize($val)
	);
}

// read
function tigershark_get($keyname){
	return unserialize(
		file_get_contents($GLOBALS[tshrk][dirr].$keyname) // fixit name back to normal
	);
}

// delete
function tigershark_kill($keyname){
	unlink($GLOBALS[tshrk][dirr].$keyname);
}

?>