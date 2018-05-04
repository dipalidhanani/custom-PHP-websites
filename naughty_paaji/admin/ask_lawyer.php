<?php
session_start();
require_once("../include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->  
               
               <table width="100%" border="0" cellpadding="0">
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmInquiry" name="frmInquiry" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Ask Your Lawyer</td>
           
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from ask_your_lawyer order by ask_your_lawyer_id desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="140"><strong>Name</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="150"><strong>Email Address</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>Mobile Number</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>City</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Question</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="110"><strong>Datetime</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>IP Address</strong></td>
                
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
if($rows1>0)
{
while($row=mysql_fetch_array($res))
{
 
 if($i%2!=0)
{
	$bg="#FFFFFF";
}
else 
{
	$bg="#F3F3F3";
}	
$dt1=explode("-",$row["question_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$questiondatetime=$dt."-".$mm1."-".$yy1." ".$tim;

?>
<tr>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["name"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["emailid"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["mobileno"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["city"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>">
<?php echo $row["question"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $questiondatetime; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["question_ip"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>" width="50">
<table width="50" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   
                    <td align="center"><a href="ask_lawyer_process.php?ask_your_lawyer_id=<?php echo $row["ask_your_lawyer_id"]; ?>&process=deletequestion"onClick="return confirm('Do You Want to Remove Selected Question ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>



</tr>

<?php
		  $i++; }
		  
		   }
				else
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="8" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  
		  ?>


</table></td></tr>
       
</table>


</form>
<!--   main ends here-->

</td>
      </tr>
      
      <?php
	  }
	  ?>
     
    </table>
           
            
        <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="10"></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
    </table></td>
  </tr>
</table>


</body>
</html>