<?php
session_start();
require_once("../include/config.php");

if($_SESSION['rm_admin_id']=="")
{
	echo "<script type=\"text/javascript\">document.location.href='login.php'; </script>\n";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RM Realtor - Admin Facility</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
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
</style>

<script type="text/javascript" src="js/checkbox.js" ></script>

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
     
      <tr>
        <td bgcolor="#FFFFFF">             
<form name="frm" id="frm" action="" method="post">

<table width="100%" border="0" cellspacing="10" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle">
                        	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="35" class="normal_fonts14_black">Property Type</td>
                           <?php /*?>
                            <td width="80" align="right">
                            <table width="80" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td width="25" align="left"><a href="property_type.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                                <td align="left" class="normal_fonts9" style="font-size:13px"><a href="property_type.php" class="normal_fonts9">Add New</a></td>
                                </tr>
                                
                              </table></td><?php */?>
                            </tr>
                          </table></td>
                        </tr>
                        
<?php
if (isset($_SESSION['msgi'])) 
{ 
?>
	  
 <?php
			//echo $_SESSION['msgi']; 
			unset($_SESSION['msgi']); 
} 
else if(isset($_SESSION['msgu']))
{
?>
	
<?php
			//echo $_SESSION['msgu']; 
			unset($_SESSION['msgu']);
}
else if(isset($_SESSION['msgd']))
{
?>
	 
 <?php
		//	echo $_SESSION['msgd']; 
			unset($_SESSION['msgd']);
}
?>
                      <tr>
                        <td align="left" valign="top" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="4">
                          <tr>
                           
                            <td valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Property Type</strong></td>
                            </tr>
                            	<?php
								//start for paging
							
								$result = "select * from property_type_master ";
								
								// start for searching...............
								
							if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
															
					$data = mysql_query($result);
					
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
					
					
					$qmax=$result.$max;
					
					
					$res = mysql_query($qmax);	

						if($rows1>0){		
							while($row=mysql_fetch_array($res))
							{
								$name=$row['property_type_name'];
								$ptid=$row['property_type_id'];
	
						?>
							
                          <tr>                           
                            <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $name; ?></td>
                           
                            </tr>
                          
                          <?php
	                   } } else{
                      ?>
                       <tr>
                          <td class="normal_fonts9" align="center" colspan="10" bgcolor="#ffffff">No Records Found</td></tr>
                        <?php } ?>
                      <tr>
                       
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr bgcolor="#FFFFFF">
                           
                            <td align="center" class="normal_fonts9">
                            <!-- start for display paging links-->
                            	 <?php 
if($rows1!=0)
{
if ($pagenum == 1)
{
}
else
{
?>
				<a href='property_typelist.php?pagenum=1' > << first 
                </a>
				<a href='property_typelist.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
			   <a href='property_typelist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='property_typelist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='property_typelist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='property_typelist.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='property_typelist.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
				<?php
				}
			}
				?>
								<!-- end for display paging links-->
 
                            </td>
                            </tr>
                          </table>
                          </tr>
                          </table>
                          </td></tr></table>
                         </form>
                         </td></tr></table>
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