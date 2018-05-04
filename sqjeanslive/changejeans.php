<link href="css/home.css" rel="stylesheet" type="text/css" />

<?php

require_once("include/files.php");



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

						 

		$selectedthisjeansfor=$proobj['thisjeansisfor'];

		$selectedthisjeansgender=$proobj['jeansgender'];

		$selectedthisjeansspecialnote=$proobj['jeansspecialnote'];

	}

	$r++;	

}

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

 <form name="nextstepform" method="get" action="process.php">

  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td class="titel_2"><h1>Custom Jeans</h1></td>

              </tr>

              <tr>

                <td height="10"></td>

              </tr>

          <?php

		  if($_REQUEST["action"]=="material")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td height="30" class="titel"><h3>Change your Fabric</h3></td>

              </tr>

              <tr>

                <td height="10"></td>

              </tr>

              <?php
$display_order_for=$_SESSION["display_order_for"];
if($display_order_for==1){
			 $query="SELECT * FROM material_master where material_available=1 and (fabric_for='".$_SESSION['fabric_for']."' or fabric_for=3) order by material_display_order_men asc";		
}
if($display_order_for==2){
			 $query="SELECT * FROM material_master where material_available=1 and (fabric_for='".$_SESSION['fabric_for']."' or fabric_for=3) order by material_display_order_women asc";		
}


			 $recordsetmaterial = mysql_query($query);

			 while($rowmaterial = mysql_fetch_array($recordsetmaterial,MYSQL_ASSOC))

			 {

					 

			 ?>

              <tr>

                <td align="left"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="0" cellspacing="0"  class="border3">

                    <tr>

                      <td height="30" class="font10"><b><?php echo $rowmaterial["material_name"];?></b></td>

                      </tr>

                       <tr>

                      <td class="font9"><?php echo $rowmaterial["material_desc"];?></td>

                      </tr>

                    <tr>

                      <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                        <tr>

                          <?php

							 $wt=0;	

							 $query="SELECT * FROM material_wash_treatment_relation

							 INNER JOIN wash_treatment_master ON 

							 wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID

							 where 

							 material_wash_treatment_relation.material_master_ID='".$rowmaterial["material_ID"]."' and

							 material_wash_treatment_relation.wash_treatment_available=1 and

							 wash_treatment_master.wash_treatment_active_status=1

							 order by wash_treatment_master.wash_treatment_ID";			

							 $recordsetwash_treatment = mysql_query($query);				

							 while($rowwash_treatment = mysql_fetch_array($recordsetwash_treatment,MYSQL_ASSOC))

							 {

							 $wt++;

							 ?>

                          <td><table border="0" cellspacing="0" cellpadding="0">

                            <tr>

                              <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                                <tr>

                                  <td height="25" align="center" class="font9"><?php echo $rowwash_treatment["wash_treatment_name"];?></td>

                                  </tr>

                                <tr>

                                  <td height="110" align="center" valign="middle"><a href="images/washtreatments/<?php echo $rowwash_treatment["wash_treatment_image"];?>" rel="lightbox" title="<?php echo $rowwash_treatment["wash_treatment_name"]; echo "<br/>"; echo displayeditorvalue($rowwash_treatment["wash_treatment_description"]);?>"><img src="images/washtreatments/wt<?php echo $rowwash_treatment["wash_treatment_image"];?>" alt="<?php echo $rowwash_treatment["wash_treatment_name"];?>" title="<?php echo $rowwash_treatment["wash_treatment_name"];?>" border="0" /></a></td>

                                  </tr>

                                

                                  <tr>

                                  <td height="25" align="center" class="font9">

								  <?php

								 	if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

									{

										echo "$ ";

										printf("%.2f",$rowwash_treatment["wash_treatment_price"]);

									}

									if($_SESSION["currentselectedcurrency"]=="INR")

									{

										echo "INR ";

										printf("%.2f",$rowwash_treatment["wash_treatment_price"]*$_SESSION["currentselectedcurrencyamount"]);

									}

									if($_SESSION["currentselectedcurrency"]=="EUR")

									{

										echo "&euro; ";

										printf("%.2f",$rowwash_treatment["wash_treatment_price"]*$_SESSION["currentselectedcurrencyamount"]);

									}?></td>

                                  </tr>

                                <tr>

                                  <td align="center"><input type="radio" name="selectedmatirial" id="selectedmatirial" value="<?php echo $rowwash_treatment["mw_realtion_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($selectedmaterialforthisjeans==$rowwash_treatment["mw_realtion_ID"]) { ?> checked="checked" <?php } ?>/></td>

                                  </tr>

                                </table></td>

                              <td width="10" align="center" valign="top">&nbsp;</td>

                              </tr>

                            </table></td>

                          <?php

							 if(($wt%5)==0)

							 {

							 ?>

                          </tr>

                        <?php

							}

							}

							?>

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

          </table></td>

        </tr>

          

        <?php

		}

		?>

        <?php

		  if($_REQUEST["action"]=="specialwash")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td height="30" class="titel"><h3>Change Special Wash</h3></td>

              </tr>

              <tr>

                <td height="10"></td>

              </tr>

            

              <tr>

                <td align="left"><table width="100%" background="images/pgbg02a.jpg"  border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $sp=0;	

							 $query="SELECT * FROM special_wash_master where special_wash_available=1 order by special_wash_display_order";			

							 $recordsetspecial_wash = mysql_query($query);

							 while($rowspecial_wash = mysql_fetch_array($recordsetspecial_wash,MYSQL_ASSOC))

							 {	

							 $sp++;

							 ?>

                      <td><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowspecial_wash["special_wash_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/specialwash/<?php echo $rowspecial_wash["special_wash_image"];?>" rel="lightbox" title="<?php echo $rowspecial_wash["special_wash_name"];?>"><img src="images/specialwash/p<?php echo $rowspecial_wash["special_wash_image"];?>" alt="<?php echo $rowspecial_wash["special_wash_name"];?>" title="<?php echo $rowspecial_wash["special_wash_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							 		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

									{

										echo "$ ";

										printf("%.2f",$rowspecial_wash["special_wash_additional_charge"]);

									}

									if($_SESSION["currentselectedcurrency"]=="INR")

									{

										echo "INR ";

										printf("%.2f",$rowspecial_wash["special_wash_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

									}

									if($_SESSION["currentselectedcurrency"]=="EUR")

									{

										echo "&euro; ";

										printf("%.2f",$rowspecial_wash["special_wash_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

									}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedspecialwash" id="selectedspecialwash" value="<?php echo $rowspecial_wash["special_wash_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedspecialwashforthisjeans==$rowspecial_wash["special_wash_ID"])||($rowspecial_wash["special_wash_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($sp%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                </tr>

              </table></td>

              </tr>              

              <tr>

                <td height="10"></td>

              </tr>

                           

          </table></td>

        </tr>

          

        <?php

		}

		?>

        <?php

		  if($_REQUEST["action"]=="thread")

		  {

		  ?>

<script language="javascript">

function check_thread() 

{



	with(document.nextstepform)

    {

		for (i=0; i<document.nextstepform.selectedthread_main.length; i++)

		{

			if (document.nextstepform.selectedthread_main[i].checked==true)

			 {

					checkp =document.nextstepform.selectedthread_second[i].checked=true;

			 }

		}

	}

}

</script>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border2">

                  <tr>

                    <td class="titel"><h3>Change Thread color(s)</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellpadding="5" cellspacing="0">

                <tr>

                  <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <?php

							 $tc=0;	

							  $query="SELECT * FROM thread_master where thread_available=1 order by thread_display_order";			

							  $recordsetthread = mysql_query($query);

							  while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))

							  {	

							  $tc++;

							 ?>

                      <td><table border="0" align="left" cellpadding="0" cellspacing="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><b><?php echo $rowthread["thread_name"];?></b></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/threads/<?php echo $rowthread["thread_image"];?>" rel="lightbox" title="<?php echo $rowthread["thread_name"];?>"><img src="images/threads/t<?php echo $rowthread["thread_image"];?>" alt="<?php echo $rowthread["thread_name"];?>" title="<?php echo $rowthread["thread_name"];?>" border="0" /></a></td>

                              </tr>

                            

                            <tr>

                              <td align="left" class="font9"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                  <td height="25" valign="middle"><input type="radio" name="selectedthread_main" id="selectedthread_main" value="<?php echo $rowthread["thread_ID"];?>" onclick="check_thread('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($selectedthreadmainforthisjeans==$rowthread["thread_ID"]) { ?> checked="checked" <?php } ?>/></td>

                                  <td height="25" valign="middle">Main Thread </td>

                                  </tr>

                                <tr>

                                  <td height="25" valign="middle"><input type="radio" name="selectedthread_second" id="selectedthread_second" value="<?php echo $rowthread["thread_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($selectedthreadsecondforthisjeans==$rowthread["thread_ID"]) { ?> checked="checked" <?php } ?>/></td>

                                  <td height="25" valign="middle">Second Thread</td>

                                  </tr>

                                </table></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($tc%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

                </table></td>

        </tr>

          

        <?php

		}

		?>

        <?php

		  if($_REQUEST["action"]=="pocketstyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border2">

                  <tr>

                    <td class="titel"><h3>Change Front pocket style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellpadding="5" cellspacing="0">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $ps=0;	

							 $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=1 order by pocket_style_display_order";			

							 $recordsetpocket_style = mysql_query($query);

							 while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

							 {	

							 $ps++;

							 ?>

                      <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowpocket_style["pocket_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/pocketstyles/<?php echo $rowpocket_style["pocket_style_image"];?>" rel="lightbox" title="<?php echo $rowpocket_style["pocket_style_name"];?>"><img src="images/pocketstyles/p<?php echo $rowpocket_style["pocket_style_image"];?>" alt="<?php echo $rowpocket_style["pocket_style_name"];?>" title="<?php echo $rowpocket_style["pocket_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedprocketstyle" id="selectedprocketstyle" value="<?php echo $rowpocket_style["pocket_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedpocketstyleforthisjeans==$rowpocket_style["pocket_style_ID"])||($rowpocket_style["pocket_style_default"]==1)){ ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($ps%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

        <tr>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border2">

                  <tr>

                    <td class="titel"><h3>Change Back pocket style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellpadding="5" cellspacing="0">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $ps=0;	

							 $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=2 order by pocket_style_display_order";			

							 $recordsetpocket_style = mysql_query($query);

							 while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

							 {	

							 $ps++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowpocket_style["pocket_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/pocketstyles/<?php echo $rowpocket_style["pocket_style_image"];?>" rel="lightbox" title="<?php echo $rowpocket_style["pocket_style_name"];?>"><img src="images/pocketstyles/p<?php echo $rowpocket_style["pocket_style_image"];?>" alt="<?php echo $rowpocket_style["pocket_style_name"];?>" title="<?php echo $rowpocket_style["pocket_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowpocket_style["pocket_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                            </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedprocketstyle_back" id="selectedprocketstyle_back" value="<?php echo $rowpocket_style["pocket_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedpocketstylebackforthisjeans==$rowpocket_style["pocket_style_ID"])||($rowpocket_style["pocket_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($ps%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

        <?php

		  if($_REQUEST["action"]=="flystyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0"  >

                  <tr>

                    <td class="titel"><h3>Change fly style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0" class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM fly_style_master where fly_style_available=1 order by fly_style_order";			

							 $recordsetfly_style = mysql_query($query);

							 while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowfly_style["fly_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/flystyles/<?php echo $rowfly_style["fly_style_image"];?>" rel="lightbox" title="<?php echo $rowfly_style["fly_style_name"];?>"><img src="images/flystyles/p<?php echo $rowfly_style["fly_style_image"];?>" alt="<?php echo $rowfly_style["fly_style_name"];?>" title="<?php echo $rowfly_style["fly_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowfly_style["fly_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowfly_style["fly_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowfly_style["fly_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedflystyle" id="selectedflystyle" value="<?php echo $rowfly_style["fly_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedflystyleforthisjeans==$rowfly_style["fly_style_ID"])||($rowfly_style["fly_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($fs%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

<?php

		  if($_REQUEST["action"]=="buttonrivetsstyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0"  >

                  <tr>

                    <td class="titel"><h3>Change Buttons & Rivets </h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0" class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 order by buttonrivets_order";			

							 $recordsetbuttonrivets_style = mysql_query($query);

							 while($rowbuttonrivets_style = mysql_fetch_array($recordsetbuttonrivets_style,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowbuttonrivets_style["buttonrivets_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/buttonrivets/<?php echo $rowbuttonrivets_style["buttonrivets_image"];?>" rel="lightbox" title="<?php echo $rowbuttonrivets_style["buttonrivets_name"];?>"><img src="images/buttonrivets/p<?php echo $rowbuttonrivets_style["buttonrivets_image"];?>" alt="<?php echo $rowbuttonrivets_style["buttonrivets_name"];?>" title="<?php echo $rowbuttonrivets_style["buttonrivets_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowbuttonrivets_style["buttonrivets_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowbuttonrivets_style["buttonrivets_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowbuttonrivets_style["buttonrivets_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedbuttonrivetsstyle" id="selectedbuttonrivetsstyle" value="<?php echo $rowbuttonrivets_style["buttonrivets_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedbuttonrivetsstyleforthisjeans==$rowbuttonrivets_style["buttonrivets_ID"])||($rowbuttonrivets_style["buttonrivets_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($fs%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

<?php

		  if($_REQUEST["action"]=="beltstyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0"  >

                  <tr>

                    <td class="titel"><h3>Change belt style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0" class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM belt_style_master where belt_style_available=1 order by belt_style_order";			

							 $recordsetbelt_style = mysql_query($query);

							 while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowbelt_style["belt_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/beltstyles/<?php echo $rowbelt_style["belt_style_image"];?>" rel="lightbox" title="<?php echo $rowbelt_style["belt_style_name"];?>"><img src="images/beltstyles/p<?php echo $rowbelt_style["belt_style_image"];?>" alt="<?php echo $rowbelt_style["belt_style_name"];?>" title="<?php echo $rowbelt_style["belt_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowbelt_style["belt_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowbelt_style["belt_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowbelt_style["belt_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedbeltstyle" id="selectedbeltstyle" value="<?php echo $rowbelt_style["belt_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedbeltstyleforthisjeans==$rowbelt_style["belt_style_ID"])||($rowbelt_style["belt_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($fs%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

<?php

		  if($_REQUEST["action"]=="loopsstyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0"  >

                  <tr>

                    <td class="titel"><h3>Change loops style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0" class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM loops_style_master where loops_style_available=1 order by loops_style_order";			

							 $recordsetloops_style = mysql_query($query);

							 while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowloops_style["loops_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/loopsstyles/<?php echo $rowloops_style["loops_style_image"];?>" rel="lightbox" title="<?php echo $rowloops_style["loops_style_name"];?>"><img src="images/loopsstyles/p<?php echo $rowloops_style["loops_style_image"];?>" alt="<?php echo $rowloops_style["loops_style_name"];?>" title="<?php echo $rowloops_style["loops_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowloops_style["loops_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowloops_style["loops_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowloops_style["loops_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedloopsstyle" id="selectedloopsstyle" value="<?php echo $rowloops_style["loops_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedloopsstyleforthisjeans==$rowloops_style["loops_style_ID"])||($rowloops_style["loops_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($fs%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

<?php

		  if($_REQUEST["action"]=="embroiderystyle")

		  {

		  ?>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0"  >

                  <tr>

                    <td class="titel"><h3>Change embroidery style</h3></td>

                  </tr>

                  <tr>

                    <td align="center"><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0" class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 order by embroidery_style_order";			

							 $recordsetembroidery_style = mysql_query($query);

							 while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowembroidery_style["embroidery_style_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/embroiderystyles/<?php echo $rowembroidery_style["embroidery_style_image"];?>" rel="lightbox" title="<?php echo $rowembroidery_style["embroidery_style_name"];?>"><img src="images/embroiderystyles/p<?php echo $rowembroidery_style["embroidery_style_image"];?>" alt="<?php echo $rowembroidery_style["embroidery_style_name"];?>" title="<?php echo $rowembroidery_style["embroidery_style_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowembroidery_style["embroidery_style_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowembroidery_style["embroidery_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowembroidery_style["embroidery_style_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedembroiderystyle" id="selectedembroiderystyle" value="<?php echo $rowembroidery_style["embroidery_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($selectedembroiderystyleforthisjeans==$rowembroidery_style["embroidery_style_ID"])||($rowembroidery_style["embroidery_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

                              </tr>

                            </table></td>

                          <td width="10" align="center" valign="top">&nbsp;</td>

                          </tr>

                        </table></td>

                      <?php

							 if(($fs%5)==0)

							 {

							 ?>

                      </tr>

                    <?php

							}

							}

							?>

                    </table></td>

                  </tr>

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

        <?php

		  if($_REQUEST["action"]=="measurement")

		  {

		  ?>

          <script language="JavaScript">

function display_meassurementdetails()

{



				with(document.nextstepform)

                {

				    for (i=0; i<document.nextstepform.selectedjeanstype.length; i++)

					{

						 if (document.nextstepform.selectedjeanstype[i].checked==true)

						 {

							 checkp =document.nextstepform.selectedjeanstype[i].value;

						 }

    			    }

					

					<?php

					$query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			

			 		$recordsetmeasurement = mysql_query($query);

					?>

					

					if(checkp==1)

					{						

						 

						 	 document.getElementById('show_measurementtr').style.display = "none";

							 document.getElementById('show_fittingtypetr').style.display = "";

							 document.getElementById('show_customfittingtypetr').style.display = "none";

							 document.getElementById('validforcopyjeansonly').style.display = "none";

							 

							 for (i=0; i<document.nextstepform.jeansfittingtype.length; i++)

							 {

								document.nextstepform.jeansfittingtype[i].checked=false

							 }

							 

							 for(var i=1; i<=<?php echo mysql_num_rows($recordsetmeasurement);?>; i++)

							 {

								 document.getElementById('makemyjeans_details'+i).style.display = "";

								 document.getElementById('copyajeans_details'+i).style.display = "none";

							 }

						 						 

					}

										

					else

					{

						 	 document.getElementById('show_measurementtr').style.display = "";

							 document.getElementById('show_fittingtypetr').style.display = "none";

							 document.getElementById('show_customfittingtypetr').style.display = "";

							 document.getElementById('validforcopyjeansonly').style.display = "";

							 

							 for (i=0; i<document.nextstepform.jeansfittingtype.length; i++)

							 {

								document.nextstepform.jeansfittingtype[i].checked=false

							 }

							 

							 for(var i=1; i<=<?php echo mysql_num_rows($recordsetmeasurement);?>; i++)

							 {

								 document.getElementById('makemyjeans_details'+i).style.display = "none";

								 document.getElementById('copyajeans_details'+i).style.display = "";

							 }							

					}

				}

			}

			

function display_meassurementdetails_tr()

{

	document.getElementById('show_measurementtr').style.display = "";				

}			

</script>

<script language="JavaScript">

function validation(nextstepform)

{

	with(document.nextstepform)

    {

    	var errmsg="";

		var checkmeasurementtype="";

		var checkjeansfittingtype="";

	    

		var illegalChars = /\W/; // allow letters, numbers, and underscores

 

		

		for (i=0; i<document.nextstepform.selectedjeanstype.length; i++)

		{

				if (document.nextstepform.selectedjeanstype[i].checked==true)

				{

							 checkmeasurementtype =document.nextstepform.selectedjeanstype[i].value;

				}

    	}			

		

		if(checkmeasurementtype=="")

		{

			errmsg="Please select measurement type";		

		}

		

		if(checkmeasurementtype==1)

		{

			for (i=0; i<document.nextstepform.jeansfittingtype.length; i++)

			{

				if (document.nextstepform.jeansfittingtype[i].checked==true)

				{

						checkjeansfittingtype =document.nextstepform.jeansfittingtype[i].value;

				}

    		}	

			if(checkjeansfittingtype=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your measurement fitting style.";	

			}

				

		}

		

		if(document.getElementById('show_measurementtr').style.display=="")

		{

		

			if(measurement1.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your full length measurement.";

			}

			if(measurement3.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your waist measurement.";

			}

			if(measurement4.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your seat measurement.";

			}

			if(measurement5.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your front rise measurement.";

			}

			

			var checkcopyjeans="";

			

			for (i=0; i<document.nextstepform.selectedjeanstype.length; i++)

			{

					if (document.nextstepform.selectedjeanstype[i].checked==true)

					{

						checkcopyjeans =document.nextstepform.selectedjeanstype[i].value;

					}

			}	

			

			if(checkcopyjeans==2)

			{

				if(measurement6.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your back rise measurement.";

				}

			}

			

			if(measurement8.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your theighs on 1 measurement.";

			}

			if(measurement10.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your knee measurement.";

			}

			if(measurement11.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your bottom measurement.";

			}

		}

						

		if(errmsg=="")

		{

		  return true;

		}

		else

		{			

			document.getElementById("erroralready").style.display= '';			

			document.getElementById("lblerror").style.visibility= "visible";

			document.getElementById("lblerror").innerHTML = errmsg;

			return false;

		}

    }

}

</script>

          <tr>

          <td><table width="100%" border="0" cellpadding="5" cellspacing="0">

                  <tr>

                    <td class="titel"><h3>Change your measurement</h3></td>

                  </tr>

                  <tr>

                    <td align="center" class="font10"><table width="100%" background="images/pgbg02a.jpg" border="0" cellspacing="0" cellpadding="0" class="border3">

                      

                        <td height="25" align="left" class="font10"><b>Change measurement type :</b></td>

                      </tr>

                      

                        <td height="25" align="left" class="font10">To give your body measurements, Choose &quot;Make My Jeans&quot; option &amp; to give exact measurements of your favorite jeans, choose &quot;Copy A Jeans&quot; option.</td>

                      </tr>

                  <tr>

                    <td align="left" class="font10"><table border="0" cellspacing="0" cellpadding="5">

                      <tr>

                        <td><input type="radio" name="selectedjeanstype" value="1" onclick="display_meassurementdetails()" <?php if($selectedjeanstypeforthisjeans==1) { ?> checked="checked" <?php } ?>/></td>

                        <td><b>Make My Jeans</b>                         </td>

                        <td><input type="radio" name="selectedjeanstype" value="2" onclick="display_meassurementdetails()" <?php if($selectedjeanstypeforthisjeans==2) { ?> checked="checked" <?php } ?>/></td>

                        <td><b>Copy A Jeans</b></td>

                        </tr>

                      

                      </table></td>

                  </tr>

                  <tr>

                    <td height="10"></td>

                  </tr>

                  

                  <tr id="show_fittingtypetr" style="display:none;">

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="5">

                      <tr>

                        <td align="center" class="titel">Make My Jeans<br />

                          <span class="font9">You have selected "Make My Jeans" option and here, you have to give your original body measurements. We will make the jeans according to the fitting style you will select. First select a fitting type according to what type of fitting you want for your jeans from our defined fitting types. We will add or less at the part of seat, thighs and knee as shown in the Fitting Guide Table. So, please give complete & perfect body measurements only.</span>

</td>

                      </tr>
<?php if($_SESSION["fabric_for"]==2){ ?>
                      <tr>

                        <td align="center" class="font9"><span class="font10"><strong>Choose one option as per your required fitting, and measurement form will appear</strong></span>

                          <table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td width="19%" height="15" align="center"><span class="red_font12"><b>For Women</b></span></td>

    <td width="81%" align="center"><span class="red_font10">Amount to add / reduce on your original body measurements</span></td>

    </tr>

  <tr>

    <td colspan="2" align="center"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="border3">

  <tr>

    <td width="20%" align="left" valign="middle"  >&nbsp;</td>

    <td width="16%" align="center" valign="middle" ><strong>Super Skinny</strong></td>

    <td width="16%" align="center" valign="top"><strong>Skinny</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Slim</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Regular</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Comfort</strong></td>

    </tr>

  <tr>

    <td align="left" valign="middle" ><strong>More or Less At</strong></td>

    <td align="center" valign="middle" ><strong>

      <input type="radio" name="jeansfittingtype" value="Women's Super Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Women's Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Women's Slim" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Women's Regular" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Women's Comfort" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    </tr>

  <tr>

    <td align="left" valign="top">Seat</td>

    <td align="center" valign="top" class="fontred10">-2.50"</td>

    <td align="center" valign="top" class="fontred10">-1.00"</td>

    <td align="center" valign="top">0.00"</td>

    <td align="center" valign="top">+1.00"</td>

    <td align="center" valign="top">+2.50"</td>

    </tr>

  <tr>

    <td align="left" valign="top"  >Thighs    At 1"</td>

    <td align="center" valign="top" class="fontred10"  >-2.00"</td>

    <td align="center" valign="top" class="fontred10"  >-1.00"</td>

    <td align="center" valign="top"  >0.00"</td>

    <td align="center" valign="top"  >+1.00"</td>

    <td align="center" valign="top"  >+2.00"</td>

    </tr>

  <tr>

    <td align="left" valign="top">Thighs    At 6"</td>

    <td align="center" valign="top" class="fontred10">-1.50"</td>

    <td align="center" valign="top" class="fontred10">-0.50"</td>

    <td align="center" valign="top">0.00"</td>

    <td align="center" valign="top">+1.00"</td>

    <td align="center" valign="top">2.00"-2.50"</td>

    </tr>

  <tr>

    <td align="left" valign="top"  >Knee</td>

    <td align="center" valign="top" class="fontred10"  >-1.00"</td>

    <td align="center" valign="top" class="fontred10"  >-0.50"</td>

    <td align="center" valign="top"  >0.00"</td>

    <td align="center" valign="top"  >+1.00"</td>

    <td align="center" valign="top"  >+1.50"</td>

    </tr>

  <tr>

    <td align="left" valign="top"  >Bottom</td>

    <td colspan="5" align="center" valign="top"  >Write the actual bottom measurement you want for your jeans</td>

    </tr>

    </table></td>

    </tr>

</table></td>

                      </tr>

     <?php }
	 if($_SESSION["fabric_for"]==1){ ?>                 

                      <tr>

                        <td align="center" class="font9"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                          <tr>

    <td width="19%" height="15" align="center"><span class="red_font12"><b>For Men</b></span></td>

    <td width="81%" align="center"><span class="red_font10">Amount to add on your original body measurements</span></td>

    </tr>

  <tr>

    <td colspan="2" align="center"><table width="100%" border="0" cellpadding="1" cellspacing="1" class="border3">

  <tr>

    <td width="20%" align="left" valign="middle"  >&nbsp;</td>

    <td width="16%"align="center" valign="middle" ><strong>Skinny</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Slim</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Regular</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Comfort</strong></td>

    <td width="16%" align="center" valign="top" ><strong>Baggy</strong></td>

  </tr>

  <tr>

    <td align="left" valign="middle" ><strong>More or Less At</strong></td>

    <td align="center" valign="middle" ><strong>

      <input type="radio" name="jeansfittingtype" value="Men's Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Men's Slim" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Men's Regular" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Men's Comfort" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Men's Baggy" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

  </tr>

  <tr>

    <td align="left" valign="top">Seat</td>

    <td align="center" valign="top">0.00&quot;</td>

    <td align="center" valign="top">+1.00&quot;</td>

    <td align="center" valign="top">+1.50"</td>

    <td align="center" valign="top">+2.50"</td>

    <td align="center" valign="top">+4.00"</td>

  </tr>

  <tr>

    <td align="left" valign="top"  >Thighs    At 1"</td>

    <td align="center" valign="top"  >0.00&quot;</td>

    <td align="center" valign="top"  >+1.00&quot;</td>

    <td align="center" valign="top"  >+1.50"</td>

    <td align="center" valign="top"  >+2.00"</td>

    <td align="center" valign="top"  >+3.00"-4.00"</td>

  </tr>

  <tr>

    <td align="left" valign="top">Thighs    At 6"</td>

    <td align="center" valign="top">0.00&quot;</td>

    <td align="center" valign="top">+1.00&quot;</td>

    <td align="center" valign="top">+1.50"</td>

    <td align="center" valign="top">2.00"-2.50"</td>

    <td align="center" valign="top">+2.50"-3.00"</td>

  </tr>

  <tr>

    <td align="left" valign="top"  >Knee</td>

    <td align="center" valign="top"  >+0.50&quot;</td>

    <td align="center" valign="top"  >+1.00&quot;</td>

    <td align="center" valign="top"  >+1.00"</td>

    <td align="center" valign="top"  >+1.50"</td>

    <td align="center" valign="top"  >+2.50"</td>

  </tr>

  <tr>

    <td align="left" valign="top"  >Bottom</td>

    <td colspan="5" align="center" valign="top"  >Write the actual bottom measurement you want for your jeans</td>

    </tr>

    </table></td>

    </tr>

</table></td>

                      </tr>

   <?php } ?>                   

                      <tr>

                        <td class="red_font9" align="left"><span class="red_font10">The figures shown in this table are intended for 36" to 42" seat measurement. They can vary for larger measurements proportionally. The above mentioned figures may vary according to fabric stretchability. <br />

If you want access or less loosing then the loosing shown in the  table, please describe them in the last box  "Special Notes" below.</span></td>

                      </tr>

                      

                    </table></td>

                  </tr>

                  <tr id="show_customfittingtypetr" <?php if($selectedjeanstypeforthisjeans==1) { ?> style="display:none;" <?php } ?>>

                    <td align="center"class="titel">Copy My Jeans<br /><span class="font9">If you already have a perfect jeans and you like it the most, then you can send us all the measurements by following the instructions in Copy A Jeans section. We will make the perfect copy of your favorite jeans </span>   </td>

                  </tr>

                  

                  <tr id="show_measurementtr">

                    <td ><table width="100%" border="0" cellspacing="0" cellpadding="5">

                                          

                      <tr>

                        <td colspan="5" align="left" class="font10"><table border="0" cellspacing="0" cellpadding="1">

                        <?php

						 $pr=0;

						 $md=0;

						 $m=1;

						 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			

						 $recordsetmeasurement = mysql_query($query);

						 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

						 {

						 $md++;

						 ?>  

                        <tr>

                        <td align="right" class="font10"><?php echo $m;?>.</td>

                        <td class="font10"><?php echo $rowmeasurement["measurement_name"];?>

                        <?php

						  if(($rowmeasurement["measurement_ID"]==1)||($rowmeasurement["measurement_ID"]==3)||($rowmeasurement["measurement_ID"]==4)||($rowmeasurement["measurement_ID"]==5)||($rowmeasurement["measurement_ID"]==8)||($rowmeasurement["measurement_ID"]==10)||($rowmeasurement["measurement_ID"]==11))

						  {

						  ?>                      

						  <font color="#FF0000">*</font>

						  <?php

						  }

						  ?>

                          <?php

						   if($rowmeasurement["measurement_ID"]==6)

						   {

						   ?>

                           <span id="validforcopyjeansonly" style="display:none;"><font color="#FF0000">*</font></span>

                           <?php

						   }

						   ?>                        </td>

                        <td><input name="measurement<?php echo $m;?>" type="text" class="font9" size="10" value="<?php echo $selectedmeasurementforthisjeans[$pr];?>"/>

                        <?php

						

						?>                        </td>

                        <td>&quot;</td>

                        <td><img src="images/QuestionMark.gif" width="19" height="19" border="0" onclick="return hs.htmlExpand(this, { headingText: '<?php echo $rowmeasurement["measurement_name"];?> - Make My Jeans' })" style="cursor:pointer;"/>

                          <div class="highslide-maincontent">

                            <table width="100%" border="0" cellspacing="0" cellpadding="5" id="makemyjeans_details<?php echo $md;?>">

                              <tr>

                                <td valign="top"><img src="images/measurement/makemyjeans/<?php echo $rowmeasurement["measurement_make_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" border="0" style="max-height:400px;  height: expression(this.height &gt; 400 ? 400: true); max-width:400px;  width: expression(this.width &gt; 400 ? 400: true);"/></a></td>

                                <td valign="top">

								<?php

                    				displayeditorvalue($rowmeasurement["measurement_make_desc"]);

                    			?></td>

                              </tr>

                            </table>

                            <table width="100%" border="0" cellspacing="0" cellpadding="5" id="copyajeans_details<?php echo $md;?>" style="display:none;">

                              <tr>

                                <td valign="top"><img src="images/measurement/copyajeans/<?php echo $rowmeasurement["measurement_copy_image"];?>" alt="<?php echo $rowmeasurement["measurement_name"];?>" title="<?php echo $rowmeasurement["measurement_name"];?>" border="0" style="max-height:400px;  height: expression(this.height &gt; 400 ? 400: true); max-width:400px;  width: expression(this.width &gt; 400 ? 400: true);"/></a></td>

                                <td valign="top"><?php

                    displayeditorvalue($rowmeasurement["measurement_copy_desc"]);

                    ?></td>

                              </tr>

                            </table>

                          </div></td>

                      </tr>

                      <?php	

					 $pr++;		 

					 $m++;

					 }

					 ?>

                        </table></td>

                        </tr>

                      

                      <tr>

                        <td colspan="5" align="left" class="font10"><b>This  Jeans is for :</b> <font color="#FF0000">*</font> <input name="thisjeansisfor" type="text" class="font9" value="<?php echo $selectedthisjeansfor;?>" size="35" /></td>

                      </tr>

<tr><td colspan="5" align="left" class="font10"><strong>Gender&nbsp;:&nbsp;</strong> <?php echo $selectedthisjeansgender; ?></td></tr>

                     
                      <tr>

                        <td colspan="5" align="left" class="font10"><textarea name="jeansspecialnote" cols="80" rows="5" class="font9"><?php echo $selectedthisjeansspecialnote;?></textarea></td>

                        </tr>

                    </table></td>

                  </tr>

              

                </table></td>

                  </tr>

              </table></td>

        </tr>

          

        <?php

		}

		?>

        <tr>

            <td align="center"> 
<input type="hidden" name="selection_action" value="<?php echo $_REQUEST["action"];?>" />
            <input type="text" name="selection" value="<?php echo $_REQUEST["selection"]?>" />           

            <input type="hidden" name="action" value="change" />

            <input type="submit" name="submit" value="Change" onclick="return validation(this.form);" style="cursor:pointer;"/></td>

          </tr>

          <tr>

            <td align="center" height="10">            

            </td>

          </tr>

          <tr id="erroralready" style="display:none;">

            <td ><table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">

  <tr>

                                <td width="10" height="10"><img src="images/red_tab_01.png" width="10" height="10" /></td>

                                <td background="images/red_tab_03.png" style="background-repeat:repeat-x"></td>

                                <td width="10" height="10"><img src="images/red_tab_04.png" width="10" height="10" /></td>

                              </tr>

                              <tr>

                                <td background="images/red_tab_05.png" style="background-repeat:repeat-y">&nbsp;</td>

                                <td bgcolor="#FFD3D3"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                  <tr>

                                    <td width="65" valign="top"><img src="images/red_tab_06.png" width="65" height="58" /></td>

                                    <td width="5" valign="top">&nbsp;</td>

                                    <td valign="top"><table width="100%" border="0" cellspacing="3" cellpadding="3">

                                      <tr>

                                        <td class="red_font9" align="left"><b>Error</b></td>

                                      </tr>

                                      <tr>

                                        <td class="red_font9" align="left">

                                        <div id="lblerror" class="fonts10" align="left" style=" width:220px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>                                        </td>

                                      </tr>

                                    </table></td>

                                  </tr>

                                </table></td>

                                <td background="images/red_tab_08.png" style="background-repeat:repeat-y">&nbsp;</td>

                              </tr>

                              <tr>

                                <td><img src="images/red_tab_12.png" width="10" height="10" /></td>

                                <td background="images/red_tab_14.png" style="background-repeat:repeat-x"></td>

                                <td><img src="images/red_tab_15.png" width="10" height="10" /></td>

                              </tr>

</table></td>

                  </tr>

            </table></td>

        </tr>

        </table>        </td>

        <td width="10" align="left" valign="top">&nbsp;</td>

  </tr>

        </form>

        </table>

        