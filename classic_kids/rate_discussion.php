<?php session_start();
	  include("include/config.php");
	  require_once("include/function.php");
	  u_Connect("cn");
	  $productid=$_GET["productid"];
	  $type=$_GET["type"];
	  $userid=$_SESSION['loginuserid'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>


</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="loadStars()">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
 
  <tr align="left">
  <td align="left">
 
  <a href="process_rate.php?value=1&productid=<?php print($productid);?>&type=<?php print($type);?>" ><img src="images/star1.png" id="img1" width="30" height="30" border="0"  style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?value=2&productid=<?php print($productid);?>&type=<?php print($type);?>" ><img src="images/star1.png" width="30" height="30" border="0" id="img2" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?value=3&productid=<?php print($productid);?>&type=<?php print($type);?>" ><img src="images/star1.png" width="30" height="30" border="0" id="img3" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?value=4&productid=<?php print($productid);?>&type=<?php print($type);?>" ><img src="images/star1.png" id="img4" width="30" height="30" border="0"  style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)"  /></a>

<a href="process_rate.php?value=5&productid=<?php print($productid);?>&type=<?php print($type);?>" ><img src="images/star1.png" width="30" height="30" border="0" id="img5" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)"  /></a>
  </td>
  </tr>
  
 
</table>

</body>
</html>
