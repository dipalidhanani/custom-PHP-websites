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
<script language="javascript">
checked = false;
      function checkedAll () {
        if (checked == false){checked = true}else{checked = false}
	for (var i = 0; i < document.getElementById('myform').elements.length; i++) {
	  document.getElementById('myform').elements[i].checked = checked;
	}
      }
</script>
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
        <td height="125" align="left" valign="top" bgcolor="#FFFFFF"><?php include('header.php');  ?></td>
      </tr>
      <tr>
        <td height="2" bgcolor="#000000"></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php include('menu.php'); ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><table width="99%" border="0" cellspacing="10" cellpadding="0">
          <tr>
            <td class="normal_fonts14_black">Enquiry Details</td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmcountry" method="post" action="#" id="myform">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
              	<!--<td width="10" align="left" valign="middle" bgcolor="#999999"><strong><span class="normal_fonts10">
              	  <input type="checkbox" name="chk" id="chk" title="Check or Uncheck all Checkbox" onclick="checkedAll ();" />
              	</span></strong></td>-->
                <td width="120" align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td width="80" align="left" valign="middle" bgcolor="#999999"><strong>Date</strong></td>
                <td width="150" align="left" valign="middle" bgcolor="#999999"><strong>E-Mail Address</strong></td>
                <td width="100" align="left" valign="middle" bgcolor="#999999"><strong>Mobile No.</strong></td>
                <td width="100" align="left" valign="middle" bgcolor="#999999"><strong>Country</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Description</strong></td>
                <td align="center" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
              <?php
			  $query="select * from query order by Dt Desc";
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
              <!--<td><span class="normal_fonts9">
                <input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $u['Query_Id']; ?>" />
              </span></td>-->
               <td><?php echo $k['Name']; ?></td>
               <td><?php echo $k['Dt']; ?></td>
               <td><?php echo $k['Email']; ?></td>
               <td><?php echo $k['Mobile']; ?></td>
               <td><?php echo $k['Country']; ?></td>
               <td style="text-align:justify"><?php echo $k['Desc']; ?></td>
               <td align="center"><table width="20" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="enquiry_delete.php?eid=<?php echo $k['Query_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
                </tr>
                 <?php $i++; } ?> 
              </table>
            </form>
            </td>
          </tr>
          <tr>
            <td align="center" valign="middle" class="normal_fonts10"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="middle"><table width="130" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25" align="left">&nbsp;</td>
                    <td align="left" class="normal_fonts9">&nbsp;</td>
                  </tr>
                </table></td>
                <td width="300" align="right" valign="middle">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM query ".substr($query,50,strlen($query)) ;
			echo pages_wherequery($query,$sql,$perpage,"enquiry.php?"); 
				?>
                </td>
              </tr>
            </table>
            
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
