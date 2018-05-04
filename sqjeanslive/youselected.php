<?php

session_start();

require_once("include/config.php");

require_once("include/function.php");

u_Connect("cn");

?>

<?php

//echo $_REQUEST['selectedmatirial'];

if($_REQUEST['selectedmatirial']!="")

{

	unset($_SESSION['selectedmaterialid']);

	$_SESSION['selectedmaterialid']=$_REQUEST['selectedmatirial'];

}

if($_REQUEST['selectedspecialwash']!="")

{

	unset($_SESSION['selectedspecialwash']);

	$_SESSION['selectedspecialwash']=$_REQUEST['selectedspecialwash'];

}

if($_REQUEST['selectedthread_main']!="")

{

	unset($_SESSION['selectedthread_main']);

	$_SESSION['selectedthread_main']=$_REQUEST['selectedthread_main'];

}

if($_REQUEST['selectedthread_second']!="")

{

	unset($_SESSION['selectedthread_second']);

	$_SESSION['selectedthread_second']=$_REQUEST['selectedthread_second'];

}

if($_REQUEST['selectedprocketstyle']!="")

{

	unset($_SESSION['selectedprocketstyle']);

	$_SESSION['selectedprocketstyle']=$_REQUEST['selectedprocketstyle'];

}

if($_REQUEST['selectedprocketstyle_back']!="")

{

	unset($_SESSION['selectedprocketstyle_back']);

	$_SESSION['selectedprocketstyle_back']=$_REQUEST['selectedprocketstyle_back'];

}

if($_REQUEST['selectedflystyle']!="")

{

	unset($_SESSION['selectedflystyle']);

	$_SESSION['selectedflystyle']=$_REQUEST['selectedflystyle'];

}
if($_REQUEST['selectedbuttonrivetsstyle']!="")

{

	unset($_SESSION['selectedbuttonrivetsstyle']);

	$_SESSION['selectedbuttonrivetsstyle']=$_REQUEST['selectedbuttonrivetsstyle'];

}

if($_REQUEST['selectedbeltstyle']!="")

{

	unset($_SESSION['selectedbeltstyle']);

	$_SESSION['selectedbeltstyle']=$_REQUEST['selectedbeltstyle'];

}
if($_REQUEST['selectedloopsstyle']!="")

{

	unset($_SESSION['selectedloopsstyle']);

	$_SESSION['selectedloopsstyle']=$_REQUEST['selectedloopsstyle'];

}
if($_REQUEST['selectedembroiderystyle']!="")

{

	unset($_SESSION['selectedembroiderystyle']);

	$_SESSION['selectedembroiderystyle']=$_REQUEST['selectedembroiderystyle'];

}


$totalamount=0.00;

?>

<table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/pgbg02b.jpg" class="border3">

  <tr>

    <td height="40" colspan="2" align="center" class="titel"> You Selected</td>

  </tr>

  

  <tr>

    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

        <tr>

          <td colspan="2" class="font9">&nbsp;<strong>Fabric & Wash</strong></td>

        </tr>

        

        <tr>

          <td width="76%" class="fontblue9">&nbsp;<?php

			$query="SELECT * FROM material_wash_treatment_relation

			INNER JOIN material_master ON material_master.material_ID=material_wash_treatment_relation.material_master_ID

			INNER JOIN wash_treatment_master ON 

			wash_treatment_master.wash_treatment_ID=material_wash_treatment_relation.wash_treatment_master_ID

			where material_wash_treatment_relation.mw_realtion_ID='".$_SESSION['selectedmaterialid']."'

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

			

			?>            </td>

          <td width="24%" align="right" class="fontblue9">		  

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

					echo "INR ";

					printf("%.2f",$materialamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$materialamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		   ?></td>

        </tr>

        

        <tr>

          <td colspan="2" class="font9">&nbsp;<strong>Special Wash</strong></td>

        </tr>

        

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM special_wash_master where special_wash_ID='".$_SESSION['selectedspecialwash']."' and special_wash_available=1";			

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

		  ?>          </td>

          <td align="right" class="fontblue9">

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

					echo "INR ";

					printf("%.2f",$washamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$washamount*$_SESSION["currentselectedcurrencyamount"]);

				}

		  }

		   ?>          </td>

        </tr>

    </table></td>

  </tr>

  <tr>

    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

        <tr>

          <td colspan="2" class="font9">&nbsp;<strong>Thread </strong></td>

        </tr>

        

        <tr>

          <td colspan="2" class="fontblue9">&nbsp;Main Thread : 

		  <?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$_SESSION["selectedthread_main"]."'";			

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

          ?>          </td>

          </tr>

        

        <tr>

          <td colspan="2" class="fontblue9">&nbsp;Second Thread : 

		  <?php

		  $query="SELECT * FROM thread_master where thread_available=1 and thread_ID='".$_SESSION["selectedthread_second"]."'";			

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

          ?>		  </td>

          </tr>

        

        <tr>

          <td colspan="2" class="font9">&nbsp;<strong>Pocket Style</strong></td>

        </tr>

        

        <tr>

          <td width="76%" class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$_SESSION['selectedprocketstyle']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	

			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "Front : ".$rowpocket_style["pocket_style_name"];

					$pocketamount=$rowpocket_style["pocket_style_additional_charge"];

					$totalamount=$totalamount+$pocketamount;

			  }

		  }

		  else

		  {

		  		echo "No Front Pocket Style selected";

		  }

		  ?>          </td>

          <td width="24%" align="right" class="fontblue9">

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

					echo "INR ";

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

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_ID='".$_SESSION['selectedprocketstyle_back']."' ";			

		  $recordsetpocket_style = mysql_query($query);

		  if(mysql_num_rows($recordsetpocket_style)!=0)

		  {	

			  while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

			  {

					echo "Back : ".$rowpocket_style["pocket_style_name"];

					$pocketamount_back=$rowpocket_style["pocket_style_additional_charge"];

					$totalamount=$totalamount+$pocketamount_back;

			  }

		  }

		  else

		  {

		  		echo "No Back Pocket Style selected";

		  }

		  ?>          </td>

          <td width="24%" align="right" class="fontblue9">

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

					echo "INR ";

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

          <td class="font9">&nbsp;<strong>Fly Style : </strong></td>

          <td align="right" class="font9">&nbsp;</td>

        </tr>

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_ID='".$_SESSION["selectedflystyle"]."'";			

		  $recordsetfly_style = mysql_query($query);

		  if(mysql_num_rows($recordsetfly_style)!=0)

		  {	

			  while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))

			  {

					echo $rowfly_style["fly_style_name"];

					$zipamount=$rowfly_style["fly_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Fly Style selected";

		  }

		  ?></td>

          <td align="right" class="fontblue9"><?php

		  if(mysql_num_rows($recordsetfly_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}				

		  }

		  ?></td>

        </tr>
        <tr>

          <td class="font9">&nbsp;<strong>Buttons & Rivets Style : </strong></td>

          <td align="right" class="font9">&nbsp;</td>

        </tr>

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_ID='".$_SESSION["selectedbuttonrivetsstyle"]."'";			

		  $recordsetbuttonrivets = mysql_query($query);

		  if(mysql_num_rows($recordsetbuttonrivets)!=0)

		  {	

			  while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))

			  {

					echo $rowbuttonrivets["buttonrivets_name"];

					$zipamount=$rowbuttonrivets["buttonrivets_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No buttonrivets Style selected";

		  }

		  ?></td>

          <td align="right" class="fontblue9"><?php

		  if(mysql_num_rows($recordsetbuttonrivets)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}				

		  }

		  ?></td>

        </tr>
        <tr>

          <td class="font9">&nbsp;<strong>belt Style : </strong></td>

          <td align="right" class="font9">&nbsp;</td>

        </tr>

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_ID='".$_SESSION["selectedbeltstyle"]."'";			

		  $recordsetbelt_style = mysql_query($query);

		  if(mysql_num_rows($recordsetbelt_style)!=0)

		  {	

			  while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))

			  {

					echo $rowbelt_style["belt_style_name"];

					$zipamount=$rowbelt_style["belt_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No belt Style selected";

		  }

		  ?></td>

          <td align="right" class="fontblue9"><?php

		  if(mysql_num_rows($recordsetbelt_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}				

		  }

		  ?></td>

        </tr>
         <tr>

          <td class="font9">&nbsp;<strong>Loops Style : </strong></td>

          <td align="right" class="font9">&nbsp;</td>

        </tr>

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_ID='".$_SESSION["selectedloopsstyle"]."'";			

		  $recordsetloops_style = mysql_query($query);

		  if(mysql_num_rows($recordsetloops_style)!=0)

		  {	

			  while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))

			  {

					echo $rowloops_style["loops_style_name"];

					$zipamount=$rowloops_style["loops_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No loops Style selected";

		  }

		  ?></td>

          <td align="right" class="fontblue9"><?php

		  if(mysql_num_rows($recordsetloops_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}				

		  }

		  ?></td>

        </tr>
		<tr>

          <td class="font9">&nbsp;<strong>Embroidery Style : </strong></td>

          <td align="right" class="font9">&nbsp;</td>

        </tr>

        <tr>

          <td class="fontblue9">&nbsp;<?php

          $query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_ID='".$_SESSION["selectedembroiderystyle"]."'";			

		  $recordsetembroidery_style = mysql_query($query);

		  if(mysql_num_rows($recordsetembroidery_style)!=0)

		  {	

			  while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))

			  {

					echo $rowembroidery_style["embroidery_style_name"];

					$zipamount=$rowembroidery_style["embroidery_style_additional_charge"];

					$totalamount=$totalamount+$zipamount;

			  }

		  }

		  else

		  {

		  		echo "No Embroidery Style selected";

		  }

		  ?></td>

          <td align="right" class="fontblue9"><?php

		  if(mysql_num_rows($recordsetembroidery_style)!=0)

		  {

		  		if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$zipamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$zipamount*$_SESSION["currentselectedcurrencyamount"]);

				}				

		  }

		  ?></td>

        </tr>
        <?php

		if($_REQUEST["measurement3"]!="")

		{

		?>

        <tr>

          <td class="font9">&nbsp;<strong>Extra Cost for large size: </strong><br/>&nbsp;<?php

						if($_REQUEST["measurement3"]<=38.00)

						{

							$extracost=0.00;

							echo 'Waist up to 38.00" (No Extra Cost)';						

						}

						elseif(($_REQUEST["measurement3"]>38.00)&&($_REQUEST["measurement3"]<=44.00))

						{

							$extracost=4.00;

							echo 'Waist over 38.00" to 44.00" (4.00 US $ Extra)';												

						}

						elseif(($_REQUEST["measurement3"]>44.00)&&($_REQUEST["measurement3"]<=50.00))

						{

							$extracost=8.00;	

							echo 'Waist over 44.00" to 50.00" (8.00 US $ Extra)';					

						}

						elseif($_REQUEST["measurement3"]>50.00)

						{

							$extracost=12.00;	

							echo 'Waist over 50.00" (12 US $ Extra)';					

						}

						?></td>

          <td align="right" class="fontblue9"><?php

					

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

					?></td>

        </tr>

        <?php

		}

		?>

    </table></td>

  </tr>

  <tr>

    <td align="right" valign="top" class="font10"><strong>Total : </strong></td>

    <td width="40%" align="right" valign="top"  class="fontblue">

    <strong><?php

				if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]==""))

				{

					echo "$ ";

					printf("%.2f",$totalamount);

				}

				if($_SESSION["currentselectedcurrency"]=="INR")

				{

					echo "INR ";

					printf("%.2f",$totalamount*$_SESSION["currentselectedcurrencyamount"]);

				}

				if($_SESSION["currentselectedcurrency"]=="EUR")

				{

					echo "&euro; ";

					printf("%.2f",$totalamount*$_SESSION["currentselectedcurrencyamount"]);

				}	

	?></strong>    </td>

  </tr>

</table>

