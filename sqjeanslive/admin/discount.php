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
?></head>
<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <?php
	  if($_REQUEST["action"]=="")
	  {	 	 
	  ?>
      <tr>
        <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="discount.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="discount.php?action=new">New Discount Code</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Discount Code</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Amt</strong></td>
            <td width="20%" align="center" bgcolor="#999999"><strong>Generated ON</strong></td>
            <td width="20%" align="center" bgcolor="#999999"><strong>Valid Upto</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Used</strong></td>
            <td width="10%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM discount_master order by discount_ID desc";			
			 $recordsetdiscount = mysql_query($query);
			 while($rowdiscount = mysql_fetch_array($recordsetdiscount,MYSQL_ASSOC))
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
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowdiscount["discount_code"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			echo $rowdiscount["discount_amount"];
			if($rowdiscount["discount_amount_type"]==1)
			{
				echo "%";
			}
			else
			{
				echo "$";
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo explodedate($rowdiscount["discount_amount_generated"]);?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo explodedate($rowdiscount["discount_code_upto"]);?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowdiscount["discount_code_active"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="process.php?process=removediscount&discountid=<?php echo $rowdiscount["discount_ID"];?>" onClick="return confirm('Do you want to delete selected discount?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
            <?php
			$i++;
			 }
			 ?>
        </table></td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Discount Code</strong></td>
            <td align="right" bgcolor="#999999"><strong>Price in USD</strong></td>
          </tr>
            <tr class="normal_fonts9">
            <td colspan="2" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="discountform" method="post" action="process.php" enctype="multipart/form-data">
          <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Amount</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="discountamount" type="text" class="normal_fonts9"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Type</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="discountamounttype" value="1" checked="checked"/>
            &nbsp;%
            <input type="radio" name="discountamounttype" value="2"/>
            &nbsp;$
            </td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Valid Upto</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="discountvalidupto" type="text" class="normal_fonts9" onFocus="displayCalendar(discountvalidupto,'dd-mm-yyyy',this)"/></td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newdiscount" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }	 
	  ?>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>

</body>
</html>
