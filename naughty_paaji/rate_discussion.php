<?php session_start();
include("include/config.php");
$disid=$_GET["discussion_board_id"];
$userid=$_SESSION['user_reg_id'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<script type="text/javascript">
<!--
var set=false;
var v=0;
var y;
var x;
function loadStars()
{
   star1 = new Image();
   star1.src = "images/star1.png";
   star2 = new Image();
   star2.src= "images/star2.png";
  
}

function display(x)
{
	if(set==false)
   {
	y=x; 
	var patt1=/[1-5]/g;
var b=y.match(patt1);
   
   switch(x)
   {
   case "img1":
   
   document.getElementById(x).src = star2.src;
   document.getElementById('vote').innerHTML="Poor";
   break;
   case "img2":
 
   for (i=1;i<=b;i++)
   {
	  
   document.getElementById('img'+i).src = star2.src;
   }
   document.getElementById('vote').innerHTML="Average";
   break;
   case "img3":for (i=1;i<=b;i++)
   {
   document.getElementById('img'+i).src = star2.src;
   }
   document.getElementById('vote').innerHTML="Good";
   break;
   case "img4":for (i=1;i<=b;i++)
   {
   document.getElementById('img'+i).src = star2.src;

   }
   document.getElementById('vote').innerHTML="Very Good";
   break;
   case "img5":for (i=1;i<=b;i++)
   {
   document.getElementById('img'+i).src = star2.src;
   }
   document.getElementById('vote').innerHTML="Excellent";
   break;
   }
   }
	
}

function losedisplay(x)
{
y=x; 
var patt1=/[1-5]/g;
var b=y.match(patt1);
   if (set==false)
   {
   for (i=1;i<6;i++)
   {
   document.getElementById('img'+i).src=star1.src;
   document.getElementById('vote').innerHTML="";
   }
   }
}
-->
</script>


</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="loadStars()">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  
  <tr align="left">
  <td align="left">
 
  <a href="process_rate.php?userid=<?php print($userid);?>&disid=<?php print($disid);?>&value=1" ><img src="images/star1.png" id="img1" width="30" height="30" border="0"  style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?userid=<?php print($userid);?>&disid=<?php print($disid);?>&value=2" ><img src="images/star1.png" width="30" height="30" border="0" id="img2" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?userid=<?php print($userid);?>&disid=<?php print($disid);?>&value=3" ><img src="images/star1.png" width="30" height="30" border="0" id="img3" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)" /></a>

<a href="process_rate.php?userid=<?php print($userid);?>&disid=<?php print($disid);?>&value=4" ><img src="images/star1.png" id="img4" width="30" height="30" border="0"  style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)"  /></a>

<a href="process_rate.php?userid=<?php print($userid);?>&disid=<?php print($disid);?>&value=5" ><img src="images/star1.png" width="30" height="30" border="0" id="img5" style="width:25px; height:25px; float:left;" onMouseOver="display(this.id)" onMouseOut="losedisplay(this.id)"  /></a>
  </td>
  </tr>
  
  <tr align="left" id="trid"><td align="left" class="fonts9">
  <div id="vote" style="font-family:tahoma; color:red;"></div>  
  </td></tr>
</table>

</body>
</html>
