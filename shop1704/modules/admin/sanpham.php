<table width="1119" border="1" cellpadding="3" class="admin">
  <caption>
    DANH SÁCH  SẢN PHẨM
THUỘC LOẠI
<select onChange="window.location='?mod=sanpham&idLoai='+this.value">
	<?php
		$idLoai=max(1,round($_GET['idLoai']));
		$sql='SELECT `idLoai`,`TenLoai`,`TenCL` FROM `nncms_loaisp` a,`nncms_chungloai` b where a.`idCL`=b.`idCL` order by `TenCL`,`TenLoai`';
		$rs=mysql_query($sql);
		while($r=mysql_fetch_assoc($rs))
		{
		
	?>
	<option <?php if($r['idLoai']==$idLoai) echo 'selected' ?> value="<?php echo $r['idLoai']?>"><?php echo $r['TenCL'],'-',$r['TenLoai']?></option>
    <?php
		}
	?>
</select>
  </caption>
  <tr>
    <th width="82" scope="col"><p>STT</p></th>
    <th width="179" scope="col">Tên SP</th>
    <th width="301" scope="col">Hình</th>
    <th width="263" scope="col">Giá</th>
    <th width="89" scope="col">Số lượng</th>
    <th width="141" scope="col">Công cụ</th>
  </tr>
  <?php
  	
  	$stt=1;
	
  	$sql='SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh` , `TonKho`
FROM `nncms_sanpham`
WHERE `idLoai` ='.$idLoai;
	$rs=mysql_query($sql);
	while($r=mysql_fetch_assoc($rs))
  {
  ?>
  <tr>
    <td align="center">&nbsp;<?php echo $stt++?></td>
    <td>&nbsp;<?php	echo $r['TenSP'];?></td>
    <td align="center">&nbsp;<img src="images/sanpham/<?php echo $r['UrlHinh']?>" height="100" /></td>
    <td>&nbsp;<?php echo $r['Gia']?></td>
    <td>&nbsp;<?php echo $r['TonKho']?></td>
    <td align="center"><a href="?mod=sanpham_sua&idSP=<?php echo $r['idSP']?>"><img src="images/b_edit.png" width="16" height="16" alt="Sửa"></a>&nbsp;&nbsp;<a href="?mod=sanpham_xoa&amp;idSP=<?php echo $r['idSP']?>"><img src="images/b_drop.png" width="16" height="16" alt="Xóa"></a>&nbsp; <a target="_blank" href="index.php?mod=sanpham_chitiet&idSP=<?php echo $r['idSP']?>"><img src="images/b_browse.png" width="16" height="16" alt="Chi tiết"></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="43" colspan="6" align="right"><label>
      <input onClick="window.location='?mod=sanpham_them'" type="submit" name="Them" id="Them" value="Thêm sản phẩm">
    </label></td>
  </tr>
</table>
