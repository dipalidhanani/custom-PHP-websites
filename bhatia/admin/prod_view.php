<?php session_start();

	require_once("config.inc.php");

	require_once("Database.class.php");

	require_once("session_check.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();

	$user=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['eid']."'");

	$k=mysql_fetch_array($user);

	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo ADMIN_TITLE; ?></title>

<link href="css/css.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="css/menu_style.css" type="text/css" />

<script src="calender/js/format1.js"></script>

<script src="calender/js/format.js"></script>

<link rel="stylesheet" type="text/css" href="calender/css/format.css" />

<link rel="stylesheet" type="text/css" href="calender/css/border-radius.css" />

<link rel="stylesheet" type="text/css" href="calender/steel/steel.css" />

<style type="text/css">

<!--

body {

	background-color: #E8E8E8;

	margin-left: 0px;

	margin-top: 0px;

	margin-right: 0px;

	margin-bottom: 0px;

}

-->

</style>

<script language="JavaScript">

 var count=<?php echo count($cntype)==0?"1":count($cntype);?>;

				  function addcontact()

				  {

				  	count=count+1;

					var ldiv=document.getElementById("test"+count);

					ldiv.style.display="block";

					if(count==15)

					{

						var objbutton=document.getElementById("addtestbutton");

						objbutton.style.display="none";						

					}

				  } 

</script>  



</head>

<body>

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">

  <tr>

    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">

      <tr>

        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php'); ?></td>

      </tr>

      <tr>

        <td height="2" bgcolor="#000000"></td>

      </tr>

      <tr>

        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>

      </tr>

      <tr>

        <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="10" cellpadding="0">

          <tr>

            <td class="normal_fonts14_black"><a href="prod.php">Product  Details</a></td>

            </tr>

          <tr>

            <td>

            <?php if($_REQUEST['eid']=='') { ?>

            <form name="frmuseradd" method="post" action="#" enctype="multipart/form-data">

            <?php } else { ?>

            <form name="frmuseradd" method="post" action="#" enctype="multipart/form-data">

            <?php } ?>

            <input type="hidden" name="txtid" value="<?php echo $_REQUEST['eid']; ?>" />

            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">

              <tr>

                <td width="300" height="30" align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9"> Brand Name</td>

                <td width="10" align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9">

                <?php 

				$query="select * from brand_mst where Is_Active=1 and Brand_Id='".$k['Brand_Id']."' order by Disp_Order";

				$data=mysql_query($query);

				$j=mysql_fetch_array($data);

				echo $j['Name'];

				?>

                </td>

              </tr>

              <tr>
                <td height="30" align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Selected Mobile OS</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">
                <?php
				$os_data=mysql_query("SELECT * FROM mobile_os WHERE Mobile_OS_Id='".$k['Prod_Mobile_OS']."' ORDER BY Mobile_OS");
				$os_d=mysql_fetch_array($os_data);
				echo $os_d['Mobile_OS'];
				?>
                </td>
              </tr>
              <tr>

                <td height="30" align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Product Name</td>

                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>

                <td bgcolor="#F3F3F3" class="normal_fonts9"><?php echo $k['Prod_Name']; ?></td>

              </tr>

              <tr>

                <td height="30" align="right" valign="top" class="normal_fonts9">Product Code</td>

                <td align="center" valign="top" class="normal_fonts9">:</td>

                <td class="normal_fonts9"><?php echo $k['Prod_Code']; ?></td>

              </tr>

              <tr>

                <td height="30" align="right" bgcolor="#f3f3f3" class="normal_fonts9">Model Type</td>

                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9">

                <?php 

				echo $k['Tech_Type'];

				?>

                  </td>

              </tr>

              <tr>

                <td height="30" align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">Available Color(s)</td>

                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>

                <td bgcolor="#FFFFFF" class="normal_fonts9">

                <?php if($_REQUEST['eid']!='') { ?>

                 <?php $col_qry=mysql_query("select * from color_mst where Prod_Id='".$_REQUEST['eid']."'");

		$rows=mysql_affected_rows();		

		$count=1;

		while($color=mysql_fetch_array($col_qry))

		{

			echo $color['Color'];

			if($count!=$rows)

			{

				echo ",";

			}

			$count++;

		}

				?>

                <?php }?>			

                 </td>

              </tr>

              <tr>

                <td height="30" align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Dillar Price</td>

                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9"><?php echo $k['Dillar_Price']; ?></td>

              </tr>

              <tr>

                <td height="30" align="right" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">MRP Price</td>

                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>

                <td bgcolor="#FFFFFF" class="normal_fonts9"><?php echo $k['MRP_Price']; ?></td>

              </tr>

              <tr>

                <td height="30" align="right" bgcolor="#f3f3f3" class="normal_fonts9">Bhatia Price</td>

                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9"><?php echo $k['Final_Price']; ?></td>

              </tr>

              <tr>

                <td height="30" align="right" bgcolor="#FFFFFF" class="normal_fonts9">Is Active Product</td>

                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">:</td>

                <td bgcolor="#FFFFFF" class="normal_fonts9">

                <?php 

				if($k['Is_Active']==1) { echo "Active"; } else { echo "Inactive"; } 

				?>

                  </td>

              </tr>

              <!--<tr>

                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Display Order</td>

                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>

                <td bgcolor="#f3f3f3" class="normal_fonts9"><?php echo $k['Disp_Order']; ?></td>

              </tr>-->

              <tr>
                <td colspan="3" align="left" bgcolor="#FFFFFF" class="normal_fonts14_black">Selected Mobile Features </td>
                </tr>
              <tr>
                <td colspan="3" align="left" bgcolor="#FFFFFF" class="normal_fonts10"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                  <tr>
                    <td width="20" align="center" valign="middle"><input name="is_3g" type="checkbox" id="is_3g" value="1" <?php if($k['Is_3G']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">3G</td>
                    <td width="20" align="center" valign="middle"><input name="is_bluetooth" type="checkbox" id="is_bluetooth" value="1" <?php if($k['Is_Bluetooth']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Bluetooth</td>
                    <td width="20" align="center" valign="middle"><input name="is_camera" type="checkbox" id="is_camera" value="1" <?php if($k['Is_Camera']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Camera</td>
                    <td width="20" align="center" valign="middle"><input name="is_dualsim" type="checkbox" id="is_dualsim" value="1" <?php if($k['Is_Dual_SIM']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Dual SIM</td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><input name="is_FM_radio" type="checkbox" id="is_FM_radio" value="1" <?php if($k['Is_FM_Radio']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">FM Radio</td>
                    <td align="center" valign="middle"><input name="is_infrared" type="checkbox" id="is_infrared" value="1" <?php if($k['Is_Infrared']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Infrared</td>
                    <td align="center" valign="middle"><input name="is_memory_slot" type="checkbox" id="is_memory_slot" value="1"  <?php if($k['Is_Memory_Slot']==1) { ?> checked="checked" <?php } ?>/></td>
                    <td align="left" valign="middle">Memory Slot</td>
                    <td align="center" valign="middle"><input name="is_qwerty" type="checkbox" id="is_qwerty" value="1" <?php if($k['Is_QWERTY']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">QWERTY</td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><input name="is_secondary_camera" type="checkbox" id="is_secondary_camera" value="1" <?php if($k['Is_Secondary_Camera']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Secondary Camera</td>
                    <td align="center" valign="middle"><input name="is_smartphone" type="checkbox" id="is_smartphone" value="1" <?php if($k['Is_SmartPhone']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">SmartPhone</td>
                    <td align="center" valign="middle"><input name="is_touchscreen" type="checkbox" id="is_touchscreen" value="1" <?php if($k['Is_Touchscreen']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Touchscreen</td>
                    <td align="center" valign="middle"><input name="is_video_recording" type="checkbox" id="is_video_recording" value="1" <?php if($k['Is_Video_Recording']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Video Recording</td>
                  </tr>
                  <tr>
                    <td align="center" valign="middle"><input name="is_wifi" type="checkbox" id="is_wifi" value="1" <?php if($k['Is_WiFi']==1) { ?> checked="checked" <?php } ?> /></td>
                    <td align="left" valign="middle">Wi-Fi</td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table></td>
                </tr>
              <tr>

                <td align="left" bgcolor="#FFFFFF" class="normal_fonts14_black">Product Specification</td>

                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>

                <td bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>

              </tr>

              <?php 

			  $qry=mysql_query("select * from prod_title group by Prod_Desc_Cat_Id");

			  $main=1;

			  while($cat=mysql_fetch_array($qry))

			  {

			  ?>

              <tr>

                <td align="right" bgcolor="#CCCCCC" class="normal_fonts12_black">

				<?php

			$cat_mst=mysql_query("select * from prod_desc_cat where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order");

				$pcat=mysql_fetch_array($cat_mst);

				echo $pcat['Category'];

				?></td>

                <td align="center" valign="top" bgcolor="#CCCCCC" class="normal_fonts9">&nbsp;</td>

                <td bgcolor="#CCCCCC" class="normal_fonts9">&nbsp;</td>

              </tr>

              <?php 

		  	$an=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$cat['Prod_Desc_Cat_Id']."' order by Disp_Order") or die(mysql_error());

		  	$cnt=1;

			$x=1;

		  	if(mysql_affected_rows()>0){

		 	 while($a=mysql_fetch_array($an))

		  	{

				if($x%2==0)

				{

					$color='#FFFFFF';

				}

				else

				{

					$color='#f3f3f3';

				}

				$query5=mysql_query("select * from prod_desc where Title_Id='".$a['Title_Id']."' and Prod_Id='".$_REQUEST['eid']."' order by Prod_Desc_Id");

					while($rr=mysql_fetch_array($query5))

					{ ?>  	

            

              <tr bgcolor="<?php echo $color; ?>">

                <td align="right" valign="top" class="normal_fonts9"><?php echo $a['Title']; ?></td>

                <td align="center" valign="top" class="normal_fonts9">:</td>

                <td align="left" valign="top" class="normal_fonts9">

				<?php 

				if($a['Title']=='Other Features ')

				{

					$valid=$rr['Desc'];

					$dx=split(',',$valid);

					$y=0;

					foreach ($dx as $val)

					{ ?>

						&diams;&nbsp;

						<?php echo $dx[$y]."</br>";

						$y++;

					}

				}

				else

				{

					echo $rr['Desc'];					

				}

				?></td>

              </tr>

              <?php $x++; }} $main++;} } ?>

              <tr>

                <td align="right" class="normal_fonts9">&nbsp;</td>

                <td align="center" class="normal_fonts9">&nbsp;</td>

                <td align="left" valign="top" class="normal_fonts9"><input name="button4" type="button" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Back" onclick="javascript:history.go(-1);" /></td>

              </tr>

              <tr>

                <td height="10" colspan="3" align="right" class="normal_fonts9"></td>

                </tr>

            </table>

            </form>

            </td>

          </tr>

          </table></td>

      </tr>

    </table></td>

  </tr>

</table>

<table width="100%" border="0" cellspacing="0" cellpadding="5">

  <tr>

    <td><?php include("footer.php"); ?></td>

  </tr>

</table>

</body>

</html>

