<?php


if(isset($_POST['email form'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "migas_simoes@hotmail.com";
    $email_subject = "VISITA";
 
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['mobileNumber']) ||
        !isset($_POST['visitDate']) || 
		!isset($_POST['hour']) 
		) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email = $_POST['email']; // required
    $mobileNumber = $_POST['mobileNumber']; // required
    $visitDate = $_POST['visitDate']; // not required
    $hour = $_POST['hour']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "O Sr/Sra ".$name ." prentende marcar uma visita à quinta .\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
 
    $email_message .= "Nome : ".clean_string($name)."\n";
    $email_message .= "Email : ".clean_string($email)."\n";
    $email_message .= "Telemóvel : ".clean_string($mobileNumber)."\n";
    $email_message .= "Data : ".clean_string($visitDate)."\n";
	$email_message .= "Hora : ".clean_string($hour)."\n";

 
// create email headers
$headers = "Content-type: text/plain; charset=windows-1251 \r\n"; 
$headers .= "From: $email\r\n"; 
$headers .= "Reply-To: $email\r\n"; 
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "X-Mailer: PHP/" . phpversion(); 


$mail=mail($email_to, $email_subject, $email_message, $headers);  
if($mail){
  
}else{
  echo "Mail failed to send."; 
}

?>
 
<!-- include your own success html here -->
 


Obrigado por marcar uma visita à nossa Quinta! Iremos contactá-lo brevemente.
 
<?php
}
?>