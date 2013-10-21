<style>
	section#signup_section {
		padding: 1.5em 0 1.5em 0;
		font-size: 1.1em;
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
		border: none;
		vertical-align: middle;
		height: 3.1em;
	}
	
	table#dangky input {
		margin-top: auto;
		margin-bottom: auto;
	}
	
	.parsley-success {
		background: #dff0d8;
	}
	.parsley-error {
		background: #f2dede;
	}


</style>
	
<!-- 	Script -->

<script type="text/javascript" src="../js/parsley.js"></script>
	
<body>


	<?php
		if(isset($_POST['fullname'])) {

			$fullname = $_POST['fullname'];
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			$anhien = $_POST['anhien'];
			$sql = "INSERT INTO `users` (`username`,`password`,`HoTen`,`anhien`) VALUES ('$username','$password','$fullname','$anhien')";
			$rs = mysql_query($sql);
			if($rs) 
			echo('
				<script>
					alert("Sign up success!!");
					window.location = "?id=user_quanly";
				</script>
			');
			else echo('<script>alert("Not OK")</script>');
		}

	?>


<section id="signup_section">
	<form data-validate="parsley" data-show-errors="true" action="" method="post" id="dangkyform">
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
				<td>Your password </td>
				<td><input type="password" data-trigger="focusin focusout" data-required="true" data-minlength="6" data-error-container="#errorPass" name="password" id="password" class="siginput" placeholder="Enter your password.."></td>
				<td id="errorPass"></td>
			</tr>
			<tr>
				<td>Re-pass </td>
				<td><input data-trigger="focusin focusout" data-required="true" data-equalto="#password" data-error-container="#errorRepass" type="password" name="repass" id="repass" class="siginput" placeholder="Re-enter your pass.."></td>
				<td id="errorRepass"></td>
			</tr>
			<tr>
				<td>Enable</td>
				<td><label style="margin-right: 1.5em;"><input checked="checked" style="margin-right:1em;" type="radio" name="anhien" value="1">Yes</label><label><input style="margin-right:1em;" type="radio" name="anhien" value="0">No</label></td>
			</tr>

		</table>
		<p>
			<button type="button" class="button" onclick="history.back()">Back</button>
			<input style="margin:1em" type="submit" class="button" id="submitBt" value="Create">
		</p>
	</form>
</section>
