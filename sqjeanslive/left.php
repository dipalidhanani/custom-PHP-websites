

<link href="css/home.css" rel="stylesheet" type="text/css" /> <script language="JavaScript">

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

<table width="100%"  cellspacing="0" cellpadding="5" >

  <?php

  if($_SESSION['sqjeansloginuseremail']!="")

  {

  ?>

  <tr>

    <td align="left" valign="middle" class="font10"><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td width="20">&nbsp;</td>

        <td background="images/cart.jpg" style="background-repeat:no-repeat;"><table border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td width="18">&nbsp;</td>

            <td><table border="0" align="center" cellpadding="0" cellspacing="5">

              <tr>

                <td align="left"><strong><?php

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

                  <a href="mycart.html">You have <?php echo mysql_num_rows($recordsetselected);?> item<?php if(mysql_num_rows($recordsetselected)>1) { ?>s<?php } ?> in your cart</a>

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

    <td height="10"></td>

  </tr>

  <?php

  }

  ?>

  <tr>

    <td><table width="100%" border="0" bordercolor="#ff0000"cellspacing="0" cellpadding="0"  >

        <tr>

          <td width="10">&nbsp;</td>

          <td align="left" valign="top"><?php 

		  if(($_REQUEST["object"]==23)||($_REQUEST["object"]==24))

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

    <td height="15"></td>

  </tr>







  <tr>

    <td><table width="90%" border="0" align="left" cellpadding="0" cellspacing="0" class="space1">

                    <form name="currencyform" method="post" action="#">

                      <tr>

                        <td class="font10"><strong>Currency</strong></td>

                        <td class="titel_1"><strong>:</strong></td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="usd" onclick="updatecurrency()" <?php if(($_SESSION["currentselectedcurrency"]=="USD")||($_SESSION["currentselectedcurrency"]=="")) { ?> checked="checked" <?php } ?>/></td>

                        <td align="left" class="font10">USD</td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="inr" onclick="updatecurrency()" <?php if($_SESSION["currentselectedcurrency"]=="INR") { ?> checked="checked" <?php } ?>/></td>

                        <td align="left" class="font10">INR</td>

                        <td align="center" class="font10"><input type="radio" name="currency" value="euro" onclick="updatecurrency()" <?php if($_SESSION["currentselectedcurrency"]=="EUR") { ?> checked="checked" <?php } ?>/></td>

                        <td align="left" class="font10">EURO</td>

                      </tr>

                      </form>

                    </table></td>

                   </tr>

              

              

              <tr>

                <td><?php include("left info.php");?></td>

              </tr>    

          </table>







                  

