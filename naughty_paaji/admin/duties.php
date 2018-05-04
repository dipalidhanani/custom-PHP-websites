<?php
session_start();
require_once("../include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
 <script language="javascript">

function validation_frm()
{
	
		
	if(document.getElementById('duties_title').value=='')
	{
		
		document.getElementById('errduties_title').style.display='';
		return false;
			
	}
	
	if(document.getElementById('duties_desc').value=='')
	{
		
		document.getElementById('errduties_desc').style.display='';
		return false;
			
	}
	if(document.getElementById('duties_type').value=='')
	{
		
		document.getElementById('errduties_type').style.display='';
		return false;
			
	}
	
	
	
}

</script>
<script language="javascript">

function validation1(id)
{
	
	if(id==1)
	{
		if(document.getElementById('duties_title').value=='')
		{
			
			document.getElementById('errduties_title').style.display='';
			
		}
		else
		{
			document.getElementById('errduties_title').style.display='none';
		}
	}
	
	if(id==2)
	{
		if(document.getElementById('duties_desc').value=='')
		{
			document.getElementById('errduties_desc').style.display='';
			
		}
		else
		{
			document.getElementById('errduties_desc').style.display='none';
		}
	}
	if(id==3)
	{
		if(document.getElementById('duties_type').value=='')
		{
			document.getElementById('errduties_type').style.display='';
			
		}
		else
		{
			document.getElementById('errduties_type').style.display='none';
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
            <td bgcolor="#FFFFFF"> <?php include("headerAdmin.php");?></td>
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
        <td bgcolor="#FFFFFF"><form method="post" id="frmRights_duties" name="frmRights_duties" action="" >


<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Duties</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="../images/add.png" width="20" height="20" /></td>
                <td ><a href="duties.php?action=newduties" class="normal_fonts9"><strong>Add New Duties</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from duties_mast order by duties_id desc ";
if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($query);
    				$rows1 = mysql_num_rows($data);	
					
				
				       
											
					$page_rows = 10;
   
					$last = ceil($rows1/$page_rows);
				  
					if ($pagenum < 1)
					{
					$pagenum = 1;
					}
					elseif ($pagenum > $last)
					{
					$pagenum = $last;
					}
				
				   
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
					
					
					$qmax=$query.$max;
					
					
					$res = mysql_query($qmax);	

?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999" width="115"><strong>Datetime</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Type</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Title</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Description</strong></td>
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
$dt1=explode("-",$row["duties_datetime"]);
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
<?php  echo $rdate;?></td>
<td bgcolor="<?php echo $bg;?>"> 
<?php if($row["duties_type"]==1){echo "FAQ's";}
if($row["duties_type"]==2){echo "Landmark Judgments";}
if($row["duties_type"]==3){echo "Legal Framework";}
?></td>
<td bgcolor="<?php echo $bg;?>"> 
<?php  echo $row["duties_title"];?></td>
<td bgcolor="<?php echo $bg;?>">

<?php echo $first10 = substr($row["duties_desc"], 0, 150).".."; ?>
</td>

<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td align="center"><a href="duties.php?action=viewduties&duties_id=<?php echo $row["duties_id"]; ?>"><img src="../images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>
                    <td align="center"><a href="duties.php?action=editduties&duties_id=<?php echo $row["duties_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="rights_duties_process.php?duties_id=<?php echo $row["duties_id"]; ?>&process=deleteduties"onClick="return confirm('Do You Want to Remove Selected Duties ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
     <tr>
       <td colspan="2">
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
       <tr>
       <td align="center" class="normal_fonts9">
   <?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>
				<a href='duties.php?pagenum=1' > << first 
                </a>
				<a href='duties.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
                </a>	
				<?php
}
if ($pagenum == $last) 
				{
					if($pagenum ==1)
					{
						$pagenum=1;
					}
					else
					{
					
					if($last-10>10)
					{
						$v=$last-10;						
					}
					else
					{
						$v=1;
					}
												
					for($i=$v;$i<=$last;$i++)
				{				
				?>				
			   <a href='duties.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
			   <?php
				}		
				}		
				}
				else 
				{	
					if($pagenum<10)
					{
					    if($last>10)
						{
							$pageupto=10;
						}
						else
						{
							$pageupto=$last;
						}
						
						for($i=1;$i<=$pageupto;$i++)
						{				
						?>				
					   <a href='duties.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
					   <?php
						}		
					}
					else
					{
					
						for($i=$pagenum-5;$i<=$pagenum+5;$i++)
						{
						if($i<=$last)
						{				
						?>				
					   <a href='duties.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
					   <?php
						}
						}
					}
				 }
				 
			   ?>
			   <?php
				if ($pagenum == $last)
				{
				}
				else
				{
			?>
				<a href='duties.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='duties.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
				<?php
				}
			}
				?>
  
  </td>
       
      
       
    </tr> 
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
	  if($_REQUEST["action"]=="newduties")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmRights" name="frmRights" method="post" action="rights_duties_process.php" enctype="multipart/form-data" onsubmit="return validation_frm();">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Duties</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
                <td width="375" align="right" class="normal_fonts9">Duties Type</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
               <select name="duties_type" id="duties_type" onblur="validation1(3)">
               <option value="">Select</option>
               <option value="1">FAQ's</option>
               <option value="2">Landmark Judgments</option>
               <option value="3">Legal Framework</option>
               </select>
               &nbsp;&nbsp;<span id="errduties_type" style="display:none" class="err_validate" >Please select Type</span></td>
              </tr>
              <tr>
                <td width="375" align="right" class="normal_fonts9">Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="duties_title" type="text" id="duties_title" class="normal_fonts9" size="40" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errduties_title" style="display:none" class="err_validate" >Please enter Title</span></td>
              </tr>
              <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                 <?php
	   			 include_once 'ckeditor/ckeditor.php';
				 include_once 'ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = 'ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('duties_desc', '',$config);
				 echo $code;
				 ?>
              
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
                            <input type="hidden" name="process" value="Addduties" />
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
	  if($_REQUEST["action"]=="editduties")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="dutiesForm" method="post" action="rights_duties_process.php" enctype="multipart/form-data" onsubmit="return validation_frm();">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Duties Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["duties_id"];
 

   $query = "select * from duties_mast where duties_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
                <td width="375" align="right" class="normal_fonts9">Duties Type</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
               <select name="duties_type" id="duties_type" onblur="validation1(3)">
               <option value="">Select</option>
               <option value="1" <?php if($row["duties_type"]==1){ echo "selected"; } ?> >FAQ's</option>
               <option value="2" <?php if($row["duties_type"]==2){ echo "selected"; } ?>>Landmark Judgments</option>
               <option value="3" <?php if($row["duties_type"]==3){ echo "selected"; } ?>>Legal Framework</option>
               </select>
               &nbsp;&nbsp;<span id="errduties_type" style="display:none" class="err_validate" >Please select Type</span></td>
            </tr>
              
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="duties_title" type="text" id="duties_title" class="normal_fonts9" size="40" value="<?php echo $row["duties_title"]; ?>"  onblur="validation1(1)" />&nbsp;&nbsp;<span id="errduties_title" style="display:none" class="err_validate" >Please enter Title</span>
                <input name="hdndutiesid" type="hidden" id="hdndutiesid" value="<?php echo $row["duties_id"]; ?>" />
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
               <?php
	   			 include_once 'ckeditor/ckeditor.php';
				 include_once 'ckfinder/ckfinder.php';
				 $ckeditor = new CKEditor();
				 $config['height']=150;
				 $config['width']=450;
				 $config['toolbar']="Basic";
								 
				 $ckeditor->basePath = 'ckeditor/';
				 $ckeditor->config['filebrowserBrowseUrl'] = 'ckfinder/ckfinder.html';
				 $ckeditor->config['filebrowserImageBrowseUrl'] = 'ckfinder/ckfinder.html?type=Images';
				 $ckeditor->config['filebrowserFlashBrowseUrl'] = 'ckfinder/ckfinder.html?type=Flash';
				 $ckeditor->config['filebrowserUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
				 $ckeditor->config['filebrowserImageUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
				 $ckeditor->config['filebrowserFlashUploadUrl'] = 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
				 $code = $ckeditor->editor('duties_desc', $row["duties_desc"],$config);
				 echo $code;
				 ?>               
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
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Editduties" />
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
       <?php
	  if($_REQUEST["action"]=="viewduties")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="dutiesForm" method="post" action="rights_duties_process.php" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Duties Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["duties_id"];
 

   $query = "select * from duties_mast where duties_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Title</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9">                
                <?php echo $row["duties_title"]; ?>
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><?php echo $row["duties_desc"]; ?></td>
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
                            <td class="normal_fonts9" ><input name="back" type="button" class="normal_fonts12_black" id="back" style="width:80px; height:30px" value="Back" onclick="history.go(-1)" /></td>
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