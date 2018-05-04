<?php 
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
	                  /////////////////////////// Insert Project, Client, Document   ////////////////////

if($_REQUEST["process"]=="send_message")
{


$title=$_POST["txtTitle"];
$desc=$_POST["txtDesc"];

$dt=date("Y-m-d H:i:s");


$send=$_POST["rdoSend"];

              //////////////////  Insert intoNewsletter (for all client )  //////////////////////
$todaymonth=date("m");			  
if($send==0)
{

////////////// send Mail to All Client ////////////////

function u_SendMailAllCli($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}	
						$FromMail="Klassic Kids - <info@klassickids.com>";

$qCli = "select * from register_master where month(register_user_birth_date)='".$todaymonth."'";
$rCli= mysql_query($qCli) or die (mysql_error());   
   						
while($resnews=mysql_fetch_array($rCli))
{			

$Subject= "Klassic Kids Newsletter";	
$Data= '<table>';

	 $cliemail=$resnews["register_user_email"];	 
$ToMail="Klassic Kids - <".$cliemail.">";
$Data.='<tr>
<td>'.$_POST["message"].'</td></tr>
</table>';

					u_SendMailAllCli($FromMail,$ToMail,$Data,$Subject);
}		

}

            //////////////////  Insert into newsletter (if specific client )  //////////////////////

if($send==1)
{
	
////////////// send Mail to specific  Client ////////////////

function u_SendMailCli($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}	
						
		$FromMail="Klassic Kids - <info@klassickids.com>";
   $Desqumail=mysql_query("select * from register_master where month(register_user_birth_date)='".$todaymonth."'");
   $totCli=mysql_num_rows($Desqumail);
   for($i=1;$i<=$totCli;$i++)
   {
	$client=$_POST["chknews".$i];
	
	if($client!="")
	{	
	$Data= '<table>';
$Subject= "Klassic Kids Newsletter";
	
$cliemail=$_POST["hdnemail".$i];

$ToMail="Klassic Kids <".$cliemail.">";
$Data.='<tr>
<td>'.$_POST["message"].'</td></tr>
</table>';
u_SendMailCli($FromMail,$ToMail,$Data,$Subject);
  

    }
   }
					
 }

header("location:main.php");
exit; 
}

?>