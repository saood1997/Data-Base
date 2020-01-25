<?php
	if(isset($_post["upload"])){
		$file_name = md5(rand().$FILES["image"]["name"]);
		$temp_name = $FILES["image"]["temp_name"]);
		$target_path = "images/".$file_name;
		$text = $_post["text"];
		session_start();
		$user = $_session["user"];
		$f_type=$_FILES['image']['type'];

		$qry = "insert into pic values ('".$user."','".$target_path."')";
		if($error == False){
			if(move_uploaded_files($temp_name,$target_path)){
				$con->query($query_upload);
				$msg = "image is successfully uploaded";
			}
			else{
				$msg = "image is not uploaded";
			}
			header("Location:pic.php?Message=$msg");
		}
		else{
			$msg = "it is not image";
			header("Location:pic.php?Message=$msg");
		}
	}


?>
