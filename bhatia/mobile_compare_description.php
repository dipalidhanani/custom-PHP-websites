<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 40;
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>pagination/style2.css" rel="stylesheet" type="text/css" />
 <script src="<?php echo HTTP_BASE_URL; ?>tooltip/jquery.js" type="text/javascript"></script>
	<script src="<?php echo HTTP_BASE_URL; ?>tooltip/main.js" type="text/javascript"></script>
<style>
#preview{
	position:absolute;
	border:1px solid #ccc;
	background:#FFF;
	padding:5px;
	display:none;
	color:#fff;
	}
</style>
<?php
$first_brand_id=$_REQUEST['sel_brand'];
$second_barnd=$_REQUEST['sel_second_barnd'];
$first_prod_id=$_REQUEST['first_product'];
$second_prod_id=$_REQUEST['second_product'];
?>
<?php
$img_first_query=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$first_prod_id."' and Disp_Order=1 LIMIT 1 ");
$fm=mysql_fetch_array($img_first_query);

$img_second_query=mysql_query("SELECT * FROM prod_img WHERE Prod_Id='".$second_prod_id."' and Disp_Order=1 LIMIT 1 ");
$sm=mysql_fetch_array($img_second_query);

$first_product=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$first_prod_id."' and Is_Active=1 ORDER BY Prod_Name");
$ff=mysql_fetch_array($first_product);

$second_product=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$second_prod_id."' and Is_Active=1 ORDER BY Prod_Name");
$ss=mysql_fetch_array($second_product);

?> 

<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                                    <td class="title"><strong>Mobile Comparision</strong></td>
                                    <td align="right" valign="middle" class="fonts10"><a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=29"><strong>Compare New</strong></a></td>
                                  </tr>
                                </table></td>
                              </tr>
                            </table></td>
                            <td width="5"><img src="<?php echo HTTP_BASE_URL; ?>images/box_04.jpg" width="5" height="41" /></td>
                          </tr>
                        </table></td>
                      </tr>
                      <tr>
                        <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td>
                            <form name="frmsubmit" id="frmsubmit" action="index.php" method="get">
                                <input type="hidden" name="pageno" value="30" />
                            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="border1">
                          <tr>
                            <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                              <tr>
                                <td align="center" valign="middle" class="title_11"><strong><?php echo $ff['Prod_Name']; ?></strong></td>
                                <td align="center" valign="middle"><span class="title_11"><strong><?php echo $ss['Prod_Name']; ?></strong></span></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle"><div id="txtHint2"><img src="<?php HTTP_BASE_URL; ?>product/<?php echo $fm['Is_Image']; ?>" border="0" /></div></td>
                                <td align="center" valign="middle"><div id="txtHint3"><img src="<?php HTTP_BASE_URL; ?>product/<?php echo $sm['Is_Image']; ?>" border="0" /></div></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="fonts12red"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/rupees_red.png" width="10" height="14" border="0" />&nbsp;<del><strong>MRP : <?php echo $ff['MRP_Price']; ?></strong></del></td>
                                <td align="center" valign="middle" class="fonts12red"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/rupees_red.png" width="10" height="14" />&nbsp;<del><strong>MRP : <?php echo $ss['MRP_Price']; ?></strong></del></td>
                              </tr>
                              <tr>
                                <td align="center" valign="middle" class="title_10"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/rupees.png" width="10" height="14" />&nbsp;<strong>Bhatia  : <?php echo $ff['Final_Price']; ?></strong></td>
                                <td align="center" valign="middle" class="title_10"><img src="<?php echo HTTP_BASE_URL_ORDER; ?>images/rupees.png" width="10" height="14" />&nbsp;<strong>Bhatia  : <?php echo $ss['Final_Price']; ?></strong></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center" valign="middle" height="10"></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center" valign="middle">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">

	<?php

    $query=mysql_query("select * from prod_desc_cat order by Disp_Order");

    while($l=mysql_fetch_array($query))

    {  ?>

  <tr>

    <td height="20" colspan="5" align="left" valign="middle" bgcolor="#CCCCCC" class="title_10">&nbsp;<?php echo $l['Category']; ?></td>

</tr>
		<?php
   $query1=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$l['Prod_Desc_Cat_Id']."' group by Prod_Desc_Cat_Id");
   while($k=mysql_fetch_array($query1))
   {  ?>
        <?php 
					$query4=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$k['Prod_Desc_Cat_Id']."' order by Disp_Order");
					$c=1;
					while($r=mysql_fetch_array($query4))
					{ 
					if($c%2==0)
					{
						$color='#f3f3f3';
					}
					else
					{
						$color='#FFFFFF';
					}
					?>
                  <?php 
					$query5=mysql_query("select * from prod_desc where Title_Id='".$r['Title_Id']."' and Prod_Id='".$first_prod_id."' order by Prod_Desc_Id");
					while($rr=mysql_fetch_array($query5))
					{ 
					?>  
              <tr class="fonts8" bgcolor="<?php echo $color; ?>">
              <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><td width="120"  height="30" align="left" 

                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>

                valign="top" 

                <?php } else { ?>

                valign="middle"

                <?php } ?>

                bgcolor="<?php echo $color; ?>" style="color:#000;"><?php 

				echo $r['Title'];?></td>

                <td width="20" height="25" align="center"

                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>

                valign="top" 

                <?php } else { ?>

                valign="middle"

                <?php } ?>

                 :</td></td>
    <td><td height="25" align="left" valign="middle" bgcolor="<?php echo $color; ?>">

                <?php if($r['Title']=='Other Features ' || $r['Title']=='Other Features' || $r['Title']==' Other Features') { ?>

                <?php 

				$valid=$rr['Desc'];

				$dx=explode(",",$valid);

				$i=0;

				foreach ($dx as $val)

				{ ?>

					&diams;&nbsp;

					<?php echo $dx[$i]."</br>";

					$i++;

				}

				?>

                <?php } else { ?>

				<?php 

				if($rr['Desc']=='')

				{

					$desc_d="-";

				}

				else

				{

					$desc_d=$rr['Desc'];	

				}

				echo $desc_d;

					?>

                <?php } ?>

                </td></td>
  </tr>
</table>
</td>
               </tr>
  				<?php } ?>
                
			<?php $c++; } ?>	
  		<?php  } ?>

 <?php  } ?> 

</table></td>
    <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
      <?php

    $query_second=mysql_query("select * from prod_desc_cat order by Disp_Order");

    while($l_second=mysql_fetch_array($query_second))

    {  ?>
      <tr>
        <td height="20" colspan="5" align="left" valign="middle" bgcolor="#CCCCCC" class="title_10">&nbsp;</td>
      </tr>
      <?php
   $query1_second=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$l_second['Prod_Desc_Cat_Id']."' group by Prod_Desc_Cat_Id");
   while($k_second=mysql_fetch_array($query1_second))
   {  ?>
      <?php 
					$query4_second=mysql_query("select * from prod_title where Prod_Desc_Cat_Id='".$k_second['Prod_Desc_Cat_Id']."' order by Disp_Order");
					$c_second=1;
					while($r_second=mysql_fetch_array($query4_second))
					{ 
					if($c_second%2==0)
					{
						$color='#f3f3f3';
						
					}
					else
					{
						$color='#FFFFFF';
						
					}
					?>
      <?php 
					$query5_second=mysql_query("select * from prod_desc where Title_Id='".$r_second['Title_Id']."' and Prod_Id='".$second_prod_id."' order by Prod_Desc_Id");
					while($rr_second=mysql_fetch_array($query5_second))
					{ 
					?>
      <tr class="fonts8" bgcolor="<?php echo $color; ?>">
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><td align="left" valign="middle" bgcolor="<?php echo $color; ?>"><td height="30" align="left" valign="middle" bgcolor="<?php echo $color; ?>">

                <?php if($r_second['Title']=='Other Features ' || $r_second['Title']=='Other Features' || $r_second['Title']==' Other Features') { ?>

                <?php 

				$valid_second=$rr_second['Desc'];

				$dx_second=explode(",",$valid_second);

				$i_second=0;

				foreach ($dx_second as $val_second)

				{ ?>

					&diams;&nbsp;

					<?php echo $dx_second[$i_second]."</br>";

					$i_second++;

				}

				?>

                <?php } else { ?>

				<?php 

				if($rr_second['Desc']=='')

				{

					$desc_d_second="-";

				}

				else

				{

					$desc_d_second=$rr_second['Desc'];	

				}

				echo $desc_d_second;

					?>

                <?php } ?>

                </td></td>
          </tr>
        </table></td>
      </tr>
      <?php } ?>
      <?php $c_second++; } ?>
      <?php  } ?>
      <?php  } ?>
    </table></td>
  </tr>
</table>

                                </td>
                              </tr>
                              <tr>
                                <td colspan="2" align="center" valign="middle">
                               
                                
                                </td>
                                </tr>
                              
                            </table></td>
                          </tr>
                        </table>
                        </form>
                            </td>
                          </tr>
                          
                        </table></td>
</tr>
                    </table>