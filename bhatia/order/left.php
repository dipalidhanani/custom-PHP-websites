<?php 
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  ?>

<link rel="stylesheet" href="<?php echo HTTP_BASE_URL_ORDER; ?>menu_style.css" type="text/css" />

<link href="<?php echo HTTP_BASE_UR_ORDER; ?>css/home.css" rel="stylesheet" type="text/css">

<link href="<?php echo HTTP_BASE_URL_ORDER; ?>css/css1.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('searchform').elements.length; i++) {
	  document.getElementById('searchform').elements[i].checked = checked;
	}
      }
	  
      function UncheckedAll () {
		checked = false;  
	for (var i = 0; i < document.getElementById('searchform').elements.length; i++) {
	  document.getElementById('searchform').elements[i].checked = checked;
	}
      }
</script>

<table width="220" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td><table width="220" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>

            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td height="6" colspan="2" align="left" valign="middle"></td>

                </tr>

              <tr>

                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>

                <td class="title"> Mobile Brands </td>

              </tr>

            </table></td>

            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>

          </tr>

        </table></td>

      </tr>

      <tr>

        <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

          <tr>

            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">

             <?php 

				$brand=mysql_query("select * from brand_mst where Is_Active=1 order by Disp_Order");

				$records=mysql_affected_rows(); 

				$i=1;

				while($k=mysql_fetch_array($brand))

				{

				?>

              <tr>

                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" <?php if($i!=$records) { ?>class="border_bottom" <?php } ?>>

               

                  <tr>

                    <td height="22" class="fonts10">&nbsp;<a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=2&bid=<?php echo $k['Brand_Id']; ?>&name=<?php echo $k['Name']; ?>" class="fonts10"><strong><?php echo $k['Name']; ?></strong></a></td>

                  </tr>

                  <tr>

                    <td height="5"></td>

                  </tr>

                  </table></td>

              </tr>

               <?php $i++; } ?> 

            </table></td>

            </tr>

          </table></td>

      </tr>

    </table></td>
  </tr>
  <tr>
    <td height="5"></td>
  </tr>

  <?php if($_REQUEST['pageno']!=21) { ?>

  <tr>

    <td><table width="220" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_01.jpg" width="5" height="41" /></td>

            <td align="left" valign="top" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_02.jpg" style="background-repeat:repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">

              <tr>

                <td height="6" colspan="2" align="left" valign="middle"></td>

              </tr>

              <tr>

                <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/Arrow.png" width="24" height="24" /></td>

                <td class="title"> Filter by Feature </td>

              </tr>

            </table></td>

            <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>

          </tr>

        </table></td>

      </tr>

      <tr>

        <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">

          <tr>

            <td bgcolor="#E0E0E0" background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg1.jpg" style="background-repeat:repeat-x; background-position:top;">

            <form name="searchform" method="get" action="<?php echo HTTP_BASE_URL; ?>index.php" id="searchform">
            <input type="hidden" name="pageno" value="8"  />

            <table width="100%" border="0" cellspacing="5" cellpadding="0">

              <tr>

                <td class="fonts8"> Filter your search by main features </td>

              </tr>

              <tr>

                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td width="112"><a  onclick='UncheckedAll();'><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/reset_filters.jpg" width="112" height="25" border="0" style="cursor:pointer;" /></a></td>

                    <td width="8">&nbsp;</td>

                    <td><a onclick='checkedAll();' style="cursor:pointer;"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/expand_all.jpg" width="84" height="25" border="0"/></a></td>

                  </tr>

                </table></td>

              </tr>

              <tr>

                <td height="25" class="fonts10"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                  <tr>

                    <td height="25" class="fonts10"><strong>Phone Features</strong></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td><input type="checkbox" name="smartphone" id="smartphone" value="1" <?php if($_REQUEST['smartphone']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Smartphone</td>

                      </tr>

                      <!--<tr>

                        <td><input type="checkbox" name="touchscreen" id="touchscreen" value="type" /></td>

                        <td class="fonts10">Touchscreen</td>

                      </tr>-->

                      <tr>

                        <td width="20"><input type="checkbox" name="qwerty" id="qwerty" value="1" <?php if($_REQUEST['qwerty']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">QWERTY</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="dual" id="dual" value="1" <?php if($_REQUEST['dual']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Dual SIM</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="gg" id="gg" value="1" <?php if($_REQUEST['gg']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">3G</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="bluetooth" id="bluetooth" value="1"  <?php if($_REQUEST['bluetooth']=='1') { ?> checked="checked" <?php } ?>/></td>

                        <td class="fonts10">Bluetooth</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="wifi" id="wifi" value="1" <?php if($_REQUEST['wifi']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Wi-Fi</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="camera" id="camera" value="1" <?php if($_REQUEST['camera']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Camera</td>

                        </tr>

                      <tr>

                        <td><input type="checkbox" name="second_camera" id="second_camera" value="1" <?php if($_REQUEST['second_camera']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Secondary Camera</td>

                      </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="video" id="video" value="1" <?php if($_REQUEST['video']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Video Recording</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="fm" id="fm" value="1" <?php if($_REQUEST['fm']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">FM Radio</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="infrared" id="infrared" value="1" <?php if($_REQUEST['infrared']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">Infrared</td>

                        </tr>

                      </table></td>

                    </tr>

                  <tr>

                    <td><table width="100%" border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td width="20"><input type="checkbox" name="memory" id="memory" value="1" <?php if($_REQUEST['memory']=='1') { ?> checked="checked" <?php } ?> /></td>

                        <td width="180" class="fonts10">Memory Slot </td>
                        </tr>

                      <tr>

                        <td colspan="2" class="border_bottom"></td>
                      </tr>

                      <tr>

                        <td height="25" colspan="2" class="fonts10"><strong>Mobile Type </strong></td>
                        </tr>

                      <tr>

                        <td>

                          <label>

                            <input name="mtype" type="radio" id="mtype_0" value="GSM"  <?php if($_REQUEST['mtype']=='GSM' || $_REQUEST['mtype']=='') { ?> checked="checked" <?php } ?>  />
                          </label></td>

                        <td class="fonts10">GSM</td>
                      </tr>

                      <tr>

                        <td><input type="radio" name="mtype" value="CDMA" id="mtype_1" <?php if($_REQUEST['mtype']=='CDMA') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">CDMA</td>
                      </tr>

                      <tr>

                        <td><input type="radio" name="mtype" value="BOTH" id="mtype_2" <?php if($_REQUEST['mtype']=='BOTH') { ?> checked="checked" <?php } ?> /></td>

                        <td class="fonts10">GSM  &amp; CDMA</td>
                      </tr>

                      <tr>

                        <td colspan="2" class="border_bottom"></td>
                      </tr>


                      <tr>

                        <td colspan="2" class="fonts10"><strong>Select Price :</strong> 

                          <select name="pricecat" id="pricecat" style="width:100px;">

                            <option value="0-10000000" <?php if($_REQUEST['pricecat']=='0-10000000') { ?>  selected="selected"  <?php } ?>>Select One</option>

                            <option value="0-2000" <?php if($_REQUEST['pricecat']=='0-2000') { ?>  selected="selected"  <?php } ?>>Rs.0 - Rs.2000</option>

                            <option value="2000-5000" <?php if($_REQUEST['pricecat']=='2000-5000') { ?>  selected="selected"  <?php } ?>>Rs.2000 - Rs.5000</option>

                            <option value="5000-8000" <?php if($_REQUEST['pricecat']=='5000-8000') { ?>  selected="selected"  <?php } ?>>Rs.5000 - Rs.8000</option>

                            <option value="8000-10000" <?php if($_REQUEST['pricecat']=='8000-10000') { ?>  selected="selected"  <?php } ?>>Rs.8000 - Rs.10000</option>

                            <option value="10000-20000" <?php if($_REQUEST['pricecat']=='10000-20000') { ?>  selected="selected"  <?php } ?>>Rs.10000 - Rs.20000</option>

                            <option value="20000-30000" <?php if($_REQUEST['pricecat']=='20000-30000') { ?>  selected="selected"  <?php } ?>>Rs.20000 - Rs.30000</option>

                            <option value="30000-10000000" <?php if($_REQUEST['pricecat']=='30000-10000000') { ?>  selected="selected"  <?php } ?>>Rs.30000 - Above</option>
                          </select></td>
                      </tr>

                      </table></td>

                    </tr>

                  </table></td>

              </tr>

              <tr>

                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

                 <!-- <tr>

                    <td height="25" class="fonts10"><strong>Price Range</strong></td>

                  </tr>

                  <tr>

                    <td height="5"></td>

                  </tr>-->

                  <!--<tr>

                    <td><select name="range" id="range" style="width:210px">

                      <option value="0">Select One</option>

                      <option value="1">1000-2000</option>

                      <option value="2">2000-5000</option>

                      <option value="3">5000-10000</option>

                      <option value="4">10000-20000</option>

                      <option value="5">20000 and above</option>

                    </select></td>

                  </tr>-->

                  <tr>

                    <td height="5"></td>

                  </tr>

                   <tr>

                    <td align="center" valign="middle"><input type="image" src="<?php echo HTTP_BASE_URL_ORDER; ?>images/search_btn.jpg" border="0" name="search" value=""  style="cursor:pointer;" /></td>

                  </tr>
                </table></td>

              </tr>

            </table>

            </form>

            </td>

          </tr>

        </table></td>

      </tr>

    </table></td>

  </tr>

  <?php } ?>

 <!-- <tr>

    <td height="10"></td>

  </tr>
  <tr>
    <td><?php //include('../home_right.php'); ?></td>
  </tr>-->

</table>

