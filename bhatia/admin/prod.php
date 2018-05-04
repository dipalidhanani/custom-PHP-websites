<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	require_once("session_check.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect(); 
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = PAGE_LIMIT;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	
	$brand=mysql_query("select * from brand_mst where Brand_Id='".$_REQUEST['eid']."'") or die(mysql_error());
	$b=mysql_fetch_array($brand);
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ADMIN_TITLE; ?></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/menu_style.css" type="text/css" />
<link rel="stylesheet" href="pagination/style2.css" type="text/css" />
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
</style></head>

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
            <td class="normal_fonts14_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="150" align="left" valign="middle">Product Details</td>
                <td align="right" valign="middle">
                <?php
				if($_REQUEST['eid']!='')
				{
					$page_url='prod.php?eid='.$_REQUEST['eid'];
				}
				else
				{
					$page_url='#';
				}
				?>
                <form name="frmsearch" method="post" action="<?php echo $page_url; ?>">
                <table width="400" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="right" class="normal_fonts12_black">Model No </td>
                    <td width="15" align="center" valign="middle">:</td>
                    <td width="100"><input type="text" name="modelno" id="modelno" /></td>
                    <td align="center"><input type="submit" name="search" value="Search" /></td>
                  </tr>
                </table>
                </form>
                </td>
                <td align="right" valign="middle">&nbsp;</td>
                <td align="right" valign="middle">&nbsp;</td>
                <td align="right" valign="middle">Total Product(s) :
				<?php 
				$prod=mysql_query("select * from prod_mst");
				echo $tot=mysql_affected_rows();
				?>&nbsp;&nbsp;</td>
              </tr>
              <?php if($_REQUEST['deal']==1) { ?>
              <tr>
                <td colspan="5" align="center" valign="middle">&nbsp;</td>
                </tr>
               <?php 
			   $prod_new_qry=mysql_query("SELECT * FROM prod_mst WHERE Prod_Id='".$_REQUEST['pd']."'");
			   $deal_final=mysql_fetch_array($prod_new_qry);
			   ?> 
              <tr>
                <td colspan="5" align="center" valign="middle" class="normal_fonts12">Product name <?php echo $deal_final['Prod_Name']; ?> is set to deal of the Day.</td>
              </tr>
              <?php } ?>
            <tr>
                <td colspan="5" align="center" valign="middle" class="normal_fonts12" height="8"></td>
              </tr>
             <?php 
			 $deal_prod=mysql_query("SELECT * FROM prod_mst WHERE Is_Active and Is_prod_deal_of_day=1 ORDER BY Prod_Id DESC LIMIT 1");
			 $deal=mysql_fetch_array($deal_prod);
			 ?> 
              <tr>
                <td colspan="5" align="left" valign="middle" class="menu">Deal of the Day is <?php echo $deal['Prod_Name']; ?></td>
              </tr>  
            </table></td>
            </tr>
          <?php if($_REQUEST['eid']!='') { ?>  
          <tr>
            <td>
            <table width="100%" border="0" cellpadding="5" cellspacing="0" class="border">
              <tr>
                <td width="120" align="right" class="normal_fonts9">Brand Name</td>
                <td width="10" align="center" class="normal_fonts9">:</td>
                <td class="normal_fonts9"><?php echo $b['Name']; ?></td>
              </tr>
              <tr>
                <td align="right" bgcolor="#F3F3F3" class="normal_fonts9">Is Active</td>
                <td align="center" bgcolor="#F3F3F3" class="normal_fonts9">:</td>
                <td bgcolor="#F3F3F3" class="normal_fonts9"><?php if($b['Is_Active']==1) { echo "Yes"; } else { echo "No"; } ?></td>
              </tr>
            </table>
            </td>
          </tr>
          <?php } ?>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmprod"  method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Brand Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Product Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Product Code</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>MRP Price</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Bhatia Price</strong></td>
                <td width="60" align="left" valign="middle" bgcolor="#999999"><strong>Is Active</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
              </tr>
               <?php
			   if($_POST['search']!='')
			   {	
			   		if($_REQUEST['eid']!='')
					{
					$query="select * from prod_mst where Prod_Name like '%".$_POST['modelno']."%' and Brand_Id='".$_REQUEST['eid']."' order by Prod_Id desc";   
					}
					else
					{
						$query="select * from prod_mst where Prod_Name like '%".$_POST['modelno']."%' order by Prod_Id desc";
					}
			   }
			   else if($_REQUEST['eid']!='' && ($_REQUEST['name']=='Tablet' || $_REQUEST['name']=='tablet'))
			   {
			  		$query="select * from prod_mst where Is_Tablet=1 order by Prod_Id desc";
			   }
			   else if($_REQUEST['eid']!='')
			   {
			  		$query="select * from prod_mst where Brand_Id='".$_REQUEST['eid']."'  order by Prod_Id desc";
			   }
			   

			   else 
			   {
				   $query="select * from prod_mst order by Prod_Id desc";
			   }
			   
			  $result=$db->pagingLimit($query,$startpoint,$perpage);	
			  $i=1;
			  while($k=mysql_fetch_array($result))
			  {
				  if($i%2==0)
				  {
					  $color='#FFFFFF';
				  }
				  else
				  {
					  $color='#F3F3F3';
				  }
				  
			  ?>
              <tr>
                <td bgcolor="#FFFFFF"><?php
				$bdata=mysql_query("select * from brand_mst where Is_Active=1 and Brand_Id='".$k['Brand_Id']."' order by Disp_Order");
				$j=mysql_fetch_array($bdata);
				echo $j['Name']; ?></td>
                <td bgcolor="#FFFFFF"><a href="prod_img.php?eid=<?php echo $k['Prod_Id']; ?>"><?php echo $k['Prod_Name']; ?></a></td>
                <td bgcolor="#FFFFFF"><?php echo $k['Prod_Code']; ?></td>
                <td bgcolor="#FFFFFF"><?php echo $k['MRP_Price']; ?></td>
                <td bgcolor="#FFFFFF"><?php echo $k['Final_Price']; ?></td>
                <td bgcolor="#FFFFFF"><?php if($k['Is_Active']==1) { echo "Yes"; } else { echo "No"; } ?></td>
                <td width="80" bgcolor="#FFFFFF"><table width="80" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="prod_view.php?eid=<?php echo $k['Prod_Id']; ?>"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0"  title="View"/></a></td>
                    <td align="center"><a href="prod_edit.php?eid=<?php echo $k['Prod_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="prod_delete.php?eid=<?php echo $k['Prod_Id']; ?>" onclick="return confirm('Are you sure ? Do you want to Delete ? ');"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
              </tr>
              <?php $i++; } ?> 
              </table>
            </form>
            </td>
          </tr>
          <tr>
            <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="normal_fonts9">
                <td width="25" align="right" valign="middle"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="middle"><table border="0" width="650" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="25" align="left"><a href="prod_add.php?bid=<?php echo $j['Brand_Id']; ?>"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                        <td width="120" align="left" class="normal_fonts9"><a href="prod_add.php">Add New Product</a></td>
                        <td align="left" class="normal_fonts9">
                        <form action="deal_process.php" method="post" enctype="multipart/form-data" name="frmdeal">
                        <table width="450" border="0" cellpadding="3" cellspacing="0" class="border">
                          <tr>
                            <td width="100" align="left" valign="middle" class="normal_fonts9">Deal of the Day</td>
                            <td width="10" align="center" valign="middle">:</td>
                            <td align="left" valign="middle"><select name="deal_prod" class="normal_fonts9" id="deal_prod">
                            <option value="">Select One</option>
                            <?php
							$prod_brand=mysql_query("SELECT * FROM brand_mst WHERE Is_Active=1 ORDER BY Name");
							while($pb=mysql_fetch_array($prod_brand))
							{
							?>
                            <optgroup label="<?php echo $pb['Name']; ?>" class="normal_fonts10" style="text-decoration:none;">
                            <?php 
							$qry=mysql_query("SELECT * FROM prod_mst WHERE Is_Active=1 and Brand_Id='".$pb['Brand_Id']."' ORDER BY Brand_Id");
							while($p=mysql_fetch_array($qry))
							{
							?>
                            <option value="<?php echo $p['Prod_Id']; ?>"><?php echo $p['Prod_Name']; ?></option>
                            <?php } } ?>
                            </optgroup>
                            </select></td>
                            <td align="left" valign="middle">
                            <input type="submit" name="submit" value="Set" />
                            </td>
                          </tr>
                        </table>
                        </form>
                        </td>
                      </tr>
                    </table></td>
                    <td width="300" align="right" valign="middle">
			<?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM prod_mst ".substr($query,23,strlen($query)) ;
			if($_REQUEST['eid']=='') 
			{
			echo pages_wherequery($query,$sql,$perpage,"prod.php?"); 
			}
			else
			{
				echo pages_wherequery($query,$sql,$perpage,"prod.php?eid=".$_REQUEST['eid']."&");
			}
			
				?></td>
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
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php include("footer.php"); ?></td>
  </tr>
</table>
</body>
</html>
