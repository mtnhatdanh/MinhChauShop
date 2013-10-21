<?php 
	if(!isset($_GET['idLoai'])) $idLoai = 1;
	else $idLoai = $_GET['idLoai'];
?>
<section id="qlmon">
	<h3 style="float: left; margin-right: 1em">Loại </h3>
	<select id="loai_select">
		<?php 
			$sql = 'SELECT * FROM `dmloai`';
			$rs = mysql_query($sql);
			while($r = mysql_fetch_assoc($rs))
			{
		?>
		<option value="<?php echo $r['idLoai'];?>" <?php if($r['idLoai'] == $idLoai) echo 'selected';?>><?php echo $r['tenloai'];?></option>
		<?php 
			}
		?>
	</select>
	<br>
	<table class="table clear" width="100%">
		<tr>
			<th>STT</th>
			<th>Tên món</th>
			<th>Giá tiền</th>
			<th>Hình đd</th>
			<th>Enable</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php
			$stt = 0;
			$sql = 'select * from `dmmon` where `idLoai` = '.$idLoai;
			$rs = mysql_query($sql);
			while($r=mysql_fetch_assoc($rs))
			{
			$stt++;
		?>
		<tr>
			<td align="center" width="8%"><?php echo $stt;?></td>
			<td align="center" width="15%"><?php echo $r['tenmon'];?></td>
			<td align="center" width="10%"><?php echo number_format($r['giatien'],0,'.',',');?></td>
			<td align="center" width="10%"><img src="../img/sanpham/<?php echo $r['urlhinh'];?>" alt="hinhdaidien" width="80" height="80" /></td>
			<td align="center" width="10%"><?php if($r['anhien']) echo('Yes'); else echo('No');?></td>
			<td width="8%" align="center"><a href="?id=mon_update&idLoai=<?php echo $idLoai;?>&idMon=<?php echo($r['idMon']);?>"><img src="../img/user_edit.png" alt="user_edit" width="34" height="30" /></a></td>
			<td width="8%" align="center"><a onclick="return confirm('Bạn có chắc chắn muốn xóa món <?php echo($r['tenmon']);?>?')" href="?id=mon_delete&idLoai=<?php echo $idLoai;?>&idMon=<?php echo($r['idMon']);?>"><img src="../img/user_delete.png" alt="user_delete" width="34" height="28" /></a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<p>
		<button type="button" class="button" onclick="window.location='?id=mon_create&idLoai=<?php echo $idLoai;?>'">Tạo món mới</button>
	</p>

</section>

<script>
	$(document).ready(function() {
		$('#loai_select').change(function(){
			idLoai = $('#loai_select').val();
			window.location.href = '?id=mon_quanly&idLoai='+idLoai;
		});
	});
</script>