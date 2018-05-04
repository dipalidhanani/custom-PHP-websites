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
            <form name="frmuseradd" method="post" action="prod_process.php" enctype="multipart/form-data">
            <?php } else { ?>
            <form name="frmuseradd" method="post" action="prod_process.php?is_edit=1" enctype="multipart/form-data">
            <?php } ?>
            <input type="hidden" name="txtid" value="<?php echo $_REQUEST['eid']; ?>" />
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="300" align="right" valign="top" class="normal_fonts9"> Brand Name</td>
                <td width="10" align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9">
                <select name="brand" id="brand">
                <option value="0">Select Brand</option>
                <?php 
				$query="select * from brand_mst where Is_Active=1 order by Disp_Order";
				$data=mysql_query($query);
				while($j=mysql_fetch_array($data)) {?>
                <option value="<?php echo $j['Brand_Id']; ?>" <?php if($k['Brand_Id']==$j['Brand_Id']) { ?> selected="selected" <?php } ?>><?php echo $j['Name']; ?></option>
                <?php } ?>
                </select></td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Product Name</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="pname" type="text" class="normal_fonts9" id="pname" size="40" value="<?php echo $k['Prod_Name']; ?>" /></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">Product Code</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="pcode" type="text" class="normal_fonts9" id="pcode" value="<?php echo $k['Prod_Code']; ?>" />&nbsp;&nbsp;</td>
              </tr>
              <tr>
                <td align="right" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">Launch Date</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="sdate" type="text" id="sdate" value="<?php echo $k['Launch_Date']; ?>" size="15" readonly="readonly"/>
                  <input type="button" name="butten"  value="..." class="normal_fonts9" id="sddate" />
                  <script type="text/javascript">
      var cal = Calendar.setup({

          onSelect: function(cal) { cal.hide() }

      });

     

      cal.manageFields("sddate", "sdate", "%e/%B/%Y");

     

                  </script></td>
              </tr>
              <tr>
                <td align="right" valign="top" class="normal_fonts9">MRP Price</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><input name="mrp" type="text" class="normal_fonts9" id="mrp" value="<?php echo $k['MRP_Price']; ?>" size="15"  style="text-align:right"/></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Final Price</td>
                <td align="center" valign="top" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><input name="fprice" type="text" class="normal_fonts9" id="fprice" value="<?php echo $k['Final_Price']; ?>" size="15" style="text-align:right" /></td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">Is Active Product</td>
                <td align="center" valign="top" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><label>
                  <input type="checkbox" name="active" value="1" id="active_0" <?php if($k['Is_Active']==1){  ?> checked="checked" <?php } ?> />
                  Active</label>
                  <label>
                    <input type="checkbox" name="active" value="0" id="active_1" <?php if($k['Is_Active']=='0'){  ?> checked="checked" <?php } ?> />
                    InActive</label></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Display Order</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><input name="order" type="text" class="normal_fonts9" id="order" value="<?php echo $k['Disp_Order']; ?>" size="5" /></td>
              </tr>
              <tr>
                <td align="left" bgcolor="#FFFFFF" class="normal_fonts12_black">Enter Product Images</td>
                <td align="center" valign="top" bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#FFFFFF" class="normal_fonts9">&nbsp;</td>
              </tr>
              
              
              <tr>
              <td colspan="3">
              
              <?php for($i=1;$i<=count($cntype);$i++){ 	?>

        <div id="test<?php echo $i;?>" class="divpad">
              
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Image</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="260" align="left" valign="middle"><input name="image" id="image" type="file"/>
                      <input name="hidden" type="hidden" value="1" />
                      <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" /></td>
                    <td align="left" valign="middle">Display Order : 
                      <input name="disp_order" type="text" class="normal_fonts9" id="disp_order" value="" size="5"  style="text-align:right"/></td>
                  </tr>
                </table></td>
              </tr>
</table>

 </div>

             <?php 

				  }

				  

				   if(count($cntype)==0)

				  {

				  ?>

                   <div id="test<?php echo $i;?>" class="divpad">
                   
                   
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Image</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="260" align="left" valign="middle"><input name="image" id="image" type="file"/>
                      <input name="hidden" type="hidden" value="1" />
                      <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" /></td>
                    <td align="left" valign="middle">Display Order : 
                      <input name="disp_order" type="text" class="normal_fonts9" id="disp_order" value="" size="5"  style="text-align:right"/></td>
                  </tr>
                </table></td>
              </tr>
</table>

  </div>

                          <?php 

				  $i=2;

				  }

				  for($i=2;$i<=15;$i++)

				  {

				  ?>

                  

                   <div id="test<?php echo $i;?>" class="divpad" style="display:none;">
                   
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">Image</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">:</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="260" align="left" valign="middle"><input name="image" id="image" type="file"/>
                      <input name="hidden" type="hidden" value="1" />
                      <input type="hidden" name="existing_file_value" value="<?php echo $k['Is_Image']; ?>" /></td>
                    <td align="left" valign="middle">Display Order : 
                      <input name="disp_order" type="text" class="normal_fonts9" id="disp_order" value="" size="5"  style="text-align:right"/></td>
                  </tr>
                </table></td>
              </tr>
</table>

</div>
 <?php } ?>

                         

                   

              
              </td>
              </tr>
              
            
              
              
              
              <tr>
                <td align="right" bgcolor="#f3f3f3" class="normal_fonts9">&nbsp;</td>
                <td align="center" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">&nbsp;</td>
                <td bgcolor="#f3f3f3" class="normal_fonts9">
                <div id="addtestbutton" class="divpad">
                <span style="cursor:pointer" onClick="addcontact();">Add More.. </span>
                </div>
                </td>
              </tr>
              <tr>
                <td align="right" class="normal_fonts9">&nbsp;</td>
                <td align="center" class="normal_fonts9">&nbsp;</td>
                <td align="left" valign="top" class="normal_fonts9"><input name="button4" type="submit" class="normal_fonts12_black" id="button4" style="width:80px; height:30px" value="Submit" /></td>
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

</body>
</html>
