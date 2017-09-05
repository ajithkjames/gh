           
   
<?php 

    $to = "ajith.kjames3@gmail.com"; 
    $from = $_POST['email']; 
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $subject = "site enqury";
    $message = $_POST['message'];
    $header = 'From: NewEnquiry <' .$from.'>'. "\r\n";




	if(isset($_POST['email']) && isset($_POST['phone'])) {
	    $data = 'Email from : '.$_POST['email'] . "\n" . "phone :" . $_POST['phone'] . "\n". "name :" . $_POST['name'] . "\n". "message :" . $_POST['message'] . "\n". "\n";
	    $ret = file_put_contents('queries.txt', $data, FILE_APPEND | LOCK_EX);
	    
	}
	else {
	   die('no post data to process');
	}
    mail($to,$subject,$message,$header);
   	echo "<script>
	alert('Email has been sent!');
	window.location.href='contact.html';
	</script>";

?>
           
   
    