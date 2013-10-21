<style>
	section#signup_section {
		padding: 1.5em 0 1.5em 0;
		font-size: 1.1em;
	}
	.siginput {
	 	font-size: 0.85em;
		line-height: 1.8em;
		width: 20em;
		display: block;
		margin-bottom: 1.5em;
		padding: 0.5em;
		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		border-radius: 7px;
	}
	
	table#dangky {
		width: 90%;
	}
	
	table#dangky td {
		border: none;
		vertical-align: middle;
		height: 3.1em;
	}
	
	table#dangky input {
		margin-top: auto;
		margin-bottom: auto;
	}
	
	.parsley-success {
		background: #dff0d8;
	}
	.parsley-error {
		background: #f2dede;
	}


</style>
	
<!-- 	Script -->

<script type="text/javascript" src="../js/parsley.js"></script>
	


<?php
	$idLoai = $_GET['idLoai'];
	
	if(count($_POST)) {

		$tenmon = $_POST['tenmon'];
		$giatien = $_POST['giatien'];
		$anhien = $_POST['anhien'];
		$file = $_FILES['UrlHinh'];
		
		//Xu ly UrlHinh		
		

		if(chkUploadPicture('UrlHinh')) {
			$UrlHinh = $file['name'];
			$sql = "INSERT INTO `dmmon` (`idLoai`,`tenmon`,`giatien`,`urlhinh`,`anhien`) VALUES ($idLoai,'$tenmon',$giatien,'$UrlHinh',$anhien);";
			$rs = mysql_query($sql);
			if($rs) 
			echo('
				<script>
					alert("Create success!!");
					window.location = "?id=mon_quanly&idLoai='.$idLoai.'";
				</script>
			');
			else echo('<script>alert("Not OK")</script>');
		}
		
	}

?>


<section id="signup_section">
	<h3>Tạo món mới</h3>
	<form data-validate="parsley" data-show-errors="true" action="" method="post" id="taomon_form" enctype="multipart/form-data">
		<table id="dangky">
			<tr>
				<td width="20%">Tên món</td>
				<td width="30%"><input type="text" name="tenmon" id="tenmon" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorFullname" class="siginput" placeholder="Nhập tên loại.."></td>
				<td width="50%" id="errorFullname"></td>
			</tr>
			<tr>
				<td width="20%">Giá tiền</td>
				<td width="30%"><input type="text" name="giatien" id="giatien" data-required="true" data-trigger="focusin focusout" data-type="number" data-error-container="#errorGiatien" class="siginput" placeholder="Nhập giá tiền.."></td>
				<td width="50%" id="errorGiatien"></td>
			</tr>			
			<tr>
				<td>Enable</td>
				<td><label style="margin-right: 1.5em;"><input checked="checked" style="margin-right:1em;" type="radio" name="anhien" value="1">Yes</label><label><input style="margin-right:1em;" type="radio" name="anhien" value="0">No</label></td>
			</tr>
			<tr>
				<td>Hình đại diện</td>
				<td><input type="file" name="UrlHinh" id="UrlHinh" /></td>
			</tr>

		</table>
		<p>
			<button type="button" class="button" onclick="history.back()">Back</button>
			<input style="margin:1em" type="submit" class="button" id="submitBt" value="Create">
		</p>
	</form>
</section>
