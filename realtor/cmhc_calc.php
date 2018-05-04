<script language="javascript">

function calculate_cmhc(price, down_payment, update_cmhc_field, update_pst_field){
	percent_down = 0;
	percent_financed = 0;
	left_over = 0;
	total_cmhc = 0;
	total_pst = 0;

	no_good = 0;
	if (price == "")
		price = 0;
	if (down_payment == "")
		down_payment = 0;

	percent_down = down_payment / price * 100;
	left_over = price - down_payment;

	if (isNaN(parseFloat(price))){
		no_good = 1;
	}
	if (isNaN(parseFloat(down_payment))){
		no_good = 1;
	}

	if (no_good){
		alert('Values must be numeric only.');
	} else {
		percent_financed = 100 - percent_down;

		if (percent_financed > 95){
			// 
			total_cmhc = left_over * 0.031;
		} else if (percent_financed > 90){
			//
			total_cmhc = left_over * 0.0275;
		} else if (percent_financed > 85){
			//
			total_cmhc = left_over * 0.02;
		} else if (percent_financed > 80){
			//
			total_cmhc = left_over * 0.0175;
/*
		} else if (percent_financed > 75){
			//
			total_cmhc = left_over * 0.01;
		} else if (percent_financed > 65){
			//
			total_cmhc = left_over * 0.65;
*/
		} else {
			total_cmhc = 0;
		}
			

			
/*
		if (percent_down == 0){
			total_cmhc = left_over * 0.0375;
		} else if (percent_down <= 5){
			total_cmhc = left_over * 0.0275;
		} else if (percent_down <= 10){
			total_cmhc = left_over * 0.02;
		} else if (percent_down <= 15){
			total_cmhc = left_over * 0.0175;
		} else if (percent_down <= 20){
			total_cmhc = left_over * 0.01;
		} else {
			total_cmhc = 0;
		}
*/
		total_cmhc = Math.round(total_cmhc, 2);
		total_pst = Math.round((total_cmhc * .08), 2);
		
		update_cmhc_field.value = total_cmhc;
		update_pst_field.value = total_pst;
	}
}

</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
<table border="0" cellpadding="0" cellspacing="10">
<tr><td>
<form name="cmhc">
<table border="0" cellpadding="5" cellspacing="0">
	<tbody>
    <tr>
                            <td width="18%" class="title_red" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td width="25"><img src="images/arrow1.png" width="19" height="18"></td>
                                    <td class="title_red"><strong>CMHC Calculator</strong></td>
                              </tr>
                                </table></td>
</tr>

<tr><td class="black11" colspan="2"><strong>About Mortgage Insurance</strong></td></tr>
<tr><td class="black10" colspan="2">
Financial institutions are required by law to insure all mortgages 
with a loan to value ratio of less than 80%. This insurance protects the
 lender against borrower default.
 </td></tr>
 <tr><td class="black10" colspan="2">
<strong>Note: Provicial Sales Tax (8%) is applicable on mortgage 
insurance premiums, is due the date of closing, and is not rolled into a
 mortgage.  Mortgage insurance premiums are exempt from the full 
Harmonized Sales Tax.</strong>
 </td></tr>
    <tr>
		<td class="black10">Purchase Price:</td>
		<td width="82%" class="black10">$<input name="price" type="text" class="black10">
	</td>
	</tr>
	<tr>
		<td class="black10">Downpayment:</td>
		<td class="black10">$<input name="down_payment" type="test" class="black10"></td>
	</tr>
	<tr>
		<td colspan="2" class="black10"><input value="Calculate" class="button" onClick="calculate_cmhc(forms['cmhc'].price.value, forms['cmhc'].down_payment.value, forms['cmhc'].total_cmhc, forms['cmhc'].total_pst);" type="button"></td>
	</tr>
<tr>
	<td class="black10">Total CMHC:</td>
	<td class="black10"> $<input name="total_cmhc" disabled="disabled" type="test" class="black10"></td>
</tr>
<tr>
	<td class="black10">Total Provincial Sales Tax :</td>
	<td class="black10"> $<input name="total_pst" disabled="disabled" type="test" class="black10"></td>
</tr>

<tr><td class="black11" colspan="2"><strong>Mortgage Insurance Providers</strong></td></tr>
<tr><td class="black10" colspan="2">
Canada Mortgage and Housing Corporation (CMHC) is Canada's national 
housing agency. Established as a government-owned corporation in 1946 to
 address Canada's post-war housing shortage, the agency has grown into a
 major national institution. CMHC is Canada's premier provider of 
mortgage loan insurance, mortgage-backed securities, housing policy and 
programs, and housing research.  More about CMHC can be found at <a href="http://www.cmhc.ca/" target="cmhc">http://www.cmhc.ca</a>
 </td></tr>
 <tr><td class="black11" colspan="2"><strong>Genworth Financial</strong></td></tr>

 <tr><td class="black10" colspan="2">
GE Mortgage Insurance Canada together, with its related affiliates, 
is the largest private sector mortgage insurance company in the world 
and the only private sector supplier of mortgage insurance in Canada.  <a href="http://www.genworth.ca/" target="genworth">http://www.genworth.ca</a>
 </td></tr>
  <tr><td class="black11" colspan="2"><strong>Mortgage Insurance Premiums Explained</strong></td></tr>
  <tr><td class="black10" colspan="2">
Mortgage loan insurance premiums are calculated as a percentage of 
the loan and is based on the size of your down payment. The higher the 
percentage of the total house price/value that you borrow, the higher 
percentage you will pay in insurance premiums.
 </td></tr>
 
</tbody></table>
</form>
</td></tr>
<tr><td>
<table border="1" cellpadding="5" cellspacing="0" width="100%"> 
<tbody>
 <tr class="black10"> 
 <th rowspan="2" align="left" valign="bottom" width="32%">Loan-to-Value</th>
  <th colspan="2" align="center">Premium on Total Loan</th> 
  <th colspan="2" align="center">Premium on Increase to Loan Amount for Portability and Refinance</th> </tr> 
  <tr class="black10">
   <td align="left" valign="bottom">Standard Premium</td> 
  <td align="left" valign="bottom">Self-Employed without 3<sup>rd</sup> Party Income Validation</td>
   <td align="left" valign="bottom">Standard Premium</td> 
   <td align="left" valign="bottom">Self-Employed without 3<sup>rd</sup> Party Income Validation**</td>
    </tr>
   <tr class="black10">
    <th align="left">Up to and including 65%</th> <td align="center">0.50%</td> 
    <td align="center">0.80%</td> <td align="center">0.50%</td> <td align="center">1.50%</td> </tr>
     <tr class="black10"> <th align="left">Up to and including 75%</th>
      <td align="center">0.65%</td> <td align="center">1.00%</td>
       <td align="center">2.25%</td> <td align="center">2.60%</td>
       </tr> 
       <tr class="black10"> <th align="left">Up to and including 80%</th> 
       <td align="center">1.00%</td>
        <td align="center">1.64%</td> 
        <td align="center">2.75%</td>
         <td align="center">3.85%</td>
          </tr>
           <tr class="black10">
            <th align="left">Up to and including 85%</th> 
            <td align="center">1.75%</td> 
            <td align="center">2.90%</td> 
            <td align="center">3.50%</td> 
            <td align="center">5.50%</td> 
            </tr> 
            <tr class="black10">
             <th align="left">Up to and including 90%</th> 
             <td align="center">2.00%</td> 
             <td align="center">4.75%</td> 
             <td align="center">4.25%</td> 
             <td align="center">7.00%*</td> 
             </tr> 
             <tr class="black10">
              <th align="left">Up to and including 95%</th> 
              <td align="center">2.75%</td> 
              <td align="center">N/A</td>
               <td align="center">4.25%*</td> 
               <td align="center">*</td>
                </tr> <!-- <tr> <th align="left">90.01% to 95% —<br /> Non-Traditional Down&nbsp;Payment***</th> <td align="center">2.90%</td> <td align="center">N/A</td> <td align="center">*</td> <td align="center">N/A</td> </tr> --> 
                <tr> <td colspan="5" align="left" class="black10">Extended Amortization Surcharges</td> </tr>
                 <tr> <td colspan="5" align="center" class="black10">Greater than 25 years, up to and including 30 years: 0.20%<br></td> </tr> </tbody> </table>

</td></tr></table>
                    </td>
                    </tr>
                </table>