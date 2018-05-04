<link href="css/home.css" rel="stylesheet" type="text/css" /> 

 <?php

if($_REQUEST["step"]==2)

{

		$query="SELECT * FROM thread_master where thread_available=1 and thread_default=1";			

		$recordsetthread = mysql_query($query);

		while($rowthread = mysql_fetch_array($recordsetthread,MYSQL_ASSOC))

		{	

			if($_SESSION['selectedthread_main']=="")

			{

				$_SESSION['selectedthread_main']=$rowthread["thread_ID"];

			}

			if($_SESSION['selectedthread_second']=="")

			{

				$_SESSION['selectedthread_second']=$rowthread["thread_ID"];

			}

		}

		

		$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=1 and pocket_style_default=1";			

		$recordsetpocket_style = mysql_query($query);

		while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

		{

			if($_SESSION['selectedprocketstyle']=="")

			{

				$_SESSION['selectedprocketstyle']=$rowpocket_style["pocket_style_ID"];

			}

		}

		

		$query="SELECT * FROM pocket_style_master where pocket_style_available=1 and pocket_style_type=2 and pocket_style_default=1";			

		$recordsetpocket_style = mysql_query($query);

		while($rowpocket_style = mysql_fetch_array($recordsetpocket_style,MYSQL_ASSOC))

		{	

			if($_SESSION['selectedprocketstyle_back']=="")

			{

				$_SESSION['selectedprocketstyle_back']=$rowpocket_style["pocket_style_ID"];

			}

		}

		

		$query="SELECT * FROM fly_style_master where fly_style_available=1 and fly_style_default=1";			

		$recordsetfly_style = mysql_query($query);

		while($rowfly_style = mysql_fetch_array($recordsetfly_style,MYSQL_ASSOC))

		{

			if($_SESSION['selectedflystyle']=="")

			{

				$_SESSION['selectedflystyle']=$rowfly_style["fly_style_ID"];

			}

		}
		
		
		$query="SELECT * FROM buttonrivets_master where buttonrivets_available=1 and buttonrivets_default=1";			

		$recordsetbuttonrivets = mysql_query($query);

		while($rowbuttonrivets = mysql_fetch_array($recordsetbuttonrivets,MYSQL_ASSOC))

		{

			if($_SESSION['selectedbuttonrivetsstyle']=="")

			{

				$_SESSION['selectedbuttonrivetsstyle']=$rowbuttonrivets["buttonrivets_ID"];

			}

		}
		
		
		$query="SELECT * FROM belt_style_master where belt_style_available=1 and belt_style_default=1";			

		$recordsetbelt_style = mysql_query($query);

		while($rowbelt_style = mysql_fetch_array($recordsetbelt_style,MYSQL_ASSOC))

		{

			if($_SESSION['selectedbeltstyle']=="")

			{

				$_SESSION['selectedbeltstyle']=$rowbelt_style["belt_style_ID"];

			}

		}
		
		
		$query="SELECT * FROM loops_style_master where loops_style_available=1 and loops_style_default=1";			

		$recordsetloops_style = mysql_query($query);

		while($rowloops_style = mysql_fetch_array($recordsetloops_style,MYSQL_ASSOC))

		{

			if($_SESSION['selectedloopsstyle']=="")

			{

				$_SESSION['selectedloopsstyle']=$rowloops_style["loops_style_ID"];

			}

		}
		
		
		$query="SELECT * FROM embroidery_style_master where embroidery_style_available=1 and embroidery_style_default=1";			

		$recordsetembroidery_style = mysql_query($query);

		while($rowembroidery_style = mysql_fetch_array($recordsetembroidery_style,MYSQL_ASSOC))

		{

			if($_SESSION['selectedembroiderystyle']=="")

			{

				$_SESSION['selectedembroiderystyle']=$rowembroidery_style["embroidery_style_ID"];

			}

		}

}

?>

<script language="javascript">

function calculate_threadelected(d_n, f_n, fm) 

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

	

	getoutput(f_n+'?'+m,d_n)

	

	return false;

}

function calculate_youselected(d_n, f_n, fm) 

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

	

	getoutput(f_n+'?'+m,d_n)

	

	return false;

}

function getoutput(url,resultpan)

{

//	alert("xml1");

	var xmlchat = initxmlhttp() ;

	var m = document.getElementById(resultpan);

	m.innerHTML = "<div id='loading'></div>";

	xmlchat.open( "GET", url, true ) ;

	xmlchat.onreadystatechange=function()

	{

		//alert("hi");

		if (xmlchat.readyState==4)

		{

			var m = document.getElementById(resultpan);

			m.innerHTML = xmlchat.responseText;

			

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

 	    if (window.XMLHttpRequest) 

		{

                xmlhttp = new XMLHttpRequest();

           //    xmlHttpReq.overrideMimeType('text/xml');

        }

        // IE

        else if (window.ActiveXObject) 

		{

                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

        }

		return xmlhttp ;

}

</script>

<?php

$totalamount=0.00;

?>

<script language="JavaScript">

function updatecurrency()

{

	var selectedcur="";

	with(document.currencyform)

    {   	

		for (i=0; i<document.currencyform.currency.length; i++)

		{

				if (document.currencyform.currency[i].checked==true)

				{

					selectedcur =document.currencyform.currency[i].value;

				}

		}

		window.location.href = "currency/index.php?currency="+selectedcur;

	}

}

</script>	

<table width="100%" border="0" cellspacing="0" cellpadding="0"  >

 <?php

  if($_SESSION['sqjeansloginuseremail']!="")

  {

  ?>   

                  <tr>

                    <td>&nbsp;</td>

                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="10">&nbsp;</td>

        <td background="images/cart.jpg" style="background-repeat:no-repeat;"><table border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td width="18">&nbsp;</td>

            <td><table border="0" align="center" cellpadding="5" cellspacing="0">

              <tr>

                <td align="left" class="font10"><strong><?php

						$recordsetselected = mysql_query("select * from bill_selected_records

INNER JOIN bill_master ON bill_master.bill_master_ID=bill_selected_records.bill_master_ID							 

where 

bill_email_id='".$_SESSION['sqjeansloginuseremail']."' and

bill_payment_status!='Completed' and

bill_payment_status!='Pending'

",$cn);

						if(mysql_num_rows($recordsetselected)==0)

						{

							echo "Your cart is empty";

						}

						else

						{

						?>

									  <a href="index.php?object=25">You have <?php echo mysql_num_rows($recordsetselected);?> item<?php if(mysql_num_rows($recordsetselected)>1) { ?>s<?php } ?> in your cart</a>

									  <?php

						}

						?></strong></td>

              </tr>

            </table></td>

          </tr>

        </table></td>

      </tr>

    </table></td>

                  </tr>

                  <tr>

                    <td colspan="2" height="10"></td>

                  </tr>

                  <?php

				  }

				  ?>

                  <tr>

                    <td>&nbsp;</td>

                    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">

        <tr>

          <td width="0" height="19">&nbsp;</td>

          <td align="left" valign="top"><?php 

		  if($_REQUEST["object"]==23)

		  {

		  		include("signin.php");	

		  }

		  elseif(($_REQUEST["object"]==2)&&($_REQUEST["step"]==4))

		  {

		  		include("signin.php");	

		  }

		  else

		  {

		  		include("login.php");

		  }?></td>

        </tr>

      </table></td>

      </tr>

      

               

                 <tr>

                    <td align="left" valign="top" colspan="2" height="10"></td>

                  </tr>

                  <tr>

                    <td>&nbsp;</td>

                    <td align="center" valign="top" style="background-repeat:repeat-x; background-position:center 10%">

                    <table border="0" align="center" cellpadding="5" cellspacing="0">

                    <form name="currencyform" method="post" action="#">

                      <tr>

                        <td class="font10"><strong>Currency</strong></td>

                        <td class="titel_1"><strong>:</strong></td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="usd" onclick="updatecurrency()" <?php if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]=="")) { ?> checked="checked" <?php } ?>/></td>

                        <td align="center" class="font10">USD</td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="inr" onclick="updatecurrency()" <?php if($_SESSION["currentselectedcurrency"]=="INR") { ?> checked="checked" <?php } ?>/></td>

                        <td align="center" class="font10">INR</td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="euro" onclick="updatecurrency()" <?php if($_SESSION["currentselectedcurrency"]=="EUR") { ?> checked="checked" <?php } ?>/></td>

                        <td align="center" class="font10">EURO</td>

                      </tr>

                      </form>

                    </table></td>

                  </tr>

 

                  

                   

                  <tr>

                    <td width="10">&nbsp;</td>

                    <td height="200" align="left" valign="top" style="background-position:center 10%">

                    <div id="ResultPanel_youselected"> 

                    <table width="100%" border="0" cellspacing="0" cellpadding="0" background="images/pgbg02b.jpg" class="border3">

  <tr>

    <td height="40" colspan="2" align="center" class="titel"> You Selected</td>

  </tr>

  

  

  <tr>

    <td colspan="2" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

        <tr>

          <td colspan="2" class="font9">&nbsp;<strong>Fabric &amp; Wash</strong></td>

        </tr>

        

        <tr>

          <td width="75%" class="fontblue9">&nbsp;<?php

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

          <td width="25%" align="right" class="fontblue9">		  

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

          <td width="75%" class="fontblue9">&nbsp;<?php

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

          <td width="25%" align="right" class="fontblue9">

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

          <td width="25%" align="right" class="fontblue9">

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

		  ?>           </td>

        </tr>

        

        <tr>

          <td class="font9"><strong>&nbsp;Fly Style :</strong></td>

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

          <td class="font9"><strong>&nbsp;buttons & Rivets Style :</strong></td>

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

		  		echo "No Buttons & Rivets Style selected";

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

          <td class="font9"><strong>&nbsp;Belt Style :</strong></td>

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

          <td class="font9"><strong>&nbsp;Loops Style :</strong></td>

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

          <td class="font9"><strong>&nbsp;Embroidery Style :</strong></td>

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

		  		echo "No embroidery Style selected";

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
      </table></td>

  </tr>

  <tr>

    <td align="right" valign="top" class="font10"><strong>Total : </strong></td>

    <td width="40%" align="right" valign="top" class="fontblue">

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

                      </div>                      </td>

                    </tr>

                  <tr>

                    <td>&nbsp;</td>

                    <td align="left" valign="top" >&nbsp;</td>

                  </tr>

              

              

<tr>

              <td width="10">&nbsp;</td>

                <td><?php include("left info.php");?></td>

              </tr>    

                      

 

                  

                 </table>

