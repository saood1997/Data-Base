<?php

	include "connect.php";

	session_start();

	$user = $_POST["user_name"];
	$pass = $_POST["password"];

	$qry = "select * from CUSTOMER where USER_NAME = '".$user."';";

	$res = $con->query($qry);


	$msg = "";
	if($res->num_rows > 0) { //user exixts
		$row = $res->fetch_assoc();

		if($row["PASS"] == $pass) {
			//$msg = "Valid Username and Password";
			$_SESSION["id"] = $row["CUS_ID"];

			$_SESSION["name"] = $row["FIRST_NAME"];

			header("Location:customer-home.php");
		} else {
			$msg = "Invalid Username or Password";
			header("Location:login.php?Message=$msg");
		}

	} else {

		$qry = "select * from EMPLOYEE where USER_NAME = '".$user."';";

		$res = $con->query($qry);

		$msg = "";
		if ($res->num_rows > 0) {
			$row = $res->fetch_assoc();

			if ($row["PASS"] == $pass) {
				$_SESSION["type"] = $row["TYPE"];
				$_SESSION["id"] = $row["EMP_ID"];
				$_SESSION["name"] = $row["FIRST_NAME"];

				header("Location:employee.php");
			} else {
				$msg = "Invalid Username or Password";
				header("Location:login.php?Message=$msg");
			}
		} else { //user doesnot exist
			$msg .= "The username ".$user." does not exist";
			header("Location:login.php?Message=$msg");
		}

	}
?>