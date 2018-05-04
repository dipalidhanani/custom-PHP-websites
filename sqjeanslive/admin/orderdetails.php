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

<link href="css/css.css" rel="stylesheet" type="text/css" />

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

            <td align="center" class="normal_fonts14_black">Order Details</td>

    </tr>

    <tr>

      <td><table width="90%" border="0" align="center" cellpadding="5" cellspacing="0" class="border">

          <?php

		   $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

            {

			$totalextraamount=$rowbill["bill_extra_amount"];

			$totalshippingamount=$rowbill["bill_total_shipping"];

			$totaldiscountamount=$rowbill["bill_total_discount"];

				?>

                    <tr>

                      <td width="15%" height="25" align="left"  class="normal_fonts12">Name :</td>

                      <td width="35%" height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_name_user"];?></td>

                      <td width="30%" height="25" align="right" class="normal_fonts12">Date :</td>

                      <td width="20%" height="25" align="left" class="normal_fonts12">

                        <?php

							$datetime=$rowbill["bill_datetime"];

							$datetime=explode(" ",$datetime);

							$date=$datetime[0];

							$date=explode("-",$date);

							$year=$date[0];

							$mon=$date[1];

							$day=$date[2];

							$date=$day."-".$mon."-".$year;

							$datetime=$date." ".$datetime[1];

							echo $datetime;

						?>                      </td>

                    </tr>

                    <tr>

                      <td height="25" align="left" class="normal_fonts12">Invoice No :</td>

                      <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_invoice_no"];?></td>

                      <td height="25" align="right" class="normal_fonts12">Amount :</td>

                      <td height="25" align="left" class="normal_fonts12">$<?php echo $rowbill["bill_final_amount"];?></td>

                    </tr>

                    <?php

			}

			?>

                  </table></td>

    </tr>

    <tr>

      <td align="center" class="normal_fonts14_black">Payment Details</td>

    </tr>

    <tr>

      <td><table width="90%" border="0" align="center" cellpadding="2" cellspacing="0" class="border">

        <?php

		   $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

            {

			$totalextraamount=$rowbill["bill_extra_amount"];

			$totalshippingamount=$rowbill["bill_total_shipping"];

			$totaldiscountamount=$rowbill["bill_total_discount"];

				?>

        <tr>

          <td width="45%" height="25" align="right"  class="normal_fonts12"><strong>Payment Method :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php 

		  if($rowbill["bill_payment_type"]==0)

		  {

		  		echo "Paypal";

		  }

		  elseif($rowbill["bill_payment_type"]==1)

		  {

		  		echo "Net Banking";

		  }

		  elseif($rowbill["bill_payment_type"]==2)

		  {

		  		echo "Cheque";

		  }

		  elseif($rowbill["bill_payment_type"]==3)

		  {

		  		echo "Cash";

		  }

		  elseif($rowbill["bill_payment_type"]==4)

		  {

		  		echo "Demand Draft";

		  }

		  ?></td>

          </tr>

          <?php

		 if($rowbill["bill_payment_type"]==1)

		  {

		  ?> 

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>Bank Name :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_bank_name"];?></td>

          </tr>

          <?php

		  }

		  ?>

         <?php

		 if($rowbill["bill_payment_type"]==2)

		  {

		  ?> 

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>Bank Name :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_bank_name"];?></td>

          </tr>

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>Cheque No :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_cheque_dd_number"];?></td>

        </tr>

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>Cheque Date :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_cheque_dd_date"];?></td>

        </tr>

        <?php

		}

		?>

        <?php

		 if($rowbill["bill_payment_type"]==4)

		  {

		  ?> 

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>Bank Name :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_bank_name"];?></td>

          </tr>

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>DD No :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_cheque_dd_number"];?></td>

        </tr>

        <tr>

          <td height="25" align="right" class="normal_fonts12"><strong>DD Date :</strong></td>

          <td height="25" align="left" class="normal_fonts12"><?php echo $rowbill["bill_payment_cheque_dd_date"];?></td>

        </tr>

        <?php

		}

		?>

        <?php

			}

			?>

      </table></td>

    </tr>

     <tr>

       <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

         

         <tr>

           <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">

             <tr>

               <td width="50%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">

                 

                 <tr>

                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">

                     <tr>

                       <td bgcolor="#999999" class="normal_fonts12_black" ><strong>Billing Address</strong></td>

                       </tr>

                     </table></td>

                   </tr>

                 <tr>

                   <td><table width="100%" border="0" cellpadding="2" cellspacing="0">

                     <?php

                                $recordsetbilling = mysql_query("select * from bill_billing_address

								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_billing_address.billing_bill_master_ID							 

								where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

								$catc=1;

                                while($rowbilling = mysql_fetch_array($recordsetbilling,MYSQL_ASSOC))

                                {

                                ?>

                     <tr>

                       <td width="35%" align="right" valign="top" class="normal_fonts12" >Name </td>

                       <td class="normal_fonts12">:</td>

                       <td width="64%" align="left" class="normal_fonts12"><?php  echo $rowbilling["billing_user_first_name"];?>

                         <?php  echo $rowbilling["billing_user_last_name"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >Address </td>

                       <td class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowbilling["billing_user_address"];?>

                         <?php  echo $rowbilling["billing_user_address_2"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >City </td>

                       <td class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowbilling["billing_user_city"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >State &amp; Pin Code</td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowbilling["billing_user_state"];?>

                         <?php  echo $rowbilling["billing_user_pincode"];?></td>

                       </tr>

                     <tr>

                       <td align="right" valign="top"  class="normal_fonts12" >Country </td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowbilling["billing_user_country"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >Email Address </td>

                       <td width="1%" class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowbilling["billing_user_email"];?></td>

                       </tr>

                     <tr>

                       <td align="right" valign="top"  class="normal_fonts12" >Phone / Mobile</td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowbilling["billing_user_phone"];?>

                         <?php  echo $rowbilling["billing_user_mobile"];?></td>

                       </tr>

                     <tr>

                       <td height="10" colspan="4" align="right" class="normal_fonts12"></td>

                     </tr>

                     <?php

				}

				?>

                     </table></td>

                   </tr>                   

                 </table></td>

               <td width="1%" valign="top">&nbsp;</td>

               <td valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">

                 <tr>

                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">

                     <tr>

                       <td bgcolor="#999999" class="normal_fonts12_black" ><strong>Shipping Address</strong></td>

                       </tr>

                     </table></td>

                   </tr>

                 <tr>

                   <td><table width="100%" border="0" cellpadding="2" cellspacing="0">

                     <?php

                                $recordsetshipping = mysql_query("select * from bill_shipping_address

								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 

								where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

								$catc=1;

                                while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))

                                {

                                ?>

                     <tr>

                       <td width="35%" align="right" valign="top" class="normal_fonts12" >Name </td>

                       <td class="normal_fonts12">:</td>

                       <td width="64%" align="left" class="normal_fonts12"><?php  echo $rowshipping["shipping_user_first_name"];?>

                         <?php  echo $rowshipping["shipping_user_last_name"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >Address </td>

                       <td class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowshipping["shipping_user_address"];?>

                         <?php  echo $rowshipping["shipping_user_address_2"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >City </td>

                       <td class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowshipping["shipping_user_city"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top"  class="normal_fonts12" >State &amp; Pin Code</td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowshipping["shipping_user_state"];?>

                         <?php  echo $rowshipping["shipping_user_pincode"];?></td>

                       </tr>

                     <tr>

                       <td align="right" valign="top"  class="normal_fonts12" >Country </td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowshipping["shipping_user_country"];?></td>

                     </tr>

                     <tr>

                       <td align="right" valign="top" class="normal_fonts12" >Email Address </td>

                       <td width="1%" class="normal_fonts12">:</td>

                       <td align="left" class="normal_fonts12"><?php  echo $rowshipping["shipping_user_email"];?></td>

                       </tr>

                     <tr>

                       <td align="right" valign="top"  class="normal_fonts12" >Phone&nbsp;/ Mobile</td>

                       <td  class="normal_fonts12">:</td>

                       <td align="left"  class="normal_fonts12"><?php  echo $rowshipping["shipping_user_phone"];?>

                         <?php  echo $rowshipping["shipping_user_mobile"];?></td>

                     </tr>

                     <tr>

                       <td height="10" colspan="4" align="right" class="normal_fonts12"></td>

                     </tr>

                     <?php

				}

				?>

                     </table></td>

                   </tr>

                 </table></td>

               </tr>

             </table></td>

           </tr>

       </table></td></tr>

       <?php

$recordsetselected = mysql_query("select * from bill_selected_records

INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 

where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

$catc=1;

while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))

{

  ?>

     <tr>

       <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bg1.jpg" class="table_border" style="background-repeat:repeat-x;">

  <tr>

    <td width="1%" valign="top"></td>

    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >        

        <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="1">

               <tr>

          <td width="28%" class="normal_fonts12"><strong>Jeans For : </strong></td>

          <td width="61%" class="normal_fonts12"><?php echo $rowsetselected['bill_submitted_jeans_for'];?></td>

          <td width="11%" class="normal_fonts12">&nbsp;</td>

               </tr>

        <tr>

          <td class="normal_fonts12"><strong>Gender : </strong></td>

          <td class="normal_fonts12"><?php echo $rowsetselected['bill_submitted_jeans_gender'];?></td>

          <td class="normal_fonts12">&nbsp;</td>

        </tr>

              <tr>

          <td class="normal_fonts12"><strong>Fabric &amp; Wash : </strong></td>

          <td class="normal_fonts12"><?php

			$query="SELECT * FROM material_wash_treatment_relation

			INNER JOIN material_master ON material_master.material_ID=material_wash_treatment_relation.material_master_ID

			INNER JOIN wash_treatment_master ON 

			wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID

			where material_wash_treatment_relation.mw_realtion_ID='".$rowsetselected["bill_selected_material_treatment_relation_ID"]."'

			order by wash_treatment_master.wash_treatment_ID";			

			$recordsetwash_treatment = mysql_query($query);				

			if(mysql_num_rows($recordsetwash_treatment)!=0)

			{

				while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))

				{

					echo $rowwash_treatment["material_name"]." - ".$rowwash_treatment["wash_treatment_name"];

					$materialamount=$rowsetselected["bill_selected_material_amount"];					

					$totalamount=$totalamount+$materialamount;

				}

			}

			else

			{

				echo "No Material selected";

			}

			

			?></td>

          <td align="right" class="normal_fonts8"><span class="normal_fonts12">

            <?php 

		  if(mysql_num_rows($recordsetwash_treatment)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$materialamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$materialamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$materialamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		   ?>

          </span></td>

              </tr>

        

        

        <tr>

          <td class="normal_fonts12"><strong>Special Wash </strong>

:</td>

          <td class="normal_fonts12"><span class="normal_fonts12">

            <?php

          $query="SELECT * FROM special_wash_master where special_wash_ID='".$rowsetselected['bill_selected_special_wash_ID']."' and special_wash_available=1";			

		  $recordsetspecial_wash = mysql_query($query);

		  if(mysql_num_rows($recordsetspecial_wash)!=0)

		  {	

			  while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))

			  {

					echo $rowspecial_wash["special_wash_name"];

					$washamount=$rowsetselected["bill_selected_special_wash_amount"];

					$totalamount=$totalamount+$washamount;

			  }

		  }

		  else

		  {

		  		echo "No Special wash selected";

		  }

		  ?>

          </span></td>

          <td align="right" class="normal_fonts8"><span class="normal_fonts12">

            <?php 

		  if(mysql_num_rows($recordsetspecial_wash)!=0)

		  {

		  		

				if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$washamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$washamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$washamount*$_SESSION["currentselectedcurrencyamount"]);

				}			

				

		  }

		   ?>

          </span></td>

          </tr>

        

         <tr>

          <td class="normal_fonts12"><strong>Main Thread :</strong></td>

          <td class="normal_fonts12"><?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$rowsetselected["bill_selected_main_thread"]."'";			

		  $recordsetthread = mysql_query($query);

		  if(mysql_num_rows($recordsetthread)!=0)

		  {

			  while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))

			  {

					echo $rowthread["thread_name"];

			  }

		   }

		   else

		   {

		   		   echo "No Thread Selected"; 

		   }

          ?></td>

          <td class="normal_fonts12">&nbsp;</td>

          </tr>

        

        <tr>

          <td class="normal_fonts12"><strong>Second Thread :</strong></td>

          <td class="normal_fonts12"><?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$rowsetselected["bill_selected_second_thread"]."'";			

		  $recordsetthread = mysql_query($query);

		  if(mysql_num_rows($recordsetthread)!=0)

		  {

			  while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))

			  {

					echo $rowthread["thread_name"];

			  }

		   }

		   else

		   {

		   		   echo "No Thread Selected"; 

		   }

          ?></td>

          <td class="normal_fonts12">&nbsp;</td>

          </tr>

        

        <tr>

          <td class="normal_fonts12"><strong>Front Pocket :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$rowsetselected['bill_selected_pocket_style_ID']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	

			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowpocket_style["pocket_style_name"];

					$pocketamount=$rowsetselected["bill_selected_pocket_style_amount"];

					$totalamount=$totalamount+$pocketamount;

			  }

		  }

		  else

		  {

		  		echo "No Front Pocket Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$pocketamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$pocketamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$pocketamount*$_SESSION["currentselectedcurrencyamount"]);

				}	

		  }

		  ?>          </td>

          </tr>

        <tr>

          <td class="normal_fonts12"><strong>Back Pocket :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$rowsetselected['bill_selected_back_pocket_style_ID']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	

			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowpocket_style["pocket_style_name"];

					$pocketamount_back=$rowsetselected["bill_selected_back_pocket_style_amount"];

					$totalamount=$totalamount+$pocketamount_back;

			  }

		  }

		  else

		  {

		  		echo "No Back Pocket Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$pocketamount_back);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$pocketamount_back*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$pocketamount_back*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>

        <tr>

          <td class="normal_fonts12"><strong>Fly :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_ID='".$rowsetselected["bill_selected_fly_style_ID"]."'";			

		  $recordsetfly_style = mysql_query($query);

		  if(mysql_num_rows($recordsetfly_style)!=0)

		  {	

			  while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))

			  {

					echo $rowfly_style["fly_style_name"];

					$zipamount=$rowsetselected["bill_selected_fly_style_amount"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Fly Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetfly_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>

        
        <tr>

          <td class="normal_fonts12"><strong>Buttonrivets :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$rowsetselected["bill_selected_buttonrivets_ID"]."'";			

		  $recordsetbuttonrivets = mysql_query($query);

		  if(mysql_num_rows($recordsetbuttonrivets)!=0)

		  {	

			  while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))

			  {

					echo $rowbuttonrivets["buttonrivets_name"];

					$zipamount=$rowsetselected["bill_selected_buttonrivets_amount"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Buttonrivets Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetbuttonrivets)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>
          
          <tr>

          <td class="normal_fonts12"><strong>Belt :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_ID='".$rowsetselected["bill_selected_belt_style_ID"]."'";			

		  $recordsetbelt_style = mysql_query($query);

		  if(mysql_num_rows($recordsetbelt_style)!=0)

		  {	

			  while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))

			  {

					echo $rowbelt_style["belt_style_name"];

					$zipamount=$rowsetselected["bill_selected_belt_style_amount"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Belt Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetbelt_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>
          
          <tr>

          <td class="normal_fonts12"><strong>Loops :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_ID='".$rowsetselected["bill_selected_loops_style_ID"]."'";			

		  $recordsetloops_style = mysql_query($query);

		  if(mysql_num_rows($recordsetloops_style)!=0)

		  {	

			  while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))

			  {

					echo $rowloops_style["loops_style_name"];

					$zipamount=$rowsetselected["bill_selected_loops_style_amount"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Loops Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetloops_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>
          
          <tr>

          <td class="normal_fonts12"><strong>embroidery :</strong></td>

          <td class="normal_fonts12"><?php

          $query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_ID='".$rowsetselected["bill_selected_embroidery_style_ID"]."'";			

		  $recordsetembroidery_style = mysql_query($query);

		  if(mysql_num_rows($recordsetembroidery_style)!=0)

		  {	

			  while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))

			  {

					echo $rowembroidery_style["embroidery_style_name"];

					$zipamount=$rowsetselected["bill_selected_embroidery_style_amount"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No embroidery Style selected";

		  }

		  ?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  if(mysql_num_rows($recordsetembroidery_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "Rs. ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		  ?>          </td>

          </tr>

        

        <tr>

          <td align="left" class="normal_fonts12"><strong>Measurement Type :</strong></td>

          <td align="left" class="normal_fonts12"><?php				

				if($rowsetselected["bill_selected_jeans_type"]==1)

				{

					echo "Make My Jeans";

				}

				elseif($rowsetselected["bill_selected_jeans_type"]==2)

				{

					echo "Copy A Jeans";

				}

				?></td>

          <td align="right" class="normal_fonts12">&nbsp;</td>

          </tr>

        <?php

		if($rowsetselected["bill_selected_jeans_type"]==1)

		{

		?>

        <tr>

          <td align="left" class="normal_fonts12"><strong>Fitting Style :</strong></td>

          <td align="left" class="normal_fonts12"><?php				

				echo $rowsetselected["bill_selected_fittingstyle_type"];

				?></td>

          <td align="right" class="normal_fonts12">&nbsp;</td>

          </tr>

        <?php

		}

		?>

        <tr>

          <td colspan="2" align="left" class="normal_fonts12"><table width="100%" border="0" cellspacing="0" cellpadding="0">

            <tr>

              <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <?php

			 $md=0;

			 $m=1;

			 $selectedwaist="";

			 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID limit 4";			

			 $recordsetmeasurement = mysql_query($query);

			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

			 {

			 $md++;

			 

			 ?>

                <tr>

                  <td width="58%" class="normal_fonts12"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="42%" class="normal_fonts12"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

                  </tr>

                <?php

				if($m==3)

				{				

					$selectedwaist=$rowsetselected["bill_submitted_measurement3"];	

				}	 

			 $m++;

			 }

			 ?>

              </table></td>

              <td width="1%" valign="top">&nbsp;</td>

              <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <?php

			 $md=0;

			 $m=5;

			 $query="SELECT * FROM measurement_master where measurement_available=1 and measurement_ID > 4 order by measurement_ID limit 3";			

			 $recordsetmeasurement = mysql_query($query);

			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

			 {

			 $md++;

			 ?>

                <tr>

                  <td width="58%" class="normal_fonts12"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="42%" class="normal_fonts12"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

                  </tr>

                <?php			 

			 $m++;

			 }

			 ?>

              </table></td>

              <td width="1%" valign="top">&nbsp;</td>

              <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <?php

			 $md=0;

			 $m=8;

			 $query="SELECT * FROM measurement_master where measurement_available=1 and measurement_ID > 7 order by measurement_ID";			

			 $recordsetmeasurement = mysql_query($query);

			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

			 {

			 $md++;

			 ?>

                <tr>

                  <td width="57%" class="normal_fonts12"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="43%" class="normal_fonts12"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

                </tr>

                <?php			 

			 $m++;

			 }

			 ?>

              </table></td>

            </tr>

          </table></td>

          <td align="right" class="normal_fonts12">&nbsp;</td>

          </tr>

        <tr>

          <td colspan="2" align="left" class="normal_fonts12"><strong>Special Note</strong></td>

          <td align="right" class="normal_fonts12">&nbsp;</td>

          </tr>

        <tr>

          <td colspan="2" align="left" class="normal_fonts12">

		  <?php

         		echo $rowsetselected["bill_submitted_special_note"];

		  ?></td>

          <td align="right" class="normal_fonts12">&nbsp;</td>

          </tr>

       <tr>

          <td align="left" class="normal_fonts12"><strong>Extra Cost :</strong></td>

          <td align="left" class="normal_fonts12"><?php

						if($selectedwaist<=38.00)

						{

							echo 'Waist up to 38.00" (No Extra Cost)';

							$kg=1;	

							$totalkg=$totalkg+$kg;					

						}

						elseif(($selectedwaist>38.00)&&($selectedwaist<=44.00))

						{

							echo 'Waist over 38.00" to 44.00" (4.00 US $ Extra)';

							$kg=1;	

							$totalkg=$totalkg+$kg;											

						}

						elseif(($selectedwaist>44.00)&&($selectedwaist<=50.00))

						{

							echo 'Waist over 44.00" to 50.00" (8.00 US $ Extra)';	

							$kg=2;	

							$totalkg=$totalkg+$kg;			

						}

						elseif($selectedwaist>50.00)

						{

								echo 'Waist over 50.00" (12 US $ Extra)';

								$kg=2;	

								$totalkg=$totalkg+$kg;				

						}

						?></td>

          <td align="right" class="normal_fonts12">

          <?php

		  	$totalamount=$totalamount+$rowsetselected["bill_submitted_extra_charge"];

			

			

			$extracost=$rowsetselected["bill_submitted_extra_charge"];

			

						if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$extracost);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$extracost*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$extracost*$_SESSION["currentselectedcurrencyamount"]);

						}

			?>          </td>

          </tr>        

        <tr>

          <td height="20" align="left" bgcolor="#E8E8E8" class="red_font9">&nbsp;</td>

          <td align="right" bgcolor="#E8E8E8" class="normal_fonts12"><strong>Total :</strong></td>

          <td align="right" bgcolor="#E8E8E8" class="normal_fonts12"><strong><?php

						if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$totalamount);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$totalamount*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$totalamount*$_SESSION["currentselectedcurrencyamount"]);

						}

			?></strong></td>

          </tr>

      </table></td>

  </tr>

  </table></td>

  </tr>

</table></td>

     </tr>

     <?php

	 $totalamount=0.00;

	 }

	 ?>

     <tr>

       <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="table_border" >

            <?php

			$disptes=0.00;

			$recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);						

                                while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

                                {

								?>

            <tr>

              <td height="20" colspan="2" align="right" class="normal_fonts12"><strong>Total Amount :</strong></td>

              <td width="25%" height="20" align="right" class="normal_fonts12">

			  <strong><?php 

			  $paymenttotalapp=$rowbill["bill_total_amount"]+$rowbill["bill_extra_amount"];

			  			  

			 		    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$paymenttotalapp);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);

						}

						

						$disptes=$disptes+$paymenttotalapp;

			  ?></strong></td>

            </tr>

            <?php

			if($rowbill["bill_total_discount"]!=0.00)

			{

			?>

            <tr>

              <td height="20" align="left" class="normal_fonts12">&nbsp;</td>

              <td height="20" align="right" class="normal_fonts12"><strong>- Total Discount :</strong></td>

              <td height="20" align="right" class="normal_fonts12">

              <strong><?php 

			  			if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";
							$discountamt=$rowbill["bill_total_discount"];
							printf("%.2f",$rowbill["bill_total_discount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";
							$discountamt=($rowbill["bill_total_discount"]*$_SESSION["currentselectedcurrencyamount"]);
							printf("%.2f",$rowbill["bill_total_discount"]*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";
							$discountamt=($rowbill["bill_total_discount"]*$_SESSION["currentselectedcurrencyamount"]);
							printf("%.2f",$rowbill["bill_total_discount"]*$_SESSION["currentselectedcurrencyamount"]);

						}			  

			  ?></strong>              </td>

            </tr>

            <?php

			}

			?>
 <tr>

              <td height="20" align="left" class="normal_fonts12">&nbsp;</td>

              <td height="20" align="right" class="normal_fonts12"><strong>Total :</strong></td>

              <td height="20" align="right" class="normal_fonts12">

              <strong><?php 
   					$totpay=$disptes-$discountamt;
			  			if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$totpay);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$totpay*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$totpay*$_SESSION["currentselectedcurrencyamount"]);

						}

			  ?></strong>              </td>

            </tr>

            <tr>

              <td height="20" colspan="2" align="right" class="normal_fonts12"><strong>+  Shipping to <?php 

			  $recordsetshipping = mysql_query("select * from bill_shipping_address

						INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 						where bill_master.bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

						$catc=1;

                        while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))

                        {

							$shippingcountry=$rowshipping["shipping_user_country"];

			  				echo $shippingcountry;

			  			}

			  ?> (<?php echo $totalkg." kg"; ?>) :</strong></td>

              <td height="20" align="right" class="normal_fonts12">

              <strong><?php 

			 			if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$rowbill["bill_total_shipping"]);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$rowbill["bill_total_shipping"]*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$rowbill["bill_total_shipping"]*$_SESSION["currentselectedcurrencyamount"]);

						}

			  $disptes=$disptes+$rowbill["bill_total_shipping"];

			  ?></strong>              </td>

            </tr>

           
            

            <tr>

              <td height="20" align="left" class="normal_fonts12">&nbsp;</td>

              <td height="20" align="right" class="normal_fonts12"><strong>Final Payable Amount :</strong></td>

              <td height="20" align="right" class="normal_fonts12">

              <strong><?php 

			 		 	if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							printf("%.2f",$rowbill["bill_final_amount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							printf("%.2f",$rowbill["bill_final_amount"]*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							printf("%.2f",$rowbill["bill_final_amount"]*$_SESSION["currentselectedcurrencyamount"]);

						}

			  ?></strong>              </td>

            </tr>

            <?php

			}

			?>

          </table></td>

     </tr>

     <tr>

       <td><table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="border">

                 

                 <tr>

                   <td><table width="100%" border="0" cellpadding="5" cellspacing="0">

                     <tr>

                       <td align="left" bgcolor="#999999" class="normal_fonts12_black" ><strong>Order Status</strong></td>

                       </tr>

                     </table></td>

                   </tr>

                 <tr>

                   <td>&nbsp;</td>

                 </tr>

                 <tr>

                   <td><table border="0" align="center" cellpadding="2" cellspacing="0" class="border">

                  <form name="orderform" action="orderprocess.php" method="post">

                    <?php

				    $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_REQUEST["invoice"]."'",$cn);

					while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

					{

					?>

                  

                  <tr>

                    <td align="right" valign="bottom" class="normal_fonts10"><strong>Order Status:</strong></td>

                    <td align="left" valign="bottom" class="normal_fonts10"><?php

if($rowbill["bill_order_completed"]==0)

{

	echo "Pending";

}

elseif($rowbill["bill_order_completed"]==1)

{

	echo "Completed";

}

elseif($rowbill["bill_order_completed"]==2)

{

	echo "Cancelled";

}

?></td>

                  </tr>

                  <tr>

                    <td align="right" valign="top" class="normal_fonts10"><strong>Note:</strong></td>

                    <td align="left" valign="bottom" class="normal_fonts10"><?php echo $rowbill["bill_order_status_note"];?></td>

                  </tr>

                  <?php

				  if($rowbill["bill_order_status_updated_datetime"]!="0000-00-00 00:00:00")

				  {

				  ?>

                  <tr>

                    <td align="right" valign="bottom" class="normal_fonts10"><strong>Status Updated On:</strong></td>

                    <td align="left" valign="bottom" class="normal_fonts10"><?php

							$datetime=$rowbill["bill_order_status_updated_datetime"];

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

                  </tr>

                  <tr>

                    <td align="right" valign="bottom" class="normal_fonts10"><strong>Status Updated from:</strong></td>

                    <td align="left" valign="bottom" class="normal_fonts10"><?php echo $rowbill["bill_order_status_updated_ip"];?></td>

                  </tr>

                  <?php

				  }

				  ?>

                  

                    <?php

					}

					?>

                 </form>   

                </table></td>

                 </tr>

                 <tr>

                   <td>&nbsp;</td>

                 </tr>                   

                 </table></td>

     </tr>

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