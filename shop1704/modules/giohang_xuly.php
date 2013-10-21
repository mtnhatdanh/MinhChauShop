<?php
	$act=$_GET['act'];
	$idSP=$_GET['idSP'];
	//Lay gio hang tu session
	$cart=$_SESSION['cart'];
	
	//Them SP co $idSP vao gio hang
	if($act==1)	$cart[$idSP]++;
	
	//Xoa SP co $idSP vao gio hang
	if($act==2) unset($cart[$idSP]);
	
	//Them nhieu SP $idSP vao gio hang
	if($act==3)
	{
		$qty=max(1,round($_GET['qty']));
		$cart[$idSP]+=$qty;
	}
	if($act==4)//Cap nhat gio hang
	{
		//$cart=$_POST;
		//print_r($_POST);
		//echo '<br/>';
		//print_r($cart);
		foreach($cart as $k=>$v)
		{
			$cart[$k]=max(1,round($_POST[$k]));
		}
	}
	//Cat gio hang sau khi da them san pham vao lai session
	$_SESSION['cart']=$cart;
	//print_r($cart);
	header('location:?mod=giohang');
?>