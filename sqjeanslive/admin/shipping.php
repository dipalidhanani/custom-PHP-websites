<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to SQ Jeans - Admin Panel</title>
<link rel="stylesheet" href="css/css.css" type="text/css" />
<?php
require_once("include/files.php");
?>
</head>
<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#FFFFFF"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
      <?php
	  if($_REQUEST["action"]=="")
	  {	 	 
	  ?>
      <tr>
        <td align="right"><table border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td><a href="shipping.php?action=new"><img src="images/add.png" width="20" height="20" border="0" /></a></td>
            <td class="normal_fonts12_black"><a href="shipping.php?action=new">New Country Shipping</a>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left"><table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Country</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>1 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>2 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>3 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>4 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>5 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>6 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>7 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>8 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>9 Kg</strong></td>
            <td width="7%" align="center" bgcolor="#999999"><strong>10 Kg</strong></td>
            <td width="5%" align="center" bgcolor="#999999"><strong>Available</strong></td>
            <td width="5%" align="center" bgcolor="#999999"><strong>Action</strong></td>
            </tr>
            <?php
			 $i=1;
			 $query="SELECT * FROM shipping_charges order by shipping_country";			
			 $recordsetshipping = mysql_query($query);
			 while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
			 {	
			    if($i%2!=0)
				{
					$bg="#FFFFFF";
				}
				else 
				{
					$bg="#F3F3F3";
				}	
			?>
          <tr class="normal_fonts9">
            <td align="left" valign="middle" bgcolor="<?php echo $bg;?>"><?php echo $rowshipping["shipping_country"];?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowshipping["shipping_one_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_one_kg"];
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowshipping["shipping_two_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_two_kg"];
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowshipping["shipping_three_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_three_kg"];
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowshipping["shipping_four_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_four_kg"];
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php 
			if($rowshipping["shipping_five_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_five_kg"];
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php 
			if($rowshipping["shipping_six_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_six_kg"];
			}
			?>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php 
			if($rowshipping["shipping_seven_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_seven_kg"];
			}
			?>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php 
			if($rowshipping["shipping_eight_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_eight_kg"];
			}
			?>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php 
			if($rowshipping["shipping_nine_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_nine_kg"];
			}
			?>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>">
            <?php 
			if($rowshipping["shipping_ten_kg"]=="0.00")
			{
				echo "Free";
			}
			else
			{
				echo $rowshipping["shipping_ten_kg"];
			}
			?>
            </td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><?php
			if($rowshipping["shipping_is_avail"]==1)
			{
				echo "Yes";
			}
			else
			{
				echo "No";
			}
			?></td>
            <td align="center" valign="middle" bgcolor="<?php echo $bg;?>"><table width="100%" border="0" cellspacing="1" cellpadding="1">
                              <tr>
                                <td align="center"><a href="shipping.php?action=edit&shippingid=<?php echo $rowshipping["shipping_charge_ID"];?>"><img src="images/edit.png" width="20" height="20" border="0" /></a></td>
                                <td align="center"><a href="process.php?process=removeshipping&shippingid=<?php echo $rowshipping["shipping_charge_ID"];?>" onClick="return confirm('Do you want to delete selected shipping?')"><img src="images/delete_on.gif" width="20" height="20" border="0" /></a></td>
                              </tr>
                </table></td>
            </tr>
            <?php
			$i++;
			 }
			 ?>
        </table></td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="new")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>New Shipping</strong></td>
            <td align="right" bgcolor="#999999"><strong>Price in USD</strong></td>
          </tr>
            <tr class="normal_fonts9">
            <td colspan="2" align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="shippingform" method="post" action="process.php" enctype="multipart/form-data">
          
          
          <tr>
            <td width="30%" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Country</td>
            <td width="1%" align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
			<select name="shipping_country" class="normal_fonts9">
                      <option value="">Select</option>
                      <option value="Albania">Albania</option>
                      <option value="Algeria">Algeria</option>
                      <option value="American Samoa">American Samoa</option>
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
                      <option value="Bangladesh">Bangladesh</option>
                      <option value="Barbados">Barbados</option>
                      <option value="Belarus">Belarus</option>
                      <option value="Belgium">Belgium</option>
                      <option value="Belize">Belize</option>
                      <option value="Benin">Benin</option>
                      <option value="Bermuda">Bermuda</option>
                      <option value="Bhutan">Bhutan</option>
                      <option value="Bolivia">Bolivia</option>
                      <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                      <option value="Botswana">Botswana</option>
                      <option value="Brazil">Brazil</option>
                      <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                      <option value="British Virgin Islands">British Virgin Islands</option>
                      <option value="Brunei">Brunei</option>
                      <option value="Bulgaria">Bulgaria</option>
                      <option value="Burkina Faso">Burkina Faso</option>
                      <option value="Burma">Burma</option>
                      <option value="Burundi">Burundi</option>
                      <option value="Cambodia">Cambodia</option>
                      <option value="Cameroon">Cameroon</option>
                      <option value="Canada">Canada</option>
                      <option value="Cape Verde">Cape Verde</option>
                      <option value="Cayman Islands">Cayman Islands</option>
                      <option value="Central African Republic">Central African Republic</option>
                      <option value="Chad">Chad</option>
                      <option value="Chile">Chile</option>
                      <option value="China">China</option>
                      <option value="Colombia">Colombia</option>
                      <option value="Comoros">Comoros</option>
                      <option value="Cook Islands">Cook Islands</option>
                      <option value="Costa Rica">Costa Rica</option>
                      <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                      <option value="Croatia">Croatia</option>
                      <option value="Cuba">Cuba</option>
                      <option value="Curacao">Curacao</option>
                      <option value="Cyprus">Cyprus</option>
                      <option value="Czech Republic">Czech Republic</option>
                      <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                      <option value="Denmark">Denmark</option>
                      <option value="Djibouti">Djibouti</option>
                      <option value="Dominica">Dominica</option>
                      <option value="Dominican Republic">Dominican Republic</option>
                      <option value="East Timor">East Timor</option>
                      <option value="Ecuador">Ecuador</option>
                      <option value="Egypt">Egypt</option>
                      <option value="El Salvador">El Salvador</option>
                      <option value="Equatorial Guinea">Equatorial Guinea</option>
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
                      <option value="Georgia">Georgia</option>
                      <option value="Germany">Germany</option>
                      <option value="Gibraltar">Gibraltar</option>
                      <option value="Greece">Greece</option>
                      <option value="Greenland">Greenland</option>
                      <option value="Grenada">Grenada</option>
                      <option value="Guadeloupe">Guadeloupe</option>
                      <option value="Guatemala">Guatemala</option>
                      <option value="Guernsey">Guernsey</option>
                      <option value="Guinea">Guinea</option>
                      <option value="Guinea Bissau">Guinea Bissau</option>
                      <option value="Guyana">Guyana</option>
                      <option value="Haiti">Haiti</option>
                      <option value="Honduras">Honduras</option>
                      <option value="Hong Kong">Hong Kong</option>
                      <option value="Hungary">Hungary</option>
                      <option value="Iceland">Iceland</option>
                      <option value="India">India</option>
                      <option value="Indonesia">Indonesia</option>
                      <option value="Iran">Iran</option>
                      <option value="Iraq">Iraq</option>
                      <option value="Ireland">Ireland</option>
                      <option value="Israel">Israel</option>
                      <option value="Italy">Italy</option>
                      <option value="Jamaica">Jamaica</option>
                      <option value="Japan">Japan</option>
                      <option value="Jersey">Jersey</option>
                      <option value="Jordan">Jordan</option>
                      <option value="Kazakhstan">Kazakhstan</option>
                      <option value="Kenya">Kenya</option>
                      <option value="Kiribati">Kiribati</option>
                      <option value="Kuwait">Kuwait</option>
                      <option value="Kyrgyzstan">Kyrgyzstan</option>
                      <option value="Laos">Laos</option>
                      <option value="Latvia">Latvia</option>
                      <option value="Lesotho">Lesotho</option>
                      <option value="Libya">Libya</option>
                      <option value="Liechtenstein">Liechtenstein</option>
                      <option value="Lithuania">Lithuania</option>
                      <option value="Luxembourg">Luxembourg</option>
                      <option value="Macau">Macau</option>
                      <option value="Macedonia">Macedonia</option>
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
                      <option value="Moldova">Moldova</option>
                      <option value="Monaco">Monaco</option>
                      <option value="Mongolia">Mongolia</option>
                      <option value="Montenegro">Montenegro</option>
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
                      <option value="North Korea">North Korea</option>
                      <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                      <option value="Oman">Oman</option>
                      <option value="Pakistan">Pakistan</option>
                      <option value="Palau">Palau</option>
                      <option value="Palestinian territories">Palestinian territories</option>
                      <option value="Panama">Panama</option>
                      <option value="Papua New Guinea">Papua New Guinea</option>
                      <option value="Paraguay">Paraguay</option>
                      <option value="People's Republic of China">People's Republic of China</option>
                      <option value="Peru">Peru</option>                      
                      <option value="Philippines">Philippines</option>
                      <option value="Pitcairn Islands">Pitcairn Islands</option>
                      <option value="Poland">Poland</option>
                      <option value="Portugal">Portugal</option>
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="Qatar">Qatar</option>
                      <option value="Republic of the Congo">Republic of the Congo</option>
                      <option value="Reunion">Reunion</option>
                      <option value="Romania">Romania</option>
                      <option value="Russia">Russia</option>
                      <option value="Rwanda">Rwanda</option>
                      <option value="Saint Martin">Saint Martin</option>
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
                      <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                      <option value="South Korea">South Korea</option>
                      <option value="South Sudan">South Sudan</option>
                      <option value="Spain">Spain</option>
                      <option value="Sri Lanka">Sri Lanka</option>
                      <option value="St. Barthelemy">St. Barthelemy</option>
                      <option value="St. Helena">St. Helena</option>
                      <option value="St. Kitts and Nevis">St. Kitts and Nevis</option>
                      <option value="St. Lucia">St. Lucia</option>
                      <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                      <option value="Sudan">Sudan</option>
                      <option value="Suriname">Suriname</option>
                      <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                      <option value="Swaziland">Swaziland</option>
                      <option value="Sweden">Sweden</option>
                      <option value="Switzerland">Switzerland</option>
                      <option value="Syria">Syria</option>
                      <option value="Taiwan">Taiwan</option>
                      <option value="Tajikistan">Tajikistan</option>
                      <option value="Tanzania">Tanzania</option>
                      <option value="Thailand">Thailand</option>
                      <option value="Togo">Togo</option>
                      <option value="Tokelau">Tokelau</option>
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
                      <option value="Western Sahara">Western Sahara</option>
                      <option value="Yemen">Yemen</option>
                      <option value="Zambia">Zambia</option>
                      <option value="Zimbabwe">Zimbabwe</option>
                    </select></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">1 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="onekgprice" type="text" class="normal_fonts9" size="10" /> 
              (Shipping Free = 0.00)</td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">2 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="twokgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">3 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="threekgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">4 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="fourkgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">5 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="fivekgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr> 
          <tr>
            <td align="right" valign="top" class="normal_fonts9">6 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="sixkgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">7 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="sevenkgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">8 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="eightkgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">9 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="ninekgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">10 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="tenkgprice" type="text" class="normal_fonts9" size="10" /></td>
          </tr>         
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Available</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">
            <input type="radio" name="shippingavailable" value="1" checked="checked"/>
            &nbsp;Yes
            <input type="radio" name="shippingavailable" value="0"/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="hidden" name="process" value="newshipping" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  if($_REQUEST["action"]=="edit")
	  {
	  ?>
      <tr>
        <td align="left">
        <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">         
          <tr class="normal_fonts10">
            <td align="left" bgcolor="#999999"><strong>Change  Shipping Details</strong></td>
            </tr>
            <tr class="normal_fonts9">
            <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="5">
            <form name="shippingform" method="post" action="process.php" enctype="multipart/form-data">
           <?php
		     $query="SELECT * FROM shipping_charges where shipping_charge_ID='".$_REQUEST["shippingid"]."'";			
			 $recordsetshipping = mysql_query($query);
			 while($rowshipping = mysql_fetch_array($recordsetshipping,MYSQL_ASSOC))
			 {
			 	$country=$rowshipping["shipping_country"];
			 ?>
           <tr>
            <td width="30%" align="right" valign="top" class="normal_fonts9">Country</td>
            <td width="1%" align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><select name="shipping_country" class="normal_fonts8" style="width:150px;">
                      <option value="India"<?php echo $country=="India"?"Selected":"";?>>India</option>
                      <option value="Albania"<?php echo $country=="Albania"?"Selected":"";?>>Albania</option>
                      <option value="Algeria"<?php echo $country=="Algeria"?"Selected":"";?>>Algeria</option>
                      <option value="American Samoa"<?php echo $country=="American Samoa"?"Selected":"";?>>American Samoa</option>
                      <option value="Andorra"<?php echo $country=="Andorra"?"Selected":"";?>>Andorra</option>
                      <option value="Angola"<?php echo $country=="Angola"?"Selected":"";?>>Angola</option>
                      <option value="Anguilla"<?php echo $country=="Anguilla"?"Selected":"";?>>Anguilla</option>
                      <option value="Antigua and Barbuda"<?php echo $country=="Antigua and Barbuda"?"Selected":"";?>>Antigua and Barbuda</option>
                      <option value="Argentina"<?php echo $country=="Argentina"?"Selected":"";?>>Argentina</option>
                      <option value="Armenia"<?php echo $country=="Armenia"?"Selected":"";?>>Armenia</option>
                      <option value="Aruba"<?php echo $country=="Aruba"?"Selected":"";?>>Aruba</option>
                      <option value="Australia"<?php echo $country=="Australia"?"Selected":"";?>>Australia</option>
                      <option value="Austria"<?php echo $country=="Austria"?"Selected":"";?>>Austria</option>
                      <option value="Azerbaijan Republic"<?php echo $country=="Azerbaijan Republic"?"Selected":"";?>>Azerbaijan Republic</option>
                      <option value="Bahamas"<?php echo $country=="Bahamas"?"Selected":"";?>>Bahamas</option>
                      <option value="Bahrain"<?php echo $country=="Bahrain"?"Selected":"";?>>Bahrain</option>
                      <option value="Bangladesh"<?php echo $country=="Bangladesh"?"Selected":"";?>>Bangladesh</option>
                      <option value="Barbados"<?php echo $country=="Barbados"?"Selected":"";?>>Barbados</option>
                      <option value="Belarus"<?php echo $country=="Belarus"?"Selected":"";?>>Belarus</option>
                      <option value="Belgium"<?php echo $country=="Belgium"?"Selected":"";?>>Belgium</option>                      
                      <option value="Belize"<?php echo $country=="Belize"?"Selected":"";?>>Belize</option>                      
                      <option value="Benin"<?php echo $country=="Benin"?"Selected":"";?>>Benin</option>
                      <option value="Bermuda"<?php echo $country=="Bermuda"?"Selected":"";?>>Bermuda</option>                      
                      <option value="Bhutan"<?php echo $country=="Bhutan"?"Selected":"";?>>Bhutan</option>
                      <option value="Bolivia"<?php echo $country=="Bolivia"?"Selected":"";?>>Bolivia</option>
                      <option value="Bosnia and Herzegovina"<?php echo $country=="Bosnia and Herzegovina"?"Selected":"";?>>Bosnia and Herzegovina</option>
                      <option value="Botswana"<?php echo $country=="Botswana"?"Selected":"";?>>Botswana</option>
                      <option value="Brazil"<?php echo $country=="Brazil"?"Selected":"";?>>Brazil</option>
                      <option value="British Indian Ocean Territory"<?php echo $country=="British Indian Ocean Territory"?"Selected":"";?>>British Indian Ocean Territory</option>
                      <option value="British Virgin Islands"<?php echo $country=="British Virgin Islands"?"Selected":"";?>>British Virgin Islands</option>
                      <option value="Brunei"<?php echo $country=="Brunei"?"Selected":"";?>>Brunei</option>
                      <option value="Bulgaria"<?php echo $country=="Bulgaria"?"Selected":"";?>>Bulgaria</option>
                      <option value="Burkina Faso"<?php echo $country=="Burkina Faso"?"Selected":"";?>>Burkina Faso</option>
                      <option value="Burma"<?php echo $country=="Burma"?"Selected":"";?>>Burma</option>
                      <option value="Burundi"<?php echo $country=="Burundi"?"Selected":"";?>>Burundi</option>
                      <option value="Cambodia"<?php echo $country=="Cambodia"?"Selected":"";?>>Cambodia</option>
                      <option value="Cameroon"<?php echo $country=="Cameroon"?"Selected":"";?>>Cameroon</option>
                      <option value="Canada"<?php echo $country=="Canada"?"Selected":"";?>>Canada</option>
                      <option value="Cape Verde"<?php echo $country=="Cape Verde"?"Selected":"";?>>Cape Verde</option>
                      <option value="Central African Republic"<?php echo $country=="Central African Republic"?"Selected":"";?>>Central African Republic</option>
                      <option value="Cayman Islands"<?php echo $country=="Cayman Islands"?"Selected":"";?>>Cayman Islands</option>
                      <option value="Chad"<?php echo $country=="Chad"?"Selected":"";?>>Chad</option>
                      <option value="Chile"<?php echo $country=="Chile"?"Selected":"";?>>Chile</option>
                      <option value="China"<?php echo $country=="China"?"Selected":"";?>>China</option>
                      <option value="Colombia"<?php echo $country=="Colombia"?"Selected":"";?>>Colombia</option>
                      <option value="Comoros"<?php echo $country=="Comoros"?"Selected":"";?>>Comoros</option>
                      <option value="Cook Islands"<?php echo $country=="Cook Islands"?"Selected":"";?>>Cook Islands</option>
                      <option value="Costa Rica"<?php echo $country=="Costa Rica"?"Selected":"";?>>Costa Rica</option>
                      <option value="Cote d'Ivoire"<?php echo $country=="Cote d'Ivoire"?"Selected":"";?>>Cote d'Ivoire</option>
                      <option value="Croatia"<?php echo $country=="Croatia"?"Selected":"";?>>Croatia</option>
                      <option value="Cuba"<?php echo $country=="Cuba"?"Selected":"";?>>Cuba</option>
                      <option value="Curacao"<?php echo $country=="Curacao"?"Selected":"";?>>Curacao</option>
                      <option value="Cyprus"<?php echo $country=="Cyprus"?"Selected":"";?>>Cyprus</option>
                      <option value="Czech Republic"<?php echo $country=="Czech Republic"?"Selected":"";?>>Czech Republic</option>
                      <option value="Democratic Republic of the Congo"<?php echo $country=="Democratic Republic of the Congo"?"Selected":"";?>>Democratic Republic of the Congo</option>
                      <option value="Denmark"<?php echo $country=="Denmark"?"Selected":"";?>>Denmark</option>
                      <option value="Djibouti"<?php echo $country=="Djibouti"?"Selected":"";?>>Djibouti</option>
                      <option value="Dominica"<?php echo $country=="Dominica"?"Selected":"";?>>Dominica</option>
                      <option value="Dominican Republic"<?php echo $country=="Dominican Republic"?"Selected":"";?>>Dominican Republic</option>
                      <option value="East Timor"<?php echo $country=="East Timor"?"Selected":"";?>>East Timor</option>
                      <option value="Ecuador"<?php echo $country=="Ecuador"?"Selected":"";?>>Ecuador</option>
                      <option value="Egypt"<?php echo $country=="Egypt"?"Selected":"";?>>Egypt</option>
                      <option value="El Salvador"<?php echo $country=="El Salvador"?"Selected":"";?>>El Salvador</option>
                      <option value="Eritrea"<?php echo $country=="Eritrea"?"Selected":"";?>>Eritrea</option>
                      <option value="Equatorial Guinea"<?php echo $country=="Equatorial Guinea"?"Selected":"";?>>Equatorial Guinea</option>
                      <option value="Estonia"<?php echo $country=="Estonia"?"Selected":"";?>>Estonia</option>
                      <option value="Ethiopia"<?php echo $country=="Ethiopia"?"Selected":"";?>>Ethiopia</option>
                      <option value="Falkland Islands"<?php echo $country=="Falkland Islands"?"Selected":"";?>>Falkland Islands</option>
                      <option value="Faroe Islands"<?php echo $country=="Faroe Islands"?"Selected":"";?>>Faroe Islands</option>
                      <option value="Federated States of Micronesia"<?php echo $country=="Federated States of Micronesia"?"Selected":"";?>>Federated States of Micronesia</option>
                      <option value="Fiji"<?php echo $country=="Fiji"?"Selected":"";?>>Fiji</option>
                      <option value="Finland"<?php echo $country=="Finland"?"Selected":"";?>>Finland</option>
                      <option value="France"<?php echo $country=="France"?"Selected":"";?>>France</option>
                      <option value="French Guiana"<?php echo $country=="French Guiana"?"Selected":"";?>>French Guiana</option>
                      <option value="French Polynesia"<?php echo $country=="French Polynesia"?"Selected":"";?>>French Polynesia</option>
                      <option value="Gabon Republic"<?php echo $country=="Gabon Republic"?"Selected":"";?>>Gabon Republic</option>
                      <option value="Gambia"<?php echo $country=="Gambia"?"Selected":"";?>>Gambia</option>
                      <option value="Georgia"<?php echo $country=="Georgia"?"Selected":"";?>>Georgia</option>
                      <option value="Germany"<?php echo $country=="Germany"?"Selected":"";?>>Germany</option>
                      <option value="Gibraltar"<?php echo $country=="Gibraltar"?"Selected":"";?>>Gibraltar</option>
                      <option value="Greece"<?php echo $country=="Greece"?"Selected":"";?>>Greece</option>
                      <option value="Greenland"<?php echo $country=="Greenland"?"Selected":"";?>>Greenland</option>
                      <option value="Grenada"<?php echo $country=="Grenada"?"Selected":"";?>>Grenada</option>
                      <option value="Guadeloupe"<?php echo $country=="Guadeloupe"?"Selected":"";?>>Guadeloupe</option>
                      <option value="Guatemala"<?php echo $country=="Guatemala"?"Selected":"";?>>Guatemala</option>
                      <option value="Guernsey"<?php echo $country=="Guernsey"?"Selected":"";?>>Guernsey</option>
                      <option value="Guinea"<?php echo $country=="Guinea"?"Selected":"";?>>Guinea</option>
                      <option value="Guinea Bissau"<?php echo $country=="Guinea Bissau"?"Selected":"";?>>Guinea Bissau</option>
                      <option value="Guyana"<?php echo $country=="Guyana"?"Selected":"";?>>Guyana</option>
                      <option value="Haiti"<?php echo $country=="Haiti"?"Selected":"";?>>Haiti</option>
                      <option value="Honduras"<?php echo $country=="Honduras"?"Selected":"";?>>Honduras</option>
                      <option value="Hong Kong"<?php echo $country=="Hong Kong"?"Selected":"";?>>Hong Kong</option>
                      <option value="Hungary"<?php echo $country=="Hungary"?"Selected":"";?>>Hungary</option>
                      <option value="Iceland"<?php echo $country=="Iceland"?"Selected":"";?>>Iceland</option>
                      <option value="Indonesia"<?php echo $country=="Indonesia"?"Selected":"";?>>Indonesia</option>
                      <option value="Iran"<?php echo $country=="Iran"?"Selected":"";?>>Iran</option>
                      <option value="Iraq"<?php echo $country=="Iraq"?"Selected":"";?>>Iraq</option>
                      <option value="Ireland"<?php echo $country=="Ireland"?"Selected":"";?>>Ireland</option>
                      <option value="Israel"<?php echo $country=="Israel"?"Selected":"";?>>Israel</option>
                      <option value="Italy"<?php echo $country=="Italy"?"Selected":"";?>>Italy</option>
                      <option value="Jamaica"<?php echo $country=="Jamaica"?"Selected":"";?>>Jamaica</option>
                      <option value="Japan"<?php echo $country=="Japan"?"Selected":"";?>>Japan</option>
                      <option value="Jersey"<?php echo $country=="Jersey"?"Selected":"";?>>Jersey</option>
                      <option value="Jordan"<?php echo $country=="Jordan"?"Selected":"";?>>Jordan</option>
                      <option value="Kazakhstan"<?php echo $country=="Kazakhstan"?"Selected":"";?>>Kazakhstan</option>
                      <option value="Kenya"<?php echo $country=="Kenya"?"Selected":"";?>>Kenya</option>
                      <option value="Kiribati"<?php echo $country=="Kiribati"?"Selected":"";?>>Kiribati</option>
                      <option value="Kuwait"<?php echo $country=="Kuwait"?"Selected":"";?>>Kuwait</option>
                      <option value="Kyrgyzstan"<?php echo $country=="Kyrgyzstan"?"Selected":"";?>>Kyrgyzstan</option>
                      <option value="Laos"<?php echo $country=="Laos"?"Selected":"";?>>Laos</option>
                      <option value="Latvia"<?php echo $country=="Latvia"?"Selected":"";?>>Latvia</option>
                      <option value="Lesotho"<?php echo $country=="Lesotho"?"Selected":"";?>>Lesotho</option>
                      <option value="Libya"<?php echo $country=="Libya"?"Selected":"";?>>Libya</option>
                      <option value="Liechtenstein"<?php echo $country=="Liechtenstein"?"Selected":"";?>>Liechtenstein</option>
                      <option value="Lithuania"<?php echo $country=="Lithuania"?"Selected":"";?>>Lithuania</option>
                      <option value="Luxembourg"<?php echo $country=="Luxembourg"?"Selected":"";?>>Luxembourg</option>
                      <option value="Macau"<?php echo $country=="Macau"?"Selected":"";?>>Macau</option>
					  <option value="Macedonia"<?php echo $country=="Macedonia"?"Selected":"";?>>Macedonia</option>
                      <option value="Madagascar"<?php echo $country=="Madagascar"?"Selected":"";?>>Madagascar</option>
                      <option value="Malawi"<?php echo $country=="Malawi"?"Selected":"";?>>Malawi</option>
                      <option value="Malaysia"<?php echo $country=="Malaysia"?"Selected":"";?>>Malaysia</option>
                      <option value="Maldives"<?php echo $country=="Maldives"?"Selected":"";?>>Maldives</option>
                      <option value="Mali"<?php echo $country=="Mali"?"Selected":"";?>>Mali</option>
                      <option value="Malta"<?php echo $country=="Malta"?"Selected":"";?>>Malta</option>                      
                      <option value="Marshall Islands"<?php echo $country=="Marshall Islands"?"Selected":"";?>>Marshall Islands</option>
                      <option value="Martinique"<?php echo $country=="Martinique"?"Selected":"";?>>Martinique</option>
                      <option value="Mauritania"<?php echo $country=="Mauritania"?"Selected":"";?>>Mauritania</option>
                      <option value="Mauritius"<?php echo $country=="Mauritius"?"Selected":"";?>>Mauritius</option>
                      <option value="Mayotte"<?php echo $country=="Mayotte"?"Selected":"";?>>Mayotte</option>
                      <option value="Mexico"<?php echo $country=="Mexico"?"Selected":"";?>>Mexico</option>
                      <option value="Moldova"<?php echo $country=="Moldova"?"Selected":"";?>>Moldova</option>                      
                      <option value="Monaco"<?php echo $country=="Monaco"?"Selected":"";?>>Monaco</option>
                      <option value="Mongolia"<?php echo $country=="Mongolia"?"Selected":"";?>>Mongolia</option>
					  <option value="Montenegro"<?php echo $country=="Montenegro"?"Selected":"";?>>Montenegro</option>
                      <option value="Montserrat"<?php echo $country=="Montserrat"?"Selected":"";?>>Montserrat</option>
                      <option value="Morocco"<?php echo $country=="Morocco"?"Selected":"";?>>Morocco</option>
                      <option value="Mozambique"<?php echo $country=="Mozambique"?"Selected":"";?>>Mozambique</option>
                      <option value="Namibia"<?php echo $country=="Namibia"?"Selected":"";?>>Namibia</option>
                      <option value="Nauru"<?php echo $country=="Nauru"?"Selected":"";?>>Nauru</option>
                      <option value="Nepal"<?php echo $country=="Nepal"?"Selected":"";?>>Nepal</option>
                      <option value="Netherlands"<?php echo $country=="Netherlands"?"Selected":"";?>>Netherlands</option>
                      <option value="Netherlands Antilles"<?php echo $country=="Netherlands Antilles"?"Selected":"";?>>Netherlands Antilles</option>
                      <option value="New Caledonia"<?php echo $country=="New Caledonia"?"Selected":"";?>>New Caledonia</option>
                      <option value="New Zealand"<?php echo $country=="New Zealand"?"Selected":"";?>>New Zealand</option>
                      <option value="Nicaragua"<?php echo $country=="Nicaragua"?"Selected":"";?>>Nicaragua</option>
                      <option value="Niger"<?php echo $country=="Niger"?"Selected":"";?>>Niger</option>
                      <option value="Niue"<?php echo $country=="Niue"?"Selected":"";?>>Niue</option>
                      <option value="Norfolk Island"<?php echo $country=="Norfolk Island"?"Selected":"";?>>Norfolk Island</option>
                      <option value="North Korea"<?php echo $country=="North Korea"?"Selected":"";?>>North Korea</option>
                      <option value="Northern Mariana Islands"<?php echo $country=="Northern Mariana Islands"?"Selected":"";?>>Northern Mariana Islands</option>
                      <option value="Norway"<?php echo $country=="Norway"?"Selected":"";?>>Norway</option>
                      <option value="Oman"<?php echo $country=="Oman"?"Selected":"";?>>Oman</option>
                      <option value="Palau"<?php echo $country=="Palau"?"Selected":"";?>>Palau</option>
                      <option value="Palestinian territories"<?php echo $country=="Palestinian territories"?"Selected":"";?>>Palestinian territories</option>
                      <option value="Panama"<?php echo $country=="Panama"?"Selected":"";?>>Panama</option>
                      <option value="Papua New Guinea"<?php echo $country=="Papua New Guinea"?"Selected":"";?>>Papua New Guinea</option>
                      <option value="Paraguay"<?php echo $country=="Paraguay"?"Selected":"";?>>Paraguay</option>
                      <option value="People's Republic of China"<?php echo $country=="People's Republic of China"?"Selected":"";?>>People's Republic of China</option>
                      <option value="Peru"<?php echo $country=="Peru"?"Selected":"";?>>Peru</option>
                      <option value="Philippines"<?php echo $country=="Philippines"?"Selected":"";?>>Philippines</option>
                      <option value="Pitcairn Islands"<?php echo $country=="Pitcairn Islands"?"Selected":"";?>>Pitcairn Islands</option>
                      <option value="Poland"<?php echo $country=="Poland"?"Selected":"";?>>Poland</option>
                      <option value="Portugal"<?php echo $country=="Portugal"?"Selected":"";?>>Portugal</option>
                      <option value="Puerto Rico"<?php echo $country=="Puerto Rico"?"Selected":"";?>>Puerto Rico</option>
                      <option value="Qatar"<?php echo $country=="Qatar"?"Selected":"";?>>Qatar</option>
                      <option value="Republic of the Congo"<?php echo $country=="Republic of the Congo"?"Selected":"";?>>Republic of the Congo</option>
                      <option value="Reunion"<?php echo $country=="Reunion"?"Selected":"";?>>Reunion</option>
                      <option value="Romania"<?php echo $country=="Romania"?"Selected":"";?>>Romania</option>
                      <option value="Russia"<?php echo $country=="Russia"?"Selected":"";?>>Russia</option>
                      <option value="Rwanda"<?php echo $country=="Rwanda"?"Selected":"";?>>Rwanda</option>
                      <option value="Saint Martin"<?php echo $country=="Saint Martin"?"Selected":"";?>>Saint Martin</option>
                      <option value="Saint Vincent and the Grenadines"<?php echo $country=="Saint Vincent and the Grenadines"?"Selected":"";?>>Saint Vincent and the Grenadines</option>
                      <option value="Samoa"<?php echo $country=="Samoa"?"Selected":"";?>>Samoa</option>
                      <option value="San Marino"<?php echo $country=="San Marino"?"Selected":"";?>>San Marino</option>
                      <option value="Sao Tome and Principe"<?php echo $country=="Sao Tome and Principe"?"Selected":"";?>>S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
                      <option value="Saudi Arabia"<?php echo $country=="Saudi Arabia"?"Selected":"";?>>Saudi Arabia</option>
                      <option value="Senegal"<?php echo $country=="Senegal"?"Selected":"";?>>Senegal</option>
                      <option value="Seychelles"<?php echo $country=="Seychelles"?"Selected":"";?>>Seychelles</option>
                      <option value="Sierra Leone"<?php echo $country=="Sierra Leone"?"Selected":"";?>>Sierra Leone</option>
                      <option value="Singapore"<?php echo $country=="Singapore"?"Selected":"";?>>Singapore</option>
                      <option value="Slovakia"<?php echo $country=="Slovakia"?"Selected":"";?>>Slovakia</option>
                      <option value="Slovenia"<?php echo $country=="Slovenia"?"Selected":"";?>>Slovenia</option>
                      <option value="Solomon Islands"<?php echo $country=="Solomon Islands"?"Selected":"";?>>Solomon Islands</option>
                      <option value="Somalia"<?php echo $country=="Somalia"?"Selected":"";?>>Somalia</option>
                      <option value="South Africa"<?php echo $country=="South Africa"?"Selected":"";?>>South Africa</option>
                      <option value="South Georgia and the South Sandwich Islands"<?php echo $country=="South Georgia and the South Sandwich Islands"?"Selected":"";?>>South Georgia and the South Sandwich Islands</option>
                      <option value="South Korea"<?php echo $country=="South Korea"?"Selected":"";?>>South Korea</option>
                      <option value="South Sudan"<?php echo $country=="South Sudan"?"Selected":"";?>>South Sudan</option>
                      <option value="Spain"<?php echo $country=="Spain"?"Selected":"";?>>Spain</option>
                      <option value="Sri Lanka"<?php echo $country=="Sri Lanka"?"Selected":"";?>>Sri Lanka</option>
                      <option value="St. Barthelemy"<?php echo $country=="St. Barthelemy"?"Selected":"";?>>St. Barthelemy</option>
                      <option value="St. Helena"<?php echo $country=="St. Helena"?"Selected":"";?>>St. Helena</option>
                      <option value="St. Kitts and Nevis"<?php echo $country=="St. Kitts and Nevis"?"Selected":"";?>>St. Kitts and Nevis</option>
                      <option value="St. Lucia"<?php echo $country=="St. Lucia"?"Selected":"";?>>St. Lucia</option>
                      <option value="St. Pierre and Miquelon"<?php echo $country=="St. Pierre and Miquelon"?"Selected":"";?>>St. Pierre and Miquelon</option>
                      <option value="Sudan"<?php echo $country=="Sudan"?"Selected":"";?>>Sudan</option>
                      <option value="Suriname"<?php echo $country=="Suriname"?"Selected":"";?>>Suriname</option>
                      <option value="Svalbard and Jan Mayen Islands"<?php echo $country=="Svalbard and Jan Mayen Islands"?"Selected":"";?>>Svalbard and Jan Mayen Islands</option>
                      <option value="Swaziland"<?php echo $country=="Swaziland"?"Selected":"";?>>Swaziland</option>
                      <option value="Sweden"<?php echo $country=="Sweden"?"Selected":"";?>>Sweden</option>
                      <option value="Switzerland"<?php echo $country=="Switzerland"?"Selected":"";?>>Switzerland</option>
                      <option value="Syria"<?php echo $country=="Syria"?"Selected":"";?>>Syria</option>
                      <option value="Taiwan"<?php echo $country=="Taiwan"?"Selected":"";?>>Taiwan</option>
                      <option value="Tajikistan"<?php echo $country=="Tajikistan"?"Selected":"";?>>Tajikistan</option>
                      <option value="Tanzania"<?php echo $country=="Tanzania"?"Selected":"";?>>Tanzania</option>
                      <option value="Thailand"<?php echo $country=="Thailand"?"Selected":"";?>>Thailand</option>
                      <option value="Togo"<?php echo $country=="Togo"?"Selected":"";?>>Togo</option>
                      <option value="Tokelau"<?php echo $country=="Tokelau"?"Selected":"";?>>Tokelau</option>
                      <option value="Tonga"<?php echo $country=="Tonga"?"Selected":"";?>>Tonga</option>
                      <option value="Trinidad and Tobago"<?php echo $country=="Trinidad and Tobago"?"Selected":"";?>>Trinidad and Tobago</option>
                      <option value="Tunisia"<?php echo $country=="Tunisia"?"Selected":"";?>>Tunisia</option>
                      <option value="Turkey"<?php echo $country=="Turkey"?"Selected":"";?>>Turkey</option>
                      <option value="Turkmenistan"<?php echo $country=="Turkmenistan"?"Selected":"";?>>Turkmenistan</option>
                      <option value="Turks and Caicos Islands"<?php echo $country=="Turks and Caicos Islands"?"Selected":"";?>>Turks and Caicos Islands</option>
                      <option value="Tuvalu"<?php echo $country=="Tuvalu"?"Selected":"";?>>Tuvalu</option>
                      <option value="Uganda"<?php echo $country=="Uganda"?"Selected":"";?>>Uganda</option>
                      <option value="Ukraine"<?php echo $country=="Ukraine"?"Selected":"";?>>Ukraine</option>
                      <option value="United Arab Emirates"<?php echo $country=="United Arab Emirates"?"Selected":"";?>>United Arab Emirates</option>
                      <option value="United Kingdom"<?php echo $country=="United Kingdom"?"Selected":"";?>>United Kingdom</option>
                      <option value="United States"<?php echo $country=="United States"?"Selected":"";?>>United States</option>
                      <option value="Uruguay"<?php echo $country=="Uruguay"?"Selected":"";?>>Uruguay</option>
                      <option value="Vanuatu"<?php echo $country=="Vanuatu"?"Selected":"";?>>Vanuatu</option>
                      <option value="Vatican City State"<?php echo $country=="Vatican City State"?"Selected":"";?>>Vatican City State</option>
                      <option value="Venezuela"<?php echo $country=="Venezuela"?"Selected":"";?>>Venezuela</option>
                      <option value="Vietnam"<?php echo $country=="Vietnam"?"Selected":"";?>>Vietnam</option>
                      <option value="Wallis and Futuna Islands"<?php echo $country=="Wallis and Futuna Islands"?"Selected":"";?>>Wallis and Futuna Islands</option>
                      <option value="Western Sahara"<?php echo $country=="Western Sahara"?"Selected":"";?>>Western Sahara</option>
                      <option value="Yemen"<?php echo $country=="Yemen"?"Selected":"";?>>Yemen</option>
                      <option value="Zambia"<?php echo $country=="Zambia"?"Selected":"";?>>Zambia</option>
                      <option value="Zimbabwe"<?php echo $country=="Zimbabwe"?"Selected":"";?>>Zimbabwe</option>
                    </select></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">1 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="onekgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_one_kg"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">2 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="twokgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_two_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">3 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="threekgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_three_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">4 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="fourkgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_four_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">5 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="fivekgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_five_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">6 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="sixkgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_six_kg"];?>" /></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">7 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="sevenkgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_seven_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">8 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="eightkgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_eight_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">9 KG Price</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">:</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9"><input name="ninekgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_nine_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">10 KG Price</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9"><input name="tenkgprice" type="text" class="normal_fonts9" size="10" value="<?php echo $rowshipping["shipping_ten_kg"];?>"/></td>
          </tr>
          <tr>
            <td align="right" valign="top" class="normal_fonts9">Available</td>
            <td align="left" valign="top">:</td>
            <td align="left" valign="top" class="normal_fonts9">
            <input type="radio" name="shippingavailable" value="1" <?php if($rowshipping["shipping_is_avail"]==1) { ?> checked="checked" <?php } ?>/>
            &nbsp;Yes
            <input type="radio" name="shippingavailable" value="0" <?php if($rowshipping["shipping_is_avail"]==0) { ?> checked="checked" <?php } ?>/>
            &nbsp;No</td>
          </tr>
          

          <tr>
            <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3">&nbsp;</td>
            <td align="left" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">  
            <input type="hidden" name="shippingid" value="<?php echo $_REQUEST["shippingid"];?>" />
            <input type="hidden" name="process" value="editshipping" />
            <input name="submit" type="submit" class="normal_fonts9" value="submit" /></td>
          </tr>
          <?php
		  }
		  ?>
          </form>
            </table>            </td>
            </tr>
          </table>        </td>
      </tr>
      <?php
	  }
	  ?>
    </table></td>
  </tr>
  <tr>
    <td><?php include("footer.php");?></td>
  </tr>
</table>

</body>
</html>
