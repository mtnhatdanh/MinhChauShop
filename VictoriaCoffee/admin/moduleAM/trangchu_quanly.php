<section id="quanly_trangchu">
	<h3>Quản lý nội dung trang chủ</h3>
	
	<form action="" method="post">
		<?php
			$sql = 'SELECT `noidung` FROM `noidung` WHERE `idtrang` = 3';
			$rs = mysql_query($sql);
			$r = mysql_fetch_row($rs);
			
			if(count($_POST)){
				$noidung = $_POST['editor1'];
				$sql = "UPDATE `noidung` SET `noidung` = '$noidung' WHERE `idtrang` = 3";
				$rs = mysql_query($sql);
				if($rs) echo('<script>alert("Update thành công!!");location.reload();</script>');
			}
		?>
		<textarea name="editor1"><?php echo $r[0];?></textarea></br>
		<script>
			CKEDITOR.replace('editor1');
		</script>
		<input type="submit" class="button">
	</form>
</section>