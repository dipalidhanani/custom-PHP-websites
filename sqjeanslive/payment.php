<?php

require_once("include/files.php");

?>



<link href="css/home.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td class="titel_2"><strong>You Selected</strong></td>

            </tr>

          <tr>

            <td height="10"></td>

            </tr>

          </table></td>

        </tr>

      <?php

			  if(($_SESSION['cartno']=="")||($_SESSION['cartno']==0))

			  {

			  		echo "<script type=\"text/javascript\">document.location.href='index.php?object=2'; </script>\n";

			  }

			  

			  while(list($key,$proobj)=each($_SESSION['sqjeanscart']))

			  {

			  $totalamount=0;

			  ?>

      <tr>

        <td><table width="100%" border="0" background="images/pgbg02a.jpg" cellpadding="0" cellspacing="0" class="border3">

          <tr>

            <td class="font10">&nbsp;</td>

            <td width="25%" class="font10"><strong>Jeans For</strong></td>

            <td width="2%" align="center"class="font10">:</td>

            <td width="49%" class="fontblue9"><?php echo $proobj['thisjeansisfor'];?></td>

            <td align="right" class="font8">&nbsp;</td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Gender</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php echo $proobj['jeansgender'];?></td>

            <td align="right" class="font8">&nbsp;</td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td width="0%" class="font10">&nbsp;</td>

            <td class="font10"><strong>Fabric &amp; Wash</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

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

					echo $rowwash_treatment["material_name"]." - ".$rowwash_treatment["wash_treatment_name"];

					$materialamount=$rowwash_treatment["wash_treatment_price"];

					$totalamount=$totalamount+$materialamount;

				}

			}

			else

			{

				echo "No Material selected";

			}

			

			?></td>

            <td width="24%" align="right" class="font8">

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

		   ?>                    </td>

            <td width="0%" align="right" class="font8">&nbsp;</td>

            </tr>

          

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Special Wash</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM special_wash_master where special_wash_ID='".$proobj['selectedspecialwash']."' and special_wash_available=1";			

		  $recordsetspecial_wash = mysql_query($query);

		  if(mysql_num_rows($recordsetspecial_wash)!=0)

		  {	

			  while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))

			  {

					echo $rowspecial_wash["special_wash_name"];

					$washamount=$rowspecial_wash["special_wash_additional_charge"];

					$totalamount=$totalamount+$washamount;

			  }

		  }

		  else

		  {

		  		echo "No Special wash selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		   ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Main Thread</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$proobj['selectedthread_main']."'";			

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

            <td align="right" class="font8">&nbsp;</td>

            <td rowspan="2" align="right" valign="middle" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Second Thread</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$proobj['selectedthread_second']."'";			

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

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Front Pocket</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$proobj['selectedprocketstyle']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	



			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong> ".$rowpocket_style["pocket_style_name"];

					$pocketamount=$rowpocket_style["pocket_style_additional_charge"];

					$totalamount=$totalamount+$pocketamount;

			  }

		  }

		  else

		  {

		  		echo "No Front Pocket Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td rowspan="2" align="right" valign="middle" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Back Pocket</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$proobj['selectedprocketstyle_back']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	

			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong> ".$rowpocket_style["pocket_style_name"];

					$pocketamount_back=$rowpocket_style["pocket_style_additional_charge"];

					$totalamount=$totalamount+$pocketamount_back;

			  }

		  }

		  else

		  {

		  		echo "No Back Pocket Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Fly Style</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_ID='".$proobj['selectedflystyle']."'";			

		  $recordsetfly_style = mysql_query($query);

		  if(mysql_num_rows($recordsetfly_style)!=0)

		  {	

			  while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowfly_style["fly_style_name"];

					$zipamount=$rowfly_style["fly_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Fly Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>
            
            <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Buttons & Rivets </strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$proobj['selectedbuttonrivetsstyle']."'";			

		  $recordsetbuttonrivets = mysql_query($query);

		  if(mysql_num_rows($recordsetbuttonrivets)!=0)

		  {	

			  while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowbuttonrivets["buttonrivets_name"];

					$zipamount=$rowbuttonrivets["buttonrivets_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No buttonrivets Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>
            
            <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>belt Style</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_ID='".$proobj['selectedbeltstyle']."'";			

		  $recordsetbelt_style = mysql_query($query);

		  if(mysql_num_rows($recordsetbelt_style)!=0)

		  {	

			  while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowbelt_style["belt_style_name"];

					$zipamount=$rowbelt_style["belt_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No belt Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>
            
            <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>loops Style</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_ID='".$proobj['selectedloopsstyle']."'";			

		  $recordsetloops_style = mysql_query($query);

		  if(mysql_num_rows($recordsetloops_style)!=0)

		  {	

			  while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowloops_style["loops_style_name"];

					$zipamount=$rowloops_style["loops_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No loops Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>
            
            <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>embroidery Style</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php

          $query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_ID='".$proobj['selectedembroiderystyle']."'";			

		  $recordsetembroidery_style = mysql_query($query);

		  if(mysql_num_rows($recordsetembroidery_style)!=0)

		  {	

			  while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowembroidery_style["embroidery_style_name"];

					$zipamount=$rowembroidery_style["embroidery_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No embroidery Style selected";

		  }

		  ?></td>

            <td align="right" class="font8">

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

		  ?>                    </td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Measurement Type</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php				

				if($proobj['jeansselectedtype']==1)

				{

					echo "Make My Jeans";

				}

				elseif($proobj['jeansselectedtype']==2)

				{

					echo "Copy A Jeans";

				}

				?></td>

            <td align="right" class="font8">&nbsp;</td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <?php

				  if($proobj['jeansselectedtype']==1)

				  {

				  ?>

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Fitting Style</strong></td>

            <td align="center" class="font10">:</td>

            <td class="fontblue9"><?php echo $proobj['jeansfittingstyle'];?></td>

            <td align="right" class="font8">&nbsp;</td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          <?php

				  }

				  ?>

          <tr>

            <td class="font10">&nbsp;</td>

            <td height="25" colspan="3" class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border3">

              <tr>

                <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">

                  <?php

			 $md=0;

			 $m=1;

			 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID limit 4";			

			 $recordsetmeasurement = mysql_query($query);

			 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

			 {

			 $md++;

			 ?>

                  <tr>

                    <td class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                    <td width="45%" class="fontblue9"><?php echo $proobj["savemeasurement".$m];?></td>

                    </tr>

                  <?php			 

			 $m++;

			 }

			 ?>

                  </table></td>

                <td width="1%" valign="top">&nbsp;</td>

                <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">

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

                    <td class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                    <td width="45%" class="fontblue9"><?php echo $proobj["savemeasurement".$m];?></td>

                    </tr>

                  <?php			 

			 $m++;

			 }

			 ?>

                  </table></td>

                <td width="1%" valign="top">&nbsp;</td>

                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="1">

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

                    <td class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                    <td width="45%" class="fontblue9"><?php echo $proobj["savemeasurement".$m];?></td>

                    </tr>

                  <?php			 

			 $m++;

			 }

			 ?>

                  </table></td>

                </tr>

              </table></td>

            <td align="right" class="font8">&nbsp;</td>

            <td align="right" class="font8">&nbsp;</td>

            </tr>

          

          

          <tr>

            <td class="font10">&nbsp;</td>

            <td class="font10"><strong>Speical Note : </strong></td>

            <td align="center" class="font10">:</td>

            <td class="font10"><?php

                    echo $proobj['jeansspecialnote'];

					?></td>

            <td class="font10">&nbsp;</td>

            <td class="font10">&nbsp;</td>

          </tr>

          <tr>

            <td height="25" colspan="6" class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" >

              

              <tr>

                <td width="25%" align="left" class="font10"><strong>&nbsp;&nbsp;Extra Cost for large size</strong></td>

                <td width="2%" align="center" class="font10">:</td>

                <td align="left" class="fontblue9"><?php

						if($proobj["savemeasurement3"]<=38.00)

						{

							$extracost=0.00;

							$kg=1;

							$totalkg=$totalkg+$kg;

							echo 'Waist up to 38.00" (No Extra Cost)';						

						}

						elseif(($proobj["savemeasurement3"]>38.00)&&($proobj["savemeasurement3"]<=44.00))

						{

							$extracost=4.00;

							$kg=1;

							$totalkg=$totalkg+$kg;

							echo 'Waist over 38.00" to 44.00" (4.00 US $ Extra)';												

						}

						elseif(($proobj["savemeasurement3"]>44.00)&&($proobj["savemeasurement3"]<=50.00))

						{

							$extracost=8.00;	

							$kg=2;

							$totalkg=$totalkg+$kg;

							echo 'Waist over 44.00" to 50.00" (8.00 US $ Extra)';					

						}

						elseif($proobj["savemeasurement3"]>50.00)

						{

							$extracost=12.00;

							$kg=2;	

							$totalkg=$totalkg+$kg;

							echo 'Waist over 50.00" (12 US $ Extra)';					

						}

						?></td>

                <td width="24%" align="right" class="font10"><?php

					if($proobj["savemeasurement3"]<=38.00)

					{

						$extracost=0.00;	

						$kg=1;					

					}

					elseif(($proobj["savemeasurement3"]>38.00)&&($proobj["savemeasurement3"]<=44.00))

					{

						$extracost=4.00;

						$kg=1;						

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

					$totalamount=$totalamount+$extracost;

						

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

					?>                        </td>

                </tr>

              

              <tr>

                <td height="20" colspan="2" align="left" bgcolor="#E7AF78" class="font10">&nbsp;</td>

                <td width="49%" align="right" bgcolor="#E7AF78" class="font10"><strong>Total :</strong></td>

                <td align="right" class="font10" bgcolor="#E7AF78"><strong>

                  <?php

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

						?>

                  </strong></td>

                </tr>

              </table></td>

          </tr>

          

          </table></td>

        </tr>

      <tr>

        <td height="10"></td>

        </tr>

      <?php

		}

		?>

      

      <tr>

        <td><table width="100%" border="0"  background="images/pgbg02a.jpg"  cellpadding="0" cellspacing="0" class="border3" >

          <?php

			$disptes=0.00;

			$recordsetbill = mysql_query("select * from bill_master

								where bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);								

                                while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

                                {

								?>

          <tr>

            <td height="20" colspan="2" align="right" class="font10"><strong>Total Amount :</strong></td>

            <td width="25%" height="20" align="right" class="font10">

            <strong><?php 

			  $paymenttotalapp=$rowbill["bill_total_amount"]+$rowbill["bill_extra_amount"];

			  			  

			 		    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";
							$disptes=$paymenttotalapp;
							printf("%.2f",$paymenttotalapp);

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";
							$disptes=($paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);
							printf("%.2f",$paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";
							$disptes=($paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);
							printf("%.2f",$paymenttotalapp*$_SESSION["currentselectedcurrencyamount"]);

						}

						

						

			  ?></strong></td>

            </tr>

       <?php

			if($rowbill["bill_total_discount"]!=0.00)

			{

			?>

      <tr>

        <td height="20" align="left" class="font10">&nbsp;</td>

        <td height="20" align="right" class="font10"><strong>- Total Discount (Exclude Shipping) :</strong></td>

        <td height="20" align="right" class="font10">

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

        <td height="20" align="left" class="font10">&nbsp;</td>

        <td height="20" align="right" class="font10"><strong>Total :</strong></td>

        <td height="20" align="right" class="font10">

          <strong><?php 
		  
		 $totpay=$disptes-$discountamt;

			  			if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

						{

							echo "$ ";

							echo $totpay;

						}

						if($_SESSION["currentselectedcurrency"]=="INR")

						{

							echo "Rs. ";

							echo $totpay;

						}

						if($_SESSION["currentselectedcurrency"]=="EUR")

						{

							echo "&euro; ";

							echo $totpay;

						}

			  ?></strong>              </td>

        </tr>
      <tr>

        <td height="20" colspan="2" align="right" class="font10"><strong>+  Shipping to <?php 

			  $recordsetshipping = mysql_query("select * from bill_shipping_address

						INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 						where bill_master.bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);

						$catc=1;

                        while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))

                        {

							$shippingcountry=$rowshipping["shipping_user_country"];

			  				echo $shippingcountry;

			  			}

			  ?> (<?php echo $totalkg." kg"; ?>) :</strong></td>

        <td height="20" align="right" class="font10">

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

        <td height="20" align="left" class="font10">&nbsp;</td>

        <td height="20" align="right" class="font10"><strong>Final Payable Amount :</strong></td>

        <td height="20" align="right" class="font10">

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

          <td width="10" height="10"></td>

        </tr>

        <tr>

          <td><table width="100%" border="0" background="images/pgbg02a.jpg" cellspacing="0" cellpadding="0" >

              

              <tr>

                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border3">

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">

                      <tr>

                        <td width="50%" valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="0">

                          <?php

                       

								$recordsetbilling = mysql_query("select * from bill_billing_address

								INNER JOIN bill_master ON bill_master.bill_master_ID=bill_billing_address.billing_bill_master_ID							 

								where bill_master.bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);

								$catc=1;

                                while($rowbilling = mysql_fetch_array($recordsetbilling,MYSQL_ASSOC))

                                {

                                ?>

                          <tr>

                            <td colspan="3" align="left" valign="top" class="font9" ><span class="font10"><strong>Your Billing Address</strong></span></td>

                            </tr>

                          <tr>

                            <td width="35%" align="right" valign="top" class="font9" >Name</td>

                            <td class="font9"><strong>:</strong></td>

                            <td width="64%" class="font9"><strong>

                              <?php  echo $rowbilling["billing_user_first_name"];?>

                              &nbsp;<?php  echo $rowbilling["billing_user_last_name"];?>

                            </strong></td>

                          </tr>

                          

                          <tr>

                            <td align="right" valign="top" class="font9" >Address </td>

                            <td class="font9">:</td>

                            <td class="font9"><?php  echo $rowbilling["billing_user_address"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" ></td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowbilling["billing_user_address_2"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top" class="font9" >City &amp; Post Code</td>

                            <td class="font9">:</td>

                            <td class="font9"><?php  echo $rowbilling["billing_user_city"];?> <?php  echo $rowbilling["billing_user_pincode"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" >State</td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowbilling["billing_user_state"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" >Country </td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowbilling["billing_user_country"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top" class="font9" >Email Address </td>

                            <td width="1%" class="font9">:</td>

                            <td class="font9"><?php  echo $rowbilling["billing_user_email"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" > Mobile / Phone</td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowbilling["billing_user_mobile"];?>

                              <?php  echo $rowbilling["billing_user_phone"];?></td>

                          </tr>

                          

                          <?php

				}

				?>

                        </table></td>

                        <td width="10" valign="top">&nbsp;</td>

                        <td valign="top"><table width="100%" border="0" cellpadding="1" cellspacing="0">

                          <?php

                       $recordsetshipping = mysql_query("select * from bill_shipping_address

						INNER JOIN bill_master ON bill_master.bill_master_ID=bill_shipping_address.shipping_bill_master_ID							 						where bill_master.bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);

						$catc=1;

                        while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))

                        {

						$shippingcountry=$rowshipping["shipping_user_country"];

                        ?>

                          <tr>

                            <td colspan="3" align="left" valign="top" class="font9" ><span class="font10"><strong>Your Shipping Address</strong></span></td>

                            </tr>

                          <tr>

                            <td width="40%" align="right" valign="top" class="font9" >Name</td>

                            <td class="font9"><strong>:</strong></td>

                            <td width="64%" class="font9"><strong>

                              <?php  echo $rowshipping["shipping_user_first_name"];?>

                              &nbsp;<?php  echo $rowshipping["shipping_user_last_name"];?>

                            </strong></td>

                          </tr>

                          

                          <tr>

                            <td align="right" valign="top" class="font9" >Address </td>

                            <td class="font9">:</td>

                            <td class="font9"><?php  echo $rowshipping["shipping_user_address"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" ></td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowshipping["shipping_user_address_2"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top" class="font9" >City &amp; Post Code</td>

                            <td class="font9">:</td>

                            <td class="font9"><?php  echo $rowshipping["shipping_user_city"];?> <?php  echo $rowshipping["shipping_user_pincode"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" >State</td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowshipping["shipping_user_state"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" >Country </td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowshipping["shipping_user_country"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top" class="font9" >Email Address </td>

                            <td width="1%" class="font9">:</td>

                            <td class="font9"><?php  echo $rowshipping["shipping_user_email"];?></td>

                          </tr>

                          <tr>

                            <td align="right" valign="top"  class="font9" > Mobile / Phone</td>

                            <td  class="font9">:</td>

                            <td  class="font9"><?php  echo $rowshipping["shipping_user_mobile"];?>

                              <?php  echo $rowshipping["shipping_user_phone"];?></td>

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

              

              <tr>

                <td height="10" ></td>

              </tr>

              <tr>

                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border3">

                  <tr>

                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0">

                      <tr>

                        <td class="font10" ><strong>Your Billing Details</strong></td>

                      </tr>

                    </table></td>

                  </tr>

                  <?php

             $recordsetbill = mysql_query("select * from bill_master where bill_invoice_no='".$_SESSION["sqjeansorderid"]."'",$cn);

			while($rowbill = mysql_fetch_array($recordsetbill,MYSQL_ASSOC))

            {

             ?>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="1">

                      <tr>

                        <td width="15%" class="font9">Name :</td>

                        <td width="35%" align="left" class="font9"><?php echo $rowbill["bill_name_user"];?></td>

                        <td width="30%" align="right" class="font9">Date :</td>

                        <td width="20%" align="left" class="font9"><?php

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

						?></td>

                      </tr>

                      <tr>

                        <td class="font9">Invoice No :</td>

                        <td align="left" class="font9"><?php echo $rowbill["bill_invoice_no"];?></td>

                        <td align="right" class="font9"><strong>Amount : </strong></td>

                        <td align="left" class="font9"><?php 

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

			  ?></td>

                      </tr>

                    </table></td>

                  </tr>

                  <?php

			  $invoicenumberpaypal=$rowbill["bill_invoice_no"];

			  $billamountpaypal=$rowbill["bill_final_amount"];

			}

			?>

                </table></td>

              </tr>

          </table></td>

        </tr>



        <tr>

          <td align="left" height="10"></td>

        </tr>

          <?php

		  if($shippingcountry=="India")

		  {

		  ?>

                <script language="JavaScript">

					function showpaypal()

					{

						document.getElementById('payment_paypal').style.display = '';

						document.getElementById('payment_netbanking').style.display = 'none';

						document.getElementById('payment_chequedeposite').style.display = 'none';

						document.getElementById('payment_cashdeposite').style.display = 'none';

						document.getElementById('payment_demanddraft').style.display = 'none';

					}

					function shownetbanking()

					{

						document.getElementById('payment_paypal').style.display = 'none';

						document.getElementById('payment_netbanking').style.display = '';

						document.getElementById('payment_chequedeposite').style.display = 'none';

						document.getElementById('payment_cashdeposite').style.display = 'none';

						document.getElementById('payment_demanddraft').style.display = 'none';

					}

					function showcheque()

					{

						document.getElementById('payment_paypal').style.display = 'none';

						document.getElementById('payment_netbanking').style.display = 'none';

						document.getElementById('payment_chequedeposite').style.display = '';

						document.getElementById('payment_cashdeposite').style.display = 'none';

						document.getElementById('payment_demanddraft').style.display = 'none';

					}

					function showcash()

					{

						document.getElementById('payment_paypal').style.display = 'none';

						document.getElementById('payment_netbanking').style.display = 'none';

						document.getElementById('payment_chequedeposite').style.display = 'none';

						document.getElementById('payment_cashdeposite').style.display = '';

						document.getElementById('payment_demanddraft').style.display = 'none';

					}

					function showdemanddraft()

					{

						document.getElementById('payment_paypal').style.display = 'none';

						document.getElementById('payment_netbanking').style.display = 'none';

						document.getElementById('payment_chequedeposite').style.display = 'none';

						document.getElementById('payment_cashdeposite').style.display = 'none';

						document.getElementById('payment_demanddraft').style.display = '';

					}

			    </script>

        <?php

		}

		?>

        <tr>

          <td align="center" class="font11"><strong>Payment Options</strong><br>

          <input type="radio" name="paymentoption" checked="checked" value="paypal" <?php if($shippingcountry=="India") { ?> onclick="javascript:showpaypal();" <?php } ?>/> Paypal&nbsp;&nbsp;&nbsp;

          <?php

		  if($shippingcountry=="India")

		  {

		  ?>

          <input type="radio" name="paymentoption" value="netbanking" onclick="javascript:shownetbanking();"/> Net Banking &nbsp;&nbsp;&nbsp;

          <input type="radio" name="paymentoption" value="cheque" onclick="javascript:showcheque();"/> Cheque &nbsp;&nbsp;&nbsp;

          <input type="radio" name="paymentoption" value="cash" onclick="javascript:showcash();"/> Cash &nbsp;&nbsp;&nbsp;

          <input type="radio" name="paymentoption" value="demanddraft" onclick="javascript:showdemanddraft();"/> Demand Draft&nbsp;&nbsp;&nbsp;

          <?php

		  }

		  ?>          </td>

        </tr>

        <tr>

          <td align="left" height="10"></td>

        </tr>

        

         <tr id="payment_paypal">

          <td align="left">

                <table width="100%" table height="250" border="0" background="images/pgbg02a.jpg" class="border3" cellspacing="0" cellpadding="5">

          <tr>

                      <td align="center" class="font10">By Clicking <strong>Pay Now</strong>, I agree with <a href="index.php?object=6" target="_blank"><strong style="text-decoration:underline;">Terms &amp; Conditions</strong></a> of SQ Jeans</td>

                  </tr>

          <tr>

          <td align="center">          

           <form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="form" >

          <input type="hidden" name="cmd" value="_xclick">			

          <input type="hidden" name="amount" value="<?php printf("%.2f",$billamountpaypal); ?>">

          <input type="hidden" name="tax" value="0">

          <input type="hidden" name="quantity" value="1">

          <input type="hidden" name="no_note" value="1">

          <input type="hidden" name="currency_code" value="USD"> 

          <input type="hidden" name="business" value="sqjeans@yahoo.com">

          <input type="hidden" name="item_name" value="SQ Jeans">

          <input type="hidden" name="item_numbers" value="Custom Made Jeans">		

          <input type="hidden" name="invoice"  value="<?php echo $invoicenumberpaypal;?>">				

          <input name="notify_url" type="hidden" value="http://www.sqjeans.com/index.php?object=26"/>

          <input name="return" type="hidden" value="http://www.sqjeans.com/index.php?object=8"/>

          <input name="cancel_return" type="hidden" value="http://www.sqjeans.com/index.php?object=7"/> 

          <input type="image" name="submit" src="images/paypal.gif" />

        </form>          </td>

        </tr>

        

                 <tr>

                   <td align="center" class="font9">Make payments direct to our PayPal account of  SQ Jeans, using your local credit card (Visa, MasterCard, American Express, Discover and PayPal).</td>

                 </tr>

        <tr>

          <td align="center" height="10"></td>

        </tr>

        <tr>

          <td align="left" class="fontred12"><strong>Important Note :</strong></td>

        </tr>

        <tr>

          <td align="left" class="fontred10">Your local currency will be reflected to your credit card statement instead of US$<br />After you make the payment please wait for the payment gateway to automatically return to our website and give you an order number, this is very important.<br />Duplicate payments if any are automatically cancelled/refunded.</td>

        </tr>

        <tr>

          <td align="left" class="fontred10">&nbsp;</td>

        </tr>

        <tr>

          <td align="left" class="fontred10">&nbsp;</td>

        </tr>

           </table>          </td>

         </tr>

       <tr id="payment_netbanking" style="display:none;">

          <td align="left">

                <table width="100%" table height="250" border="0" background="images/pgbg02a.jpg" class="border3" cellspacing="0" cellpadding="5">

                    <form name="formnetbanking" method="post" action="paymentdone.php">

                    <tr>

                      <td align="center" class="font10">Enter your Bank Name : 

                      <input name="netbankingname" type="text" class="font8" size="45" /></td>

                    </tr>

                    <tr>

                      <td align="center" class="font10">By Clicking <strong>Order Now</strong>, I agree with <a href="index.php?object=6" target="_blank"><strong style="text-decoration:underline;">Terms &amp; Conditions</strong></a> of SQ Jeans</td>

                    </tr>

                    <tr>

                      <td align="center" class="font10">

                      <input type="hidden" name="paymenttype" value="1" />

                      <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />

                      <input type="submit" name="submit" value="Order Now" /></td>

                    </tr>

                    <tr>

                      <td align="left" class="font10">Payments through net-banking using your debit card or through internet accessible bank account in India to our account S Q Jeans.</td>

                    </tr>

                    <tr>

                      <td colspan="3" align="left" class="font10">For bank details, <a href="index.php?object=30" target="_blank"><strong style="text-decoration:underline;">Click here</strong></a></td>

                    </tr>

                    </form>

          </table>          </td>

      </tr> 

      <tr id="payment_chequedeposite" style="display:none;">

          <td align="left">

                <table width="100%" table height="250" border="0" background="images/pgbg02a.jpg" class="border3"cellspacing="0" cellpadding="5">

                <form name="formnetbanking" method="post" action="paymentdone.php">

                <tr>

                  <td width="35%" align="right" class="font10">Enter your Bank Name </td>

                  <td width="1%" align="center" class="font10">:</td>

                  <td align="left" class="font10"><input name="chequebankname" type="text" class="font8" size="45" /></td>

                </tr>

                <tr>

                  <td align="right" class="font10">Cheque Number</td>

                  <td align="center" class="font10">:</td>

                  <td align="left" class="font10"><input name="chequenumber" type="text" class="font8" size="30" /></td>

                </tr>

                <tr>

                  <td align="right" class="font10">Cheque Date</td>

                  <td align="center" class="font10">:</td>

                  <td align="left" class="font10"><input name="chequedate" type="text" class="font8" size="25" /> 

                    (dd-mm-yyyy)</td>

                </tr>

                                

                <tr>

                  <td colspan="3" align="center" class="font10">By Clicking <strong>Order Now</strong>, I agree with <a href="index.php?object=6" target="_blank"><strong style="text-decoration:underline;">Terms &amp; Conditions</strong></a> of SQ Jeans</td>

                </tr>

                <tr>

                  <td colspan="3" align="center" class="font10">

                  <input type="hidden" name="paymenttype" value="2" />

                  <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />

                  <input type="submit" name="submit" value="Order Now" /></td>

                </tr>

                <tr>

                  <td colspan="3" align="left" class="font10">Send a Cheque to our mailing address or deposit it at any branch of AXIS Bank all over India nearby you in favor of our account S Q Jeans. This option can be used by Indian customers only</td>

                </tr>

                <tr>

                  <td colspan="3" align="left" class="font10">For bank details, <a href="index.php?object=30" target="_blank"><strong style="text-decoration:underline;">Click here</strong></a></td>

                </tr>

                </form>

          </table>          </td>

      </tr>

      <tr id="payment_cashdeposite" style="display:none;">

          <td align="left">

                <table width="100%" table height="250" border="0" background="images/pgbg02a.jpg" class="border3"cellspacing="0" cellpadding="5">

                <form name="formnetbanking" method="post" action="paymentdone.php">

                <tr>

                  <td align="left" class="font10">You can deposit money at any branch of AXIS Bank all over India nearby you in favor of our account SQ Jeans (Surat). Send us a scanned copy of cash deposit receipt to our E-mail address with your Order Number.</td>

                </tr>

                <tr>

                  <td align="center" class="font10">By Clicking <strong>Order Now</strong>, I agree with <a href="index.php?object=6" target="_blank"><strong style="text-decoration:underline;">Terms &amp; Conditions</strong></a> of SQ Jeans</td>

                </tr>

                <tr>

                  <td align="center" class="font10">

                  <input type="hidden" name="paymenttype" value="3" />

                  <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />

                  <input type="submit" name="submit" value="Order Now" /></td>

                </tr>

                <tr>

                  <td colspan="3" align="left" class="font10">For bank details, <a href="index.php?object=30" target="_blank"><strong style="text-decoration:underline;">Click here</strong></a></td>

                </tr>

                </form>

          </table>          </td>

      </tr>

      <tr id="payment_demanddraft" style="display:none;">

          <td align="left">

                <table width="100%" table height="250" border="0" background="images/pgbg02a.jpg" class="border3"cellspacing="0" cellpadding="5">

                <form name="formnetbanking" method="post" action="paymentdone.php">

                <tr>

                  <td width="35%" align="right" class="font9">Enter your Bank Name                  </td>

                  <td width="1%" align="center" class="font9">:</td>

                  <td align="left" class="font9"><input name="demanddraftbankname" type="text" class="font8" size="45" /></td>

                </tr>

                <tr>

                  <td align="right" class="font9">Demand Draft Number</td>

                  <td align="center" class="font9">:</td>

                  <td align="left" class="font9"><input name="demanddraftnumber" type="text" class="font8" size="30" /></td>

                </tr>

                <tr>

                  <td align="right" class="font9">Demand Draft Date</td>

                  <td align="center" class="font9">:</td>

                  <td align="left" class="font9"><input name="demanddraftdate" type="text" class="font8" size="30" /> 

                  (dd-mm-yyyy)</td>

                </tr>

                <tr>

                  <td colspan="3" align="center" class="font10">By Clicking <strong>Order Now</strong>, I agree with <a href="index.php?object=6" target="_blank"><strong style="text-decoration:underline;">Terms &amp; Conditions</strong></a> of SQ Jeans</td>

                </tr>

                <tr>

                  <td colspan="3" align="center" class="font10">

                  <input type="hidden" name="paymenttype" value="4" />

                  <input type="hidden" name="invoiceno" value="<?php echo $invoicenumberpaypal;?>" />

                  <input type="submit" name="submit" value="Order Now" /></td>

                </tr>

                <tr>

                  <td colspan="3" align="left" class="font10">Send a demand draft in favor of our account S Q Jeans (Surat) with your order number. We will inform you after clearing your demand draft and after that we will start to process your order. This option can be used by Indian customers only.</td>

                </tr>

                <tr>

                  <td colspan="3" align="left" class="font10">For bank details, <a href="index.php?object=30" target="_blank"><strong style="text-decoration:underline;">Click here</strong></a></td>

                </tr>

                </form>

          </table>          </td>

      </tr>



    </table></td>

<td width="10" valign="top">&nbsp;</td>

  </tr>

</table>



