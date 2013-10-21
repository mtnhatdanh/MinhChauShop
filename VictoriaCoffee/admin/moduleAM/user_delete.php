<?php
	$delUser = $_GET['delUser'];
	$sql = "DELETE FROM `users` WHERE `username` = '$delUser'";
	$rs = mysql_query($sql);
	if($rs) echo('<script>alert("Delete user $delUser success!!");</script>');
	else echo('<script>alert("False");</script>');
	header('location:?id=user_quanly');
?>
