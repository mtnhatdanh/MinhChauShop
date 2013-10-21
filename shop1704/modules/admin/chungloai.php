<table width="800" border="1" cellpadding="3" class="admin">
  <caption>
    DANH SÁCH CHỦNG LOẠI
  </caption>
  <tr>
    <th width="82" scope="col"><p>STT</p></th>
    <th width="309" scope="col">Tên</th>
    <th width="125" scope="col">Ẩn/Hiện</th>
    <th width="89" scope="col">Thứ tự</th>
    <th width="141" scope="col">Công cụ</th>
  </tr>
  <?php
  	$stt=1;
  	$sql='select * from `nncms_chungloai` order by `ThuTu`';
	$rs=mysql_query($sql);
	while($r=mysql_fetch_assoc($rs))
  {
  ?>
  <tr>
    <td align="center">&nbsp;<?php echo $stt++?></td>
    <td>&nbsp;<?php echo $r['TenCL']?></td>
    <td>&nbsp;<?php echo $r['AnHien']?></td>
    <td>&nbsp;<?php echo $r['ThuTu']?></td>
    <td align="center"><a href="?mod=chungloai_sua&idCL=<?php echo $r['idCL']?>"><img src="images/b_edit.png" width="16" height="16" alt="Sửa"></a>&nbsp;<a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không ?')" href="?mod=chungloai_xoa&idCL=<?php echo $r['idCL']?>"><img src="images/b_drop.png" width="16" height="16" alt="Xóa"></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="43" colspan="5" align="right"><label>
      <input onClick="window.location='?mod=chungloai_them'" type="submit" name="Them" id="Them" value="Thêm chủng loại">
    </label></td>
  </tr>
</table>
