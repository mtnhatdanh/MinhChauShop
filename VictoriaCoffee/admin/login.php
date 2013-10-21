<?php 
	require_once('../lb/connect.php');
	require_once('../lb/object.php');
	session_start();
	ob_start();
?>
<!doctype html>
<head>
	<meta charset="utf-8">
	<title>Login page</title>
	<style>
		* {
			margin: 0px;
		}	
		div nav header {
			display: block;
		}
		body {
			font:14px/1.4em "Myriad Pro", "Helvetica Neue", Arial, Helvetica, Geneva, sans-rerif;
			color:#666666;
			background:url(../img/cream_pixels.png);
		}
		.container {
			width: 350px;
			margin-left: auto;
			margin-right: auto;
		}
		#wrapper {
			margin-top: 5px;
			border: #d1d1d3 solid 1px;
		}
		header {
			height: 50px;
			background: #f2f2f2;
			padding: 0px 0px 0px 25px;
			border-bottom: #d1d1d3 solid 1px;
		}
		header h2 {
			line-height: 50px;
		}
		div[role="main"] {
			background: #fdfdfd;
			padding: 25px 25px 25px 25px;
		}

		#username,#password {
			line-height: 20px;
			width: 285px;
			display: block;
			margin-bottom: 20px;
			padding: 5px;
		}
		#rememberChk {
			margin-right: 5px;
		}
		#lgButton {
			height: 30px;
			width: 70px;
			float: right;
			font-size: 12px;
			background: #f2f2f2;
			border: #d1d1d3 solid 1px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;
			
		}
		#rb {
			height: 26px;
			margin: 0px;
		}
		div#rb p {
			line-height: 26px;
			margin: 0px;
		}
		div#noti {
			margin-top: 40px;
			height: 20px;
			text-align: center;
		}
		div#register {
			margin-top: 5px;
			text-align: center;
		}
		a {
			text-decoration: none;
			color: #666666;
		}
		a:hover, a:active, nav a.ative {
			color: #e65d5d;
			text-shadow: 1px 1px 1px #ccc;
		}


	</style>
</head>
<body>
	<?php
		if(!isset($_SESSION['username'])) {
			if(count($_POST)){
				$username = $_POST['username'];
				$pass = sha1($_POST['password']); 
				$sql = "select * from `users` where `username` = '$username' and `password` = '$pass' and `anhien`=1";
				$rs = mysql_query($sql);
				
				if(mysql_num_rows($rs)) {
					$r = mysql_fetch_assoc($rs);
					$u = new User;
					$u->set($r['idUser'],$r['username'],$r['hoten'],'');
					$_SESSION['user'] = $u;

					header('location:admin.php');
					
				}				
			}
		} else header('location:admin.php');

	?>
	<div id="noti" class="container">
		<?php 
			if(isset($username)) if(!mysql_num_rows($rs)) echo('<p style="color:red; font-weight: nomal;">Wrong username or password!!!</p>');	
		?>
	</div>
	<div id="wrapper" class="container">
		<header>
			<h2>Log in</h2>
		</header>
		<div role="main">
			<form action="" method="post" id="dangkyform">
				<input type="text" name="username" id="username" placeholder="Enter your username.." value="<?php echo($username)?>">
				<input type="password" name="password" id="password" placeholder="Password..">
				<div id="rb">
					<p>
<!-- 						<label><input type="checkbox" name="remember" id="rememberChk">Remember me on this computer</label> -->
						<input type="submit" id="lgButton" value="Login">
					</p>
				</div>
			</form>
		</div>
	</div>
	<div id="register" class="container">
<!--
		<p>Don't have an account? <a href="signup.php">Register here!!</a></p>
-->
	</div>
	
</body>