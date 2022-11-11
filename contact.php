<?php

function strip_crlf($string)
{
return str_replace("\r\n", "", $string);
}


$name = $_POST["name"];
$email = $_POST["email_id"];
$phone_number = $_POST["phone_number"];
$content = $_POST["message"];
$subject = $_POST["subject"];  


$toEmail = "vishnu123seeroo@gmail.com";
// CRLF Injection attack protection
$name = strip_crlf($name);
$email = strip_crlf($email);
if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
echo "The email address is invalid.";
} else {
// appending \r\n at the end of mailheaders for end
$mailHeaders = "From: " . $name . "<" . $email . ">\r\n";
// $mailHeaders.='X-Mailer: PHP/' . phpversion().'\r\n';
// $mailHeaders.= 'MIME-Version: 1.0' . "\r\n";
// $mailHeaders.= 'Content-type: text/html; charset=iso-8859-1 \r\n';
// $mailHeaders .= "Reply-To: " . $name . "<" . $email . ">\r\n";
// $mailHeaders .= "Return-Path: " . $name . "<" . $email . ">\r\n";
//$mailHeaders .= "CC:  " . $name . "\r\n";
//$mailHeaders .= "BCC:  " . $name . "\r\n";

$email_body = "You have received a new message. ".

" Here are the details: \n Subject: ".$subject." \n Name: ".$name." \n ".

"Email: ".$email." \n Phone Number: ".$phone_number." \n Message: ".$content." \n";

if (mail($toEmail, $subject, $email_body, $mailHeaders)) {
    $message = "Your quote send successfully.";
    $type = "success";
    echo $message;

}
else{
$error_msg = "Sorry send mail error";
echo $error_msg;

}
}


?>