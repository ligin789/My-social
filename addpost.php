<?php
include "include/header.php";
if ($_SESSION["mysocialid"] == session_id()) {


	if (isset($_POST['newssubmit'])) {
		$id = $_SESSION["id"];
		$news = $_POST['about'];
		$file = $_POST['file'];


		$upload_dir = 'assets/post/';
		$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
		//max size set cheyunna
		$maxsize = 10 * 1024 * 1024;
		//image empty ano enn check chyunnu
		if (!empty($_FILES['file']['name'])) {
			$file_tmpname = $_FILES['file']['tmp_name'];
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
			// Set upload file path 
			$filepath = $upload_dir . $file_name;
			// Check file type is allowed or not 
			if (in_array(strtolower($file_ext), $allowed_types)) {
				// Verify file size - 10Mb max 
				if ($file_size > $maxsize) {
					echo "Error: File size is larger than the allowed limit.";
				}
				//finding the extension of file
				$fileextension=strtolower($file_ext);
				if()
				{
					
				}
				// renaming file name with time
				$date = date("y-m-d");
				$filepath = $upload_dir . time() . $file_name;
				if (move_uploaded_file($file_tmpname, $filepath)) {
					$insertsql = "INSERT INTO `post_table`(`news`, `url`, `date`, `user`)
					  VALUES ('$news','$filepath','$date','$id')";
					$insertresult = mysqli_query($connect, $insertsql);
				}
			}
		}
	} else {
	}
} else {
}
