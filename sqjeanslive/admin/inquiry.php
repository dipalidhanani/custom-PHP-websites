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
<title>Welcome to SQ Jeans - Admin Panel</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<?php
require_once("include/files.php");
?>
</head>

<body>

      
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      
      <tr>
        <td bgcolor="#FFFFFF">         
<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Inquiry</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 

$query="select * from contactus_request order by request_id desc ";

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
                <td width="15%" align="left" valign="middle" bgcolor="#999999"><strong>Email</strong></td>
                <td width="10%" align="left" valign="middle" bgcolor="#999999"><strong>Phone / Mobile</strong></td>
                <td width="15%" align="left" valign="middle" bgcolor="#999999"><strong>Address</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Query</strong></td>
                <td width="12%" align="center" valign="middle" bgcolor="#999999"><strong>Date Time</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>IP</strong></td>
                <td width="5%" align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["request_by_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["request_by_email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["request_by_phone"]."<br/>".$row["request_by_mobile"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["request_by_address"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php echo $row["request_by_query"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["request_on_datetime"];?></td>
<td align="center" bgcolor="<?php echo $bg;?>"><?php echo $row["request_from_ip"];?></td>
<td bgcolor="<?php echo $bg;?>"> 
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><a href="process.php?process=removeinquiry&inquiryid=<?php echo $row["request_id"];?>" onClick="return confirm('Do you want to delete selected inquiry?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" style="cursor:pointer;"/></a></td>
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
					<td colspan="16" align="center" bgcolor="#FFFFFF"><?php echo $err; ?></td>
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
    <a href='registeredusers.php?pagenum=1' > << first      </a>
    <a href='registeredusers.php?pagenum=<?php echo $pagenum-1; ?>'>Previous      </a>	
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
					
					if($last-100>100)
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
    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='registeredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='registeredusers.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='registeredusers.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
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
    <td><?php include("footer.php");?></td>
  </tr>
</table>
 
</body>
</html>