<?php
	if(isset($_POST['TenLoai']))
	{
		//print_r($_POST);
		$TenLoai=$_POST['TenLoai'];
		$AnHien=$_POST['AnHien'];
		$ThuTu=$_POST['ThuTu'];
		$idCL=$_POST['idCL'];
		$sql="insert into `nncms_loaisp` values('NULL','$idCL','$TenLoai','$ThuTu','$AnHien')";
		mysql_query($sql);
		header('location:?mod=loaisp');
	}
?>
<form name="form1" method="post" action="">
  <table width="600" border="1" cellpadding="3" class="admin">
    <caption>
      THÊM LOẠI SẢN PHẨM MỚI
    </caption>
    <tr>
      <th width="226" scope="row">Tên</th>
      <td width="350"><label>
        <input type="text" name="TenLoai" id="TenLoai">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><label>
        <select name="AnHien" id="AnHien">
          <option value="1">Hiện</option>
          <option value="0">Ẩn</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Thứ tự</th>
      <td><label>
        <input type="text" name="ThuTu" id="ThuTu">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Thuộc chủng loại</th>
      <td><label>
        <select name="idCL" id="idCL">
        <?php
			$sql='select `idCL`,`TenCL` from `nncms_chungloai` order by `ThuTu`';
			$rs=mysql_query($sql);
			while($r=mysql_fetch_assoc($rs))
			{
		?>
          	<option value="<?php echo $r['idCL']?>"><?php echo $r['TenCL']?></option>
	  <?php
        }
      ?>
        </select>
      </label></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><label>
        <input type="submit" name="Them" id="Them" value="Thêm">
      &nbsp;
      <input type="reset" name="Reset" id="Reset" value="Nhập lại">
      </label></td>
    </tr>
  </table>
</form>
