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
<script language="javascript">
function anyCheck(f)
{
	var t=0;
	var c=f['checkbox[]'];
	for(var i=0;i<c.length;i++)
	{
		c[i].checked?t++:null;
	}
	if(t<=0)
	{
		alert('Plaese select one or more franchisee to continue');
		return false;
	}
	else
	{
		return true;
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
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="middle">
            <table width="99%" border="0" cellspacing="10" cellpadding="0">
              <tr>
                <td class="normal_fonts14_black"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="250" height="35">Franchisee Details</td>
                    <td class="normal_fonts12">
                    <?php
					if($_REQUEST['msg']=='yes')
					{
						echo "Your mail(s) has been sent successfully.";
					}
					?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center"><form action="#" method="get" name="frmsearch" id="frmsearch">
                      <table width="650" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                        <tr>
                          <td align="right" class="normal_fonts10"> Search by Name </td>
                          <td width="15" align="center" valign="middle" class="normal_fonts10">:</td>
                          <td width="100"><input name="searchname" type="text" class="normal_fonts10" id="searchname" /></td>
                          <td align="center" class="normal_fonts10">City </td>
                          <td align="center" class="normal_fonts10">:</td>
                          <td align="center"><select name="txtcity" class="normal_fonts9" id="txtcity">
                <option value="0">Select One</option>
                              <?php $city_data=mysql_query("SELECT * FROM city_mst WHERE state_id=1 ORDER BY city_name");
							  while($ct=mysql_fetch_array($city_data))
							  {
							  ?>
                              <option value="<?php echo $ct['city_id']; ?>" <?php if($ct['city_id']==$k['City']) { ?> selected="selected" <?php } ?>><?php echo $ct['city_name']; ?></option>
                              <?php } ?>
                              </select></td>
                          <td align="center"><input name="search" type="submit" class="normal_fonts10" value="Search" /></td>
                        </tr>
                      </table>
                    </form></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF">
                <form action="filemail.php" method="post" id="myform" name="myform" enctype="multipart/form-data">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#CCCCCC"><table width="100%" border="0" cellspacing="1" cellpadding="4" class="normal_fonts8">
                      <tr>
                        <td width="15" align="left" valign="middle" bgcolor="#999999"><strong>
                          <input type="checkbox" name="chk" id="chk" title="Check or Uncheck all Checkbox" onclick="checkedAll();" />
                        </strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Name</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Branch</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Demo No.</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>E-Mail Address</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Mobile No</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>City</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Register Date</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Is Active</strong></td>
                        <td align="left" valign="middle" bgcolor="#999999"><strong>Action</strong></td>
                      </tr>
                      <?php
				 if($_REQUEST['search']!='')
			  	{
				  $query="select * from franchise_mst WHERE Franchise_Id!=''"; 
				  
				  if($_REQUEST['searchname']!='')
				  {
					  $query=$query." and Name like '%".$_REQUEST['searchname']."%'";
				  }
				  if($_REQUEST['txtcity']!='0')
				  {
					  $query=$query." and City='".$_REQUEST['txtcity']."'";
				  }
				  $query=$query." order by Franchise_Id desc";
			  	}
				else
				{
			  		$query="select * from franchise_mst order by Franchise_Id desc";
				}
			  //echo $query;	
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
                        <td><input type="checkbox" name="checkbox[]" id="checkbox" value="<?php echo $k['Franchise_Id']; ?>" /></td>
                        <td><?php echo $k['Name']; ?></td>
                        <td><?php echo $k['Branch']; ?></td>
                        <td><?php echo $k['Demo_No']; ?></td>
                        <td><?php echo $k['Email_Address']; ?></td>
                        <td><?php echo $k['Mobile']; ?></td>
                        <td><?php 
						$city_qry=mysql_query("SELECT * FROM city_mst WHERE city_id='".$k['City']."'");
						$ctd=mysql_fetch_array($city_qry);
						echo $ctd['city_name']; ?></td>
                        <td><?php echo $k['Register_Date']; ?></td>
                        <td><?php if($k['Is_Active']==1) { echo "Active"; } else { echo "Inactive"; } ?></td>
                        <td width="60"><table width="60" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center"><a href="franchise_add.php?eid=<?php echo $k['Franchise_Id']; ?>"><img src="images/edit.png" alt="Edit" width="20" height="20" border="0" title="Edit" /></a></td>
                            <td align="center"><a href="franchise_delete.php?eid=<?php echo $k['Franchise_Id']; ?>"><img src="images/delete_on.gif" alt="Delete" width="20" height="20" border="0" title="Delete" /></a></td>
                          </tr>
                        </table></td>
                      </tr>
                      <?php $i++; } ?>
                      <?php if($rows<=0) { ?>
                      <tr bgcolor="#FFFFFF">
                        <td colspan="10" align="center" class="normal_fonts12">No Record found</td>
                        </tr>
                       <?php } ?> 
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="150" align="left" valign="middle"><table width="150" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="25" align="left"><a href="franchise_add.php"><img src="images/add.png" alt="Add" width="20" height="20" border="0" title="Add"/></a></td>
                            <td align="left" class="normal_fonts9"><a href="franchise_add.php">Add New Franchisee</a></td>
                          </tr>
                        </table></td>
                        <td align="left" valign="middle" class="normal_fonts9">&nbsp;</td>
                        <td width="300" align="right" valign="middle" class="normal_fonts10"><?php
			$sql=$query;
			$query="SELECT COUNT(*) as num FROM franchise_mst ".substr($query,23,strlen($query)) ;
			if($_REQUEST['search']!='')
			{
				echo pages_wherequery($query,$sql,$perpage,"franchise.php?searchname=".$_REQUEST['searchname']."&txtcity=".$_REQUEST['txtcity']."&search=".$_REQUEST['search']."&");
			}
			else
			{
				echo pages_wherequery($query,$sql,$perpage,"franchise.php?"); 
			}
			
				?></td>
                      </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td>
                      <table width="850" border="0" align="center" cellpadding="5" cellspacing="0" class="border">
                        <tr>
                          <td colspan="3" align="left" valign="middle" bgcolor="#CCCCCC" class="normal_fonts12_black">Send Mail</td>
                        </tr>
                        <tr>
                          <td width="200" align="right" valign="middle" class="normal_fonts9">Subject </td>
                          <td width="10" align="center" valign="middle">:</td>
                          <td align="left" valign="middle"><input name="subject" type="text" class="normal_fonts9" id="subject" size="40" /></td>
                        </tr>
                        <tr>
                          <td width="200" align="right" valign="top" bgcolor="#f3f3f3" class="normal_fonts9">Message</td>
                          <td align="center" valign="top" bgcolor="#f3f3f3">:</td>
                          <td align="left" valign="top" bgcolor="#f3f3f3"><textarea name="msg" cols="60" rows="7" class="normal_fonts9" id="msg"></textarea></td>
                        </tr>
                        <tr>
                          <td width="200" align="right" valign="middle" class="normal_fonts9">Attach File</td>
                          <td align="center" valign="middle">:</td>
                          <td align="left" valign="middle"><input name="mailfile" type="file" class="normal_fonts9" value="" /></td>
                        </tr>
                        <tr>
                          <td width="200" align="right" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
                          <td align="center" valign="middle" bgcolor="#f3f3f3">&nbsp;</td>
                          <td align="left" valign="middle" bgcolor="#f3f3f3"><input name="maildata" type="submit" class="normal_fonts12_black" value="With Selected Send Mail" onclick="return anyCheck(this.form);" /></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                </form>
                </td>
              </tr>
            </table>
           
            
            </td>
          </tr>
        </table>
       
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
