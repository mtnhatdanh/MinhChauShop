<?php
//Convert date format dd/mm/yyyy to yyyy-mm-dd
	function convertDate($date)
	{
		$d=substr($date,0,2);
		$m=substr($date,3,2);
		$y=substr($date,6);
		return "$y-$m-$d";
	}
	//echo convertDate('20/10/2013');
	//echo date('d/m/Y H:i:s',strtotime('20/10/2013 20:08:30'));
function mailer($from,$to,$subject,$message)
{
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$subject="=?UTF-8?B?".base64_encode($subject)."?=\n";

	require_once('class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "mailer.nhatnghe";  // GMAIL username
	$mail->Password   = "1234@abcd";            // GMAIL password

	$mail->SetFrom($from,$from);
	
	$mail->AddReplyTo($from,$from);
	
	$mail->Subject    = $subject;	
	$mail->MsgHTML($message);
	$mail->IsHTML(true);
	$mail->AddAddress($to, "");
	
	if(!$mail->Send()) {
	   return false;
	} else {
	   return true;
	}
}
function genPass($n)
{
	$pass='';
	$chars='qwertyuiopasdfghjklzxcvbnm0123456789';
	
	for($i=0;$i<$n;$i++)
	{
		$p=rand(0,strlen($chars)-1);
		$pass=$pass.$chars[$p];
		
	}
    return $pass;	
}
?>