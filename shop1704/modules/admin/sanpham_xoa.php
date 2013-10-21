<?php
	$idSP=$_GET['idSP'];
	$sql='select `UrlHinh` from `nncms_sanpham` where `idSP`='.$idSP;
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
	//Xoa file hình
	unlink('images/sanpham/'.$r['UrlHinh']);
	
	//Xóa sản phẩm		
	$sql="delete from `nncms_sanpham` where `idSP`=$idSP";
	mysql_query($sql);
	header('location:?mod=sanpham');
?>
