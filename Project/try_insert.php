<?php
    include "connect.php";
    session_start();

  	$ProName = $_POST["pro_name"];
  	$price = $_POST["price"];
  	$qunatity = $_POST["qunatity"];
  	$pic = $_POST["pic_path"];
    $pic_path = "images/$pic";
    $suplier = $_POST["supplier"];


  	$qry = "insert into PRODUCTS (NAME,PRICE,QUANTITY,PIC_PATH,SUPP_ID) values('".$ProName."', '".$price."', '".$qunatity."','".$pic_path."','".$suplier."');";

	  $con->query($qry);

  	header("Location:stock.php");
?>
