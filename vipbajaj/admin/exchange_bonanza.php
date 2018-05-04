<?php
session_start();
include("include/config.php");

if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}


	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO - Finance</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />

<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
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
                <table width="100%" border="0" cellspacing="10" cellpadding="0">
      
         
     
      <tr>
        <td class="normal_fonts14_black">Exchange Bonanza</td>        
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td ><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td width="23%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Exchange Bonanza Date Time</strong></td>
            <td width="26%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Name</strong></td>
            <td width="24%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Mobile No</strong></td>
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Email Address</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Vehicle No</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Model Name</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Model Year</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Condition</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Expected Price</strong></td> 
            <td width="17%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Vehicle Interest</strong></td>           
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM exchange_bonanza ";
		  
		  $no=1;
		  $recordsetcategory = mysql_query($query);
		  $totrecords=mysql_num_rows($recordsetcategory);
		  if($totrecords>0){
		  while($rowcategory = mysql_fetch_array($recordsetcategory,MYSQL_ASSOC))
		  {
			  if(($no%2)==1)
			  {
					$bg="#FFFFFF";
			  }
			  else
			  {
					$bg="#F3F3F3";
			  }
			  $dt1=explode("-",$rowcategory["exchange_bonanza_datetime"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
                                                            $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $exchange_bonanza_datetime=$dt."-".$mm1."-".$yy1." ".$tim;	
	
		  ?>
          <tr>
           <td align="center" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $exchange_bonanza_datetime;?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["name"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["mobileno"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["email"];?></td> 
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["vehicle_no"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["model_name"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["model_year"];?></td> 
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["vehicle_condition"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["expected_price"];?></td>
           <td align="center" bgcolor="<?php echo $bg;?>" class="normal_fonts9"><?php echo $rowcategory["vehicle_interest"];?></td> 
            
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                       <?php 
		if($_SESSION['Is_master_admin']==1)
		{
		?>
                    <td align="center"><a href="process_exchange_bonanza.php?exchange_bonanza_id=<?php echo $rowcategory["exchange_bonanza_id"];?>&process=delete" onClick="return confirm('Do You Want to Remove Selected Exchange Bonanza ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                    <?php }  ?>
                       
                      </tr>
                </table></td>
          </tr>
          <?php
			 } }
			 else{$err="No Records Found";
			 ?>
           <tr>  <td bgcolor="#fff"  colspan="11" class="normal_fonts9" align="center"><?php echo $err;?></td></tr>
             <?php } ?>
        </table></td>
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
