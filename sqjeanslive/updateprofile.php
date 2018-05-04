<?php
session_start();
require_once("include/config.php");
require_once("include/function.php");
u_Connect("cn");
?>
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

function validation(updateprofileform)
{
	with(document.updateprofileform)
    {
    	var errmsg="";
	    
		var illegalChars = /\W/; // allow letters, numbers, and underscores
 
		
		if(firstname.value=="")
		{
			errmsg="Please enter your firstname.";
		}
		if(lastname.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your lastname.";
		}
		if(address.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your address.";
		}		
		if(city.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your city.";
		}
		if(state.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your state/province.";
		}
		if(pincode.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your pincode.";
		}
		if(country.value=="")
		{
			errmsg=errmsg +'<br>' + "Please select your country.";
		}
		
		if(mobile.value=="")
		{
			errmsg=errmsg +'<br>' + "Please enter your mobile number.";
		}
		if(mobile.value!="")
		{
			if(IsNumeric(mobile.value)==false)
			{
					errmsg=errmsg +'<br>' + "Please enter valid mobile number.";
			}
		}
		if(phone.value!="")
		{
			if(IsNumeric(phone.value)==false ||phone.value.length < 7)
			{
					errmsg=errmsg +'<br>' + "Please enter valid phone number.";
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
<link href="css/home.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td class="titel_2"><strong>Update My Profile</strong></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" background="images/pgbg02a.jpg" class="border3" cellpadding="0" cellspacing="0" >
            <form name="updateprofileform" id="updateprofileform" method="get" action="process.php">
                 <?php
                 $recordsetmyprofile = mysql_query("select * from register_master where register_ID='".$_SESSION['sqjeansloginuserid']."' and register_user_email='".$_SESSION['sqjeansloginuseremail']."'",$cn);
				while($rowmyprofile = mysql_fetch_array($recordsetmyprofile,MYSQL_ASSOC))
				{
				?>
                  <tr>

                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" >
                        <tr>
                         <td align="right" valign="top" class="font10" >First Name  * </td>
                         <td><input name="firstname" type="text" class="font9"  id="firstname" size="25" value="<?php  echo $rowmyprofile["register_user_first_name"];?>"></td>
                        </tr>
                        <tr>
                         <td width="25%" align="right" valign="top" class="font10" >Last Name  * </td>
                          <td><input name="lastname" type="text" class="font9"  id="lastname" size="25" value="<?php  echo $rowmyprofile["register_user_last_name"];?>"></td>
                        </tr>
                    </table></td>

                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" >
                  <tr>
                          <td width="25%" align="right" valign="top" class="font10" >Address * </td>
                        <td ><textarea name="address" cols="35"  rows="3" class="font9"><?php  echo $rowmyprofile["register_user_address"];?></textarea></td>
                        </tr>
                        <tr>

                          <td align="right" valign="top" class="font10" >Address (Cntd.) </td>
                          <td><textarea name="address2" cols="35"  rows="3" class="font9"><?php  echo $rowmyprofile["register_user_address_2"];?></textarea></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top" class="font10" >City * </td>
                          <td ><input name="city" type="text" class="font9"  id="city" size="25" value="<?php  echo $rowmyprofile["register_user_city"];?>"></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="font10" >State / Province  * </td>
                          <td><input name="state" type="text" class="font9"  id="state" size="25" value="<?php  echo $rowmyprofile["register_user_state"];?>"></td>
                        </tr>
                        <tr>
                          <td align="right" valign="top"  class="font10" >Post Code* </td>
                          <td  class="font9"><input name="pincode" type="text" class="font9"  id="pincode" value="<?php  echo $rowmyprofile["register_user_pincode"];?>" size="20"></td>
                        </tr>

                        <tr>
                          <td align="right" valign="top" class="font10" >Country * </td>
                        <td><select name="country" class="font9" style="width:150px;">
                <option value="India"<?php echo $rowmyprofile["register_user_country"]=="India"?"Selected":"";?>>India</option>
          <option value="Albania"<?php echo $rowmyprofile["register_user_country"]=="Albania"?"Selected":"";?>>Albania</option>
          <option value="Algeria"<?php echo $rowmyprofile["register_user_country"]=="Algeria"?"Selected":"";?>>Algeria</option>
          <option value="Andorra"<?php echo $rowmyprofile["register_user_country"]=="Andorra"?"Selected":"";?>>Andorra</option>
          <option value="Angola"<?php echo $rowmyprofile["register_user_country"]=="Angola"?"Selected":"";?>>Angola</option>
          <option value="Anguilla"<?php echo $rowmyprofile["register_user_country"]=="Anguilla"?"Selected":"";?>>Anguilla</option>
          <option value="Antigua and Barbuda"<?php echo $rowmyprofile["register_user_country"]=="Antigua and Barbuda"?"Selected":"";?>>Antigua and Barbuda</option>
          <option value="Argentina"<?php echo $rowmyprofile["register_user_country"]=="Argentina"?"Selected":"";?>>Argentina</option>
          <option value="Armenia"<?php echo $rowmyprofile["register_user_country"]=="Armenia"?"Selected":"";?>>Armenia</option>
          <option value="Aruba"<?php echo $rowmyprofile["register_user_country"]=="Aruba"?"Selected":"";?>>Aruba</option>
          <option value="Australia"<?php echo $rowmyprofile["register_user_country"]=="Australia"?"Selected":"";?>>Australia</option>
          <option value="Austria"<?php echo $rowmyprofile["register_user_country"]=="Austria"?"Selected":"";?>>Austria</option>
          <option value="Azerbaijan Republic"<?php echo $rowmyprofile["register_user_country"]=="Azerbaijan Republic"?"Selected":"";?>>Azerbaijan Republic</option>
          <option value="Bahamas"<?php echo $rowmyprofile["register_user_country"]=="Bahamas"?"Selected":"";?>>Bahamas</option>
          <option value="Bahrain"<?php echo $rowmyprofile["register_user_country"]=="Bahrain"?"Selected":"";?>>Bahrain</option>
          <option value="Barbados"<?php echo $rowmyprofile["register_user_country"]=="Barbados"?"Selected":"";?>>Barbados</option>
          <option value="Belgium"<?php echo $rowmyprofile["register_user_country"]=="Belgium"?"Selected":"";?>>Belgium</option>
          <option value="Belize"<?php echo $rowmyprofile["register_user_country"]=="Belize"?"Selected":"";?>>Belize</option>
          <option value="Benin"<?php echo $rowmyprofile["register_user_country"]=="Benin"?"Selected":"";?>>Benin</option>
          <option value="Bermuda"<?php echo $rowmyprofile["register_user_country"]=="Bermuda"?"Selected":"";?>>Bermuda</option>
          <option value="Bhutan"<?php echo $rowmyprofile["register_user_country"]=="Bhutan"?"Selected":"";?>>Bhutan</option>
          <option value="Bolivia"<?php echo $rowmyprofile["register_user_country"]=="Bolivia"?"Selected":"";?>>Bolivia</option>
          <option value="Bosnia and Herzegovina"<?php echo $rowmyprofile["register_user_country"]=="Bosnia and Herzegovina"?"Selected":"";?>>Bosnia and Herzegovina</option>
          <option value="Botswana"<?php echo $rowmyprofile["register_user_country"]=="Botswana"?"Selected":"";?>>Botswana</option>
          <option value="Brazil"<?php echo $rowmyprofile["register_user_country"]=="Brazil"?"Selected":"";?>>Brazil</option>
          <option value="British Virgin Islands"<?php echo $rowmyprofile["register_user_country"]=="British Virgin Islands"?"Selected":"";?>>British Virgin Islands</option>
          <option value="Brunei"<?php echo $rowmyprofile["register_user_country"]=="Brunei"?"Selected":"";?>>Brunei</option>
          <option value="Bulgaria"<?php echo $rowmyprofile["register_user_country"]=="Bulgaria"?"Selected":"";?>>Bulgaria</option>
          <option value="Burkina Faso"<?php echo $rowmyprofile["register_user_country"]=="Burkina Faso"?"Selected":"";?>>Burkina Faso</option>
          <option value="Burundi"<?php echo $rowmyprofile["register_user_country"]=="Burundi"?"Selected":"";?>>Burundi</option>
          <option value="Cambodia"<?php echo $rowmyprofile["register_user_country"]=="Cambodia"?"Selected":"";?>>Cambodia</option>
          <option value="Canada"<?php echo $rowmyprofile["register_user_country"]=="Canada"?"Selected":"";?>>Canada</option>
          <option value="Cape Verde"<?php echo $rowmyprofile["register_user_country"]=="Cape Verde"?"Selected":"";?>>Cape Verde</option>
          <option value="Cayman Islands"<?php echo $rowmyprofile["register_user_country"]=="Cayman Islands"?"Selected":"";?>>Cayman Islands</option>
          <option value="Chad"<?php echo $rowmyprofile["register_user_country"]=="Chad"?"Selected":"";?>>Chad</option>
          <option value="Chile"<?php echo $rowmyprofile["register_user_country"]=="Chile"?"Selected":"";?>>Chile</option>
          <option value="China"<?php echo $rowmyprofile["register_user_country"]=="China"?"Selected":"";?>>China</option>
          <option value="Colombia"<?php echo $rowmyprofile["register_user_country"]=="Colombia"?"Selected":"";?>>Colombia</option>
          <option value="Comoros"<?php echo $rowmyprofile["register_user_country"]=="Comoros"?"Selected":"";?>>Comoros</option>
          <option value="Cook Islands"<?php echo $rowmyprofile["register_user_country"]=="Cook Islands"?"Selected":"";?>>Cook Islands</option>
          <option value="Costa Rica"<?php echo $rowmyprofile["register_user_country"]=="Costa Rica"?"Selected":"";?>>Costa Rica</option>
          <option value="Croatia"<?php echo $rowmyprofile["register_user_country"]=="Croatia"?"Selected":"";?>>Croatia</option>
          <option value="Cyprus"<?php echo $rowmyprofile["register_user_country"]=="Cyprus"?"Selected":"";?>>Cyprus</option>
          <option value="Czech Republic"<?php echo $rowmyprofile["register_user_country"]=="Czech Republic"?"Selected":"";?>>Czech Republic</option>
          <option value="Democratic Republic of the Congo"<?php echo $rowmyprofile["register_user_country"]=="Democratic Republic of the Congo"?"Selected":"";?>>Democratic Republic of the Congo</option>
          <option value="Denmark"<?php echo $rowmyprofile["register_user_country"]=="Denmark"?"Selected":"";?>>Denmark</option>
          <option value="Djibouti"<?php echo $rowmyprofile["register_user_country"]=="Djibouti"?"Selected":"";?>>Djibouti</option>
          <option value="Dominica"<?php echo $rowmyprofile["register_user_country"]=="Dominica"?"Selected":"";?>>Dominica</option>
          <option value="Dominican Republic"<?php echo $rowmyprofile["register_user_country"]=="Dominican Republic"?"Selected":"";?>>Dominican Republic</option>
          <option value="Ecuador"<?php echo $rowmyprofile["register_user_country"]=="Ecuador"?"Selected":"";?>>Ecuador</option>
          <option value="El Salvador"<?php echo $rowmyprofile["register_user_country"]=="El Salvador"?"Selected":"";?>>El Salvador</option>
          <option value="Eritrea"<?php echo $rowmyprofile["register_user_country"]=="Eritrea"?"Selected":"";?>>Eritrea</option>
          <option value="Estonia"<?php echo $rowmyprofile["register_user_country"]=="Estonia"?"Selected":"";?>>Estonia</option>
          <option value="Ethiopia"<?php echo $rowmyprofile["register_user_country"]=="Ethiopia"?"Selected":"";?>>Ethiopia</option>
          <option value="Falkland Islands"<?php echo $rowmyprofile["register_user_country"]=="Falkland Islands"?"Selected":"";?>>Falkland Islands</option>
          <option value="Faroe Islands"<?php echo $rowmyprofile["register_user_country"]=="Faroe Islands"?"Selected":"";?>>Faroe Islands</option>
          <option value="Federated States of Micronesia"<?php echo $rowmyprofile["register_user_country"]=="Federated States of Micronesia"?"Selected":"";?>>Federated States of Micronesia</option>
          <option value="Fiji"<?php echo $rowmyprofile["register_user_country"]=="Fiji"?"Selected":"";?>>Fiji</option>
          <option value="Finland"<?php echo $rowmyprofile["register_user_country"]=="Finland"?"Selected":"";?>>Finland</option>
          <option value="France"<?php echo $rowmyprofile["register_user_country"]=="France"?"Selected":"";?>>France</option>
          <option value="French Guiana"<?php echo $rowmyprofile["register_user_country"]=="French Guiana"?"Selected":"";?>>French Guiana</option>
          <option value="French Polynesia"<?php echo $rowmyprofile["register_user_country"]=="French Polynesia"?"Selected":"";?>>French Polynesia</option>
          <option value="Gabon Republic"<?php echo $rowmyprofile["register_user_country"]=="Gabon Republic"?"Selected":"";?>>Gabon Republic</option>
          <option value="Gambia"<?php echo $rowmyprofile["register_user_country"]=="Gambia"?"Selected":"";?>>Gambia</option>
          <option value="Germany"<?php echo $rowmyprofile["register_user_country"]=="Germany"?"Selected":"";?>>Germany</option>
          <option value="Gibraltar"<?php echo $rowmyprofile["register_user_country"]=="Gibraltar"?"Selected":"";?>>Gibraltar</option>
          <option value="Greece"<?php echo $rowmyprofile["register_user_country"]=="Greece"?"Selected":"";?>>Greece</option>
          <option value="Greenland"<?php echo $rowmyprofile["register_user_country"]=="Greenland"?"Selected":"";?>>Greenland</option>
          <option value="Grenada"<?php echo $rowmyprofile["register_user_country"]=="Grenada"?"Selected":"";?>>Grenada</option>
          <option value="Guadeloupe"<?php echo $rowmyprofile["register_user_country"]=="Guadeloupe"?"Selected":"";?>>Guadeloupe</option>
          <option value="Guatemala"<?php echo $rowmyprofile["register_user_country"]=="Guatemala"?"Selected":"";?>>Guatemala</option>
          <option value="Guinea"<?php echo $rowmyprofile["register_user_country"]=="Guinea"?"Selected":"";?>>Guinea</option>
          <option value="Guinea Bissau"<?php echo $rowmyprofile["register_user_country"]=="Guinea Bissau"?"Selected":"";?>>Guinea Bissau</option>
          <option value="Guyana"<?php echo $rowmyprofile["register_user_country"]=="Guyana"?"Selected":"";?>>Guyana</option>
          <option value="Honduras"<?php echo $rowmyprofile["register_user_country"]=="Honduras"?"Selected":"";?>>Honduras</option>
          <option value="Hong Kong"<?php echo $rowmyprofile["register_user_country"]=="Hong Kong"?"Selected":"";?>>Hong Kong</option>
          <option value="Hungary"<?php echo $rowmyprofile["register_user_country"]=="Hungary"?"Selected":"";?>>Hungary</option>
          <option value="Iceland"<?php echo $rowmyprofile["register_user_country"]=="Iceland"?"Selected":"";?>>Iceland</option>
          <option value="Indonesia"<?php echo $rowmyprofile["register_user_country"]=="Indonesia"?"Selected":"";?>>Indonesia</option>
          <option value="Ireland"<?php echo $rowmyprofile["register_user_country"]=="Ireland"?"Selected":"";?>>Ireland</option>
          <option value="Israel"<?php echo $rowmyprofile["register_user_country"]=="Israel"?"Selected":"";?>>Israel</option>
          <option value="Italy"<?php echo $rowmyprofile["register_user_country"]=="Italy"?"Selected":"";?>>Italy</option>
          <option value="Jamaica"<?php echo $rowmyprofile["register_user_country"]=="Jamaica"?"Selected":"";?>>Jamaica</option>
          <option value="Japan"<?php echo $rowmyprofile["register_user_country"]=="Japan"?"Selected":"";?>>Japan</option>
          <option value="Jordan"<?php echo $rowmyprofile["register_user_country"]=="Jordan"?"Selected":"";?>>Jordan</option>
          <option value="Kazakhstan"<?php echo $rowmyprofile["register_user_country"]=="Kazakhstan"?"Selected":"";?>>Kazakhstan</option>
          <option value="Kenya"<?php echo $rowmyprofile["register_user_country"]=="Kenya"?"Selected":"";?>>Kenya</option>
          <option value="Kiribati"<?php echo $rowmyprofile["register_user_country"]=="Kiribati"?"Selected":"";?>>Kiribati</option>
          <option value="Kuwait"<?php echo $rowmyprofile["register_user_country"]=="Kuwait"?"Selected":"";?>>Kuwait</option>
          <option value="Kyrgyzstan"<?php echo $rowmyprofile["register_user_country"]=="Kyrgyzstan"?"Selected":"";?>>Kyrgyzstan</option>
          <option value="Laos"<?php echo $rowmyprofile["register_user_country"]=="Laos"?"Selected":"";?>>Laos</option>
          <option value="Latvia"<?php echo $rowmyprofile["register_user_country"]=="Latvia"?"Selected":"";?>>Latvia</option>
          <option value="Lesotho"<?php echo $rowmyprofile["register_user_country"]=="Lesotho"?"Selected":"";?>>Lesotho</option>
          <option value="Liechtenstein"<?php echo $rowmyprofile["register_user_country"]=="Liechtenstein"?"Selected":"";?>>Liechtenstein</option>
          <option value="Lithuania"<?php echo $rowmyprofile["register_user_country"]=="Lithuania"?"Selected":"";?>>Lithuania</option>
          <option value="Luxembourg"<?php echo $rowmyprofile["register_user_country"]=="Luxembourg"?"Selected":"";?>>Luxembourg</option>
          <option value="Madagascar"<?php echo $rowmyprofile["register_user_country"]=="Madagascar"?"Selected":"";?>>Madagascar</option>
          <option value="Malawi"<?php echo $rowmyprofile["register_user_country"]=="Malawi"?"Selected":"";?>>Malawi</option>
          <option value="Malaysia"<?php echo $rowmyprofile["register_user_country"]=="Malaysia"?"Selected":"";?>>Malaysia</option>
          <option value="Maldives"<?php echo $rowmyprofile["register_user_country"]=="Maldives"?"Selected":"";?>>Maldives</option>
          <option value="Mali"<?php echo $rowmyprofile["register_user_country"]=="Mali"?"Selected":"";?>>Mali</option>
          <option value="Malta"<?php echo $rowmyprofile["register_user_country"]=="Malta"?"Selected":"";?>>Malta</option>
          <option value="Marshall Islands"<?php echo $rowmyprofile["register_user_country"]=="Marshall Islands"?"Selected":"";?>>Marshall Islands</option>
          <option value="Martinique"<?php echo $rowmyprofile["register_user_country"]=="Martinique"?"Selected":"";?>>Martinique</option>
          <option value="Mauritania"<?php echo $rowmyprofile["register_user_country"]=="Mauritania"?"Selected":"";?>>Mauritania</option>
          <option value="Mauritius"<?php echo $rowmyprofile["register_user_country"]=="Mauritius"?"Selected":"";?>>Mauritius</option>
          <option value="Mayotte"<?php echo $rowmyprofile["register_user_country"]=="Mayotte"?"Selected":"";?>>Mayotte</option>
          <option value="Mexico"<?php echo $rowmyprofile["register_user_country"]=="Mexico"?"Selected":"";?>>Mexico</option>
          <option value="Mongolia"<?php echo $rowmyprofile["register_user_country"]=="Mongolia"?"Selected":"";?>>Mongolia</option>
          <option value="Montserrat"<?php echo $rowmyprofile["register_user_country"]=="Montserrat"?"Selected":"";?>>Montserrat</option>
          <option value="Morocco"<?php echo $rowmyprofile["register_user_country"]=="Morocco"?"Selected":"";?>>Morocco</option>
          <option value="Mozambique"<?php echo $rowmyprofile["register_user_country"]=="Mozambique"?"Selected":"";?>>Mozambique</option>
          <option value="Namibia"<?php echo $rowmyprofile["register_user_country"]=="Namibia"?"Selected":"";?>>Namibia</option>
          <option value="Nauru"<?php echo $rowmyprofile["register_user_country"]=="Nauru"?"Selected":"";?>>Nauru</option>
          <option value="Nepal"<?php echo $rowmyprofile["register_user_country"]=="Nepal"?"Selected":"";?>>Nepal</option>
          <option value="Netherlands"<?php echo $rowmyprofile["register_user_country"]=="Netherlands"?"Selected":"";?>>Netherlands</option>
          <option value="Netherlands Antilles"<?php echo $rowmyprofile["register_user_country"]=="Netherlands Antilles"?"Selected":"";?>>Netherlands Antilles</option>
          <option value="New Caledonia"<?php echo $rowmyprofile["register_user_country"]=="New Caledonia"?"Selected":"";?>>New Caledonia</option>
          <option value="New Zealand"<?php echo $rowmyprofile["register_user_country"]=="New Zealand"?"Selected":"";?>>New Zealand</option>
          <option value="Nicaragua"<?php echo $rowmyprofile["register_user_country"]=="Nicaragua"?"Selected":"";?>>Nicaragua</option>
          <option value="Niger"<?php echo $rowmyprofile["register_user_country"]=="Niger"?"Selected":"";?>>Niger</option>
          <option value="Niue"<?php echo $rowmyprofile["register_user_country"]=="Niue"?"Selected":"";?>>Niue</option>
          <option value="Norfolk Island"<?php echo $rowmyprofile["register_user_country"]=="Norfolk Island"?"Selected":"";?>>Norfolk Island</option>
          <option value="Norway"<?php echo $rowmyprofile["register_user_country"]=="Norway"?"Selected":"";?>>Norway</option>
          <option value="Oman"<?php echo $rowmyprofile["register_user_country"]=="Oman"?"Selected":"";?>>Oman</option>
          <option value="Palau"<?php echo $rowmyprofile["register_user_country"]=="Palau"?"Selected":"";?>>Palau</option>
          <option value="Panama"<?php echo $rowmyprofile["register_user_country"]=="Panama"?"Selected":"";?>>Panama</option>
          <option value="Papua New Guinea"<?php echo $rowmyprofile["register_user_country"]=="Papua New Guinea"?"Selected":"";?>>Papua New Guinea</option>
          <option value="Peru"<?php echo $rowmyprofile["register_user_country"]=="Peru"?"Selected":"";?>>Peru</option>
          <option value="Philippines"<?php echo $rowmyprofile["register_user_country"]=="Philippines"?"Selected":"";?>>Philippines</option>
          <option value="Pitcairn Islands"<?php echo $rowmyprofile["register_user_country"]=="Pitcairn Islands"?"Selected":"";?>>Pitcairn Islands</option>
          <option value="Poland"<?php echo $rowmyprofile["register_user_country"]=="Poland"?"Selected":"";?>>Poland</option>
          <option value="Portugal"<?php echo $rowmyprofile["register_user_country"]=="Portugal"?"Selected":"";?>>Portugal</option>
          <option value="Qatar"<?php echo $rowmyprofile["register_user_country"]=="Qatar"?"Selected":"";?>>Qatar</option>
          <option value="Republic of the Congo"<?php echo $rowmyprofile["register_user_country"]=="Republic of the Congo"?"Selected":"";?>>Republic of the Congo</option>
          <option value="Reunion"<?php echo $rowmyprofile["register_user_country"]=="Reunion"?"Selected":"";?>>Reunion</option>
          <option value="Romania"<?php echo $rowmyprofile["register_user_country"]=="Romania"?"Selected":"";?>>Romania</option>
          <option value="Russia"<?php echo $rowmyprofile["register_user_country"]=="Russia"?"Selected":"";?>>Russia</option>
          <option value="Rwanda"<?php echo $rowmyprofile["register_user_country"]=="Rwanda"?"Selected":"";?>>Rwanda</option>
          <option value="Saint Vincent and the Grenadines"<?php echo $rowmyprofile["register_user_country"]=="Saint Vincent and the Grenadines"?"Selected":"";?>>Saint Vincent and the Grenadines</option>
          <option value="Samoa"<?php echo $rowmyprofile["register_user_country"]=="Samoa"?"Selected":"";?>>Samoa</option>
          <option value="San Marino"<?php echo $rowmyprofile["register_user_country"]=="San Marino"?"Selected":"";?>>San Marino</option>
          <option value="Sao Tome and Principe"<?php echo $rowmyprofile["register_user_country"]=="Sao Tome and Principe"?"Selected":"";?>>S&atilde;o Tom&eacute; and Pr&iacute;ncipe</option>
          <option value="Saudi Arabia"<?php echo $rowmyprofile["register_user_country"]=="Saudi Arabia"?"Selected":"";?>>Saudi Arabia</option>
          <option value="Senegal"<?php echo $rowmyprofile["register_user_country"]=="Senegal"?"Selected":"";?>>Senegal</option>
          <option value="Seychelles"<?php echo $rowmyprofile["register_user_country"]=="Seychelles"?"Selected":"";?>>Seychelles</option>
          <option value="Sierra Leone"<?php echo $rowmyprofile["register_user_country"]=="Sierra Leone"?"Selected":"";?>>Sierra Leone</option>
          <option value="Singapore"<?php echo $rowmyprofile["register_user_country"]=="Singapore"?"Selected":"";?>>Singapore</option>
          <option value="Slovakia"<?php echo $rowmyprofile["register_user_country"]=="Slovakia"?"Selected":"";?>>Slovakia</option>
          <option value="Slovenia"<?php echo $rowmyprofile["register_user_country"]=="Slovenia"?"Selected":"";?>>Slovenia</option>
          <option value="Solomon Islands"<?php echo $rowmyprofile["register_user_country"]=="Solomon Islands"?"Selected":"";?>>Solomon Islands</option>
          <option value="Somalia"<?php echo $rowmyprofile["register_user_country"]=="Somalia"?"Selected":"";?>>Somalia</option>
          <option value="South Africa"<?php echo $rowmyprofile["register_user_country"]=="South Africa"?"Selected":"";?>>South Africa</option>
          <option value="South Korea"<?php echo $rowmyprofile["register_user_country"]=="South Korea"?"Selected":"";?>>South Korea</option>
          <option value="Spain"<?php echo $rowmyprofile["register_user_country"]=="Spain"?"Selected":"";?>>Spain</option>

          <option value="Sri Lanka"<?php echo $rowmyprofile["register_user_country"]=="Sri Lanka"?"Selected":"";?>>Sri Lanka</option>
          <option value="St. Helena"<?php echo $rowmyprofile["register_user_country"]=="St. Helena"?"Selected":"";?>>St. Helena</option>
          <option value="St. Kitts and Nevis"<?php echo $rowmyprofile["register_user_country"]=="St. Kitts and Nevis"?"Selected":"";?>>St. Kitts and Nevis</option>
          <option value="St. Lucia"<?php echo $rowmyprofile["register_user_country"]=="St. Lucia"?"Selected":"";?>>St. Lucia</option>
          <option value="St. Pierre and Miquelon"<?php echo $rowmyprofile["register_user_country"]=="St. Pierre and Miquelon"?"Selected":"";?>>St. Pierre and Miquelon</option>
          <option value="Suriname"<?php echo $rowmyprofile["register_user_country"]=="Suriname"?"Selected":"";?>>Suriname</option>
          <option value="Svalbard and Jan Mayen Islands"<?php echo $rowmyprofile["register_user_country"]=="Svalbard and Jan Mayen Islands"?"Selected":"";?>>Svalbard and Jan Mayen Islands</option>
          <option value="Swaziland"<?php echo $rowmyprofile["register_user_country"]=="Swaziland"?"Selected":"";?>>Swaziland</option>
          <option value="Sweden"<?php echo $rowmyprofile["register_user_country"]=="Sweden"?"Selected":"";?>>Sweden</option>
          <option value="Switzerland"<?php echo $rowmyprofile["register_user_country"]=="Switzerland"?"Selected":"";?>>Switzerland</option>
          <option value="Taiwan"<?php echo $rowmyprofile["register_user_country"]=="Taiwan"?"Selected":"";?>>Taiwan</option>
          <option value="Tajikistan"<?php echo $rowmyprofile["register_user_country"]=="Tajikistan"?"Selected":"";?>>Tajikistan</option>
          <option value="Tanzania"<?php echo $rowmyprofile["register_user_country"]=="Tanzania"?"Selected":"";?>>Tanzania</option>
          <option value="Thailand"<?php echo $rowmyprofile["register_user_country"]=="Thailand"?"Selected":"";?>>Thailand</option>
          <option value="Togo"<?php echo $rowmyprofile["register_user_country"]=="Togo"?"Selected":"";?>>Togo</option>
          <option value="Tonga"<?php echo $rowmyprofile["register_user_country"]=="Tonga"?"Selected":"";?>>Tonga</option>
          <option value="Trinidad and Tobago"<?php echo $rowmyprofile["register_user_country"]=="Trinidad and Tobago"?"Selected":"";?>>Trinidad and Tobago</option>
          <option value="Tunisia"<?php echo $rowmyprofile["register_user_country"]=="Tunisia"?"Selected":"";?>>Tunisia</option>
          <option value="Turkey"<?php echo $rowmyprofile["register_user_country"]=="Turkey"?"Selected":"";?>>Turkey</option>
          <option value="Turkmenistan"<?php echo $rowmyprofile["register_user_country"]=="Turkmenistan"?"Selected":"";?>>Turkmenistan</option>
          <option value="Turks and Caicos Islands"<?php echo $rowmyprofile["register_user_country"]=="Turks and Caicos Islands"?"Selected":"";?>>Turks and Caicos Islands</option>
          <option value="Tuvalu"<?php echo $rowmyprofile["register_user_country"]=="Tuvalu"?"Selected":"";?>>Tuvalu</option>
          <option value="Uganda"<?php echo $rowmyprofile["register_user_country"]=="Uganda"?"Selected":"";?>>Uganda</option>
          <option value="Ukraine"<?php echo $rowmyprofile["register_user_country"]=="Ukraine"?"Selected":"";?>>Ukraine</option>
          <option value="United Arab Emirates"<?php echo $rowmyprofile["register_user_country"]=="United Arab Emirates"?"Selected":"";?>>United Arab Emirates</option>
          <option value="United Kingdom"<?php echo $rowmyprofile["register_user_country"]=="United Kingdom"?"Selected":"";?>>United Kingdom</option>
          <option value="United States"<?php echo $rowmyprofile["register_user_country"]=="United States"?"Selected":"";?>>United States</option>
          <option value="Uruguay"<?php echo $rowmyprofile["register_user_country"]=="Uruguay"?"Selected":"";?>>Uruguay</option>
          <option value="Vanuatu"<?php echo $rowmyprofile["register_user_country"]=="Vanuatu"?"Selected":"";?>>Vanuatu</option>
          <option value="Vatican City State"<?php echo $rowmyprofile["register_user_country"]=="Vatican City State"?"Selected":"";?>>Vatican City State</option>
          <option value="Venezuela"<?php echo $rowmyprofile["register_user_country"]=="Venezuela"?"Selected":"";?>>Venezuela</option>
          <option value="Vietnam"<?php echo $rowmyprofile["register_user_country"]=="Vietnam"?"Selected":"";?>>Vietnam</option>
          <option value="Wallis and Futuna Islands"<?php echo $rowmyprofile["register_user_country"]=="Wallis and Futuna Islands"?"Selected":"";?>>Wallis and Futuna Islands</option>
          <option value="Yemen"<?php echo $rowmyprofile["register_user_country"]=="Yemen"?"Selected":"";?>>Yemen</option>
          <option value="Zambia"<?php echo $rowmyprofile["register_user_country"]=="Zambia"?"Selected":"";?>>Zambia</option>
                </select>
                          </td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" >
                      <tr>
                        <td width="25%" align="right" valign="top" class="font10" >Email Address * </td>
                        <td width="74%" class="font9"><?php  echo $rowmyprofile["register_user_email"];?></td>
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="font10" >Phone&nbsp;&nbsp;&nbsp;</td>
                        <td><input name="phone" type="text" class="font9"  id="phone" size="25" value="<?php  echo $rowmyprofile["register_user_phone"];?>"></td>
                        
                        </tr>
                      <tr>
                        <td align="right" valign="top" class="font10" >Mobile *</td>
                        <td ><input name="mobile" type="text" class="font9"  id="mobile" size="25" value="<?php  echo $rowmyprofile["register_user_mobile"];?>"></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" >
                      

                      <tr>
                        <td >                          </td>
                      </tr>
                      <tr>
                        <td align="center">
                        <input type="hidden" name="action" value="updateprofile" />
                        <input type="submit" value="Update" onclick="return validation(this.form);" style="cursor:pointer;" >
                          &nbsp;</td>
                        </tr>
                    </table></td>
                    
                    
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr id="erroralready" style="display:none;">
                    <td><table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
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
                                        <td class="titel" align="left"><font color="#FF0000"><strong>Error</strong></font></td>
                                      </tr>
                                      <tr>
                                        <td class="red_font9" align="left">
                                        <div id="lblerror" class="font10" align="left" style=" width:400px; margin-left:0px; color:#FF0000; border-color:#FF0000; visibility:hidden;" ></div>
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
                  <?php
					}
					?>
                  </form>
          </table></td>
  </tr>
</table>

    </td>
    <td width="10">&nbsp;</td>
  </tr>

</table>