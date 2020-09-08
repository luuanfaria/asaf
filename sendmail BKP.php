<?php
// Variables
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$subject = trim($_POST['subject']);
$message = trim($_POST['message']);

// Email address validation - works with php 5.2+
function is_email_valid($email) {
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}


if( isset($name) && isset($email) && isset($subject) && isset($message) && is_email_valid($email) ) {

	// Avoid Email Injection and Mail Form Script Hijacking
	$pattern = "/(content-type|bcc:|cc:|to:)/i";
	if( preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $message) ) {
		exit;
	}

	// Email will be send
	$to = "luuan.faria@hotmail.com"; // Change with your email address
	$sub = "Simulacao do site Asaf - ".$name; // You can define email subject
	// HTML Elements for Email Body
	$body = <<<EOD
	<strong>Nome:</strong> $name <br>
	<strong>Email:</strong> <a href="mailto:$email?subject=feedback" "email me">$email</a> <br> <br>
	<strong>Mensagem:</strong> $message <br>
	EOD;
	//Must end on first column
	
	$headers = "From:site@asafconsigbrasil.com.br"."\r\n"
							."Reply-to:".$email."\r\n"
							."X=Mailer:PHP/".phpversion();
	$headers .= 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// PHP email sender
	mail($to, $sub, $body, $headers);
}


?>
