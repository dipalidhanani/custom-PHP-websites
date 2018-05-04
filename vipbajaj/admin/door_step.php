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
<title>Welcome to VIP AUTO - Door Step</title>
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
        <td class="normal_fonts14_black">Door Step</td>
       
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
           
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Bike Name</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Person Name</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Address</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Phone Number</strong></td> 
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Service Type</strong></td>
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM door_step";
		  
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
			  
	$dt=explode("-",$rowcategory["inquiry_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	 $inquiry_date=$dd1."-".$mm1."-".$yy1;
		  ?>
          <tr>
            
              <?php  $qbike=mysql_query("select * from bike_mast where Bike_id='".$rowcategory["Bike_mast_id"]."'");
			  $rowbike=mysql_fetch_array($qbike);
			  ?>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowbike["Bike_name"];?></td>           
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Person_name"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Person_address"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Phone_number"];?></td>             
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Service_type"];?></td>                
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                       <?php 
		if($_SESSION['Is_master_admin']==1)
		{
		?>
                    <td align="center"><a href="processDoor_step.php?doorstepid=<?php echo $rowcategory["Doorstep_id"];?>&process=delete" onClick="return confirm('Do You Want to Remove Selected Door Step ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                    <?php }  ?>
                       
                      </tr>
                </table></td>
          </tr>
          <?php
			 } }
			 else{$err="No Records Found";
			 ?>
           <tr>  <td bgcolor="#fff"  colspan="6" class="normal_fonts9" align="center"><?php echo $err;?></td></tr>
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
