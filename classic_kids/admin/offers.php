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
<title>Offers</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<link type="text/css" rel="stylesheet" href="calendar/calendar.css" media="screen"></link>
<script language="javascript" type="text/javascript" src="calendar/calendar.js"></script>
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
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" bgcolor="#FFFFFF"><?php include("header.php");?></td>
      </tr>
      
      <?php
	  if($_REQUEST["action"]=="")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><form method="post" id="frmOffer" name="frmOffer" action="" >

<table width="100%" border="0" cellpadding="0">

<tr><td bgcolor="#FFFFFF">

<table width="99%" border="0" cellspacing="10" cellpadding="0" >
    
    <tr>
            <td class="normal_fonts14_black">Offers</td>
            <td align="right" class="normal_fonts9"><table border="0" cellspacing="0" cellpadding="5">
              <tr>
                <td><img src="images/add.png" width="20" height="20" /></td>
                <td ><a href="offers.php?action=new" class="normal_fonts10"><strong>Add New</strong></a></td>
              </tr>
            </table></td>
    </tr>
     <tr>
       <td colspan="2" bgcolor="#CCCCCC">
  <?php 

$query="select * from offer_mast ";

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
<td align="left" valign="middle" bgcolor="#999999"><strong>Offer name</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Offer amount</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Start date</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>End date</strong></td>
<td align="left" valign="middle" bgcolor="#999999"><strong>Offer Actives</strong></td>
<td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
</tr>
<?php 
$i=1;
if($rows1>0)
{
while($row=mysql_fetch_array($res))
{
 $dt=explode("-",$row["Start_date"]);
	   $yy1=$dt[0];
	   $mm1=$dt[1];
	   $dd1=$dt[2];
	   $start=$dd1."-".$mm1."-".$yy1;
	   
	   $dt1=explode("-",$row["End_date"]);
	   $yy2=$dt1[0];
	   $mm2=$dt1[1];
	   $dd2=$dt1[2];
	   $end=$dd2."-".$mm2."-".$yy2;

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
<td bgcolor="<?php echo $bg;?>"><?php  echo $row["offer_name"];?></td>
<td bgcolor="<?php echo $bg;?>"><?php  if($row["offer_type"]==1){  echo $row["offer_amt"]." %"; }
			else {
				echo $row["offer_amt"]." &pound;";
			}

?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $start; ?></td>
<td bgcolor="<?php echo $bg;?>"><?php  echo $end; ?></td>
<td bgcolor="<?php echo $bg;?>"><?php  if($row["offer_active_status"]==1)
            {echo "Yes"; }
			else {
				echo "No";
			}?></td>

         


<td bgcolor="<?php echo $bg;?>" width="80"> 
<table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="offers.php?action=edit&offer_id=<?php echo $row["offer_id"]; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center">&nbsp;<!--<a href="offerprocess.php?Offer_id=<?php echo $row["offer_id"]; ?>&process=delete"onClick="return confirm('Do you want to remove selected offer?')"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a>--></td>
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
    <a href='offers.php?pagenum=1' > < first 
      </a>
    <a href='offers.php?pagenum=<?php echo $pagenum-1; ?>'>Previous</a>	
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
    <a href='offers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> | 
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
    <a href='offers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='offers.php?pagenum=<?php echo $i; ?>'><?php echo $i; ?></a> |
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
    <a href='offers.php?pagenum=<?php echo $pagenum+1; ?>'>Next</a>&nbsp;&nbsp;
    <a href='offers.php?pagenum=<?php echo $last; ?>'>Last > </a>	
    <?php
				}
			}
				?>
    
    </td>
</tr>
    </table></td></tr>        
</table>
</td></tr></table>

</form></td>
      </tr>      
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><form class="cmxform" id="frmOffer" name="frmOffer" method="post" action="offerprocess.php">
  
                
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Add New Offer</td>
          </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                <tr>
                  <td width="375" align="right" class="normal_fonts9">Offer name</td>
                  <td width="10" align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9 err_validate">
                    <input name="txtOffer" type="text" id="txtOffer" class="normal_fonts9" size="40" /></td>
                  </tr>
                
                <tr>
                  <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Offer Amount</td>
                  <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                  <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                    <input name="txtAmount" type="text" id="txtAmount" class="normal_fonts9" size="40" /></td>
                  </tr>
                <tr>
                  <td align="right" class="normal_fonts9">Amount in</td>
                  <td align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9 ">
                    <input name="rdoType" id="rdoType" value="1" type="radio" checked />%	
                    <input name="rdoType" id="rdoType" value="2" type="radio" />&pound;
                    </td></tr>
                <tr>
                  <tr>
                    <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Start date</td>
                    <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                    <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                      <input name="txtSdate" type="text" id="txtSdate" class="normal_fonts9" size="40" onFocus="displayCalendar(txtSdate,'dd-mm-yyyy',this)"/></td>
                    </tr>
                <tr>
                  <td align="right" class="normal_fonts9">End date</td>
                  <td align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9">
                    <input name="txtEdate" type="text" id="txtEdate" class="normal_fonts9" size="40" onFocus="displayCalendar(txtEdate,'dd-mm-yyyy',this)"/></td>
                  </tr>
                <tr>
                  <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Offer Active Status</td>
                  <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                  <td bgcolor="#F3F3F3" class="normal_fonts9 ">
                    <input name="rdoStatus" id="rdoStatus" value="1" type="radio" checked />
                    Yes	
                    <input name="rdoStatus" id="rdoStatus" value="0" type="radio" />
                    No
                    </td></tr>
                <tr>
                  <td align="right" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                  <td align="center" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                  <td bgcolor="#FFFFFF" class="normal_fonts9 "><input type="hidden" name="process" value="Add" />
                    <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Submit" /></td>
                  </tr>
                <tr>
                  
                  </table>
              </td>
          </tr>
              </table>
               
</form>
</td>
      </tr>
      <?php
	  }
	  ?>
      <?php
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td bgcolor="#FFFFFF"><form id="OfferForm" method="post" action="offerprocess.php">
         <table width="100%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Change Offer Detail</td>
          </tr>
          <tr>
            <td>
              <?php 

   $a=$_GET["offer_id"];
 

   $query = "select * from offer_mast where offer_id='".$a."'";
   
   $result= mysql_query($query) 
   or die (mysql_error());
   
   if($row=mysql_fetch_array($result))
   {
	   $dt1=explode("-",$row["Start_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
$dt2=explode("-",$row["End_date"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];
$sdate=$yy1."-".$mm1."-".$dd1;
$edate=$yy2."-".$mm2."-".$dd2;
	?>     
              <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
                <tr>
                  <td width="375" align="right" class="normal_fonts9">Offer name</td>
                  <td width="10" align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9 err_validate">
                    <input name="txtOffer" type="text" id="txtOffer" class="normal_fonts9" size="40" value="<?php echo $row["offer_name"]; ?>" />
                    <input name="hdnOfferid" type="hidden" id="hdnOfferid" value="<?php echo $row["offer_id"]; ?>" />
                    </td>
                  </tr>
                <tr>
                  <td width="375" align="right" bgcolor="#F3F3F3" class="normal_fonts9">Offer Amount</td>
                  <td width="10" align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                  <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                    <input name="txtAmount" type="text" id="txtAmount" class="normal_fonts9" size="40" value="<?php echo $row["offer_amt"]; ?>" />
                    
                    </td>
                  </tr>
                
                <tr>
                  <td align="right" class="normal_fonts9">Amount in</td>
                  <td align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9">
                    <input name="rdoType" id="rdoType" value="1" <?php if($row["offer_type"]==1)
                { echo "checked"; }?> type="radio"/>%	
                    
                    <input name="rdoType" id="rdoType" value="2" <?php if($row["offer_type"]==2)
                { echo "checked"; }?> type="radio"/>&pound;
                    </td></tr>
                <tr>
                  <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Start date</td>
                  <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                  <td bgcolor="#F3F3F3" class="normal_fonts9 err_validate">
                    <input name="txtSdate" type="text" id="txtSdate" class="normal_fonts9" size="40" value="<?php echo $sdate; ?>" onFocus="displayCalendar(txtSdate,'dd-mm-yyyy',this)"/></td>
                  </tr>
                <tr>
                  <td align="right" class="normal_fonts9">End date</td>
                  <td align="center" class="normal_fonts9">:</td>
                  <td class="normal_fonts9">
                    <input name="txtEdate" type="text" id="txtEdate" class="normal_fonts9" size="40" value="<?php echo $edate; ?>" onFocus="displayCalendar(txtEdate,'dd-mm-yyyy',this)"/></td>
                  </tr>
                
                <tr>
                  <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Offer Active</td>
                  <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                  <td bgcolor="#F3F3F3" class="normal_fonts9">
                    <input name="rdoStatus" id="rdoStatus" value="1" <?php if($row["offer_active_status"]==1)
                { echo "checked"; } ?> type="radio"/>
                    Yes	
                    
                    <input name="rdoStatus" id="rdoStatus" value="0" <?php if($row["offer_active_status"]==0)
                { echo "checked"; } ?> type="radio"/>
                    No
                    </td></tr>
                <tr>
                  <td align="right" class="normal_fonts9">&nbsp;</td>
                  <td align="center" class="normal_fonts9">&nbsp;</td>
                  <td class="normal_fonts9"><input type="hidden" name="process" value="Edit" />
                    <input class="submit" name="submit" type="submit" align="middle" style="width:80px; height:30px" id="submit" value="Save" /></td>
                  </tr>
                
                </table>
              <?php } ?>
  </td>
          </tr>
              </table>
          
</form>
</td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>
