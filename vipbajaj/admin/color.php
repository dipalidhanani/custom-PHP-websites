<?php
session_start();
require_once("include/config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO - Colors</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
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
                
<table width="100%" border="0" cellspacing="0" cellpadding="0">
     
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form method="post" id="frmColor" name="frmColor" action="" >

<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Colors</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="../images/add.png" width="20" height="20" /></td>
                <td ><a href="color.php?action=new" class="normal_fonts10"><strong>Add New</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 
  
 

$query="select * from color_mast ";

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
<td align="left" valign="middle" bgcolor="#999999"><strong>Color</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Color image</strong></td>

                
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
<?php  echo $row["Color"];?></td>
<td bgcolor="<?php echo $bg;?>">
<img src="../colors/<?php echo $row["Color_image"]; ?>" width="23" height="23" />
</td>
         

<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="color.php?action=edit&Color_id=<?php echo $row["Color_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="colorprocess.php?Color_id=<?php echo $row["Color_id"]; ?>&process=delete"onClick="return confirm('Do You Want to Remove Selected Color ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
					<td colspan="14" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
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
				<a href='color.php?pagenum=1' > < first 
                </a>
				<a href='color.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
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
			   <a href='color.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='color.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='color.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='color.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='color.php?pagenum=<?php echo $last; ?>'>Last > </a>	
				<?php
				}
			}
				?>
  
  </td>
    </tr>
    </table></td></tr>        
</table>
</td></tr></table>

</form>
<!--   main ends here-->

</td>
      </tr>
      
      <?php
	  }
	  ?>
       <?php
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form class="cmxform" id="frmColor" name="frmColor" method="post" action="colorprocess.php" enctype="multipart/form-data">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Color</td>
          </tr>
          <tr>
            <td>
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" class="normal_fonts9">Color</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate">
                <input name="txtColor" type="text" id="txtColor" class="normal_fonts9" size="40" /></td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Attach color image</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="colorfile" type="file" id="colorfile" class="normal_fonts9" size="40" />
                (width 23 pixels x 23 pixles)</td>
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
                            <input type="hidden" name="process" value="Add" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Submit" /></td>
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
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF">
        <form id="ColorForm" method="post" action="colorprocess.php" enctype="multipart/form-data">

                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Color Details</td>
          </tr>
          <tr>
            <td>
           <?php 

   $a=$_GET["Color_id"];
 

   $query = "select * from color_mast where Color_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	?>     
           <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Color</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                <input name="txtColor" type="text" id="txtColor" class="normal_fonts9" size="40" value="<?php echo $row["Color"]; ?>" />
                <input name="hdnColid" type="hidden" id="hdnColid" value="<?php echo $row["Color_id"]; ?>" />
                </td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Current Image</td>
                <td align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9 err_validate"><img src="../colors/<?php echo $row["Color_image"]; ?>" width="23" height="23" /></td>
              </tr>
              <tr>
                <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Attach Color file</td>
                <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
              
<input type="file" class="normal_fonts8" name="changefile" id="changefile" >
<?php echo $row["Color_image"]; ?>
               </td></tr>
            </table>
            <?php } ?>
</td>
                          </tr>
                          <tr><td>
                          <table width="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td align="right" class="normal_fonts9" width="375">&nbsp;</td>
                            <td align="center" class="normal_fonts9" width="10">&nbsp;</td>
                            <td class="normal_fonts9" ><input type="hidden" name="process" value="Edit" />
                            <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" /></td>
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