<style>
	#user_update {
		padding: 3em 0 3em 0;
	}
	 .siginput {
	 	font-size: 0.85em;
		line-height: 1.8em;
		width: 20em;
		display: block;
		margin-top: auto;
		margin-bottom: auto;
		padding: 0.5em;
		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		border-radius: 7px;
	}
	table {
		border-collapse: collapse;
	}
	table td {
		border: none;
	}
	table#dangky {
		width: 90%;
	}
	
	table#dangky td {
		vertical-align: middle;
		height: 3.1em;
	}
	
	table#chgpassTab td {
		height: 1.5em;
	}	
	.parsley-success {
		background: #dff0d8;
	}
	.parsley-error {
		background: #f2dede;
	}
	#ChangePass {
		width: 40%;
		padding: 2em;
	}
	


</style>


<!-- Script -->

<!--  Validation Script -->	
<script type="text/javascript" src="../js/parsley.js"></script>



<?php 
	$idLoai = $_GET['idLoai'];
	$idMon = $_GET['idMon'];
	$sql = "SELECT a.`tenloai`,b.`tenmon`,b.`giatien`,b.`urlhinh`,b.`anhien` from `dmloai` a, `dmmon` b where a.`idLoai`=b.`idLoai` and `idMon` = '$idMon'";
	$rs = mysql_query($sql);
	$r = mysql_fetch_assoc($rs);
	if(count($_POST)) {
		$tenmon = $_POST['tenmon'];
		$giatien = $_POST['giatien'];
		$anhien = $_POST['anhien'];
		$file = $_FILES['UrlHinh'];
		
		if($file['name']=='' || !chkUploadPicture('UrlHinh')) $update = "UPDATE `dmmon` SET `tenmon` = '$tenmon',`giatien`=$giatien,`anhien`='$anhien'";
		else {
		//xoa hinh cu ra khoi database
			$sql2 = 'SELECT `urlhinh` FROM `dmmon` WHERE `idMon` = '.$idMon;
			$rs2 = mysql_query($sql2);
			$r2 = mysql_fetch_row($rs2);
			unlink('../img/sanpham/'.$r2[0]);
			
			
			$UrlHinh = $file['name'];
			$update = "UPDATE `dmmon` SET `tenmon` = '$tenmon',`giatien`=$giatien,`anhien`='$anhien',`urlhinh`='$UrlHinh'";
		} 
		

		$sql1 = "$update WHERE  `idMon` ='$idMon'";
		$rs1 = mysql_query($sql1);
		if($rs1) echo('<script>alert("Update success!!!");window.location="?id=mon_quanly&idLoai='.$idLoai.'"</script>'); else echo('<script>alert("No OK");</script>');

	}
?>
<div role="main">
	<div class="wapper" id="mon_update">
		<h3>Món update</h3>
		<form data-validate="parsley" data-show-errors="true" action="" method="post" id="monupdate_form" enctype="multipart/form-data">
			<table id="dangky">
				<tr>
					<td>Thuộc loại </td>
					<td><h4><?php echo($r['tenloai']);?></h4></td>
				</tr>
				
				<tr>
					<td width="20%">Tên Món </td>
					<td width="30%"><input type="text" name="tenmon" id="tenmon" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorFullname" class="siginput" value="<?php echo($r['tenmon']);?>"></td>
					<td width="50%" id="errorFullname"></td>
				</tr>
							
				<tr>
					<td>Giá tiền </td>
					<td><input type="text" name="giatien" id="giatien" data-required="true" data-trigger="focusin focusout" data-type="number" data-error-container="#errorGiatien" class="siginput" value="<?php echo($r['giatien']);?>"></td>
					<td id="errorGiatien"></td>
				</tr>
	
				<tr>
					<td>Enadble</td>
					<td><label style="margin-right: 1.5em;"><input <?php if($r['anhien']==1) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="1">Yes</label><label><input <?php if($r['anhien']==0) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="0">No</label></td>
					<td></td>
				</tr>
				
				<tr>
					<td>Hình đại diện</td>
					<td><img src="../img/sanpham/<?php echo $r['urlhinh'];?>" alt="hinhdaidien" width="80" height="80" /><input type="file" name="UrlHinh"></td>
				</tr>
				
			</table>
			<p>
				<button type="button" class="button" style="margin-right:1em" onclick="history.back()">Back</button>
				<input type="submit" class="button" value="Update">
			</p>
		</form>
	</div>
</div>
