<?php session_start();
	include("include/config.php"); 
	require_once("include/function.php");
u_Connect("cn");
	
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Slider Management</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<link rel="stylesheet" href="pagination/style2.css" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #E8E8E8;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
          <tr>
            <td bgcolor="#FFFFFF">
            
                <!-- main starts here  -->  
               <table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Slider Details</td>
            <td align="right" class="normal_fonts9" >
          <table width="130" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25" align="left"><a href="slider_add.php?pid=<?php echo $_REQUEST['eid'] ?>"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                        <td align="left" class="normal_fonts9"><a href="slider_add.php?pid=<?php echo $_REQUEST['eid'] ?>"><strong>Add New Slider</strong></a></td>
              </tr>
            </table>
       </td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC" colspan="2">
  <?php 

	
 if($_REQUEST['eid']!='')
			   {
			  		$query="select * from slider_mst where slider_Id='".$_REQUEST['eid']."' order by disp_Order ";
			   }
			   else
			   {
				   $query="select * from slider_mst order by disp_Order ";
			   }
			
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
 <td align="left" valign="middle" bgcolor="#999999"><strong>Image</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Display Order</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Link</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td></tr>
<?php 

$i=1;
if($rows1>0)
{
while($k=mysql_fetch_array($res))
{
 
	  if($i%2==0)
				  {
					  $color='#FFFFFF';
				  }
				  else
				  {
					  $color='#F3F3F3';
				  }
				  
			  ?>
              <tr>
                <td bgcolor="#FFFFFF" ><img src="../slider_images/<?php echo $k['is_Image']; ?>"  border="0" width="500" height="400" /></td>
                <td bgcolor="#FFFFFF"><?php echo $k['disp_Order']; ?></td>
                <td bgcolor="#FFFFFF">index.php?page=1&type=<?php echo $k['category_link_id']; ?></td>
                <td width="45" bgcolor="#FFFFFF"><table width="40" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="slider_add.php?eid=<?php echo $k['slider_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="slider_delete.php?eid=<?php echo $k['slider_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <?php $i++; }
		  
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
				<a href='slider.php?pagenum=1' > << first 
                </a>
				<a href='slider.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
			   <a href='slider.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='slider.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='slider.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='slider.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='slider.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
				<?php
				}
			}
				?>
  
  </td>
       
       
       
    </tr> 
    </table></td></tr>       
</table>
</td></tr></table>


               
               
               
               
            
        <!-- main ends here  -->
            
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
