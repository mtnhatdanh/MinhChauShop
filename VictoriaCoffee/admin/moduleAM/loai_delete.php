<?php
	$idLoai = $_GET['idLoai'];
	//xoa anh khoi database
	$sql = 'SELECT `hinhdaidien` FROM `dmloai` WHERE `idLoai` = '.$idLoai;
	$rs = mysql_query($sql);
	$r = mysql_fetch_row($rs);
	unlink('../img/sanpham/'.$r[0]);
	
	$sql = "DELETE FROM `dmloai` WHERE `idLoai` = '$idLoai'";
	$rs = mysql_query($sql);
	if($rs) echo('<script>alert("Delete loai $idLoai success!!");</script>');
	else echo('<script>alert("False");</script>');
	header('location:?id=loai_quanly');
?>
