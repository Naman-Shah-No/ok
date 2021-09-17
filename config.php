<?php
ob_start();

try{

	$con = new PDO("mysql:dbname=nomeapps;host=localhost", "op", "nomeapps1234");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExpection $e){
	echo "Connection failed: " . $e->getMessage();
}
?>