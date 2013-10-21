<table width="1119" border="1" cellpadding="3" class="admin">
  <caption>
    DANH SÁCH LOẠI SẢN PHẨM
  </caption>
  <tr>
    <th width="82" scope="col"><p>STT</p></th>
    <th width="179" scope="col">Chủng loại</th>
    <th width="439" scope="col">Tên</th>
    <th width="125" scope="col">Ẩn/Hiện</th>
    <th width="89" scope="col">Thứ tự</th>
    <th width="141" scope="col">Công cụ</th>
  </tr>
  <?php
  	$stt=1;
  	$sql='select * from `nncms_loaisp` order by `idCL`,`ThuTu`';
	$rs=mysql_query($sql);
	while($r=mysql_fetch_assoc($rs))
  {
  ?>
  <tr>
    <td align="center">&nbsp;<?php echo $stt++?></td>
    <td>&nbsp;<?php
		$idCL=$r['idCL'];
		$sql='select `TenCL` from `nncms_chungloai` where `idCL`='.$idCL;
		$rs2=mysql_query($sql);
		$r2=mysql_fetch_assoc($rs2);
		echo $r2['TenCL'];
	?></td>
    <td>&nbsp;<?php echo $r['TenLoai']?></td>
    <td>&nbsp;<?php echo $r['AnHien']?></td>
    <td>&nbsp;<?php echo $r['ThuTu']?></td>
    <td align="center"><a href="?mod=loaisp_sua&idLoai=<?php echo $r['idLoai']?>"><img src="images/b_edit.png" width="16" height="16" alt="Sửa"></a>&nbsp;<a onclick="return confirm('Bạn có chắc chắn muốn xóa hay không ?')" href="?mod=loaisp_xoa&idLoai=<?php echo $r['idLoai']?>"><img src="images/b_drop.png" width="16" height="16" alt="Xóa"></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="43" colspan="6" align="right"><label>
      <input onClick="window.location='?mod=loaisp_them'" type="submit" name="Them" id="Them" value="Thêm chủng loại">
    </label></td>
  </tr>
</table>
