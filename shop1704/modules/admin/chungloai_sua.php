<?php
	$idCL=$_GET['idCL'];
	$sql='select * from `nncms_chungloai` where `idCl`='.$idCL;
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
	//print_r($r);
	if(isset($_POST['TenCL']))
	{
		//print_r($_POST);
		$TenCL=$_POST['TenCL'];
		$AnHien=$_POST['AnHien'];
		$ThuTu=$_POST['ThuTu'];
		$sql="update `nncms_chungloai` set
		`TenCL`='$TenCL',
		`ThuTu`='$ThuTu',
		`AnHien`='$AnHien'
		where `idCL`=$idCL";
		mysql_query($sql);
		header('location:?mod=chungloai');
	}
?>
<form name="form1" method="post" action="">
  <table width="600" border="1" cellpadding="3" class="admin">
    <caption>
      THÊM CHỦNG LOẠI MỚI
    </caption>
    <tr>
      <th width="226" scope="row">Tên</th>
      <td width="350"><label>
        <input type="text" value="<?php echo $r['TenCL']?>" name="TenCL" id="TenCL">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><label>
        <select name="AnHien" id="AnHien">
          <option <?php if($r['AnHien']==1) echo 'selected="selected"'?> value="1">Hiện</option>
          <option <?php if($r['AnHien']==0) echo 'selected="selected"'?>  value="0">Ẩn</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Thứ tự</th>
      <td><label>
        <input type="text" value="<?php echo $r['ThuTu']?>" name="ThuTu" id="ThuTu">
      </label></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><label>
        <input type="submit" name="Them" id="Them" value="Cập nhật">
      &nbsp;
      <input type="reset" name="Reset" id="Reset" value="Nhập lại">
      </label></td>
    </tr>
  </table>
</form>
