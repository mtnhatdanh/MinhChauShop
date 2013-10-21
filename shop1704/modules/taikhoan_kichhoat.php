<?php
	$email=$_GET['email'];
	$code=$_GET['code'];
	//Kiem tra email & code co hop le hay khong
	$sql="select 1 from `nncms_nguoidung` where `email`='$email' AND `MaNgauNhien`='$code'";
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)>0)//Email & code hợp lệ
	{
		$sql="update `nncms_nguoidung` set `KichHoat`=1 where `email`='$email'";
		if(mysql_query($sql))
		echo 'Tài khoản của bạn đã được kích hoạt. Hãy đăng nhập và sử dựng !';
	}
	else
	echo 'Thông tin kích hoạt tài khoản không đúng ';
?>