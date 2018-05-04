<script language="javascript">
 function check_valid_email(emailval)
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
function validation_contactus()
{
	with(document.contactusform)
	{
			var error=0;
			var message;
			message="Please enter / correct folllowing errors to proceed further!";
			message=message+ "\n" + "--------------------------------------------------------------------";
			
			if(name.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Name!";
			}
			
			if(email.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Email Address!";
			}
			if(check_valid_email(email.value)==false)
			{
				error=1;
				message=message + "\n" + "Please Enter valid Email Address!";
			}
			
			if(query.value=='')
			{
				error=1;
				message=message + "\n" + "Please Enter Query / Message!";
			}	
			
			if (error==1)
			{
				alert(message);
				return false;
			}
			else
			{
				return true;		
			}
	}
}
</script>
<table width="960" border="0" cellspacing="0" cellpadding="5" bgcolor="#FFFFFF" class="border1">
                              <form name="contactusform" method="post" action="contactusprocess.php">
               <tr>
                <td colspan="2" height="35" align="left" valign="middle" bgcolor="#727272" style="background:url(images/tag_bg.jpg) repeat-x; padding: 0;">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                   <td width="10"> </td>
                    <td align="left" valign="middle" class="title_black"><span class="title_white">Contact Us</span></td>
                  </tr>
                </table>
                </td>
              </tr>
                                  <tr>
                                  <td height="5" ></td>
                                </tr>             
                              
                                <tr>
                                  <td width="35%" align="right" valign="top" class="black9"><span class="title_red">*</span>Name :</td>
                                  <td valign="top"><input type="text" name="name" id="name" class="black9 tb7" /></td>
                              
                                </tr>
                                <tr>
                                  <td align="right" valign="top" class="black9"><span class="title_red">*</span>Email Address :</td>
                                  <td valign="top"><input name="email" id="email" type="text" size="35" class="black9 tb7" /></td>
                                </tr>
                                
                                <tr>
                                  <td align="right" valign="top" class="black9">Mobile No :</td>
                                  <td valign="top"><input type="text" name="mobile" id="mobile" class="black9 tb7" /></td>
                                </tr>
                                <tr>
                                  <td align="right" valign="top" class="black9">Country :</td>
                                  <td valign="top">
                                    <select name="country" id="country" class="black9 tb7combo">   
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
                                      <option value="India" selected="selected">India</option>
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
                                      <option value="United Kingdom">United Kingdom</option>
                                      <option value="United States">United States</option>
                                      <option value="Uruguay">Uruguay</option>
                                      <option value="Vanuatu">Vanuatu</option>
                                      <option value="Vatican City State">Vatican City State</option>
                                      <option value="Venezuela">Venezuela</option>
                                      <option value="Vietnam">Vietnam</option>
                                      <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                      <option value="Yemen">Yemen</option>
                                      <option value="Zambia">Zambia</option>
                                      <option value="Zimbabve">Zimbabve</option>
                                  </select>                                  
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" valign="top" class="black9"><span class="title_red">*</span>Query / Message :</td>
                                  <td valign="top">
                                  <textarea name="query" id="query" cols="40" rows="4" class="black9 tb7"></textarea>  
                                  </td>
                                </tr>
                                <tr>
                                  <td align="right" valign="top" class="black9">&nbsp;</td>
                                  <td valign="top">
                                  <input type="submit" name="submit" value="Submit" onclick="return validation_contactus();" style="cursor:pointer;"/></td>
                                </tr>
                              </form>
                            </table>