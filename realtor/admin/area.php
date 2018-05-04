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
 <script language="javascript">

function validation()
{
	if(document.getElementById('ddlcity').value=='')
	{
		alert("Please Select City!");
		
		return false;
	}
	if(document.getElementById('area_code').value=='')
	{
		
		alert("Please Enter Postal Code!");
		
		return false;
			
	}
	if(document.getElementById('area_title').value=='')
	{
		alert("Please Enter Title!");
		
		return false;
	}
	
	
}

</script>

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
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmarea" name="frmarea" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Street</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="images/add.png" width="20" height="20" /></td>
                <td ><a href="area.php?action=newarea" class="normal_fonts10"><strong>Add New Street</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from rm_area_master order by rm_area_id desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Postal Code</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Street Title</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>City</strong></td>
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

?>
<tr>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["rm_area_code"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["rm_area_title"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php 
$qcity=mysql_query("select * from rm_city_master where rm_city_id='".$row["rm_city_mast_id"]."'");
$rowc=mysql_fetch_array($qcity);
echo $rowc["rm_city_title"];

?>
</td>
<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="area.php?action=editarea&area_id=<?php echo $row["rm_area_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="area_process.php?area_id=<?php echo $row["rm_area_id"]; ?>&process=deletearea" onClick="return confirm('Do You Want to Remove Selected Street ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
					<td colspan="4" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
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
       <?php
	  if($_REQUEST["action"]=="newarea")
	  {
	  ?>
   
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmarea" name="frmarea" method="post" enctype="multipart/form-data" onsubmit="return validation();" action="area_process.php">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Street</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>

                        <td  width="375"  align="right" class="normal_fonts9">Select City</td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9">
                        	<select name="ddlcity" id="ddlcity" style="width:230px">
								<option value="">Select City</option>
								<?php		 
		  							$qry="select * from rm_city_master";
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
		      							echo "<option value=".$arr['rm_city_id'].">".$arr['rm_city_title']."</option>";
		  							}
								?>
						</select>
                      	</td>
                      </tr>
              <tr bgcolor="#F3F3F3">
                <td width="375" align="right" class="normal_fonts9">Postal Code</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="area_code" type="text" id="area_code" class="normal_fonts9" size="40" /></td>
              </tr>
             <tr>
                <td width="375" align="right" class="normal_fonts9">Street Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="area_title" type="text" id="area_title" class="normal_fonts9" size="40" /></td>
              </tr>
              
                       
            </table>
            </td>
          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" >
                            <input type="hidden" name="process" value="Addarea" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Submit" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
                          </tr>
                          
                          </table>
                          </td></tr>
 
          </table>
               
</form>
        </td>
      </tr>
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="editarea")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="areaForm" method="post" action="area_process.php" onsubmit="return validation();" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Street Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["area_id"];
 

   $query = "select * from rm_area_master where rm_area_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
               <tr>

                        <td  width="375" align="right" class="normal_fonts9">Select City</td>
                        <td width="10" align="center" class="normal_fonts9">:</td>
                        <td class="normal_fonts9">
                        	<select name="ddlcity" id="ddlcity" style="width:180px">
								<option value="">Select City</option>
								<?php		 
		  							
									$qry="select * from rm_city_master"; 
									$qry1="select c.rm_city_title from rm_city_master c , rm_area_master a where c.rm_city_id = '".$row["rm_city_mast_id"]."'";
		  							$res=mysql_query($qry);
									$rs=mysql_query($qry1);
									while($a=mysql_fetch_array($rs))
		  							{
									 $nm=$a['rm_city_title'];
										
									}
		 							 while($arr=mysql_fetch_array($res))
		  							{
										?>
           <option value="<?php echo $arr['rm_city_id'] ?>" <?php if($nm == $arr['rm_city_title']){ ?> selected="selected" <?php } ?>><?php echo $arr['rm_city_title']; ?></option>
                                       <?php
		  							}
								?>
						</select>
                        </td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Postal Code</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="area_code" type="text" id="area_code" class="normal_fonts9" size="40" value="<?php echo $row["rm_area_code"]; ?>" />
                <input name="hdnareaid" type="hidden" id="hdnareaid" value="<?php echo $row["rm_area_id"]; ?>" />
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Street Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="area_title" type="text" id="area_title" class="normal_fonts9" size="40" value="<?php echo $row["rm_area_title"]; ?>" />                
                </td>
              </tr>
            </table>
            <?php } ?>
</td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Editarea" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" />&nbsp;&nbsp;<input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
                          </tr>
                          
                          </table>
                          </td></tr>
 
          </table>
          
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