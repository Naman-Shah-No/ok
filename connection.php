<?php

$servername="localhost";
$username="root1";
$password="";
$dbname="doodle";

//to create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);

if ($conn) 
{
	 //echo "connection Success";
}
else
{
	//die("Connection Failed " .mysqli_connect_error());
}

?>