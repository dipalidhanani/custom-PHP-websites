<?php
session_start();
require_once("../include/config.php");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1000"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0" >
          <tr>
            <td bgcolor="#FFFFFF"> <?php include("header.php");?></td>
          </tr>
          <tr>
            <td height="10" bgcolor="#FFFFFF"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->  
               
               <table width="100%" border="0" cellpadding="0">
     
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmtestimonial" name="frmtestimonial" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Contact Us Details</td>
           
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from contact order by  contact_id  desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="106"><strong>Name</strong></td>
<td width="133" align="left" valign="middle" bgcolor="#999999"><strong>Email Address</strong></td>
<td width="89" align="left" valign="middle" bgcolor="#999999"><strong>Mobile Number</strong></td>
<td width="422" align="left" valign="middle" bgcolor="#999999"><strong>Comment</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="91"><strong>Datetime</strong></td>
<td align="center" valign="middle" bgcolor="#999999" width="80"><strong>Action</strong></td>
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
$dt1=explode("-",$row["date"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$rdate=$dd1."-".$mm1."-".$yy1;

?>
<tr>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["contact_name"];?></td>

<td bgcolor="<?php echo $bg;?>">
<?php echo $row["email"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["mobile_no"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["comments"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $rdate;?></td>
<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>                    
                    <td align="center"><a href="process.php?contact_id=<?php echo $row["contact_id"]; ?>&process=deletecontact" onClick="return confirm('Do You Want to Remove Selected Contact ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
					<td colspan="6" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  
		  ?>


</table></td></tr>
       
</table>


</form>
</td>
      </tr>
      
      
    </table>
           
            
        <!-- main ends here  -->
            
         </td>
          </tr>
        </table></td>
      </tr>
    
    </table></td>
  </tr>
    <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        
        </td>
      </tr>
</table>


</body>
</html>