<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 10;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="virtuemart.css" type="text/css">
<title>Untitled Document</title>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="pagination/style2.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function validation()
{
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
	if(document.getElementById('comment').value=='')
	{
		alert('please enter comment');
		return false;
	}
	
}
</script>
<body>
<?php
$prod_dd=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$_REQUEST['eid']."'");
$pp=mysql_fetch_array($prod_dd);
?>
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

                    <td height="6" colspan="3" align="left" valign="middle"></td>

                  </tr>

                  <tr>

                    <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>
                    

                    <td class="title"><?php echo $pp['Prod_Name']; ?> Reviews</td>
                    <td align="right" valign="middle" class="title">&nbsp;</td>

                  </tr>

                </table></td>

                <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td align="left" valign="top">

           

            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

              <tr>

                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding:5px;">
          <?php
		  $prod_img=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$_REQUEST['eid']."' ORDER BY Disp_Order LIMIT 1");
		  $pi=mysql_fetch_array($prod_img);
		  ?>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    
                      <tr>
                        <td width="100" align="center" valign="top"><a href="<?php echo $HTTP_BASE_URL; ?>index.php?pageno=17&eid=<?php echo $_REQUEST['eid']; ?>" class="title_10" title="View related reviews"><img src="<?php echo HTTP_BASE_URL; ?>product/<?php echo $pi['Is_Image']; ?>" width="80" height="100" border="0" /></a></td>
                        <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0">
                        <?php
			$query="SELECT * FROM review_mst WHERE Is_Approve=1 and Prod_Id='".$_REQUEST['eid']."' and Review_Id='".$_REQUEST['rid']."' ORDER BY Review_Id desc";
			$aff_rows=mysql_num_rows(mysql_query($query));
			$count=1;
			$result=$db->pagingLimit($query,$startpoint,$perpage);
			while($di=mysql_fetch_array($result))
			{ ?>
                          <tr>
                            <td valign="top" style="text-align:justify" class="title_9"><?php echo $di['Description']; ?></td>
                          </tr>
                          <tr>
                            <td class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tr>
                                <td align="left" valign="middle" class="fonts8">By <?php echo $di['Name']; ?> on
                              <?php $dx=split(" ",$di['Dt']);
		$date=$dx[0];
		$time=$dx[1];
		$d=split("-",$date);
		echo $final_date=$d[2]."/".$d[1]."/".$d[0]." ".$time;
		?></td>
                                <td align="right" valign="middle">&nbsp;</td>
                              </tr>
                            </table></td>
                          </tr>
                          <?php if($aff_rows!=$count) { ?>
                          <tr>
                            <td valign="top" height="1" class="border_bottom"></td>
                          </tr>
                          <?php } ?>
                          <?php $count++; } ?>
                        </table></td>
                      </tr>
                    
                    </table></td>
                  </tr>
                </table></td>

              </tr>
              <tr>
                <td align="center" valign="middle" bgcolor="#FFFFFF" class="title_10">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM review_mst ".substr($query,25,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=17&eid=".$_REQUEST['eid'].'&'); 
			?>
                </td>
              </tr>

            </table>

          

            </td>

          </tr>

          <tr>
            <td align="center" valign="top" bgcolor="#f3f3f3" class="title_10">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" class="title_10"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="middle" class="title"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                <form name="frmcom" method="post" action="<?php echo HTTP_BASE_URL; ?>comment_process.php">
                <input type="hidden" name="sel_product" value="<?php echo $_REQUEST['eid'] ?>" />
                <input type="hidden" name="url" value="<?php echo HTTP_BASE_URL; ?>index.php?pageno=17" />
                <table width="100%" border="0" cellpadding="5" cellspacing="0" class="title_10">
                <?php if($_REQUEST['msg']=='no') { ?>
                  <tr>
                    <td colspan="3" align="center" valign="middle" class="err_msg_10">Please enter required fields value.</td>
                  </tr>
                 <?php } ?> 
                 <?php if($_REQUEST['msg']=='yes') { ?>
                  <tr>
                    <td colspan="3" align="center" valign="middle" class="err_msg_10">Thank you for your review.your review will display after admin approval.</td>
                    </tr>
                   <?php } ?>
                  <tr>
                    <td width="200" align="right" valign="middle">Name</td>
                    <td width="20" align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input type="text" name="txtname" id="txtname" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">E-Mail Address</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input name="txtemail" type="text" id="txtemail" size="30" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top">Review</td>
                    <td align="center" valign="top">:</td>
                    <td align="left" valign="middle"><textarea name="comment" id="comment" cols="50" rows="5"></textarea></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">&nbsp;</td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="left" valign="middle"><input type="submit" name="Submit" value="Submit" /></td>
                  </tr>
                </table>
                </form>
                </td>
              </tr>
            </table></td>
            </tr>
        </table>
		</td>
      </tr>
    </table></td>

      </tr>

    </table></td>

  </tr>

</table>

</body>

</html>