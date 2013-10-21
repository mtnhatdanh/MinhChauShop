<?php 
	require_once('../lb/connect.php');
	require_once('../lb/sqlfetch.php');
	include('../lb/fucntion.php');
	session_start();
	ob_start();
?>
<!DOCTYPE html>
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
			font:100% "Helvetica Neue", Arial, Helvetica, Geneva, sans-rerif;
			color:#000;
			background:url(../img/cream_pixels.png);
		}
		.container {
			width: 1000px;
			margin: auto;
		}
		a {
			text-decoration: none;
			color: #000;
		}
		a:hover {
			color: #e65d5d;
		}
		header {
			height: 6em;
			background: #f2f2f2;
			border-bottom: 1px solid #ccc;
		}
		footer {
			font-size: 0.75em;
			text-align: center;
			height: 5.5em;
			background: #f2f2f2;
			border-top: 1px solid #ccc;
			padding-top: 3em;
		}

		header h2 {
			line-height: 3.5em;
		}
		div[role="main"] {
			background: #fdfdfd;
			padding: 25px 25px 25px 25px;
		}

		 .siginput {
		 	font-size: 0.85em;
			line-height: 1.8em;
			width: 20em;
			display: block;
			margin-bottom: 1.5em;
			padding: 0.5em;
			-webkit-border-radius: 7px;
			-moz-border-radius: 7px;
			border-radius: 7px;
		}
		
		table#dangky {
			width: 90%;
		}
		
		table#dangky td {
			vertical-align: middle;
			height: 3.1em;
		}
		
		table#dangky input {
			margin-top: auto;
			margin-bottom: auto;
		}
		
		#submitBt {
			margin-top: 30px;
			height: 45px;
			width: 150px;
			font-size: 0.9em;
			background: #f2f2f2;
			border: #d1d1d3 solid 1px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			border-radius: 5px;	
		}
		#submitBt:hover {
			color: #e65d5d;
			font-weight: bold;
			box-shadow: 3px 3px 8px #ccc;
		}
		.parsley-success {
			background: #dff0d8;
		}
		.parsley-error {
			background: #f2dede;
		}


	</style>
	
<!-- 	Script -->

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/parsley.js"></script>
	
<!-- 	datepicker js -->

	<script type="text/javascript" src="../js/datePicker/picker.js"></script>
	<script type="text/javascript" src="../js/datePicker/picker.date.js"></script>
	<script type="text/javascript" src="../js/datePicker/legacy.js"></script>

<!-- datepicker css -->
	<link rel="stylesheet" href="../js/datePicker/themes/default.css">
	<link rel="stylesheet" href="../js/datePicker/themes/default.date.css">
	<link rel="stylesheet" href="../js/datePicker/themes/default.time.css">

</head>
<body>

	<?php

		$fullname = $_POST['fullname'];
		$username = $_POST['username'];
		$email = $_POST['email'];
		$birthday = $_POST['birthday'];
		$birthday = convertday($birthday);
		$password = sha1($_POST['password']);
		if($fullname!='') {
			$sql = "INSERT INTO `users` (`username`,`password`,`HoTen`,`Email`,`birthday`) VALUES ('$username','$password','$fullname','$email','$birthday')";
			$db = new db;
			$db->getdata($sql);
			if($db->result) 
			echo('
				<script>
					alert("Sign up success!!");
					window.location = "loginPage.php";
				</script>
			');
			else echo('<script>alert("Not OK")</script>');
		}

	?>

	<header>

		<div class="container">
			<h2>Sign up form</h2>
		</div>

	</header>
	<div role="main">
		<div class="container">
			<form data-validate="parsley" data-show-errors="true" action="" method="post" id="dangkyform" onsubmit="return checkform()">
				<table id="dangky">
					<tr>
						<td width="20%">Your Fullname </td>
						<td width="30%"><input type="text" name="fullname" id="fullname" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorFullname" class="siginput" placeholder="Enter your fullname.."></td>
						<td width="50%" id="errorFullname"></td>
					</tr>
					<tr>
						<td>Your Username </td>
						<td><input type="text" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorUsername" name="username" id="username" class="siginput" placeholder="Enter your username.."></td>
						<td id="errorUsername"></td>
					</tr>
					<tr>
						<td>Your Email </td>
						<td><input data-type="email" data-required="true" data-trigger="focusin focusout" data-error-container="#errorEmail" type="text" name="email" id="email" class="siginput" placeholder="Enter your email.."></td>
						<td id="errorEmail"></td>
					</tr>
					<tr>
						<td>Birthday </td>
						<td><input data-required="true" data-trigger="focusin focusout" data-error-container="#errorBirthday" type="text" name="birthday" id="birthday" class="siginput datepicker" placeholder="Enter your birthday.."></td>
						<script>
							$('.datepicker').pickadate({
								format:'dd/mm/yyyy',
								selectYears: true,
								selectMonths: true,
								selectYears: 70,
								min: -100*365,
								max: -10*365,
								today: ''
							});
						</script>
						<td id="errorBirthday"></td>
					</tr>
					<tr>
						<td>Your password </td>
						<td><input type="password" data-trigger="focusin focusout" data-required="true" data-minlength="6" data-error-container="#errorPass" name="password" id="password" class="siginput" placeholder="Enter your password.."></td>
						<td id="errorPass"></td>
					</tr>
					<tr>
						<td>Re-pass </td>
						<td><input data-trigger="focusin focusout" data-required="true" data-equalto="#password" data-error-container="#errorRepass" type="password" name="repass" id="repass" class="siginput" placeholder="Re-enter your pass.."></td>
						<td id="errorRepass"></td>
					</tr>

				</table>
				<p>
					<input type="submit" id="submitBt" value="Sign Up">
				</p>
			</form>
		</div>
	</div>
	<footer>
		<div class="container">
			<p>Copyright © 2013, Minh Giang</p>
			<p>Mail to: <a href="mailto:mtnhatdanh@gmail.com">mtnhatdanh@gmail.com</a></p>
		</div>
	</footer>
</body>