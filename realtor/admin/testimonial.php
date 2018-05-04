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
	if(document.getElementById('user_name').value=='')
	{
		alert("Please Enter Name!");
		
		return false;
	}
	else if (isNaN(document.getElementById('user_name').value)==false)
       		{	
			alert("Please Enter Valid Name!");		
		    return false;		        		
			}
	if(document.getElementById('email').value=='')
	{
		alert("Please Enter E-Mail!");
		
		return false;
	}
	if(document.getElementById('title').value=='')
	{
		alert("Please Enter Title!");
		
		return false;
	}
	
	if(document.getElementById('description').value=='')
	{
		
		alert("Please Enter Description!");
		
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
        <td bgcolor="#FFFFFF"><form method="post" id="frmtestimonial" name="frmtestimonial" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Testimonials</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="images/add.png" width="20" height="20" /></td>
                <td ><a href="testimonial.php?action=newtestimonial" class="normal_fonts10"><strong>Add New Testimonial</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from testimonials order by testimonials_id desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="107"><strong>Name</strong></td>
<td width="113" align="left" valign="middle" bgcolor="#999999"><strong>E-Mail</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="136"><strong>Title</strong></td>
<td width="275" align="left" valign="middle" bgcolor="#999999"><strong>Description</strong></td>
<td width="116" align="left" valign="middle" bgcolor="#999999"><strong>Approve Status</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="85"><strong>Datetime</strong></td>
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
<?php  echo $row["testimonials_name"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["email"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["title"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["description"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>">
<?php if($row["approve_status"]==0)
            { echo "No";	}
			else
			{ echo "Yes";   } ?>
</td>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $rdate;?></td>
<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="testimonial.php?action=edittestimonial&testimonial_id=<?php echo $row["testimonials_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="testimonial_process.php?testimonial_id=<?php echo $row["testimonials_id"]; ?>&process=deletetestimonial"onClick="return confirm('Do You Want to Remove Selected Testimonial ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
      
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["action"]=="newtestimonial")
	  {
	  ?>
   
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmtestimonial" name="frmtestimonial" method="post" enctype="multipart/form-data" onsubmit="return validation();" action="testimonial_process.php">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Testimonials</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
             <tr bgcolor="#F3F3F3" >
                <td width="375" align="right" class="normal_fonts9">Name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="user_name" type="text" id="user_name" class="normal_fonts9" size="40" /></td>
              </tr>
                <tr>
                <td width="375" align="right" class="normal_fonts9">Email</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="email" type="text" id="email" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr bgcolor="#F3F3F3" >
                <td width="375" align="right" class="normal_fonts9">Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="title" type="text" id="title" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <textarea name="description" type="text" id="description" class="normal_fonts9" cols="50" rows="7" ></textarea></td>
              </tr>
                <tr>
                <td width="375" align="right" class="normal_fonts9">Approve Status</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input type="radio" name="approve_status" id="approve_status" value="0" />No 
                <input type="radio" name="approve_status" id="approve_status" value="1" />
                Yes
                
                </td>
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
                            <input type="hidden" name="process" value="Addtestimonial" />
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
	  if($_REQUEST["action"]=="edittestimonial")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="testimonialForm" method="post" action="testimonial_process.php" onsubmit="return validation();" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Testimonials Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["testimonial_id"];
 

   $query = "select * from testimonials where testimonials_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Name</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="user_name" type="text" id="user_name" class="normal_fonts9" size="40" value="<?php echo $row["testimonials_name"]; ?>" />
                <input name="hdntestimonialid" type="hidden" id="hdntestimonialid" value="<?php echo $row["testimonials_id"]; ?>" />
                </td>
              </tr>
              <tr>
                <td width="375" align="right" class="normal_fonts9">E-Mail</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="email" type="text" id="email" class="normal_fonts9" size="40" value="<?php echo $row["email"]; ?>" />             
                </td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="title" type="text" id="title" class="normal_fonts9" size="40" value="<?php echo $row["title"]; ?>" />             
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <textarea name="description" type="text" id="description" class="normal_fonts9" cols="50" rows="7"  ><?php echo $row["description"]; ?></textarea></td>
              </tr>
               <tr>
                <td width="375" align="right" class="normal_fonts9">Approve Status</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input type="radio" name="approve_status" id="approve_status" value="0" <?php if($row["approve_status"]==0){echo "checked";} ?> />No &nbsp;&nbsp;
                 <input type="radio" name="approve_status" id="approve_status" value="1"  <?php if($row["approve_status"]==1){echo "checked";} ?>/>Yes
                
                </td>
              </tr>
            </table>
            <?php } ?>
</td>
                          </tr>
                          <tr ><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Edittestimonial" />
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