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
<script language="javascript">
 checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
</script>
<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php');  ?></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">
         <form name="frmcountry" method="post" action="approve_process.php" id="myform">
        <table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Product Review Details</td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
	            <td width="10" align="left" valign="middle" bgcolor="#999999"><input type="checkbox" name="chk" id="chk" title="Check or Uncheck all Checkbox" onclick="checkedAll ();" /></td>
                <td width="100" align="left" valign="middle" bgcolor="#999999"><strong>Product Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Review</strong></td>
                <td width="70" align="left" valign="middle" bgcolor="#999999"><strong>Is Approved</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
              <?php
			  $query="select * from review_mst order by Review_Id desc";
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
              <tr bgcolor="<?php echo $color; ?>">
              <td>
              <?php if($k['Is_Approve']=='0') { ?>
              <input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $k['Review_Id']; ?>"/>
              <?php } ?>
              </td>
               <td><?php 
			   $prod=mysql_query("select * from prod_mst where Is_Active=1 and Prod_Id='".$k['Prod_Id']."'");
			   $p=mysql_fetch_array($prod);
			   echo $p['Prod_Name'];
			    ?></td>
               <td><?php echo $k['Description']; ?></td>
               <td><?php if($k['Is_Approve']=='0') { echo "Not Approved"; } else { echo "Approved"; }  ?></td>
                <td width="60"><table width="60" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="review_view.php?eid=<?php echo $k['Review_Id']; ?>"><img src="images/zoom_in.png" alt="View" width="20" height="20" border="0" title="View" /></a></td>
                    <td align="center"><a href="review_delete.php?eid=<?php echo $k['Review_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
                </tr>
                 <?php $i++; } ?> 
              </table>
           
            </td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="normal_fonts10"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="middle"><table width="130" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25" align="left">&nbsp;</td>
                    <td align="left" class="normal_fonts9">
                    <input type="submit" name="approve"  value="Approve Selected" class="normal_fonts12_black" />
                    </td>
                  </tr>
                </table></td>
                <td width="300" align="right" valign="middle">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM review_mst ".substr($query,50,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"review.php?"); 
				?>
                </td>
              </tr>
            </table>
            
            </td>
          </tr>
          </table>
          </form>
          </td>
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
