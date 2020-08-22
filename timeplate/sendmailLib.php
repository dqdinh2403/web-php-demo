
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<?php
		require_once "PHPMailer/class.phpmailer.php";
		
		function sendGMail ($username, $password, $name, $addresses, $replyTos, $subject, $content){
			$mail = new PHPMailer(true);
			
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = "ssl";
			$mail->Host=  "smtp.gmail.com";
			$mail->Port = "465";
			$mail->Username = $username;
			$mail->Password = $password;
			
			foreach ($addresses as $address)
				$mail->AddAddress($address[0],$address[1]);
			foreach ($replyTos as $reply)
				$mail->AddReplyTo($reply[0],$reply[1]);
				
			$mail->SetFrom($username,$name);
			$mail->Subject = $subject;
			$mail->MsgHTML($content);
			$mail->CharSet = "UTF-8";
			$mail->Send();
		}
	?>
