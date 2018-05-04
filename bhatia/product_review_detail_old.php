<?php session_start();

	require_once("admin/config.inc.php");

	require_once("admin/Database.class.php");

	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 

	$db->connect();

	require_once ('pagination/pagination.php');

	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);

	$page = ($page == 0 ? 1 : $page);

	$perpage = 30;//limit in each page

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

                    <td class="title"><a href="#">

                    <?php

					$pro=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."' order by Disp_Order");

					$pd=mysql_fetch_array($pro);

					echo $pd['Prod_Name'];

					?>

                    </a></td>

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

                    <td width="150" align="center" valign="top" bgcolor="#FFFFFF"><table width="120" border="0" cellspacing="0" cellpadding="0">

                      <tr>

                        <td height="180" align="center" bgcolor="#FFFFFF"><a href="#">

                          <?php

						$prod_img=mysql_query("select * from prod_img where Prod_Id='".$_REQUEST['pid']."' order by Disp_Order limit 1");

						$pm=mysql_fetch_array($prod_img);

						?>

                          <img src="product/ph<?php echo $pm['Is_Image'] ?>" width="120" height="150" border="0" title="<?php echo $pd['Prod_Name']; ?>"  alt="<?php echo $p['Prod_Name']; ?>"/></a></td>

                      </tr>

                    </table></td>

                    <td align="left" valign="top" bgcolor="#FFFFFF" style="background-repeat:repeat-x;">

                    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="padding-right:10px;">

  <tr>

    <td height="10" align="left" valign="middle"></td>

  </tr>

  <tr>

    <td align="left" valign="middle" style="text-align:justify" class="fonts10">&nbsp;<?php echo $p['Description']; ?></td>

  </tr>

  <tr>

    <td align="left" valign="middle" class="fonts10"><strong>&nbsp;<?php  

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

                    <td height="40" align="left" valign="middle" bgcolor="#f3f3f3" class="border2"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" class="title_10">

                      <tr class="title_10">

                        <td width="150" align="right" valign="middle" class="title_11">

                         <form name="frmsub" method="post" action="index.php?pageno=18&pid=<?php echo $_REQUEST['pid']; ?>">
                           <input type="submit" name="comment" value="Post your Comment" style="background-color:#CCC;border:1px solid;padding-top:5px;padding-bottom:5px;font-family:Arial, Helvetica, sans-serif;cursor:pointer;" />
                         </form>

                        </td>

                        <td width="150" align="left" valign="middle">&nbsp;</td>

                        <td width="140" align="right" valign="middle" class="title_10">Total Comment</td>

                        <td width="10" align="center" valign="middle" class="title_12">:</td>

                        <td width="50" align="left" valign="middle" class="title_10">

                        <?php $count_query=mysql_query("select * from review_mst where Is_Approve=1 and Prod_Id='".$_REQUEST['pid']."' order by Review_Id desc");

						echo $rows=mysql_affected_rows();

						?>

                        </td>

                      </tr>

                    </table></td>

                  </tr>

                  <tr>

                    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>

                    <td background="<?php echo HTTP_BASE_URL; ?>images/bg2.jpg" style="background-repeat:repeat-x;" align="left" valign="middle" bgcolor="#FFFFFF" class="title_10">

                    <?php

					$query="select * from review_mst where Is_Approve=1 and Prod_Id='".$_REQUEST['pid']."' order by Review_Id desc";

					$aff_qry=mysql_query($query);

					$aff=mysql_affected_rows();

					$result=$db->pagingLimit($query,$startpoint,$perpage);

					$count=1;

					while($com=mysql_fetch_array($result))

					{  

					?>

                    <table width="100%" border="0" align="center" cellpadding="5" cellspacing="5">

                      <tr>

                        <td align="left" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                          <tr>

                            <td align="left" valign="middle">&nbsp;&nbsp;<?php echo $com['Name']; ?></td>

                            <td align="right" valign="middle"><?php $dx=split(" ",$com['Dt']);
		$date=$dx[0];
		$time=$dx[1];
		$d=split("-",$date);
		echo $final_date=$d[2]."/".$d[1]."/".$d[0]." ".$time;
		?>&nbsp;&nbsp;</td>

                          </tr>

                        </table></td>

                      </tr>

                      <tr>

                        <td align="left" valign="middle" class="title_10" style="text-align:justify">&nbsp;&nbsp;<?php echo $com['Description']; ?></td>

                      </tr>

                      <?php if($count!=$aff) { ?>

                      <tr>

                        <td align="left" valign="middle" class="border_bottom" height="1px"></td>

                      </tr>

                      <?php } ?>

                    </table>

                    <?php $count++; } ?>

                    </td>

                  </tr>

                  <tr>

                    <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>

                    <td align="right" valign="middle" bgcolor="#FFFFFF" class="title_10">

                    <?php

							$sql=$query;

							$query="SELECT COUNT(*) as num FROM review_mst ".substr($query,25,strlen($query)) ;

							echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=17&pid=".$_REQUEST['pid']."&"); 

							?>

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