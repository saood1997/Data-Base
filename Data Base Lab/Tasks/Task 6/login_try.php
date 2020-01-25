<?php
    include "connect.php";
    session_start();

    $user = $_POST["txtUser"];
    $pass = $_POST["txtPass"];
    
    $qry = "SELECT * FROM users WHERE name = '".$user."'";
    $res = $con->query($qry);

    $msg = "";
    if($res->num_rows > 0)
    {
        $row = $res->fetch_assoc();
        if($row["pass"] == $pass)
        {
            $_SESSION["user"] = $user;
            header("Location:pic.php");
        }
        else
        {            
            $msg = "Invalid password";
            header("Location:login.php?Message=$msg");
        }
    }
    else
    {
        $msg = "The Username: ".$user." does not exist!";
        header("Location:login.php?Message=$msg");
    }
?>
