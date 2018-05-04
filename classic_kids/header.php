<link href="css/css-home.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-sidebar.css" />

<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js">

/***********************************************
* All Levels Navigational Menu- (c) Dynamic Drive DHTML code library (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>
<script type="text/javascript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<script language="javascript">

function validation_search()
{
	with(document.searchform)
	{
			var error=0;
			var message;
			
			if((searchtext.value=='') || (searchtext.value=='Search'))
			{
				error=1;
				message="Please enter Product Name / Product Code!";
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
<body onLoad="MM_preloadImages('images/menu1_09.png','images/menu1_08.png','images/menu1_03.png','images/menu1_04.png','images/menu1_05.png')" style="font-size:62.5%;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="5" style="background:url(images/top_bg.gif) repeat-x;"></td>
    </tr>
    <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
                <td align="right" style="background:url(images/home3_02.png) no-repeat right 3px;">&nbsp;</td>
                <td width="960"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0" class="border3" bgcolor="#FFFFFF">
                    <tr>
                        <td height="130" align="left" valign="top" bgcolor="#FFFFFF" style="background:url(images/search-img.png) no-repeat 650px bottom;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td width="17" height="25" align="left" valign="top"><img src="images/home3_03.png" width="17" height="23" style="margin-top:2px;" /></td>
                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td width="245" height="70" align="left" valign="bottom"><a href="index.php"><img src="images/logo.png" alt="Logo" title="Logo" width="244" height="65" border="0" /></a></td>
                                        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td height="10" colspan="4"></td>
                                                </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td align="right" valign="middle"><table border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td><a href="index.php?content=4"><img src="images/sign-up_01.png" width="104" height="64" border="0" /></a></td>
                                                        <td><img src="images/sign-up_02.png" width="2" height="64" /></td>
                                                         <?php					
															if($_SESSION['loginuserid']=="")
															{
														 ?>
                                                            <td><a href="index.php?content=14"><img src="images/sign-up_03.png" width="99" height="64" border="0" /></a></td>
                                                            <?php
															}
															else
															{
															?>
                                                      <td class="black10">
                                                    <a href="index.php?content=7&view=profiledetails#t"><img src="images/my_profile.png" width="79" height="64" border="0" /></a>
                                                      </td>
                                                      <td><img src="images/sign-up_02.png" width="2" height="64" /></td>
                                                      <td class="black10"><a href="logout.php"><img src="images/logout.png" width="68" height="64" border="0" /></a></td>
                                                             <?php } ?>
                                          </tr>
                                                    </table></td>
                                                <td width="20">&nbsp;</td>
                                                <td width="124" height="43" align="left" valign="middle" background="images/cart.png" style="background-repeat:no-repeat;background-position:left 8px;"> <a href="index.php?content=3" style="text-decoration:none;"><div>
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td width="60" height="46"></td>
                                                       
                                                        <td align="left" valign="top">
                                                        
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tr>
                                                                <td height="18" align="left" class="white8"><strong><?php if($_SESSION['cartno']!=""){echo $_SESSION['cartno'];} else {echo "0";}?></strong> Item(s)</td>
                                                                </tr>
                                                            <tr>
                                                                <td valign="top" class="white9"><strong>$ <?php  if($_SESSION["totalamountorder"]!=""){echo $_SESSION["totalamountorder"];} else {echo "00";} ?> </strong></td>
                                                                </tr>
                                                            </table> </td>
                                                         
                                                  </tr>
                                                  </table></div></a></td>
                                                </tr>
                                        </table></td>
                                        <td width="120">&nbsp;</td>
                                        </tr>
                                    <tr>
                                        <td colspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td><div id="ddtopmenubar" class="mattblackmenu">
                                                        <ul>
<li><a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','images/menu1_09.png',1)"><img src="images/menu_09.png" name="Image6" width="58" height="52" border="0" id="Image6" /></a></li>
<li><a href="#" rel="ddsubmenu2" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','images/menu1_08.png',1)"><img src="images/menu_08.png" name="Image7" width="79" height="53" border="0" id="Image7" /></a></li>
<li><a href="index.php?content=25" rel="ddsubmenu3" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','images/menu1_03.png',1)"><img src="images/menu_03.png" name="Image8" width="85" height="54" border="0" id="Image8" /></a></li>

<li><a href="#" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image9','','images/menu1_04.png',1)"><img src="images/menu_04.png" name="Image9" width="77" height="54" border="0" id="Image9" /></a></li>
<li><a href="index.php?content=10" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image10','','images/menu1_05.png',1)"><img src="images/menu_05.png" name="Image10" width="85" height="54" border="0" id="Image10" /></a></li>
</ul><script type="text/javascript">
ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
</script>
<ul id="ddsubmenu2" class="ddsubmenustyle3">
<?php 
$qselectmenu=mysql_query("select * from category_master where parent_category_ID=0 order by cat_display_order asc");
while($rowmenu=mysql_fetch_array($qselectmenu)){
?>
            <li><a href="index.php?content=1&type=<?php echo $rowmenu["category_ID"]; ?>" rel="subddsubmenu2"><?php echo $rowmenu["category_name"]; ?></a>
            <?php $qselectmenusub=mysql_query("select * from category_master where parent_category_ID='".$rowmenu["category_ID"]."'");
			$totsub=mysql_num_rows($qselectmenusub);
			if($totsub>0){
			?>
            <ul id="subddsubmenu2" class="ddsubmenustyle3">
            <?php 
while($rowmenusub=mysql_fetch_array($qselectmenusub)){
?>
            <li><a href="index.php?content=1&type=<?php echo $rowmenusub["category_ID"]; ?>"><?php echo $rowmenusub["category_name"]; ?></a></li> 
<?php } ?>                       
            </ul>
            <?php } ?>
            </li>         
<?php } ?>
        </ul>
      
                                                        </div></td>
                                                        <td>&nbsp;</td>
                                                        </tr>
                                                    <tr>
                                                        <td class="black8"><strong><span class="blue9">Free Shipping</span></strong> across India | <strong><span class="blue9">Cash on Delivery</span></strong> on all Orders | <span class="blue9">Popular :</span> tricycle, bed sets, angry birds, action figures</td>
                                                        <td>&nbsp;</td>
                                                    </tr>
                                                </table></td>
                                                <td width="290" align="right" valign="bottom"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <form name="searchform" id="searchform" method="get" action="index.php">
                 <input type="hidden" name="content" value="1" />
                                                    <tr>
                                                      <td align="right" valign="middle">
                                                      <input name="searchtext" type="text" class="font9"  id="searchtext" onFocus="if(this.value == 'Search') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Search';}"  value="Search" style="border:#999 1px solid; width:180px;" />
                                                      </td>
                                                      <td width="8">&nbsp;</td>
                                                      <td width="66"> <input type="image" src="images/search.png" width="66" height="23" onClick="return validation_search();"/></td>
                                                      <td width="30">&nbsp;</td>
                                                    </tr>
                 </form>
                                                    <tr>
                                                        <td height="10" colspan="4"></td>
                                                        </tr>
                                                </table></td>
                                            </tr>
                                        </table></td>
                                        </tr>
                                    </table></td>
                            </tr>
                            </table></td>
                    </tr>
                </table></td>
                <td>&nbsp;</td>
            </tr>
        </table></td>
    </tr>
</table>