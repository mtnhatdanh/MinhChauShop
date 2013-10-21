<?php
require('libs/mysql.php');
include('libs/functions.php');
session_start();
ob_start();

//for($i=0;$i<1000000;$i++)sqrt(23434);

$mod=$_GET['mod'];
if($mod=='')$mod='trangchu';
include("modules/$mod.php");
?>