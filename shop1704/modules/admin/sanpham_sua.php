<?php
	$idSP=$_GET['idSP'];
	$sql='select * from `nncms_sanpham` where `idSP`='.$idSP;
	$rs=mysql_query($sql);
	$r2=mysql_fetch_assoc($rs);
	
	if(isset($_POST['TenSP']))
	{
		//print_r($_POST);
		//print_r($_FILES);
		$idLoai=$_POST['idLoai'];
		$TenSP=$_POST['TenSP'];
		$Gia=$_POST['Gia'];
		$MoTa=$_POST['MoTa'];
		$ChiTiet=$_POST['ChiTiet'];
		$TonKho=$_POST['TonKho'];
		$GhiChu=$_POST['GhiChu'];
		$AnHien=$_POST['AnHien'];
		
		$UrlHinh=$r2['UrlHinh'];
		
		//Xu ly UrlHinh		
		$file=$_FILES['UrlHinh'];
		if($file['name']!='')//Neu co hinh
		{
			//Xóa hình cũ
			unlink('images/sanpham/'.$r2['UrlHinh']);
			//Thêm hình mới
			$UrlHinh=time().'_'.$file['name'];//Ten cua hinh
			//Copy hinh o thu muc tam -> thu muc images/sanpham
			//copy($file['tmp_name'],'images/sanpham/'.$UrlHinh);
			move_uploaded_file($file['tmp_name'],'images/sanpham/'.$UrlHinh);
		}
		
		
		$sql="update `nncms_sanpham` set 
		`idLoai`='$idLoai',
		`TenSP`='$TenSP',
		`Gia`='$Gia',
		`MoTa`='$MoTa',
		`ChiTiet`='$ChiTiet',
		`UrlHinh`='$UrlHinh',
		`TonKho`='$TonKho',
		`GhiChu`='$GhiChu',
		`AnHien`='$AnHien'
		where `idSP`=$idSP";
		
		mysql_query($sql);
		header('location:?mod=sanpham&idLoai='.$idLoai);
	
	}
?>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <table width="600" border="1" cellpadding="3" class="admin">
    <tr>
      <th scope="row">Thuộc  loại</th>
      <td><label>
        <select name="idLoai" id="idLoai">
	<?php
		$idLoai=max(1,round($_GET['idLoai']));
		$sql='SELECT `idLoai`,`TenLoai`,`TenCL` FROM `nncms_loaisp` a,`nncms_chungloai` b where a.`idCL`=b.`idCL` order by `TenCL`,`TenLoai`';
		$rs=mysql_query($sql);
		while($r=mysql_fetch_assoc($rs))
		{
		
	?>
	<option <?php if($r['idLoai']==$r2['idLoai']) echo 'selected'?> value="<?php echo $r['idLoai']?>"><?php echo $r['TenCL'],'-',$r['TenLoai']?></option>
    <?php
		}
	?>
</select>
      </label></td>
    </tr>
    <caption>
      THÊM  SẢN PHẨM MỚI
    </caption>
    <tr>
      <th width="226" scope="row">Tên</th>
      <td width="350"><label>
        <input type="text" value="<?php echo $r2['TenSP']?>" name="TenSP" id="TenSP">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Giá</th>
      <td><label>
        <input type="text" value="<?php echo $r2['Gia']?>"  name="Gia" id="Gia" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Mô tả</th>
      <td><textarea name="MoTa" id="MoTa"><?php echo $r2['MoTa']?></textarea></td>
    </tr>
    <tr>
      <th scope="row">Chi tiết</th>
      <td><textarea name="ChiTiet" id="ChiTiet"><?php echo $r2['ChiTiet']?></textarea></td>
    </tr>
    <tr>
      <th scope="row">Hình</th>
      <td><label>
        <img src="images/sanpham/<?php echo $r2['UrlHinh']?>" height="100" alt="ảnh" /><br />
        <input type="file" name="UrlHinh" id="UrlHinh" />
        <br />
        <em>(Để trống nếu không muốn cập nhật) </em></label></td>
    </tr>
    <tr>
      <th scope="row">Số lượng</th>
      <td><input type="text"  value="<?php echo $r2['TonKho']?>"  name="TonKho" id="TonKho" /></td>
    </tr>
    <tr>
      <th scope="row">Ghi chú</th>
      <td><label>
        <textarea name="GhiChu" id="GhiChu"><?php echo $r2['GhiChu']?></textarea>
      </label></td>
    </tr>
    <tr>
      <th scope="row">Ẩn/Hiện</th>
      <td><label>
        <select name="AnHien" id="AnHien">
          <option <?php if($r2['AnHien']==1) echo 'selected'?> value="1">Hiện</option>
          <option <?php if($r2['AnHien']==0) echo 'selected'?> value="0">Ẩn</option>
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
<script>
var editor=CKEDITOR.replace('ChiTiet',
				 {
					 /*toolbar: [
		{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	
		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
		'/',
		[ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ],[ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ],
		{ name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
	],
		enterMode: CKEDITOR.ENTER_P,*/
		language: 'vi'
				 });
CKFinder.setupCKEditor( editor, 'js/ckfinder/' ) ;

</script>