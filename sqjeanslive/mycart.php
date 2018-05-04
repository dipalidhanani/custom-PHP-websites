<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");

?>

<?php

require_once("include/files.php");

$recordsetselected = mysql_query("select * from bill_selected_records

INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 

where 

bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and

bill_payment_status!='Completed' and

bill_payment_status!='Pending'

",$cn);


?>

<link href="css/home.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">



  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top">

    <table width="100%" border="0" cellspacing="0" cellpadding="5">

    <form name="nextstepform" method="get" action="index.php">

  <tr>

    <td class="titel_2"><strong>My Cart</strong></td>

    <td width="50%" align="right" class="font8">

    <?php

	if(mysql_num_rows($recordsetselected)!=0)

	{

	?>

    <a href="process.php?action=emptymycart" onClick="return confirm('Do you want to make your cart empty?')"><font color="#0000FF">&nbsp;Empty your Cart</font></a>

    <?php

	}

	else

	{

		echo "&nbsp;";

	}

	?>

    </td>

  </tr>

  

  		<?php

        if(mysql_num_rows($recordsetselected)>5)

	    {

		?>

        <tr>

          <td height="25" colspan="2" align="center" class="red_font9"><strong>You have more the 5 items in your cart, please remove some items.</strong></td>

        </tr>        

        <?php

		}

		?>

  <?php

  $py=0;







$catc=1;

while($rowsetselected = mysql_fetch_array($recordsetselected,MYSQL_ASSOC))

{

$py=1;

  ?>

  <tr>

    <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border3" background="images/pgbg02a.jpg" >

  <tr>

    <td width="1%" valign="top"></td>

    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >        

        <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="1">

               <tr>

          <td width="29%" class="font10"><strong>Jeans For</strong></td>

          <td width="3%" class="font10" align="center">:</td>

          <td width="49%" class="fontblue9"><?php echo $rowsetselected['bill_submitted_jeans_for'];?></td>

          <td width="14%" class="font10">&nbsp;</td>

          <td class="font10">&nbsp;</td>

               </tr>

        <tr>

          <td class="font10"><strong>Gender</strong></td>

          <td class="font10" align="center">:</td>

          <td class="fontblue9"><?php echo $rowsetselected['bill_submitted_jeans_gender'];?></td>

          <td class="font10">&nbsp;</td>

          <td class="font10">&nbsp;</td>

        </tr>

              <tr>

          <td class="font10"><strong>Fabric &amp; Wash</strong></td>

          <td class="font10" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td align="right" class="font8"><span class="font9">

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

              <td width="5%" align="right" class="font8"><a href="index.php?object=27&action=material&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

              </tr>

        

        

        <tr>

          <td class="font10"><strong>Special Wash</strong></td>

          <td class="font10" align="center">:</td>

          <td class="font10"><span class="fontblue9">

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

          <td align="right" class="font8"><span class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=specialwash&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

        

         <tr>

          <td class="font9"><strong>Main Thread</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td class="font9">&nbsp;</td>

          <td rowspan="2" align="right" class="font8"><a href="index.php?object=27&action=thread&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

         </tr>

        

        <tr>

          <td class="font9"><strong>Second Thread</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td class="font9">&nbsp;</td>

          </tr>

        

        <tr>

          <td class="font9"><strong>Front Pocket</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td align="right" class="font9">

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

          <td rowspan="2" align="right" class="font8"><a href="index.php?object=27&action=pocketstyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

        <tr>

          <td class="font9"><strong>Back Pocket</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td align="right" class="font9">

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

          <td class="font9"><strong>Fly Style</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td align="right" class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=flystyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

        

         <tr>

          <td class="font9"><strong>Buttons & Rivets Style</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

		  		echo "No Buttons & Rivets selected";

		  }

		  ?></td>

          <td align="right" class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=buttonrivetsstyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

         <tr>

          <td class="font9"><strong>Belt Style</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

		  		echo "No belt Style selected";

		  }

		  ?></td>

          <td align="right" class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=beltstyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

         <tr>

          <td class="font9"><strong>Loops Style</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

		  		echo "No loops Style selected";

		  }

		  ?></td>

          <td align="right" class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=loopsstyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

         <tr>

          <td class="font9"><strong>embroidery Style</strong></td>

          <td class="font9" align="center">:</td>

          <td class="fontblue9"><?php

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

          <td align="right" class="font9">

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

          <td align="right" class="font8"><a href="index.php?object=27&action=embroiderystyle&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

        </tr>

        

        <tr>

          <td align="left" class="font10"><strong>Measurement Type</strong></td>

          <td align="center" class="font10">:</td>

          <td align="left" class="fontblue9"><?php				

				if($rowsetselected["bill_selected_jeans_type"]==1)

				{

					echo "Make My Jeans";

				}

				elseif($rowsetselected["bill_selected_jeans_type"]==2)

				{

					echo "Copy A Jeans";

				}

				?></td>

          <td align="right" class="font10">&nbsp;</td>

          <td align="right" valign="middle" class="font8"><a href="index.php?object=27&action=measurement&selection=<?php echo $rowsetselected["bill_selected_ID"];?>"></a></td>

        </tr>

        <?php

		if($rowsetselected["bill_selected_jeans_type"]==1)

		{

		?>

        <tr>

          <td align="left" class="font10"><strong>Fitting Style</strong></td>

          <td align="center" class="font10">:</td>

          <td align="left" class="fontblue9"><?php				

				echo $rowsetselected["bill_selected_fittingstyle_type"];

				?></td>

          <td align="right" class="font10">&nbsp;</td>

          <td align="right" valign="middle" class="font8">&nbsp;</td>

          </tr>

        <?php

		}

		?>

        <tr>

          <td colspan="3" align="left" class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border3">

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

                  <td width="55%" class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="45%" class="fontblue9"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

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

                  <td width="55%" class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="45%" class="fontblue9"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

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

                  <td width="55%" class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                  <td width="45%" class="fontblue9"><?php echo $rowsetselected["bill_submitted_measurement".$m];?></td>

                </tr>

                <?php			 

			 $m++;

			 }

			 ?>

              </table></td>

            </tr>

          </table></td>

          <td align="right" class="font10">&nbsp;</td>

          <td align="right" valign="middle" class="font8"><a href="index.php?object=27&action=measurement&selection=<?php echo $rowsetselected["bill_selected_ID"];?>">Edit</a></td>

          </tr>

        <tr>

          <td height="21" align="left" valign="top" class="font10"><strong>Special Note</strong></td>

          <td align="center" valign="top" class="font10">:</td>

          <td align="left" valign="top" class="font10"><?php

         		echo $rowsetselected["bill_submitted_special_note"];

		  ?></td>

          <td align="right" class="font10">&nbsp;</td>

          <td align="right" valign="middle" class="font8">&nbsp;</td>

          </tr>

       <tr>

         <td align="left" class="font10"><strong>Extra Cost for Large Size</strong></td>

         <td align="center" class="font10">:</td>

         <td align="left" class="fontblue9"><?php

						if($selectedwaist<=38.00)

						{

							echo 'Waist up to 38.00" (No Extra Cost)';						

						}

						elseif(($selectedwaist>38.00)&&($selectedwaist<=44.00))

						{

							echo 'Waist over 38.00" to 44.00" (4.00 US $ Extra)';												

						}

						elseif(($selectedwaist>44.00)&&($selectedwaist<=50.00))

						{

							echo 'Waist over 44.00" to 50.00" (8.00 US $ Extra)';					

						}

						elseif($selectedwaist>50.00)

						{

								echo 'Waist over 50.00" (12 US $ Extra)';					

						}

						?></td>

         <td align="right" class="font10">

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

         <td align="right" class="font10">&nbsp;</td>

       </tr>        

        <tr>

          <td height="20" colspan="2" align="left" bgcolor="#E7AF78" class="red_font9"><a href="process.php?action=removefrommycart&cartid=<?php echo $rowsetselected["bill_selected_ID"];?>" class="red_font9" onClick="return confirm('Do you want to delete selected item from cart?')"><strong>Remove from cart</strong></a></td>

          <td align="right" bgcolor="#E7AF78" class="font10"><strong>Total :</strong></td>

          <td align="right" bgcolor="#E7AF78" class="font10"><strong><?php

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

          <td align="right"  bgcolor="#E7AF78"  class="font10">&nbsp;</td>

        </tr>

      </table></td>

  </tr>

  </table></td>

  </tr>

</table></td>

  </tr>

  

  <?php

  $totalamount=0;

  }

  ?>

  <?php

  if($py==1)

  {

  ?>

   

  <tr>

    <td width="40%" align="left">

     <?php

        if(mysql_num_rows($recordsetselected)<5)

	    {

		?>

    <a href="process.php?action=continueshopping"><img src="images/continueshopping.png" width="156" height="29" border="0" /></a>

  	<?php

	}

	?>	  	  </td>

    <td align="right" class="red_font9">

    <?php

        if(mysql_num_rows($recordsetselected)<=5)

	    {

		?>

    <input type="hidden" name="object" value="24" />

    <input type="hidden" name="method" value="cart" />

    <input name="submit" type="submit" class="titel" value="Proceed" />

    <?php

  }

  else

  {

  ?>

  <strong>Please remove <?php echo mysql_num_rows($recordsetselected)-5;?> item(s) from cart to proceed to payment.</strong>

  <?php

  }

  ?>    </td>

  </tr>

  <tr>

    <td colspan="2" align="left" class="font10">

      <?php

        if(mysql_num_rows($recordsetselected)<5)

	    {

		?>

      <span class="fontmaroon10"><strong>Order More Jeans & Get Benefit on Shipping</font></strong><br />

        <span class="fontmaroon10">Ordering more then one jeans in the same cart will reduce the cost of shipping per jeans. <br></span>

        You may order jeans for anyone in your family or your friend with your order in the same cart.<br>

        You can order up to 5 jeans per cart order.</span>

      <?php

		 }

		 ?>                  </td>

    </tr>

  

  



  <?php	 

  }

  else

  {

  ?>

   <tr>

    <td colspan="2" class="font10">Your cart is empty. <a href="customjeans.html"><strong class="red_font9">Click here</strong></a> to customize your jeans.</td>

  </tr>

  <?php

  }

  ?>

  </form>

</table>



    </td>

    <td width="10">&nbsp;</td>

  </tr>



</table>