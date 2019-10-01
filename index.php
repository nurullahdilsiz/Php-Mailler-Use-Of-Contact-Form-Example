<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Mailler Use Of || Contact Form Example</title>
</head>
<body>
	<?php
    error_reporting(E_ALL ^ E_NOTICE);
	if ( $_POST ){
	
		$name = htmlspecialchars(trim($_POST['name']));		
		$Surname = htmlspecialchars(trim($_POST['Surname']));	
        $phonenumber = htmlspecialchars(trim($_POST['phonenumber']));		
        				
											
		include 'class.phpmailer.php';
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = 'smtp.gmail.com'; // smtp account gmail,yandex,outlook
		$mail->Port = 587; // 587 = gmail smtp port , 485 = yandex smtp port , 587 = outlook smtp port
		$mail->SMTPSecure = 'tls';//
		$mail->Username = 'nurullahdiliz@gmail.com';// gmail,yandex,outlook
		$mail->Password = 'password';
		$mail->SetFrom($mail->Username, 'nurullah dilsiz');// email title 
		$mail->AddAddress("demo@hotmail.com", $name);// email contact information
		$mail->CharSet = 'UTF-8';//mail charset 
		$mail->Subject = 'subject'; // mail subject
		$content = '<div style="background: #eee; padding: 10px; font-size: 14px">'.'Name:'.$name.'<br />'.'Surname:'.$Surname.'<br />'.'Telephone Number:'.$phonenumber.'</div>';
		$mail->MsgHTML($content);
		if($mail->Send()) {
			// Mail Sent Successfully
			echo '<div class="success">Email sent successfully, please check.</div>';
			header("refresh:5; url= http://www.google.com");
		} else {
			// Failed To Send Email
			echo '<div class="error">'.$mail->ErrorInfo.'</div>';
		}
	
	}
	
?>

  <form action="" method="post">

  	<input type="text" name="name" placeholder="Name">
	<input type="text" name="surname" placeholder="Surname">
	<input type="text" name="phonenumber" placeholder="Phone Number">
	<input type="submit" value="submit">


  </form>


</body>
</html>