<?php
    function send_mail($subject_mail, $body_mail, $i_am, $email){
		$my_mail = $i_am['my_mail'] ;
		$my_mail_password = $i_am['my_pass'];
		require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;
		$mail->CharSet = 'utf-8';
		$mail->isSMTP();
		$mail->Host = 'smtp.mail.ru';
		$mail->SMTPAuth = true;
		$mail->Username = $my_mail;
		$mail->Password = $my_mail_password;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->setFrom("$my_mail");
		$mail->addAddress($email); 
		$mail->isHTML(true);
		$mail->Subject = $subject_mail;
		$mail->Body = $body_mail;
		$mail->AltBody = '';
		if(!$mail->send()) { ?><script type="text/javascript">consol.log("ERROR!");</script><?php } 
		else { echo "<script type='text/javascript'>consol.log( '$mail_success' );</script>";exit("<meta http-equiv='refresh' content='0; url= /'>");}
	}
?>