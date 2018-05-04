<table width="99%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>

<table border="0" cellpadding="0" cellspacing="10" width="100%">
<tbody>
 <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Land Transfer Tax Calculator</strong></td>
                              </tr>
                                </table></td>
</tr>
<tr>
<td class="black10" style=" padding-top: 6px; padding-left: 6px; padding-right: 6px; padding-bottom: 6px;" valign="top">
<table border="0" cellpadding="0" cellspacing="10" width="100%">
<tbody><tr>
<td style=" padding-top: 0px; padding-left: 0px; padding-right: 6px; padding-bottom: 0px;"  class="black10" valign="top">Use
 the form below to calculate the amount of land transfer tax you will 
have to pay.&nbsp; Land transfer tax is&nbsp;applied on the sale price 
only.</td>
<td align="right" valign="top">&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table><script language="javascript">

function numberFilter (s) {
filteredValues = "1234567890";     // Characters stripped out
var i;
var returnString = "";
for (i = 0; i < s.length; i++) {  // Search through string and append to unfiltered values to returnString.
var c = s.charAt(i);
if (filteredValues.indexOf(c) != -1) returnString += c;
}
	return returnString;
}

function calculate(){
	price = numberFilter(document.calculator.price.value);
	leftt = price;
	total_tax = 0;
	toronto_tax = 0;


	if (price > 55000){
		tmp_tax = 55000 * 0.005;
		total_tax += tmp_tax;
		price -= 55000;
	} else {
		tmp_tax = price * 0.005;
		total_tax += tmp_tax;
		price = 0;
	}


	if (price > 195000){
		tmp_tax = 195000 * 0.01;
		total_tax += tmp_tax;
		price -= 195000;
	} else {
		tmp_tax = price * 0.01;
		total_tax += tmp_tax;
		price = 0;
	}


	if (price > 150000){
		tmp_tax = 150000 * 0.015;
		total_tax += tmp_tax;
		price -= 150000;
	} else {
		tmp_tax = price * 0.015;
		total_tax += tmp_tax;
		price = 0;
	}

	if (price > 0){
		tmp_tax = price * 0.02;
		total_tax += tmp_tax;
		price = 0;
	}

	if (document.calculator.firsttimehomebuyer.checked==true){
		if (total_tax > 2000)
			total_tax = total_tax - 2000;
		else
			total_tax = 0;
	}
	total_tax = Math.round(total_tax);
	if (document.calculator.torontopurchase.checked==true){
		if (leftt > 55000){
			toronto_tax = 275;
			leftt = leftt - 55000;
		} else {
			toronto_tax = leftt * .005;
			leftt = 0;
		}


		if (leftt > 345000){
			toronto_tax = toronto_tax + 3450;
			leftt = leftt - 345000;
		} else {
			toronto_tax = toronto_tax + (leftt * .01);
			leftt = 0;
		}

		if (document.calculator.firsttimehomebuyer.checked==true)
			toronto_tax = 0;

		if (leftt > 0){
			toronto_tax = toronto_tax + (leftt * .02);
		}
		toronto_tax = Math.round(toronto_tax);
		total_tax = total_tax + toronto_tax;
	}

	document.calculator.tax.value = total_tax;

}


</script>

<form name="calculator">
<table width="445" border="0" cellpadding="0" cellspacing="10">
<tbody>
<tr>
                            <td class="title_red" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Land Transfer Tax Calculator</strong></td>
                                    </tr>
                                </table></td>
</tr>
<tr>
<td width="39%" class="black10">Purchase Price:</td>
<td width="61%" class="black10">$<input size="30" class="input" name="price" type="text"></td>
</tr>
<tr>
<td colspan="2" class="black10"><input class="input" value="1" name="firsttimehomebuyer" type="checkbox">  I am a first time home buyer</td>
</tr>
<tr>
<td colspan="2" class="black10"><input class="input" value="1" name="torontopurchase" type="checkbox"> I am purchasing a property located in Toronto</td>
</tr>

<tr>
<td colspan="2" align="left" class="black10"><input class="button" value="Calculate" onClick="calculate();" type="button"></td>
</tr>

<tr>
<td class="black10">Total Land Transfer Tax:</td>
<td class="black10">$<input size="30" class="input" name="tax" type="text"></td>
</tr>
</tbody></table>
</form>
</td>
                    </tr>
<tr><td><table border="0" cellpadding="0" cellspacing="10">
  <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Ontario Land Transfer Tax Explained</strong></td>
                                    </tr>
                                </table></td>
</tr>
<tr><td class="black10">0.5% - on the first $55,000</td></tr>
<tr><td class="black10">1.0% - on portion between $55,000 - $250,000</td></tr>
<tr><td class="black10">1.5% - on balance over $250,000</td></tr>
<tr><td class="black10">2.0% - on anything over $400,000</td></tr>
<tr><td class="black10">Qualifying first time buyers receive up to a $2000 credit</td></tr>
 <tr>
                            <td width="71%" class="title_red"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>Toronto Land Transfer Tax Explained</strong></td>
                                    </tr>
                                </table></td>
</tr>
<tr><td class="black10">0.5% - on the first $55,000</td></tr>
<tr><td class="black10">1.0% - on portion between $55,000 - $400,000</td></tr>
<tr><td class="black10">2.0% - on anything over $400,000</td></tr>
<tr><td class="black10">First time buyers are exempt on the first $400,000</td></tr>
</table></td></tr>
                </table>