<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Klassic Kids | Email to Friend</title>
<script type="text/javascript">
checked=false;
function checkedAll (formtestimonial) {
	var aa= document.getElementById('formtestimonial');
	 if (checked == false)
          {
           checked = true
          }
        else
          {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
	 aa.elements[i].checked = checked;
	}
      }
</script>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
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
            <td class="normal_fonts14_black">Testimonials</td>
    </tr>
     <tr>
       <td bgcolor="#CCCCCC">
  <?php 

$query="select * from testimonials order by testimonials_ID desc ";

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
<form name="formtestimonial" method="post" action="testimonialprocess.php" id="formtestimonial">
<tr>
  <td align="center" valign="middle" bgcolor="#999999"><input type='checkbox' name='checkall' onclick='checkedAll(formtestimonial);'></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Testimonial By</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Message</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Datetime</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>IP</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Approve Status</strong></td>
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
  <td align="center" bgcolor="<?php echo $bg;?>"><input type="checkbox" name="testimonialid[]" id="testimonialid" value="<?php  echo $row["testimonials_ID"];?>" /></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["testimonials_name"]."<br/>".$row["testimonials_email"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["testimonials_message"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php
	$datetime=$row["testimonials_datetime"];
	$datetime=explode(" ",$datetime);
	$date=$datetime[0];
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	$datetime=$date." ".$datetime[1];
	echo $datetime;
?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["testimonials_IP"];?></td>
<td bgcolor="<?php echo $bg;?>">
		<?php  
		if($row["testimonials_active_status"]==1)
		{
			echo "Yes";
		}
		else
		{
			echo "No";
		}
		?></td>
</tr>


<?php
		  $i++; }
		  ?>
          <tr>
      <td>&nbsp;</td>
      <td colspan="5"><input name="submit" type="submit" class="normal_fonts9" value="Approve Selected" /> <input name="submit" type="submit" class="normal_fonts9" value="Reject Selected" /> <input name="submit" type="submit" class="normal_fonts9" value="Remove Selected" /></td>
      </tr>
          <?php
		  
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

</form>
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
    <a href='disRegisteredusers.php?pagenum=1' > << first 
      </a>
    <a href='disRegisteredusers.php?pagenum=<?php echo $pagenum-1; ?>'>Previous
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
    <a href='disRegisteredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
    <a href='disRegisteredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='disRegisteredusers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='disRegisteredusers.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='disRegisteredusers.php?pagenum=<?php echo $last; ?>'>Last >> </a>	
    <?php
				}
			}
				?>
    
    </td>
  
  
  
</tr> 
    </table></td></tr>       
</table>
</td></tr></table>
		</td>
      </tr>
    </table></td>
  </tr>
</table>
 
</body>
</html>