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

</head>

<body>
<script language="javascript" type="text/javascript" src="js/checkbox.js"></script>
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
<form name="frm" id="frm" action="propertylist.php" method="post">
<table width="99%" border="0"  cellspacing="5" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="35" class="normal_fonts14_black">Property Type</td>
                            
                          
                            <td width="400" align="right"><table width="400" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                               <td width="249" align="right" class="normal_fonts9" style="font-size:13px">Select Property Category&nbsp;:</td>
                               <td width="200"  align="left" class="normal_fonts9" ><select name="category" id="category" style="width:150px"  class="normal_fonts9">
								<option value="" selected="selected">Select</option>
								<?php		 
		  							$qry="select * from property_type_master";
		  							$res=mysql_query($qry);
		 							 while($arr=mysql_fetch_array($res))
		  							{
										?>
                                        <option value="<?php echo $arr['property_type_id']; ?>" <?php if($arr['property_type_id']==$_POST['category']) { ?> selected="selected" <?php } ?>><?php echo $arr['property_type_name']; ?></option>
                                        
                                        <?php
		  							}
								?>
						</select></td>
                        <td width="50" align="right"><input type="submit" name="search" id="search" value="Search" /></td>
                                <?php /*?><td width="50" align="right"><a href="property.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                                <td width="51" align="left" class="normal_fonts9" style="font-size:13px"><a href="property.php" class="normal_fonts9">Add&nbsp;New</a></td><?php */?>
                                </tr>
                                
                              </table></td>
                            </tr>
                          </table></td>
                        </tr>
                       
                      
                      <tr>
                        <td align="left" valign="top" bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="4">
                          <tr>
                        
                           
                            <td valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Property Type</strong></td>
                            <td valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Property Category</strong></td>
                            
                            <td width="50" align="center" valign="middle" bgcolor="#999999" class="normal_fonts10"><strong>Active</strong></td>
                        
                            </tr>
                            <?php 
								if($_REQUEST['category']=='')
								{
									$resultmsg = "Please select from property category to display property type";
								}
								else
								{
									 $result = "select t.property_type_name,p.property_id,p.property_name,p.property_status from property_type_master t,property_master p where t.property_type_id=p.property_type_id and t.property_type_id='".$_REQUEST['category']."' ";
								}
								// start for searching...............
							if($_REQUEST['category']!='')
								{		
							
								if($_REQUEST["pagenum"]=="")
					{
						$pagenum = 1;
					}
					else
					{
						$pagenum=$_REQUEST["pagenum"];
					}
					
					$data = mysql_query($result) or die(mysql_error());
    				 $rows1 = mysql_num_rows($data);	
					
				
				       
											
					$page_rows = 20;
   
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
						
							
								while($row=mysql_fetch_array($res))
								{
									$proptype=$row['property_type_name'];
								
									$propname=$row['property_name'];
									$status=$row['property_status'];
									$pid=$row['property_id'];
	
									?>
							
                          <tr>
                           
                            <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $propname; ?></td>
                         	 <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $proptype; ?></td>
                            
                            <td align="center" valign="middle" bgcolor="#FFFFFF" class="normal_fonts9">
							<?php 
								if ($status == "Yes")
								{
								?>
									<a onClick="return confirm('Are you sure you want to change status?');" href="property_status.php?status=<?php echo "No"; ?>&category=<?php echo $_REQUEST['category']; ?>&pid=<?php echo $pid; ?>"><img src="images/yes.png" width="20" height="20" title="Active" border="0" /></a>
								<?php
								}
								else 
								{
								?>
									<a onClick="return confirm('Are you sure you want to change status?');" href="property_status.php?status=<?php echo "Yes"; ?>&category=<?php echo $_REQUEST['category']; ?>&pid=<?php echo $pid; ?>"><img src="images/delete_on.gif" width="20" height="20" title="Inactive" border="0" /></a>
								<?php
								}
							?>
							
							
							      
							</td>
                          
                            </tr>
                          
                          <?php
	} } else {
?>
<tr><td class="normal_fonts10" colspan="4" bgcolor="#FFFFFF" align="center"><?php echo $resultmsg; ?></td></tr>
<?php } ?>
                      <tr>
                       
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr bgcolor="#FFFFFF"><td height="10" colspan="8"></td></tr>
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
				<a href='propertylist.php?pagenum=1' > << first 
                </a>
				<a href='propertylist.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
			   <a href='propertylist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='propertylist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='propertylist.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='propertylist.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='propertylist.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
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
                      