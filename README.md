tigershark!
=====

#### stupid simple key/val store for php ####

For those times when you need some _very basic_ CRUD functionality without all the overhead of using an actual database. If you know how to work with arrays, this is cake.

If you're into the idea of NoSQL, but don't need the hardcore db features, don't want to spend any time on server configuration, or don't need to store documents, then this is probably something you'll like.

### server requirements ###
PHP 4+

### installation ###

(1) Upload _tigershark.php_ to your server. 

(2) Configure the path (in _tigershark.php_) where you want your data stored:

	$tshrk[dirr] = "tigershark/";

(3) Require tigershark in whatever file you want to use it:

	require("tigershark.php"); 
	
(4) Profit.


### example usage ###

(1) Add your data with a key name:
	
	tigershark_put("keyname","this is, like, the coolest song i've ever heard in my whole life");

(2) Get your data:
	
	$fancydata = tigershark_get("keyname");

(3) Add your data as an array, nested it however deep you like:

	$css[body][bgcolor] = "#fff;";
	$css[body][color] = "#000;";
	$css[a][color] = "#f00";
	$css[a][textdecoration] = "none";
	
	tigershark_put("fancycss",$css);

(4) Get it:

	$fancycss = tigershark_get("fancycss");
	
	echo $fancycss[a][color];

(5) Delete it:

	tigershark_kill("keyname");



### notes ###

* This is not secure...at all. It's just serialized data being written (unencrypted) to the file system, so anyone with ftp access could read it. __Don't put sensitive data in here.__ I mean, you can encrypt whatever you want before you stick it in, but it's still not _that_ secure.

* If you're performance-conscious, you should be clever with how you use this. Each read/write uses a file on the disk, so if you have a lot of variables, you'll obviously want to nest some arrays and only read/write that data once.