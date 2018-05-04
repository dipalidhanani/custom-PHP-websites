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
<title>Feedback</title>
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
        <td bgcolor="#FFFFFF">         
<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="100%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
    <td><table cellpadding="0" cellspacing="0" width="100%">
    <tr>
            <td class="normal_fonts14_black">Feedback</td>
               <form name="frmtype" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    
            <td class="normal_fonts9" align="right">
            <input type="radio" value="1" name="user_type" <?php if($_REQUEST['user_type']=='1') { ?> checked="checked" <?php } ?> onclick="this.form.submit();" />Registered User &nbsp;<input type="radio" value="0" name="user_type" <?php if($_REQUEST['user_type']=='0') { ?> checked="checked" <?php } ?>  onclick="this.form.submit();" />Guest
            </td>
   
    </form>
    </tr></table></td>
    </tr>
  
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 
if($_REQUEST["user_type"]=='1'){
$query="select * from feedback where feedback_user_type=1 order by feedback_id desc ";
}
else if($_REQUEST["user_type"]=='0')
    {
	$query="select * from feedback where feedback_user_type=0 order by feedback_id desc ";
	}
	else
	{
		$query="select * from feedback order by feedback_id desc ";
	}
//	echo $query;
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
<td width="10%" align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td width="11%" align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>
                <td width="46%" align="left" valign="middle" bgcolor="#999999"><strong>Comment</strong></td>
                 <td width="8%" align="left" valign="middle" bgcolor="#999999"><strong>Contact</strong></td>
                <td width="8%" align="left" valign="middle" bgcolor="#999999"><strong>Date</strong></td>
                <td width="8%" align="left" valign="middle" bgcolor="#999999"><strong>Ip Address</strong></td>
                <td width="9%" align="left" valign="middle" bgcolor="#999999"><strong>User Type</strong></td>
             
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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["feedback_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["comments"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["mobile_no"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["date"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["ip_address"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php if($row["feedback_user_type"]==1){echo "Registered User";}else{echo "Guest";};?></td>
</tr>

<?php
		  $i++; }
		  
		   }
				else
				{
					$err="No Record Found";
				?>
				<tr>
					<td colspan="7" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
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
    <a href='feedback.php?pagenum=1' > << first      </a>
    <a href='feedback.php?pagenum=<?php echo $pagenum-1; ?>'>Previous      </a>	
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
    <a href='feedback.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
    <a href='feedback.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='feedback.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='feedback.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='feedback.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
    <?php
				}
			}
				?>    </td>
</tr> 
    </table></td></tr>       
</table>
</td></tr></table>		</td>
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