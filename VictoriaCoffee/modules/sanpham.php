<div id="maincontent">
<?php
	require_once("../lb/connect.php");
	
	$idLoai = $_GET['idLoai'];
	//lay so dmloai lon nhat

	$sql1 = "select MAX(`idLoai`) as maxloai from `dmloai`";
	$rs1 = mysql_query($sql1);
	$r1 = mysql_fetch_assoc($rs1);
	
	$idLoai = min(max(1,$idLoai),$r1['maxloai']);
	//Dem tong so dong
	
	$sql1 = "select count(*) as tongso from `dmmon` where `idLoai`=$idLoai and `anhien`=1";
	$rs1 = mysql_query($sql1);
	$r1 = mysql_fetch_assoc($rs1);
	$tongso = $r1['tongso'];
	$icondong = 4;
	$sodong = ceil($tongso/$icondong);
	
	//lay du lieu trong database
	$sql1 = "select `tenmon`,`urlhinh` from `dmmon` where `idLoai`=$idLoai and `anhien`=1";
	$rs1 = mysql_query($sql1);
	
	for($i=1;$i<=$sodong;$i++)
	{
?>
	<div class="sanpham_container">
		<?php
			for($j=1;$j<=$icondong;$j++)
			{
				$r1=mysql_fetch_assoc($rs1); 
		?>
		<div class="sanpham">
	    	
	        <img src="img/sanpham/<?php echo $r1['urlhinh'];?>" alt="" <?php if(($i-1)*$icondong+$j>$tongso) echo('hidden="true"')?>/>
	        <div class="tenSP"><strong><?php echo $r1['tenmon'];?></strong></div>
	    </div>
	    <?php
			}
		?>
	</div>
	<?php } ?>
</div>