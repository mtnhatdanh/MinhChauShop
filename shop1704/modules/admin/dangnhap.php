<?php
	if(isset($_SESSION['email']))header('location:?mod=trangchu');
	
	if(isset($_POST['email']))//Neu form da duoc submit
	{
		$email=$_POST['email'];
		$pass= sha1($_POST['password']);
		$sql="select * from `nncms_quantri` where `email`='$email' AND `MatKhau`='$pass'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)==1){//Dang nhap thanh cong
			$r=mysql_fetch_assoc($rs);
			//Gan sesssion
			$_SESSION['email']=$email;
			$_SESSION['name']=$r['HoTen'];
			//Chuyển về trang chủ
			header('location:?mod=trangchu');
		}
		else echo '<div style="color:red;text-align:center" >Email hoặc Mật khẩu không đúng !  </div>';
	}
?> 
                <h2 class="heading colr">Login</h2>
                <div class="login">
                	<div class="registrd">
                        <form action="" method="post" id="dangnhap">
                    	<h3>Please Sign In</h3>
                        <p>If you have an account with us, please log in.</p>
                        <ul class="forms">
                        	<li class="txt">Email Address <span class="req">*</span></li>
                            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php echo $email?>" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="password" class="bar" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">&nbsp;</li>
                            <li><a href="javascript:document.getElementById('dangnhap').submit()" class="simplebtn"><span>Login</span></a> <a href="#" class="forgot">Forgot Your Password?</a></li>
                        </ul>
                        <input type="submit" style="visibility:hidden" />
                        </form>
                    </div>
                </div>
                <div class="clear"></div>