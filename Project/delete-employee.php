<?php
	include "connect.php";
    session_start();

    $id = $_GET['id'];

    $qry = "DELETE FROM EMPLOYEE  where EMP_ID = '".$id."'";

    if($con->query($qry)) {
    	header("Location:manage-employees.php");
    }

?>