<?php
	$idDH=$_GET['idDH'];
	$sql='update `nncms_donhang` set `TinhTrang`=-1 where `TinhTrang`=0 AND `idDH`='.$idDH;
	mysql_query($sql);
	header('location:?mod=nguoidung');
?>