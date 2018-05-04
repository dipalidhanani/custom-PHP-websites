<?php
function u_Connect($link = 'db_link',$database = DB_DATABASE, $username = DB_SERVER_USERNAME, $password = DB_SERVER_PASSWORD,$server = DB_SERVER)
 {
    global $$link;
    if (USE_CONNECT == 'true') {
      $$link = mysql_connect($server, $username, $password);
	  //echo $$link;
    }
    if ($$link) mysql_select_db($database);
	return $$link;
  }

function u_Close($link = 'db_link') 
{
    global $$link;
    return mysql_close($$link);
}
function curPageURL() 
{
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") 
	 {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } 
	 else 
	 {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
}

function displayeditorvalue($value)
{
		$value=str_replace("<p>\r\n",'',$value);
		echo $value;
}
function explodedate($datetime)
{
	$datetime=explode(" ",$datetime);
	$date=$datetime[0];
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	$datetime=$date." ".$datetime[1];
	return $datetime; 
}
function explodedobdate($date)
{
	$date=explode("-",$date);
	$year=$date[0];
	$mon=$date[1];
	$day=$date[2];
	$date=$day."-".$mon."-".$year;
	return $date; 
}
function display_product_price($productamount,$offerid)
{
	$offerenddate=date("Y-m-d");
	$recordsetoffer = mysql_query("SELECT * FROM  offer_mast where offer_active_status=1 and End_date > '".$offerenddate."' and offer_id='".$offerid."' ");
	while($rowoffer = mysql_fetch_array($recordsetoffer))
	{
		$offeramount=$rowoffer["offer_amt"];
		$offeramtype=$rowoffer["offer_type"];
	}
	
	if($offeramtype==1)
	{
		$discountamount=($productamount*$offeramount)/100;								 
		$productfinalamount=$productamount-$discountamount;
	}
	if($offeramtype==2)
	{
		$discountamount=$offeramount;								 
		$productfinalamount=$productamount-$discountamount;
	}
		if(mysql_num_rows($recordsetoffer)!=0)
		{
		?>
		<span class="font_red"><del>Rs. <?php echo $productamount;?></del></span> <strong><span class="white11"> | Rs.<?php printf("%.2f",$productfinalamount);?></span></strong>
		<?php
		}
		else
		{
		?>
        <strong><span class="white11"> Rs.<?php printf("%.2f",$productamount);?></span></strong>
		<?php
		}
}
function display_productdetail_price($productamount,$offerid)
{
		$offerenddate=date("Y-m-d");
		$recordsetoffer = mysql_query("SELECT * FROM  offer_mast where offer_active_status=1 and End_date > '".$offerenddate."' and offer_id='".$offerid."' ");
		while($rowoffer = mysql_fetch_array($recordsetoffer))
		{
			$offeramount=$rowoffer["offer_amt"];
			$offeramtype=$rowoffer["offer_type"];
		}
		
		if($offeramtype==1)
		{
			$discountamount=($productamount*$offeramount)/100;								 
			$productfinalamount=$productamount-$discountamount;
		}
		if($offeramtype==2)
		{
			$discountamount=$offeramount;								 
			$productfinalamount=$productamount-$discountamount;
		}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <?php
  if(mysql_num_rows($recordsetoffer)!=0)
  {
  ?>
  <tr>
    <td height="25" align="left" valign="middle" class="font_red"><strong>MRP : <del>Rs. <?php echo $productamount;?></del></strong></td>
  </tr>
  <tr>
     <td height="25" align="left" valign="middle" class="white12" ><strong><span class="white10">Final Price :</span> Rs.<?php printf("%.2f",$productfinalamount);?></strong></td>
  </tr>
  <?php
  }
  else
  {
  ?>
  <tr>
     <td height="25" align="left" valign="middle" class="white12" ><strong><span class="white10">Final Price :</span> Rs.<?php printf("%.2f",$productamount);?></strong></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td align="left" valign="middle" class="font9" >(Prices are inclusive of all taxes)</td>
  </tr>
</table>

<?php	
}
function calculate_shipping_charge($totalqty,$shippingcountry)
{
		$recordsetshippingamount = mysql_query("select * from shipping_charges where shipping_country='".$shippingcountry."'");
		while($rowshippingamount = mysql_fetch_array($recordsetshippingamount))
		{
			if($totalqty==1)
			{
				$totalshippingamount=$rowshippingamount["shipping_one_kg"];
			}
			if($totalqty==2)
			{
				$totalshippingamount=$rowshippingamount["shipping_two_kg"];
			}
			if($totalqty==3)
			{
				$totalshippingamount=$rowshippingamount["shipping_three_kg"];
			}
			if($totalqty==4)
			{
				$totalshippingamount=$rowshippingamount["shipping_four_kg"];
			}
			if($totalqty==5)
			{
				$totalshippingamount=$rowshippingamount["shipping_five_kg"];
			}
			if($totalqty==6)
			{
				$totalshippingamount=$rowshippingamount["shipping_six_kg"];
			}
			if($totalqty==7)
			{
				$totalshippingamount=$rowshippingamount["shipping_seven_kg"];
			}
			if($totalqty==8)
			{
				$totalshippingamount=$rowshippingamount["shipping_eight_kg"];
			}
			if($totalqty==9)
			{
				$totalshippingamount=$rowshippingamount["shipping_nine_kg"];
			}
			if($totalqty==10)
			{
				$totalshippingamount=$rowshippingamount["shipping_ten_kg"];
			}
		}
		return $totalshippingamount;
}
function display_username($loginid)
{
	$recordsetusername = mysql_query("select * from register_master where register_ID='".$loginid."'  ");
	while($rowusername = mysql_fetch_array($recordsetusername,MYSQL_ASSOC))
	{
		echo $rowusername["register_name"];
	}
}
function convert_amount_usd($billamountrs)
{
	require_once("currency_class.php");
	$c = new JOJO_Currency_yahoo();
	$list = $c->getCurrencies();
									
	$amount = $billamountrs; 
	$from = 'INR';
	$from_text = $list[$from];
	
	$to = 'USD';
	$to_text = $list[$to];
	$rate = $c->getRate($from,$to, true);
	$total = number_format(($rate*$amount),2);
	
	return $total;
}
?>