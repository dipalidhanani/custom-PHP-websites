<?php session_start();
	require_once("config.inc.php");
	require_once("Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();  ?>
<link href="css/css.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="125" valign="middle"><a href="home.php"><img src="images/v3 logo .png" width="125" height="125"  border="0"/></a></td>
            <td>&nbsp;</td>
            <td width="250" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
              <?php
			  $admin=mysql_query("select * from admin_mst where Admin_Id='".$_SESSION['bhatia_id']."' and Is_Active=1");
			  $ad=mysql_fetch_array($admin);
			  ?>
                <td class="normal_fonts14_black"><strong>Welcome <?php echo $ad['User_Name']; ?></strong></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td><table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                  <tr>
                    <td><a href="logout.php" class="normal_fonts12_black">Logout</a></td>
                  </tr>
                  <tr>
                    <td><a href="change_password.php" class="normal_fonts12_black">ChangePassword</a></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
        </table>