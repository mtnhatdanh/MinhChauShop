<?php
	$idLoai=$_GET['idLoai'];
	$sql='select * from `nncms_loaisp` where `idLoai`='.$idLoai;
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
	if(isset($_POST['TenLoai']))
	{
		//print_r($_POST);
		$TenLoai=$_POST['TenLoai'];
		$AnHien=$_POST['AnHien'];
		$ThuTu=$_POST['ThuTu'];
		$idCL=$_POST['idCL'];
		$sql="update `nncms_loaisp` set
		`idCL`='$idCL',
		`TenLoai`='$TenLoai',
		`ThuTu`='$ThuTu',
		`AnHien`='$AnHien'
		where `idLoai`=$idLoai";
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
        <input type="text" name="TenLoai" value="<?php echo $r['TenLoai']?>" id="TenLoai">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><label>
        <select name="AnHien" id="AnHien">
          <option <?php if($r['AnHien']==1) echo 'selected'?> value="1">Hiện</option>
          <option <?php if($r['AnHien']==0) echo 'selected'?> value="0">Ẩn</option>
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
      <th scope="row">Thuộc chủng loại</th>
      <td><label>
        <select name="idCL" id="idCL">
        <?php
			$sql='select `idCL`,`TenCL` from `nncms_chungloai` order by `ThuTu`';
			$rs=mysql_query($sql);
			while($r2=mysql_fetch_assoc($rs))
			{
		?>
          	<option <?php if($r2['idCL']==$r['idCL'])echo 'selected' ?> value="<?php echo $r2['idCL']?>"><?php echo $r2['TenCL']?></option>
	  <?php
        }
      ?>
        </select>
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
