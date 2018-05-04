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

                    <td height="6" colspan="3" align="left" valign="middle"></td>

                  </tr>

                  <tr>

                    <td width="30" align="left" valign="middle"><img src="<?php echo HTTP_BASE_URL; ?>images/Arrow.png" width="24" height="24" /></td>

                    <td class="title"><a href="#">

                    Product Review

                    </a></td>
                    <td align="right" valign="middle" class="title"><form action="index.php?pageno=16" method="post" name="frmsearchme" id="frmsearchme">
                      <table width="350" border="0" align="right" cellpadding="2" cellspacing="0" class="title_10">
                        <tr>
                          <td align="right" valign="middle" class="title_10">Search Model No</td>
                          <td width="10" align="center" valign="middle">:</td>
                          <td align="left" valign="middle"><input type="text" name="model" id="model" /></td>
                          <td align="left" valign="middle"><input type="submit" name="submit" value="Search" style="background-color:#CCC;border:1px solid;" /></td>
                        </tr>
                      </table>
                    </form></td>

                  </tr>

                </table></td>

                <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>

              </tr>

            </table></td>

          </tr>

          <tr>

            <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>

          </tr>
          <tr>

            <td align="left" valign="top">

            <?php
					if($_POST['model']=='')
					{			
						$query="select * from prod_mst,review_mst WHERE review_mst.Prod_Id=prod_mst.Prod_Id and prod_mst.Is_Active=1 GROUP BY prod_mst.Prod_Id order by rand()";
					}
					else
					{
					$query="select * from prod_mst,review_mst WHERE review_mst.Prod_Id=prod_mst.Prod_Id and prod_mst.Is_Active=1 and prod_mst.Prod_Name like '%".trim($_POST['model'])."%' order by rand()";
					}
					$result=$db->pagingLimit($query,$startpoint,$perpage);

					$count=1;

					while($pd=mysql_fetch_array($result))

					{ 	?>

            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" class="border1">

              <tr>

                <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">

                  <tr>

                    <td width="100" align="center" valign="top" bgcolor="#FFFFFF"><table width="120" border="0" cellspacing="0" cellpadding="5">

                      <tr>

                        <td height="170" align="center" bgcolor="#FFFFFF"><a href="#">

                          <?php

						$prod_img=mysql_query("select * from prod_img where Prod_Id='".$pd['Prod_Id']."' order by Disp_Order limit 1");

						$pm=mysql_fetch_array($prod_img);

						?>

                          <img src="product/ph<?php echo $pm['Is_Image'] ?>" width="120" height="150" border="0" title="<?php echo $pd['Prod_Name']; ?>" alt="<?php echo $pd['Prod_Name']; ?>" /></a></td>

                      </tr>

                    </table></td>

              <td align="left" valign="top" bgcolor="#FFFFFF" style="background-repeat:repeat-x;"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="0" style="padding-right:10px;">

                <tr>

                  <td align="left" valign="middle">&nbsp;</td>

                </tr>

                <tr>

                  <td align="left" valign="middle"><a href="index.php?pageno=17&pid=<?php echo $pd['Prod_Id']; ?>" class="title_12"><strong><?php echo $pd['Prod_Name']; ?></strong></a></td>

                </tr>

                <tr>

                  <td align="left" valign="middle" class="fonts10" style="text-align:justify">

                  <?php echo $pd['Description']; ?> 

                  </td>

                </tr>

                <tr>

                  <td align="left" valign="middle" class="fonts10"><span class="fonts10">

                  <strong>

				  <?php  

				  if($pd['Dt']!='') {

				  echo date('d F Y',strtotime($pd['Dt']));

				  }

				  ?></strong></span></td>

                </tr>

              </table></td>

                  </tr>

                </table></td>

              </tr>

            </table>

            <?php } ?>

            </td>

          </tr>

          <tr>

            <td align="center" valign="top" class="title_10">

             <?php

			$sql=$query;

			$query="SELECT COUNT(*) as num FROM prod_mst ".substr($query,22,strlen($query)) ;

			echo pages_wherequery($query,$sql,$perpage,"index.php?pageno=16"."&"); 

			?>

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
                <form name="frmcom" method="post" action="#">
                <table width="100%" border="0" cellpadding="5" cellspacing="0" class="title_10">
                  <tr>
                    <td align="right" valign="middle">Select Brand</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><select name="sel_brand" id="sel_brand" onchange="show_first_brand(this.value);">
                      <option selected="selected" value="">Select Brand</option>
                      <?php
								 $first_query=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
								 while($first_barnd=mysql_fetch_array($first_query))
								 {
								 ?>
                      <option value="<?php echo $first_barnd['Brand_Id']; ?>"><?php echo $first_barnd['Name']; ?></option>
                      <?php } ?>
                    </select></td>
                  </tr>
                  <tr>
                    <td width="200" align="right" valign="middle">Select Product</td>
                    <td width="20" align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><select name="first_product" id="first_product" onChange="show_first_product(this.value);">
    <option value="">Select One</option> 
    <?php 
	$first_product=mysql_query("SELECT * FROM prod_mst WHERE Brand_Id='".$is_brand."' and Is_Active=1 ORDER BY Prod_Name");
	while($ff=mysql_fetch_array($first_product))
	{
	?> 
    <option value="<?php echo $ff['Prod_Id']; ?>"><?php echo $ff['Prod_Name']; ?></option>
    <?php } ?>
	</select></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">Name</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input type="text" name="txtname" id="txtname" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="middle">E-Mail Address</td>
                    <td align="center" valign="middle">:</td>
                    <td align="left" valign="middle"><input type="text" name="txtemail" id="txtemail" /></td>
                  </tr>
                  <tr>
                    <td align="right" valign="top">Comment</td>
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
      <tr>
        <td valign="top" style="text-align:justify" class="title_9">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top" style="text-align:justify" class="fonts8">&nbsp;</td>
      </tr>
    </table></td>

      </tr>

    </table></td>

  </tr>

</table>

</body>

</html>