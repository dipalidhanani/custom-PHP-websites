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
	
		
	if(document.getElementById('rights_title').value=='')
	{
		
		document.getElementById('errrights_title').style.display='';
		return false;
			
	}
	
	if(document.getElementById('rights_desc').value=='')
	{
		
		document.getElementById('errrights_desc').style.display='';
		return false;
			
	}
	if(document.getElementById('rights_type').value=='')
	{
		
		document.getElementById('errrights_type').style.display='';
		return false;
			
	}
	
	
	
}

</script>
<script language="javascript">

function validation1(id)
{
	
	if(id==1)
	{
		if(document.getElementById('rights_title').value=='')
		{
			
			document.getElementById('errrights_title').style.display='';
			
		}
		else
		{
			document.getElementById('errrights_title').style.display='none';
		}
	}
	
	if(id==2)
	{
		if(document.getElementById('rights_desc').value=='')
		{
			document.getElementById('errrights_desc').style.display='';
			
		}
		else
		{
			document.getElementById('errrights_desc').style.display='none';
		}
	}
	if(id==3)
	{
		if(document.getElementById('rights_type').value=='')
		{
			document.getElementById('errrights_type').style.display='';
			
		}
		else
		{
			document.getElementById('errrights_type').style.display='none';
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
            <td class="normal_fonts14_black">Rights</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="../images/add.png" width="20" height="20" /></td>
                <td ><a href="rights_title.php?action=newrights" class="normal_fonts9"><strong>Add New Rights</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
$query="select * from rights_mast order by rights_id desc ";
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
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Title</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="245"><strong>Active Status</strong></td>
<td align="left" valign="middle" bgcolor="#999999" width="100"><strong>View/Add Rights Type</strong></td>
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
<?php  echo $row["rights_title"];?></td>


<td bgcolor="<?php echo $bg;?>"> 
<?php  if($row["rights_active_status"]==1){echo "Active";} else {echo "In Active";}?></td>

<td bgcolor="<?php echo $bg;?>" align="center"> 
<a href="rights.php?rights_id=<?php echo $row["rights_id"]; ?>"><img src="../images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>

<td bgcolor="<?php echo $bg;?>" width="80" align="center">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>                  
                    <td align="center"><a href="rights_title.php?action=editrights&rights_id=<?php echo $row["rights_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="rights_duties_title_process.php?rights_id=<?php echo $row["rights_id"]; ?>&process=deleterights"onClick="return confirm('Do You Want to Remove Selected Rights ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>                    
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
					<td colspan="5" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
				</tr>
				<?php
				}
		  
		  
		  ?>


</table></td></tr>
       <tr><td colspan="2">
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
				<a href='rights_title.php?pagenum=1' > << first 
                </a>
				<a href='rights_title.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
			   <a href='rights_title.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='rights_title.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='rights_title.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='rights_title.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='rights_title.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
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
	  if($_REQUEST["action"]=="newrights")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmRights" name="frmRights" method="post" action="rights_duties_title_process.php" enctype="multipart/form-data" onsubmit="return validation_frm();">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Rights</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
           
              <tr>
                <td width="375" align="right" class="normal_fonts9">Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="rights_title" type="text" id="rights_title" class="normal_fonts9" size="40" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errrights_title" style="display:none" class="err_validate" >Please enter Title</span></td>
              </tr>
                <tr>
                <td width="375" align="right" class="normal_fonts9">Rights Active Status</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9" valign="top">
                <input type="radio" name="rights_active_status" id="rights_active_status" value="1" checked="checked" />Active 
                &nbsp;&nbsp;
                 <input type="radio" name="rights_active_status" id="rights_active_status" value="0" />In Active 
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
                            <input type="hidden" name="process" value="Addrightstitle" />
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
	  if($_REQUEST["action"]=="editrights")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="rightsForm" method="post" action="rights_duties_title_process.php" enctype="multipart/form-data" onsubmit="return validation_frm();">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Rights Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["rights_id"];
 

   $query = "select * from rights_mast where rights_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
            <tr>
                <td width="375" align="right" class="normal_fonts9">Title</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="rights_title" type="text" id="rights_title" class="normal_fonts9" size="40" value="<?php echo $row["rights_title"]; ?>" onblur="validation1(1)" />&nbsp;&nbsp;<span id="errrights_title" style="display:none" class="err_validate" >Please enter Title</span>
                 <input name="hdnrightsid" type="hidden" id="hdnrightsid" value="<?php echo $row["rights_id"]; ?>" />
                </td>
              </tr>
                <tr>
                <td width="375" align="right" class="normal_fonts9">Rights Active Status</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9" valign="top">
                <input type="radio" name="rights_active_status" id="rights_active_status" value="1" 
				<?php if($row["rights_active_status"]==1){echo "checked";} ?> />Active 
                &nbsp;&nbsp;
                 <input type="radio" name="rights_active_status" id="rights_active_status" value="0" 
				 <?php if($row["rights_active_status"]==0){echo "checked";} ?>/>In Active 
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
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Editrights" />
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
	  if($_REQUEST["action"]=="viewrights")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="rightsForm" method="post" action="rights_duties_process.php" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Rights Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["rights_id"];
 

   $query = "select * from rights_mast where rights_id='".$a."'";
   
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
                 <?php echo $row["rights_title"]; ?>              
                </td>
              </tr>
            <tr>
                <td width="375" align="right" class="normal_fonts9">Description</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                 <?php echo $row["rights_desc"]; ?>
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