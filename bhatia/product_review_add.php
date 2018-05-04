<?php
/*if($_SESSION['buserid']=='')
{
	$_SESSION['url']=HTTP_BASE_URL.'index.php?pageno=18&pid='.$_REQUEST['pid'];
	?>
	<script language="javascript">
	window.location='<?php echo HTTP_BASE_URL_ORDER; ?>index.php?pageno=6';
	</script>
 } */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="virtuemart.css" type="text/css">
<title>Untitled Document</title>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<script language="javascript">
function validation()
{
	if(document.getElementById('comment').value=='')
	{
		alert('please enter comment');
		return false;
	}
	if(document.getElementById('txtname').value=='')
	{
		alert('please enter your name');
		return false;
	}
	if(document.getElementById('txtemail').value=='')
	{
		alert('please enter your email address');
		return false;
	}
	if(document.getElementById('txtemail').value!='')
	{
		var x=document.getElementById('txtemail').value;
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			alert('Not a valid email address');
			return false;
		 }
	}
	
}
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                    <td class="title"><a href="#">
                    <?php
					$pro=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."' order by Disp_Order");
					$pd=mysql_fetch_array($pro);
					echo $pd['Prod_Name'];
					?>
                    </a></td>
                  </tr>
                </table></td>
                <td width="5"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/box_04.jpg" width="5" height="41" /></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">
              <tr>
                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                  <tr>
                    <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="120" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="180" align="center" bgcolor="#FFFFFF"><a href="#">
                          <?php
						$prod_img=mysql_query("select * from prod_img where Prod_Id='".$_REQUEST['pid']."' order by Disp_Order limit 1");
						$pm=mysql_fetch_array($prod_img);
						?>
                          <img src="product/ph<?php echo $pm['Is_Image'] ?>" width="120" height="150" border="0" /></a></td>
                      </tr>
                    </table></td>
                    <td align="left" valign="top" bgcolor="#FFFFFF" style="background-repeat:repeat-x;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="padding-right:10px;">
  <tr>
    <td height="10" align="left" valign="middle"></td>
  </tr>
  <tr>
    <td align="left" valign="middle"><span class="fonts10" style="text-align:justify"><?php echo $pd['Description']; ?></span></td>
  </tr>
  <tr>
    <td align="left" valign="middle" class="fonts10"><strong><?php  

				  if($pd['Dt']!='') {

				  echo date('d F Y',strtotime($pd['Dt']));

				  }

				  ?></strong></td>
  </tr>
</table>

                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                    <td background="<?php echo HTTP_BASE_URL_ORDER; ?>images/bg2.jpg" style="background-repeat:repeat-x;" align="left" valign="middle" bgcolor="#FFFFFF" class="title_12"> 
                    <form method="post" name="frmadd" action="comment_process.php?pid=<?php echo $_REQUEST['pid']; ?>" onsubmit="return validation();">
                    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                      <tr>
                        <td align="left" valign="middle" class="title_11">Post your Comment</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><textarea name="comment" id="comment" cols="70" rows="5"></textarea></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="title_10">Name</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><input name="txtname" type="text" class="title_10" id="txtname" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle" class="title_10">E-Mail Address</td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><input name="txtemail" type="text" class="title_10" id="txtemail" size="30" /></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle">
                        <input type="submit" name="submit" value="Submit" class="title_11" />
                        </td>
                      </tr>
                      <?php if($_REQUEST['msg']=='yes') { ?>
                      <tr>
                        <td align="left" valign="middle" class="err_msg_10">Your Comment has been successfully posted!! It will be disply after admin approval!!</td>
                      </tr>
                      <?php } ?>
                      <?php if($_REQUEST['msg']=='no') { ?>
                      <tr>
                        <td align="left" valign="middle" class="err_msg_10">Please enter required information first.</td>
                      </tr>
                      <?php } ?>
                    </table>
                    </form>
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
</table>
</body>
</html>