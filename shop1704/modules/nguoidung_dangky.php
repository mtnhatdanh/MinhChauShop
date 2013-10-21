<?php
	
	if(isset($_POST['email']))//Neu form da duoc submit
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=sha1($_POST['pass']);
		
		$code=genPass(6);
		
		$sql="insert into `nncms_nguoidung` values('NULL','$pass','$email','$name','','','','',now(),'','','$code','')";
		$rs=mysql_query($sql);
		if($rs)		
		{		
				$subject='Shop ABC - Kích hoạt tài khoản';
				$message='Xin chào '.$name.'<br/>Bạn hãy click vào link sau để kích hoạt tài khoản<br/>
				<a target="_blank" href="http://localhost/shop1704/index.php?mod=taikhoan_kichhoat&email='.$email.'&code='.$code.'">Kích hoạt tài khoản</a>';			if(mailer('admin@abc.com',$email,$subject,$message))
				echo '<script>
					alert("Bạn đã đăng ký tài khoản thành công.\nClick vào nút OK để chuyển đến trang đăng nhập");
					window.location="?mod=dangnhap";
				</script>';
		}
		else echo '<div style="color:red;text-align:center;padding-top:5px">Email đã được đăng ký. Hãy sử dụng địa chỉ email khác !</div>';
	}
?> 
                <h2 class="heading colr">Registration</h2>
                <div class="login">
                	<div class="registrd">
                        <form action="" method="post" id="dangnhap" onsubmit="return checkData()">
                    	<h3>Please Sign up</h3>
                        <p>If you have an account with us, please log in.</p>
                        <ul class="forms">
                        	<li class="txt">Fullname<span class="req">*</span></li>
                            <li class="inputfield"><input type="text" name="name" class="bar" id="name" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Email Address <span class="req">*</span></li>
                            <li class="inputfield"><input onblur="callAjax('libs/response.php?Email='+this.value,'#msg')" type="text" name="email" class="bar" id="email" /><div style="margin-top:5px;" id="msg"></div></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="pass" class="bar" id="pass" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Retype Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="repass" class="bar" id="repass" /></li>
                        </ul>
                        
                      <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li><a href="javascript:document.getElementById('submit').click()" class="simplebtn"><span>Sign up</span></a></li>
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
						if($('#name').val()=='')
						{
							alert('Họ tên không được để trống !');
							$('#name').focus();
							return false;
						}
						if($('#email').val()=='')
						{
							alert('Email không được để trống !');
							$('#email').focus();
							return false;
						}
						var pass=$('#pass').val();
						if(pass.length<6)
						{
							alert('Mật khẩu tối thiểu 6 ký tự !');
							$('#pass').focus();
							return false;
						}
						if($('#repass').val()!=pass)
						{
							alert('Mật khẩu nhập lại không đúng !');
							$('#repass').select();
							return false;
						}
						return true;
					}
				</script>
               