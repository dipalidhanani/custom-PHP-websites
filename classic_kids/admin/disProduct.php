<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Products</title>
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
     
<form method="post" id="frmProduct" name="frmProduct" action="" >

<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black"> Products</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 

$query="select * from product_mast where Product_active_status=1 ";

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
				
				   if($rows1!="")
				   {
					$max = 'limit ' .($pagenum - 1) * $page_rows .',' .$page_rows; 
				   }
					
					$qmax=$query.$max;
					
					
					$res = mysql_query($qmax) or die(mysql_error());


?>
<table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
<tr>
<td align="left" valign="middle" bgcolor="#999999"><strong>Product title</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Product code</strong></td>

<td align="left" valign="middle" bgcolor="#999999"><strong>Price</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Category</strong></td>

<td align="left" valign="middle" bgcolor="#999999"><strong>Offer</strong></td>
<td align="center" valign="middle" bgcolor="#999999"><strong>edit image</strong></td>
<td align="center" valign="middle" bgcolor="#999999"><strong>view image</strong></td>
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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["Product_title"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["Product_code"];?></td>

<td bgcolor="<?php echo $bg;?>"><?php  echo $row["Price"];?></td>

<?php 
$qselect=mysql_query("select * from product_category 
					 INNER JOIN category_master ON category_master.category_ID=product_category.Category_mast_id
					 where Product_mast_id='".$row["Product_id"]."' order by product_category.Category_mast_id Asc");
$totalCat=mysql_num_rows($qselect);
?>
<td bgcolor="<?php echo $bg;?>">
<?php
$b=1;
while($rowselect=mysql_fetch_array($qselect))
{
	echo $rowselect["category_name"];
	if($b!=$totalCat)
	    {
	
			echo " >> ";
		}
	 $b++;
 } ?>
</td>
<?php 
$qselectOffer=mysql_query("select * from product_offer where Product_mast_id='".$row["Product_id"]."'");
$totalOffer=mysql_num_rows($qselectOffer); 
?>
<td bgcolor="<?php echo $bg;?>">
<?php


if($totalOffer>0)
{
?>
<?php echo " yes "; }
else{ echo " no "; }

?>
</td>
<td align="center" bgcolor="<?php echo $bg;?>"><a href="addProductImage.php?Product_id=<?php echo $row["Product_id"]; ?>&type=1">Add more Images</a></td>
<td align="center" bgcolor="<?php echo $bg;?>"><a href="viewProductImage.php?Product_id=<?php echo $row["Product_id"]; ?>&type=1">View Image</a></td>
<td align="center" bgcolor="<?php echo $bg;?>">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="editProduct.php?Product_id=<?php echo $row["Product_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="processProduct.php?Product_id=<?php echo $row["Product_id"]; ?>&process=delete"onClick="return confirm('Do You Want to Remove Selected Product ?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
                <td width="25" align="left"><a href="#"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                <td align="left" class="normal_fonts9"><a href="product_add.php">Add New Product</a></td>
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