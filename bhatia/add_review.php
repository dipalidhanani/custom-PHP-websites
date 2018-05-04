<script language="javascript">
var xmlHttp
function show_first_brand_home(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="review_brand_home.php";
url=url+"?is_brand_home="+str;
xmlHttp.onreadystatechange=stateChanged_home;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged_home()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint_home").innerHTML="";
document.getElementById("txtHint_home").innerHTML=xmlHttp.responseText;
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
}
</script>

<script language="javascript">
function validation_home()
{
	if(document.getElementById('sel_brand_home').value=='')
	{
		alert('Please select brand');
		return false;
	}
	if(document.getElementById('sel_product_home').value=='')
	{
		alert('Please select product');
		return false;
	}
	if(document.getElementById('txtname_home').value=='')
	{
		alert('Please enter your name');
		return false;
	}
	if(document.getElementById('txtemail_home').value=='')
	{
		alert('Please enter your email address');
		return false;
	}
	if(document.getElementById('txtemail_home').value!='')
	{
			var x=document.getElementById('txtemail_home').value;
			var atpos=x.indexOf("@");
			var dotpos=x.lastIndexOf(".");
			if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
			{
				alert('please enter valid email address');
				return false;
			}
	}
	if(document.getElementById('comment_home').value=='')
	{
		alert('Please enter your comment');
		return false;
	}
	
	
}
		
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_01.jpg" width="5" height="41" /></td>
                    <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="6" colspan="2" align="left" valign="middle"></td>
                      </tr>
                      <tr>
                        <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td class="title"><span class="title_red">Write </span>Your Reviews</td>
                            <td align="right" valign="middle">&nbsp;</td>
                          </tr>
                        </table></td>
                      </tr>
                    </table></td>
                    <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td align="left" valign="top" bgcolor="#FFFFFF" >
                <form name="frmcom" method="post" action="<?php echo HTTP_BASE_URL; ?>comment_process_home.php" onsubmit="return validation_home();">
                <input type="hidden"  name="url" value="<?php echo HTTP_BASE_URL; ?>index.php?pageno=16" />
                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="title_10">
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                     <td height="27" align="left" valign="middle">Select Brand</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle"><select name="sel_brand_home" id="sel_brand_home" onchange="show_first_brand_home(this.value);">
                      <option selected="selected" value="">Select Brand</option>
                      <?php
								 $first_query=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
								 while($first_barnd=mysql_fetch_array($first_query))
								 {
								 ?>
                      <option value="<?php echo $first_barnd['Brand_Id']; ?>"><?php echo $first_barnd['Name']; ?></option>
                      <?php } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle">Select Product</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle"><div id="txtHint_home">
                      <select name="sel_product_home" id="sel_product_home" >
                        <option selected="selected" value="">Select Product</option>
                      </select>
                    </div></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="24" align="left" valign="middle">Name</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle"><input type="text" name="txtname_home" id="txtname_home" size="25"  /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle">E-Mail Address</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle"><input type="text" name="txtemail_home" id="txtemail_home"  size="25"   /></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="27" align="left" valign="middle">Review</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle"><textarea name="comment_home" id="comment_home"  cols="20" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td height="35" align="center" valign="middle"><input type="submit" name="Submit" value="Submit" style="cursor:pointer;" class="button" /></td>
                  </tr>
                </table>
                </form>
                </td>
              </tr>
            </table>