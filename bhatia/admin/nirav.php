<?php
include('Mail.php'); 
include('Mail/mime.php'); 
include('Mail/mail.php');

$data .= "Hi Nirav,  <br><br> how r u ?";





$text = "Mail with attachment"; 
$html = $data; 
$file = 'pricelist.xls'; 
$crlf = "\n"; 
$hdrs = array( 
              'From'    => 'Nirav <nirav@indoushosting.com>', 
              'Subject' => "Mail with attachment"
              ); 

$mime = new Mail_mime($crlf); 

$mime->setTXTBody($text); 
$mime->setHTMLBody($html); 
$mime->addAttachment($file, 'text/plain'); 

//do not ever try to call these lines in reverse order 
$body = $mime->get(); 
$hdrs = $mime->headers($hdrs); 

$mail =& Mail::factory('mail','-f nirav@indoushosting.com');   // add the fifth parameter for the PHP mail() function 
$mail->send("niravpatel1717@gmail.com", $hdrs, $body); 

?>