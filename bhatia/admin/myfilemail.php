<?php
$now = date("Y-m-d H:i:s");

require_once "Mail.php";
require_once ('Mail/mime.php');
									
$from = "Nirav <franchisee@bhatiamobile.com>";
										
$host = "mail.indoushosting.com";								
$username = "franchisee@bhatiamobile.com";								
$password = "bhatiafranchisee";

$version="1.0";
$type="text/html; charset=iso-8859-1";

	
								$fname="Nirav";
								$lname="Patel";
								$email="nirav_aryans@yahoo.co.in";									
													 
								$to = $email;										
									
								$subject = "Test";

								
								
								$headers = array ('From' => $from,'To' => $to, 'Subject' => $subject);
																
								$html = "Hello, How r u ?"; 
								
								$file = "nirav.ppt"; 
								$crlf = "\n";
								
							
								
								$mime = new Mail_mime($crlf);								
								$mime->setHTMLBody($html);
								$mime->addAttachment($file, 'application/vnd.ms-powerpoint');
								
								$body = $mime->get();
								$headers = $mime->headers($headers);
								
								$smtp = Mail::factory('smtp',
								
								  array ('host' => $host,
								
									'auth' => true,
								
									'username' => $username,
								
									'password' => $password));
									
							
										
								$mail = $smtp->send($to, $headers, $body);
								
								if (PEAR::isError($mail)) 
								{								
														
								 } 
								 else 
								 {
								 		
								 }	
								

?>