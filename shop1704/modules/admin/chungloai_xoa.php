<?php
	$idCL=$_GET['idCL'];
	$sql='delete from `nncms_chungloai` where `idCL`='.$idCL;
	mysql_query($sql);
	header('location:?mod=chungloai');
?>