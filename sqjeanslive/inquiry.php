<link href="css/home.css" rel="stylesheet" type="text/css" />

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



function validation(contactusform)

{

	with(document.contactusform)

    {

    	var errmsg="";

	    

		var illegalChars = /\W/; // allow letters, numbers, and underscores

 

		if(name.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your name.";

		}				

		if(email.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your email address.";

		}

		if(EmailValidation(email.value)==false)

		{

			errmsg=errmsg +'<br>' + "Please enter valid email address.";

		}

		if(phone.value!="")

		{

			if(IsNumeric(phone.value)==false ||phone.value.length < 7)

			{

					errmsg=errmsg +'<br>' + "Please enter valid phone number.";

			}

		}

		if(mobile.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter mobile number.";

		}

		if(mobile.value!="")

		{

			if(IsNumeric(mobile.value)==false)

			{

					errmsg=errmsg +'<br>' + "Please enter valid mobile number.";

			}

		}

		if(country.value=="")

		{

			errmsg=errmsg +'<br>' + "Please select your country.";

		}

		if(query.value=="")

		{

			errmsg=errmsg +'<br>' + "Please enter your query.";

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

<table width="100%" border="0" cellspacing="5" cellpadding="0">

                      <tr>

                        <td align="left" valign="top" class="font10"><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3"cellspacing="0" cellpadding="5">

                              <form name="contactusform" method="post" action="process.php">

                                <tr>

                                  <td colspan="3" align="center" valign="top" class="titel_2"><h1>Send your inquiry</h1></td>

                                </tr>

								<?php

								if($_REQUEST["msg"]=="yes")

								{

								?>                                

                                <tr>

                                  <td colspan="3" align="center" valign="top"><font color="#FF0000"><b>Thank you for inquiry to SQ Jeans.</b></font></td>

                                </tr>

                                <?php

								}

								?>

                                <tr>

                                  <td width="33%" align="right" valign="top"> <strong>Name :</strong></td>

                                  <td colspan="2" valign="top" ><input type="text" size="50" name="name" class="font9"/></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top"><strong>E-mail :</strong></td>

                                  <td colspan="2" valign="top"><input name="email" type="text" size="50" class="font9"/></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top"><strong>Phone :</strong></td>

                                  <td colspan="2" valign="top"><input type="text" name="phone" size="50" class="font9"/></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top"><strong>Mobile :</strong></td>

                                  <td colspan="2" valign="top"><input type="text" name="mobile" size="50"class="font9"/></td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top"><strong>Country :</strong></td>

                                  <td colspan="2" valign="top" >

                      <select name="country" class="font9">  

                      <option value="Afghanistan">Afghanistan</option>                  

                      <option value="Albania">Albania</option>

                      <option value="Algeria">Algeria</option>

                      <option value="Andorra">Andorra</option>

                      <option value="Angola">Angola</option>

                      <option value="Anguilla">Anguilla</option>

                      <option value="Antigua and Barbuda">Antigua and Barbuda</option>

                      <option value="Argentina">Argentina</option>

                      <option value="Armenia">Armenia</option>

                      <option value="Aruba">Aruba</option>

                      <option value="Australia">Australia</option>

                      <option value="Austria">Austria</option>

                      <option value="Azerbaijan Republic">Azerbaijan Republic</option>

                      <option value="Bahamas">Bahamas</option>

                      <option value="Bahrain">Bahrain</option>

                      <option value="Barbados">Barbados</option>

                      <option value="Belgium">Belgium</option>

                      <option value="Belize">Belize</option>

                      <option value="Benin">Benin</option>

                      <option value="Bermuda">Bermuda</option>

                      <option value="Bhutan">Bhutan</option>

                      <option value="Bolivia">Bolivia</option>

                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>

                      <option value="Botswana">Botswana</option>

                      <option value="Brazil">Brazil</option>

                      <option value="British Virgin Islands">British Virgin Islands</option>

                      <option value="Brunei">Brunei</option>

                      <option value="Bulgaria">Bulgaria</option>

                      <option value="Burkina Faso">Burkina Faso</option>

                      <option value="Burundi">Burundi</option>

                      <option value="Cambodia">Cambodia</option>

                      <option value="Canada">Canada</option>

                      <option value="Cape Verde">Cape Verde</option>

                      <option value="Cayman Islands">Cayman Islands</option>

                      <option value="Chad">Chad</option>

                      <option value="Chile">Chile</option>

                      <option value="China">China</option>

                      <option value="Colombia">Colombia</option>

                      <option value="Comoros">Comoros</option>

                      <option value="Cook Islands">Cook Islands</option>

                      <option value="Costa Rica">Costa Rica</option>

                      <option value="Croatia">Croatia</option>

                      <option value="Cyprus">Cyprus</option>

                      <option value="Czech Republic">Czech Republic</option>

                      <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>

                      <option value="Denmark">Denmark</option>

                      <option value="Djibouti">Djibouti</option>

                      <option value="Dominica">Dominica</option>

                      <option value="Dominican Republic">Dominican Republic</option>

                      <option value="Ecuador">Ecuador</option>

                      <option value="El Salvador">El Salvador</option>

                      <option value="Eritrea">Eritrea</option>

                      <option value="Estonia">Estonia</option>

                      <option value="Ethiopia">Ethiopia</option>

                      <option value="Falkland Islands">Falkland Islands</option>

                      <option value="Faroe Islands">Faroe Islands</option>

                      <option value="Federated States of Micronesia">Federated States of Micronesia</option>

                      <option value="Fiji">Fiji</option>

                      <option value="Finland">Finland</option>

                      <option value="France">France</option>

                      <option value="French Guiana">French Guiana</option>

                      <option value="French Polynesia">French Polynesia</option>

                      <option value="Gabon Republic">Gabon Republic</option>

                      <option value="Gambia">Gambia</option>

                      <option value="Germany">Germany</option>

                      <option value="Gibraltar">Gibraltar</option>

                      <option value="Greece">Greece</option>

                      <option value="Greenland">Greenland</option>

                      <option value="Grenada">Grenada</option>

                      <option value="Guadeloupe">Guadeloupe</option>

                      <option value="Guatemala">Guatemala</option>

                      <option value="Guinea">Guinea</option>

                      <option value="Guinea Bissau">Guinea Bissau</option>

                      <option value="Guyana">Guyana</option>

                      <option value="Honduras">Honduras</option>

                      <option value="Hong Kong">Hong Kong</option>

                      <option value="Hungary">Hungary</option>

                      <option value="Iceland">Iceland</option>

                      <option value="India">India</option>

                      <option value="Indonesia">Indonesia</option>

                      <option value="Ireland">Ireland</option>

                      <option value="Israel">Israel</option>

                      <option value="Italy">Italy</option>

                      <option value="Jamaica">Jamaica</option>

                      <option value="Japan">Japan</option>

                      <option value="Jordan">Jordan</option>

                      <option value="Kazakhstan">Kazakhstan</option>

                      <option value="Kenya">Kenya</option>

                      <option value="Kiribati">Kiribati</option>

                      <option value="Kuwait">Kuwait</option>

                      <option value="Kyrgyzstan">Kyrgyzstan</option>

                      <option value="Laos">Laos</option>

                      <option value="Latvia">Latvia</option>

                      <option value="Lesotho">Lesotho</option>

                      <option value="Liechtenstein">Liechtenstein</option>

                      <option value="Lithuania">Lithuania</option>

                      <option value="Luxembourg">Luxembourg</option>

                      <option value="Madagascar">Madagascar</option>

                      <option value="Malawi">Malawi</option>

                      <option value="Malaysia">Malaysia</option>

                      <option value="Maldives">Maldives</option>

                      <option value="Mali">Mali</option>

                      <option value="Malta">Malta</option>

                      <option value="Marshall Islands">Marshall Islands</option>

                      <option value="Martinique">Martinique</option>

                      <option value="Mauritania">Mauritania</option>

                      <option value="Mauritius">Mauritius</option>

                      <option value="Mayotte">Mayotte</option>

                      <option value="Mexico">Mexico</option>

                      <option value="Mongolia">Mongolia</option>

                      <option value="Montserrat">Montserrat</option>

                      <option value="Morocco">Morocco</option>

                      <option value="Mozambique">Mozambique</option>

                      <option value="Namibia">Namibia</option>

                      <option value="Nauru">Nauru</option>

                      <option value="Nepal">Nepal</option>

                      <option value="Netherlands">Netherlands</option>

                      <option value="Netherlands Antilles">Netherlands Antilles</option>

                      <option value="New Caledonia">New Caledonia</option>

                      <option value="New Zealand">New Zealand</option>

                      <option value="Nicaragua">Nicaragua</option>

                      <option value="Niger">Niger</option>

                      <option value="Niue">Niue</option>

                      <option value="Norfolk Island">Norfolk Island</option>

                      <option value="Norway">Norway</option>

                      <option value="Oman">Oman</option>

                      <option value="Pakistan">Pakistan</option>

                      <option value="Palau">Palau</option>

                      <option value="Panama">Panama</option>

                      <option value="Papua New Guinea">Papua New Guinea</option>

                      <option value="Peru">Peru</option>

                      <option value="Philippines">Philippines</option>

                      <option value="Pitcairn Islands">Pitcairn Islands</option>

                      <option value="Poland">Poland</option>

                      <option value="Portugal">Portugal</option>

                      <option value="Qatar">Qatar</option>

                      <option value="Republic of the Congo">Republic of the Congo</option>

                      <option value="Reunion">Reunion</option>

                      <option value="Romania">Romania</option>

                      <option value="Russia">Russia</option>

                      <option value="Rwanda">Rwanda</option>

                      <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>

                      <option value="Samoa">Samoa</option>

                      <option value="San Marino">San Marino</option>

                      <option value="Sao Tome and Principe">S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>

                      <option value="Saudi Arabia">Saudi Arabia</option>

                      <option value="Senegal">Senegal</option>

                      <option value="Seychelles">Seychelles</option>

                      <option value="Sierra Leone">Sierra Leone</option>

                      <option value="Singapore">Singapore</option>

                      <option value="Slovakia">Slovakia</option>

                      <option value="Slovenia">Slovenia</option>

                      <option value="Solomon Islands">Solomon Islands</option>

                      <option value="Somalia">Somalia</option>

                      <option value="South Africa">South Africa</option>

                      <option value="South Korea">South Korea</option>

                      <option value="Spain">Spain</option>

                      <option value="Sri Lanka">Sri Lanka</option>

                      <option value="St. Helena">St. Helena</option>

                      <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>

                      <option value="St. Lucia">St. Lucia</option>

                      <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>

                      <option value="Suriname">Suriname</option>

                      <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>

                      <option value="Swaziland">Swaziland</option>

                      <option value="Sweden">Sweden</option>

                      <option value="Switzerland">Switzerland</option>

                      <option value="Taiwan">Taiwan</option>

                      <option value="Tajikistan">Tajikistan</option>

                      <option value="Tanzania">Tanzania</option>

                      <option value="Thailand">Thailand</option>

                      <option value="Togo">Togo</option>

                      <option value="Tonga">Tonga</option>

                      <option value="Trinidad and Tobago">Trinidad and Tobago</option>

                      <option value="Tunisia">Tunisia</option>

                      <option value="Turkey">Turkey</option>

                      <option value="Turkmenistan">Turkmenistan</option>

                      <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>

                      <option value="Tuvalu">Tuvalu</option>

                      <option value="Uganda">Uganda</option>

                      <option value="Ukraine">Ukraine</option>

                      <option value="United Arab Emirates">United Arab Emirates</option>

                      <option value="United States"  selected="selected">United States</option> 

                      <option value="United Kingdom">United Kingdom</option>

                      <option value="Vanuatu">Vanuatu</option>

                      <option value="Vatican City State">Vatican City State</option>

                      <option value="Venezuela">Venezuela</option>

                      <option value="Vietnam">Vietnam</option>

                      <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>

                      <option value="Yemen">Yemen</option>

                      <option value="Zambia">Zambia</option>

                      <option value="Zimbabve">Zimbabve</option>

                    </select>                                  </td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top"><strong>Query :</strong></td>

                                  <td colspan="2" valign="top">

                                  <textarea name="query" cols="40" rows="4" class="font9"></textarea>                                  </td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top" >&nbsp;</td>

                                  <td width="32%" align="center" valign="top">

                                  <input type="hidden" name="action" value="contactus" />

                                  <input type="submit" name="submit" value="Submit" onclick="return validation(this.form);" style="cursor:pointer;"/></td>

                                  <td width="35%" valign="top">&nbsp;</td>

                                </tr>

                                <tr>

                                  <td align="right" valign="top" >&nbsp;</td>

                                  <td colspan="2" valign="top">&nbsp;</td>

                                </tr>

                                <tr id="erroralready" style="display:none;">

                                  <td colspan="3" valign="top"><table width="50%" border="0" cellspacing="0" cellpadding="0" align="center">

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

                                              <td class="red_font9" align="left"><b>Errors</b></td>

                                            </tr>

                                            <tr>

                                              <td class="red_font9" align="left">

                                                <div id="lblerror" class="normal_fonts10" align="left" style=" width:250px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>                                              </td>

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

                      </tr>

                    </table></td>

<td width="10">&nbsp;</td>

                  </tr>



<!-- Start of StatCounter Code for Default Guide -->

<script type="text/javascript">

var sc_project=7213366; 

var sc_invisible=1; 

var sc_security="329c0566"; 

</script>

<script type="text/javascript"

src="http://www.statcounter.com/counter/counter.js"></script>

<noscript><div class="statcounter"><a title="visit tracker

on tumblr" href="http://statcounter.com/tumblr/"

target="_blank"><img class="statcounter"

src="http://c.statcounter.com/7213366/0/329c0566/1/"

alt="visit tracker on tumblr"></a></div></noscript>

<!-- End of StatCounter Code for Default Guide -->

</table>