<?php
session_start();
unset ($_SESSION["mysocialid"]);
unset ($_SESSION["email"]);
echo ("<script LANGUAGE='JavaScript'>
									window.alert('Logout success');
									window.location.href='index.php';
									</script>");
?>