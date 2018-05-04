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
<title>Klassic Kids | Colors</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmColor" name="frmColor" action="" >

<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Colors</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
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
<img src="../images/colors/<?php echo $row["Color_image"]; ?>" />
</td>
         

<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="editColor.php?Color_id=<?php echo $row["Color_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="processColor.php?Color_id=<?php echo $row["Color_id"]; ?>&process=delete"onClick="return confirm('Do You Want to Remove Selected Color ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
<tr><td>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr><td align="left" class="normal_fonts9">
          <table width="130" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25" align="left"><a href="color_add.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                <td align="left" class="normal_fonts9"><a href="color_add.php">Add New Color</a></td>
                </tr>
            </table>  
           
       </td>
       </tr>
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
				<a href='disColor.php?pagenum=1' > < first 
                </a>
				<a href='disColor.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
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
			   <a href='disColor.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='disColor.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='disColor.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='disColor.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='disColor.php?pagenum=<?php echo $last; ?>'>Last > </a>	
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