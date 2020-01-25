<?php
	include "connect.php";

	$course_code = $_POST["txtcourse_code"];
	$course_name = $_POST["txtcourse_name"];
	$credit_hours = $_POST["txtcredit_hours"];

	$qry = "INSERT INTO courses VALUES('".$course_code."','".$course_name."', '".$credit_hours."')";
	//echo $qry;
	
	if ($con->query($qry)) {
		$msg = "Student Registered";
	}
	else
		$msg = "Error!";

    //echo $msg;
        
	header("Location:registration.php?Message=$msg");
?>
 
