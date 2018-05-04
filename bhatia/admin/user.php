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
var xmlHttp
function showState(str)
{
xmlHttp=GetXmlHttpObject();
if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  }
var url="statedata.php";
url=url+"?q="+str;
//url=url+"&sid="+Math.random();
//alert(url);
xmlHttp.onreadystatechange=stateChanged;
xmlHttp.open("POST",url,true);
xmlHttp.send(null);
}
function stateChanged()
{
if (xmlHttp.readyState==4)
{
document.getElementById("txtHint").innerHTML="";
document.getElementById("txtHint").innerHTML=xmlHttp.responseText;
}
}
function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
return xmlHttp;
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
            <td class="normal_fonts14_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="200" height="35" align="left" valign="middle">User Details</td>
                <td width="150" align="center" valign="middle">&nbsp;</td>
                <td width="150" align="right" valign="middle" class="normal_fonts12_black">Total Users : <?php echo $db->numberofrows('user_mst',""); ?>&nbsp; <span><a href="user_mail.php" style="color:#EF664E"><strong>Send Mail</strong></a></span></td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="middle"><form action="#" method="get" name="frmsearch" id="frmsearch">
                  <table width="830" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                    <tr>
                      <td align="right" class="normal_fonts10"> Search by Name </td>
                      <td width="15" align="center" valign="middle" class="normal_fonts10">:</td>
                      <td width="100"><input name="searchname" type="text" class="normal_fonts10" id="searchname" /></td>
                      <td align="center" class="normal_fonts10">State</td>
                      <td align="center" class="normal_fonts10">:</td>
                      <td align="center" class="normal_fonts10">
                      <select name="search_state" class="normal_fonts9" id="search_state" onChange="showState(this.value)">
  <option value="">Select One</option>
  <?php $st=$db->dbselect("select * from state ORDER BY Name");
  while($disp=mysql_fetch_array($st))
  {
  ?>
  <option value="<?php echo $disp['State_Id']; ?>"<?php if($k['State_Id']==$disp["State_Id"]){ ?> selected="selected" <?php }  ?>><?php echo $disp['Name']; ?></option>
<?php } ?>	
  </select>
                      </td>
                      <td align="center" class="normal_fonts10">&nbsp;</td>
                      <td align="center" class="normal_fonts10">City </td>
                      <td align="center" class="normal_fonts10">:</td>
                      <td align="center"><span class="normal_fonts10">
                      <div id="txtHint">
                <select name="city" class="normal_fonts9" id="city">
                <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$k['City']) { ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select>
                </div>  
                      </span></td>
                      <td align="center"><input name="search" type="submit" class="normal_fonts10" value="Search" /></td>
                    </tr>
                  </table>
                </form></td>
                </tr>
              <?php if($_REQUEST['sent']==1) { ?>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="center" valign="middle">&nbsp;</td>
                <td align="right" valign="middle" class="normal_fonts12_black">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="3" align="center" valign="middle" class="normal_fonts12">Mail has been sent Successfully!!</td>
                </tr>
				 <?php } ?>  
            </table></td>
            </tr>
          <tr>
            <td bgcolor="#CCCCCC">
            <form name="frmuser" method="post" action="#">
            <table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
              <tr>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Gender</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>E-Mail Address</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Mobile No</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>City</strong></td>
                <td align="left" valign="middle" bgcolor="#999999"><strong>Register Date</strong></td>
               <!-- <td align="left" valign="middle" bgcolor="#999999"><strong>Is Active</strong></td>-->
                <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                </tr>
              <?php
			  if($_REQUEST['search']!='')
			  {
				  $query="select * from user_mst WHERE User_Id!=''"; 
				  
				  if($_REQUEST['searchname']!='')
				  {
					  $query=$query." and First_Name like '%".$_REQUEST['searchname']."%'";
				  }
				  if($_REQUEST['search_state']!='')
				  {
					  $query=$query." and State_Id='".$_REQUEST['search_state']."'";
				  }
				  if($_REQUEST['city']!='0')
				  {
					  $query=$query." and City='".$_REQUEST['city']."'";
				  }
				  
				  $query=$query." order by User_Id desc";
			  }
			  else
			  {
				$query="select * from user_mst order by User_Id desc";  
			  }
			  $result=$db->pagingLimit($query,$startpoint,$perpage);	
			  $rows=mysql_num_rows($result);
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
                <td><?php echo $k['First_Name']." ".$k['Middle_Name']." ".$k['Last_Name']; ?></td>
                <td><?php echo $k['Gender']; ?></td>
                <td><?php echo $k['Email_Address']; ?></td>
                <td><?php echo $k['Mobile']; ?></td>
                <td><?php 
						$city_qry=mysql_query("SELECT * FROM city_mst WHERE city_id='".$k['City']."'");
						$ctd=mysql_fetch_array($city_qry);
						echo $ctd['city_name']; ?></td>
                <td><?php echo $k['Register_Date']; ?></td>
               <!-- <td><?php if($k['Is_Active']=='1') { echo "Active"; } else { echo "Inactive"; } ?></td>-->
                <td width="60"><table width="60" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><a href="user_add.php?eid=<?php echo $k['User_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                    <td align="center"><a href="user_delete.php?eid=<?php echo $k['User_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                  </tr>
                </table></td>
                </tr>
                 <?php $i++; } ?> 
                <?php if($rows==0) { ?> 
                <tr bgcolor="#FFFFFF" >
                <td colspan="7" align="center" class="normal_fonts12">No record found</td>
                </tr> 
                <?php } ?>
              </table>
            </form>
            </td>
          </tr>
          <tr>
            <td>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td align="left" valign="middle"><table width="130" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="25" align="left"><a href="user_add.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                    <td align="left" class="normal_fonts9"><a href="user_add.php">Add New User</a></td>
                  </tr>
                </table></td>
                <td width="300" align="right" valign="middle" class="normal_fonts10">
                <?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM user_mst ".substr($query,23,strlen($query)) ;
			if($_REQUEST['search']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"user.php?searchname=".$_REQUEST['searchname']."&search_state=".$_REQUEST['search_state']."&city=".$_REQUEST['city']."&search=".$_REQUEST['search']."&");
			}
			else
			{
				echo pages_wherequery($query,$sql,$perpage,"user.php?"); 
			}
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
