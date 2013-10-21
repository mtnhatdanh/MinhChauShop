<?php 
	$sql = 'SELECT `noidung` FROM `noidung` WHERE `idtrang` = 3';
	$rs = mysql_query($sql);
	$r = mysql_fetch_row($rs);
	
	echo $r[0];
?>