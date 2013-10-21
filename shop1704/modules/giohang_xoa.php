<?php
$idSP=$_GET['idSP'];
//Lay gio hang tu session
$cart=$_SESSION['cart'];

//$cart=array(1=>2,5=>6,320=>3,13=>10,50=>2);
//Xoa SP co $idSP vao gio hang
unset($cart[$idSP]);
//Cat gio hang sau khi da them san pham vao lai session
$_SESSION['cart']=$cart;
//print_r($cart);
header('location:?mod=giohang');
?>