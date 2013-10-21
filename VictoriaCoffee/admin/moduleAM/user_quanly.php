<section id="qluser">
	<h3>Bảng phân quyền hệ thống user</h3>
	<br>
	<table class="table" width="100%">
		<tr>
			<th>idUser</th>
			<th>Username</th>
			<th>Họ tên</th>
			<th>Password</th>
			<th>Enable</th>
			<th>Sửa</th>
			<th>Xóa</th>
		</tr>
		<?php
			$sql = 'select * from `users`';
			$rs = mysql_query($sql);
			while($r=mysql_fetch_assoc($rs))
			{
		?>
		<tr>
			<td align="center" width="8%"><?php echo $r['idUser'];?></td>
			<td width="15%"><?php echo $r['username'];?></td>
			<td width="15%"><?php echo $r['hoten'];?></td>
			<td width="20%"><?php echo $r['password'];?></td>
			<td width="8%" align="center"><?php echo $r['anhien'];?></td>
			<td width="8%" align="center"><a href="?id=user_update&username=<?php echo($r['username']);?>"><img src="../img/user_edit.png" alt="user_edit" width="34" height="30" /></a></td>
			<td width="8%" align="center"><a onclick="return confirm('Are you sure u want delete user <?php echo($r['username']);?>?')" href="?id=user_delete&delUser=<?php echo($r['username']);?>"><img src="../img/user_delete.png" alt="user_delete" width="34" height="28" /></a></td>
		</tr>
		<?php
			}
		?>
	</table>
	<p>
		<button type="button" class="button" onclick="window.location='?id=user_create'">Create User</button>
	</p>

</section>