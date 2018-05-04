<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");

$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];


if($_REQUEST["discountcode"]!="")
{
 $query="SELECT * FROM discount_master where discount_code='".$_REQUEST["discountcode"]."' and discount_code_upto >= '".$now."' and discount_code_active=0";
	
	$recordsetdiscount = mysql_query($query);
	if(mysql_num_rows($recordsetdiscount)!=0)
	{
		while($rowdiscount = mysql_fetch_array($recordsetdiscount,MYSQL_ASSOC))
		{	
			$discountamt=$rowdiscount["discount_amount"];
			$discountamttype=$rowdiscount["discount_amount_type"];
		}
	}
	else
	{
		 $_SESSION["invalid_firstname"]=$_REQUEST["firstname"];
		 $_SESSION["invalid_lastname"]=$_REQUEST["lastname"];
		 $_SESSION["invalid_address"]=$_REQUEST["address"];
		 $_SESSION["invalid_address2"]=$_REQUEST["address2"];
		 $_SESSION["invalid_city"]=$_REQUEST["city"];
		 $_SESSION["invalid_state"]=$_REQUEST["state"];
		 $_SESSION["invalid_pincode"]=$_REQUEST["pincode"];
		 $_SESSION["invalid_country"]=$_REQUEST["country"];
		 $_SESSION["invalid_email"]=$_REQUEST["email"];	
		 $_SESSION["invalid_phone"]=$_REQUEST["phone"];
		 $_SESSION["invalid_mobile"]=$_REQUEST["mobile"];
		
		header("Location:index.php?object=24&discountcode=invalid");
		exit();
	}
}



if($_SESSION['sqjeansloginuserid']=="")
{
		$recordset = mysql_query("select * from register_master where register_user_email='".$_REQUEST["youremail"]."'  ",$cn);
		
		if(mysql_num_rows($recordset)==1)
		{
			header("Location:error.html");
			exit();
		}
		
	$recordsetprofile = mysql_query("select * from register_master where register_user_email='".$_REQUEST["email"]."'  ",$cn);
	
	if(mysql_num_rows($recordsetprofile)==0)
	{
		$dob=$_REQUEST["day"]."-".$_REQUEST["month"]."-".$_REQUEST["year"];
		
		$query="insert into register_master 
		(
		 register_user_first_name,
		 register_user_last_name,
		 register_date_of_birth,
		 register_gender,
		 register_user_address,
		 register_user_address_2,
		 register_user_city,
		 register_user_state,
		 register_user_pincode,
		 register_user_country,
		 register_user_email,
		 register_user_password,
		 register_user_phone,
		 register_user_mobile,
		 registration_date_time,
		 registration_IP
		 )
		values
		(
		 '".$_REQUEST["firstname"]."',
		 '".$_REQUEST["lastname"]."',
		 '".$dob."',
		 '".$_REQUEST["gender"]."',
		 '".$_REQUEST["address"]."',
		 '".$_REQUEST["address2"]."',
		 '".$_REQUEST["city"]."',
		 '".$_REQUEST["state"]."',
		 '".$_REQUEST["pincode"]."',
		 '".$_REQUEST["country"]."',
		 '".$_REQUEST["email"]."',
		 '".base64_encode($_REQUEST["password"])."',	 
		 '".$_REQUEST["phone"]."',
		 '".$_REQUEST["mobile"]."',
		 '".$now."',
		 '".$ip."'
		 )	
		";
		mysql_query($query);
		
		$sqjeansloginuserid=mysql_insert_id();
		
		$_SESSION['sqjeansloginuserid']=$sqjeansloginuserid;
		$_SESSION['sqjeansloginuseremail']=$_REQUEST["email"];	
		
						function u_SendMail($FromMail,$ToMail,$Data,$Subject)
						{
							$headers = "MIME-Version: 1.0\n"; 
							$headers .= "Content-type: text/html; charset=iso-8859-1\n";
							
							$headers .= "From: $FromMail\n";
						
							if(strpos($_SERVER['SERVER_NAME'],".com"))
							{
								$myresult=mail($ToMail, $Subject , $Data, $headers);
							}					
						}	
						
						$FromMail="SQ Jeans <info@sqjeans.com>";
						$ToMail=$_REQUEST["email"];
											
						$Data= 'Cogratulations! '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].',<br /><br />
						
						You are now a registered member of SQ Jeans<br /><br />
                       						
						Your login details are given below.<br /><br />
						
						Email : '.$_REQUEST["email"].'<br />
						Password : '.$_REQUEST["password"].'<br /><br />						
						
						Regards,<br />
						SQ Jeans Team';
																			
						$Subject= "Registration @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						$FromMail=$_REQUEST["firstname"].' '.$_REQUEST["lastname"]. "<".$_REQUEST["email"].">";
						$ToMail="info@sqjeans.com";
											
						$Data= 'Dear Admin, <br /><br />
						
						New member registration on SQ Jeans<br /><br />
                       						
						Member details are below.<br /><br />
						
						Name : '.$_REQUEST["firstname"].' '.$_REQUEST["lastname"].'<br />
						Email : '.$_REQUEST["email"].'<br />
						Country : '.$_REQUEST["country"].'<br /><br />						
						
						Regards';
						
													
						$Subject= "New Registration @ SQ Jeans";						
							
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
	}
}

if(($_SESSION["sqjeansorderid"]!="")&&($_REQUEST["method"]==""))
{
	$recordsetbill = mysql_query("select * from bill_master
	where bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);								
	while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
	{
	$query="delete from bill_selected_records where bill_master_ID='".$rowbill["bill_master_ID"]."' ";
	mysql_query($query);
	}
	
	$query="delete from bill_master where bill_invoice_no='".$_SESSION['sqjeansorderid']."'";
	mysql_query($query);
	
	unset($_SESSION["sqjeansorderid"]);
}

if($_REQUEST["method"]=="cart")
{
	unset($_SESSION["sqjeanscart"]);
	unset($_SESSION["cartno"]);
	
	$recordsetselected = mysql_query("select * from bill_selected_records
	INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
	where 
	bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
	bill_payment_status!='Completed' and bill_payment_status!='Pending'
	",$cn);
	$catc=1;
	while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
	{
			if(!is_array($_SESSION['sqjeanscart'])) $_SESSION['sqjeanscart']=array();
			
			$proobj['selectedmaterialid']=$rowsetselected["bill_selected_material_treatment_relation_ID"];	
			$proobj['selectedspecialwash']=$rowsetselected['bill_selected_special_wash_ID'];
			$proobj['selectedthread_main']=$rowsetselected["bill_selected_main_thread"];
			$proobj['selectedthread_second']=$rowsetselected["bill_selected_second_thread"];
			$proobj['selectedprocketstyle']=$rowsetselected['bill_selected_pocket_style_ID'];
			$proobj['selectedprocketstyle_back']=$rowsetselected['bill_selected_back_pocket_style_ID'];
			$proobj['selectedflystyle']=$rowsetselected["bill_selected_fly_style_ID"];
			$proobj['selectedbuttonrivetsstyle']=$rowsetselected["bill_selected_buttonrivets_ID"];
			$proobj['selectedbeltstyle']=$rowsetselected["bill_selected_belt_style_ID"];
			$proobj['selectedloopsstyle']=$rowsetselected["bill_selected_loops_style_ID"];
			$proobj['selectedembroiderystyle']=$rowsetselected["bill_selected_embroidery_style_ID"];
			$proobj['jeansselectedtype']=$rowsetselected["bill_selected_jeans_type"];
			$proobj['jeansfittingstyle']=$rowsetselected["bill_selected_fittingstyle_type"];
			$proobj['jeansspecialnote']=$rowsetselected["bill_submitted_special_note"];
			$proobj['thisjeansisfor']=$rowsetselected["bill_submitted_jeans_for"];
			$proobj['jeansgender']=$rowsetselected["bill_submitted_jeans_gender"];
			
				
			$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
			
			$recordsetmeasurement = mysql_query($query);
				
			for($m=1;$m<=mysql_num_rows($recordsetmeasurement);$m++)
			{
				$proobj["savemeasurement".$m]=$rowsetselected["bill_submitted_measurement".$m];
			}
			
			
				$y="";
				
				if($_SESSION['cartno']==$y)
				{
					$count=1;	   		
					$_SESSION['cartno']=1;
				}
				else
				{
					$count=$_SESSION['cartno'];
					$count++;
					$_SESSION['cartno']=$count;
				}
		
				$_SESSION['sqjeanscart'][]=$proobj; 
	}
		$recordsetbill = mysql_query("select * from bill_master
		where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
		bill_payment_status!='Completed' and bill_payment_status!='Pending'",$cn);								
		while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))
		{
			$query="delete from bill_selected_records where bill_master_ID='".$rowbill["bill_master_ID"]."' ";
			mysql_query($query);
		}
		
		$query="delete from bill_master where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
		bill_payment_status!='Completed' and bill_payment_status!='Pending'";
		mysql_query($query);
}

function checkinvoicenumber($invoiceno)
{
	$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoiceno."'");

	if(mysql_num_rows($recordsetbill)==0)
	{
		$now = date("Y-m-d H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];

		$billingname=$_REQUEST["firstname"]." ".$_REQUEST["lastname"];
		$billingemail=$_REQUEST["email"];
		$query="insert into bill_master (bill_name_user,bill_email_id,bill_invoice_no,bill_datetime,bill_ip) values ('".$billingname."','".$billingemail."','".$invoiceno."','".$now."','".$ip."')";
		mysql_query($query);		
		$lastbillid=mysql_insert_id();
		return $lastbillid;
	}
	else
	{
		srand((double)microtime()*1000000);
		$invoiceno = rand(1000000000,9999999999);		
		checkinvoicenumber($invoiceno);
	}
	
	
}

srand((double)microtime()*1000000);
$invoiceno = rand(1000000000,9999999999);

$lastbillid=checkinvoicenumber($invoiceno);



$querybilling="insert into bill_billing_address 
(
 billing_user_first_name,
 billing_user_last_name,
 billing_user_address,
 billing_user_address_2,
 billing_user_city,
 billing_user_state,
 billing_user_pincode,
 billing_user_country,
 billing_user_email,
 billing_user_phone,
 billing_user_mobile,
 billing_bill_master_ID
 )
values
(
 	'".$_REQUEST["firstname"]."',
	 '".$_REQUEST["lastname"]."',
	 '".$_REQUEST["address"]."',
	 '".$_REQUEST["address2"]."',
	 '".$_REQUEST["city"]."',
	 '".$_REQUEST["state"]."',
	 '".$_REQUEST["pincode"]."',
	 '".$_REQUEST["country"]."',
	 '".$_REQUEST["email"]."',	 
	 '".$_REQUEST["phone"]."',
	 '".$_REQUEST["mobile"]."',
	 '".$lastbillid."'
 )
";
mysql_query($querybilling);

if($_REQUEST["shipping"]==0)
{
				$queryshipping="insert into bill_shipping_address 
				(
				 shipping_user_first_name,
				 shipping_user_last_name,
				 shipping_user_address,
				 shipping_user_address_2,
				 shipping_user_city,
				 shipping_user_state,
				 shipping_user_pincode,
				 shipping_user_country,
				 shipping_user_email,
				 shipping_user_phone,
				 shipping_user_mobile,
				 shipping_bill_master_ID
				 )
				values
				(
					'".$_REQUEST["firstname"]."',
					 '".$_REQUEST["lastname"]."',
					 '".$_REQUEST["address"]."',
					 '".$_REQUEST["address2"]."',
					 '".$_REQUEST["city"]."',
					 '".$_REQUEST["state"]."',
					 '".$_REQUEST["pincode"]."',
					 '".$_REQUEST["country"]."',
					 '".$_REQUEST["email"]."',	 
					 '".$_REQUEST["phone"]."',
					 '".$_REQUEST["mobile"]."',
					 '".$lastbillid."'
				 )
				";
				mysql_query($queryshipping);
				
				$shippingcountry=$_REQUEST["country"];
}
else
{
	$queryshipping="insert into bill_shipping_address 
				(
				 shipping_user_first_name,
				 shipping_user_last_name,
				 shipping_user_address,
				 shipping_user_address_2,
				 shipping_user_city,
				 shipping_user_state,
				 shipping_user_pincode,
				 shipping_user_country,
				 shipping_user_email,
				 shipping_user_phone,
				 shipping_user_mobile,
				 shipping_bill_master_ID
				 )
				values
				(
					'".$_REQUEST["shipping_firstname"]."',
					 '".$_REQUEST["shipping_lastname"]."',
					 '".$_REQUEST["shipping_address"]."',
					 '".$_REQUEST["shipping_address2"]."',
					 '".$_REQUEST["shipping_city"]."',
					 '".$_REQUEST["shipping_state"]."',
					 '".$_REQUEST["shipping_pincode"]."',
					 '".$_REQUEST["shipping_country"]."',
					 '".$_REQUEST["shipping_email"]."',	 
					 '".$_REQUEST["shipping_phone"]."',
					 '".$_REQUEST["shipping_mobilenumber"]."',
					 '".$lastbillid."'
				 )
				";
				mysql_query($queryshipping);
				
				$shippingcountry=$_REQUEST["shipping_country"];
	
}

$totalamount=0.00;


while(list($key,$proobj)=each($_SESSION['sqjeanscart']))
{

		$query="SELECT * FROM material_wash_treatment_relation
		INNER JOIN material_master ON material_master.material_ID=material_wash_treatment_relation.material_master_ID
		INNER JOIN wash_treatment_master ON 
		wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID
		where material_wash_treatment_relation.mw_realtion_ID='".$proobj['selectedmaterialid']."'
		order by wash_treatment_master.wash_treatment_ID";			
		$recordsetwash_treatment = mysql_query($query);				
		if(mysql_num_rows($recordsetwash_treatment)!=0)
		{
			while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))
			{
					$materialamount=$rowwash_treatment["wash_treatment_price"];
					$totalamount=$totalamount+$materialamount;
			}
		}
		
		
		$query="SELECT * FROM special_wash_master where special_wash_ID='".$proobj['selectedspecialwash']."' and special_wash_available=1";			
		$recordsetspecial_wash = mysql_query($query);
		if(mysql_num_rows($recordsetspecial_wash)!=0)
		{	
			while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))
			{
					$washamount=$rowspecial_wash["special_wash_additional_charge"];
					$totalamount=$totalamount+$washamount;
			}
		}
		
		$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$proobj['selectedprocketstyle']."' ";			
		$recordsetpocket_style = mysql_query($query);
		if(mysql_num_rows($recordsetpocket_style)!=0)
		{	
				  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))
				  {
							$pocketamount=$rowpocket_style["pocket_style_additional_charge"];
							$totalamount=$totalamount+$pocketamount;
				  }
		}
		
		$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$proobj['selectedprocketstyle_back']."' ";			
		$recordsetpocket_style = mysql_query($query);
		if(mysql_num_rows($recordsetpocket_style)!=0)
		{	
				  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))
				  {
							$pocketamount_back=$rowpocket_style["pocket_style_additional_charge"];
							$totalamount=$totalamount+$pocketamount_back;
				  }
		}
				  
		$query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_ID='".$proobj["selectedflystyle"]."'";			
		$recordsetfly_style = mysql_query($query);
		if(mysql_num_rows($recordsetfly_style)!=0)
		{	
				  while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))
				  {
							$zipamount=$rowfly_style["fly_style_additional_charge"];
							$totalamount=$totalamount+$zipamount;
				  }
		}
		$query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$proobj["selectedbuttonrivetsstyle"]."'";			
		$recordsetbuttonrivets = mysql_query($query);
		if(mysql_num_rows($recordsetbuttonrivets)!=0)
		{	
				  while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))
				  {
							$buttonrivetsamount=$rowbuttonrivets["buttonrivets_additional_charge"];
							$totalamount=$totalamount+$buttonrivetsamount;
				  }
		}
		$query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_ID='".$proobj["selectedbeltstyle"]."'";			
		$recordsetbelt_style = mysql_query($query);
		if(mysql_num_rows($recordsetbelt_style)!=0)
		{	
				  while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))
				  {
							$beltamount=$rowbelt_style["belt_style_additional_charge"];
							$totalamount=$totalamount+$beltamount;
				  }
		}
		
		$query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_ID='".$proobj["selectedloopsstyle"]."'";			
		$recordsetloops_style = mysql_query($query);
		if(mysql_num_rows($recordsetloops_style)!=0)
		{	
				  while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))
				  {
							$loopsamount=$rowloops_style["loops_style_additional_charge"];
							$totalamount=$totalamount+$loopsamount;
				  }
		}
		
		$query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_ID='".$proobj["selectedembroiderystyle"]."'";			
		$recordsetembroidery_style = mysql_query($query);
		if(mysql_num_rows($recordsetembroidery_style)!=0)
		{	
				  while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))
				  {
							$embroideryamount=$rowembroidery_style["embroidery_style_additional_charge"];
							$totalamount=$totalamount+$embroideryamount;
				  }
		}
		
		if($proobj["savemeasurement3"]<=38.00)
		{
			$extracost=0.00;
			$kg=1;
			
			$totalkg=$totalkg+$kg;
			
			$totalextracost=$totalextracost+$extracost;
		}
		elseif(($proobj["savemeasurement3"]>38.00)&&($proobj["savemeasurement3"]<=44.00))
		{
			$extracost=4.00;
			$kg=1;
			$totalkg=$totalkg+$kg;
			
			$totalextracost=$totalextracost+$extracost;
		}
		elseif(($proobj["savemeasurement3"]>44.00)&&($proobj["savemeasurement3"]<=50.00))
		{
			$extracost=8.00;
			$kg=2;
			$totalkg=$totalkg+$kg;
			$totalextracost=$totalextracost+$extracost;
		}
		elseif($proobj["savemeasurement3"]>50.00)
		{
			$extracost=12.00;
			$kg=2;
			$totalkg=$totalkg+$kg;
			
			$totalextracost=$totalextracost+$extracost;
		}
		
		
		
		
		
		$shippingamount=0;
		
		
		$queryselected="insert into bill_selected_records
		(
		bill_master_ID,
		bill_selected_material_treatment_relation_ID,
		bill_selected_material_amount,
		bill_selected_special_wash_ID,
		bill_selected_special_wash_amount,
		bill_selected_main_thread,
		bill_selected_second_thread,
		bill_selected_pocket_style_ID,
		bill_selected_pocket_style_amount,
		bill_selected_back_pocket_style_ID,
		bill_selected_back_pocket_style_amount,
		bill_selected_fly_style_ID,
		bill_selected_fly_style_amount,
		bill_selected_buttonrivets_ID,
		bill_selected_buttonrivets_amount,
		bill_selected_belt_style_ID,
		bill_selected_belt_style_amount,
		bill_selected_loops_style_ID,
		bill_selected_loops_style_amount,
		bill_selected_embroidery_style_ID,
		bill_selected_embroidery_style_amount,
		bill_selected_jeans_type,
		bill_selected_fittingstyle_type,
		bill_submitted_measurement1,
		bill_submitted_measurement2,
		bill_submitted_measurement3,
		bill_submitted_measurement4,
		bill_submitted_measurement5,
		bill_submitted_measurement6,
		bill_submitted_measurement7,
		bill_submitted_measurement8,
		bill_submitted_measurement9,
		bill_submitted_measurement10,
		bill_submitted_measurement11,
		bill_submitted_special_note,
		bill_submitted_jeans_for,
		bill_submitted_jeans_gender,
		bill_submitted_extra_charge,
		bill_submitted_shipping_charge
		)
		values
		(
		'".$lastbillid."',
		'".$proobj['selectedmaterialid']."',
		'".$materialamount."',
		'".$proobj['selectedspecialwash']."',
		'".$washamount."',
		'".$proobj["selectedthread_main"]."',
		'".$proobj["selectedthread_second"]."',
		'".$proobj['selectedprocketstyle']."',
		'".$pocketamount."',
		'".$proobj['selectedprocketstyle_back']."',
		'".$pocketamount_back."',
		'".$proobj["selectedflystyle"]."',
		'".$zipamount."',
		'".$proobj["selectedbuttonrivetsstyle"]."',
		'".$buttonrivetsamount."',
		'".$proobj["selectedbeltstyle"]."',
		'".$beltamount."',
		'".$proobj["selectedloopsstyle"]."',
		'".$loopsamount."',
		'".$proobj["selectedembroiderystyle"]."',
		'".$embroideryamount."',
		'".$proobj["jeansselectedtype"]."',
		'".$proobj["jeansfittingstyle"]."',
		'".$proobj["savemeasurement1"]."',
		'".$proobj["savemeasurement2"]."',
		'".$proobj["savemeasurement3"]."',
		'".$proobj["savemeasurement4"]."',
		'".$proobj["savemeasurement5"]."',
		'".$proobj["savemeasurement6"]."',
		'".$proobj["savemeasurement7"]."',
		'".$proobj["savemeasurement8"]."',
		'".$proobj["savemeasurement9"]."',
		'".$proobj["savemeasurement10"]."',
		'".$proobj["savemeasurement11"]."',
		'".$proobj["jeansspecialnote"]."',
		'".$proobj["thisjeansisfor"]."',
		'".$proobj["jeansgender"]."',
		'".$extracost."',
		'".$shippingamount."'
		)
		";
		mysql_query($queryselected);
}


		$query="SELECT * FROM shipping_charges where shipping_country='".$shippingcountry."'";			
		$recordsetshipping = mysql_query($query);
		while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
		{
			if($totalkg==1)
			{
				$totalshippingamount=$rowshipping["shipping_one_kg"];
			}
			if($totalkg==2)
			{
				$totalshippingamount=$rowshipping["shipping_two_kg"];
			}
			if($totalkg==3)
			{
				$totalshippingamount=$rowshipping["shipping_three_kg"];
			}
			if($totalkg==4)
			{
				$totalshippingamount=$rowshipping["shipping_four_kg"];
			}
			if($totalkg==5)
			{
				$totalshippingamount=$rowshipping["shipping_five_kg"];
			}
			if($totalkg==6)
			{
				$totalshippingamount=$rowshipping["shipping_six_kg"];
			}
			if($totalkg==7)
			{
				$totalshippingamount=$rowshipping["shipping_seven_kg"];
			}
			if($totalkg==8)
			{
				$totalshippingamount=$rowshipping["shipping_eight_kg"];
			}
			if($totalkg==9)
			{
				$totalshippingamount=$rowshipping["shipping_nine_kg"];
			}
			if($totalkg==10)
			{
				$totalshippingamount=$rowshipping["shipping_ten_kg"];
			}
		}

$finalbillamount=$totalamount+$totalextracost;

if($discountamttype==1)
{
	$discountamount=($finalbillamount*$discountamt)/100;								 
	$finalbillamount=$finalbillamount-$discountamount;
}
if($discountamttype==2)
{
	$discountamount=$discountamt;								 
	$finalbillamount=$finalbillamount-$discountamount;
}


$finalbillamount=$finalbillamount+$totalshippingamount;

if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))
{
	$selectedcurrency="USD";
}
if($_SESSION["currentselectedcurrency"]=="INR")
{
	$selectedcurrency="INR";
}
if($_SESSION["currentselectedcurrency"]=="EUR")
{
	$selectedcurrency="EUR";
}	

$queryupdatebill="update bill_master set bill_total_amount='".$totalamount."',bill_extra_amount='".$totalextracost."',bill_total_discount='".$discountamount."',bill_used_discount_code='".$_REQUEST["discountcode"]."',bill_total_shipping='".$totalshippingamount."',bill_final_amount='".$finalbillamount."',bill_selected_currency='".$selectedcurrency."' where bill_master_ID='".$lastbillid."'";
mysql_query($queryupdatebill);

$_SESSION["sqjeansorderid"]=$invoiceno;					


header("Location:payment.html");
exit();
?>