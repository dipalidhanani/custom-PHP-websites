<?php

require_once("include/files.php");
$_REQUEST["fabric_for"]=$_SESSION["fabric_for"];
$_REQUEST["display_order_for"]=$_SESSION["display_order_for"];
?>

<link href="css/home.css" rel="stylesheet" type="text/css" />

<?php


if($_REQUEST["step"]=="")

{

if(count($_SESSION['sqjeanscart'])>=5)

{

		if($_SESSION['sqjeansloginuseremail']=="")

		{

			echo "<script type=\"text/javascript\">document.location.href='customjeans.php?step=4'; </script>\n";

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

                <td align="center" ><h1>Custom Jeans</h1></td>

              </tr>

            </table></td>

        </tr>

        <tr>

          <td><table width="100%" border="0" cellspacing="5" cellpadding="0" >

            <tr>

              <td><table width="100%" border="0"   cellspacing="0" cellpadding="0">

                <tr>

                  <td><img src="images/step1_01.png" width="157" height="44" /></td>

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

                <tr>

                  <td align="left"><table border="0" align="left" cellpadding="0" cellspacing="0">

                    <tr>

                      <?php

							 $fs=0;	

							 $query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 order by embroidery_style_order asc";			

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

                              <td height="110" align="center" valign="middle"><a href="images/embroiderystyles/<?php echo $rowembroidery_style["embroidery_style_image"];?>" rel="lightbox" title="<?php echo $rowembroidery_style["embroidery_style_desc"];?>"><img src="images/embroiderystyles/p<?php echo $rowembroidery_style["embroidery_style_image"];?>" alt="<?php echo $rowembroidery_style["embroidery_style_name"];?>" title="<?php echo $rowembroidery_style["embroidery_style_name"];?>" border="0" /></a></td>

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

                              <td align="center"><input type="radio" name="selectedembroiderystyle" id="selectedembroiderystyle" value="<?php echo $rowembroidery_style["embroidery_style_ID"];?>" onclick="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform)" <?php if(($_SESSION['selectedembroiderystyle']==$rowembroidery_style["embroidery_style_ID"])||($rowembroidery_style["embroidery_style_default"]==1)) { ?> checked="checked" <?php } ?>/></td>

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

        <tr>

          <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

          <td align="left">
          <a href="customjeans.html"><img src="images/button_prev.jpg" border="0" /></a></td>

          <td align="right"><input type="hidden" name="object" value="2" />

          <input type="hidden" name="step" value="3" />

          <input type="image" src="images/button_next.jpg" onclick="return validation(this.form);" style="cursor:pointer;"/></td>

        </tr>

       <tr id="erroralready" style="display:none;">

            <td colspan="2"><table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">

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

    <td width="10">&nbsp;</td>

  </tr>

</form>

</table>

<?php

}

?>

<?php

if($_REQUEST["step"]==3)

{


if($_SESSION['selectedmaterialid']=="")

{

			  	echo "<script type=\"text/javascript\">document.location.href='customjeans.php?step=2'; </script>\n";

}

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

			if(thisjeansisfor.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter this jeans is for.";

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

<table width="100%" border="0"  cellspacing="0" cellpadding="0">

  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <form name="nextstepform" id="nextstepform" method="get" action="process.php">
<script language="javascript">
function view_mesurement(d_n, f_n, fm) 
{
	f=fm;
	l=f.elements.length;
	m="";
	i=0;
	for(i=0;i<l;i++) 
	{
		if(f.elements[i].type=="checkbox")
		{
			if(f.elements[i].checked==true)
			{
				m +=f.elements[i].name+"="+f.elements[i].value+"&";
			}
		}
		else if(f.elements[i].type=="radio")
		{
			if(f.elements[i].checked==true)
			{
				m +=f.elements[i].name+"="+f.elements[i].value+"&";
			}
		}
		else
		{
			m +=f.elements[i].name+"="+f.elements[i].value+"&";
		}
	}
	//dt(d_n, f_n+'?'+m);
	
	getoutput(f_n+'&'+m,d_n)
	
	return false;
}


function getoutput(url,resultpan)
{
	//alert(url);
	var xmlchat = initxmlhttp() ;
	var m = document.getElementById(resultpan);
	m.innerHTML = "<div id='loading' align='center'> <img src='images/loader.gif'></div>";
	xmlchat.open( "GET", url, true ) ;
	xmlchat.onreadystatechange=function()
	{
		//alert("hi");
		if (xmlchat.readyState==4)
		{
			document.getElementById(resultpan).innerHTML = xmlchat.responseText;
			var str = xmlchat.responseText;	
			
		}
		
	}
	xmlchat.send(null) ;
	//	xmlchat.close();
//	var temp = setTimeout("xmlpull()",) ;
}


function initxmlhttp()

{
		var xmlhttp ;
 	    if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
           //    xmlHttpReq.overrideMimeType('text/xml');
        }
        // IE
        else if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		return xmlhttp ;
}
</script>
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

                    <td><img src="images/step_02.png" width="158" height="44" /></td>

                    <td><img src="images/step1_03.png" width="157" height="44" /></td>

                    <td><img src="images/step_04.png" width="158" height="44" /></td>

                  </tr>

                </table></td>

              </tr>

                 <tr>

                  <td height="10" valign="top" class="titel"></td>

                 </tr>

              <tr>

                <td height="25"><span class="titel">Give Your Measurement</span></td>

              </tr>

              <tr>

                <td><table width="100%" background="images/pgbg02a.jpg" border="0" cellspacing="0" cellpadding="0" class="border3">

                  <tr>

                    <td align="left" class="font10">&nbsp;</td>

                    <td height="25" align="center" class="font10"><strong>Select measurement type :</strong></td>

                  </tr>

                  <tr>

                    <td align="left" class="font10">&nbsp;</td>

                    <td align="left" class="font10"><table width="610" border="0" cellpadding="5" cellspacing="0">

                      <tr>

                        <td colspan="2">To give your body measurements, Choose "<strong>Make My Jeans</strong>" option</td>

                        <td colspan="2">To give exact measurements of your favorite jeans, choose "<strong>Copy My Jeans</strong>" option</td>

                        </tr>
 <script language="javascript">
				function val(){	
				
						var lblstar="";

			

			for (i=0; i<document.nextstepform.selectedjeanstype.length; i++)

			{

					if (document.nextstepform.selectedjeanstype[i].checked==true)

					{

						lblstar =document.nextstepform.selectedjeanstype[i].value;

					}
					
					if(lblstar==2){
						document.getElementById("lblstar").style.visibility= "visible";
					document.getElementById("lblstar").innerHTML = '*';
					}

			}	}
			function val1(){	
			document.getElementById("lblstar").style.visibility= "hidden";
			}

						</script>
                      <tr>

                        <td width="26"><input type="radio" name="selectedjeanstype" value="1" onclick="display_meassurementdetails()" onchange="return val1();"/></td>

                        <td width="247"><strong>Make My Jeans</strong>                         </td>

                        <td width="20"><input type="radio" name="selectedjeanstype" value="2" onclick="display_meassurementdetails();" onchange="return val();"/></td>

                        <td width="277"><strong>Copy My Jeans</strong></td>

                        </tr>

                      

                      </table></td>

                  </tr>

                  <tr>

                    <td></td>

                    <td height="10"></td>

                  </tr>

                  <tr id="show_fittingtypetr" style="display:none;">

                    <td>&nbsp;</td>

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

      <input type="radio" name="jeansfittingtype" value="Womens Super Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Womens Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Womens Slim" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Womens Regular" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Womens Comfort" onclick="display_meassurementdetails_tr()"/>

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

        <?php } ?>                    
<?php if($_SESSION["fabric_for"]==1){ ?>
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

      <input type="radio" name="jeansfittingtype" value="Mens Skinny" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Mens Slim" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Mens Regular" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Mens Comfort" onclick="display_meassurementdetails_tr()"/>

    </strong></td>

    <td align="center" valign="top" ><strong>

      <input type="radio" name="jeansfittingtype" value="Mens Baggy" onclick="display_meassurementdetails_tr()"/>

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

                  <tr id="show_customfittingtypetr" style="display:none;">

                    <td rowspan="2" class="font9">&nbsp;</td>

                    <td height="59" align="center" class="titel">Copy My Jeans<br />

                      <span class="font9">If you already have a perfect jeans and you like it the most, then you can send us all the measurements by following the instructions in Copy My Jeans section. We will make the perfect copy of your favorite jeans </span></td>

                  </tr>

                  <tr style="display:none;">

                    <td height="27" class="font9">&nbsp;</td>

                  </tr>

                  <tr>

                    <td></td>

                    <td height="10"></td>

                  </tr>

                  <tr id="show_measurementtr" style="display:none;">

                    <td >&nbsp;</td>

                    <td ><table width="100%" border="0" cellspacing="0" cellpadding="5">

                                          

                      <tr>

                        <td align="left" class="font10"><strong>This Jeans is for :</strong> <font color="#FF0000">*</font>

                          <input name="thisjeansisfor" type="text" class="font9" size="35" /></td>

                        </tr>

                      <tr>

                        <td align="left" class="font10"><strong>Gender :</strong>

           <input type="hidden" name="jeansgender" 
           value="<?php if($_SESSION["fabric_for"]==1){ echo "Male"; } if($_SESSION["fabric_for"]==2){ echo "Female";} ?>" />
		   <?php if($_SESSION["fabric_for"]==1){ echo "Male"; } if($_SESSION["fabric_for"]==2){ echo "Female";} ?> 

 

                        </tr>

                      <tr>

                        <td align="left" class="font10" ><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="40%" valign="top"><table cellspacing="0" cellpadding="1" width="100%" >

                        <?php

						 $md=0;

						 $m=1;

						 $query="SELECT * FROM measurement_master where measurement_available=1 order by measurement_ID";			

						 $recordsetmeasurement = mysql_query($query);

						 while($rowmeasurement = mysql_fetch_array($recordsetmeasurement,MYSQL_ASSOC))

						 {

						 $md++;

						 ?>  

                        <tr>
                        <td width="30%" valign="top" height="10" ><table width="100%" border="0"><tr>

                        <td width="9%" align="right" class="font10"><?php echo $m;?>.</td>

                        <td width="48%" class="font10"><?php echo $rowmeasurement["measurement_name"];?>

                        <?php

						  if(($rowmeasurement["measurement_ID"]==1)||($rowmeasurement["measurement_ID"]==3)||($rowmeasurement["measurement_ID"]==4)||($rowmeasurement["measurement_ID"]==5) ||($rowmeasurement["measurement_ID"]==8)||($rowmeasurement["measurement_ID"]==10)||($rowmeasurement["measurement_ID"]==11))

						  {

						  ?>                      

						  <font color="#FF0000">*</font>

						  <?php

						  }

						  ?>
                          <?php

						   if($rowmeasurement["measurement_ID"]==6)

						   { ?>
                       
                        
 <font id="lblstar" color="#FF0000" style="visibility:hidden;"></font>
						   
                      
                        <?php

						   }

						   ?> 
                          <?php

						   if($rowmeasurement["measurement_ID"]==6)

						   {

						   ?>

                           <span id="validforcopyjeansonly" style="display:none;"></span>

                           <?php

						   }

						   ?>                        </td>

                        <td width="40%">
                        <input name="measurement<?php echo $m;?>" type="text" class="font9" size="10" value="<?php echo $_SESSION["savemeasurement".$m];?>" <?php if($m==4) { ?> onfocus="calculate_youselected('ResultPanel_youselected','youselected.php',nextstepform);view_mesurement('ResultPanel','nextstepform.php?mid=<?php echo $m; ?>',nextstepform)" <?php } else {?> onfocus="view_mesurement('ResultPanel','nextstepform.php?mid=<?php echo $m; ?>',nextstepform)" <?php } ?>/>  </td>

                        <td width="3%">&quot;</td>
                        </tr></table></td>

                      </tr>

                      <?php			 

					 $m++;

					 }

					 ?>

                        </table></td>
                            <td valign="top"><table width="100%"><tr>     
                       <td id="ResultPanel"  width="66%">
                         
                       
                       </td>
						 </tr></table></td>
                          </tr>
                        </table></td>

                        </tr>

                      <tr>

                        <td align="left" class="font10"><textarea name="jeansspecialnote" cols="100" rows="2" class="font9" onfocus="if(this.value == 'Special Note') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Special Note';}">Special Note</textarea></td>

                      </tr>

                    </table></td>

                  </tr>

              

                </table></td>

              </tr>

            </table></td>

        </tr>

        

        <tr>

          <td colspan="2">&nbsp;</td>

        </tr>

        <tr>

          <td align="left"><a href="customjeans.php?step=2"><img src="images/button_prev.jpg" border="0" /></a></td>

          <td align="right"><input type="hidden" name="action" value="savemeasurement" />        

          <input type="image" src="images/addtocart.png" onclick="return validation(this.form);" style="cursor:pointer;"/></td>

        </tr>

        <tr id="erroralready" style="display:none;">

            <td colspan="2"><table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">

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

                                        <div id="lblerror" class="fonts10" align="left" style=" width:280px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>                                        </td>

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

        </form>

    </table></td>

    <td width="10">&nbsp;</td>

  </tr>

</table>

<?php

}

?>

<?php

if($_REQUEST["step"]==4)

{

?>

<script type="text/javascript">

function hideshipping()

{

 document.getElementById('shippingaddress_tr').style.display = 'none';

}

function showshipping()

{

 document.getElementById('shippingaddress_tr').style.display = '';

}

</script>

<script language="JavaScript">

function IsNumeric(strString) //  check for valid numeric strings

{

	if(!/\D/.test(strString)) return true;//IF NUMBER

	//else if(/^\d+\.\d+$/.test(strString)) return true;//IF A DECIMAL NUMBER HAVING AN INTEGER ON EITHER SIDE OF THE DOT(.)

	else

	return false;

}

function EmailValidation(emailval)

{

	if(emailval=="")

	{

		return true;

	}

	else

	{

		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

		if(reg.test(emailval) == false)

		{

			 return false;

		}

		else

		{

			return true;

		}

	}

}



function validation(nextstepform)

{

	with(document.nextstepform)

    {

    	var errmsg="";

	    

		var illegalChars = /\W/; 

 			

		if(firstname.value=="")

		{

			errmsg="Please enter your firstname in billing address.";

		}

		if(lastname.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your lastname in billing address.";

		}

		if(address.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your address in billing address.";

		}		

		if(city.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your city in billing address.";

		}

		if(state.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your state/province in billing address.";

		}

		if(pincode.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your pincode in billing address.";

		}

		if(country.value=="")

		{

			errmsg=errmsg +'<br>' + "Please select your country in billing address.";

		}

		

		if(mobile.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your mobile number in billing address.";

		}

		if(mobile.value!="")

		{

			if(IsNumeric(mobile.value)==false)

			{

					errmsg=errmsg +'<br>' + "Please enter valid mobile number in billing address.";

			}

		}

		if(phone.value!="")

		{

			if(IsNumeric(phone.value)==false ||phone.value.length < 7)

			{

					errmsg=errmsg +'<br>' + "Please enter valid phone number in billing address.";

			}

		}

		if(email.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your email address in billing address.";

		}

		if(EmailValidation(email.value)==false)

		{

			errmsg=errmsg +'<br>' + "Please enter valid email address in billing address.";

		}

		    <?php

		    if($_SESSION['sqjeansloginuserid']=="")

		    {

			?>

			if(password.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your password.";

			}

			if(confirmpassword.value=="")

			{

				errmsg=errmsg +'<br>' + "Please enter your confirm password.";

			}

			if((password.value)!=(confirmpassword.value))

			{

				errmsg=errmsg +'<br>' + "your password and confirm password are not same.";

			}

			<?php

		     }

		     ?>

		

		for (i=0; i<document.nextstepform.shipping.length; i++)

		{

			if (document.nextstepform.shipping[i].checked==true)

			{

					checkp1 =document.nextstepform.shipping[i].value;

			}

		}

			

			if(checkp1==1)

			{	

				if(shipping_firstname.value=="")

				{

					errmsg=errmsg +'<br>' +"Please enter your firstname in shipping address.";

				}

				if(shipping_lastname.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your lastname in shipping address.";

				}

				if(shipping_address.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your address in shipping address.";

				}		

				if(shipping_city.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your city in shipping address.";

				}

				if(shipping_state.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your state/province in shipping address.";

				}

				if(shipping_pincode.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your pincode in shipping address.";

				}

				if(shipping_country.value=="")

				{

					errmsg=errmsg +'<br>' + "Please select your country in shipping address.";

				}

				if(shipping_email.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your email address in shipping address.";

				}

				if(EmailValidation(shipping_email.value)==false)

				{

					errmsg=errmsg +'<br>' + "Please enter valid email address in shipping address.";

				}

				if(shipping_mobile.value=="")

				{

					errmsg=errmsg +'<br>' + "Please enter your mobile number in shipping address.";

				}

				if(shipping_mobile.value!="")

				{

					if(IsNumeric(shipping_mobile.value)==false)

					{

							errmsg=errmsg +'<br>' + "Please enter valid mobile number in shipping address.";

					}

				}

				if(shipping_phone.value!="")

				{

					if(IsNumeric(shipping_phone.value)==false ||shipping_phone.value.length < 7)

					{

							errmsg=errmsg +'<br>' + "Please enter valid phone number in shipping address.";

					}

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

<script type="text/javascript">

function login_setFocus()

{

     document.getElementById("sqjeansemail").focus();

}

</script>

<table width="100%" border="0"  cellspacing="0" cellpadding="0">

  <tr>

    <td width="10">&nbsp;</td>

    <td align="left" valign="top">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">

    <form name="nextstepform" id="nextstepform" method="get" action="index.php">

        <tr>

          <td width="100%" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td align="center"colspan="2" ><h1>Your Cart</h1></td>

                </tr>

              <tr>

                <td valign="baseline" class="font8"><a href="process.php?action=emptycart" onClick="return confirm('Do you want to make your cart empty?')"><font color="#0000FF">&nbsp;Empty your Cart</font></a></td>

                <td width="70%" class="font8_red">NOTICE: For your convenience, your current shopping cart has been combined with your shopping cart from your last visit. Please review your shopping cart before checking out.</td>

              </tr>

            </table></td>

        </tr>

        <tr>

          <td height="10" colspan="2"></td>

        </tr>

        <?php

        if(count($_SESSION['sqjeanscart'])>5)

	    {

		?>

        <tr>

          <td height="10" colspan="2"></td>

        </tr>

        <tr>

          <td height="25" colspan="2" align="center" class="red_font9"><strong>You have more the 5 items in your cart, please remove some items.</strong></td>

        </tr>

        <tr>

         <td height="10" colspan="2"></td>

        </tr>

        <?php

		}

		?>

        <tr>

          <td colspan="2"><table width="100%" border="0" cellspacing="5" cellpadding="0" style="background-repeat:repeat-x;">

          <tr>

                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td><img src="images/step_01.png" width="157" height="44" /></td>

                    <td><img src="images/step_02.png" width="158" height="44" /></td>

                    <td><img src="images/step_03.png" width="157" height="44" /></td>

                    <td><img src="images/step1_04.png" width="158" height="44" /></td>

                  </tr>

                </table></td>

              </tr>

              <?php

			  if(($_SESSION['cartno']=="")||($_SESSION['cartno']==0))

			  {

			  		echo "<script type=\"text/javascript\">document.location.href=customjeans.html'; </script>\n";

			  }

			  while(list($key,$proobj)=each($_SESSION['sqjeanscart']))

			  {

			  $totalamount=0;

			  ?>

                 <tr>

                  <td height="10" valign="top" class="titel"></td>

                 </tr>

              <tr>

                <td><table width="100%" border="0" background="images/pgbg02a.jpg" cellpadding="0" cellspacing="0" class="border3">

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td width="27%" class="font10"><strong>Jeans For</strong></td>

                    <td width="2%" align="center"class="font10">:</td>

                    <td width="49%" class="fontblue9"><?php echo $proobj['thisjeansisfor'];?></td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Gender </strong></td>

                    <td class="font10" align="center">:</td>

                    <td class="fontblue9"><?php echo $proobj['jeansgender'];?></td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td width="1%" class="font10">&nbsp;</td>

                    <td class="font10"><strong>Fabric &amp; Wash</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td width="15%" align="right" class="font8">

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

                    <td width="5%" align="right" class="font8"><a href="index.php?object=12&action=material&selection=<?php echo $key;?>">Edit</a></td>

                    <td width="1%" align="right" class="font8">&nbsp;</td>

                  </tr>

                  

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Special Wash</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=specialwash&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Main Thread</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td rowspan="2" align="right" valign="middle" class="font8"><a href="index.php?object=12&action=thread&selection=<?php echo $key;?>">Edit</a></td>

                    <td rowspan="2" align="right" valign="middle" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Second Thread</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td height="19" class="font10">&nbsp;</td>

                    <td class="font10"><strong>Front Pocket</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td rowspan="2" align="right" valign="middle" class="font8"><a href="index.php?object=12&action=pocketstyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td rowspan="2" align="right" valign="middle" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Back Pocket</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=flystyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>
                  
                  
                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Buttons & Rivets Style</strong></td>

                    <td class="font10" align="center">:</td>

                    <td class="fontblue9"><?php

          $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$proobj['selectedbuttonrivetsstyle']."'";			

		  $recordsetbuttonrivets_style = mysql_query($query);

		  if(mysql_num_rows($recordsetbuttonrivets_style)!=0)

		  {	

			  while($rowbuttonrivets_style = mysql_fetch_array($recordsetbuttonrivets_style,MYSQL_ASSOC))

			  {

					echo "<strong></strong>".$rowbuttonrivets_style["buttonrivets_name"];

					$zipamount=$rowbuttonrivets_style["buttonrivets_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Buttons & Rivets selected";

		  }

		  ?></td>

                    <td align="right" class="font8">

                      <?php

		  if(mysql_num_rows($recordsetbuttonrivets_style)!=0)

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=buttonrivetsstyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  
  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>belt Style</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=beltstyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>
                  
                    <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>loops Style</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=loopsstyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>
                  
                  
                    <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>embroidery Style</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8"><a href="index.php?object=12&action=embroiderystyle&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>
                  
                  

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Measurement Type</strong></td>

                    <td class="font10" align="center">:</td>

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

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <?php

				  if($proobj['jeansselectedtype']==1)

				  {

				  ?>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td class="font10"><strong>Fitting Style</strong></td>

                    <td class="font10" align="center">:</td>

                    <td class="fontblue9"><?php echo $proobj['jeansfittingstyle'];?></td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <?php

				  }

				  ?>

                  <tr>

                    <td class="font10">&nbsp;</td>

                    <td height="20" colspan="3" class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="border3">

  <tr>

    <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

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

                        <td class="font9"><strong><?php echo $rowmeasurement["measurement_name"];?></strong></td>

                        <td width="45%" class="fontblue9"><?php echo $proobj["savemeasurement".$m];?></td>

                        </tr>

                      <?php			 

			 $m++;

			 }

			 ?>

                    </table></td>

    <td width="1%" valign="top">&nbsp;</td>

    <td width="33%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

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

                    <td height="20" align="right" class="font8"><a href="index.php?object=12&action=measurement&selection=<?php echo $key;?>">Edit</a></td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  

                  

                  <tr>

                    <td height="19" class="font10">&nbsp;</td>

                    <td valign="top" class="font10"><strong>Speical Note</strong></td>

                    <td class="font10">:</td>

                    <td valign="top" class="font10"><span class="fontblue9">

                      <?php

                    echo $proobj['jeansspecialnote'];

					?>

                      </span></td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                    <td align="right" class="font8">&nbsp;</td>

                  </tr>

                  <tr>

                    <td height="25" colspan="7" class="font10"><table width="100%" border="0" cellpadding="0" cellspacing="0" >

                      

                      <tr>

                        <td width="27%" align="left" class="font10"><strong>&nbsp;&nbsp;Extra Cost for large size</strong></td>

                        <td width="6%" align="center" class="font10">:</td>

                        <td width="53%" align="left" class="fontblue9"><?php

						if($proobj["savemeasurement3"]<=38.00)

						{

							$extracost=0.00;

							echo 'Waist up to 38.00" (No Extra Cost)';						

						}

						elseif(($proobj["savemeasurement3"]>38.00)&&($proobj["savemeasurement3"]<=44.00))

						{

							$extracost=4.00;

							echo 'Waist over 38.00" to 44.00" (4.00 US $ Extra)';												

						}

						elseif(($proobj["savemeasurement3"]>44.00)&&($proobj["savemeasurement3"]<=50.00))

						{

							$extracost=8.00;	

							echo 'Waist over 44.00" to 50.00" (8.00 US $ Extra)';					

						}

						elseif($proobj["savemeasurement3"]>50.00)

						{

							$extracost=12.00;	

							echo 'Waist over 50.00" (12 US $ Extra)';					

						}

						?></td>

                        <td width="13%" align="right" valighclass="font10"><?php

					

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

                        <td width="1%" align="right" class="font10">&nbsp;</td>

                        </tr>

                      <tr>

                        <td height="20" colspan="2" align="left" bgcolor="#E7AF78" class="red_font9">&nbsp;&nbsp;<a href="process.php?action=removefromcart&selection=<?php echo $key;?>" onClick="return confirm('Do you want to delete selected item from cart?')" class="red_font9"><strong class="red_font9">Remove from cart</strong></a></td>

                        <td align="right" bgcolor="#E7AF78" class="font10"><strong>Total :</strong></td>

                        <td align="right" bgcolor="#E7AF78" class="font10"><strong>

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

                        <td align="right" bgcolor="#E7AF78" class="font10">&nbsp;</td>

                        </tr>

                      </table></td>

                  </tr>

                  

                  </table></td>

              </tr>

              <tr>

                <td height="5"></td>

              </tr>

              <?php

			  }

			  ?>

              



            </table></td>

        </tr>



        <tr>

          <td height="10" colspan="2" align="right"></td>

        </tr>

        <tr>

          <td colspan="2" align="right"> 

          <table width="100%" border="0" cellspacing="0" cellpadding="5">

              <tr>

                <td width="50%" align="left">

                <?php

				if(count($_SESSION['sqjeanscart'])<5)

				{

				?>

                <a href="process.php?action=continueshopping"><img src="images/continueshopping.png" width="156" height="29" border="0" /></a>

                <?php

				}

				?>                </td>

                <td align="right">

                <?php

				if(count($_SESSION['sqjeanscart'])<=5)

				{

				?>

                <input type="hidden" name="object" value="24" />        

				  <input name="button" type="submit" class="titel" id="button" value="Proceed" onclick="return validation(this.form);" style="cursor:pointer;"/>

                <?php

				}

				else

				{

				?>

                <strong class="red_font9">Please remove <?php echo mysql_num_rows($recordsetselected)-5;?> from cart to proceed to payment.</strong>

                <?php

				}

				?>                  </td>

              </tr>

              <tr>

                <td align="left" class="font10">

                  <p>

                    <?php

				if(count($_SESSION['sqjeanscart'])<5)

				{

				?>

                    <strong>Order More Jeans & Get Benefit on Shipping</font></strong><br />

                    <span class="Step">More then one jeans will reduce the cost of shipping per jeans. You may order jeans for anyone in your family or your friend with your order. You can order up to 5 jeans per cart order.</span></p>

                  <a href=" shipping rates.html" target="_blank"><B>Shipping Rates Information</B></a>

                  </p>

                  <?php

				  }

				  ?>

                  </td>

                <td align="right">&nbsp;</td>

              </tr>

        	</table>          </td>

        </tr>

        <tr>

          <td height="5" colspan="2" align="left"></td>

        </tr>

        </form>

    </table></td>

    <td width="10">&nbsp;</td>

  </tr>

</table>

<?php

}

?>

