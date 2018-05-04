<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<?php
$now = date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

if($_REQUEST["action"]=="savemeasurement")
{
	
	/*
	$_SESSION["jeansselectedtype"]=$_REQUEST["selectedjeanstype"];
	$_SESSION["jeansfittingstyle"]=$_REQUEST["jeansfittingtype"];
	$_SESSION["jeansspecialnote"]=$_REQUEST["jeansspecialnote"];
	$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
	$recordsetmeasurement = mysql_query($query);
		
	for($m=1;$m<=mysql_num_rows($recordsetmeasurement);$m++)
	{
		$_SESSION["savemeasurement".$m]=$_REQUEST["measurement".$m];
	}	
	*/
	
	
	if(!is_array($_SESSION['sqjeanscart'])) $_SESSION['sqjeanscart']=array();

	$proobj['selectedmaterialid']=$_SESSION['selectedmaterialid'];	
	$proobj['selectedspecialwash']=$_SESSION['selectedspecialwash'];
	$proobj['selectedthread_main']=$_SESSION['selectedthread_main'];
	$proobj['selectedthread_second']=$_SESSION['selectedthread_second'];
	$proobj['selectedprocketstyle']=$_SESSION['selectedprocketstyle'];
	$proobj['selectedprocketstyle_back']=$_SESSION['selectedprocketstyle_back'];
	$proobj['selectedflystyle']=$_SESSION['selectedflystyle'];	
	$proobj['selectedbuttonrivetsstyle']=$_SESSION['selectedbuttonrivetsstyle'];	
	$proobj['selectedbeltstyle']=$_SESSION['selectedbeltstyle'];	
	$proobj['selectedloopsstyle']=$_SESSION['selectedloopsstyle'];	
	$proobj['selectedembroiderystyle']=$_SESSION['selectedembroiderystyle'];	
	$proobj['jeansselectedtype']=$_REQUEST['selectedjeanstype'];
	$proobj['jeansfittingstyle']=$_REQUEST['jeansfittingtype'];
	$proobj['jeansspecialnote']=$_REQUEST['jeansspecialnote'];
	$proobj['thisjeansisfor']=$_REQUEST['thisjeansisfor'];
	$proobj['jeansgender']=$_REQUEST['jeansgender'];
	
	
	
	if($_REQUEST['jeansspecialnote']!="Special Note")
	{
		$proobj['jeansspecialnote']=$_REQUEST['jeansspecialnote'];
	}
	else
	{
		$proobj['jeansspecialnote']="";
	}
	
	$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
	
	$recordsetmeasurement = mysql_query($query);
		
	for($m=1;$m<=mysql_num_rows($recordsetmeasurement);$m++)
	{
		$proobj["savemeasurement".$m]=$_REQUEST["measurement".$m];
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

if($_SESSION['sqjeansloginuseremail']!="")
{
	

	unset($_SESSION["sqjeansorderid"]);		
	$recordsetselected = mysql_query("select * from bill_selected_records
	INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
	where 
	bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
	bill_payment_status!='Completed' and
	bill_payment_status!='Pending'
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
			
		$recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);
$catc=1;
while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
{
			$query="delete from bill_selected_records where bill_master_ID='".$rowsetselected["bill_master_ID"]."' ";
			mysql_query($query);
}
$query="delete from bill_master where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'";
mysql_query($query);	
			
			
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
			
			/////////////////////////			
			
			
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
	
	header("Location:index.php?object=2&step=4");
	exit();	 
}
if($_REQUEST["action"]=="change")
{


		$selected=$_REQUEST["selection"];

		$r=0;
		
		
		while(list($key,$proobj)=each($_SESSION['sqjeanscart']))
		{
			if($selected==$r)
			{
					$selectedmaterialforthisjeans=$proobj['selectedmaterialid'];
					$selectedspecialwashforthisjeans=$proobj['selectedspecialwash'];
					$selectedthreadmainforthisjeans=$proobj['selectedthread_main'];
					$selectedthreadsecondforthisjeans=$proobj['selectedthread_second'];
					$selectedpocketstyleforthisjeans=$proobj['selectedprocketstyle'];
					$selectedpocketstylebackforthisjeans=$proobj['selectedprocketstyle_back'];
					$selectedflystyleforthisjeans=$proobj['selectedflystyle'];
					$selectedbuttonrivetsstyleforthisjeans=$proobj['selectedbuttonrivetsstyle'];
					$selectedbeltstyleforthisjeans=$proobj['selectedbeltstyle'];
					$selectedloopsstyleforthisjeans=$proobj['selectedloopsstyle'];
					$selectedembroiderystyleforthisjeans=$proobj['selectedembroiderystyle'];
					$selectedjeanstypeforthisjeans=$proobj['jeansselectedtype'];
					$selectedfittingforthisjeans=$proobj['jeansfittingstyle'];
					$selectedspecialnoteforthisjeans=$proobj['jeansspecialnote'];
					
					$selectedthisjeansisfor=$proobj['thisjeansisfor'];
					$selectedjeansgender=$proobj['jeansgender'];
					
							
									 $p=0;
									 $k=1;
									 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
									 $recordsetmeasurement = mysql_query($query);
									 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
									 {
										$mv="selectedmeasurementforthisjeans".$k;
										$selectedmeasurementforthisjeans[$p]=$proobj["savemeasurement".$k];
										
													
										$k++;
										$p++;
									 }
									 
					
			}
			$r++;	
		}
		
		unset($_SESSION['sqjeanscart'][$selected]);	
						
				if($_REQUEST['selectedmatirial']!="")
				{
					$proobj['selectedmaterialid']=$_REQUEST['selectedmatirial'];
				}
				else
				{
					$proobj['selectedmaterialid']=$selectedmaterialforthisjeans;
				}
				
				if($_REQUEST['selectedspecialwash']!="")
				{
					$proobj['selectedspecialwash']=$_REQUEST['selectedspecialwash'];
				}
				else
				{
					$proobj['selectedspecialwash']=$selectedspecialwashforthisjeans;
				}
				
				if($_REQUEST['selectedthread_main']!="")
				{
					$proobj['selectedthread_main']=$_REQUEST['selectedthread_main'];
				}
				else
				{
					$proobj['selectedthread_main']=$selectedthreadmainforthisjeans;
				}
				
				if($_REQUEST['selectedthread_second']!="")
				{
					$proobj['selectedthread_second']=$_REQUEST['selectedthread_second'];
				}
				else
				{
					$proobj['selectedthread_second']=$selectedthreadsecondforthisjeans;
				}
				
				if($_REQUEST['selectedprocketstyle']!="")
				{
					$proobj['selectedprocketstyle']=$_REQUEST['selectedprocketstyle'];
				}
				else
				{
					$proobj['selectedprocketstyle']=$selectedpocketstyleforthisjeans;
				}
				
				if($_REQUEST['selectedprocketstyle_back']!="")
				{
					$proobj['selectedprocketstyle_back']=$_REQUEST['selectedprocketstyle_back'];
				}
				else
				{
					$proobj['selectedprocketstyle_back']=$selectedpocketstylebackforthisjeans;
				}
				
				if($_REQUEST['selectedflystyle']!="")
				{
					$proobj['selectedflystyle']=$_REQUEST['selectedflystyle'];
				}	
				else
				{
					$proobj['selectedflystyle']=$selectedflystyleforthisjeans;
				}	
				
				if($_REQUEST['selectedbuttonrivetsstyle']!="")
				{
					$proobj['selectedbuttonrivetsstyle']=$_REQUEST['selectedbuttonrivetsstyle'];
				}	
				else
				{
					$proobj['selectedbuttonrivetsstyle']=$selectedbuttonrivetsstyleforthisjeans;
				}	
				
				if($_REQUEST['selectedbeltstyle']!="")
				{
					$proobj['selectedbeltstyle']=$_REQUEST['selectedbeltstyle'];
				}	
				else
				{
					$proobj['selectedbeltstyle']=$selectedbeltstyleforthisjeans;
				}	
				
				if($_REQUEST['selectedloopsstyle']!="")
				{
					$proobj['selectedloopsstyle']=$_REQUEST['selectedloopsstyle'];
				}	
				else
				{
					$proobj['selectedloopsstyle']=$selectedloopsstyleforthisjeans;
				}	
				
				if($_REQUEST['selectedembroiderystyle']!="")
				{
					$proobj['selectedembroiderystyle']=$_REQUEST['selectedembroiderystyle'];
				}	
				else
				{
					$proobj['selectedembroiderystyle']=$selectedembroiderystyleforthisjeans;
				}	
				
					$k=1;
					$p=0;
					
					$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
					$recordsetmeasurement = mysql_query($query);
					while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
					{
					 
						 if($_REQUEST["measurement".$k]!="")
						 {
							 $proobj["savemeasurement".$k]=$_REQUEST["measurement".$k];
						 }
						 else
						 {
							$proobj["savemeasurement".$k]=$selectedmeasurementforthisjeans[$p];
						 }					
					
					 $k++;
					 $p++;
					}
				
				if($_REQUEST['selectedjeanstype']!="")
				{
					$proobj['jeansselectedtype']=$_REQUEST['selectedjeanstype'];
				}	
				else
				{
					$proobj['jeansselectedtype']=$selectedjeanstypeforthisjeans;
				}
				
				if($_REQUEST['jeansfittingtype']!="")
				{
					$proobj['jeansfittingstyle']=$_REQUEST['jeansfittingtype'];
				}	
				else
				{
					$proobj['jeansfittingstyle']=$selectedfittingforthisjeans;
				}
				
				if($_REQUEST['jeansspecialnote']!="")
				{
					$proobj['jeansspecialnote']=$_REQUEST['jeansspecialnote'];
				}	
				else
				{
					$proobj['jeansspecialnote']=$selectedspecialnoteforthisjeans;
				}
						
				if($_REQUEST['thisjeansisfor']!="")
				{
					$proobj['thisjeansisfor']=$_REQUEST['thisjeansisfor'];
				}	
				else
				{
					$proobj['thisjeansisfor']=$selectedthisjeansisfor;
				}
				
				if($_REQUEST['jeansgender']!="")
				{
					$proobj['jeansgender']=$_REQUEST['jeansgender'];
				}	
				else
				{
					$proobj['jeansgender']=$selectedjeansgender;
				}				
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
						}
					}
				
	$_SESSION['sqjeanscart'][$selected]=$proobj;
	
	
	
	if($_REQUEST["selection_action"]=="material")
			{
			 $query="update bill_selected_records 
			set 
			bill_selected_material_treatment_relation_ID='".$proobj['selectedmaterialid']."',
			bill_selected_material_amount='".$materialamount."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
		
			mysql_query($query);
				
				}
				if($_REQUEST["selection_action"]=="specialwash")
			{
				
				$query="update bill_selected_records 
			set 			
			bill_selected_special_wash_ID='".$selectedspecialwashforthisjeans."',
			bill_selected_special_wash_amount='".$washamount."',
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			
			}
			if($_REQUEST["selection_action"]=="thread")
			{
				$query="update bill_selected_records 
			set 		
			bill_selected_main_thread='".$selectedthreadmainforthisjeans."',
			bill_selected_second_thread='".$selectedthreadsecondforthisjeans."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			if($_REQUEST["selection_action"]=="pocketstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_pocket_style_ID='".$selectedpocketstyleforthisjeans."',
			bill_selected_pocket_style_amount='".$pocketamount."',
			bill_selected_back_pocket_style_ID='".$selectedpocketstylebackforthisjeans."',
			bill_selected_back_pocket_style_amount='".$pocketamount_back."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="flystyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_fly_style_ID='".$selectedflystyleforthisjeans."',		
			bill_selected_fly_style_amount='".$flyamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}
			
			if($_REQUEST["selection_action"]=="buttonrivetsstyle")
			{
			$query="update bill_selected_records 
			set 			
			bill_selected_buttonrivets_ID='".$selectedbuttonrivetsstyleforthisjeans."',		
			bill_selected_buttonrivets_amount='".$buttonrivetsamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}
			
			if($_REQUEST["selection_action"]=="beltstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_belt_style_ID='".$selectedbeltstyleforthisjeans."',		
			bill_selected_belt_style_amount='".$beltamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="loopsstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_loops_style_ID='".$selectedloopsstyleforthisjeans."',		
			bill_selected_loops_style_amount='".$loopsamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="embroiderystyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_embroidery_style_ID='".$selectedembroiderystyleforthisjeans."',		
			bill_selected_embroidery_style_amount='".$embroideryamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="measurement")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_jeans_type='".$selectedjeanstypeforthisjeans."',
			bill_selected_fittingstyle_type='".$selectedfittingforthisjeans."',
			bill_submitted_measurement1='".$selectedmeasurementforthisjeans[0]."',
			bill_submitted_measurement2='".$selectedmeasurementforthisjeans[1]."',
			bill_submitted_measurement3='".$selectedmeasurementforthisjeans[2]."',
			bill_submitted_measurement4='".$selectedmeasurementforthisjeans[3]."',
			bill_submitted_measurement5='".$selectedmeasurementforthisjeans[4]."',
			bill_submitted_measurement6='".$selectedmeasurementforthisjeans[5]."',
			bill_submitted_measurement7='".$selectedmeasurementforthisjeans[6]."',
			bill_submitted_measurement8='".$selectedmeasurementforthisjeans[7]."',
			bill_submitted_measurement9='".$selectedmeasurementforthisjeans[8]."',
			bill_submitted_measurement10='".$selectedmeasurementforthisjeans[9]."',
			bill_submitted_measurement11='".$selectedmeasurementforthisjeans[10]."',
			bill_submitted_special_note='".$selectedspecialnoteforthisjeans."',
			bill_submitted_jeans_for='".$selectedthisjeansisfor."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}

		
	header("Location:index.php?object=2&step=4");
	exit();	 
}
if($_REQUEST["action"]=="updateprofile")
{
	$query="update register_master set
	 register_user_first_name='".$_REQUEST["firstname"]."',
	 register_user_last_name='".$_REQUEST["lastname"]."',
	 register_user_address='".$_REQUEST["address"]."',
	 register_user_address_2='".$_REQUEST["address2"]."',
	 register_user_city='".$_REQUEST["city"]."',
	 register_user_state='".$_REQUEST["state"]."',
	 register_user_pincode='".$_REQUEST["pincode"]."',
	 register_user_country='".$_REQUEST["country"]."',
	 register_user_phone='".$_REQUEST["phone"]."',
	 register_user_mobile='".$_REQUEST["mobile"]."'
	 where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."'
	 ";

	mysql_query($query);
	
	header("Location:mydetails.html");
	exit();
}
if($_REQUEST["action"]=="changepassword")
{
	$recordsetmypassword = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."' and register_user_password='".base64_encode($_REQUEST["oldpassword"])."' ",$cn);
	
	if(mysql_num_rows($recordsetmypassword)==0)
	{
		header("Location:index.php?object=16&msg=no");
		exit();
	}
	else
	{
		$update="update register_master set register_user_password='".base64_encode($_REQUEST["newpassword"])."' where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."' and register_user_password='".base64_encode($_REQUEST["oldpassword"])."'";
		mysql_query($update);
	}
	
	header("Location:index.php?object=16&msg=yes");
	exit();
}
if($_REQUEST["action"]=="contactus")
{
		function u_SendMail($FromMail,$ToMail,$Data,$Subject)
		{
			
			$headers = "MIME-Version: 1.0\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		
			$headers .= "From: $FromMail\n";
		
			if(strpos($_SERVER['SERVER_NAME'],".com"))
			{
				$myresult=mail($ToMail, $Subject , $Data, $headers);
			 }
			else
			{
				
			}
		}
		
		
		$FromMail="SQ Jeans <info@sqjeans.com>";
		$ToMail=$_REQUEST["email"];
		
		$Subject="Your inquiry to SQ Jeans";
		
		
		ob_start();
		require('contactus_client.php');
		$Data = ob_get_contents();
		ob_end_clean(); 
		
		u_SendMail($FromMail,$ToMail,$Data,$Subject);
		
		
		/////////////////////////////////////////////////////
		
		function u_SendMail1($FromMail,$ToMail,$Data,$Subject)
		{
			
			$headers = "MIME-Version: 1.0\n"; 
			$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		
			$headers .= "From: $FromMail\n";
		
			if(strpos($_SERVER['SERVER_NAME'],".com"))
			{
				$myresult=mail($ToMail, $Subject , $Data, $headers);
			 }
			else
			{
				
			}
		
		}
		
		
		$FromMail=$_REQUEST["name"]." <".$_REQUEST["email"].">";
		$ToMail="SQ Jeans <info@sqjeans.com>";
		
		$Subject="You have a new inquiry on SQ Jeans";
		
		
		ob_start();
		require('contactus_admin.php');
		$Data = ob_get_contents();
		ob_end_clean(); 
		
		u_SendMail1($FromMail,$ToMail,$Data,$Subject);
		
		$query="insert into contactus_request 
		(
		request_by_name,
		request_by_email,
		request_by_phone,
		request_by_mobile,
		request_by_address,
		request_by_query,
		request_on_datetime,
		request_from_ip
		)
		values
		(
		'".$_REQUEST["name"]."',
		'".$_REQUEST["email"]."',
		'".$_REQUEST["phone"]."',
		'".$_REQUEST["mobile"]."',
		'".$_REQUEST["address"]."',
		'".$_REQUEST["query"]."',
		'".$now."',
		'".$ip."'
		)
		";
		mysql_query($query);
		
		header("Location:index.php?object=4&msg=yes");
		exit();
}
if($_REQUEST["action"]=="register")
{

$recordsetprofile = mysql_query("select * from register_master where register_user_email='".$_REQUEST["email"]."'  ",$cn);


		if(mysql_num_rows($recordsetprofile)==1)
		{
			header("Location:index.php?object=21&error=email");
			exit();
		}
		else
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
								SQ Jeans';
								
															
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
		
				header("Location:index.php?object=21&msg=register");
				exit();
		}
}
if($_REQUEST["action"]=="forgotpassword")
{
						
		$recordset = mysql_query("select * from register_master where register_user_email='".$_REQUEST["youremail"]."'  ",$cn);
		
		if(mysql_num_rows($recordset)==0)
		{
			header("Location:index.php?object=22&error=yes");
			exit();
		}
		else
		{
		
						while($row = mysql_fetch_array($recordset,MYSQL_ASSOC))
						{
							$sqjeansname=$row["register_user_first_name"]." ".$row["register_user_last_name"];
							$sqjeansemail=$row["register_user_email"];
							$sqjeanspassword=$row["register_user_password"];							
						}
						
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
						$ToMail=$_REQUEST["youremail"];
											
						$Data= 'Dear '.$sqjeansname.',<br /><br />
												 
                        Following is the requested information from sqjeans.com:<br /><br />
						
						Your Email ID is : '.$sqjeansemail.'<br />
						Your password is : '.base64_decode($sqjeanspassword).' <br /><br />
						
						<a href="http://www.sqjeans.com">Click here</a> to login to your account.<br /><br />							
						
						Best wishes,<br />
						SQ Jeans';
						
													
						$Subject="Password Recovery from SQ Jeans";
											
						
						u_SendMail($FromMail,$ToMail,$Data,$Subject);
						
						
						header("Location:index.php?object=22&value=sent");
						exit();		
			}
}
if($_REQUEST["action"]=="continueshopping")
{

	if($_SESSION['sqjeansloginuseremail']!="")
    {
			unset($_SESSION['sqjeanscart']);
			unset($_SESSION['cartno']);
	}
			unset($_SESSION['selectedmaterialid']);
			unset($_SESSION['selectedspecialwash']);
			unset($_SESSION['selectedthread_main']);
			unset($_SESSION['selectedthread_second']);
			unset($_SESSION['selectedprocketstyle']);
			unset($_SESSION['selectedprocketstyle_back']);
			unset($_SESSION['selectedflystyle']);
			unset($_SESSION['selectedbuttonrivetsstyle']);
			unset($_SESSION['selectedbeltstyle']);
			unset($_SESSION['selectedloopsstyle']);
			unset($_SESSION['selectedembroiderystyle']);
	
	header("Location:customjeans.html");
	exit();	 
}
if($_REQUEST["action"]=="removefromcart")
{
	$selection=$_REQUEST["selection"];
	unset($_SESSION['sqjeanscart'][$selection]);
	
	$count=$_SESSION['cartno'];
	$count=$count-1;
	$_SESSION['cartno']=$count;
	
	header("Location:index.php?object=2&step=4");
	exit();	
}
if($_REQUEST["action"]=="removefrommycart")
{
	
	$recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and 
bill_selected_records.bill_selected_ID='".$_REQUEST["cartid"]."' and 
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);
$catc=1;
while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
{
	$query="delete from bill_selected_records where bill_selected_ID='".$_REQUEST["cartid"]."'";
	mysql_query($query);
}
header("Location:mycart.html");
exit();			
		
}
if($_REQUEST["action"]=="changemycart")
{
		$selected=$_REQUEST["selection"];
		$r=0;		
		
		$recordsetselected = mysql_query("select * from bill_selected_records
        INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
        where 
        bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and 
        bill_selected_records.bill_selected_ID='".$_REQUEST["selection"]."' and 
        bill_payment_status!='Completed' and
        bill_payment_status!='Pending'
        ",$cn);
        
		$catc=1;
		
		$validcartitem=0;
		
        while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
        {
					$selectedmaterialforthisjeans=$rowsetselected['bill_selected_material_treatment_relation_ID'];
					$selectedspecialwashforthisjeans=$rowsetselected['bill_selected_special_wash_ID'];
					$selectedthreadmainforthisjeans=$rowsetselected['bill_selected_main_thread'];
					$selectedthreadsecondforthisjeans=$rowsetselected['bill_selected_second_thread'];
					$selectedpocketstyleforthisjeans=$rowsetselected['bill_selected_pocket_style_ID'];
					$selectedpocketstylebackforthisjeans=$rowsetselected['bill_selected_back_pocket_style_ID'];
					$selectedflystyleforthisjeans=$rowsetselected['bill_selected_fly_style_ID'];
					$selectedbuttonrivetsstyleforthisjeans=$rowsetselected['bill_selected_buttonrivets_ID'];
					$selectedbeltstyleforthisjeans=$rowsetselected['bill_selected_belt_style_ID'];
					$selectedloopsstyleforthisjeans=$rowsetselected['bill_selected_loops_style_ID'];
					$selectedembroiderystyleforthisjeans=$rowsetselected['bill_selected_embroidery_style_ID'];
					$selectedjeanstypeforthisjeans=$rowsetselected['bill_selected_jeans_type'];
					$selectedfittingforthisjeans=$rowsetselected['bill_selected_fittingstyle_type'];
					$selectedspecialnoteforthisjeans=$rowsetselected['bill_submitted_special_note'];
					
					$selectedthisjeansisfor=$rowsetselected['bill_submitted_jeans_for'];
					$selectedjeansgender=$rowsetselected['bill_submitted_jeans_gender'];
					
					$p=0;
					$k=1;
						 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
						 $recordsetmeasurement = mysql_query($query);
						 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
						 {
								$mv="selectedmeasurementforthisjeans".$k;
								$selectedmeasurementforthisjeans[$p]=$rowsetselected["savemeasurement".$k];										
													
								$k++;
								$p++;
						 }
			$r++;	
			
			$validcartitem=1;
		}
		
						
				if($_REQUEST['selectedmatirial']!="")
				{
					$selectedmaterialforthisjeans=$_REQUEST['selectedmatirial'];
				}				
				
				if($_REQUEST['selectedspecialwash']!="")
				{
					$selectedspecialwashforthisjeans=$_REQUEST['selectedspecialwash'];
				}				
				
				if($_REQUEST['selectedthread_main']!="")
				{
					$selectedthreadmainforthisjeans=$_REQUEST['selectedthread_main'];
				}				
				
				if($_REQUEST['selectedthread_second']!="")
				{
					$selectedthreadsecondforthisjeans=$_REQUEST['selectedthread_second'];
				}
				
				
				if($_REQUEST['selectedprocketstyle']!="")
				{
					$selectedpocketstyleforthisjeans=$_REQUEST['selectedprocketstyle'];
				}
				
				if($_REQUEST['selectedprocketstyle_back']!="")
				{
					$selectedpocketstylebackforthisjeans=$_REQUEST['selectedprocketstyle_back'];
				}
				
				if($_REQUEST['selectedflystyle']!="")
				{
					$selectedflystyleforthisjeans=$_REQUEST['selectedflystyle'];
				}	
				if($_REQUEST['selectedbuttonrivetsstyle']!="")
				{
					$selectedbuttonrivetsstyleforthisjeans=$_REQUEST['selectedbuttonrivetsstyle'];
				}	
				if($_REQUEST['selectedbeltstyle']!="")
				{
					$selectedbeltstyleforthisjeans=$_REQUEST['selectedbeltstyle'];
				}	
				if($_REQUEST['selectedloopsstyle']!="")
				{
					$selectedloopsstyleforthisjeans=$_REQUEST['selectedloopsstyle'];
				}	
				if($_REQUEST['selectedembroiderystyle']!="")
				{
					$selectedembroiderystyleforthisjeans=$_REQUEST['selectedembroiderystyle'];
				}	
					$k=1;
					$p=0;
					
					$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			
					$recordsetmeasurement = mysql_query($query);
					while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))
					{
					 
						 if($_REQUEST["measurement".$k]!="")
						 {
							 $selectedmeasurementforthisjeans[$p]=$_REQUEST["measurement".$k];
						 }
						 
					 $k++;
					 $p++;
					}					
					
					if($_REQUEST['selectedjeanstype']!="")
					{
						$selectedjeanstypeforthisjeans=$_REQUEST['selectedjeanstype'];
					}	
					
					if($_REQUEST['jeansfittingtype']!="")
					{
						$selectedfittingforthisjeans=$_REQUEST['jeansfittingtype'];
					}	
										
					if($_REQUEST['jeansspecialnote']!="")
					{
						$selectedspecialnoteforthisjeans=$_REQUEST['jeansspecialnote'];
					}	
				
					if($_REQUEST['thisjeansisfor']!="")
					{
						$selectedthisjeansisfor=$_REQUEST['thisjeansisfor'];
					}
										
					if($_REQUEST['jeansgender']!="")
					{
						$selectedjeansgender=$_REQUEST['jeansgender'];
					}	
				
					$query="SELECT * FROM material_wash_treatment_relation
					INNER JOIN material_master ON material_master.material_ID=material_wash_treatment_relation.material_master_ID
					INNER JOIN wash_treatment_master ON 
					wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID
					where material_wash_treatment_relation.mw_realtion_ID='".$selectedmaterialforthisjeans."'
					order by wash_treatment_master.wash_treatment_ID";			
					$recordsetwash_treatment = mysql_query($query);				
					if(mysql_num_rows($recordsetwash_treatment)!=0)
					{
						while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))
						{
								$materialamount=$rowwash_treatment["wash_treatment_price"];
						}
					}
					
					
					$query="SELECT * FROM special_wash_master where special_wash_ID='".$selectedspecialwashforthisjeans."' and special_wash_available=1";			
					$recordsetspecial_wash = mysql_query($query);
					if(mysql_num_rows($recordsetspecial_wash)!=0)
					{	
						while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))
						{
								$washamount=$rowspecial_wash["special_wash_additional_charge"];
						}
					}
					
					$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$selectedpocketstyleforthisjeans."' ";			
					$recordsetpocket_style = mysql_query($query);
					if(mysql_num_rows($recordsetpocket_style)!=0)
					{	
							  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))
							  {
										$pocketamount=$rowpocket_style["pocket_style_additional_charge"];
							  }
					}
					
					$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$selectedpocketstylebackforthisjeans."' ";			
					$recordsetpocket_style = mysql_query($query);
					if(mysql_num_rows($recordsetpocket_style)!=0)
					{	
							  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))
							  {
										$pocketamount_back=$rowpocket_style["pocket_style_additional_charge"];
							  }
					}
							  
					$query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_ID='".$selectedflystyleforthisjeans."'";			
					$recordsetfly_style = mysql_query($query);
					if(mysql_num_rows($recordsetfly_style)!=0)
					{	
							  while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))
							  {
										$flyamount=$rowfly_style["fly_style_additional_charge"];										
							  }
					}
					
					$query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$selectedbuttonrivetsstyleforthisjeans."'";			
					$recordsetbuttonrivets = mysql_query($query);
					if(mysql_num_rows($recordsetbuttonrivets)!=0)
					{	
							  while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))
							  {
										$buttonrivetsamount=$rowbuttonrivets["buttonrivets_additional_charge"];										
							  }
					}
					
					$query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_ID='".$selectedbeltstyleforthisjeans."'";			
					$recordsetbelt_style = mysql_query($query);
					if(mysql_num_rows($recordsetbelt_style)!=0)
					{	
							  while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))
							  {
										$beltamount=$rowbelt_style["belt_style_additional_charge"];										
							  }
					}
					
					$query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_ID='".$selectedloopsstyleforthisjeans."'";			
					$recordsetloops_style = mysql_query($query);
					if(mysql_num_rows($recordsetloops_style)!=0)
					{	
							  while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))
							  {
										$loopsamount=$rowloops_style["loops_style_additional_charge"];										
							  }
					}
					
					$query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_ID='".$selectedembroiderystyleforthisjeans."'";			
					$recordsetembroidery_style = mysql_query($query);
					if(mysql_num_rows($recordsetembroidery_style)!=0)
					{	
							  while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))
							  {
										$embroideryamount=$rowembroidery_style["embroidery_style_additional_charge"];										
							  }
					}
		
		
		if($selectedmeasurementforthisjeans[2]<=38.00)
		{
			$extracost=0.00;
			$kg=1;
		}
		elseif(($selectedmeasurementforthisjeans[2]>38.00)&&($selectedmeasurementforthisjeans[2]<=44.00))
		{
			$extracost=4.00;
			$kg=2;
		}
		elseif(($selectedmeasurementforthisjeans[2]>44.00)&&($selectedmeasurementforthisjeans[2]<=50.00))
		{
			$extracost=8.00;
			$kg=2;
		}
		elseif($selectedmeasurementforthisjeans[2]>50.00)
		{
			$extracost=12.00;
			$kg=2;
		}
		
		if($validcartitem==1)
		{
			if($_REQUEST["selection_action"]=="material")
			{
				$query="update bill_selected_records 
			set 
			bill_selected_material_treatment_relation_ID='".$selectedmaterialforthisjeans."',
			bill_selected_material_amount='".$materialamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
				
				}
				if($_REQUEST["selection_action"]=="specialwash")
			{
				
				$query="update bill_selected_records 
			set 			
			bill_selected_special_wash_ID='".$selectedspecialwashforthisjeans."',
			bill_selected_special_wash_amount='".$washamount."',
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			
			}
			if($_REQUEST["selection_action"]=="thread")
			{
				$query="update bill_selected_records 
			set 		
			bill_selected_main_thread='".$selectedthreadmainforthisjeans."',
			bill_selected_second_thread='".$selectedthreadsecondforthisjeans."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			if($_REQUEST["selection_action"]=="pocketstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_pocket_style_ID='".$selectedpocketstyleforthisjeans."',
			bill_selected_pocket_style_amount='".$pocketamount."',
			bill_selected_back_pocket_style_ID='".$selectedpocketstylebackforthisjeans."',
			bill_selected_back_pocket_style_amount='".$pocketamount_back."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="flystyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_fly_style_ID='".$selectedflystyleforthisjeans."',		
			bill_selected_fly_style_amount='".$flyamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}
			
			if($_REQUEST["selection_action"]=="buttonrivetsstyle")
			{
			$query="update bill_selected_records 
			set 			
			bill_selected_buttonrivets_ID='".$selectedbuttonrivetsstyleforthisjeans."',		
			bill_selected_buttonrivets_amount='".$buttonrivetsamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}
			
			if($_REQUEST["selection_action"]=="beltstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_belt_style_ID='".$selectedbeltstyleforthisjeans."',		
			bill_selected_belt_style_amount='".$beltamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="loopsstyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_loops_style_ID='".$selectedloopsstyleforthisjeans."',		
			bill_selected_loops_style_amount='".$loopsamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="embroiderystyle")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_embroidery_style_ID='".$selectedembroiderystyleforthisjeans."',		
			bill_selected_embroidery_style_amount='".$embroideryamount."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);
			}
			
			if($_REQUEST["selection_action"]=="measurement")
			{
				$query="update bill_selected_records 
			set 			
			bill_selected_jeans_type='".$selectedjeanstypeforthisjeans."',
			bill_selected_fittingstyle_type='".$selectedfittingforthisjeans."',
			bill_submitted_measurement1='".$selectedmeasurementforthisjeans[0]."',
			bill_submitted_measurement2='".$selectedmeasurementforthisjeans[1]."',
			bill_submitted_measurement3='".$selectedmeasurementforthisjeans[2]."',
			bill_submitted_measurement4='".$selectedmeasurementforthisjeans[3]."',
			bill_submitted_measurement5='".$selectedmeasurementforthisjeans[4]."',
			bill_submitted_measurement6='".$selectedmeasurementforthisjeans[5]."',
			bill_submitted_measurement7='".$selectedmeasurementforthisjeans[6]."',
			bill_submitted_measurement8='".$selectedmeasurementforthisjeans[7]."',
			bill_submitted_measurement9='".$selectedmeasurementforthisjeans[8]."',
			bill_submitted_measurement10='".$selectedmeasurementforthisjeans[9]."',
			bill_submitted_measurement11='".$selectedmeasurementforthisjeans[10]."',
			bill_submitted_special_note='".$selectedspecialnoteforthisjeans."',
			bill_submitted_jeans_for='".$selectedthisjeansisfor."',			
			bill_submitted_extra_charge='".$extracost."'
			where
			bill_selected_ID='".$_REQUEST["selection"]."'			
			";
			mysql_query($query);	
			}
			//$query="update bill_selected_records 
//			set 
//			bill_selected_material_treatment_relation_ID='".$selectedmaterialforthisjeans."',
//			bill_selected_material_amount='".$materialamount."',
//			bill_selected_special_wash_ID='".$selectedspecialwashforthisjeans."',
//			bill_selected_special_wash_amount='".$washamount."',
//			bill_selected_main_thread='".$selectedthreadmainforthisjeans."',
//			bill_selected_second_thread='".$selectedthreadsecondforthisjeans."',
//			bill_selected_pocket_style_ID='".$selectedpocketstyleforthisjeans."',
//			bill_selected_pocket_style_amount='".$pocketamount."',
//			bill_selected_back_pocket_style_ID='".$selectedpocketstylebackforthisjeans."',
//			bill_selected_back_pocket_style_amount='".$pocketamount_back."',
//			bill_selected_fly_style_ID='".$selectedflystyleforthisjeans."',		
//			bill_selected_fly_style_amount='".$flyamount."',
//			bill_selected_buttonrivets_ID='".$selectedbuttonrivetsstyleforthisjeans."',		
//			bill_selected_buttonrivets_amount='".$buttonrivetsamount."',
//			bill_selected_belt_style_ID='".$selectedbeltstyleforthisjeans."',		
//			bill_selected_belt_style_amount='".$beltamount."',
//			bill_selected_loops_style_ID='".$selectedloopsstyleforthisjeans."',		
//			bill_selected_loops_style_amount='".$loopsamount."',
//			bill_selected_embroidery_style_ID='".$selectedembroiderystyleforthisjeans."',		
//			bill_selected_embroidery_style_amount='".$embroideryamount."',
//			bill_selected_jeans_type='".$selectedjeanstypeforthisjeans."',
//			bill_selected_fittingstyle_type='".$selectedfittingforthisjeans."',
//			bill_submitted_measurement1='".$selectedmeasurementforthisjeans[0]."',
//			bill_submitted_measurement2='".$selectedmeasurementforthisjeans[1]."',
//			bill_submitted_measurement3='".$selectedmeasurementforthisjeans[2]."',
//			bill_submitted_measurement4='".$selectedmeasurementforthisjeans[3]."',
//			bill_submitted_measurement5='".$selectedmeasurementforthisjeans[4]."',
//			bill_submitted_measurement6='".$selectedmeasurementforthisjeans[5]."',
//			bill_submitted_measurement7='".$selectedmeasurementforthisjeans[6]."',
//			bill_submitted_measurement8='".$selectedmeasurementforthisjeans[7]."',
//			bill_submitted_measurement9='".$selectedmeasurementforthisjeans[8]."',
//			bill_submitted_measurement10='".$selectedmeasurementforthisjeans[9]."',
//			bill_submitted_measurement11='".$selectedmeasurementforthisjeans[10]."',
//			bill_submitted_special_note='".$selectedspecialnoteforthisjeans."',
//			bill_submitted_jeans_for='".$selectedthisjeansisfor."',
//			bill_submitted_jeans_gender='".$selectedjeansgender."',
//			bill_submitted_extra_charge='".$extracost."'
//			where
//			bill_selected_ID='".$_REQUEST["selection"]."'			
//			";
//			mysql_query($query);			
		}				
		
	header("Location:mycart.html");
	exit();	 
}
if($_REQUEST["action"]=="emptycart")
{	
	unset($_SESSION['sqjeanscart']);
	unset($_SESSION['cartno']);
	unset($_SESSION['selectedmaterialid']);
	unset($_SESSION['selectedspecialwash']);
	unset($_SESSION['selectedthread_main']);
	unset($_SESSION['selectedthread_second']);
	unset($_SESSION['selectedprocketstyle']);
	unset($_SESSION['selectedprocketstyle_back']);
	unset($_SESSION['selectedflystyle']);
	unset($_SESSION['selectedbuttonrivetsstyle']);
	unset($_SESSION['selectedbeltstyle']);
	unset($_SESSION['selectedloopsstyle']);
	unset($_SESSION['selectedembroiderystyle']);
	
	if($_SESSION['sqjeansloginuseremail']!="")
	{
			$recordsetselected = mysql_query("select * from bill_selected_records
			INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
			where 
			bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
			bill_payment_status!='Completed' and
			bill_payment_status!='Pending'
			",$cn);
			while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
			{
				$query="delete from bill_selected_records where bill_selected_ID='".$rowsetselected["bill_selected_ID"]."'";
				mysql_query($query);
			}
			
			$query="delete from bill_master where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
			bill_payment_status!='Completed' and
			bill_payment_status!='Pending'";
			mysql_query($query);
	}
	
	header("Location:customjeans-step1.html");
	exit();	
}
if($_REQUEST["action"]=="emptymycart")
{	
	unset($_SESSION['sqjeanscart']);
	unset($_SESSION['cartno']);
	unset($_SESSION['selectedmaterialid']);
	unset($_SESSION['selectedspecialwash']);
	unset($_SESSION['selectedthread_main']);
	unset($_SESSION['selectedthread_second']);
	unset($_SESSION['selectedprocketstyle']);
	unset($_SESSION['selectedprocketstyle_back']);
	unset($_SESSION['selectedflystyle']);
	unset($_SESSION['selectedbuttonrivetsstyle']);
	unset($_SESSION['selectedbeltstyle']);
	unset($_SESSION['selectedloopsstyle']);
	unset($_SESSION['selectedembroiderystyle']);
	
$recordsetselected = mysql_query("select * from bill_selected_records
INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 
where 
bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'
",$cn);
while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))
{
	$query="delete from bill_selected_records where bill_selected_ID='".$rowsetselected["bill_selected_ID"]."'";
	mysql_query($query);
}

$query="delete from bill_master where bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and
bill_payment_status!='Completed' and
bill_payment_status!='Pending'";
mysql_query($query);
	
	header("Location:mycart.html");
	exit();	
}
?>