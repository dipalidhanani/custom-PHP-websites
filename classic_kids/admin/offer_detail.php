<?php
session_start();
include("include/config.php");
require_once("include/function.php");
u_Connect("cn");
	$OfferId=$_REQUEST['offer_name'];
	
		
		$rs1=mysql_query("SELECT * from offer_mast where offer_id='".$OfferId."' order by offer_name") or die(mysql_error());		
		
		if($row1=mysql_fetch_array($rs1))
		{
	$dt1=explode("-",$row1["Start_date"]);
	$dd1=$dt1[0];
	$mm1=$dt1[1];
	$yy1=$dt1[2];
	
	
	$dt2=explode("-",$row1["End_date"]);
	$dd2=$dt2[0];
	$mm2=$dt2[1];
	$yy2=$dt2[2];
		$sdate=$yy1."-".$mm1."-".$dd1;
		$edate=$yy2."-".$mm2."-".$dd2;
			
			?>	

        <table border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td align="right">Offer amount :</td>
    <td align="left"><input name="txtAmount" type="text" id="txtAmount" value="<?php echo $row1["offer_amt"]; ?>" class="normal_fonts9" /></td>
    <td align="left">In : 
        <input name="rdoType" id="rdoType" value="1" <?php if($row1["offer_type"]==1)
                { echo "checked"; }?> type="radio"/>%	
                
                <input name="rdoType" id="rdoType" value="2" <?php if($row1["offer_type"]==2)
                { echo "checked"; }?> type="radio"/>Rs
    </td>
  </tr>
  <tr>
    <td align="right">Start date :</td>
    <td align="left"><input name="txtSdate" type="text" id="txtSdate"  value="<?php echo $sdate; ?>" class="normal_fonts9" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td align="right">End date :</td>
    <td align="left"><input name="txtEdate" type="text" id="txtEdate" value="<?php echo $edate; ?>" class="normal_fonts9" /></td>
    <td>&nbsp;</td>
  </tr>
</table>
     <?php  	
		}
	
?>