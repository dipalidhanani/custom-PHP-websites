<?php
if($_REQUEST['pid']=='')
{ ?>
<script language="javascript">
window.location='<?php HTTP_BASE_URL; ?>index.php';
</script>
<?php exit; }
$pro=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."' order by Disp_Order");
$rows=mysql_num_rows($pro);
$pd=mysql_fetch_array($pro);
if($rows==0)
{ ?>
<script language="javascript">
window.location='<?php HTTP_BASE_URL; ?>index.php';
</script>
<?php } ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="virtuemart.css" type="text/css">

<title><?php echo $pd['Prod_Name']; ?></title>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>
 <?php
  $hit=mysql_fetch_array(mysql_query("select * from prod_mst where Prod_Id='".$_REQUEST['pid']."' order by Prod_Id Desc limit 1")); 
  if(mysql_affected_rows()>0)
  $hit=$hit['Hits']+1;
  $column=array("Hits");
  $value=array($hit);
  $pid=$_REQUEST['pid'];
  $db->update("prod_mst","Prod_Id",$pid,$column,$value);   ?>   
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                    <td align="left" class="title"><a href="#">
                      <?php echo $pd['Prod_Name']; ?>
                      </a>                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      </table></td>
                    </tr>
                </table></td>
                <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <td width="100" align="center" valign="top" bgcolor="#FFFFFF"><table width="120" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="170" align="center" bgcolor="#FFFFFF"><a href="#">
                          <?php
						$prod_img=mysql_query("select * from prod_img where Prod_Id='".$_REQUEST['pid']."' order by Disp_Order limit 1");
						$pm=mysql_fetch_array($prod_img);
						?>
                          <img src="product/ph<?php echo $pm['Is_Image'] ?>" width="120" height="150" border="0" title="<?php echo $pd['Prod_Name']; ?>" alt="<?php echo $pd['Prod_Name']; ?>" /></a></td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top" background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg" bgcolor="#FFFFFF" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="top"><form action="<?php echo HTTP_BASE_URL_ORDER; ?>cart_process.php?itm=<?php echo $pd['Prod_Id']; ?>" method="post" name="frmdata" id="frmdata">
                        <input  type="hidden" name="total_amt" value="<?php echo $pd['Final_Price']; ?>"  />
                        <input  type="hidden" name="cod_amt" value="150"  id="cod_amt" />
                          <table width="100%" border="0" cellspacing="3" cellpadding="3">
                            <tr>
                              <td width="150" align="right" valign="middle" class="fonts10"><strong>Brand/Product Name</strong></td>
                              <td width="3" align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts10"><?php
						$br=mysql_query("select * from brand_mst where Is_Active=1 and Brand_Id='".$pd['Brand_Id']."' order by Disp_Order");
						$b=mysql_fetch_array($br);
						echo $b['Name']; ?>
                                &nbsp;</td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" class="fonts10"><strong>Product Name</strong></td>
                              <td align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts10"><?php echo $pd['Prod_Name'];?></td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" class="fonts10"><strong>MRP Price</strong></td>
                              <td align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts12red"><table width="100" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" align="right"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="10" height="14" border="0" /></td>
                                  <td>&nbsp;<del><?php echo number_format($pd['MRP_Price'],2); ?></del></td>
                                </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" class="fonts10"><strong>BM Price</strong></td>
                              <td align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts12red"><table width="100" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td width="10" align="right"><img src="<?php echo HTTP_BASE_URL; ?>images/rupees.png" width="10" height="14" border="0" /></td>
                                  <td>&nbsp;<?php echo number_format($pd['Final_Price'],2); ?>&nbsp;</td>
                                </tr>
                              </table></td>
                            </tr>
                            <?php  //$_SESSION['total']=$pd['Final_Price'];  ?>
                            <tr>
                              <td align="right" valign="middle" class="fonts10"><strong>Available Color</strong></td>
                              <td align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts12red"><select name="color" id="color">
                                <?php
						$color_qry=mysql_query("select * from color_mst where Prod_Id='".$pd['Prod_Id']."'");
						while($co=mysql_fetch_array($color_qry)) {
						?>
                                <option value="<?php echo $co['Color']; ?>"><?php echo $co['Color']; ?></option>
                                <?php } ?>
                              </select></td>
                            </tr>
                            <tr>
                              <td align="right" valign="middle" class="fonts10"><strong>Quantity</strong></td>
                              <td align="left" valign="middle" class="fonts10">:</td>
                              <td align="left" valign="middle" class="fonts12red"><select name="qty" id="qty">
                                <?php
						for($w=1;$w<=9;$w++) {?>
                                <option value="<?php echo $w; ?>"><?php echo $w; ?></option>
                                <?php } ?>
                              </select></td>
                            </tr>
                            <?php if($pd['Final_Price']!='0' || $pd['Final_Price']!='0.00') { ?>
                            <tr>
                              <td align="right" valign="middle" class="fonts10">&nbsp;</td>
                              <td align="left" valign="middle" class="fonts10">&nbsp;</td>
                              <td align="left" valign="middle" class="fonts10"><input type="image"  src="<?php echo HTTP_BASE_URL; ?>images/adtocart.jpg"  border="0" style="height:25px;" /></td>
                            </tr>
                            <?php } ?>
                          </table>
                        </form></td>
                        <td align="left" valign="top">
                        <?php include('rating.php') ?>
                        </td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="30" align="left" valign="middle">&nbsp;</td>
                        <td align="left" valign="middle"><iframe src="http://www.facebook.com/plugins/like.php?action=recommend&amp;channel_url=https%3A%2F%2Fs-static.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%3Fversion%3D3%23cb%3Df1590c10e28ced4%26relation%3Dparent.parent&amp;extended_social_context=false&amp;href=<?php echo curPageURL();?>&amp;layout=standard&amp;locale=en_US&amp;node_type=link&amp;sdk=joey&amp;show_faces=false&amp;width=500" class="fb_ltr" title="Like this content on Facebook." style="border: medium none; overflow: hidden; height: 30px; width: 500px;" name="f4db7a1018ce16" id="f1d26b2e9f1a0ea" scrolling="no"></iframe></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td>
    <div id="TabbedPanels1" class="TabbedPanels">
                          <ul class="TabbedPanelsTabGroup">
                            <li class="TabbedPanelsTab" tabindex="0">Specification</li>
                            <li class="TabbedPanelsTab" tabindex="0">Reviews</li>
                             <li class="TabbedPanelsTab" tabindex="0">Gallery</li>
                          </ul>
                          <div class="TabbedPanelsContentGroup">
                            <div class="TabbedPanelsContent">
                            <?php include 'mobile_spec.php';?>
                            </div>
                            <div class="TabbedPanelsContent" style="min-height:250px;">
							<?php include 'review.php';	?>
							</div>
                             <div class="TabbedPanelsContent" style="min-height:250px;">
							<?php include 'mobile_gallery.php';	?>
							</div>
                          </div>
                        </div>
  </tr>
</table>
</td>
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
  </tr>
</table>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html>