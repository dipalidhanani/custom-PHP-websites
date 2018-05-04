<?php session_start();
include("../include/config.php");
if($_SESSION['Admin_id'] == "")
	{
			//echo "Unauthorised Access !!!";die;
			echo "<script>location.href='login.php';</script>";
			exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Naughty Paaji - Admin Facility</title>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>     
   <td><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
   <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("headerAdmin.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">
     
     <!--   main starts here-->
<form method="post" id="discussionform" name="discussionform" action="" >


<table width="100%" border="0" cellpadding="0" cellspacing="10">
    
    <tr>
            <td class="normal_fonts14_black">Discussion Detail</td>
            <td align="right" class="normal_fonts9">
          <table width="190" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="25" align="left"><a href="discussion_add.php"><img src="../images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                <td align="left" class="normal_fonts9"><a href="discussion_add.php"><strong>Add New Discussion board</strong></a></td>
                </tr>
            </table>  
           
       </td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC" colspan="2">
  <?php 
  
$query="select * from discussion_board ";

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

<td align="left" valign="middle" bgcolor="#999999"><strong>Discussion topic</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Total Comments</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>View Comments</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>View Abuse report</strong></td>
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
<?php  echo $row["discussion_topic"];?></td>



<td bgcolor="<?php echo $bg;?>" width="80">
<?php $qCom=mysql_query("select * from discussion_detail
where discussion_board_mast_id='".$row["discussion_board_id"]."'");
$totcom=mysql_num_rows($qCom); 
echo $totcom;?>
</td>
<td bgcolor="<?php echo $bg;?>" width="80">
<a href="display_discussion.php?discussion_board_id=<?php echo $row["discussion_board_id"]; ?>"><img src="../images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a>
</td>
<td bgcolor="<?php echo $bg;?>" width="80">
<a href="view_abuse_report.php?discussion_board_id=<?php echo $row["discussion_board_id"]; ?>"><img src="../images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a>
</td>
<td bgcolor="<?php echo $bg;?>" width="80">
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                  <td align="center"><a href="view_discussion.php?discussion_board_id=<?php echo $row["discussion_board_id"]; ?>"><img src="../images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>
                    <td align="center"><a href="edit_discussion.php?discussion_board_id=<?php echo $row["discussion_board_id"]; ?>"><img src="../images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="process_discussion.php?discussion_board_id=<?php echo $row["discussion_board_id"]; ?>&process=delete" onClick="return confirm('Do You Want to Remove Selected discussion board ?')"><img src="../images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
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
				<a href='dis_discussion.php?pagenum=1' > < first 
                </a>
				<a href='dis_discussion.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
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
			   <a href='dis_discussion.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
					   <a href='dis_discussion.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
					   <a href='dis_discussion.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
				<a href='dis_discussion.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
			   <a href='dis_discussion.php?pagenum=<?php echo $last; ?>'>Last > </a>	
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