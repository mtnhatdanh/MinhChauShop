<?php
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
		
		//Xu ly UrlHinh		
		$file=$_FILES['UrlHinh'];
		if($file['name']!='')//Neu co hinh
		{
			$UrlHinh=time().'_'.$file['name'];//Ten cua hinh
			//Copy hinh o thu muc tam -> thu muc images/sanpham
			//copy($file['tmp_name'],'images/sanpham/'.$UrlHinh);
			move_uploaded_file($file['tmp_name'],'images/sanpham/'.$UrlHinh);
		}
		
		
		$sql="insert into `nncms_sanpham` values('NULL','$idLoai','$TenSP','$Gia','$MoTa','$ChiTiet','$UrlHinh',now(),'$TonKho','$GhiChu','0','0','$AnHien')";
		mysql_query($sql);
		header('location:?mod=sanpham');
	
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
	<option value="<?php echo $r['idLoai']?>"><?php echo $r['TenCL'],'-',$r['TenLoai']?></option>
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
        <input type="text" name="TenSP" id="TenSP">
      </label></td>
    </tr>
    <tr>
      <th scope="row">Giá</th>
      <td><label>
        <input type="text" name="Gia" id="Gia" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Mô tả</th>
      <td>
      <textarea name="MoTa" id="MoTa"></textarea>
      </td>
    </tr>
    <tr>
      <th scope="row">Chi tiết</th>
      <td><textarea name="ChiTiet" class="ckeditor" id="ChiTiet"></textarea></td>
    </tr>
    <tr>
      <th scope="row">Hình</th>
      <td><label>
        <input type="file" name="UrlHinh" id="UrlHinh" />
      </label></td>
    </tr>
    <tr>
      <th scope="row">Số lượng</th>
      <td><input type="text" name="TonKho" id="TonKho" /></td>
    </tr>
    <tr>
      <th scope="row">Ghi chú</th>
      <td><label>
        <textarea name="GhiChu" id="GhiChu"></textarea>
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
var editor=CKEDITOR.replace('MoTa',
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