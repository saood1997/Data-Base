<?php
	include "connect.php";
    session_start();

    $id = $_GET['id'];

    $qry = "DELETE FROM PRODUCTS  where PROD_ID = '".$id."'";

    if($con->query($qry)) {
    	header("Location:stock.php");
    }

?>
