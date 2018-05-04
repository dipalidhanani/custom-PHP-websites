<?php
session_start();
include("include/config.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to VIP AUTO – Admins </title>
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
<form method="post" action="admin_add.php" >      
         
<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Admin Detail</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
	
$query="select * from admin_mast ";

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
<td align="center" valign="middle" bgcolor="#999999"><strong>Admin name</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Emailid</strong></td>
                
                <td align="center" valign="middle" bgcolor="#999999"><strong>Mobile no</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Is master admin</strong></td>
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
<?php  if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php  echo $row["Admin_name"];?></td>
<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php echo $row["Email_id"];?></td>

<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF"> <?php } else { ?> <td bgcolor="#F3F3F3"> <?php } ?> 
<?php echo $row["Mobileno"];?></td>
<?php  if($i%2!=0){ ?><td bgcolor="#FFFFFF"><?php } else { ?> <td bgcolor="#F3F3F3">  <?php } ?>
<?php if($row["Is_master_admin"]==0)
            { echo "No";	}
			else
			{ echo "Yes";   }
           
?></td>
         

<?php if($i%2!=0){ ?><td bgcolor="#FFFFFF" width="80"> <?php } else { ?> <td bgcolor="#F3F3F3" width="80"> <?php } ?> 
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="editAdmin.php?Admin_id=<?php echo $row["Admin_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="processAdmin.php?Admin_id=<?php echo $row["Admin_id"]; ?>&process=delete"onClick="return confirm('Do You Want to Remove Selected Admin ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
<tr><td align="left" class="normal_fonts9" >
          <table width="130" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25" align="left"><a href="#"><img src="../images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                <td align="left" class="normal_fonts9"><a href="admin_add.php">Add New Admin</a></td>
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
				<a href='disAdmin.php?pagenum=1' > << first 
                </a>
				<a href='disAdmin.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
			   <a href='disAdmin.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='disAdmin.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='disAdmin.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='disAdmin.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='disAdmin.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
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