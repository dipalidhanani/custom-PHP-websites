<?php
session_start();
include("../include/config.php");

	if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "helloo";
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	else
	{
	$query = "select * from admin_mast where admin_name = '".$_SESSION['Admin_name']."'";
	$rs = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($rs);
	$a = $row['admin_name'];
	$ad = $row['is_master_admin'];

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naugty Paaji - Admin Facility</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />

<style type='text/css'>

	body {
		text-align: left;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	#calendar {
		width: 900px;
		margin: 0 auto;
		}

</style>

</head>


<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0"  class="border">
      <tr>
        <td><table width="1000" border="0" cellpadding="0" cellspacing="0">
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

<tr><td bgcolor="#FFFFFF" valign="top">

<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Today's Registered User Detail</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC" valign="top">
  <?php 
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
$query="select * from user_registration order by first_name ";
			
					
					$res = mysql_query($query);	
					$rows1 = mysql_num_rows($res);	

?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="center" valign="middle" bgcolor="#999999"><strong>User name</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Email address</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Contact no</strong></td>
               
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
$cnt=0;
while($row=mysql_fetch_array($res))
{
$dt1=explode("-",$row["register_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$register_datetime=$yy1."-".$mm1."-".$dt;
		
$todaydt=date('Y-m-d');

if($register_datetime==$todaydt){		
$cnt++;

?>
<tr>
<?php  if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php  echo $row["first_name"]." ".$row["last_name"];?></td>
<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php echo $row["email"];?></td>
<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php echo $row["contact_no"];?></td>

         

<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF" width="80"> <?php } else { ?> <td bgcolor="#F3F3F3" width="80"> <?php } ?> 
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="view_user.php?user_reg_id=<?php echo $row["user_reg_id"]; ?>"><img src="../images/zoom_in.png" alt="view" width="20" height="20" border="0" title="view" /></a></td>
                    <td align="center"><a href="edit_user_profile.php?user_reg_id=<?php echo $row["user_reg_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    
                  </tr>
                </table></td>



</tr>

<?php
}$i++; }
		 if($cnt==0){
					$err="No Record Found";
				?>
				<tr>
					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  ?>


</table></td></tr>
    
</table>
</td></tr>
<tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmInquiry" name="frmInquiry" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Today's Ask Your Lawyer</td>
           
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
$cntquestion=0;
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
$question_dt=$yy1."-".$mm1."-".$dt;		
		
$todaydt=date('Y-m-d');

if($question_dt==$todaydt){		
$cntquestion++;
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
}$i++; }
		  
		 
				if($cntquestion==0)
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
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmInquiry" name="frmInquiry" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Today's Share Your Experience</td>
           
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from share_experience order by share_experience_id desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="140"><strong>Name</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="150"><strong>Email Address</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>Mobile Number</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>City</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Experience</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="110"><strong>Datetime</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>IP Address</strong></td>
                
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
$cntexp=0;
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
$dt1=explode("-",$row["exp_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$expdatetime=$dt."-".$mm1."-".$yy1." ".$tim;
$exp_dt=$yy1."-".$mm1."-".$dt;		
		
$todaydt=date('Y-m-d');

if($exp_dt==$todaydt){		
$cntexp++;

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
<?php echo $row["experience"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $expdatetime; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["exp_ip"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>" width="50">
<table width="50" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   
                    <td align="center"><a href="share_experience_process.php?share_experience_id=<?php echo $row["share_experience_id"]; ?>&process=deleteexp"onClick="return confirm('Do You Want to Remove Selected Experience ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>



</tr>

<?php
}$i++; }
		  
		   if($cntexp==0)
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
<tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmContact" name="frmContact" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Today's Contact Inquiry</td>
           
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from contactus order by contactus_id desc";
$res=mysql_query($query);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="140"><strong>Name</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="150"><strong>Email Address</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>Mobile Number</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>City</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Message</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="110"><strong>Datetime</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>IP Address</strong></td>
                
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
$cntcontact=0;
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
$dt1=explode("-",$row["contact_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$contactdatetime=$dt."-".$mm1."-".$yy1." ".$tim;
		
 $contact_dt=$yy1."-".$mm1."-".$dt;		
		
$todaydt=date('Y-m-d');

if($contact_dt==$todaydt){		
$cntcontact++;

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
<?php echo $row["message"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $contactdatetime; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["contact_ip"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>" width="50">
<table width="50" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   
                    <td align="center"><a href="contact_us_process.php?contactus_id=<?php echo $row["contactus_id"]; ?>&process=deletecontact"onClick="return confirm('Do You Want to Remove Selected Message ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>



</tr>

<?php
}$i++; }
		  
		   
				if($cntcontact==0)
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
      
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmInquiry" name="frmInquiry" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Today's Inquiry Detail</td>
           
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from inquiry order by inquiry_id desc";
$res=mysql_query($query);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="200"><strong>Name</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="130"><strong>Contact Number</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="250"><strong>Email Address</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Message</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="115"><strong>Datetime</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="115"><strong>IP Address</strong></td>
                
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
$cntinquiry=0;
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
$dt1=explode("-",$row["inquiry_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$inquirydatetime=$dt."-".$mm1."-".$yy1." ".$tim;
$inquiry_dt=$yy1."-".$mm1."-".$dt;		
		
$todaydt=date('Y-m-d');

if($inquiry_dt==$todaydt){		
$cntinquiry++;

?>
<tr>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["inquiry_name"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["inquiry_contact"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["inquiry_email"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["inquiry_message"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $inquirydatetime; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["inquiry_ip"]; ?>
</td>

<td bgcolor="<?php echo $bg;?>" width="50">
<table width="50" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   
                    <td align="center"><a href="inquiry_process.php?inquiry_id=<?php echo $row["inquiry_id"]; ?>&process=deleteinquiry"onClick="return confirm('Do You Want to Remove Selected Inquiry ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>



</tr>

<?php
}$i++; }
		  
		   if($cntinquiry==0)
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="7" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
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