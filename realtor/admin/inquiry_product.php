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
<title>Product Detail Inquiry</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<script type="text/javascript" src="ajax/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="ajax/highslide.css" />
<script type="text/javascript">
hs.graphicsDir = 'ajax/graphics/';
hs.outlineType = 'rounded-white';
hs.showCredits = false;
hs.wrapperClassName = 'draggable-header';
</script>
<link rel="stylesheet" href="ajax/css/lightbox.css" type="text/css" media="screen" />	
<script src="ajax/js/prototype.js" type="text/javascript"></script>
<script src="ajax/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="ajax/js/lightbox.js" type="text/javascript"></script>
</head>
<body>     
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>

<tr><td bgcolor="#FFFFFF">
<table width="99%" border="0" cellspacing="10" cellpadding="0" >    
    <tr>
            <td class="normal_fonts14_black">Product Detail Inquiry</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 

$query="select * from inquiry
INNER JOIN product_master ON product_master.product_ID=inquiry.inquiry_forid
where inquiry_for=1 order by inquiry_id desc ";

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
  <td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Country</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>City</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Contact no</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Query / Message</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Inquiry For</strong></td>
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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["inquiry_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_country"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_city"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_contactno"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["inquiry_message"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo "Product - ".$row["product_title"];?></td>
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
    <a href='inquiry.php?pagenum=1' > << first      </a>
    <a href='inquiry.php?pagenum=<?php echo $pagenum-1; ?>'>Previous      </a>	
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
    <a href='inquiry_product.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
    <a href='inquiry_product.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='inquiry_product.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='inquiry_product.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='inquiry_product.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
    <?php
				}
			}
				?>    </td>
</tr> 
    </table></td></tr>       
</table>
</td></tr></table></td>
  </tr>
  
  <tr>
        <td align="center" valign="middle">
        <?php  include("footer.php"); ?>
        </td>
  </tr>
</table>
</body>
</html>