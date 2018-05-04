<?php
include("include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Test Drive</title>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<script language="javascript">
function validation_testdrive()
{
	with(document.Book_test_driveform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further :";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
			{
				
				error=1;
				message=message + "\n" + "Please enter your name";
			}
			
			if(email.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter your emailid";
			}
			if(check_valid_email(email.value)==false)
			{
				error=1;
				message=message + "\n" + "Please enter valid emailid";
			}
			
			
			if(contactno.value=='')
			{
				error=1;
				message=message + "\n" + "Please enter contact number";
			}	
			
			if (error==1)
			{
			
				alert(message);
				return false;
			}
			else
			{
				
				return true;		
			}
	}
}
</script>

<link href="css/home.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><?php include("header.php"); ?></td>
  </tr>
  <tr>
    <td align="center" valign="top">
   <form name="Book_test_driveform" id="Book_test_driveform" method="post" action="processBook_test_drive.php" enctype="multipart/form-data"> 
    <table width="980" border="0" align="center" cellpadding="0" cellspacing="10">
      <tr>
        <td colspan="4"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
            <tr>
              <td height="25" class="title">Book Test Drive </td>
            </tr>
            <tr>
              <td height="5" class="title"></td>
            </tr>
          </table></td>
         </tr>
      <tr>
       <td width="80">&nbsp;</td>
        <td width="150" height="32" class="black10"><strong>Vehicle : </strong></td>
        <td>
          <select name="bike_name" class="blue" id="bike_name" style="width:258px; padding:4px; border:solid 1px #CCC;">
           <option value="" style="color:#000; font-weight:bold;" selected="selected">Please Select</option>
            <option value="" style="color:#000; font-weight:bold;">Select Two Wheelers</option>
             <?php $q=mysql_query("select * from bike_mast where type=0 order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" <?php if($rowq['Bike_id']==$_POST["bike_name"]){echo "selected";} ?>><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
               <option value="" style="color:#000; font-weight:bold;">Select Three Wheelers</option>
             <?php $q=mysql_query("select * from bike_mast where type=1 order by Bike_name"); 
			 while($rowq=mysql_fetch_array($q)){
			  ?>
              <option value="<?php echo $rowq['Bike_id']; ?>" <?php if($rowq['Bike_id']==$_POST["bike_name"]){echo "selected";} ?>><?php echo $rowq['Bike_name']; ?></option>
              <?php } ?>
          </select>
        </td>
        <td rowspan="6" align="left" valign="middle">&nbsp;</td>
      </tr>
   
     
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Name : </strong></td>
        <td><input name="name" type="text" class="blue"  id="name" style="width:250px; padding:4px; border:solid 1px #CCC;" value="<?php if($_POST["name"]!="Name"){echo $_POST["name"];} ?>" /></td>
        </tr>
       <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Contact Number : </strong></td>
        <td><input name="contactno" type="text" class="blue"  id="contactno" style="width:250px; padding:4px; border:solid 1px #CCC;" value="<?php if($_POST["contactno"]!="Contact"){echo $_POST["contactno"];} ?>" /></td>
        </tr>
        <tr>
        <td>&nbsp;</td>
        <td height="32" class="black10"><strong>Email Address : </strong></td>
        <td><input name="email" type="text" class="blue"  id="email" style="width:250px; padding:4px; border:solid 1px #CCC;"/></td>
        </tr>
     
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">&nbsp;
               
          
             </td>
        <td> <input type="hidden" name="process" value="addtestdrive" /> 
          <input name="submit" type="image" class="normal_fonts9" value="" src="images/booknow.png" onClick="return validation_testdrive();" /></td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
  <tr>
    <td align="center" valign="top"><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
