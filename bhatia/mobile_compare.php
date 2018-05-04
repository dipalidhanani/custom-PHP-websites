<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 40;
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="<?php echo HTTP_BASE_URL; ?>css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>pagination/style2.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo HTTP_BASE_URL; ?>tooltip/jquery.js" type="text/javascript"></script>
	<script src="<?php echo HTTP_BASE_URL; ?>tooltip/main.js" type="text/javascript"></script>
<style>
#preview{
	position:absolute;
	border:1px solid #ccc;
	background:#FFF;
	padding:5px;
	display:none;
	color:#fff;
	}
</style>
<script language="javascript">
function validation()
{
	if(document.getElementById('sel_brand').value=='')
	{
		alert('Please select brand 1');
		return false;
	}
	if(document.getElementById('sel_second_brand').value=='')
	{
		alert('Please select brand 2');
		return false;
	}
	if(document.getElementById('first_product').value=='')
	{
		alert('Please select mobile 1');
		return false;
	}
	if(document.getElementById('second_product').value=='')
	{
		alert('Please select mobile 2');
		return false;
	}
	
	
}
</script>
<script language="javascript">
var xmlHttp
function show_first_brand(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="first_brand.php";
url=url+"?is_brand="+str;
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML="";
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
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
var xmlHttp
function show_second_brand(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="second_brand.php";
url=url+"?is_brand="+str;
xmlHttp.onreadystatechange=stateChanged_second;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged_second()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint1").innerHTML="";
document.getElementById("txtHint1").innerHTML=xmlHttp.responseText;
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
var xmlHttp
function show_first_product(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="first_product.php";
url=url+"?is_product="+str;
xmlHttp.onreadystatechange=stateChanged_first_product;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged_first_product()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint2").innerHTML="";
document.getElementById("txtHint2").innerHTML=xmlHttp.responseText;
document.getElementById('mobile1').innerHTML=document.getElementById('first_product').options[document.getElementById('first_product').selectedIndex].text;	
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
var xmlHttp
function show_second_product(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="second_product.php";
url=url+"?is_product="+str;
xmlHttp.onreadystatechange=stateChanged_second_product;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged_second_product()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint3").innerHTML="";
document.getElementById("txtHint3").innerHTML=xmlHttp.responseText;
document.getElementById('mobile2').innerHTML=document.getElementById('second_product').options[document.getElementById('second_product').selectedIndex].text;	
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
                                    <td class="title"><strong>Mobile Comparision</strong></td>
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
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td>
                            <form name="frmsubmit" id="frmsubmit" action="index.php" method="get" onsubmit="return validation();">
                                <input type="hidden" name="pageno" value="30" />
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">
                              <tr>
                                <td colspan="2" align="left" valign="middle" class="title_10">Are you confused about 'which mobile fits your requirements?' Dont worry. Try our 'Mobile Comparision' tool to compare 2 models...</td>
                              </tr>
                              <tr>
                                <td width="50%" align="center" valign="middle" class="fonts12red"><strong><label id="mobile1" for="mobile1">Mobile 1</label></strong></td>
                                <td width="50%" align="center" valign="middle"><span class="fonts12red"><strong><label id="mobile2" for="mobile2">Mobile 2</label></strong></span></td>
                              </tr>
                              <tr>
                                <td width="50%" align="center" valign="middle"><div id="txtHint2"><img src="images/mobile_icon.png" width="120" height="150" border="0" /></div></td>
                                <td width="50%" align="center" valign="middle"><div id="txtHint3"><img src="images/mobile_icon.png" width="120" height="150" border="0" /></div></td>
                              </tr>
                              <tr>
                                <td width="50%" align="center" valign="middle">
                                <select name="sel_brand" id="sel_brand" onchange="show_first_brand(this.value);">
                                  <option selected="selected" value="">Select Brand</option>
                                 <?php
								 $first_query=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
								 while($first_barnd=mysql_fetch_array($first_query))
								 {
								 ?> 
                                 <option value="<?php echo $first_barnd['Brand_Id']; ?>"><?php echo $first_barnd['Name']; ?></option>
                                 <?php } ?>
                                </select></td>
                                <td width="50%" align="center" valign="middle">
                                <select name="sel_second_brand" id="sel_second_brand" onchange="show_second_brand(this.value);">
                                <option selected="selected" value="">Select Brand</option>
                                <?php
								 $second_query=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
								 while($second_barnd=mysql_fetch_array($second_query))
								 {
								 ?> 
                                  <option value="<?php echo $second_barnd['Brand_Id']; ?>"><?php echo $second_barnd['Name']; ?></option>
                                 <?php } ?>
                                </select></td>
                              </tr>
                              <tr>
                                <td width="50%" align="center" valign="middle"><div id="txtHint"></div></td>
                                <td width="50%" align="center" valign="middle"><div id="txtHint1"></div></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center" valign="middle">
                                <input type="image" name="submitme" src="<?php echo HTTP_BASE_URL_ORDER; ?>images/compare.jpg" border="0" />
                                
                                </td>
                                </tr>
                              
                            </table></td>
                          </tr>
                        </table>
                        </form>
                            </td>
                          </tr>
                          
                        </table></td>
                      </tr>
                    </table>