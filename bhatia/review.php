<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>

<link href="css/css1.css" rel="stylesheet" type="text/css">
<table width="100%" border="0" cellpadding="5" cellspacing="0">
<?php
$r_query=mysql_query("SELECT * FROM review_mst WHERE Prod_Id='".$_REQUEST['pid']."' and Is_Approve=1");
$rows=mysql_affected_rows();
$count=1;
while($di=mysql_fetch_array($r_query))
{
 ?>
  <tr>
    <td><table width="100%" border="0" cellpadding="5" cellspacing="0" <?php if($count!=$rows) { ?> class="border_bottom" <?php } ?>>
      <tr>
        <td valign="top" style="text-align:justify" class="title_9">
		<?php 
		$no_words=strlen($di['Description']);
		if($no_words>=200)
		{
			echo substr($di['Description'],0,200)."...";
		}
		else
		{
			echo $di['Description'];
		}
		?>&nbsp;
        <?php if($no_words>=200) { ?>
        <a href="<?php echo HTTP_BASE_URL; ?>index.php?pageno=18&eid=<?php echo $_REQUEST['pid']; ?>&rid=<?php echo $di['Review_Id']; ?>" class="fonts8" style="text-decoration:underline" target="_blank">Read More...</a>
        <?php } ?>
        </td>
      </tr>
      <tr>
        <td valign="top" style="text-align:justify" class="fonts8">By <?php echo $di['Name']; ?> on <?php $dx=split(" ",$di['Dt']);
		$date=$dx[0];
		$time=$dx[1];
		$d=split("-",$date);
		echo $final_date=$d[2]."/".$d[1]."/".$d[0]." ".$time;
		?></td>
      </tr>
      
    </table></td>
  </tr>
  <?php $count++; } ?>
  <?php if($rows==0) { ?>
  <tr>
    <td align="center" valign="middle" class="err_msg_10" height="150">No review found</td>
  </tr>
  <?php } ?>
</table>
