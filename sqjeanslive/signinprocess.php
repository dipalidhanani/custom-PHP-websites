<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

					$recordset = mysql_query("select * from register_master where register_user_email='".$_REQUEST["sqjeansemail"]."'  ",$cn);
		
					while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
					{
						$sqjeansloginuserid=$row["register_ID"];
						$password=$row["register_user_password"];							
					}
					$generatedpassword=base64_encode($_REQUEST["sqjeanspassword"]);					
						
					if(($password==$generatedpassword)&&($_REQUEST["sqjeansemail"]!="")&&($_REQUEST["sqjeanspassword"]))
					{
							
								$_SESSION['sqjeansloginuserid']=$sqjeansloginuserid;
								$_SESSION['sqjeansloginuseremail']=$_REQUEST["sqjeansemail"];	
								
if($_SESSION['sqjeanscart']!="")
{


$recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);

$totinmycart=mysql_num_rows($recordsetselected);
$totinselectedcart=count($_SESSION['sqjeanscart']);
$checktotalitemsincart=$totinmycart+$totinselectedcart;

if($checktotalitemsincart>=5)
{
	echo "<script type=\"text/javascript\">document.location.href='index.php?object=25'; </script>\n";
}

			function checkinvoicenumber($invoiceno)
			{
				$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$invoiceno."'");
			
				if(mysql_num_rows($recordsetbill)==0)
				{
					$now = date("Y-m-d H:i:s");
					$ip=$_SERVER['REMOTE_ADDR'];
					
					$recordsetregister = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."'");
				$catc=1;
                while($rowregister = mysql_fetch_array($recordsetregister))
                {
					$billingname=$rowregister["register_user_first_name"]." ".$rowregister["register_user_last_name"];
				}
					$billingemail=$_SESSION['sqjeansloginuseremail'];
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
					
					if($proobj["savemeasurement3"]<=38.00)
					{
						$extracost=0.00;
						$kg=1;
					}
					elseif(($proobj["savemeasurement3"]>38.00)&&($proobj["savemeasurement3"]<=44.00))
					{
						$extracost=4.00;
						$kg=2;
					}
					elseif(($proobj["savemeasurement3"]>44.00)&&($proobj["savemeasurement3"]<=50.00))
					{
						$extracost=8.00;
						$kg=2;
					}
					elseif($proobj["savemeasurement3"]>50.00)
					{
						$extracost=12.00;
						$kg=2;
					}
					
					
					$query="SELECT * FROM shipping_charges where shipping_country='".$shippingcountry."'";			
					$recordsetshipping = mysql_query($query);
					while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
					{
						if($kg==1)
						{
							$shippingamount=$rowshipping["shipping_one_kg"];
						}
						if($kg==2)
						{
							$shippingamount=$rowshipping["shipping_two_kg"];
						}
					}
					$totalextracost=$totalextracost+$extracost;
					$totalshippingamount=$totalshippingamount+$shippingamount;
					
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
			
			$finalbillamount=$totalamount+$totalextracost+$totalshippingamount;
			
			if($discountamttype==1)
			{
				$discountamount=($finalbillamount*$discountamt)/100;								 
				$finalbillamount=$finalbillamount-$discountamount;
			}
			if($offeramounttype==2)
			{
				$discountamount=$discountamt;								 
				$$finalbillamount=$finalbillamount-$discountamount;
			}
			
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



}				

$lasturl=$_REQUEST["lasturl"];

echo "<script type=\"text/javascript\">document.location.href=$lasturl; </script>\n";				
					echo "<script type=\"text/javascript\">javascript:window.history.go(-1);</script>\n";		
					 }
					 else
					 {
							header("Location:index.php?object=".$_REQUEST["object"]."&error=invalid");
								exit();	
					 }
?>

