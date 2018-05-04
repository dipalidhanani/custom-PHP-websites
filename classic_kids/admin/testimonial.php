<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Klassic Kids - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
   <script language="javascript">

function validation_frm()
{
	
		
	if(document.getElementById('testimonial_title').value=='')
	{
		
		document.getElementById('errtestimonial_title').style.display='';
		return false;
			
	}
	
	if(document.getElementById('testimonial_desc').value=='')
	{
		
		document.getElementById('errtestimonial_desc').style.display='';
		return false;
			
	}
	
	
	
}

</script>
<script language="javascript">

function validation1(id)
{
	
	if(id==1)
	{
		if(document.getElementById('testimonial_title').value=='')
		{
			
			document.getElementById('errtestimonial_title').style.display='';
			
		}
		else
		{
			document.getElementById('errtestimonial_title').style.display='none';
		}
	}
	
	if(id==2)
	{
		if(document.getElementById('testimonial_desc').value=='')
		{
			document.getElementById('errtestimonial_desc').style.display='';
			
		}
		else
		{
			document.getElementById('errtestimonial_desc').style.display='none';
		}
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
$query="select * from testimonial_mast order by testimonial_id desc";
$res=mysql_query($query);
$rows1=mysql_num_rows($res);
?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Title</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Description</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="115"><strong>Datetime</strong></td>
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
$dt1=explode("-",$row["testimonial_datetime"]);
			$yy1=$dt1[0];
			$mm1=$dt1[1];
			$dd1=$dt1[2];
		$tm=explode(" ",$dd1);
			 $dt=$tm[0];
			 $tim=$tm[1];
		$rdate=$dt."-".$mm1."-".$yy1." ".$tim;

?>
<tr>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["testimonial_title"];?></td>
<td bgcolor="<?php echo $bg;?>">
<?php echo $row["testimonial_desc"]; ?>
</td>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $rdate;?></td>
<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="testimonial.php?action=edittestimonial&testimonial_id=<?php echo $row["testimonial_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="testimonial_process.php?testimonial_id=<?php echo $row["testimonial_id"]; ?>&process=deletetestimonial"onClick="return confirm('Do You Want to Remove Selected Testimonial ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
	  if($_REQUEST["action"]=="newtestimonial")
	  {
	  ?>
   
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmtestimonial" name="frmtestimonial" method="post" enctype="multipart/form-data" onsubmit="return validation_frm();" action="testimonial_process.php">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Testimonials</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" class="normal_fonts9">Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="testimonial_title" type="text" id="testimonial_title" class="normal_fonts9" size="40" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errtestimonial_title" style="display:none" class="err_validate" >Please enter Title</span></td>
              </tr>
              <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <textarea name="testimonial_desc" type="text" id="testimonial_desc" class="normal_fonts9" cols="50" rows="7" onblur="validation1(2)" ></textarea>&nbsp;&nbsp;<span id="errtestimonial_desc" style="display:none" class="err_validate" >Please enter Description</span></td>
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
        <form id="testimonialForm" method="post" action="testimonial_process.php" onsubmit="return validation_frm();" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Testimonials Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["testimonial_id"];
 

   $query = "select * from testimonial_mast where testimonial_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="testimonial_title" type="text" id="testimonial_title" class="normal_fonts9" size="40" value="<?php echo $row["testimonial_title"]; ?>" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errtestimonial_title" style="display:none" class="err_validate" >Please enter Title</span>
                <input name="hdntestimonialid" type="hidden" id="hdntestimonialid" value="<?php echo $row["testimonial_id"]; ?>" />
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <textarea name="testimonial_desc" type="text" id="testimonial_desc" class="normal_fonts9" cols="50" rows="7" onblur="validation1(2)" ><?php echo $row["testimonial_desc"]; ?></textarea>&nbsp;&nbsp;<span id="errtestimonial_desc" style="display:none" class="err_validate" >Please enter Description</span></td>
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