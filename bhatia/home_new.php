<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	require_once ('pagination/pagination.php');
	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
	$page = ($page == 0 ? 1 : $page);
	$perpage = 90;//limit in each page
	$startpoint = ($page * $perpage) - $perpage;
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HTTP_BASE_URL; ?>pagination/style2.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border2">
                  <tr>
                    <td height="300" align="center" valign="middle" bgcolor="#FFFFFF">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding:7px;">
                          <tr>
                          <?php 
						  $query=mysql_query("SELECT * FROM bhatia_video WHERE Display_On_Home=1 ORDER BY Bhatia_Video_Id LIMIT 1");
						  $rows=mysql_affected_rows();
						  if($rows==0)
						  {
							  $query=mysql_query("SELECT * FROM bhatia_video ORDER BY Bhatia_Video_Id Desc LIMIT 1");
						  }
						  $k=mysql_fetch_array($query);
						  ?>
                            <td align="center" valign="top"><?php echo $k['Bhatia_Video_Source_Code']; ?></td>
                      </tr>
                        </table>
                    </td>
                  </tr>
                </table>