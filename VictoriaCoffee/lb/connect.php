<?php
	$result = NULL;
	$host = 'localhost';
	$user = 'victoriacoffee';
	$pass = 'victoriacoffee';
	$dbname = 'VictoriaCoffee';
	
	mysql_connect($host,$user,$pass) or die('Ket noi loi sql');
	mysql_select_db($dbname) or die('Ket noi loi database');
	mysql_query("SET NAMES 'utf8'");
?>