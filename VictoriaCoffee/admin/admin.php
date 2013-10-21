<?php
	require_once('../lb/connect.php');
	require_once('../lb/object.php');
	require_once('../lb/fucntion.php');
	session_start();
	ob_start();
?>
<!doctype html>
<head>
	<!-- Meta tag -->
	<meta charset="utf-8">
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="admincss/resetstyle.css">
	<link rel="stylesheet" type="text/css" href="admincss/admin.css">
	
	<!-- script -->
	<script src="../js/jquery-1.9.1.min.js"></script>
	<script src="ckeditor/ckeditor.js"></script>


	
</head>

<body>
	<?php
		if(!isset($_SESSION['user'])) header('location:../login.php');
		$id = $_GET['id'];
		if($id=='') $id='user_quanly';
	?>
	<header>
		<div class="wapper">
			<div id="useractive">
				<ul>
					<li>Welcome, <a style="color:red" href="?id=user_update&username=<?php echo($_SESSION['user']->username);?>"><?php echo($_SESSION['user']->hoten);?> </a>| &nbsp</li>
					<li><a href="logout.php">Log out</a></li>
				</ul>
			</div>
			<h2>ADMINISTRATOR</h2>
			<nav>
				<ul>
					<li><a <?php if($id=='user_quanly') echo('class="ative"');?> href="?id=user_quanly">Quản lý user</a></li>
					<li><a <?php if($id=='loai_quanly') echo('class="ative"');?> href="?id=loai_quanly">QL loại</a></li>
					<li><a <?php if($id=='mon_quanly') echo('class="ative"');?> href="?id=mon_quanly">QL món</a></li>
					<li><a <?php if($id=='trangchu_quanly') echo('class="ative"');?> href="?id=trangchu_quanly">QL trang chủ</a></li>
				</ul>
			</nav>
		</div>
	</header>
	
<!-- 	Main container -->

	<div class="wapper">
		<?php
			include("moduleAM/$id.php");
		?>
	</div>
	<footer>
		<div class="wapper">
			<p>Copyright © 2013, Minh Giang</p>
			<p>Mail to: <a href="mailto:mtnhatdanh@gmail.com">mtnhatdanh@gmail.com</a></p>
		</div>
	</footer>
</body>