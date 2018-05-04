<?php
session_start(); ?>
<script language="JavaScript1.1">
<!--
//specify interval between slide (in mili seconds)
var slidespeed=4000
//specify images
<?php
$slider_query=mysql_query("select * from slider_mst order by Disp_Order");
$rows=mysql_affected_rows();
?>
var slideimages=new Array(<?php $i=1; while($s=mysql_fetch_array($slider_query)){ ?>"slider_images/<?php echo $s['Is_Image']; ?>"<?php if($i!=$rows){?>,<?php } ?><?php if($i==$rows){ ?>);<?php } ?><?php $i++; } ?>

<?php
$slider_query1=mysql_query("select * from slider_mst order by Disp_Order");
$rows1=mysql_affected_rows();
?>
var slidelinks=new Array(<?php $j=1; while($s1=mysql_fetch_array($slider_query1)){ ?>"<?php echo $s1['Page_Link']; ?>"<?php if($j!=$rows1){?>,<?php } ?><?php if($j==$rows1){ ?>);<?php } ?><?php $j++; } ?> 

//var slidelinks=new Array("#","#","#")
var imageholder=new Array()
var ie55=window.createPopup
for (i=0;i<slideimages.length;i++){
imageholder[i]=new Image()
imageholder[i].src=slideimages[i]
}

function gotoshow(){
window.location=slidelinks[whichlink]

}

//-->
</script>
<link href="css/css1.css" rel="stylesheet" type="text/css" />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border2">
                  <tr>
                    <td height="220" align="center" valign="middle" bgcolor="#FFFFFF">
                    <a href="javascript:gotoshow()"><img src="photo1.jpg" name="slide" border=0 style="filter:progid:DXImageTransform.Microsoft.Pixelate(MaxSquare=15,Duration=1)"></a>
   <script language="JavaScript1.1">
<!--
var whichlink=0
var whichimage=0
var pixeldelay=(ie55)? document.images.slide.filters[0].duration*1000 : 0
function slideit(){
if (!document.images) return
if (ie55) document.images.slide.filters[0].apply()
document.images.slide.src=imageholder[whichimage].src
if (ie55) document.images.slide.filters[0].play()
whichlink=whichimage
whichimage=(whichimage<slideimages.length-1)? whichimage+1 : 0
setTimeout("slideit()",slidespeed+pixeldelay)
}
slideit()

//-->
</script>

                    </td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="left" valign="top" width="730px">
                    <?php include('home_new.php'); ?>
                    </td>
                    <td width="10">&nbsp;</td>
                    <td width="220" align="left" valign="top"><?php include('deal_right.php'); ?></td>
                  </tr>
                </table></td>
              </tr>
              <tr>
                <td height="10" align="left" valign="top"> </td>
              </tr>
              <tr>
                <td>
                <?php include('rand_mobile.php'); ?>
                </td>
              </tr>
              <tr>
                <td height="10" align="left" valign="top"></td>
              </tr>
              <tr>
                <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><?php include('review_home.php'); ?></td>
    <td width="1%" align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top" width="220"><?php include('add_review.php'); ?></td>
  </tr>
</table>
</td>
              </tr>
              </table>