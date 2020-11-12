<?php
session_start();
					if (isset($_POST['submit'])) {
						include "include/dbconnect.php";
						$password = md5($_POST['pass'])	;
						$email = $_POST['email'];
						$admin = "SELECT * FROM userdata WHERE email = '$email' AND password = '$password' AND status != '0' ";
						$res = mysqli_query($connect, $admin);

						if (mysqli_num_rows($res) > 0) {
							while ($row = mysqli_fetch_assoc($res)) {
								$upass= $row['password'];
								$uemail = $row['email'];
								$uname=$row['first_name'];
								$ustatus = $row['status'];
								$_SESSION["mysocialid"] = session_id();
								$_SESSION["id"] =$row['uid'];
							}
							if ($uemail == $email && $upass == $password) {
								if ($ustatus == 2) {
									echo ("<script LANGUAGE='JavaScript'>
									window.alert('Welcome Admin');
									window.location.href='#';
									</script>");
								} elseif ($ustatus == 1) {
									echo ("<script LANGUAGE='JavaScript'>
									window.alert('Welcome $uname');
									window.location.href='newsfeed.php';
									</script>");

								}
								elseif ($ustatus == 0) {
									session_destroy();
									echo ("<script LANGUAGE='JavaScript'>
									window.alert('Your account have been blocked by admin');
									window.location.href='index.php';
									</script>");
									
								} 
								elseif ($ustatus == 3) {
									session_destroy();
									echo ("<script LANGUAGE='JavaScript'>
									window.alert('Your account have been deleted By yourself');
									window.location.href='index.php';
									</script>");
									
								}else {
									session_destroy();
									echo ("<script LANGUAGE='JavaScript'>
									window.alert('No account found');
									window.location.href='index.php';
									</script>");
								}
							}
						} else {
							echo ("<script LANGUAGE='JavaScript'>
									window.alert('Password or username incorrect');
									window.location.href='index.php';
									</script>");
						}
					}
