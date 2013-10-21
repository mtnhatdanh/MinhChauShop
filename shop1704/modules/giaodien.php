<?php
	$themes=array(1=>'blue','green','orange','purple');
	$theme=max(1,round($_GET['theme']));
	//Đặt vào cookie
	setcookie('shop_theme',$themes[$theme],time()+3600*24*7);
	//Chuyển trang chủ
	header('location:index.php');
	
?>