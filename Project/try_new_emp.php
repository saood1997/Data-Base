<?php
	include "connect.php";

	$first_name = $_POST["txtfirst_name"];
	$last_name = $_POST["txtlast_name"];
	$contact = $_POST["txtcontact"];
	$type = $_POST["txttype"];
	$address = $_POST["txtAddress"];
	$pass = $_POST["txtpassword"];
	$username = $_POST["txtusername"];

	$qry = "INSERT INTO EMPLOYEE(FIRST_NAME, LAST_NAME, ADDRESS, CONTACT, PASS, USER_NAME, TYPE) VALUES('".$first_name."','".$last_name."', '".$address."','".$contact."', '".$pass."', '".$username."', '".$type."')";

    if ($con->query($qry)) {
		$msg = "Employee Registered";
	}
	else
		$msg = "Error!";
        
	header("Location:new_emp.php?Message=$msg");
    
?>