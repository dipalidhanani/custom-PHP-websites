<?php

require_once("include/files.php");

?>

<link href="css/home.css" rel="stylesheet" type="text/css" />

<?php

if($_REQUEST["step"]=="")

{

if(count($_SESSION['sqjeanscart'])>=5)

{

		if($_SESSION['sqjeansloginuseremail']=="")

		{

			echo "<script type=\"text/javascript\">document.location.href='customjeans.html?step=4'; </script>\n";

		}

		else

		{

			echo "<script type=\"text/javascript\">document.location.href='mycart.html'; </script>\n";

		}

}

?>

<script language="JavaScript">

function validation(nextstepform)

{

	with(document.nextstepform)

    {

    	var errmsg="";

	    

		var illegalChars = /\W/; // allow letters, numbers, and underscores

 

		

		

		var checkmaterial="";

		var checkspecialwash="";

		

		for (i=0; i<document.nextstepform.selectedmatirial.length; i++)

		{

				if (document.nextstepform.selectedmatirial[i].checked==true)

				{

					checkmaterial =document.nextstepform.selectedmatirial[i].value;

				}

		}		

		

		

		if(checkmaterial=="")

		{

			errmsg="Please select fabric";		

		}

		

		for (i=0; i<document.nextstepform.selectedspecialwash.length; i++)

		{

				if (document.nextstepform.selectedspecialwash[i].checked==true)

				{

					checkspecialwash =document.nextstepform.selectedspecialwash[i].value;

				}

		}			

		

		if(checkspecialwash=="")

		{

			errmsg=errmsg +'<br>' + "Please select special wash";		

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


<table width="100%" border="0"  cellspacing="0" cellpadding="0"  >

 <form name="nextstepform" id="nextstepform" method="get" action="index.php">
 
<?php if($_GET["fabric_for"]!=''){ $_SESSION["fabric_for"]=$_GET["fabric_for"]; }?>
  <tr>

    <td width="0">&nbsp; </td>

    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td align="center" ><h1><img src="images/step1_01.png" width="157" height="44" />Custom Jeans</h1></td>

              </tr>

            </table></td>

        </tr>

        <tr>

          <td><table width="100%" border="0" cellspacing="5" cellpadding="0" >

            <tr>

              <td><table width="100%" border="0"   cellspacing="0" cellpadding="0">

                <tr>

                  <td>&nbsp;</td>

                  <td><img src="images/step_02.png" width="158" height="44" /></td>

                  <td><img src="images/step_03.png" width="157" height="44" /></td>

                  <td><img src="images/step_04.png" width="158" height="44" /></td>

                  </tr>

                </table></td>

              </tr>

                 <tr>

                  <td height="10" valign="top" class="titel"></td>

                 </tr>

                 <tr>

                  <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                 <tr>

                  <td height="25" valign="top" class="titel">Select your Fabric &amp; Wash</td>

                 </tr>



                 <tr>

                   <td height="10" valign="top" class="titel"></td>

                 </tr>

<?php if($_GET["display_order_for"]!=''){ $_SESSION["display_order_for"]=$_GET["display_order_for"]; }?>

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

                  <td align="left">
                 
                
                  <table width="100%"  background="images/pgbg02a.jpg" border="0" cellpadding="0" cellspacing="5"  class="border3">

                    <tr>

                      <td height="20" class="font10"><strong><?php echo $rowmaterial["material_name"];?></strong></td>

                      </tr>

                       <tr>

                      <td class="font9"><?php echo displayeditorvalue($rowmaterial["material_desc"]);?></td>

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

                                  <td height="110" align="center" valign="middle"><a href="images/washtreatments/<?php echo $rowwash_treatment["wash_treatment_image"];?>" rel="lightbox" title="<?php echo $rowmaterial["material_name"];?> - <?php echo $rowwash_treatment["wash_treatment_name"]; echo "<br/>"; echo displayeditorvalue($rowwash_treatment["wash_treatment_description"]);?>"><img src="images/washtreatments/wt<?php echo $rowwash_treatment["wash_treatment_image"];?>" alt="<?php echo $rowwash_treatment["wash_treatment_name"];?>" title="<?php echo $rowwash_treatment["wash_treatment_name"];?>" border="0" /></a></td>

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

                                  <td align="center"><input type="radio" name="selectedmatirial" id="selectedmatirial" value="<?php echo $rowwash_treatment["mw_realtion_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($_SESSION['selectedmaterialid']==$rowwash_treatment["mw_realtion_ID"]) { ?> checked="checked" <?php } ?>/></td>

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

            <tr>

              <td height="30" valign="top"><span class="titel">Select Special Wash</span></td>

            </tr>

            <tr>

              <td><table width="100%"  background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $sp=0;	

							 $query="SELECT * FROM special_wash_master where special_wash_available=1 order by special_wash_display_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/specialwash/<?php echo $rowspecial_wash["special_wash_image"];?>" rel="lightbox" title="<?php echo $rowspecial_wash["special_wash_desc"];?>"><img src="images/specialwash/p<?php echo $rowspecial_wash["special_wash_image"];?>" alt="<?php echo $rowspecial_wash["special_wash_name"];?>" title="<?php echo $rowspecial_wash["special_wash_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedspecialwash" id="selectedspecialwash" value="<?php echo $rowspecial_wash["special_wash_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedspecialwash']==$rowspecial_wash["special_wash_ID"])||($rowspecial_wash["special_wash_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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

          </table></td>

        </tr>

        <tr>

          <td>&nbsp;</td>

        </tr>

        <tr>

          <td align="right">

         

          <input type="hidden" name="object" value="2" />

          <input type="hidden" name="step" value="2" />

          <input type="image" src="images/button_next.jpg" onclick="return validation(this.form);" style="cursor:pointer;"/>                  </td>

        </tr>

       <tr id="erroralready" style="display:none;">

            <td><table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">

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

                                        <td class="red_font9" align="left"><strong>Error</strong></td>

                                      </tr>

                                      <tr>

                                        <td class="red_font9" align="left">

                                        <div id="lblerror" class="fonts10" align="left" style=" width:220px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>

                                        </td>

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

    <td width="10">&nbsp;</td>

  </tr>

  </form>

</table>

<?php

}

?>

<?php

if($_REQUEST["step"]==2)

{


if($_SESSION['selectedmaterialid']=="")

{

			  	echo "<script type=\"text/javascript\">document.location.href='customjeans.html'; </script>\n";

}

?>

<script language="JavaScript">

function validation(nextstepform)

{

	with(document.nextstepform)

    {

    	var errmsg="";

	    

		var illegalChars = /\W/; // allow letters, numbers, and underscores

 	

		

		var checkfirstthread="";

		var checksecondthread="";

		var checkfrontpocket="";

		var checkbackpocket="";		

		var checkzipstyle="";

		

		for (i=0; i<document.nextstepform.selectedthread_main.length; i++)

		{

				if (document.nextstepform.selectedthread_main[i].checked==true)

				{

					checkfirstthread =document.nextstepform.selectedthread_main[i].value;

				}

		}		

		

		

		if(checkfirstthread=="")

		{

			errmsg="Please select first thread";		

		}

		

		for (i=0; i<document.nextstepform.selectedthread_second.length; i++)

		{

				if (document.nextstepform.selectedthread_second[i].checked==true)

				{

					checksecondthread =document.nextstepform.selectedthread_second[i].value;

				}

		}			

		

		if(checksecondthread=="")

		{

			errmsg=errmsg +'<br>' + "Please select second thread";		

		}

			

		for (i=0; i<document.nextstepform.selectedprocketstyle.length; i++)

		{

				if (document.nextstepform.selectedprocketstyle[i].checked==true)

				{

					checkfrontpocket =document.nextstepform.selectedprocketstyle[i].value;

				}

		}			

		

		if(checkfrontpocket=="")

		{

			errmsg=errmsg +'<br>' + "Please select front pocket style";		

		}

		

		for (i=0; i<document.nextstepform.selectedprocketstyle_back.length; i++)

		{

				if (document.nextstepform.selectedprocketstyle_back[i].checked==true)

				{

					checkbackpocket =document.nextstepform.selectedprocketstyle_back[i].value;

				}

		}			

		

		if(checkbackpocket=="")

		{

			errmsg=errmsg +'<br>' + "Please select back pocket style";		

		}	

		

		for (i=0; i<document.nextstepform.selectedflystyle.length; i++)

		{

				if (document.nextstepform.selectedflystyle[i].checked==true)

				{

					checkzipstyle =document.nextstepform.selectedflystyle[i].value;

				}

		}			

		

		if(checkzipstyle=="")

		{

			errmsg=errmsg +'<br>' + "Please select fly style";		

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

<table width="100%" border="0"  cellspacing="0" cellpadding="0">

<form name="nextstepform" method="get" action="index.php">

  <tr>

    <td width="10">&nbsp; </td>

    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td align="center" ><h1>Custom Jeans</h1></td>

              </tr>

            </table></td>

        </tr>

        <tr>

          <td colspan="2"><table width="100%" border="0" cellspacing="5" cellpadding="0" background="images/b1.jpg" style="background-repeat:repeat-x;">

            <tr>

              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td><img src="images/step_01.png" width="157" height="44" /></td>

                  <td><img src="images/step1_02.png" width="158" height="44" /></td>

                  <td><img src="images/step_03.png" width="157" height="44" /></td>

                  <td><img src="images/step_04.png" width="158" height="44" /></td>

                  </tr>

                </table></td>

              </tr>

                 <tr>

                  <td height="10" valign="top" class="titel"></td>

                 </tr>

            <tr>

              <td height="25" valign="top"><span class="titel">Select Thread color(s)</span></td>

              </tr>

            <tr>

              <td><table width="100%"  background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                    <tr>

                      <?php

							 $tc=0;	

							  $query="SELECT * FROM thread_master where thread_available=1 order by thread_display_order asc";			

							  $recordsetthread = mysql_query($query);

							  while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))

							  {	

							  $tc++;

							 ?>

                      <td><table border="0" align="left" cellpadding="0" cellspacing="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><strong><?php echo $rowthread["thread_name"];?></strong></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/threads/<?php echo $rowthread["thread_image"];?>" rel="lightbox" title="<?php echo $rowthread["thread_desc"];?>"><img src="images/threads/t<?php echo $rowthread["thread_image"];?>" alt="<?php echo $rowthread["thread_name"];?>" title="<?php echo $rowthread["thread_name"];?>" border="0" /></a></td>

                              </tr>

                            

                            <tr>

                              <td align="left" class="font9"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                                <tr>

                                  <td height="25" valign="middle"><input type="radio" name="selectedthread_main" id="selectedthread_main" value="<?php echo $rowthread["thread_ID"];?>" onclick="calculate_threadelected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($_SESSION['selectedthread_main']==$rowthread["thread_ID"]) { ?> checked="checked" <?php } ?>/></td>

                                  <td height="25" valign="middle">Main Thread </td>

                                  </tr>

                                <tr>

                                  <td height="25" valign="middle"><input type="radio" name="selectedthread_second" id="selectedthread_second" value="<?php echo $rowthread["thread_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if($_SESSION['selectedthread_second']==$rowthread["thread_ID"]) { ?> checked="checked" <?php } ?>/></td>

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

            <tr>

              <td height="25"><span class="titel">Select front pocket style</span></td>

              </tr>

            <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $ps=0;	

							 $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=1 order by pocket_style_display_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/pocketstyles/<?php echo $rowpocket_style["pocket_style_image"];?>" rel="lightbox" title="<?php echo $rowpocket_style["pocket_style_desc"];?>"><img src="images/pocketstyles/p<?php echo $rowpocket_style["pocket_style_image"];?>" alt="<?php echo $rowpocket_style["pocket_style_name"];?>" title="<?php echo $rowpocket_style["pocket_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedprocketstyle" id="selectedprocketstyle" value="<?php echo $rowpocket_style["pocket_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedprocketstyle']==$rowpocket_style["pocket_style_ID"])||($rowpocket_style["pocket_style_default"]==1)){ ?> checked="checked" <?php } ?>/></td>

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

            <tr>

              <td height="25"><span class="titel">Select back pocket style</span></td>

              </tr>

            <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $ps=0;	

							 $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=2 order by pocket_style_display_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/pocketstyles/<?php echo $rowpocket_style["pocket_style_image"];?>" rel="lightbox" title="<?php echo $rowpocket_style["pocket_style_desc"];?>"><img src="images/pocketstyles/p<?php echo $rowpocket_style["pocket_style_image"];?>" alt="<?php echo $rowpocket_style["pocket_style_name"];?>" title="<?php echo $rowpocket_style["pocket_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedprocketstyle_back" id="selectedprocketstyle_back" value="<?php echo $rowpocket_style["pocket_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedprocketstyle_back']==$rowpocket_style["pocket_style_ID"])||($rowpocket_style["pocket_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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

            <tr>

              <td height="25"><span class="titel">Select fly style</span></td>

              </tr>

            <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM fly_style_master where fly_style_available=1 order by fly_style_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/flystyles/<?php echo $rowfly_style["fly_style_image"];?>" rel="lightbox" title="<?php echo $rowfly_style["fly_style_desc"];?>"><img src="images/flystyles/p<?php echo $rowfly_style["fly_style_image"];?>" alt="<?php echo $rowfly_style["fly_style_name"];?>" title="<?php echo $rowfly_style["fly_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedflystyle" id="selectedflystyle" value="<?php echo $rowfly_style["fly_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedflystyle']==$rowfly_style["fly_style_ID"])||($rowfly_style["fly_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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

              <tr>

              <td height="25" class="titel">Accessories</td>

              </tr>

              <tr>

                <td height="25" class="font10">Please mention any of this in <strong>"Special Note"</strong> after measurement. <br />There is no extra cost for selection of any accessories displayed below.</td>

              </tr>

              <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 order by buttonrivets_order asc";			

							 $recordsetbuttonrivets = mysql_query($query);

							 while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))

							 {	

							 $fs++;

							 ?>

                      <td align="left"><table border="0" cellspacing="0" cellpadding="0">

                        <tr>

                          <td align="center" valign="top"><table width="120" border="0" cellpadding="0" cellspacing="0">

                            <tr>

                              <td height="25" align="center" class="font9"><?php echo $rowbuttonrivets["buttonrivets_name"];?></td>

                            </tr>

                            <tr>

                              <td height="110" align="center" valign="middle"><a href="images/buttonrivets/<?php echo $rowbuttonrivets["buttonrivets_image"];?>" rel="lightbox" title="<?php echo $rowbuttonrivets["buttonrivets_desc"];?>"><img src="images/buttonrivets/p<?php echo $rowbuttonrivets["buttonrivets_image"];?>" alt="<?php echo $rowbuttonrivets["buttonrivets_name"];?>" title="<?php echo $rowbuttonrivets["buttonrivets_name"];?>" border="0" /></a></td>

                              </tr>

                            <tr>

                              <td height="25" align="center" class="font9"><?php 

							    if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

								{

									echo "$ ";

									printf("%.2f",$rowbuttonrivets["buttonrivets_additional_charge"]);

								}

								if($_SESSION["currentselectedcurrency"]=="INR")

								{

									echo "INR ";

									printf("%.2f",$rowbuttonrivets["buttonrivets_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

								if($_SESSION["currentselectedcurrency"]=="EUR")

								{

									echo "&euro; ";

									printf("%.2f",$rowbuttonrivets["buttonrivets_additional_charge"]*$_SESSION["currentselectedcurrencyamount"]);

								}

							  ?></td>

                              </tr>

                            <tr>

                              <td align="center"><input type="radio" name="selectedbuttonrivetsstyle" id="selectedbuttonrivetsstyle" value="<?php echo $rowbuttonrivets["buttonrivets_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedbuttonrivetsstyle']==$rowbuttonrivets["buttonrivets_ID"])||($rowbuttonrivets["buttonrivets_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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
              
              <tr>

              <td height="25"><span class="titel">Select belt style</span></td>

              </tr>

            <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM belt_style_master where belt_style_available=1 order by belt_style_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/beltstyles/<?php echo $rowbelt_style["belt_style_image"];?>" rel="lightbox" title="<?php echo $rowbelt_style["belt_style_desc"];?>"><img src="images/beltstyles/p<?php echo $rowbelt_style["belt_style_image"];?>" alt="<?php echo $rowbelt_style["belt_style_name"];?>" title="<?php echo $rowbelt_style["belt_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedbeltstyle" id="selectedbeltstyle" value="<?php echo $rowbelt_style["belt_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedbeltstyle']==$rowbelt_style["belt_style_ID"])||($rowbelt_style["belt_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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
               <tr>

              <td height="25"><span class="titel">Select loops style</span></td>

              </tr>

            <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM loops_style_master where loops_style_available=1 order by loops_style_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/loopsstyles/<?php echo $rowloops_style["loops_style_image"];?>" rel="lightbox" title="<?php echo $rowloops_style["loops_style_desc"];?>"><img src="images/loopsstyles/p<?php echo $rowloops_style["loops_style_image"];?>" alt="<?php echo $rowloops_style["loops_style_name"];?>" title="<?php echo $rowloops_style["loops_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedloopsstyle" id="selectedloopsstyle" value="<?php echo $rowloops_style["loops_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedloopsstyle']==$rowloops_style["loops_style_ID"])||($rowloops_style["loops_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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

		      <tr>

              <td height="25"><span class="titel">Select Embroidery style</span></td>

              </tr>

              <tr>

              <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellpadding="5" cellspacing="0"  class="border3">

 