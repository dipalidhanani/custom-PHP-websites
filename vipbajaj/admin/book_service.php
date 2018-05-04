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
<title>Welcome to VIP AUTO - Book Service</title>
<link href="../css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../menu_style.css" type="text/css" />
<link rel="stylesheet" href="calendar/css1/jquery.ui.all.css">
<script src="calendar/js/jquery-1.4.3.js"></script> 
	<script src="calendar/js/jquery.ui.core.js"></script> 

	<script src="calendar/js/jquery.ui.datepicker.js"></script> 

	<script type="text/javascript"> 
	
	var $j = jQuery.noConflict();
	
	$j(function() {
		$j( "#service_date" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	
</script>

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
<body style="font-size:62.5%;">
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
        <td class="normal_fonts14_black">Book Service</td>
        <td align="right" class="normal_fonts14_black"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="bike.php?action=new"><img src="../images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="book_service.php?action=new">Book Service</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr>
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Book Service Date</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Service Date</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Bike Name</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Person Name</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Address</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Phone Number</strong></td>  
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Bike Number</strong></td>      
            <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Service Type</strong></td>
             <td align="left" bgcolor="#999999" class="normal_fonts10"><strong>Pick up and drop</strong></td>
            <td width="10%" align="center" bgcolor="#999999" class="normal_fonts10"><strong>Action</strong></td>
          </tr>
          <?php
		  
		  $query="SELECT * FROM bike_book_service";
		  
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
	$dt1=explode("-",$rowcategory["Book_service_currentdatetime"]);
                                                                $yy1=$dt1[0];
                                                                $mm1=$dt1[1];
                                                                $dd1=$dt1[2];
                                                            $tm=explode(" ",$dd1);
															     $dt=$tm[0];
																 $tim=$tm[1];
                                                            $Book_service_currentdatetime=$dt."-".$mm1."-".$yy1." ".$tim;	  
	$dt=explode("-",$rowcategory["Book_service_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	 $book_service_date=$dd1."-".$mm1."-".$yy1;
 ?>
          <tr>
           <td align="left" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $Book_service_currentdatetime;?></td>
               <td align="left" class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $book_service_date;?></td>
              <?php  $qbike=mysql_query("select * from bike_mast where Bike_id='".$rowcategory["Bike_mast_id"]."'");
			  $rowbike=mysql_fetch_array($qbike);
			  ?>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowbike["Bike_name"];?></td>           
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Person_name"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Person_address"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["phone_number"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["Bike_number"];?></td>
               <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["service_type"];?></td>
                <td class="normal_fonts9" bgcolor="<?php echo $bg;?>"><?php echo $rowcategory["door_step"];?></td>
             <td align="center" bgcolor="<?php echo $bg;?>"><table border="0" cellspacing="1" cellpadding="1">
                      <tr>
                       <?php 
		if($_SESSION['Is_master_admin']==1)
		{
		?>
                    <td align="center"><a href="processService.php?book_serviceid=<?php echo $rowcategory["Bike_book_service_id"];?>&process=delete" onClick="return confirm('Do You Want to Remove Selected Bike Service ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                    <?php }  ?>
                       
                      </tr>
                </table></td>
          </tr>
          <?php
			 } }
			 else{$err="No Records Found";
			 ?>
           <tr>  <td bgcolor="#fff"  colspan="9" class="normal_fonts9" align="center"><?php echo $err;?></td></tr>
             <?php } ?>
        </table></td>
      </tr>
      
     
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
       <tr>
        <td colspan="2">
        <form name="book_serviceform" id="book_serviceform" method="post" action="processService.php" enctype="multipart/form-data"> 
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border"> 
        <tr><td colspan="3">
          <table  width="100%" border="0" cellpadding="5" cellspacing="0">        
            <tr>
              <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Name</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top">
              <select name="bike_name" id="bike_name">
            <option value="">Select Bike</option>
             <?php $q=mysql_query("select * from bike_mast order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" <?php if($rowq['Bike_id']==$_POST["bike_name"]){echo "selected";} ?>><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
          </select>
              </td>
              </tr>
           <tr bgcolor="#F3F3F3">
              <td width="30%" align="right" valign="top" class="normal_fonts9">Service Date</td>
              <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="service_date" id="service_date" type="text" class="normal_fonts9" size="45" /></td>
              </tr>
            <tr>
       
         <td width="30%" align="right" valign="top" class="normal_fonts9">Person Name </td>
         <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="person_name" type="text" class="blue"  id="person_name" /></td>
        </tr>
       <tr  bgcolor="#F3F3F3">
       
         <td width="30%" align="right" valign="top" class="normal_fonts9">Address</td>
        <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="address" type="text" class="blue"  id="address" /></td>
        </tr>
         <tr>
       
         <td width="30%" align="right" valign="top" class="normal_fonts9">Phone Number</td>
        <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="phone_number" type="text" class="blue"  id="phone_number" /></td>
        </tr>
       <tr  bgcolor="#F3F3F3">
       
         <td width="30%" align="right" valign="top" class="normal_fonts9">Bike Number </td>
       <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top"><input name="bike_number" type="text" class="blue"  id="bike_number" /></td>
        </tr>
       <tr>
      
         <td width="30%" align="right" valign="top" class="normal_fonts9">Service Type</td>
        <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9"><input name="service_type" type="radio" class="blue"  id="service_type" value="Free"/>&nbsp;Free
          <input name="service_type" type="radio" class="blue"  id="service_type" value="Paid"/>&nbsp;Paid
          <input name="service_type" type="radio" class="blue"  id="service_type" value="Major"/>&nbsp;Major
          <input name="service_type" type="radio" class="blue"  id="service_type" value="Accident"/>&nbsp;Accident
          <input name="service_type" type="radio" class="blue"  id="service_type" value="Other"/>&nbsp;Other
        </td>
        </tr>
        <tr>
      
         <td width="30%" align="right" valign="top" class="normal_fonts9">Pick up and drop facility</td>
        <td width="1%" align="left" valign="top">:</td>
              <td align="left" valign="top" class="normal_fonts9">
          <input name="door_step" type="radio" class="blue"  id="door_step" value="Yes"/>&nbsp;Yes
          <input name="door_step" type="radio" class="blue"  id="door_step" value="No"/>&nbsp;No
         
        </td>
        </tr>
            
            </table>
        </td>
                   </tr>
         
                  
          <tr>
            <td width="11%" align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td width="21%" align="left" valign="top" >&nbsp;</td>
            <td width="68%" align="left" valign="top" class="normal_fonts9">  
              <input type="hidden" name="process" value="addservice" />          
              <input name="submit" type="submit" class="normal_fonts9" value="Submit" /></td>
          </tr></table>
          </form>
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
