<?php session_start();
include("include/config.php");

  $dt=date("Y-m-d H:i:s");
  $ip=$_SERVER['REMOTE_ADDR'];
			 $query="insert into inquiry 
			(
			 inquiry_name,			 
			 inquiry_contact,			
			 inquiry_email,
			 inquiry_message,
			 inquiry_datetime,
			 inquiry_ip
			 )
			values
			(
			 '".$_REQUEST["inquiry_name"]."',
			 '".$_REQUEST["inquiry_contact"]."',
			 '".$_REQUEST["inquiry_email"]."',
			 '".$_REQUEST["inquiry_message"]."',
			 '".$dt."',
			 '".$ip."'
			 )	
			";
			
			mysql_query($query);
		
		
			$productname=$rowq['product_title'];
								function u_SendMail($FromMail,$ToMail,$Data,$Subject)
								{
									$headers = "MIME-Version: 1.0\n"; 
									$headers .= "Content-type: text/html; charset=iso-8859-1\n";
									
									$headers .= "From: $FromMail\n";
								
									if(strpos($_SERVER['SERVER_NAME'],".com"))
									{
										$myresult=mail($ToMail, $Subject , $Data, $headers);
									}					
								}	
								$Subject= "Inquiry @ Naughty Paaji";						
									
								u_SendMail($FromMail,$ToMail,$Data,$Subject);
								
								$FromMail="Naughty Paaji <".$_REQUEST["inquiry_email"].">";
								$ToMail="Naughty Paaji <info@naughtypaaji.com>";
								
								
													
								$Data= '<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
                                  <td colspan="2" valign="top"><font size="2" face="Arial">Dear Admin,</font></td>
                                </tr>
                               
                                <tr>
                                  <td colspan="2" valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_name"].' has sent Inquiry to Naughty Paaji with the following details :</font></td>
                                </tr>                              
                                
                                <tr>
                                  <td width="15%" valign="top"><font size="2" face="Arial">Name :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_name"].'</font></td>
                                </tr>
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Email :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_email"].'</font></td>
                                </tr>                                
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Contact No  :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_contact"].'</font></td>
                                </tr>
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Your Message  :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_message"].'</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                              
                                <tr>
                                  <td colspan="2"><font size="2" face="Arial">Regards,</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><font size="2" face="Arial">Naughty Paaji Team</font></td>
  </tr>
                                </table>';
								
							
															
								$Subject= "Inquiry @ Naughty Paaji";						
									
								u_SendMail($FromMail,$ToMail,$Data,$Subject);
								
								
								$FromMail="Naughty Paaji <info@naughtypaaji.com>";
								$ToMail="Naughty Paaji <".$_REQUEST["inquiry_email"].">";
													
								$Data= '
								
								<table width="100%" border="0" cellspacing="0" cellpadding="5">
<tr>
                                  <td colspan="2" valign="top"><font size="2" face="Arial">Dear '.$_REQUEST["inquiry_name"].',</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><font size="2" face="Arial">Thank you for inquiry to naughtypaaji.com</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2" valign="top"><font size="2" face="Arial">Your details are as below:</font></td>
                                </tr>                               
                                
                                <tr>
                                  <td width="15%" valign="top"><font size="2" face="Arial">Name :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_name"].'</font></td>
                                </tr>
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Email :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_email"].'</font></td>
                                </tr>                               
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Contact No  :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_contact"].'</font></td>
                                </tr>
                                <tr>
                                  <td valign="top"><font size="2" face="Arial">Your Message  :</font></td>
                                  <td valign="top"><font size="2" face="Arial">'.$_REQUEST["inquiry_message"].'</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td colspan="2"><font size="2" face="Arial">Our Support Team will contact you shortly.</font></td>
  </tr>
                                <tr>
                                  <td colspan="2"><font size="2" face="Arial">Regards,</font></td>
                                </tr>
                                <tr>
                                  <td colspan="2"><font size="2" face="Arial">Naughty Paaji Team</font></td>
  </tr>
                                </table>';
								
								$Subject= "Inquiry @ Naughty Paaji";						
									
								u_SendMail($FromMail,$ToMail,$Data,$Subject);							
								
				
		
				header("Location:index.php?page=3&msg=4");
				
	exit();
?>
