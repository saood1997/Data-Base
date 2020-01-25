<?php 

	include "connect.php";

	session_start();

	$fName = $_POST["first_name"];
	$lName = $_POST["last_name"];
	$pass = $_POST["password"];
	$username = $_POST["username"];
	$contact = $_POST["contact"];
	$address = $_POST["address"];


	$qry = "update CUSTOMER set FIRST_NAME = '".$fName."', LAST_NAME = '".$lName."', ADDRESS = '".$address."', CONTACT = '".$contact."', PASS = '".$pass."', USER_NAME = '".$username."' where CUS_ID = '".$_SESSION["id"]."';";

	echo $qry;

	$con->query($qry);

	header("Location:customer-home.php");
?>