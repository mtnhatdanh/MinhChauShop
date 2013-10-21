<style>
	#user_update {
		padding: 3em 0 3em 0;
	}
	 .siginput {
	 	font-size: 0.85em;
		line-height: 1.8em;
		width: 20em;
		display: block;
		margin-top: auto;
		margin-bottom: auto;
		padding: 0.5em;
		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		border-radius: 7px;
	}
	table {
		border-collapse: collapse;
	}
	table td {
		border: none;
	}
	table#dangky {
		width: 90%;
	}
	
	table#dangky td {
		vertical-align: middle;
		height: 3.1em;
	}
	
	table#chgpassTab td {
		height: 1.5em;
	}	
	.parsley-success {
		background: #dff0d8;
	}
	.parsley-error {
		background: #f2dede;
	}
	#ChangePass {
		width: 40%;
		padding: 2em;
	}
	
/* 	popup style */

	.changepass-popup {
		display: none;
		padding: 10px; 	
		border: 2px solid #ddd;
		float: left;
		font-size: 1.2em;
		position: fixed;
		top: 50%; left: 50%;
		background: #eee url(../img/modal-gloss.png) no-repeat -200px -80px;
		z-index: 99999;
		box-shadow: 0px 0px 20px #999;
		-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
	    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
		border-radius:3px 3px 3px 3px;
	    -moz-border-radius: 3px; /* Firefox */
	    -webkit-border-radius: 3px; /* Safari, Chrome */
	}
	
	#mask {
		display: none;
		background: #000; 
		position: fixed; left: 0; top: 0; 
		z-index: 10;
		width: 100%; height: 100%;
		opacity: 0.8;
		z-index: 999;
	}



</style>


<!-- Script -->

<!--  Validation Script -->	
<script type="text/javascript" src="../js/parsley.js"></script>

<!-- Script for popup div -->
<script type="text/javascript">
$(document).ready(function() {
	$('a.changepass-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('.close, #mask').click(function() { 
	  $('#mask , .changepass-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>



<?php 
	$user = $_GET['username'];
	$sql = "SELECT * from `users` where `username` = '$user'";
	$rs = mysql_query($sql);
	$r = mysql_fetch_assoc($rs);
	if(isset($_POST['fullname'])) {
		$fullname = $_POST['fullname'];
		$anhien = $_POST['anhien'];
		$sql1 = "UPDATE `users` SET  `HoTen` =  '$fullname',`anhien`='$anhien' WHERE  `username` ='$user'";
		$rs1 = mysql_query($sql1);
		if($rs1) echo('<script>alert("Update success!!!");window.location = "?id=user_quanly";</script>'); else echo('<script>alert("No OK");</script>');
	}
?>
<div role="main">
	<div class="wapper" id="user_update">
		<h3>User update</h3>
		<form data-validate="parsley" data-show-errors="true" action="" method="post" id="dangkyform">
			<table id="dangky">
				<tr>
					<td>Your Username </td>
					<td><h4><?php echo(strtoupper($r['username']));?></h4></td>
				</tr>
				
				<tr>
					<td width="20%">Your Fullname </td>
					<td width="30%"><input type="text" name="fullname" id="fullname" data-required="true" data-trigger="focusin focusout" data-minlength="6" data-error-container="#errorFullname" class="siginput" value="<?php echo($r['hoten']);?>"></td>
					<td width="50%" id="errorFullname"></td>
				</tr>
				
				<tr>
					<td>Enadble</td>
					<td><label style="margin-right: 1.5em;"><input <?php if($r['anhien']==1) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="1">Yes</label><label><input <?php if($r['anhien']==0) echo('checked="checked"');?> style="margin-right:1em;" type="radio" name="anhien" value="0">No</label></td>
					<td></td>
				</tr>
				
				<tr>
					<td><a href="#ChangePass" class="changepass-window">Change your password</a></td>
				</tr>
			</table>
			<p>
				<button type="button" class="button" style="margin-right:1em" onclick="history.back()">Back</button>
				<input type="submit" class="button" value="Update">
			</p>
		</form>
		<?php 
			if(isset($_POST['password'])) {
				$password = sha1($_POST['password']);
				$sql2 = "UPDATE `users` SET  `password` =  '$password' WHERE  `username` ='$user'";
				$rs2 = mysql_query($sql2);
				if($rs2) {
					echo('<script>alert("Update pass success!!!");window.location = "?id=user_quanly";</script>');
				} 
			}
		?>
		<div id="ChangePass" class="changepass-popup">
			<h3 align="center">Change your password</h3>
			<form data-validate="parsley" data-show-errors="true" action="" method="post" id="changepassform" name="changepassform">

				<table id="chgpassTab">
					<tr>
						<td>Your new password </td>
						<td><input type="password" data-trigger="focusin focusout" data-required="true" data-minlength="6" data-error-container="#errorPass" name="password" id="password" class="siginput" placeholder="Enter your password.."></td>
					</tr>
					<tr>
						<td></td>
						<td id="errorPass"></td>
					</tr>
					<tr>
						<td>Re-pass </td>
						<td><input data-trigger="focusin focusout" data-required="true" data-equalto="#password" data-error-container="#errorRepass" type="password" name="repass" id="repass" class="siginput" placeholder="Re-enter your pass.."></td>
					</tr>
					<tr>
						<td></td>
						<td id="errorRepass"></td>
					</tr>
					<tr>
						<td width="50%" align="center"><button class="close button">Close</button></td>
						<td width="50%" align="center"><input class="button" type="submit" name="chagePassSubmit" value="Change Pass"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
