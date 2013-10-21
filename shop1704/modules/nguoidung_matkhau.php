<?php
	
	if(isset($_POST['email']))//Neu form da duoc submit
	{
		$email=$_POST['email'];
		$sql="select * from `nncms_nguoidung` where `email`='$email'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)==1){//Neu email co trong he thong -> gui mat khau moi
			$r=mysql_fetch_assoc($rs);
			//Sinh mat khau ngau nhien
			$newPass=genPass(6);
			$subject='Shop ABC - Mật khẩu mới';
			$message='Xin chào '.$r['HoTen'].'<br/>Mật khẩu mới để đăng nhập vào trang web Shop ABC là:<strong>'.$newPass.'</strong><br/>Bạn hãy nhanh chóng đăng nhập và đổi mật khẩu !';
			//Gọi hàm gửi mail
			if(mailer('admin@shopabc.com.vn',$email,$subject,$message))//Neu nhu gui mail thanh cong -> cap nhat mat khau trong CSDL
			{
				$sql="update `nncms_nguoidung` set `MatKhau`=sha1('$newPass') where `email`='$email'";
				mysql_query($sql);
				echo '<div style="color:blue;text-align:center" >Mật khẩu mới đã được gửi vào email của bạn !  </div>';
			}
		}
		
		else echo '<div style="color:red;text-align:center" >Email không có trong hệ thống !  </div>';
	}
?> 
                <h2 class="heading colr">Quên mật khẩu</h2>
                <div class="login">
                	<div class="registrd">
                        <form action="" method="post" id="dangnhap">
                    	<h3>Please Sign In</h3>
                        <p>Mật khẩu mới sẽ được gửi vào Email của bạn (Hãy kiểm tra trong hộp thư đến và hộp thư rác)</p>
                        <ul class="forms">
                        	<li class="txt">Email Address <span class="req">*</span></li>
                            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php echo $email?>" /></li>
                        </ul>
                        <ul class="forms">
                   	    <li class="txt">&nbsp;</li>
                            <li><a href="javascript:document.getElementById('dangnhap').submit()" class="simplebtn"><span>Nhận mật khẩu mới</span></a></li>
                        </ul>
                        <input type="submit" style="visibility:hidden" />
                        </form>
                    </div>
                </div>
                <div class="clear"></div>