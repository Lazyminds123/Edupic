 <?php
 $name = $_POST['contact-name'];
 $phone = $_POST['contact-phone'];
 $email = $_POST['contact-email'];
 $message = $_POST['contact-message'];

 if($name == ""){
    $msg['err'] = "\n Name can not be empty!";
    $msg['field'] = "contact-name";
    $msg['code'] = FALSE;
 }elseif ($phone == ""){
    $msg['err']="\n Phone number can not be empty";
    $msg['field']= "contact-phone";
    $msg['code']= FALSE;
 }elseif (!preg_match("/^[0-9 \\-\\+]{4,7}$/i",trim($phone))){
    $msg['err']="\n please put a valid phone number!";
    $msg['field']="contact-email";
    $msg['code']= FALSE;
 }elseif ($email == ""){
    $msg['err']="\n email can not be empty";
    $msg['field']= "contact-email";
    $msg['code']= FALSE;
 }elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==false){
    $msg['err']="\n please put a valid email address!";
    $msg['field']= "contact-email";
    $msg['code']= FALSE;
 }elseif ($message == ""){
    $msg['err']="\n message can not be empty";
    $msg['field']= "contact-message";
    $msg['code']= FALSE;
 }else{
    $to = 'edupicconsultants@gmail.com';
$subject = 'Edupic contact query';
$_message = '<html><head></head><body>';
$_message .='<p>Name:'. $name .'</p>';
$_message .='<p>phone:'. $phone .'</p>';
$_message .='<p>Email:'. $email .'</p>';
$_message .='<p>Message:'. $message .'</p>';
$_message .='</body></html>';

$headers .'From: Edupic<edupicconsultants@gmail.com>'."\r\n";
$headers .='cc: yaswanthudayan@gmail.com' . "\r\n";
mail($to,$subject,$_message,$headers,'-f edupicconsultants@gmail.com');

$msg['success']= "\n Email has been sent sucessfully.";
$msg['code']=TRUE;

 }
 echo json_encode($msg)
?>