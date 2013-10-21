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
	$sql = "SELECT * from `dmloai` where `idLoai` = '$idLoai'";
	$rs = mysql_query($sql);
	$r = mysql_fetch_assoc($rs);
	if(count($_POST)) {
		$tenloai = $_POST['tenloai'];
		$anhien = $_POST['anhien'];
		
		$sql1 = "UPDATE `dmloai` SET `tenloai` = '$tenloai',`anhien`='$anhien' WHERE  `idLoai` ='$idLoai'";
		$rs1 = mysql_query($sql1);
		if($rs1) echo('<script>alert("Update success!!!");window.location="?id=loai_quanly"</script>'); else echo('<script>alert("No OK");</script>');

	}
?>
<div role="main">
	<div class="wapper" id="user_update">
		<h3>Loại update</h3>
		<form data-validate="parsley" data-show-errors="true" action="" method="post" id="loaiupdate_form">
			<table id="dangky">
				<tr>
					<td>id Loại </td>
					<td><h4><?php echo($r['idLoai']);?></h4></td>
				</tr>
				
				<tr>
					<td width="20%">Tên Loại </td>
					<td width="30%"><input type="text" name="tenloai" id="tenloai" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorFullname" class="siginput" value="<?php echo($r['tenloai']);?>"></td>
					<td width="50%" id="errorFullname"></td>
				</tr>
								
				<tr>
					<td>Enadble</td>
					<td><label style="margin-right: 1.5em;"><input <?php if($r['anhien']==1) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="1">Yes</label><label><input <?php if($r['anhien']==0) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="0">No</label></td>
					<td></td>
				</tr>
								
			</table>
			<p>
				<button type="button" class="button" style="margin-right:1em" onclick="history.back()">Back</button>
				<input type="submit" class="button" value="Update">
			</p>
		</form>
	</div>
</div>
