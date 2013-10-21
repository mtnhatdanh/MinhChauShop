<section id="qlloai">
	<h3>Quản lý loại</h3>
	<br>
	<table class="table" width="100%">
		<tr>
			<th>STT</th>
			<th>Tên loại</th>
			<th>Enable</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php
			$stt = 0;
			$sql = 'SELECT * FROM `dmloai`';
			$rs = mysql_query($sql);
			while($r=mysql_fetch_assoc($rs))
			{
				$stt++;
		?>
		<tr>
			<td align="center" width="8%"><?php echo $stt;?></td>
			<td align="center" width="15%"><a href="?id=mon_quanly&idLoai=<?php echo $r['idLoai'];?>"><?php echo $r['tenloai'];?></a></td>
			<td align="center" width="10%"><?php if($r['anhien']) echo('Yes'); else echo('No');?></td>
			<td width="8%" align="center"><a href="?id=loai_update&idLoai=<?php echo($r['idLoai']);?>"><img src="../img/user_edit.png" alt="user_edit" width="34" height="30" /></a></td>
			<td width="8%" align="center"><a onclick="return confirm('Bạn có chắc chắn muốn xóa loại <?php echo($r['tenloai']);?>?')" href="?id=loai_delete&idLoai=<?php echo($r['idLoai']);?>"><img src="../img/user_delete.png" alt="user_delete" width="34" height="28" /></a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<p>
		<button type="button" class="button" onclick="window.location='?id=loai_create'">Thêm loại</button>
	</p>

</section>