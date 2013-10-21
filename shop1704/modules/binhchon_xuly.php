<?php

$id=$_POST['luachon'];
$sql='update `nncms_binhchon_luachon` set `vote`=`vote`+1 where `id`='.$id;
mysql_query($sql);

header('location:?mod=binhchon_ketqua');

?>