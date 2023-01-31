<?php
$host="127.0.0.1";
$dbuser="root";
$dbpass="";
$db="sacco";
$conn=mysqli_connect($host,$dbuser,$dbpass,$db) ;

if(!mysqli_connect($host,$dbuser,$dbpass))
{
	exit("Error: Database connection not established!!");
}
?>