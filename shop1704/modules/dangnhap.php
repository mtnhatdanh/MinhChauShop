<?php
	if(isset($_SESSION['email']))header('location:?mod=trangchu');
	
	if(isset($_POST['email']))//Neu form da duoc submit
	{
		$email=$_POST['email'];
		$pass= sha1($_POST['password']);
		$sql="select * from `nncms_nguoidung` where `email`='$email' AND `MatKhau`='$pass'";
		$rs=mysql_query($sql);
		if(mysql_num_rows($rs)==1){//Dang nhap thanh cong
			$r=mysql_fetch_assoc($rs);
			//Gan sesssion
			$_SESSION['email']=$email;
			$_SESSION['name']=$r['HoTen'];
			//Xu ly viec ghi nho
			
			if($_POST['remember']==1)//Neu co danh dau vao o Ghi nho => đặt cookie
			{
				setcookie('shop_email',$email,time()+3600*24*7);
			}
			else //Neu nguoi dung ko muon ghi nho => xoa cookie
			{
				setcookie('shop_email',$email,time()-3600);
			}
			
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
                            <li class="inputfield"><input type="text" name="email" class="bar" value="<?php echo $_COOKIE['shop_email']?>" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Password <span class="req">*</span></li>
                            <li class="inputfield"><input type="password" name="password" class="bar" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt"><label><input <?php if($_COOKIE['shop_email']!='') echo 'checked' ?> name="remember" type="checkbox" value="1" />&nbsp; Ghi nhớ</label></li>
                            <li><a href="javascript:document.getElementById('dangnhap').submit()" class="simplebtn"><span>Login</span></a> <a href="?mod=nguoidung_matkhau" class="forgot">Forgot Your Password?</a></li>
                        </ul>
                        <input type="submit" style="visibility:hidden" />
                        </form>
                    </div>
                    <div class="newcus">
                    	<h3>Please Sign In</h3>
                        <p>
                        	By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a href="?mod=nguoidung_dangky" class="simplebtn"><span>Register</span></a>
                    </div>
                </div>
                <div class="clear"></div>