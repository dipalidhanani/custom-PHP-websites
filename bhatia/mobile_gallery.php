<?php session_start();
	require_once("admin/config.inc.php");
	require_once("admin/Database.class.php");
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE); 
	$db->connect();
	?>
<link href="css/css1.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" media="screen" type="text/css" href="zoom/zoomimage.css" />
<link rel="stylesheet" media="screen" type="text/css" href="zoom/custom.css" />
<script type="text/javascript" src="zoom/jquery.js"></script>
<script type="text/javascript" src="zoom/eye.js"></script>
<script type="text/javascript" src="zoom/utils.js"></script>
<script type="text/javascript" src="zoom/zoomimage.js"></script>
<script type="text/javascript" src="zoom/layout.js"></script>

<table border="0" cellspacing="2" cellpadding="2" align="left">
<tr><td colspan="9" class="title_11">&nbsp;* Click on image to see full size</td></tr>
  <tr>
   <?php $pqry="select * from prod_mst where Is_Active=1 and Prod_Id='".$_REQUEST['pid']."' order by Disp_Order"; 
   $dd=mysql_query($pqry);
   $pd=mysql_fetch_array($dd); ?>
   
    <?php $query="select * from prod_img where Prod_Id='".$_REQUEST['pid']."' order by Disp_Order"; 
		  $result=mysql_query($query);							  
		  $count=1;
		  while($p=mysql_fetch_array($result))
		  {  
		 ?>
    <td align="left" valign="top" bgcolor="#FFFFFF" ><table width="100" border="0" cellpadding="0" cellspacing="0" align="left" style="padding:5px;">
  <tr>
        <td height="100" align="center" bgcolor="#FFFFFF"><a href="product/ph<?php echo $p['Is_Image']; ?>" class="example2" style="cursor:pointer;"><img src="product/<?php echo $p['Is_Image']; ?>" border="0" title="<?php echo $pd['Prod_Name']; ?>"  alt="<?php echo $pd['Prod_Name']; ?>" /></a></td>
  </tr>
</table></td>
    <?php if($count==6) {  ?>
    <tr><td height="5"></td></tr>
    <?php } ?>
    <?php $count++; } ?>
  </tr>
</table>
