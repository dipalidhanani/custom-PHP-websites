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
<title>View Product Image</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script>
checked=false;
function checkAll()
{ 
	if(checked==false)
	{
		checked=true;
	}
	else
	{
	checked=false;
	}
	for(var i=0; i<document.getElementById("frmProduct").elements.length; i++)
	{
		document.getElementById("frmProduct").elements[i].checked=checked;
	}
}



function uncheckAll()
{ 
	if(checked==true)
	{
		checked=false;
	}
	
	for(var i=0; i<document.getElementById("frmProduct").elements.length; i++)
	{
		document.getElementById("frmProduct").elements[i].checked=checked;
	}
}

function confirmdel(frm,pk)
{
	with(frm)
	{
	var flg = false;
		for(i=0;i<pk.length;i++)
		{
			if(pk[i].checked)
			{
				flg=true;
				break;
			}
		}
		if(!flg)
		{
			alert("please select the records you want to delete....")
			return false;
		}
		else
		{
			if (confirm("Are you sure you want to delete...?"))
			{
				document.frmProduct.submit();
			}
			else
			{
				return false;
			
			}
		}
		}
}
</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form method="post" id="frmProduct" name="frmProduct" action="processProduct.php"  >

<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Image Detail</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 
$a=$_GET["Product_id"];

$type=$_GET["type"];
$query="select * from product_image where Product_mast_id='".$a."' ";

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
<td align="center" valign="middle" bgcolor="#999999">&nbsp;</td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Smaller Image</strong></td>

<td align="left" valign="middle" bgcolor="#999999"><strong>View Medium Image</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>View Larger Image</strong></td>

<td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
if($rows1>0)
{
while($row=mysql_fetch_array($res))
{
 
		
?>
<tr>
<td bgcolor="#FFFFFF">
<input type="hidden" name="hdnType" id="hdnType" value="<?php echo $type;?>" />
<input name="chkImage[]" id="chkImage[]" type="checkbox" value="<?php echo $row["Image_id"];?>" /> </td>
<td bgcolor="#FFFFFF"><img src="../photo/<?php echo $row["Thumb_image"]; ?>" width="70" height="70" /> </td>
<td align="center" bgcolor="#FFFFFF"><a href="../photo/<?php echo $row["Medium_image"]; ?>" target="_blank">
<img src="images/zoom_in.png" alt="view" width="20" height="20" border="0" title="View Medium Image" /></a></td>
<td align="center" bgcolor="#FFFFFF"><a href="../photo/<?php echo $row["Large_image"]; ?>" target="_blank">
<img src="images/zoom_in.png" alt="view" width="20" height="20" border="0" title="View Larger Image" /></a></td>



 <td align="center" bgcolor="#FFFFFF">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="editProductImage.php?Image_id=<?php echo $row["Image_id"]; ?>&Product_id=<?php echo $row["Product_mast_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="processProduct.php?Image_id=<?php echo $row["Image_id"]; ?>&Product_id=<?php echo $row["Product_mast_id"]; ?>&process1=delete1"onClick="return confirm('Do You Want to Remove Selected Product ?')"><img src="images/delete_on.gif" alt="Remove" width="20" height="20" border="0" title="Remove" /></a></td>
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
<tr>
  <td align="left" class="normal_fonts9" width="450">
  <a href="#" onclick="javascript:checkAll()" > CheckAll </a>/
  <a href="#" onclick="javascript:uncheckAll()" > UncheckAll </a>
  
  <input type="submit" name="delete" src="viewProductImage.php?Product_id=<?php echo $a; ?>" style="background-image:url(../admin1/images/delete_on.gif); height:20px; width:20px; border:none; background-color:#FFF" value="" title="Delete" onClick="JavaScript: return confirmdel('document.frmProduct', document.getElementsByName('chkImage[]'));" />

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
				<a href='disProduct.php?pagenum=1' > < first 
                </a>
				<a href='disProduct.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
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
			   <a href='disProduct.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='disProduct.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='disProduct.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='disProduct.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='disProduct.php?pagenum=<?php echo $last; ?>'>Last > </a>	
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
 </td></tr></table>

</body>
</html>