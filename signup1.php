<?php
	if(isset($_POST['submit']))
	{
		include "include/dbconnect.php";
		$fname =$_POST['firstname'];
		$lnane =$_POST['lastname'];
		$email =$_POST['email'];
		$gender =$_POST['gender'];
		$bday =$_POST['Birthday'];
		$mobile =$_POST['mobile'];
		$password =md5($_POST['password1']);
		if (!$connect)
		{
			echo ("<script LANGUAGE='JavaScript'>
				window.alert('Connection Failed');
				window.location.href='signup.php';
				</script>");
		}
		else
		{
			$sql = "SELECT email FROM userdata where email='".$email."'";
			$res=mysqli_query($connect,$sql);
			$numrow=mysqli_num_rows($res);

			if($numrow>0)
			{
				echo ("<script LANGUAGE='JavaScript'>
				window.alert('You already have registered with this email');
				window.location.href='signup.php';
				</script>");
			}
			else
			{

                $upload_dir = 'assets/profilepic/'; 
				$allowed_types = array('jpg', 'png', 'jpeg', 'gif');
				//max size set cheyunna
				$maxsize = 10 * 1024 * 1024;
				//image empty ano enn check chyunnu
				if(!empty($_FILES['file']['name'])) {
				$file_tmpname = $_FILES['file']['tmp_name']; 
						$file_name = $_FILES['file']['name']; 
						$file_size = $_FILES['file']['size']; 
						$file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
						// Set upload file path 
						$filepath = $upload_dir.$file_name;
						// Check file type is allowed or not 
						if(in_array(strtolower($file_ext), $allowed_types)) {
							// Verify file size - 10Mb max 
							if ($file_size > $maxsize){
								echo "Error: File size is larger than the allowed limit.";
							}
							// renaming file name with time
							$filepath = $upload_dir.time().$file_name;
							if(move_uploaded_file($file_tmpname, $filepath))
							 {
				
				
				                 $insert="insert into userdata(first_name,last_name,email,gender,phone,password,dob,profile_pic)
				                  values('$fname','$lnane','$email','$gender','$mobile','$password','$bday','$filepath')";
				           
				            if(mysqli_query($connect,$insert))
				                {
					           echo ("<script LANGUAGE='JavaScript'>
					           window.alert('Account Created Success');
							   window.location.href='index.php';
					           </script>");
				                 }
				               else
				               {
					             echo "Error:";
					             echo mysqli_error($connect);
				                }
				
			           }                    
		            }
	            }
	        }
	    }
	}
