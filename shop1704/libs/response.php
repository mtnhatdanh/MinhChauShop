<?php
	//echo date('d/m/Y H:i:s');
	require('mysql.php');
	$Email=$_GET['Email'];
	$sql="select 1 from `nncms_nguoidung` where `email`='$Email'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0)
		echo '<img width="16" src="images/deny.png" align="absmiddle" /><span style="color:red"> Email đã được đăng ký. Hãy dùng email khác !</span>';
	else
		echo '<img width="16" src="images/accept.png"align="absmiddle"  /><span style="color:blue"> Bạn có thể sử dụng email này !</span>';
?>