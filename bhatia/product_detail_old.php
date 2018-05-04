<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<script language="JavaScript"
         type="text/javascript" src="js/ahahLib.js"></script> 
<script language="JavaScript"
         type="text/javascript">
function makeactive(tab) { 
document.getElementById("tab1").className = ""; 
document.getElementById("tab2").className = ""; 
document.getElementById("tab"+tab).className = "active";
callAHAH('content.php?content= '+tab+'&prod_id=<?php echo $_REQUEST['pid']; ?>', 'content','getting content for tab '+tab+'. Wait...', 'Error'); 
} 
</script>

<link href="css/tab.css" rel="stylesheet" type="text/css" />

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
                <td width="5"><img src="images/box_01.jpg" width="5" height="41" /></td>
                <td align="left" valign="top" background="images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="6" colspan="2" align="left" valign="middle"></td>
                  </tr>
                  <tr>
                    <td width="30" align="left" valign="middle"><img src="images/Arrow.png" width="24" height="24" /></td>
                    <td class="title"><a href="#">
                    <?php
					$pro=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."' order by Disp_Order");
					$pd=mysql_fetch_array($pro);
					echo $pd['Prod_Name'];
					?>
                    </a></td>
                  </tr>
                </table></td>
                <td width="5"><img src="images/box_04.jpg" width="5" height="41" /></td>
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
                          <img src="product/ph<?php echo $pm['Is_Image'] ?>" width="120" height="150" border="0" /></a></td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top" background="images/bg2.jpg" bgcolor="#FFFFFF" style="background-repeat:repeat-x;"><form action="cart_process.php?itm=<?php echo $pd['Prod_Id']; ?>" method="post" name="frmdata" id="frmdata">
                      <table width="100%" border="0" cellspacing="3" cellpadding="3">
                        <tr>
                          <td width="150" align="right" valign="middle" class="fonts10"><strong>Brand/Product Name</strong></td>
                          <td width="3" align="left" valign="middle" class="fonts10"><strong>:</strong></td>
                          <td align="left" valign="middle" class="fonts10"><?php
						$br=mysql_query("select * from brand_mst where Is_Active=1 and Brand_Id='".$pd['Brand_Id']."' order by Disp_Order");
						$b=mysql_fetch_array($br);
						echo $b['Name']; ?>&nbsp;</td>
                          <td width="250" rowspan="9" align="left" valign="top" class="fonts10">
                          <?php include('rating.php'); ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="right" valign="middle" class="fonts10"><strong>Product Name</strong></td>
                          <td align="left" valign="middle" class="fonts10">:</td>
                          <td align="left" valign="middle" class="fonts10"><?php echo $pd['Prod_Name'];?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="middle" class="fonts10"><strong>MRP Price</strong></td>
                          <td align="left" valign="middle" class="fonts10"><strong>:</strong></td>
                          <td align="left" valign="middle" class="fonts12red"><del><?php echo number_format($pd['MRP_Price'],2); ?></del></td>
                        </tr>
                        <tr>
                          <td align="right" valign="middle" class="fonts10"><strong>Bhatia Price</strong></td>
                          <td align="left" valign="middle" class="fonts10">:</td>
                          <td align="left" valign="middle" class="fonts12red"><?php echo number_format($pd['Final_Price'],2); ?></td>
                        </tr>
                        <tr>
                          <td align="right" valign="middle" class="fonts10"><strong>Price in USD</strong></td>
                          <td align="left" valign="middle" class="fonts10">:</td>
                          <td align="left" valign="middle" class="fonts12red">$<?php 
						  //$total=10;
						  /*require_once("currency_class.php");
									$c = new JOJO_Currency_yahoo();
									$list = $c->getCurrencies();
									
									// Check any submitions
										$amount =$pd['Final_Price']; // Your Amount
										// From
										$from = 'INR';
										$from_text = $list[$from];
										
									//////// Dollar Convert //////////////	
										// To
										$to = 'USD';
										$to_text = $list[$to];
										// Get rate
										$rate = $c->getRate($from,$to, true);
										// Total price (to 2 decemial points)
										$total = "<br>$".number_format(($rate*$amount),2);
									     $total." USD";		*/
										
										$_SESSION['total']=$total;
						     ?></td>
                        </tr>
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
                          <td align="right" valign="middle" class="fonts10"><strong>Qty</strong></td>
                          <td align="left" valign="middle" class="fonts10">:</td>
                          <td align="left" valign="middle" class="fonts12red"><select name="qty" id="qty">
                            <?php
						for($w=1;$w<=9;$w++) {?>
                            <option value="<?php echo $w; ?>"><?php echo $w; ?></option>
                            <?php } ?>
                          </select></td>
                        </tr>
                        <tr>
                          <td align="right" valign="middle" class="fonts10">&nbsp;</td>
                          <td align="left" valign="middle" class="fonts10">&nbsp;</td>
                          <td align="left" valign="middle" class="fonts10"><input type="image"  src="images/adtocart.jpg" border="0" /></td>
                        </tr>
                      </table>
                    </form></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                        <ul id="tabmenu" > 
                        <li onclick="makeactive(1)"><a class=""
                              id="tab1">Specification</a></li> 
                        <li onclick="makeactive(2)"><a class=""
                              id="tab2">Gellary</a></li> 
                        </ul> 
                        <div id="content">
                        asdasd
                        </div>
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
</body>
</html>