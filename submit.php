<?php 

    $to = "d9605408050@gmail.com"; 
    $from = $_POST['email']; 
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    

    mail($to,$subject,$message,$from);
    echo "Email sent!";

?>
           
   
    