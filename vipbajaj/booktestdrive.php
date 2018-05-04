<?php
include("include/config.php");

?>
<link href="css/home.css" rel="stylesheet" type="text/css" />
 <form name="Book_test_driveform" id="Book_test_driveform" method="post" action="booktestdrivefull.php" enctype="multipart/form-data"> 
<table width="182" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="182" align="left" valign="top" style="background:url(images/booktestdrive.png) no-repeat;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="10" height="55">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>
        <select name="bike_name" id="bike_name" class="blue" style="width:162px; padding:2px;">
               <option value="" style="color:#000; font-weight:bold;" selected="selected">Select Vehicle</option>
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
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="8"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="name" type="text" class="blue"  id="name" onfocus="if(this.value == 'Name') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Name';}"  value="Name" style="width:158px; padding:2px;"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="8"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="contactno" type="text" class="blue"  id="contactno" onfocus="if(this.value == 'Contact') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Contact';}"  value="Contact" style="width:158px; padding:2px;"/></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="12"></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align="center" valign="middle">
        <input type="hidden" name="process" value="addtestdrive" />          
              <input name="submit" type="image" class="normal_fonts9" value="" src="images/booknow.png" />
      
        </td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</form>