<?php
	$idLoai = $_GET['idLoai'];
	$idMon = $_GET['idMon'];
	//xoa anh khoi database
	$sql = 'SELECT `urlhinh` FROM `dmmon` WHERE `idMon` = '.$idMon;
	$rs = mysql_query($sql);
	$r = mysql_fetch_row($rs);
	unlink('../img/sanpham/'.$r[0]);
	
	$sql = "DELETE FROM `dmmon` WHERE `idMon` = '$idMon'";
	$rs = mysql_query($sql);
	if($rs) echo('<script>alert("Delete mon $idMon success!!");</script>');
	else echo('<script>alert("False");</script>');
	header('location:?id=mon_quanly&idLoai='.$idLoai);
?>
