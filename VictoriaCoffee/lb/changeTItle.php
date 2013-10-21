<?php
	require('catdautiengViet.php');
	function changeTitle ($title) {
		$kq = stripUnicode($title);
		$arr = array("?","&","'",'"',"+");
		$kq = str_replace($arr, '', $kq);
		$kq = str_replace('  ',' ', $kq);
		$kq = trim($kq);
		$kq = mb_convert_case($kq, MB_CASE_TITLE,'utf-8');
		$kq = str_replace(' ', '-', $kq);
		return $kq;
	}
?>