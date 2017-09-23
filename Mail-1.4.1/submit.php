<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

set_include_path("." . PATH_SEPARATOR . ($UserDir = dirname($_SERVER['DOCUMENT_ROOT'])) . "/pear/php" . PATH_SEPARATOR . get_include_path());
require_once "Mail-1.4.1/Mail.php";

$host = "ssl://smtp.gmail.com";
$username = "grandhomesenquiry@gmail.com";
$password = "grandhomes123456";
$port = "465";
$to = "ajith.kjames3@gmail.com";
$email_from = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email_subject = "site enqury" ;
$email_address = "d9605408050@gmail.com";


if(isset($_POST['email']) && isset($_POST['phone'])) {
    $data = 'Email from : '.$_POST['email'] . "\n" . "phone :" . $_POST['phone'] . "\n". "name :" . $_POST['name'] . "\n". "message :" . $_POST['message'] . "\n". "\n";
    $ret = file_put_contents('queries.txt', $data, FILE_APPEND | LOCK_EX);
    
}
else {
   die('no post data to process');
}

$headers = array ('From' => $email_from, 'To' => $to, 'Subject' => $email_subject, 'Reply-To' => $email_address);
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $data);


if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo "<script>
	alert('Email has been sent!');
	window.location.href='/index.html';
	</script>";
}
?>


           
 