<?php
	
	$email=$_SESSION['email'];
	if(isset($_POST['HoTen']))//Neu form da duoc submit => cap nhat thong tin nguoi dung
	{
		$HoTen=$_POST['HoTen'];
		$GioiTinh=$_POST['GioiTinh'];
		$NgaySinh=$_POST['NgaySinh'];
		//Chuyen tu dd/mm/yyyy -> yyyy-mm-dd
		$NgaySinh=convertDate($NgaySinh);
		
		$DienThoai=$_POST['DienThoai'];
		$DiaChi=$_POST['DiaChi'];
		$MatKhau=$_POST['MatKhau'];
/*		if($MatKhau=='')
			$sql="update `nncms_nguoidung` set
			`HoTen`='$HoTen',
			`GioiTinh`='$GioiTinh',
			`NgaySinh`='$NgaySinh',
			`DienThoai`='$DienThoai',
			`DiaChi`='$DiaChi'
			where `Email`='$email'";
		else
			$sql="update `nncms_nguoidung` set
			`HoTen`='$HoTen',
			`GioiTinh`='$GioiTinh',
			`NgaySinh`='$NgaySinh',
			`DienThoai`='$DienThoai',
			`DiaChi`='$DiaChi',
			`MatKhau`=sha1('$MatKhau')
			where `Email`='$email'";*/
			
			$sql="update `nncms_nguoidung` set
			`HoTen`='$HoTen',
			`GioiTinh`='$GioiTinh',
			`NgaySinh`='$NgaySinh',
			`DienThoai`='$DienThoai',
			`DiaChi`='$DiaChi'";
			if($MatKhau!='')$sql=$sql." ,`MatKhau`=sha1('$MatKhau')";
			$sql=$sql." where `Email`='$email'";
			

		echo $sql;
		$rs=mysql_query($sql);
		if($rs)
		echo '<div style="color:red;text-align:center;padding-top:5px">Đã cập nhật thành công !</div>';
	}
	
	
	$sql="SELECT `HoTen` , `DienThoai` , `DiaChi` , `NgaySinh` , `GioiTinh`
FROM `nncms_nguoidung`
WHERE `Email` = '$email'";
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
?>

                <h2 class="heading colr">Registration</h2>
                <div class="login">
                	<div class="registrd" style="height:400px;background-image:none;border:1px #CCC solid">
                        <form action="" method="post" id="dangnhap" onsubmit="return checkData()">
                    	<h3>Please Sign up</h3>
                        <p>If you have an account with us, please log in.</p>
                        <ul class="forms">
                        	<li class="txt">Fullname<span class="req">*</span></li>
                            <li class="inputfield"><input type="text" name="HoTen" value="<?php echo $r['HoTen'] ?>" class="bar" id="HoTen" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Giới tính<span class="req">*</span></li>
                            <li class="inputfield">
                              <label>
                                <input class="radio" <?php if(1==$r['GioiTinh'])echo 'checked="checked"' ?> type="radio" name="GioiTinh" id="GioiTinh" value="1" />
                              Nam </label>&nbsp;&nbsp;
                              <label>
                                <input class="radio" <?php if(0==$r['GioiTinh'])echo 'checked="checked"' ?> type="radio" name="GioiTinh" id="GioiTinh2" value="0" />
                                Nữ
                              </label>
                            </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt">Ngày sinh<span class="req">*</span></li>
                            <li class="inputfield"><input readonly="readonly" onclick="scwShow(this,event)" onfocus="scwShow(this,event)" type="text"  value="<?php echo date('d/m/Y',strtotime($r['NgaySinh'])) ?>" name="NgaySinh" class="bar" id="NgaySinh" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Điện thoại<span class="req">*</span></li>
                            <li class="inputfield"><input type="text" value="<?php echo $r['DienThoai'] ?>" name="DienThoai" class="bar" id="DienThoai" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Địa chỉ<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="DiaChi" class="bar" id="DiaChi"><?php echo $r['DiaChi'] ?></textarea>
                            </li>
                        </ul>
                  <ul class="forms">
                        	<li class="txt">Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="MatKhau" class="bar" id="MatKhau" />
                            <em><br />
                            (Để trống nếu không muốn thay đổi)</em></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Retype Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="MatKhau2" class="bar" id="MatKhau2" /></li>
                        </ul>
                        
                      <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li><a href="javascript:document.getElementById('submit').click()" class="simplebtn"><span>Update</span></a></li>
                        </ul>
                        <input type="submit" id="submit" style="visibility:hidden" />
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
                <script>
					function checkData()
					{
						//alert(document.getElementById('name').value);
						if($('#HoTen').val()=='')
						{
							alert('Họ tên không được để trống !');
							$('#HoTen').focus();
							return false;
						}
						if($('#DiaChi').val()=='')
						{
							alert('Địa chỉ không được để trống !');
							$('#DiaChi').focus();
							return false;
						}
						if($('#DienThoai').val()=='')
						{
							alert('Điện thoại không được để trống !');
							$('#DienThoai').focus();
							return false;
						}
						var pass=$('#MatKhau').val();
						if(pass.length<6&&pass!='')
						{
							alert('Mật khẩu tối thiểu 6 ký tự !');
							$('#MatKhau').focus();
							return false;
						}
						if($('#MatKhau2').val()!=pass)
						{
							alert('Mật khẩu nhập lại không đúng !');
							$('#MatKhau2').select();
							return false;
						}
						return true;
					}
				</script>
               